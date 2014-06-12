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

// Check if a tab is being requested
// Otherwise redirect to locations tab
if ($tab && array_key_exists($tab, $tabs)) {
	
	$template->set_sub_template('admin_'. $tab);
	
} else {
	
	header('Location: '. $template->get_option('site_url') .'/admin/index.php?tab=locations');
	
}

load_template('admin');