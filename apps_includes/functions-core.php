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