(function(wok) {
	'use strict';
	
	var Appointment = React.createClass({
		render: function() {
			var link = React.createElement(
				this.props.date.link ? 'a' : 'span',
				{
					href: this.props.date.link,
					key: 'link'
				},
				this.props.date.name
			);
			var elements = [];
			if(this.props.date.has_images) {
				elements.push(React.createElement(
					'span',
					{
						className: 'wett-icon',
						key: 'has_images'
					},
					'grid'
				));
			}
			if(this.props.date.has_bericht) {
				elements.push(React.createElement(
					'span',
					{
						className: 'wett-icon',
						key: 'has_bericht'
					},
					'details'
				));
			}
			elements.push(link);
			return React.createElement(
				'div',
				{
					className: 'appointment appointment-'+(this.props.date.kind),
					title: this.props.date.name
				},
				elements
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
			var d = new Date();
			var today = this.props.day.date.getTime() === Date.UTC(d.getFullYear(), d.getMonth(), d.getDate());
			var elements = [
				React.createElement(
					'div',
					{
						className: 'date '+(today ? 'today' : ''),
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
					className: 'day '+(day.appointments.length ? 'has-appointments' : '')+' '+day.type,
					'data-appointment-count': day.appointments.length,
					'data-day': day.date.getDate()
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
			var _this = this;
			var year = this.props.year;
			var months = year.months.map(function(month) {
				return React.createElement(
					'div',
					{
						className: 'month-wrapper',
						key: month.year+'-'+month.month,
						onClick: _this.props.focusMonth.bind(null, month.year, month.month)
					},
					[
						React.createElement(
							'div',
							{
								key: 'month-label',
								className: 'label'
							},
							_this.props.monthNames[month.month]
						),
						React.createElement(
							Month,
							{
								month: month,
								minify: true,
								key: 'month'
							}
						)
					]
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
						year: this.state.year,
						monthNames: this.state.monthNames,
						focusMonth: this.props.focusMonth
					}
				);
			} else {
				return React.createElement('div');
			}
		}
	});

	function calendar(element, startingDay, startField, endField) {
		var _this = this;

		var cal = React.render(
			React.createElement(
				Calendar,
				{
					focusMonth: function(year, month) {
						_this.request({year: year, month: month, granularity: 'month'});
					}
				}
			),
			element
		);

		function prepareDays(appointments, year, month) {
			function pushBlinds(amount) {
				while(amount-- > 0) {
					result.days.push({
						type: 'blind-date',
						date: new Date(+day),
						appointments: []
					});
					// Increment day
					day.setDate(day.getDate()+1);
				}
			}
			var day = new Date(Date.UTC(year, month, 1));
			var result = {month: month, year: year, days: []};
			// Calculate blinds before start of the month
			var blinds = Math.abs(day.getDay() - startingDay);
			if(day.getDay() < startingDay) {
				blinds = 7 - blinds;
			}
			day.setDate(day.getDate()-blinds);
			pushBlinds(blinds);
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
			// Calculate blinds after end of the month
			blinds = Math.abs(day.getDay() - startingDay);
			if(day.getDay() > startingDay) {
				blinds = 7 - blinds;
			}
			pushBlinds(blinds);
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

			cal.setState({view: configuration.view, granularity: configuration.granularity, year: year, month: month, monthNames: configuration.monthNames});
		}
		return {
			render: render,
			request: true
		}
	}
	
	wok.use('calendar', calendar);
})(window.wok);