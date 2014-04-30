<?php
/**
 * Source file for managing locations
 */

/**
 * Main manage locations function
 * This will get called every time the manage locations
 * page is requested.
 */
function Locations() {
	
	global $page;

	// Build our actions menu
	// $action => $function_to_call
	$actions = array(
		'view' => 'View',
		'add' => 'Add',
		'update' => 'Update',
		'delete' => 'Delete'
	);
	
	// Check if an action is being requested and
	// whether or not it exists in the actions array
	if (isset($_GET['action']) && array_key_exists($_GET['action'], $actions)) {
	
		// Call the action being requested
		call_user_func($actions[$_GET['action']]);
		
		// Set our page title
		$page['title'] = 'Add New Location';
		
		// Set the sub template
		$page['sub_template'] = 'Add';
		
		// Load template
		load_template('ManageLocations');
	
	} else {
	
		// Set our page title
		$page['title'] = 'Manage Locations';
	
		// Load template file
		load_template('ManageLocations');
	
	}

}

/**
 * Displays list of locations
 */
function get_locations() {
	
	global $db;
	
	// Request locations from database
	$result = $db->query('SELECT * FROM app_locations');
	
	// Check if there's any results from the database
	if ($result->rowCount() > 0) {
	
		echo '<ul class="apps_data_list">
			<li>
				<dl class="apps_data_list_header">
					<dt class="name">Name</dt>
					<dd class="country">Country</dd>
					<dd class="state">State</dd>
					<dd class="city">City</dd>
					<dd class="street">Street</dd>
					<dd class="zip">ZIP</dd>
				</dl>
			</li>
			<li>
				<dl class="apps_data_list_data">';
	
		// Loop through results and display
		while ($location = $result->fetch()) {
			
				echo '<dt class="name">'. $location['location_name'] .'</dt>
					<dd class="country">'. $location['location_country'] .'</dd>
					<dd class="state">'. $location['location_state'] .'</dd>
					<dd class="city">'. $location['location_city'] .'</dd>
					<dd class="street">'. $location['location_street'] .'</dd>
					<dd class="zip">'. $location['location_zip'] .'</dd>';
		}
		
				echo '</dl>
			</li>
		</ul>';
	
	} else {
		
		echo '<p>No locations have been entered into the database.</p>';
		
	}
	
}

/**
 * Displays a single location
 */
function View() {

}

/**
 * Adds new location to database
 */
function Add() {

	global $db;

	// Process form data if the form has been submitted
	if (isset($_POST['add_location'])) {
		
		// Create our SQL statement and value params
		$query = $db->prepare('INSERT INTO app_locations (location_name, location_country, location_state, location_city, location_street, location_zip) VALUES(:name, :country, :state, :city, :street, :zip)');
		$params = array(
			':name' => $_POST['name'],
			':country' => $_POST['country'],
			':state' => $_POST['state'],
			':city' => $_POST['city'],
			':street' => $_POST['street'],
			':zip' => $_POST['zip']
		);
		
		// Execute SQL
		$result = $query->execute($params);
		
		// Check the results
		if ($result) {
		
			generate_message('success', 'New location has been added successfully.');
			
		} else {
			
			generate_message('error', 'Error adding new location.');
			
		}
		
	}

}

/**
 * Updates location in database
 */
function Update() {

}

/**
 * Deletes location from database
 */
function Delete() {

}