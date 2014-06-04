<?php

// Setup our app environment
define('APP_PATH', '');
define('APP_SOURCES_PATH', dirname(__FILE__) .'/apps_sources');
define('APP_TEMPLATE_PATH', dirname(__FILE__) .'/apps_template');
require_once('apps_core.php');

/**
 * Initialize the app
 */
function init() {

	global $page;
	
	// Setup our pages array
	$pages = array(
		'home' => array('Home', 'Home.php'),
		'apps' => array('Apps', 'Apps.php'),
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