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
					data[key].__key = key;
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
		'date-pager': function datePager(element, startField, endField, granularity, granularityChanger, months) {
			var _this = this;
			var prev = element.querySelector('.prev');
			var next = element.querySelector('.next');
			var current = element.querySelector('.current');
			var currentValue = {
				year: null,
				month: 0,
				day: 1
			};
			rivets.formatters.month = function(value) {
				return months[value];
			};
			var binding = rivets.bind(current, {value: currentValue});
			function currentValueDate() {
				// Using the string syntax parses the date as a UTC date while passing the arguments individually would try to create the date in the local time zone.
				// Which one we use does not matter much, we just have to be consistent.
				return new Date(Date.UTC(currentValue.year, currentValue.month, currentValue.day));
			}
			function update(delta) {
				currentValue[granularity] += delta;
				if(granularity === 'year' || granularity === 'month') {
					currentValue.day = 1;
				}
				if(granularity === 'year') {
					currentValue.month = 0;
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
					if(granularity) {
						currentValue["granularity_"+granularity] = false;
						element.className = (' '+element.className+' ').replace(' granularity-'+granularity+' ', '');
					}
					granularity = newGranularity;
					currentValue["granularity_"+newGranularity] = true;
					element.className += ' granularity-'+newGranularity;
				}
			}
			return {
				render: function(configuration, data) {
					for(var dateKey in currentValue) {
						if(dateKey in configuration) {
							currentValue[dateKey] = configuration[dateKey];
						}
					}
					// If the granularity has changed (from month to year or vice versa)
					if(granularityChanger && granularityChanger in configuration) {
						updateGranularity(configuration[granularityChanger]);
					}
					var d = currentValueDate().getTime();
					for(var key in data) {
						var start = data[key][startField];
						var end = data[key][endField];
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
					// Put the month names into the configuration
					configuration.monthNames = months;
				},
				request: true
			}
		},
		pager: function pager(element, field, step) {
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
		toggle: function view(element, prop) {
			prop = prop || 'view';
			var _this = this;
			function clicked() {
				var button = this;
				var view = button.getAttribute('data-value');
				var configuration = {};
				configuration[prop] = view;
				_this.request(configuration);
			}
			var buttons = element.querySelectorAll('[data-value]');
			for(var i=0;i<buttons.length;i++) {
				buttons[i].addEventListener('click', clicked, false);
			}
			return {
				render: function(configuration) {
					for(var i=0;i<buttons.length;i++) {
						var view = buttons[i].getAttribute('data-value');
						if(view === configuration[prop]) {
							buttons[i].className += ' active';
						} else {
							buttons[i].className = buttons[i].className.replace(/\bactive\b/g, '');
						}
					}
				},
				request: true
			}
		},
		title: function title(element, prop) {
			return {
				request: true,
				render: function(configuration, data) {
					element.textContent = configuration[prop];
				}
			};
		},
		// Renders a list of options from which one can be chosen
		options: function options(element, prop) {
			var _this = this;
			var selected = element.querySelector('.selected');
			var available = element.querySelectorAll('.available > *');

			function selectAvailable() {
				var id = this.getAttribute('data-id');
				var configuration = {};
				configuration[prop] = id;
				_this.request(configuration);
			}

			for(var i=0;i<available.length;i++) {
				available[i].addEventListener('click', selectAvailable, false);
			}

			return {
				request: true,
				render: function(configuration, data) {
					// Rendering
					var id = configuration[prop];
					var displayName = id;
					for(var i=0;i<available.length;i++) {
						if(available[i].getAttribute('data-id') === id) {
							displayName = available[i].textContent;
						}
					}
					selected.textContent = displayName;

					if(!id) {
						return;
					}

					// Filtering
					for(var key in data) {
						var item = data[key];
						var value = item[prop];
						var found = false;
						if(Array.isArray(value)) {
							found = value.indexOf(id);
						} else {
							found = value === id;
						}
						if(!found) {
							delete data[key];
						}
					}
				}
			};
		},
		// Renders a search field
		search: function search(element, props) {
			var _this = this;

			element.addEventListener('input', function() {
				_this.request();
			}, false);

			function match(value, search) {
				if(!value) {
					return false;
				}
				if(value.toLowerCase) {
					value = value.toLowerCase();
				}
				if(search.toLowerCase) {
					search = search.toLowerCase();
				}
				if(value.indexOf) {
					return value.indexOf(search) > -1;
				}
				return value === search;
			}

			return {
				request: true,
				render: function(configuration, data) {
					var search = element.value.trim()
					if(!search) {
						// Do not filter empty search term
						return;
					}
					for(var key in data) {
						var found = false;
						var item = data[key];
						for(var i=0;i<props.length;i++) {
							var prop = props[i];
							if(match(item[prop], search)) {
								found = true;
								break;
							}
						}
						if(!found) {
							delete data[key];
						}
					}
				}
			};
		}
	};

	// A Wok plugin providing filtering.
	// Designed to work as a client of a pipe created by the source plugin
	wok.use('filter', function(element, defaultConfiguration) {
		var _this = this;

		// Take the configuration from the element’s data attribute
		var configuration = defaultConfiguration || {};

		// The inner wok with the individual filter modules
		var filterWok = element.filterWok = new Wok({
			pluginClass: 'filter wok-'
		});
		if(document.location.hash === '#debug') {
			filterWok.debug = true;
		}

		for(var name in filterPlugins) {
			filterWok.use('filter-'+name, filterPlugins[name]);
		}

		// Data we got from upstream
		var data = null;
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

		function request(updatedConfiguration) {
			if(updatedConfiguration) {
				for(var key in updatedConfiguration) {
					configuration[key] = updatedConfiguration[key];
				}
			}
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
				if(data === null) {
					// something while data is loaded
					render({});
				}
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

	wok.use('faq', function(element) {
		var output = {
			faqs: []
		};
		rivets.bind(element, {data: output});

		function render(data, configuration) {
			var faqs = [];
			for(var id in data) {
				faqs.push(data[id]);
				faqs.sort(function(faq1, faq2) {
					return faq1.Title == faq2.Title ? 0 : faq1.Title > faq2.Title ? 1 : -1;
				});
			}
			console.log('faqs', faqs);
			output.faqs = faqs;
		}

		return {
			render: render,
			request: true
		}
	});

	document.addEventListener('DOMContentLoaded', function() {
		// Search the entire document for uses of the plugins just registered
		wok.init(document.documentElement);
	}, false);
})();