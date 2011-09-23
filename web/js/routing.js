var app = Davis(function() {
	this.configure(function() {
		console.log(this);
		this.generateRequestOnPageLoad = false;
	});
	this.get(CONTEXT+'team/:slug', function(req) {
		console.log(req);
	});
	this.get(CONTEXT+'anlaesse/veranstaltungen/:year/:month/:day/:slug', function(req) {
		console.log(req);
	});
});

jQuery(function() {
	app.start();
});