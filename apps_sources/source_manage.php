<?php
/**
 * Apps manage source file
 */

/**
 * Apps Manage main page
 */
function manage() {

	global $page;
	
	// Load the manage template
	load_template('manage');
	
	// Get the requested page var
	$sub = get_var('sub');
	$action = get_var('action');
	
	// Build our sub and actions nav and retrieve the sub page
	$page['sub_nav'] = array(
		'manage' => array(
			'title' => 'Manage',
			'function' => 'manage',
			'source' => 'source_manage.php'
		),
		'locations' => array(
			'title' => 'Manage Locations',
			'function' => 'manage_locations',
			'source' => 'source_manage_locations.php',
			'actions' => array(
				'add' => array(
					'title' => 'Add',
					'function' => 'add_location',
					'source' => 'source_manage_location.php'
				),
			),
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
	
	$sub_page = get_sub_page($sub);
	$page_action = get_page_action($action);
	
	// Load the required source file for the sub page being requested
	require_once(APP_SOURCES_PATH .'/'. $page['sub_nav'][$sub]['source']);
	
	// Call the corresponding function from $sub
	call_user_func($page['sub_nav'][$sub]['function']);
	
}