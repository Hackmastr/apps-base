<?php
/**
 * Ventura Apps site administration panel
 */
 
// Setup our app environment
require_once('apps-core.php');
$template->set_app_template_path('/apps_template');
$template->set_page_title('Admin CP');
$template->setParentPage('admin');

require_once('apps_includes/functions-admin-template.php');

// Set up our tabs array
$allowed_tabs = array(
	'locations' => 'Locations',
	'divisions' => 'Divisions',
	'cells' => 'Cells',
	'links' => 'Links',
);

// Get request vars
$tab = get_var('tab');
$action = get_var('action');
$id = get_var('id');

// Check if a tab is being requested
// Otherwise redirect to locations tab
if ($tab && array_key_exists($tab, $allowed_tabs)) {
	
	// Invoke necessary classes
	$locations = Bootstrap::Load('Locations');
	$divisions = Bootstrap::Load('Divisions');
	$cells = Bootstrap::Load('cells');
	$links = Bootstrap::Load('links');
	
	if (get_var('action') == 'add' || get_var('action') == 'edit' || get_var('action') == 'delete') {
		
		// If we're editing or deleting an item, set the ID
		if (get_var('action') == 'edit' || get_var('action') == 'delete') {
			$$tab->setID(get_var('id'));
		}
		
		try {
			// Has the form been submitted?
			if (isset($_POST['submit'])) {
				$result = $$tab->submitData($_POST);
				if ($result) {
					create_message('success', 'Successfully '. (get_var('action') == 'add' ? 'added' : 'saved') .' '. rtrim($tab, 's') .'.');
					$template->redirect($template->get_option('site_url') .'/admin.php?tab='. get_var('tab'));
				} else {
					create_message('error', 'Something has gone wrong...');
				}
			} else if (get_var('action') == 'delete') {
				$$tab->deleteData();
				create_message('success', 'Successfully deleted '. rtrim($tab, 's') .'.');
				$template->redirect($template->get_option('site_url') .'/admin.php?tab='. get_var('tab'));
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		
	}
	
	load_template('admin-'. $tab);
	
} else {

	load_template('admin');
	
}