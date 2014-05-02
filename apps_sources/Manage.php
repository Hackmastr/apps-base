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
	
	// Build the actions menu
	$page['actions'] = array(
		'add' => 'Add',
	);
	
	// Check if a page is being requested
	// and whether it exists in the manage array
	if (isset($_GET['area']) && array_key_exists($_GET['area'], $page['areas'])) {
	
		// Check if an action has been requested
		if (isset($_GET['action']) && array_key_exists($_GET['action'], $page['actions'])) {
			$page['has_action'] = 'add';
		}
	
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

/**
 * Manage locations page
 */
function ManageLocations() {

	global $page, $manage;

	// Set the area we're working with
	$manage->set_area('locations');
	$manage->set_db_columns(array(
		'Name' => 'location_name',
		'Country' => 'location_country',
		'State' => 'location_state',
		'City' => 'location_city',
		'Street' => 'location_street',
		'ZIP' => 'location_zip'
	));
	
	// Check if an action is being requested
	if ($page['has_action'] == 'add') {
	
		// Check if form was submitted
		if (isset($_POST['add_location'])) {
		
			// Get submitted form data
			$form_data = array(
				$_POST['location_name'],
				$_POST['location_country'],
				$_POST['location_state'],
				$_POST['location_city'],
				$_POST['location_street'],
				$_POST['location_zip']
			);
			
			// Add location to database
			$manage->add($form_data);
		}

		// Request sub template
		$page['sub_template'] = 'add';
		
		// Set the page title
		$page['title'] = 'Add New Location';
		
	} else {
	
		// Set the page title
		$page['title'] = 'Manage Locations';
		
	}
	
	// Load template
	load_template('ManageLocations');
	
}

/**
 * Manage divisions page
 */
function ManageDivisions() {
	
	global $page, $manage;
	
	// Set the area we're working with
	$manage->set_area('divisions');
	$manage->set_db_columns(array(
		'Division Name' => 'division_name'
	));
	
	if ($page['has_action'] == 'add') {
	
		// Check if form was submitted
		if (isset($_POST['add_division'])) {
		
			// Get submitted form data
			$form_data = array(
				$_POST['division_name']
			);
			
			// Add division to database
			$manage->add($form_data);
			
		}
			
		// Request sub template
		$page['sub_template'] = 'add';
		
		// Set the page title
		$page['title'] = 'Add New Division';
	
	} else {

		// Set the page title
		$page['title'] = 'Manage Divisions';
		
	}
	
	// Load template
	load_template('ManageDivisions');
	
}