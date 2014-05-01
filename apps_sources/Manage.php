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
	$page['areas'] = array(
		'locations' => array('Manage Locations', 'ManageLocations'),
		'divisions' => array('Manage Divisions', 'ManageDivisions')
	);
	
	// Check if a page is being requested
	// and whether it exists in the manage array
	if (isset($_GET['area']) && array_key_exists($_GET['area'], $page['areas'])) {
	
		return $page['areas'][$_GET['area']][1];
	
	} else {
	
		// Load the main manage page if nothing is requested
		// or requested page doesn't exist
		return 'ManageHome';
	
	}

}

/**
 * Manage home page
 */
function ManageHome() {

	global $page;
	
	// Set the page's title
	$page['title'] = 'Manage';
	
	// Load the template
	load_template('Manage');
	
}