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
		'locations' => array('Manage Locations', 'ManageLocations'),
		'divisions' => array('Manage Divisions', 'ManageDivisions')
	);
	
	// Has a specific area from the list above been requested?
	if (get_var('area', $page['areas'])) {
			
		// Set the area we're working with
		$db->set_area($_GET['area']);
		
		// Set the necessary database columns
		$db->set_db_columns($vars['db_columns'][$_GET['area']]);
		
		// Are we trying to add something?
		if (get_var('add') == 'new') {
		
			// Has the form been submitted?
			if (isset($_POST['submit'])) {
			
				// Get our submitted form data
				$form_post_data = array();
				foreach($vars['db_columns'][$_GET['area']] as $db_column) {
					array_push($form_post_data, $_POST[$db_column]);
				}
			
				// Submit to the database
				$db->add($form_post_data);
				header('Location: '. SITE_URL .'/index.php?p=manage&area='. $_GET['area']);
				
			}
			
			// Call the appropriate sub template
			$sub_template = $_GET['area'] .'_form';
		
		} else if (get_var('view')) {
		
			// Are we trying to view something specific?
			$db->view($_GET['view']);
			
			if (isset($_POST['submit'])) {
			
				// Get our submitted form data
				$form_post_data = array();
				foreach($vars['db_columns'][$_GET['area']] as $db_column) {
					array_push($form_post_data, $_POST[$db_column]);
				}
			
				// Update data in database
				$db->update($form_post_data, $_GET['view']);	
				
			}
			if (isset($_POST['delete'])) {
				
				$db->delete($_GET['view']);
				header('Location: '. SITE_URL .'/index.php?p=manage&area='. $_GET['area']);
				
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