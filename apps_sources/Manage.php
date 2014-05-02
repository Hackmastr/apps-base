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

	global $page, $vars, $manage;

	// Build the manage menu	
	$page['areas'] = array(
		'locations' => array('Manage Locations', 'ManageLocations'),
		'divisions' => array('Manage Divisions', 'ManageDivisions')
	);
	
	// Has a specific area from the list above been requested?
	if (isset($_GET['area']) && array_key_exists($_GET['area'], $page['areas'])) {
	
		// Set the area we're working with
		$manage->set_area($_GET['area']);
		
		// Set the necessary database columns
		$manage->set_db_columns($vars['db_columns'][$_GET['area']]);
	
		if (isset($_GET['add'])) {
		
			// Are we trying to add something?
			return 'Add';
			
		} else if (isset($_GET['view'])) {
		
			// Are we trying to view something specific?
			return 'View';
		
		} else {
		
			// If nothing else, return the main area page
			return $page['areas'][$_GET['area']][1];
		
		}
	
	} else {
	
		return 'ManageHome';
	
	}

}

/**
 * Manage home page
 */
function ManageHome() {
	
}

/**
 * Manage locations page
 */
function ManageLocations() {

	global $page, $manage;
	
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

/**
 * Manage view page
 */
function View() {

	global $manage;

	$manage->view($_GET['view']);

}