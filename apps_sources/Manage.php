<?php
/**
 * Manages app settings and general corporate information
 */

// Execute corresponding function from page being requested
call_user_func(Manage());

/**
 * Main manage function for handling page requests
 */
function Manage() {

	global $page;

	// Build the manage menu
	$page['sub_nav'] = array(
		'manage' => array (
			'locations' => array(
				'title' => 'Manage Locations',
				'function' => 'Locations',
				'source' => 'ManageLocations.php'
			),
		),
	);
	
	// Check if page is being requested
	// and whether it exists in the manage array
	if (isset($_GET['manage']) && array_key_exists($_GET['manage'], $page['sub_nav'][$_GET['p']])) {
	
		// Load the source file for page being requested
		require_once('./apps_sources/'. $page['sub_nav']['manage'][$_GET['manage']]['source']);
		return $page['sub_nav']['manage'][$_GET['manage']]['function'];
	
	} else {
	
		// Load the main manage page if nothing is requested
		// or requested page doesn't exist
		return 'ManageHome';
	
	}

}

/**
 * Main manage page
 */
function ManageHome() {

	global $page;
	
	// Set the page's title
	$page['title'] = 'Manage';
	
	// Load the template
	load_template('Manage');
	
}