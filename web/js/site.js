// experimental
// • url shouldbe dynamic
// • type replace by constant

function changeType() {
	// add language to url
	var type = document.getElementById("faq_school_type_select").value;
	var url = 'http://wettingen-portal/faq/';
	if(type !== 'all') {
		url += type;
	}
	window.location.href = url;
}