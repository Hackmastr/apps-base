<?php
/**
 * Ventura Apps site administration panel
 *
 * @author Keith Brinks <keith.brinks@venturmfg.com>
 * @since 1.0.0
 */

####################################################################
#                        App setup & config                        #
####################################################################

require_once 'apps-core.php';

$app = new App();
$app->name = 'Base';
$app->version = '1.0.0';
$app->prefix = 'apps';
$app->url = $options['site_url'];

$template = new Template($options, $app);

####################################################################

// Include necessary files
require_once 'apps_includes/functions-admin.php';

// Build subnav
$template->subnav = array(
	'dashboard' => array(
		'title' => 'Dashboard',
		'url' => $options['site_url'] .'/admin.php'
	),
	'locations' => array(
		'title' => 'Locations',
		'url' => $options['site_url'] .'/admin.php?area=locations'
	),
	'divisions' => array(
		'title' => 'Divisions',
		'url' => $options['site_url'] .'/admin.php?area=divisions'
	),
	'cells' => array(
		'title' => 'Cells',
		'url' => $options['site_url'] .'/admin.php?area=cells'
	),
	'links' => array(
		'title' => 'Links',
		'url' => $options['site_url'] .'/admin.php?area=links'
	),
	'roles' => array(
		'title' => 'Roles',
		'url' => $options['site_url'] .'/admin.php?area=roles'
	),
	'users' => array(
		'title' => 'Users',
		'url' => $options['site_url'] .'/admin.php?area=users',
		'template' => 'user'
	)
);

// Get request vars
$id = get_var('id');
$area = get_var('area');
$action = get_var('action');

// Is a specific area being requested?
if ($area) {

	if ($action == 'add') {
	
		// Has the form been submitted?
		if (isset($_POST['submit'])) {
			
			switch ($area) {
				case 'users':
					User::addUser($_POST);
					break;
			}
			
			redirect($options['site_url'] .'/admin.php?area='. $area);
			
		}
		
		$template->page_title = 'Add New User';
		
	} else if ($action == 'view') {
	
		// Has the form been submitted?
		if (isset($_POST['submit'])) {
			
			switch ($area) {
				case 'users':
					User::saveUser($id, $_POST);
					break;
			}
			
			redirect($options['site_url'] .'/admin.php?area='. $area);
			
		} else if (isset($_POST['delete'])) {
			
			switch ($area) {
				case 'users':
					User::deleteUser($id);
					break;
			}
			
			redirect($options['site_url'] .'/admin.php?area='. $area);
			
		}
		
		$template->page_title = 'View User';
		
	}
	
	load_template('admin-'. $template->subnav[$area]['template']);

} else {

	load_template('admin-dashboard');
	
}