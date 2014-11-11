$(function() {
	
	/**
	 * Check all checkboxes
	 * From: http://briancray.com/posts/check-all-jquery-javascript
	 * ---------------------------------------------------------------------------------------------- */
	$('.checkall').on('click', function() {
		$(this).closest('.form-group').find(':checkbox').prop('checked', this.checked);
	});

});