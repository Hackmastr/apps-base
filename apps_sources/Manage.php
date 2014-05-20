<?php
/**
 * Manages app settings and general corporate information
 */

function Manage() {

	global $page;
	
	// Define areas for this page
	$page['areas'] = array(
		'locations' => array('Manage Locations', 'ManageLocations'),
		'divisions' => array('Manage Divisions', 'ManageDivisions'),
		'cells' => array('Manage Cells', 'ManageCells'),
		'links' => array('Manage Links', 'ManageLinks')
	);
	
	// Has an area been requested?
	if (get_var('area', $page['areas'])) {
	
		// Set the area and template
		$page['area'] = get_var('area');
		$page['template'] = $page['areas'][$_GET['area']][1];
		
		// Determine if a specific action is being requested
		// and call the appropiate function
		if (get_var('add') == 'new') {
			
			// Set the action
			$page['action'] = get_var('add');
			
			// Add item
			Add();
			
		} else if (get_var('view')) {
			
			// Set the action
			$page['action'] = 'view';
			
			// Set id we're viewing
			$page['view_id'] = get_var('view');
			
			// View item
			View();
			
		} else {
		
			// If no action has been requested
			// show the display page
			Display();
			
		}
		
	} else {
		
		// Nothing has been called
		// Display the main manage page
		$page['template'] = 'Manage';
		
		// Set the page title
		$page['title'] = 'Dashboard';
		
	}

	// Load template	
	load_template($page['template'], $page['sub_template']);
	
}

/**
 * Displays summary
 */
function Display() {
	
	global $page, $db;
	
	// Determine which query to execute from $page['area']
	switch($page['area']) {
	
		case 'locations':
		
			// Set the page title
			$page['title'] = 'Manage Locations';
			
			// Query database for results
			$page['db_result'] = $db->select('SELECT id, l.location_name as name, l.location_country as country, l.location_city as city,
				l.location_state as state, l.location_street as street, l.location_zip as zip
				FROM app_locations l');
			
			break;
			
		case 'divisions':
		
			// Set the page title
			$page['title'] = 'Manage Divisions';
			
			// Query database for results
			$page['db_result'] = $db->select('SELECT id, d.division_name as name FROM app_divisions d');
			
			break;
			
		case 'cells':
		
			// Set the page title
			$page['title'] = 'Manage Cells';
			
			// Set our database query
			$page['db_result'] = $db->select('SELECT c.id, c.cell_name as name, c.cell_number as number, d.division_name as division, l.location_name as location, c.cell_iq_connector as iq_connector, c.cell_status as status
				FROM app_cells c
				INNER JOIN app_locations l ON l.id = c.app_location_id
				INNER JOIN app_divisions d ON d.id = c.app_division_id');
			
			break;
			
		case 'links':
		
			// Set the page title
			$page['title'] = 'Manage Links';
			
			// Set our database query
			$page['db_result'] = $db->select('SELECT l.id, l.link_name as name, l.link_description as description, l.link_url as url, l.link_bg_color as bg_color, l.link_order as link_order
				FROM app_links l');
			
			break;
			
	}
	
	// Display error message if nothing was retreived from database
	if (!$page['db_result']) {
		generate_message('error', 'There\'s nothing to display!');
	}
	
	
}

/**
 * Adds new item to database
 */
function Add() {

	global $page, $db;
	
	// Set the sub template
	$page['sub_template'] = 'display';
	
	// Determine which query to execute from $page['area']
	switch($page['area']) {
		
		case 'locations':
		
			// Set the page title
			$page['title'] = 'Add Location';
			
			// Did the form get submitted?
			if (isset($_POST['add'])) {
			
				// Gather our form data and submit to database
				$form_data = array(
					$_POST['location_name'],
					$_POST['location_country'],
					$_POST['location_city'],
					$_POST['location_state'],
					$_POST['location_street'],
					$_POST['location_zip']
				);
				$page['db_result'] = $db->insert('INSERT INTO app_locations (location_name, location_country, location_state, location_city, location_street, location_zip) VALUES(?, ?, ?, ?, ?, ?)', $form_data);
				
				// Was our form submission successful?
				if ($page['db_result']) {
					generate_message('success', 'New location added successfully!');
				} else {
					generate_message('error', 'Something went wrong....');
				}
			
			}
			break;
			
		case 'divisions':
		
			// Set the page title
			$page['title'] = 'Add Division';
			
			// Has the form been submitted?
			if (isset($_POST['add'])) {
			
				// Gather our form data and submit to database
				$form_data = array(
					$_POST['division_name']
				);
				$page['db_result'] = $db->insert('INSERT INTO app_divisions (division_name) VALUES(?)', $form_data);
				
				// Was our form submission successful?
				if ($page['db_result']) {
					generate_message('success', 'New location added successfully!');
				} else {
					generate_message('error', 'Something went wrong....');
				}
			
			}
			break;
			
		case 'cells':
		
			// Set the page title
			$page['title'] = 'Add Cell';
			
			// Get list of divisions
			$page['divisions'] = $db->select('SELECT id, division_name as name FROM app_divisions');
			
			// Get list of locations
			$page['locations'] = $db->select('SELECT id, location_name as name FROM app_locations');
			
			// Has the form been submitted?
			if (isset($_POST['add'])) {
			
				// Gather our form data and submit to database
				$form_data = array(
					$_POST['cell_name'],
					$_POST['cell_number'],
					$_POST['app_division_id'],
					$_POST['app_location_id'],
					$_POST['cell_iq_connector'],
					$_POST['cell_status']
				);
				$page['db_result'] = $db->insert('INSERT INTO app_cells (cell_name, cell_number, app_division_id, app_location_id, cell_iq_connector, cell_status) VALUES(?, ?, ?, ?, ?, ?)', $form_data);
				
				// Was our form submission successful?
				if ($page['db_result']) {
					generate_message('success', 'New cell added successfully!');
				} else {
					generate_message('error', 'Something went wrong....');
				}
			
			}		
			break;
			
		case 'links':
		
			// Set the page title
			$page['title'] = 'Add Link';
			
			// Has the form been submitted?
			if (isset($_POST['add'])) {
			
				// Gather our form data and submit to database
				$form_data = array(
					$_POST['link_name'],
					$_POST['link_description'],
					$_POST['link_url'],
					$_POST['link_bg_color'],
					$_POST['link_order']
				);
				$page['db_result'] = $db->insert('INSERT INTO app_links (link_name, link_description, link_url, link_bg_color, link_order) VALUES(?, ?, ?, ?, ?)', $form_data);
				
				// Was our form submission successful?
				if ($page['db_result']) {
					generate_message('success', 'New link added successfully!');
				} else {
					generate_message('error', 'Something went wrong....');
				}
			
			}		
			break;
		
	}
	
}

/**
 * Views item in database
 */
function View() {
	
	global $page, $db;
	
	// Set the sub template
	$page['sub_template'] = 'display';	
	
	// Determine which query to execute from $page['area']
	switch($page['area']) {
		
		case 'locations':
			
			// Set the page title
			$page['title'] = 'Edit Location';
			
			// Is the form being updated or deleted?
			if (isset($_POST['update'])) {
			
				// Gather our form data and submit to database
				$form_data = array(
					$_POST['location_name'],
					$_POST['location_country'],
					$_POST['location_city'],
					$_POST['location_state'],
					$_POST['location_street'],
					$_POST['location_zip']
				);
				$page['db_result'] = $db->update('UPDATE app_locations SET location_name = ?, location_country = ?, location_city = ?, location_state = ?, location_street = ?, location_zip = ?
					WHERE id = '. $page['view_id'], $form_data);
			
				// Was our form submission successful?
				if ($page['db_result']) {
					generate_message('success', 'Location successfully updated!');
				} else {
					generate_message('error', 'Something went wrong....');
				}
				
			} else if (isset($_POST['delete'])) {
			
				$page['db_result'] = $db->delete('DELETE FROM app_locations WHERE id = '. $page['view_id']);
				
				// Was our form submission successful?
				if ($page['db_result']) {
					generate_message('success', 'Location successfully deleted!');
				} else {
					generate_message('error', 'Something went wrong....');
				}
			
			} else {
				
				// Get database results from $_page['view']
				$page['db_result'] = $db->select('SELECT id, location_name as name, location_country as country, location_city as city, location_state as state, location_street as street, location_zip as zip
					FROM app_locations
					WHERE id = '. $page['view_id'], true);				
			
			}
			break;
			
		case 'divisions':

			// Set the page title
			$page['title'] = 'Edit Division';
			
			// Is the form being updated or deleted?
			if (isset($_POST['update'])) {
			
				// Gather our form data and submit to database
				$form_data = array(
					$_POST['division_name']
				);
				$page['db_result'] = $db->update('UPDATE app_divisions SET division_name = ?
					WHERE id = '. $page['view_id'], $form_data);
			
				// Was the form submission successful?
				if ($page['db_result']) {
					generate_message('success', 'Division successfully updated!');
				} else {
					generate_message('error', 'Something went wrong....');
				}
				
			} else if (isset($_POST['delete'])) {
			
				$page['db_result'] = $db->delete('DELETE FROM app_divisions WHERE id = '. $page['view_id']);
				
				// Was our form submission successful?
				if ($page['db_result']) {
					generate_message('success', 'Division successfully deleted!');
				} else {
					generate_message('error', 'Something went wrong....');
				}
			
			} else {
				
				// Get database results from $_page['view']
				$page['db_result'] = $db->select('SELECT id, division_name as name
					FROM app_divisions
					WHERE id = '. $page['view_id'], true);				
			
			}
			break;
			
		case 'cells':
		
			// Set the page title
			$page['title'] = 'Edit Cell';
			
			// Is the form being updated or deleted?
			if (isset($_POST['update'])) {
			
				// Gather our form data and submit to database
				$form_data = array(
					$_POST['cell_name'],
					$_POST['cell_number'],
					$_POST['app_division_id'],
					$_POST['app_location_id'],
					$_POST['cell_iq_connector'],
					$_POST['cell_status']
				);
				$page['db_result'] = $db->update('UPDATE app_cells SET cell_name = ?, cell_number = ?, app_division_id = ?, app_location_id = ?, cell_iq_connector = ?, cell_status = ?
					WHERE id = '. $page['view_id'], $form_data);
			
				// Was the form submission successful?
				if ($page['db_result']) {
					generate_message('success', 'Cell successfully updated!');
				} else {
					generate_message('error', 'Something went wrong....');
				}
				
			} else if (isset($_POST['delete'])) {
			
				$page['db_result'] = $db->delete('DELETE FROM app_cells WHERE id = '. $page['view_id']);
				
				// Was our form submission successful?
				if ($page['db_result']) {
					generate_message('success', 'Cell successfully deleted!');
				} else {
					generate_message('error', 'Something went wrong....');
				}
			
			} else {
			
				// Get list of divisions
				$page['divisions'] = $db->select('SELECT id, division_name as name FROM app_divisions');
				
				// Get list of locations
				$page['locations'] = $db->select('SELECT id, location_name as name FROM app_locations');
				
				// Get database results from $_page['view']
				$page['db_result'] = $db->select('SELECT id, cell_name as name, cell_number as number, app_division_id as division, app_location_id as location, cell_iq_connector as iq_connector, cell_status as status
					FROM app_cells
					WHERE id = '. $page['view_id'], true);				
			
			}		
			break;
			
		case 'links':
		
			// Set the page title
			$page['title'] = 'Edit Link';
			
			// Is the form being updated or deleted?
			if (isset($_POST['update'])) {
			
				// Gather our form data and submit to database
				$form_data = array(
					$_POST['link_name'],
					$_POST['link_description'],
					$_POST['link_url'],
					$_POST['link_bg_color'],
					$_POST['link_order']
				);
				$page['db_result'] = $db->update('UPDATE app_links SET link_name = ?, link_description = ?, link_url = ?, link_bg_color = ?, link_order = ?
					WHERE id = '. $page['view_id'], $form_data);
			
				// Was the form submission successful?
				if ($page['db_result']) {
					generate_message('success', 'Link successfully updated!');
				} else {
					generate_message('error', 'Something went wrong....');
				}
				
			} else if (isset($_POST['delete'])) {
			
				$page['db_result'] = $db->delete('DELETE FROM app_links WHERE id = '. $page['view_id']);
				
				// Was our form submission successful?
				if ($page['db_result']) {
					generate_message('success', 'Link successfully deleted!');
				} else {
					generate_message('error', 'Something went wrong....');
				}
			
			} else {
				
				// Get database results from $_page['view']
				$page['db_result'] = $db->select('SELECT l.id, l.link_name as name, l.link_description as description, l.link_url as url, l.link_bg_color as bg_color, l.link_order as link_order
				FROM app_links l
				WHERE id = '. $page['view_id'], true);				
			
			}		
			break;
		
	}
	
}