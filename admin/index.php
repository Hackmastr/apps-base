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
		$template->set_tab_page_title('Add');
	
		if (isset($_POST['add'])) {
		
			try {
			
				$form_data = array();
			
				foreach($locations->get_db_fields() as $field) {
					array_push($form_data, $template->validate_input($_POST[$field]));
				}
				
				$$tab->add($form_data);
				
				// Redirect back to main page
				header('Location: '. $template->get_option('site_url') .'/admin/index.php?tab='. $tab);
				
			} catch (Exception $e) {
				$template->createMessage('error', $e->getMessage());
			}

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