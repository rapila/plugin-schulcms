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

