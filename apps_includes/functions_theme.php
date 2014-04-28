<?php
/**
 * Main theme functions
 */
 
/**
 * Loads requested template
 */
function load_template($template) {

	require_once(APP_TEMPLATE_PATH .'/template_'. $template .'.php');

}

/**
 * Site header
 */
function get_header() {

	require_once(SITE_TEMPLATE_PATH .'/template_header.php');
	
}

/**
 * Site footer
 */
function get_footer() {
	
	require_once(SITE_TEMPLATE_PATH .'/template_footer.php');
	
}

/**
 * Site main navigation
 */
function get_main_nav() {
	
	// Go to database
	echo 'Navbar';
	
}

/**
 * Builds sub nav for page
 */
function get_sub_nav() {
	
	global $page;
	
	echo '<ul>';
	
	// Loops through each nav item
	foreach ($page['sub_nav'] as $nav_item => $nav_item_property) {
	
		//echo '<li><a href="'. APP_URL .'/index.php?p='. $_GET['p'] .'&amp;sub='. $nav_item .'">'. $nav_item_property['title'] .'</a></li>';
	
	}
	
	echo '</ul>';
	
}

/**
 * Returns sub page var if set
 * otherwise false
 */
function get_sub_page($var) {

	global $page;
	
	if (isset($_GET[$var]) && array_key_exists($_GET[$var], $page['sub_nav'])) {
	
		return $_GET[$var];
	
	} else {
	
		return false;
	
	}
	
}

/**
 * Returns page action var if set
 * otherwise false
 */
function get_page_action($var) {

	global $page;
	
	if (isset($_GET[$var]) && array_key_exists($_GET[$var], $page['sub_nav']['actions'])) {
	
		return $_GET[$var];
	
	} else {
	
		return false;
	
	}	
	
}

/**
 * Prints page title
 */
function get_page_title() {

	global $page;

	echo $page['title'];

}

/**
 * Prints path to stylesheet
 */
function get_option($option) {

	switch($option) {
		case 'site_url':
			echo SITE_URL;
			break;
		case 'site_title':
			echo SITE_TITLE;
			break;
		default:
		break;
	}

}

/**
 * Returns requested var if set
 * otherwise returns false
 */
function get_var($var) {
	
	if (isset($_GET[$var])) {
		
		return $_GET[$var];
		
	} else {
		
		return false;
		
	}
	
}