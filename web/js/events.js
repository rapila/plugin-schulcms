(function(wok) {
	'use strict';

	wok.use('calendar', function(element) {
		function render(data, configuration) {
			element.textContent = JSON.stringify(data, null, 2);
			element.style.whiteSpace = "pre";
		}
		return {
			render: render,
			request: true
		}
	});
})(window.wok);