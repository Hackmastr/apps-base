<?php
/**
 * Apps manage source file
 */

/**
 * Apps Manage main page
 */
function manage() {

	global $page;
	
	// Set the page's title
	$page['title'] = 'Manage';
	
	// Setup the actions menu
	$page['actions'] = array(
		'locations' => array(
			'name' => 'Manage Locations',
			'page' => 'manage',
			'link' => 'locations',
			'function' => 'manage_locations',
			'file' => 'manage_locations.php'
		),
		'divisions' => array(
			'name' => 'Manage Divisions',
			'page' => 'manage',
			'link' => 'divisions',
			'function' => 'manage_divisions',
			'file' => 'manage_divisions.php'
		),
		'cells' => array(
			'name' => 'Manage Cells',
			'page' => 'manage',
			'link' => 'cells',
			'function' => 'manage_cells',
			'file' => 'manage_cells.php'
		),
	);
	$sub = create_actions('sub', $page['actions']);
	
	// Call corresponding function from $sub
	call_user_func($page['actions'][$_GET['sub']]['function']);
	
	// Load the template
	load_template('manage');

}