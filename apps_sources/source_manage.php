<?php
/**
 * Apps manage source file
 */

/**
 * Apps Manage main page
 */
function manage() {

	global $page;
	
	// Build our sub nav and retrieve the sub page
	$page['sub_nav'] = array(
		'manage' => array(
			'title' => 'Manage',
			'function' => 'manage',
			'source' => 'source_manage.php'
		),
		'locations' => array(
			'title' => 'Manage Locations',
			'function' => 'manage_locations',
			'source' => 'source_manage_locations.php'
		),
		'divisions' => array(
			'title' => 'Manage Divisions',
			'function' => 'manage_divisions',
			'source' => 'source_manage_divisions.php'
		),
		'cells' => array(
			'title' => 'Manage Cells',
			'function' => 'manage_cells',
			'source' => 'source_manage_cells.php'
		),
	);
	$src = get_sub_page();
	
	load_template($src);
	
}