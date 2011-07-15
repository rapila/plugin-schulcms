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

// Transform mailto-links
jQuery(document).ready(function(){
	jQuery(".mailto_link").each(function() {
		var link = jQuery(this);
		var link_address = link.attr("href");
		link_address = link_address.replace(/!/g, ".");
		link_address = link_address.replace(/\^/g, "@");
		link_address = "mailto:"+link_address;
		link.attr("href", link_address);
	});
});

// Gallery stuff
jQuery(document).ready(function(){
	jQuery("a[rel^='gallery']").each(function() {
		this.href = this.href.replace('&', '&amp;');
	}).prettyPhoto({
		social_tools: false,
		deeplinking: false,
		showTitle: true,
		theme: 'facebook',
		overlay_gallery: false,
		allowresize: true
	});
});

// facebook, default