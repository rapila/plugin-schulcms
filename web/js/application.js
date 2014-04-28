// Search input
jQuery(document).ready(function() {
	var search_input = jQuery('input#search_field');
	var search_button = jQuery('#search_button');
	
	search_input.bind('keyup', function(event) {
		if(search_input.val() === '') {
			search_button.removeClass('active');
		} else {
			search_button.addClass('active');
		}
	});
});

// Gallery stuff
jQuery(document).ready(function(){
	jQuery("a[rel^='gallery']").each(function() {
		this.href = this.href.replace('&', '&amp;');
	}).prettyPhoto({
		social_tools: false,
		deeplinking: true,
		opacity: 0.60,
		showTitle: true,
		/* 'pp_default' / light_rounded / dark_rounded / light_square / dark_square / facebook */
		theme: 'pp_default',
		overlay_gallery: false,
		allow_resize: true
	});
});

//Ajax stuff
jQuery.fn.extend({
	getClassValue: function(classStart) {
		var defaultValue = arguments[1] || false;
		classStart+='-';
		var result = defaultValue;
		jQuery.each(this.get(0).className.toString().split(/\s+/), function(i, val) {
			if(val.indexOf(classStart) === 0) {
				result = val.substring(classStart.length);
				return false;
			}
		});
		return result;
	}
});

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

jQuery(document).ready(function() {
	var ajax_loader = new AjaxLoader();
	var load_into = jQuery('div.load-into');
	
	jQuery('.load-ajax a').live('click', function() {
		var link = jQuery(this);
		if(link.is('.no-ajax, .no-ajax *, *[rel=document], *[rel=external], .service_links *')) {
			return true;
		}
		var load_ajax = link.closest('.load-ajax');
		ajax_loader.showLoader();		
		var load_handler = function(what) {
			jQuery('table.list_view tr').each(function(i, row) {
				jQuery(row).removeClass('active');
			});
			link.closest('tr').addClass('active');
		};
		var detail_title = link.text();
		link.blur();
		load_into.load(link.attr('href'), {container_only: 'context'}, load_handler);
		ajax_loader.hideLoader();		
		return false;
	});
});


