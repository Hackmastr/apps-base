<?php
/**
 * Ventura Apps site administration panel
 */
 
// Setup our app environment
require_once('../apps_core.php');
$template->set_app_template_path('/apps_template');
$template->set_page_title('Admin CP');

// Set up our tabs array
$tabs = array(
	'locations' => 'Locations',
	'divisions' => 'Divisions',
	'cells' => 'Cells',
	'links' => 'Links',
);

// Get tab from URL
$tab = $template->get_var('tab');

// Is a tab being requested?
if ($tab && array_key_exists($tab, $tabs)) {
	
	$template->set_sub_template('admin_'. $tab);
	
} else {
	
	$template->set_sub_template('admin_locations');
	
}

load_template('admin');