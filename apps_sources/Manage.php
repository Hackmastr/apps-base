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

	global $page, $vars, $db;

	// Build the manage menu
	// $area => $title
	$page['areas'] = array(
		'locations' => array('Manage Locations', 'Location'),
		'divisions' => array('Manage Divisions', 'Division'),
		'cells' => array('Manage Cells', 'Cell')
	);
	
	// Has a specific area from the list above been requested?
	if (get_var('area', $page['areas'])) {
			
		// Set the area we're working with
		$db->set_area($_GET['area']);
		
		// Set the necessary database columns
		$db->set_db_columns($vars['db_columns'][$_GET['area']]);
		
		// Are we trying to add something?
		if (get_var('add') == 'new') {
		
			// Set the page title
			$page['title'] = 'Add New '. $page['areas'][$_GET['area']][1];
		
			// Set the action
			$page['action'] = 'add';
		
			// Has the form been submitted?
			if (isset($_POST['submit'])) {
			
				// Get our submitted form data
				$form_post_data = array();
				foreach($vars['db_columns'][$_GET['area']] as $db_column) {
					array_push($form_post_data, $_POST[$db_column]);
				}
			
				// Submit to the database
				$db->add($form_post_data);
				
			}
			
			// Call the appropriate sub template
			$page['sub_template']  = 'manage_form';
		
		} else if (get_var('view')) {
		
			// Set the action
			$page['action'] = 'view';
		
			// Are we trying to view something specific?
			$db->view($_GET['view']);
			
			// Are trying to update something?
			if (isset($_POST['update'])) {
			
				// Get our submitted form data
				$form_post_data = array();
				foreach($vars['db_columns'][$_GET['area']] as $db_column) {
					array_push($form_post_data, $_POST[$db_column]);
				}
			
				// Update data in database
				$db->update($form_post_data, $_GET['view']);	
				
			}
			
			// Are we trying to delete something?
			if (isset($_POST['delete'])) {
				
				$db->delete($_GET['view']);
				
			}
			
			// Call the appropiate sub template
			$page['sub_template'] = 'manage_form';
			
		} else {
		
			// Set the page title
			$page['title'] = $page['areas'][$_GET['area']][0];
		
			// Load sub template
			$page['sub_template']  = 'display';
		
		}
	
	} else {
		
		$page['title'] = 'Manage Dashboard';
		
	}
	
	load_template('Manage', $page['sub_template']);

}