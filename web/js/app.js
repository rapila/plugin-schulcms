(function() {
	'use strict';

	function classList(element) {
		return {
			add: function(className) {
				if(!this.contains(className)) {
					element.className = (element.className + ' ' + className).trim();
				}
			},
			contains: function(className) {
				return (' '+element.className+' ').indexOf(' '+className+' ') > -1;
			},
			remove: function(className) {
				while(this.contains(className)) {
					element.className = (' '+element.className+' ').replace(' '+className+' ', ' ').trim();
				}
			},
			toggle: function(className) {
				if(this.contains(className)) {
					this.add(className);
				} else {
					this.remove(className);
				}
			}
		};
	}
	
	// Export for other files to use
	window.classList = classList;

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
	
	wok.use('directSource', function(element, options) {
		var _this = this;
		var args = [].slice.call(arguments, 2);

		return {
			request: function(config) {
				_this.render.apply(_this, args);
			}
		}
	});

	wok.use('htmlSource', function(element, useJSON) {
		var _this = this;

		var data;
		function prepare() {
			if(data) {
				// Already initialized
				return;
			}
			data = {};
			var items = element.children;
			for(var i=0;i<items.length;i++) {
				var attrs = [].slice.call(items[i].attributes);
				var id = null;
				var ob = {};
				for(var j=0;j<attrs.length;j++) {
					var name = attrs[j].nodeName;
					var value = attrs[j].value || attrs[j].nodeValue;
					if(useJSON) {
						value = JSON.parse(value);
					}
					if(name === 'data-id') {
						id = value;
					}
					if(name.indexOf('data-') === 0) {
						name = name.substring('data-'.length);
						ob[name] = value;
					}
				}
				data[id] = ob;
			}
			return data;
		}


		return {
			request: function() {
				prepare();
				_this.render(data);
			}
		};
	});

	wok.use('htmlFiltered', function(element) {
		var items = element.children;

		return {
			render: function(data) {
				for(var i=0;i<items.length;i++) {
					var item = items[i];
					if(!item.cl) {
						item.cl = classList(item);
					}
					var id = item.getAttribute('data-id');
					if(id in data) {
						item.cl.remove('hidden');
					} else {
						item.cl.add('hidden');
					}
				}
			}
		}
	});
	
	wok.use('galleryDisplay', function(element, settings) {
		var image = element.querySelector('.image');
		var fullscreen = element.querySelector('.fullscreen-button');
		var info = element.querySelector('.info');
		var img = document.createElement('img');
		img.addEventListener('load', function() {
			window.loader.hide();
		}, false);

		var maxWidth = settings.maxWidth || 2000;
		var maxHeight = settings.maxHeight || 1500;
		var field = settings.field || 'index';

		var fs = {
			requestFullscreen: (element.requestFullscreen || element.msRequestFullscreen || element.mozRequestFullScreen || element.webkitRequestFullscreen || function() {}).bind(element),
			exitFullscreen: (document.exitFullscreen || document.msExitFullscreen || document.mozCancelFullScreen || document.webkitExitFullscreen || function() {}).bind(document),
			fullscreenElement: function() {
				return document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement;
			},
			fullscreenEnabled: document.fullscreenEnabled || document.mozFullScreenEnabled || document.msFullScreenEnabled || document.webkitFullscreenEnabled
		};
		if(fs.fullscreenEnabled) {
			fullscreen.addEventListener('click', function() {
				var fse = fs.fullscreenElement();
				if(fse) {
					fs.exitFullscreen()
					if(fse === element) {
						return;
					}
				}
				fs.requestFullscreen();
			}, false);
			element.ownerDocument.addEventListener('fullscreenchange', function(event) {
				fullscreen.textContent = fs.fullscreenElement() === element ? 'shrink' : 'grow';
			}, false);
			element.ownerDocument.addEventListener('mozfullscreenchange', function(event) {
				fullscreen.textContent = fs.fullscreenElement() === element ? 'shrink' : 'grow';
			}, false);
			element.ownerDocument.addEventListener('webkitfullscreenchange', function(event) {
				fullscreen.textContent = fs.fullscreenElement() === element ? 'shrink' : 'grow';
			}, false);
			element.ownerDocument.addEventListener('msfullscreenchange', function(event) {
				fullscreen.textContent = fs.fullscreenElement() === element ? 'shrink' : 'grow';
			}, false);
		} else {
			fullscreen.parentElement.removeChild(fullscreen);
			fullscreen = null;
		}

		function render(data, configuration) {
			if(!data.length || data.length !== 1) {
				image.textContent = '';
				return;
			}
			info.textContent = ''+(configuration[field]+1)+'/'+(configuration.length);
			if(!img.complete) {
				window.loader.hide();
			}
			img.src = data[0]+'?max_width='+maxWidth+'&max_height='+maxHeight;
			if(!img.complete) {
				window.loader.show();
			}
			image.appendChild(img);
		}
		return {
			render: render
		};
	});

	var filterPlugins = {
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
				update(-step);
			}, false);
			next.addEventListener('click', function() {
				update(step);
			}, false);
			element.ownerDocument.addEventListener('keydown', function(event) {
				if(event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) {
					return;
				}
				if(event.key === 'ArrowLeft' || (event.which || event.keyCode) === 37) {
					update(-1);
				}
				if(event.key === 'ArrowRight' || (event.which || event.keyCode) === 39) {
					update(1);
				}
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
		datePager: function datePager(element, startField, endField, granularity, granularityChanger, months) {
			var _this = this;
			var prev = element.querySelector('.prev');
			var next = element.querySelector('.next');
			var current = element.querySelector('.current');
			var currentValue = {
				year: null,
				month: 0,
				day: 1
			};
			element.cl = classList(element);
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
				currentValue.year = d.getUTCFullYear();
				currentValue.month = d.getUTCMonth();
				currentValue.day = d.getUTCDate();
				_this.request(currentValue);
			}
			prev.addEventListener('click', function() {
				update(-1);
			}, false);
			next.addEventListener('click', function() {
				update(1);
			}, false);
			element.ownerDocument.addEventListener('keydown', function(event) {
				if(event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) {
					return;
				}
				if(event.key === 'ArrowLeft' || (event.which || event.keyCode) === 37) {
					update(-1);
				}
				if(event.key === 'ArrowRight' || (event.which || event.keyCode) === 39) {
					update(1);
				}
			}, false);
			function updateGranularity(newGranularity) {
				if(newGranularity in currentValue) {
					if(granularity) {
						currentValue["granularity_"+granularity] = false;
						element.cl.remove('granularity-'+granularity);
					}
					granularity = newGranularity;
					currentValue["granularity_"+newGranularity] = true;
					element.cl.add('granularity-'+newGranularity);
				}
			}
			function render(configuration, data) {
				for(var dateKey in currentValue) {
					if(dateKey in configuration) {
						currentValue[dateKey] = configuration[dateKey];
					}
				}
				// If the granularity has changed (from month to year or vice versa)
				if(granularityChanger && granularityChanger in configuration) {
					updateGranularity(configuration[granularityChanger]);
				}
				// Update the text inside the “current” element
				if(granularity === 'year') {
					current.textContent = currentValue.year;
				} else {
					current.textContent = months[currentValue.month];
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
						end.setUTCDate(end.getUTCDate()+1);
					} else if(granularity === 'month') {
						start.setUTCDate(1);
						end.setUTCDate(1);
						end.setUTCMonth(end.getUTCMonth()+1);
					} else if(granularity === 'year') {
						start.setUTCDate(1);
						end.setUTCDate(1);
						start.setUTCMonth(0);
						end.setUTCMonth(0);
						end.setUTCFullYear(end.getUTCFullYear()+1);
					}
					if(!(start.getTime() <= d && d < end.getTime())) {
						delete data[key];
					}
				}
				// Put the month names into the configuration
				configuration.monthNames = months;
				configuration.title = (granularity === 'day' ? ''+currentValue.day+' ' : '') + (granularity === 'day' || granularity === 'month' ? months[currentValue.month]+' ' : '') + (currentValue.year);
			}
			return {
				render: render,
				request: true
			}
		},
		imagePager: function imagePager(element, settings) {
			var _this = this;
			var prev = element.querySelector('.prev');
			var next = element.querySelector('.next');
			var thumbnails = element.querySelector('.thumbnails');
			var field = settings.field || 'index';
			var step = settings.step || 1;
			var num = settings.thumbnails || 10;
			var maxWidth = settings.maxWidth || 150;
			var maxHeight = settings.maxHeight || 180;
			element.cl = classList(element);

			var currentIndex = 0;
			function update(delta, index) {
				var diff = {};
				diff[field] = currentIndex+delta
				_this.request(diff);
			}
			prev.addEventListener('click', function() {
				update(-step);
			}, false);
			next.addEventListener('click', function() {
				update(step);
			}, false);
			element.ownerDocument.addEventListener('keydown', function(event) {
				if(event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) {
					return;
				}
				if(event.key === 'ArrowLeft' || (event.which || event.keyCode) === 37) {
					update(-1);
				}
				if(event.key === 'ArrowRight' || (event.which || event.keyCode) === 39) {
					update(1);
				}
			}, false);
			function render(configuration, data) {
				currentIndex = configuration[field];
				if(!data.length) {
					return;
				}
				// Clamp currentIndex to min, max
				var length = data.length;
				if(!data[length-1]) {
					data.splice(length-1, 1);
					length--;
				}
				if(currentIndex < 0) {
					currentIndex += length;
				}
				if(currentIndex >= length) {
					currentIndex -= length;
				}
				configuration[field] = currentIndex;
				configuration.length = length;
				// Update classes
				if(currentIndex === 0) {
					element.cl.add('at-first');
				} else {
					element.cl.remove('at-first');
				}
				if(currentIndex === length-1) {
					element.cl.add('at-last');
				} else {
					element.cl.remove('at-last');
				}
				// Determine how many/which thumbnails to show
				var start = 0;
				var end = length-1;
				if(length > num) {
					// Not enough space to render all items, clamp
					start = currentIndex - Math.floor((num-1)/2);
					end = currentIndex + Math.ceil((num-1)/2);
					while(start < 0) {
						start++;
						end++;
					}
					while(end >= length) {
						start--;
						end--;
					}
				}
				thumbnails.textContent = '';
				var thumbs = document.createDocumentFragment();
				data.slice(start, end+1).forEach(function(url, index) {
					var image = document.createElement('div');
					image.className = 'image';
					var img = document.createElement('img');
					img.src = url+'?max_width='+maxWidth+'&max_height='+maxHeight;
					if(index === currentIndex - start) {
						img.className = "current";
					}
					img.addEventListener('click', function() {
						update(start + index - currentIndex);
					}, true);
					image.appendChild(img);
					thumbs.appendChild(image);
				});
				thumbnails.appendChild(thumbs);
				if(length) {
					data.splice(0, data.length, data[currentIndex]);
				}
			};
			return {
				render: render,
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
							classList(buttons[i]).add('active');
						} else {
							classList(buttons[i]).remove('active');
						}
					}
				},
				request: true
			}
		},
		title: function title(element, prop) {
			var template;
			if(prop === undefined) {
				template = element.textContent;
			} else if(prop.indexOf('$') > -1) {
				template = prop;
			} else {
				template = '${'+prop+'}';
			}
			return {
				request: true,
				render: function(configuration, data) {
					var text = template;
					for(var prop in configuration) {
						text = text.replace(new RegExp('\\$\\{'+prop+'\\}', 'g'), configuration[prop]);
					}
					element.textContent = text;
				}
			};
		},
		// Renders a list of options from which one can be chosen
		options: function options(element, prop, opts) {
			var _this = this;
			var selected = document.createElement('div');
			selected.className = 'link-label selected';
			element.insertBefore(selected, element.firstChild);
			element.cl = classList(element);
			var available = element.querySelector('.available');
			var availables = available.children;
			opts = opts || {};

			function toggle(open) {
				if(open !== true && open !== false) {
					open = !element.cl.contains('open');
				}
				if(open) {
					element.cl.add('open');
					// Close all other option filters in the same filter bar
					var bar = element.parentNode;
					var others = bar.querySelectorAll('[data-wok-filter-options]');
					for(var i=0;i<others.length;i++) {
						if(others[i] !== element) {
							classList(others[i]).remove('open');
						}
					}
				} else {
					element.cl.remove('open');
				}
			}
			function findOption(id) {
				for(var i=0;i<availables.length;i++) {
					if(availables[i].getAttribute('data-value') === id) {
						return availables[i];
					}
				}
			}
			function selectAvailable() {
				var id = this.getAttribute('data-value');
				var configuration = {};
				configuration[prop] = id;
				configuration[prop+'.title'] = this.textContent;
				toggle(false);
				element.cl.add('force-close');
				window.setTimeout(function() {
					element.cl.remove('force-close');
				}, 100);
				_this.request(configuration);
			}

			// Handle opening select items initially
			if(opts.open === 'onFirstLoad') {
				opts.open = ('localStorage' in window) && !window.localStorage.getItem(window.location.href+'-options-opened');
			}
			if(opts.open) {
				toggle(true);
			}
			('localStorage' in window) && window.localStorage.setItem(window.location.href+'-options-opened', true);

			var isInitial = true;

			for(var i=0;i<availables.length;i++) {
				availables[i].addEventListener('click', selectAvailable, false);
			}
			selected.addEventListener('click', toggle, false);

			return {
				request: true,
				render: function(configuration, data) {
					// Rendering
					var id = configuration[prop];
					// Add a dummy text in case something goes wrong with the stored value
					var displayName = id||' ';
					for(var i=0;i<availables.length;i++) {
						if(availables[i].getAttribute('data-value') === id) {
							displayName = availables[i].textContent;
							classList(availables[i]).add('selected');
						} else {
							classList(availables[i]).remove('selected');
						}
					}
					selected.textContent = displayName;
					if(isInitial) {
						isInitial = false;
						// Propagate the initial value of the title property to the other filters
						configuration[prop+'.title'] = displayName;
						_this.request(configuration);
					}

					// Don’t filter if id is empty string, 0 or null (allows filter value showing all)
					if(!id) {
						return;
					}

					// Filtering
					for(var key in data) {
						var item = data[key];
						var value = item[prop];
						var found = false;
						if(Array.isArray(value)) {
							found = value.indexOf(id) > -1;
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
		},

		'class-from-event': function(element, mode) {
			var onlyShowCommon = mode === 'common_only';
			var classIds = [];
			if(!onlyShowCommon && mode) {
				classIds = mode.split('|');
				for(var i=0;i<classIds.length;i++) {
					classIds[i] = parseInt(classIds[i], 10);
				}
			}
			element.remove();
			return {
				render: function(configuration, data) {
					for(var key in data) {
						if(onlyShowCommon) {
							if(!data[key].is_common) {
								delete data[key];
							}
						} else {
							if(classIds.length && classIds.indexOf(data[key].class_id) === -1 && !data[key].is_forced_upon_class) {
								delete data[key];
							}
						}
					}
				}
			};
		}
	};

	// A Wok plugin providing filtering.
	// Designed to work as a client of a pipe created by the source plugin
	wok.use('filter', function(element, defaultConfiguration, storage, storageKey) {
		var _this = this;

		// Take the configuration from the element’s data attribute
		var configuration = defaultConfiguration || {};

		// Init the storage mechanism
		if(storage === 'local') {
			storage = window.localStorage;
		} else if(storage === 'session') {
			storage = window.sessionStorage;
		}
		if(!storageKey) {
			storageKey = ['filter', this.inputName, this.outputName, 'configuration'].join('/');
		}
		if(storage) {
			var storedConfig = JSON.parse(storage.getItem(storageKey)||'{}');
			for(var key in storedConfig) {
				configuration[key] = storedConfig[key];
			}
		}

		// Init values from hash
		var index = window.location.href.indexOf('#')
		var hash = index === -1 ? '' : window.location.href.substring(index+1);
		hash = hash.split(/&+/);
		var newHash = [];
		for(var i=0;i<hash.length;i++) {
			var key = hash[i].split('=');
			if(key.length === 1) {
				newHash.push(hash[i]);
				continue;
			}
			var value = key.slice(1).join('=');
			key = key[0];
			if(!(key in configuration) || (typeof configuration[key] !== 'string' && typeof configuration[key] !== 'number')) {
				newHash.push(hash[i]);
				continue;
			}
			configuration[key] = typeof configuration[key] === 'number' ? parseInt(value, 10) : value;
		}
		if(index > -1) {
			window.location.replace(window.location.href.substring(0, index)+'#'+newHash.join('&'));
		}

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
			if(Array.isArray(data)) {
				filteredData = data.slice();
			} else {
				filteredData = {};
				for(var key in data) {
					filteredData[key] = data[key];
				}
			}
			// Let the child controls update themselves and filter data depending on the current configuration
			filterControls.render(configuration, filteredData);
			// Store the current settings in the storage container
			if(storage) {
				storage.setItem(storageKey, JSON.stringify(configuration));
			}
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

	document.addEventListener('DOMContentLoaded', function() {
		// Search the entire document for uses of the plugins just registered
		wok.init(document.documentElement);

		// Handle back links
		var backLinks = document.querySelectorAll('.back-link');
		for(var i=0;i<backLinks.length;i++) {
			var backLink = backLinks[i];
			backLink.addEventListener('click', function(event) {
				window.location.href = this.getAttribute('data-url') || document.referrer || '../';
			}, false);
		}
	}, false);
})();
