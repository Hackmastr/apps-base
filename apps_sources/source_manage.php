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
			'function' => 'locations',
			'file' => 'manage_locations.php'
		),
		'cells' => array(
			'name' => 'Manage Cells',
			'page' => 'manage',
			'function' => 'cells',
			'file' => 'manage_cells.php'
		),
	);
	create_actions($page['actions']);
	
	//call_user_func($page['actions'][$_GET['action']]['function']);
	
	// Load the template
	load_template('manage');

}