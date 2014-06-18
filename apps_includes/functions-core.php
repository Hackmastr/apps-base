<?php
/**
 * Apps Core Functions
 */

/**
 * Returns requested $_GET
 *
 * @return boolean Returns value of $_GET, otherwise false if not set
 */
function get_var($requested_var) {
	
	// Check if the requested var is set
	if (isset($_GET[$requested_var])) {
			
		return $_GET[$requested_var];
		
	} else {
		
		return false;
		
	}
	
}

/**
 * Returns current page URL string
 *
 * Comes from code snippet by Chris Coyier
 * http://css-tricks.com/snippets/php/get-current-page-url/
 */
function get_page_url() {

  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
  $url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
  $url .= $_SERVER["REQUEST_URI"];
  return $url;
	
}

/**
 * Returns time
 */
function get_time($format) {
	
	return date($format, time());
	
}