(function() {
	'use strict';

	var AjaxLoader = function(options) {
		this.options = {
			loader: "#ajax_loader"
		};
		this.options = jQuery.extend(this.options, options);
		this.active_request_count = 0;
		this.loader = jQuery(this.options.loader);
	};

	AjaxLoader.prototype = {
		show: function() {
			this.active_request_count++;
			this.loader.show();
		},
	
		hide: function() {
			this.active_request_count--;
			if(this.active_request_count<=0) {
				this.loader.hide();
				this.active_request_count = 0;
			}
		}
	};
	
	document.addEventListener('DOMContentLoaded', function() {
		window.loader = new AjaxLoader();
	}, false);
})();