<?php
/**
 * Manages app settings and general corporate information
 */
 
// Execute corresponding function from page being requested
//call_user_func(Manage());

/**
 * Main manage function for handling page requests
 */
function Manage() {

	global $page, $vars, $manage;

	// Build the manage menu
	// $area => $title
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
		
		// Are we trying to add something?
		if (isset($_GET['add']) && $_GET['add'] == 'new') {
		
			// Has the form been submitted?
			if (isset($_POST['submit'])) {
			
				// Get our submitted form data
				$form_post_data = array();
				foreach($vars['db_columns'][$_GET['area']] as $db_column) {
					array_push($form_post_data, $_POST[$db_column]);
				}
			
				// Submit to the database
				$manage->add($form_post_data);
				
			}
			
			// Call the appropriate sub template
			$sub_template = $_GET['area'] .'_form';
		
		} else if (isset($_GET['view'])) {
		
			// Are we trying to view something specific?
			$manage->view($_GET['view']);
			
			if (isset($_POST['submit'])) {
			
				// Get our submitted form data
				$form_post_data = array();
				foreach($vars['db_columns'][$_GET['area']] as $db_column) {
					array_push($form_post_data, $_POST[$db_column]);
				}
			
				// Update data in database
				$manage->update($form_post_data, $_GET['view']);	
				
			}
			
			// Call the appropiate sub template
			$sub_template = $_GET['area'] .'_form';
		
		} else {
		
			$sub_template = 'display';
		
		}
	
	} else {
	
		$sub_template = '';
	
	}
	
	load_template('Manage', $sub_template);

}

/**
 * Manage locations
 */
function ManageLocations() {

	load_template('Manage', 'display');

}