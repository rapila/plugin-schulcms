(function() {
	'use strict';

	// A global Wok instance
	var wok = window.wok = new Wok();
	if(document.location.hash === '#debug') {
		wok.debug = true;
	}

	// A plugin providing data sources. Data returned must be a JSON object with IDs for keys.
	// Calls to request can (or must, depending on the service) include filters,
	// but data passed to output always is always complete so clients of the output pipe need to filter it themselves
	wok.use('source', function(element) {
		var _this = this;
		var url = element.getAttribute('href');
		url = decodeURI(url);

		var data = {};

		var loaded = {};

		function render() {
			_this.render(data);
		}

		function request(options) {
			options = options || {};
			var requestUrl = url;
			for(var token in options) {
				requestUrl = requestUrl.replace("{"+token+"}", options[token]);
			}
			if(requestUrl in loaded) {
				if(!loaded[requestUrl]) {
					// Request is still under way… will call render() later
					return;
				} else {
					// Data with these options has already been loaded, call render() now
					return render();
				}
			}

			loaded[requestUrl] = false;

			var request = new XMLHttpRequest();
			request.onload = function() {
				window.loader.hide();
				var result = JSON.parse(this.responseText);
				for(var key in result) {
					data[key] = result[key];
				}
				loaded[requestUrl] = true;
				render();
			};
			request.onerror = function() {
				window.loader.hide();
				delete loaded[requestUrl];
				// FIXME: better error handling
			};
			request.open('GET', requestUrl, true);
			window.loader.show();
			request.send();
		}
		return {
			request: request
		};
	});
	
	var filterPlugins = {
		'date-pager': function(element, start_field, end_field, granularity, granularity_changer) {
			var _this = this;
			var prev = element.querySelector('.prev');
			var next = element.querySelector('.next');
			var current = element.querySelector('.current');
			var currentValue = {
				year: null,
				month: 0,
				day: 1
			};
			function currentValueDate() {
				// Using the string syntax parses the date as a local date while passing the arguments individually would try to create the date in the UTC time zone.
				// Which one we use does not matter much, we just have to be consistent.
				return new Date(Date.UTC(currentValue.year, currentValue.month, currentValue.day));
			}
			granularity = granularity in currentValue ? granularity : 'year';
			function update(delta) {
				currentValue[granularity] += delta;
				if(granularity === 'year' || granularity === 'month') {
					currentValue.day = 1;
				}
				if(granularity === 'year') {
					currentValue.month = 1;
				}
				var d = currentValueDate();
				currentValue.year = d.getFullYear();
				currentValue.month = d.getMonth();
				currentValue.day = d.getDate();
				_this.request(currentValue);
			}
			prev.addEventListener('click', function() {
				update(-1);
			}, false);
			next.addEventListener('click', function() {
				update(1);
			}, false);
			function updateGranularity(newGranularity) {
				if(newGranularity in currentValue) {
					granularity = newGranularity;
				}
			}
			return {
				render: function(configuration, data) {
					for(var dateKey in currentValue) {
						if(configuration[dateKey]) {
							currentValue[dateKey] = configuration[dateKey];
						}
					}
					// If the granularity has changed (from month to year)
					if(granularity_changer && granularity_changer in configuration) {
						updateGranularity(configuration[granularity_changer]);
					}
					current.textContent = currentValue[granularity];
					var d = currentValueDate().getTime();
					for(var key in data) {
						var start = data[key][start_field];
						var end = data[key][end_field];
						if(!end) {
							end = start;
						}
						start = new Date(start);
						end = new Date(end);
						if(granularity === 'day') {
							end.setDate(end.getDate()+1);
						} else if(granularity === 'month') {
							start.setDate(1);
							end.setDate(1);
							end.setMonth(end.getMonth()+1);
						} else if(granularity === 'year') {
							start.setDate(1);
							end.setDate(1);
							start.setMonth(0);
							end.setMonth(0);
							end.setFullYear(end.getFullYear()+1);
						}
						if(!(start.getTime() <= d && d < end.getTime())) {
							delete data[key];
						}
					}
				},
				request: true
			}
		},
		pager: function(element, field, step) {
			var _this = this;
			var prev = element.querySelector('.prev');
			var next = element.querySelector('.next');
			var current = element.querySelector('.current');
			step = step || 1;
			function update(delta) {
				var diff = {};
				diff[field] = Number(current.textContent)+delta
				_this.request(diff);
			}
			prev.addEventListener('click', function() {
				update(step*-1);
			}, false);
			next.addEventListener('click', function() {
				update(step);
			}, false);
			return {
				render: function(configuration, data) {
					if(field in configuration) {
						current.textContent = configuration[field];
					}
					for(var key in data) {
						if(data[key][field] !== configuration[field]) {
							delete data[key];
						}
					}
				},
				request: true
			}
		},
		view: function(element) {
			var _this = this;
			return {
				render: function() {}
			}
		}
	};

	// A Wok plugin providing filtering.
	// Designed to work as a client of a pipe created by the source plugin
	wok.use('filter', function(element, defaultConfiguration) {
		var _this = this;

		// Take the configuration from the element’s data attribute
		var configuration = defaultConfiguration || {};

		// The inner wok with the individual filter modules
		var filterWok = element.filterWok = new Wok();
		if(document.location.hash === '#debug') {
			filterWok.debug = true;
		}

		for(var name in filterPlugins) {
			filterWok.use('filter-'+name, filterPlugins[name]);
		}

		// Data we got from upstream
		var data = {};
		// Data we pass downstream
		var filteredData = {};

		function update() {
			// Duplicate data into filteredData so that it can be modified at will
			filteredData = {};
			for(var key in data) {
				filteredData[key] = data[key];
			}
			// Let the child controls update themselves and filter data depending on the current configuration
			filterControls.render(configuration, filteredData);
			// Pass the filtered data on to our output pipe
			_this.render(filteredData, configuration);
		}

		function render(newData) {
			data = newData;
			update();
		}

		function request() {
			// Request data from upstream, passing the current filter configuration
			// FIXME: maybe we should distinguish between filter and loader criteria
			_this.request(configuration);
		}

		// Add an output in the inner wok for the pipe named “filter”. Whenever it is requested, some filter settings may have changed
		var filterControls = filterWok.register({
			output: ['filter', function filterRequest(updatedConfiguration) {
				// Update the configuration
				if(updatedConfiguration) {
					for(var key in updatedConfiguration) {
						configuration[key] = updatedConfiguration[key];
					}
				}
				// display the existing data with the new filters
				update();
				// Request new data (request filters may have changed)
				request();
			}]
		});

		filterWok.init(element);

		return {
			request: request,
			render: render
		}
	});

	document.addEventListener('DOMContentLoaded', function() {
		// Search the entire document for uses of the plugins just registered
		wok.init(document.documentElement);
	}, false);
})();