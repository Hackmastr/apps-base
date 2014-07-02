$(function() {

	/**
	 * Prevent unsaved changes if user navigates away from page
	 * ---------------------------------------------------------------------------------------------- */
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
	
	
	/**
	 * Check all checkboxes
	 * From: http://briancray.com/posts/check-all-jquery-javascript
	 * ---------------------------------------------------------------------------------------------- */
	$('.checkall').on('click', function() {
		$(this).closest('.checkmultiple').find(':checkbox').prop('checked', this.checked);
	});
	

	/**
	 * Dashboard-like page links
	 * ---------------------------------------------------------------------------------------------- */
	 
	// Get the initial width of the links and apply equal height
	link_width = $('.dashboard_link').width();
	apply_equal_height(link_width);
	
	// If the user resizes the browser window, get the new width of the links
	$(window).resize(function() {
		link_width = $('.dashboard_link').width();
		apply_equal_height(link_width);
	});

	// Apply equal height to links based on its width
	function apply_equal_height(link_width) {
		$('.dashboard_link').css({'height':link_width+'px'});
	}

});