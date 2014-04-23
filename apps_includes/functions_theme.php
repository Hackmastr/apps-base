<?php
/**
 * Main theme functions
 */

/**
 * Site header
 */
function get_header() {

	require_once(ABS_PATH .'apps_template/template_header.php');
	
}

/**
 * Site footer
 */
function get_footer() {
	
	require_once(ABS_PATH .'apps_template/template_footer.php');
	
}

/**
 * Site main navigation
 */
function get_main_nav() {
	
	// Go to database
	echo 'Navbar';
	
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