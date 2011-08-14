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
