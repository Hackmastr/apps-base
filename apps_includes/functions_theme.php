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
	
		echo '<li><a href="'. APP_URL .'/index.php?p='. $nav_item .'">'. $nav_item_property['title'] .'</a></li>';
	
	}
	
	echo '</ul>';
	
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