(function(wok) {
	'use strict';

	function calendar(element, startingDay, startField, endField) {
		var data = {
			configuration: null,
			granularity: null,
			days: []
		};

		rivets.bind(element, {data: data});

		function prepareDays(dates, year, month) {
			var days = [];
			var day = new Date(Date.UTC(year, month, 1));
			var blinds = Math.abs(day.getDay() - startingDay);
			if(day.getDay() < startingDay) {
				blinds = 7 - blinds;
			}
			while(blinds-- > 0) {
				days.push({type: 'blind-date'});
			}
			while(day.getMonth() === month) {
				var dayDates = [];
				while(dates.length) {
					var date = dates.shift();
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
					// If start date is after interest, no more dates are to be found; end loop
					if(start - day > 0) {
						dates.unshift(date);
						break;
					}
					// Date is interesting
					dayDates.push(date);
				}
				// Re-add the used dates for the next iteration
				dates = dayDates.concat(dates);
				days.push({
					date: day.getDate(),
					dates: dayDates,
					type: 'date'
				});
				// Increment day
				day.setDate(day.getDate()+1);
			}
			return days;
		}

		function prepareMonths(dates, year) {
			var result = [];
			for(var month=0;month<12;month++) {
				result.push(prepareDays(dates, year, month));
			}
			return result;
		}

		function render(d, configuration) {
			// Create an array copy of dates to use up
			var dates = [];
			for(var k in d) {
				dates.push(d[k]);
			}
			dates.sort(function(d1, d2) {
				return new Date(d1[startField]) - new Date(d2[startField]);
			});

			if(configuration.granularity === 'year') {
				data.months = prepareMonths(dates, configuration.year);
			} else {
				data.days = prepareDays(dates, configuration.year, configuration.month);
			}

			var granularity = {};
			granularity[configuration.granularity] = true;

			data.granularity = granularity;
			data.days = days;
			data.configuration = configuration;
		}
		return {
			render: render,
			request: true
		}
	}
	
	wok.use('calendar', calendar);
})(window.wok);