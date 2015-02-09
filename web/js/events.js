(function(wok) {
	'use strict';
	
	var Appointment = React.createClass({
		render: function() {
			return React.createElement(
				'div',
				{className: 'appointment appointment-'+(this.props.date.kind)},
				this.props.date.name
			);
		}
	});
	
	var Appointments = React.createClass({
		render: function() {
			var appointments = this.props.appointments.map(function(date) {
				return React.createElement(
					Appointment,
					{
						date: date,
						key: date.__key
					}
				);
			});
			return React.createElement(
				'div',
				{className: 'appointments'},
				appointments
			);
		}
	});
	
	var Day = React.createClass({
		render: function() {
			var day = this.props.day;
			var elements = [
				React.createElement(
					'div',
					{
						className: 'date',
						key: 'date'
					},
					day.date.getDate()
				)
			];
			if(!this.props.minify) {
				elements.push(React.createElement(
					Appointments,
					{
						appointments: day.appointments,
						key: 'appointments'
					}
				));
			}
			return React.createElement(
				'div',
				{
					className: 'day',
					dataDateCount: day.appointments.length,
					dataDay: day.date.getDate()
				},
				elements
			);
		}
	});
	
	var Month = React.createClass({
		render: function() {
			var _this = this;
			var month = this.props.month;
			var days = month.days.map(function(day) {
				return React.createElement(
					Day,
					{
						day: day,
						minify: _this.props.minify,
						key: 'toISOString' in day.date ? day.date.toISOString() : day.date.toString()
					}
				)
			});
			return React.createElement(
				'div',
				{className: 'month '+(this.props.minify ? 'minified' : 'expanded')},
				days
			);
		}
	});
	
	var Year = React.createClass({
		render: function() {
			var year = this.props.year;
			var months = year.months.map(function(month) {
				return React.createElement(
					Month,
					{
						month: month,
						minify: true,
						key: month.year+'-'+month.month
					}
				)
			});
			return React.createElement(
				'div',
				{className: 'year'},
				months
			)
		}
	});
	
	var Calendar = React.createClass({
		getInitialState: function() {
			return {
				month: null,
				year: null,
				granularity: null,
				view: null
			};
		},
		render: function() {
			if(this.state.granularity === 'month') {
				return React.createElement(
					Month,
					{
						month: this.state.month
					}
				);
			} else if(this.state.granularity === 'year') {
				return React.createElement(
					Year,
					{
						year: this.state.year
					}
				);
			} else {
				return React.createElement('div');
			}
		}
	});

	function calendar(element, startingDay, startField, endField) {
		var cal = React.render(
			React.createElement(Calendar, null),
			element
		);

		function prepareDays(appointments, year, month) {
			var result = {month: month, year: year, days: []};
			var day = new Date(Date.UTC(year, month, 1));
			var blinds = Math.abs(day.getDay() - startingDay);
			if(day.getDay() < startingDay) {
				blinds = 7 - blinds;
			}
			day.setDate(day.getDate()-blinds);
			while(blinds-- > 0) {
				result.days.push({
					type: 'blind-date',
					date: new Date(+day),
					appointments: []
				});
				// Increment day
				day.setDate(day.getDate()+1);
			}
			var day = new Date(Date.UTC(year, month, 1));
			while(day.getMonth() === month) {
				var usedAppointments = [];
				while(appointments.length) {
					var date = appointments.shift();
					// If end date is nil, set to same as start
					if(!date[endField]) {
						date[endField] = date[startField];
					}
					var start = new Date(date[startField]);
					var end = new Date(date[endField]);
					// If end date is before interest, this event was too early; discard
					if(end - day < 0) {
						continue;
					}
					// If start date is after interest, no more appointments are to be found; end loop
					if(start - day > 0) {
						appointments.unshift(date);
						break;
					}
					// Date is interesting
					usedAppointments.push(date);
				}
				// Re-add the used appointments for the next iteration
				appointments = usedAppointments.concat(appointments);
				result.days.push({
					type: 'date',
					date: new Date(+day),
					appointments: usedAppointments
				});
				// Increment day
				day.setDate(day.getDate()+1);
			}
			return result;
		}

		function prepareMonths(appointments, year) {
			var result = {year: year, months: []};
			for(var month=0;month<12;month++) {
				result.months.push(prepareDays(appointments, year, month));
			}
			return result;
		}

		function render(d, configuration) {
			// Create an array copy of appointments to use up
			var appointments = [];
			for(var k in d) {
				appointments.push(d[k]);
			}
			appointments.sort(function(a1, a2) {
				return new Date(a1[startField]) - new Date(a2[startField]);
			});

			var year, month;

			if(configuration.granularity === 'year') {
				year = prepareMonths(appointments, configuration.year);
			} else {
				month = prepareDays(appointments.slice(), configuration.year, configuration.month);
			}

			cal.setState({view: configuration.view, granularity: configuration.granularity, year: year, month: month});
		}
		return {
			render: render,
			request: true
		}
	}
	
	wok.use('calendar', calendar);
})(window.wok);