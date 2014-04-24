<?php

// Setup our app environment
require_once('apps_core.php');
define('APP_URL', SITE_URL .'/');
define('APP_SOURCES_PATH', dirname(__FILE__) .'/apps_sources');
define('APP_TEMPLATES_PATH', dirname(__FILE__) .'/apps_template');

// Load corresponding function from the requested action
call_user_func(apps());

/**
 * The main apps function
 */
function apps() {

	global $page;
	
	// Setup our actions array
	$actions = array(
		'home' => array('home', 'source_home.php'),
		'manage' => array('manage', 'source_manage.php'),
	);

	// If an action has been requested, and it exists in the $actions array
	// call corresponding source file and function
	if (isset($_GET['action']) && array_key_exists($_GET['action'], $actions)) {
	
		require_once(APP_SOURCES_PATH .'/'. $actions[$_GET['action']][1]);
		return $actions[$_GET['action']][0];
	
	} else {
		require_once(APP_SOURCES_PATH .'/'. $actions['home'][1]);
		return $actions['home'][0];
	}
}