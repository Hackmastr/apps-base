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
$template->parent_page = 'admin';

####################################################################

// Check if user is logged in and is admin
if (!$usr->isLoggedIn()) {
	
	$template->page_title = 'Login';
	load_template('login');
	
} else if (!User::getUser($usr->getID())->isAdmin()) {
	
	$template->page_title = 'Error';
	create_message('danger', 'You do not have permission to view this page.');
	load_template('error');
	
} else {

	// Build subnav
	$template->subnav = array(
		'area' => array(
			'dashboard' => array(
				'title' => 'Dashboard',
				'url' => $options['site_url'] .'/admin.php',
				'template' => 'dashboard'
			),
			'locations' => array(
				'title' => 'Locations',
				'url' => $options['site_url'] .'/admin.php?area=locations',
				'template' => 'location'
			),
			'divisions' => array(
				'title' => 'Divisions',
				'url' => $options['site_url'] .'/admin.php?area=divisions',
				'template' => 'division'
			),
			'cells' => array(
				'title' => 'Cells',
				'url' => $options['site_url'] .'/admin.php?area=cells',
				'template' => 'cell'
			),
			'links' => array(
				'title' => 'Links',
				'url' => $options['site_url'] .'/admin.php?area=links',
				'template' => 'link'
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
		)
	);
	
	// Get request vars
	$id = get_var('id');
	$area = get_var('area');
	$action = get_var('action');
		
	if ($area) {
	
		switch ($area) {
			
			case 'locations':
				if ($action == 'add') {
					$template->page_title = 'Add New Location';
					if (isset($_POST['submit'])) {
						Location::addLocation($_POST);
						redirect($options['site_url'] .'/admin.php?area='. $area);
					}
				} else if ($action == 'view') {
					$template->page_title = 'View Location';
					if (isset($_POST['submit'])) {
						Location::saveLocation($id, $_POST);
						redirect($options['site_url'] .'/admin.php?area='. $area);
					}
					if (isset($_POST['delete'])) {
						Location::deleteLocation($id);
						redirect($options['site_url'] .'/admin.php?area='. $area);
					}
				} else {
					$template->page_title = 'Manage Locations';
				}
				break;
			case 'divisions':
				if ($action == 'add') {
					$template->page_title = 'Add New Division';
					if (isset($_POST['submit'])) {
						Division::addDivision($_POST);
						redirect($options['site_url'] .'/admin.php?area='. $area);
					}
				} else if ($action == 'view') {
					$template->page_title = 'View Division';
					if (isset($_POST['submit'])) {
						Division::saveDivision($id, $_POST);
						redirect($options['site_url'] .'/admin.php?area='. $area);
					}
					if (isset($_POST['delete'])) {
						Division::deleteDivision($id);
						redirect($options['site_url'] .'/admin.php?area='. $area);
					}
				} else {
					$template->page_title = 'Manage Divisions';
				}
				break;
			case 'cells':
				if ($action == 'add') {
					$template->page_title = 'Add New Cell';
					if (isset($_POST['submit'])) {
						Cell::addCell($_POST);
						redirect($options['site_url'] .'/admin.php?area='. $area);
					}
				} else if ($action == 'view') {
					$template->page_title = 'View Cell';
					if (isset($_POST['submit'])) {
						Cell::saveCell($id, $_POST);
						redirect($options['site_url'] .'/admin.php?area='. $area);
					}
					if (isset($_POST['delete'])) {
						Cell::deleteCell($id);
						redirect($options['site_url'] .'/admin.php?area='. $area);
					}
				} else {
					$template->page_title = 'Manage Cells';
				}
				break;
			case 'links':
				if ($action == 'add') {
					$template->page_title = 'Add New Link';
					if (isset($_POST['submit'])) {
						Link::addLink($_POST);
						redirect($options['site_url'] .'/admin.php?area='. $area);
					}
				} else if ($action == 'view') {
					$template->page_title = 'View Link';
					if (isset($_POST['submit'])) {
						Link::saveLink($id, $_POST);
						redirect($options['site_url'] .'/admin.php?area='. $area);
					}
					if (isset($_POST['delete'])) {
						Link::deleteLink($id);
						redirect($options['site_url'] .'/admin.php?area='. $area);
					}
				} else {
					$template->page_title = 'Manage Links';
				}
				break;
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
		
		load_template('admin-'. $template->subnav['area'][$area]['template']);
	
	} else {
		$template->page_title = 'Admin Dashboard';
		load_template('admin-dashboard');
	}

}
