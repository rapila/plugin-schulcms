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
jQuery(document).ready(function() {
	var ajax_loader = window.loader;
	var load_into = jQuery('div.load-into');
	
	jQuery('.load-ajax a').live('click', function() {
		var link = jQuery(this);
		if(link.is('.no-ajax, .no-ajax *, *[rel=document], *[rel=external], .service_links *')) {
			return true;
		}
		var load_ajax = link.closest('.load-ajax');
		ajax_loader.show();
		var load_handler = function(what) {
			jQuery('table.list_view tr').each(function(i, row) {
				jQuery(row).removeClass('active');
			});
			link.closest('tr').addClass('active');
		};
		var detail_title = link.text();
		link.blur();
		load_into.load(link.attr('href'), {container_only: 'context'}, load_handler);
		ajax_loader.hide();
		return false;
	});
});


