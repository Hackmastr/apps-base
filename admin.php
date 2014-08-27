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
	'roles' => 'Roles',
	'users' => 'Users'
);

// Get request vars
$area = get_var('area');
$action = get_var('action');
$id = get_var('id');

// Check if a tab is being requested
// Otherwise redirect to locations tab
if ($area && array_key_exists($area, $allowed_tabs)) {
	
	// Invoke necessary classes
	$locations = Bootstrap::Load('Locations');
	$divisions = Bootstrap::Load('Divisions');
	$cells = Bootstrap::Load('cells');
	$links = Bootstrap::Load('links');
	$roles = Bootstrap::Load('roles');
	$users = Bootstrap::Load('users');
	
	if (get_var('action') == 'add' || get_var('action') == 'edit' || get_var('action') == 'delete') {
		
		// If we're editing or deleting an item, set the ID
		if (get_var('action') == 'edit' || get_var('action') == 'delete') {
			$$area->setID(get_var('id'));
		}
		
		try {
			// Has the form been submitted?
			if (isset($_POST['submit'])) {
				$result = $$area->submitData((get_var('action') == 'add' ? 'insert' : 'update'), $_POST);
				if ($result) {
					create_message('success', 'Successfully '. (get_var('action') == 'add' ? 'added' : 'saved') .' '. rtrim($area, 's') .'.');
					$template->redirect($template->get_option('site_url') .'/admin.php?area='. get_var('area'));
				} else {
					create_message('error', 'Something has gone wrong...');
				}
			} else if (get_var('action') == 'delete') {
				$$area->deleteData();
				create_message('success', 'Successfully deleted '. rtrim($area, 's') .'.');
				$template->redirect($template->get_option('site_url') .'/admin.php?area='. get_var('area'));
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		
	}
	
	load_template('admin-'. $area);
	
} else {

	load_template('admin');
	
}