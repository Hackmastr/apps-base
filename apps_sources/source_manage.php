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
		'managecells' => array(
			'title' => 'Manage Cells',
			'function' => 'manage_cells',
			'source' => 'manage_cells.php'
		),
	);

	load_template('manage');
	
}