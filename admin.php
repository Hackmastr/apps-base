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
		'url' => $options['site_url'] .'/admin.php?area=roles',
		'template' => 'role'
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

if ($area) {

	switch ($area) {
		
		case 'roles':
			if ($action == 'add') {
				$template->page_title = 'Add New Role';
				if (isset($_POST['submit'])) {
					Role::addRole($_POST);
					redirect($options['site_url'] .'/admin.php?area='. $area);
				}
			} else if ($action == 'view') {
				$template->page_title = 'View Role';
				if (isset($_POST['submit'])) {
					Role::saveRole($id, $_POST);
					redirect($options['site_url'] .'/admin.php?area='. $area);
				}
				if (isset($_POST['delete'])) {
					Role::deleteRole($id);
					redirect($options['site_url'] .'/admin.php?area='. $area);
				}
			} else {
				$template->page_title = 'Manage Roles';
			}
			break;
		case 'users':
			if ($action == 'add') {
				$template->page_title = 'Add New User';
				if (isset($_POST['submit'])) {
					User::addUser($_POST);
					redirect($options['site_url'] .'/admin.php?area='. $area);
				}
			} else if ($action == 'view') {
				$template->page_title = 'View User';
				if (isset($_POST['submit'])) {
					User::saveUser($id, $_POST);
					redirect($options['site_url'] .'/admin.php?area='. $area);
				}
				if (isset($_POST['delete'])) {
					User::deleteUser($id);
					redirect($options['site_url'] .'/admin.php?area='. $area);
				}
			} else {
				$template->page_title = 'Manage Users';
			}
			break;		
		
	}
	
	load_template('admin-'. $template->subnav[$area]['template']);

} else {
	$template->page_title = 'Admin Dashboard';
	load_template('admin-dashboard');
}