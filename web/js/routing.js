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

AjaxLoader.conf = function() {
	var containers = jQuery.makeArray(arguments);
	return function(request) {
		AjaxLoader.loader.showLoader();
		jQuery.post(request.path, {'ajax_containers[]': containers, ajax_title: 'true', 'ajax_navigations': ['main', 'secondary']}, function(result, code, xhr) {
			AjaxLoader.loader.hideLoader();

			jQuery.each(containers, function(i, container_name) {
				jQuery('.container-'+container_name).html(result.container[container_name] || '');
			});

			//Update navigations
			jQuery('#main_navigation').html(result.navigation.main);
			jQuery('#secondary_navigation').html(result.navigation.secondary);

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
			
			//Update title
			document.title = AjaxLoader.title_prefix+result.title;
		}, 'json');
	};
};

AjaxLoader.davis = Davis(function() {
	this.configure(function() {
		this.generateRequestOnPageLoad = false;
	});
});

jQuery(function() {
	AjaxLoader.loader = new AjaxLoader;
	AjaxLoader.davis.start();
});
