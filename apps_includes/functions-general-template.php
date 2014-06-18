<?php
/**
 * Template functions
 */

/**
 * Loads template header file
 */
function get_header() {
	
	global $template;
	
	$template_header_file = $template->get_option('site_template_path') .'/template-header.php';
	
	if (file_exists($template_header_file)) {
		require_once($template_header_file);	
	} else {
		throw new Exception('Header template ('. $template_header_file .') cannot be found!');
	}	
	
}

/**
 * Loads requested template file
 */
function load_template($requested_template) {
	
	global $template;
	
	$template_file = $template->get_option('app_template_path') .'/template-'. $requested_template .'.php';
	
	if (file_exists($template_file)) {
		require_once($template_file);	
	} else {
		echo 'Requested template file ('. $template_file .') cannot be found!';
	}	
	
}

/**
 * Loads template footer file
 */
function get_footer() {
	
	global $template;
	
	$template_footer_file = $template->get_option('site_template_path') .'/template-footer.php';
	
	if (file_exists($template_footer_file)) {
		require_once($template_footer_file);	
	} else {
		echo 'Footer file ('. $template_footer_file .') cannot be found!';
	}	
	
}