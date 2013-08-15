$(document).ready(function() {
	var attr = $('#TutorialSF2_searchenginebundle_filmtype_title').attr('data-url');
	$("#TutorialSF2_searchenginebundle_filmtype_title").autocomplete({
	    minLength: 3,
	    source: attr
	});
});
