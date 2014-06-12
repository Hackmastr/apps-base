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

// Get request vars
$tab = $template->get_var('tab');
$action = $template->get_var('action');
$id = $template->get_var('id');

// Check if a tab is being requested
// Otherwise redirect to locations tab
if ($tab && array_key_exists($tab, $tabs)) {
	
	// Invoke respective class for requested $tab
	$$tab = Bootstrap::$tabs[$tab]();
	
	// Is an action being requested?
	if ($action == 'add') {
	
		$template->set_sub_template('admin_'. $tab, 'edit');
	
		if (isset($_POST['add'])) {
			$$tab->add();

		}
		
	} else if ($action == 'edit') {
	
		$template->set_sub_template('admin_'. $tab, 'edit');
		
		$$tab->setID($id);
	
		if (isset($_POST['update'])) {
			$$tab->update();
		}
	
	} else if ($action == 'delete') {
	
		$$tab->setID($id);
		
		$$tab->delete();
		
	} else {
		
		$template->set_sub_template('admin_'. $tab);
		
	}
	
} else {
	
	header('Location: '. $template->get_option('site_url') .'/admin/index.php?tab=locations');
	
}

load_template('admin');