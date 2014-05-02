<?php

// Setup our app environment
require_once('apps_core.php');
define('APP_URL', SITE_URL .'');
define('APP_SOURCES_PATH', dirname(__FILE__) .'/apps_sources');
define('APP_TEMPLATE_PATH', dirname(__FILE__) .'/apps_template');

// Load the manage class
require_once('apps_includes/Manage.class.php');
$manage = new Manage();
$manage->set_db($db);

// Load base vars
require_once('apps_includes/Base.vars.php');

// Load corresponding function from the requested page
call_user_func(apps());

/**
 * The main apps function
 */
function apps() {

	global $page;
	
	// Setup our pages array
	$pages = array(
		'home' => array('Home', 'Home.php'),
		'manage' => array('Manage', 'Manage.php')
	);

	// If a page has been requested, and it exists in the $pages array
	// call corresponding source file and function
	if (isset($_GET['p']) && array_key_exists($_GET['p'], $pages)) {
	
		require_once(APP_SOURCES_PATH .'/'. $pages[$_GET['p']][1]);
		return $pages[$_GET['p']][0];
	
	} else {
		require_once(APP_SOURCES_PATH .'/'. $pages['home'][1]);
		return $pages['home'][0];
	}
	
}