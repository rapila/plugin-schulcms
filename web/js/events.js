(function(wok) {
	'use strict';
	
	var Appointment = React.createClass({
		render: function() {
			var elements = [];
			var content = [];
			if(this.props.appointment.has_images) {
				content.push(React.createElement(
					'span',
					{
						className: 'wett-icon',
						key: 'has_images'
					},
					'grid'
				));
			}
			if(this.props.appointment.has_bericht) {
				content.push(React.createElement(
					'span',
					{
						className: 'wett-icon',
						key: 'has_bericht'
					},
					'details'
				));
			}
			content.push(React.createElement(
				this.props.appointment.link ? 'a' : 'span',
				{
					href: this.props.appointment.link,
					className: 'link',
					key: 'link'
				},
				this.props.appointment.name
			));
			if(this.props.detailed) {
				var start = new Date(this.props.appointment.date_start);
				var end = new Date(this.props.appointment.date_end || this.props.appointment.date_start);
				var sameMonth = start.getUTCMonth() === end.getUTCMonth() && start.getUTCFullYear() === end.getUTCFullYear();
				if(this.props.appointment.description) {
					content.push(React.createElement(
						'p',
						{
							className: 'description',
							key: 'description'
						},
						this.props.appointment.description
					));
				}
				elements.unshift(React.createElement(
					'div',
					{
						className: 'event-date',
						key: 'end-event-date'
					},
					[
						React.createElement(
							'div',
							{
								className: 'event-month',
								key: 'end-event-month'
							},
							this.props.monthNames[end.getUTCMonth()].length > 5 ? this.props.monthNames[end.getUTCMonth()].substr(0, 3) : this.props.monthNames[end.getUTCMonth()]
						),
						React.createElement(
							'div',
							{
								className: 'event-day',
								key: 'end-event-day'
							},
							sameMonth ? (start.getUTCDate() === end.getUTCDate() ? end.getUTCDate() : (start.getUTCDate() + '–' + end.getUTCDate())) : end.getUTCDate()
						)
					]
				));
				if(!sameMonth) {
					elements.unshift(React.createElement(
						'div',
						{
							className: 'event-date',
							key: 'start-event-date'
						},
						[
							React.createElement(
								'div',
								{
									className: 'event-month',
									key: 'start-event-month'
								},
								this.props.monthNames[start.getUTCMonth()].length > 5 ? this.props.monthNames[start.getUTCMonth()].substr(0, 3) : this.props.monthNames[start.getUTCMonth()]
							),
							React.createElement(
								'div',
								{
									className: 'event-day',
									key: 'start-event-day'
								},
								start.getUTCDate()
							)
						]
					));
				}
			}
			elements.push(React.createElement(
				'div',
				{
					className: 'content',
					key: 'content'
				},
				content
			));
			return React.createElement(
				'div',
				{
					className: 'appointment appointment-'+(this.props.appointment.kind),
					title: this.props.appointment.name
				},
				elements
			);
		}
	});
	
	var Appointments = React.createClass({
		render: function() {
			var _this = this;
			var appointments = this.props.appointments.map(function(appointment) {
				return React.createElement(
					Appointment,
					{
						appointment: appointment,
						detailed: _this.props.detailed,
						monthNames: _this.props.monthNames,
						key: appointment.__key
					}
				);
			});
			return React.createElement(
				'div',
				{
					className: 'appointments'+(this.props.detailed ? ' appointments-detailed' : '')
				},
				appointments
			);
		}
	});
	
	var Day = React.createClass({
		render: function() {
			var day = this.props.day;
			var d = new Date();
			// Don’t use UTC getters here as we want the UTC-equvalent of the local date
			var today = this.props.day.date.getTime() === Date.UTC(d.getFullYear(), d.getMonth(), d.getDate());
			var elements = [
				React.createElement(
					'div',
					{
						className: 'date '+(today ? 'today' : ''),
						key: 'date'
					},
					day.date.getUTCDate()
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
					'data-day': day.date.getUTCDate()
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
			if(this.state.view === 'list') {
				return React.createElement(
					Appointments,
					{
						appointments: this.state.appointments,
						monthNames: this.state.monthNames,
						detailed: true
					}
				);
			}
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
					day.setUTCDate(day.getUTCDate()+1);
				}
			}
			var day = new Date(Date.UTC(year, month, 1));
			var result = {month: month, year: year, days: []};
			// Calculate blinds before start of the month
			var blinds = Math.abs(day.getUTCDay() - startingDay);
			if(day.getUTCDay() < startingDay) {
				blinds = 7 - blinds;
			}
			day.setUTCDate(day.getUTCDate()-blinds);
			pushBlinds(blinds);
			while(day.getUTCMonth() === month) {
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
				day.setUTCDate(day.getUTCDate()+1);
			}
			// Calculate blinds after end of the month
			blinds = Math.abs(day.getUTCDay() - startingDay);
			if(day.getUTCDay() > startingDay) {
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

			if(configuration.view === 'calendar') {
				// Calendar view needs to group the appointments into dates
				if(configuration.granularity === 'year') {
					year = prepareMonths(appointments, configuration.year);
				} else {
					month = prepareDays(appointments.slice(), configuration.year, configuration.month);
				}
			}

			cal.setState({
				view: configuration.view,
				granularity: configuration.granularity,
				year: year,
				month: month,
				monthNames: configuration.monthNames,
				appointments: appointments
			});
		}
		return {
			render: render,
			request: true
		}
	}
	
	wok.use('calendar', calendar);
})(window.wok);