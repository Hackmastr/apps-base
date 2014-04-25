<?php
/**
 * Apps manage source file
 */

/**
 * Apps Manage main page
 */
function manage() {

	global $page;
	
	// Build our sub nav
	$page['sub_nav'] = array(
		'managelocations' => array(
			'title' => 'Manage Locations',
			'function' => 'manage_locations',
			'source' => 'manage_locations.php'
		),
		'managedivisions' => array(
			'title' => 'Manage Divisions',
			'function' => 'manage_divisions',
			'source' => 'manage_divisions.php'
		),
		'managecells' => array(
			'title' => 'Manage Cells',
			'function' => 'manage_cells',
			'source' => 'manage_cells.php'
		),
	);

	load_template('manage');
	
}