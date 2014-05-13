<?php
/**
 * Base Apps functions file
 * Nothing in this file is organized in any particular way
 */

/**
 * Returns true if $requested_var exists in $array
 * Or returns $requested_var 
 */
function get_var($requested_var, $array = '') {
	
	// Check if the requested var is set
	if (isset($_GET[$requested_var])) {
	
		// If $array is empty, return the $requested_var
		// Otherwise, we're only checking if $requested_var exists in $array
		// If so, return true
		if (empty($array)) {
			
			return $_GET[$requested_var];
			
		} else {
			
			return true;
			
		}
		
	} else {
		
		return false;
		
	}
	
}

/**
 * Returns subnav from $page['sub_nav']
 */
function get_sub_nav() {
	
	global $page;
	
	// Variable to hold our menu
	$menu = '';
	
	// Is page set?
	$p = (isset($_GET['p']) ? '?p='. $_GET['p'] : '?p=home');
	
	$menu .= '<ul>
		<li '. (!isset($_GET['area']) ? 'class="active"' : '') .'><a href="'. APP_URL .'/index.php'. $p .'">Dashboard</a></li>';
	
	// Loops through each nav item
	foreach ($page['areas'] as $area => $nav_item) {
	
		$menu .= '<li '. (isset($_GET['area']) && $_GET['area'] == $area ? 'class="active"' : '') .'><a href="'. APP_URL .'/index.php'. $p .'&area='. $area .'">'. $nav_item[0] .'</a></li>';
	
	}
	
	$menu .= '</ul>';
	
	return $menu;
	
}

/**
 * Returns single value from $page['db_result']
 */
function get_db_result_val($var) {
	
	global $page;
	
	if (isset($page['db_result'][$var])) {
		return $page['db_result'][$var];
	}
	
}

/**
 * Returns page title
 */
function get_page_title() {

	global $page;

	return $page['title'];
	
}

/**
 * Loads requested template file
 * and sub template function
 */
function load_template($template_name, $sub_template_name = '') {

	global $page;

	$template_loaded = false;
	
	// Check if template file exists
	if (file_exists(APP_TEMPLATE_PATH .'/'. $template_name .'.template.php')) {
	
		require_once(APP_TEMPLATE_PATH .'/'. $template_name .'.template.php');
		$template_loaded = true;
		
	} else {
		
		echo 'Template file '. APP_TEMPLATE_PATH .'/'. $template_name .'.template.php doesn\'t exist.';
		
	}
	
	if ($template_loaded) {
		
		// Check if sub_template_name is set
		// and load the corresponding sub template
		if (!empty($sub_template_name)) {
			$sub_template = $sub_template_name;
		} else if (!empty($page['sub_template'])) {
			$sub_template = $page['sub_template'];
		} else {
			$sub_template = 'main';
		}
		
		// Call the page header
		template_header();
		
		// Load sub template
		load_sub_template($sub_template);
		
		// Call the page footer
		template_footer();
		
	}
	
}

/**
 * Loads sub template function
 */
function load_sub_template($sub_template) {

	if (function_exists('template_'. $sub_template)) {
	
		call_user_func('template_'. $sub_template);
	
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
 * Generates a page message
 */
function generate_message($type, $message) {
	
	global $page;
	
	// Create variable to store the entire message box
	$message_box = '';
	
	// Create the message box
	$message_box .= '<div class="msg_box '. $type .'">';
	$message_box .= $message;
	$message_box .= '</div>';
	
	// Enable the message
	$page['has_message'] = true;
	
	// Write the message box
	$page['the_message'] = $message_box;
	
}