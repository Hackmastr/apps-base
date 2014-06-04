<?php
/**
 * Manages app settings and general corporate information
 */

function Manage() {

	global $page;
	
	// Set page parent for main nav highlight
	$page['parent'] = 'manage';
	
	// Build the sub nav
	$page['sub_nav'] = array(
		'parent_page' => array(
			'id' => 'p',
			'name' => 'manage'
		),
		'area' => array(
			array(
				'id' => 'home',
				'name' => 'Home'
			),
			array(
				'id' => 'locations',
				'name' => 'Locations'
			),
			array(
				'id' => 'divisions',
				'name' => 'Division'
			),
			array(
				'id' => 'cells',
				'name' => 'Cells'
			),
			array(
				'id' => 'links',
				'name' => 'Links'
			)
		),
	);
	
	// Set the page area
	$page['area'] = get_var('area');
	
	// Has an area been requested?
	switch (get_var('area')) {
	
		case 'locations':
			ManageLocations();
			break;
		case 'divisions':
			ManageDivisions();
			break;
		case 'cells':
			ManageCells();
			break;
		case 'links':
			ManageLinks();
			break;
		default:
			$page['title'] = 'Manage';
			$page['template'] = 'Manage';
	}

	// Load template	
	load_template($page['template'], $page['sub_template']);
	
}

/**
 * Manage locations source
 */
function ManageLocations() {

	global $page, $db;
	
	// Set the template
	$page['template'] = 'ManageLocations';

	// Are we trying to add or view a category?
	if (get_var('add') == 'new') {
	
		// Set the page action
		$page['action'] = 'add';
	
		// Set the page title and sub template
		$page['title'] = 'Add New Location';
		$page['sub_template'] = 'display';
		
		// Was the form submitted?
		if (isset($_POST['add'])) {
			
			$form_data = get_form_data('location', array('name', 'country', 'city', 'state', 'street', 'zip'));
			$page['db_result'] = $db->insert('INSERT INTO app_locations (location_name, location_country, location_state, location_city, location_street, location_zip) VALUES(?, ?, ?, ?, ?, ?)', $form_data);
			
			// Check results
			if ($page['db_result']) {
				generate_message('success', 'New location added!');
			} else {
				generate_message('error', 'There was an error adding the new location.');
			}		
		
		}
		
	} else if (get_var('view')) {
	
		// Set the page action
		$page['action'] = 'view';
	
		// Set the page title and sub template
		$page['title'] = 'Edit Location';
		$page['sub_template'] = 'display';
		
		// Get location data from database
		$page['db_result'] = $db->select('SELECT id, location_name as name, location_country as country, location_city as city, location_state as state, location_street as street, location_zip as zip
			FROM app_locations
			WHERE id = '. get_var('view'), true);
		
		// Are we trying to update or delete the location?
		if (isset($_POST['update'])) {
			
			$form_data = get_form_data('location', array('name', 'country', 'city', 'state', 'street', 'zip'));
			$page['db_result'] = $db->update('UPDATE app_locations SET location_name = ?, location_country = ?, location_city = ?, location_state = ?, location_street = ?, location_zip = ?
				WHERE id = '. get_var('view'), $form_data);
		
			// Check results
			if ($page['db_result']) {
				generate_message('success', 'Location updated!');
			} else {
				generate_message('error', 'There was an error updating the location.');
			}			
			
		} else if (isset($_POST['delete'])) {
			
			$page['db_result'] = $db->delete('DELETE FROM app_locations WHERE id = '. get_var('view'));
		
			// Check results
			if ($page['db_result']) {
				generate_message('success', 'Location deleted!');
			} else {
				generate_message('error', 'There was an error deleting the location.');
			}			
			
		}
		
	} else {
		
		// Set the page title and sub template
		$page['title'] = 'Manage Locations';
		
		// Set our database query
		$page['db_result'] = $db->select('SELECT id, l.location_name as name, l.location_country as country, l.location_city as city,
			l.location_state as state, l.location_street as street, l.location_zip as zip
			FROM app_locations l');
		
	}
	
}

/**
 * Manage divisions source
 */
function ManageDivisions() {
	
	global $page, $db;
	
	// Set the template
	$page['template'] = 'ManageDivisions';

	// Are we trying to add or view a category?
	if (get_var('add') == 'new') {
	
		// Set the page action
		$page['action'] = 'add';
	
		// Set the page title and sub template
		$page['title'] = 'Add New Division';
		$page['sub_template'] = 'display';
		
		// Was the form submitted?
		if (isset($_POST['add'])) {
			
			$form_data = get_form_data('division', array('name'));
			$page['db_result'] = $db->insert('INSERT INTO app_divisions (division_name) VALUES(?)', $form_data);
			
			// Check results
			if ($page['db_result']) {
				generate_message('success', 'New division added!');
			} else {
				generate_message('error', 'There was an error adding the new division.');
			}		
		
		}
		
	} else if (get_var('view')) {
	
		// Set the page action
		$page['action'] = 'view';
	
		// Set the page title and sub template
		$page['title'] = 'Edit Division';
		$page['sub_template'] = 'display';
		
		// Get location data from database
		$page['db_result'] = $db->select('SELECT id, division_name as name
			FROM app_divisions
			WHERE id = '. get_var('view'), true);
		
		// Are we trying to update or delete the location?
		if (isset($_POST['update'])) {
			
			$form_data = get_form_data('division', array('name'));
			$page['db_result'] = $db->update('UPDATE app_divisions SET division_name = ?
				WHERE id = '. get_var('view'), $form_data);
		
			// Check results
			if ($page['db_result']) {
				generate_message('success', 'Division updated!');
			} else {
				generate_message('error', 'There was an error updating the division.');
			}			
			
		} else if (isset($_POST['delete'])) {
			
			$page['db_result'] = $db->delete('DELETE FROM app_divisions WHERE id = '. get_var('view'));
		
			// Check results
			if ($page['db_result']) {
				generate_message('success', 'Division deleted!');
			} else {
				generate_message('error', 'There was an error deleting the division.');
			}			
			
		}
		
	} else {
		
		// Set the page title and sub template
		$page['title'] = 'Manage Divisions';
		
		// Set our database query
		$page['db_result'] = $db->select('SELECT id, d.division_name as name FROM app_divisions d');
		
	}	
	
}

/**
 * Manage cells source
 */
function ManageCells() {
	
	global $page, $db;
	
	// Set the template
	$page['template'] = 'ManageCells';
	
	// Get list of divisions and cells
	$page['divisions'] = $db->select('SELECT id, division_name as name FROM app_divisions');
	$page['locations'] = $db->select('SELECT id, location_name as name FROM app_locations');

	// Are we trying to add or view a category?
	if (get_var('add') == 'new') {
	
		// Set the page action
		$page['action'] = 'add';
	
		// Set the page title and sub template
		$page['title'] = 'Add New Cell';
		$page['sub_template'] = 'display';
		
		// Was the form submitted?
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
			
			// Check results
			if ($page['db_result']) {
				generate_message('success', 'New cell added!');
			} else {
				generate_message('error', 'There was an error adding the new cell.');
			}		
		
		}
		
	} else if (get_var('view')) {
	
		// Set the page action
		$page['action'] = 'view';
	
		// Set the page title and sub template
		$page['title'] = 'Edit Cell';
		$page['sub_template'] = 'display';
		
		// Get location data from database
		$page['db_result'] = $db->select('SELECT id, cell_name as name, cell_number as number, app_division_id as division, app_location_id as location, cell_iq_connector as iq_connector, cell_status as status
			FROM app_cells
			WHERE id = '. get_var('view'), true);
		
		// Are we trying to update or delete the location?
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
				WHERE id = '. get_var('view'), $form_data);
		
			// Check results
			if ($page['db_result']) {
				generate_message('success', 'Cell updated!');
			} else {
				generate_message('error', 'There was an error updating the cell.');
			}			
			
		} else if (isset($_POST['delete'])) {
			
			$page['db_result'] = $db->delete('DELETE FROM app_cells WHERE id = '. get_var('view'));
		
			// Check results
			if ($page['db_result']) {
				generate_message('success', 'Cell deleted!');
			} else {
				generate_message('error', 'There was an error deleting the cell.');
			}			
			
		}
		
	} else {
		
		// Set the page title and sub template
		$page['title'] = 'Manage Cells';
		
		// Set our database query
		$page['db_result'] = $db->select('SELECT c.id, c.cell_name as name, c.cell_number as number, d.division_name as division, l.location_name as location, c.cell_iq_connector as iq_connector, c.cell_status as status
			FROM app_cells c
			INNER JOIN app_locations l ON l.id = c.app_location_id
			INNER JOIN app_divisions d ON d.id = c.app_division_id');
		
	}	
	
}

/**
 * Manage links source
 */
function ManageLinks() {

	global $page, $db;
	
	// Set the template
	$page['template'] = 'ManageLinks';

	// Are we trying to add or view a category?
	if (get_var('add') == 'new') {
	
		// Set the page action
		$page['action'] = 'add';
	
		// Set the page title and sub template
		$page['title'] = 'Add New Link';
		$page['sub_template'] = 'display';
		
		// Was the form submitted?
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
			
			// Check results
			if ($page['db_result']) {
				generate_message('success', 'New link added!');
			} else {
				generate_message('error', 'There was an error adding the new link.');
			}		
		
		}
		
	} else if (get_var('view')) {
	
		// Set the page action
		$page['action'] = 'view';
	
		// Set the page title and sub template
		$page['title'] = 'Edit Cell';
		$page['sub_template'] = 'display';
		
		// Get location data from database
		$page['db_result'] = $db->select('SELECT l.id, l.link_name as name, l.link_description as description, l.link_url as url, l.link_bg_color as bg_color, l.link_order as link_order
			FROM app_links l
			WHERE id = '. get_var('view'), true);
		
		// Are we trying to update or delete the location?
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
				WHERE id = '. get_var('view'), $form_data);
		
			// Check results
			if ($page['db_result']) {
				generate_message('success', 'Link updated!');
			} else {
				generate_message('error', 'There was an error updating the link.');
			}			
			
		} else if (isset($_POST['delete'])) {
			
			$page['db_result'] = $db->delete('DELETE FROM app_links WHERE id = '. get_var('view'));
		
			// Check results
			if ($page['db_result']) {
				generate_message('success', 'Link deleted!');
			} else {
				generate_message('error', 'There was an error deleting the link.');
			}			
			
		}
		
	} else {
		
		// Set the page title and sub template
		$page['title'] = 'Manage Links';
		
		// Set our database query
		$page['db_result'] = $db->select('SELECT l.id, l.link_name as name, l.link_description as description, l.link_url as url, l.link_bg_color as bg_color, l.link_order as link_order
			FROM app_links l');
		
	}

}