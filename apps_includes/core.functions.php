<?php
/**
 * Base Apps functions file
 * Nothing in this file is organized in any particular way
 */

/**
 * Returns data submitted to forms
 */
function get_form_data($prefix = '', $post) {
	
	$post_array = array();
	
	foreach ($post as $field) {
	
		if (empty($prefix)) {
			array_push($post_array, $_POST[$field]);
		} else {
			array_push($post_array, $_POST[$prefix .'_'. $field]);
		}
	
	}
	
	return $post_array;
	
}

/**
 * Returns subnav from $page['sub_nav']
 */
function get_sub_nav() {
	
	global $page;
	
	// Parent page variable, if any
	$parent_page = '';
	
	// Initialize our sub nav variable
	$sub_nav = '<ul class="apps_sub_nav">';
	
	// Loop through sub_nav array and add defined menu items to $sub_nav
	foreach ($page['sub_nav'] as $arg => $items) {
	
		if ($arg == 'parent_page') {
		
			$parent_page = $items['id'] .'='. $items['name'] .'&';
		
		} else if ($arg == 'sub_page') {
		
			$sub_page_for_id = $items['for'];
			$sub_page = (!empty($items['name']) ? '&'. $items['id'] .'='. $items['name'] : '');
			
		} else {
	
			foreach($items as $item) {
			
				$page['current_page'] = (isset($_GET[$arg]) && $_GET[$arg] == $item['id'] || empty($_GET) && $item['id'] == 'home') ? $item['name'] : '';
				
				$sub_nav .= '<li '. (!empty($page['current_page']) ? 'class="active"' : '') .'><a href="'. APP_URL .'/index.php?'. $parent_page . $arg .'='. $item['id'] .''. (!empty($sub_page) && !empty($sub_page_for_id) && $sub_page_for_id == $arg ? $sub_page : '') .'">'. $item['name'] .'</a></li>';
				
			}
			
		}
		
	}
	
	$sub_nav .= '</ul>';
	
	return $sub_nav;
	
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

/**
 * Loads custom stylesheet into <head>
 */
function load_stylesheet($stylesheet) {
	
	global $page;

	array_push($page['stylesheets'], $stylesheet);
	
}

/**
 * Returns time
 */
function get_time($format) {
	
	return date($format, time());
	
}