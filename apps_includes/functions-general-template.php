<?php
/**
 * Template functions
 */

/**
 * Loads template header file
 */
function get_header() {
	
	global $template;
	
	$template_header_file = $template->get_option('site_template_path') .'/template_header.php';
	
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
	
	$template_file = $template->get_option('app_template_path') .'/template_'. $requested_template .'.php';
	
	if (file_exists($template_file)) {
		require_once($template_file);	
	} else {
		echo 'Requested template file ('. $template_file .') cannot be found!';
	}	
	
}

/**
 * Loads requested sub template file
 */
function load_template_subs() {
	
	global $template;
	
	$sub_template_file = $template->get_option('app_template_path') .'/subs_'. $template->get_sub_template() .'.php';
	
	if (file_exists($sub_template_file)) {
		require_once($sub_template_file);
		call_user_func($template->get_sub_func());
	} else {
		echo 'Requested template file ('. $sub_template_file .') cannot be found!';
	}		
	
}

/**
 * Loads template footer file
 */
function get_footer() {
	
	global $template;
	
	$template_footer_file = $template->get_option('site_template_path') .'/template_footer.php';
	
	if (file_exists($template_footer_file)) {
		require_once($template_footer_file);	
	} else {
		echo 'Footer file ('. $template_footer_file .') cannot be found!';
	}	
	
}