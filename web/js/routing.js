var AjaxLoader = function(options) {
	this.options = {
		loader: "#ajax_loader"
	};
	this.options = jQuery.extend(this.options, options);
	this.active_request_count = 0;
	this.loader = jQuery(this.options.loader);
};

AjaxLoader.prototype = {
	showLoader: function() {
		this.active_request_count++;
		this.loader.show();
	},
	
	hideLoader: function() {
		this.active_request_count--;
		if(this.active_request_count<=0) {
			this.loader.hide();
			this.active_request_count = 0;
		}
	}
};

var app;
Davis(function() {
	app = this;
	var loader = function(request) {
		jQuery.each(this, function(i, container) {
			AjaxLoader.loader.showLoader();
			jQuery('.container-'+container).load(request.path, {container_only: container}, function() {
				AjaxLoader.loader.hideLoader();
			});
		});
		
		//Update direct links
		jQuery('a[href$="'+request.path+'"]').each(function() {
			var element = jQuery(this);
			while(!(element.is('body') || element.siblings().is('.active, .current'))) {
				element = element.parent();
			}
			if(element.is('body')) {
				element = jQuery(this);
				if(element.closest('table.list_view').length > 0) {
					element = element.closest('tr');
				}
			}
			element.addClass('active').siblings().removeClass('active current');
		});
		
		//Update the main navigation
		var main_nav_elements = jQuery('#main_navigation > li > a');
		if(main_nav_elements.filter('[href$="'+request.path+'"]').addClass('active').length > 0) {
			main_nav_elements.not('[href$="'+request.path+'"]').removeClass('active current');
		}
	};
	
	this.configure(function() {
		this.generateRequestOnPageLoad = false;
	});
	this.get(CONTEXT+'team/:slug', loader.bind(['context']));
	this.get(CONTEXT+'klassen/:slug', loader.bind(['context', 'content']));
	this.get(CONTEXT+'klassen', loader.bind(['context', 'content']));
	this.get(CONTEXT+'team', loader.bind(['context', 'content']));
	this.get(CONTEXT+'anlaesse/veranstaltungen/:year/:month/:day/:slug', loader.bind(['content', 'context']));
});

jQuery(function() {
	AjaxLoader.loader = new AjaxLoader;
	app.start();
});
