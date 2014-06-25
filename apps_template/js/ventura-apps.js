$(function() {
	
	$('.apps_form').on('change keyup keydown', 'input, textarea, select', function(e) {
		$(this).addClass('changed-input');
	});
	
	formSubmitted = false;

	$("input[name='submit']").click(function() {
		formSubmitted = true;
	});
	
	$(window).on('beforeunload', function () {
	
	    if ($('.changed-input').length && !formSubmitted) {
	        return 'You haven\'t saved your changes.';
	    }
	    
	});

});