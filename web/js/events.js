(function(wok) {
	'use strict';

	var Appointment = React.createClass({
		render: function() {
			function shortMonth(month) {
				return _this.props.monthNames[month].length > 5 ? _this.props.monthNames[month].substr(0, 3) : _this.props.monthNames[month];
			}
			var _this = this;
			var elements = [];
			var title = [];
			var icons = [];
			var content = [];
			var link = this.props.appointment.link;
			if(this.props.appointment.has_images) {
				icons.push(React.createElement(
					'span',
					{
						className: 'wett-icon',
						key: 'has_images'
					},
					'grid'
				));
			}
			if(this.props.appointment.has_bericht) {
				icons.push(React.createElement(
					'span',
					{
						className: 'wett-icon',
						key: 'has_bericht'
					},
					'details'
				));
			}
			title.push(
				this.props.appointment.name
			);
			if(this.props.detailed) {
				title.push(icons);
			} else {
				title.unshift(icons);
			}
			var inner = title;
			if(link) {
				inner = React.createElement(
					'a',
					{
						href: this.props.appointment.link
					},
					inner
				);
			}
			content.push(React.createElement(
				this.props.detailed ? 'h4' : 'span',
				{
					className: 'title',
					key: 'title'
				},
				inner
			));
			var start = new Date(this.props.appointment.date_start);
			var end = new Date(this.props.appointment.date_end || this.props.appointment.date_start);
			if(this.props.detailed) {
				var sameDay = +start === +end;
				if(link) {
					var texts = [];
					if(this.props.appointment.description) {
						texts.push(React.createElement('span', {key: 'description'}, this.props.appointment.description));
					}
					texts.push(React.createElement('span', {key: 'read-more', className: 'read-more'}, this.props.readMoreText));

					content.push(React.createElement(
						'p',
						{
							className: 'description',
							key: 'description'
						},
						[
							React.createElement(
								'a',
								{
									href: this.props.appointment.link,
									className: 'text-link',
								},
								texts
							)
						]
					));
				}
				var dates = [];
				dates.push(React.createElement(
					'div',
					{
						className: 'event-date from',
						key: 'start-event-date'
					},
					[
						React.createElement(
							'div',
							{
								className: 'event-month',
								key: 'start-event-month'
							},
							shortMonth(start.getUTCMonth())
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
				dates.push(React.createElement(
					'span',
					{
						className: 'until',
						key: 'until'
					},
					'–'
				));
				dates.push(React.createElement(
					'div',
					{
						className: 'event-date to',
						key: 'end-event-date'
					},
					[
						React.createElement(
							'div',
							{
								className: 'event-month',
								key: 'end-event-month'
							},
							shortMonth(end.getUTCMonth())
						),
						React.createElement(
							'div',
							{
								className: 'event-day',
								key: 'end-event-day'
							},
							end.getUTCDate()
						)
					]
				));
				elements.unshift(React.createElement(
					'div',
					{
						className: 'dates '+(sameDay ? 'same-day' : ''),
						key: 'dates'
					},
					dates
				));
			}
			elements.push(React.createElement(
				'div',
				{
					className: 'content',
					key: 'content'
				},
				content
			));
			var d = new Date();
			// Don’t use UTC getters here as we want the UTC-equvalent of the local date
			var past = +end < Date.UTC(d.getFullYear(), d.getMonth(), d.getDate());
			return React.createElement(
				'div',
				{
					className: 'appointment appointment-'+(this.props.appointment.kind)+' '+(past ? 'past' : 'future'),
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
						readMoreText: _this.props.readMoreText,
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
			var today = +this.props.day.date === Date.UTC(d.getFullYear(), d.getMonth(), d.getDate());
			var elements = [
				React.createElement(
					'div',
					{
						className: 'date',
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
					className: 'day'
					           +(day.appointments.length ? ' has-appointments' : '')
					           +(day.counts.event ? ' has-events' : '')
					           +(day.counts.date ? ' has-dates' : '')
					           +' '+day.type
					           +(today ? ' today' : ''),
					'data-appointment-count': day.appointments.length,
					'data-event-count': day.counts.event || 0,
					'data-date-count': day.counts.date || 0,
					'data-day': day.date.getUTCDate(),
					title: (day.appointments.length === 1) ? day.appointments[0].name : null
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
			var d = new Date();
			var months = year.months.map(function(month) {
				// Don’t use UTC getters here as we want the UTC-equvalent of the local date
				var current = month.month === d.getMonth() && month.year === d.getFullYear();
				return React.createElement(
					'div',
					{
						className: 'month-wrapper'+(current ? ' current' : ''),
						key: month.year+'-'+month.month,
						onClick: _this.props.focusMonth.bind(null, month.year, month.month)
					},
					[
						React.createElement(
							'div',
							{
								key: 'month-label',
								className: 'month-label'
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
						detailed: true,
						readMoreText: this.props.readMoreText
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
					},
					readMoreText: element.getAttribute('data-read-more-text')
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
						appointments: [],
						counts: {}
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
				var counts = {};
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
					counts[date.kind] = (counts[date.kind] || 0) + 1;
					usedAppointments.push(date);
				}
				// Re-add the used appointments for the next iteration
				appointments = usedAppointments.concat(appointments);
				result.days.push({
					type: 'date',
					date: new Date(+day),
					appointments: usedAppointments,
					counts: counts
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