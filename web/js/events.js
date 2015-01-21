(function(wok) {
	'use strict';

	wok.use('calendar', function(element) {
		var data = {
			configuration: null,
			granularity: null,
			days: []
		};

		rivets.bind(element, {data: data});

		function render(dates, configuration) {
			// FIXME: Group events into days
			var days = [];
			for(var id in dates) {
				days.push(dates[id]);
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
	});
})(window.wok);