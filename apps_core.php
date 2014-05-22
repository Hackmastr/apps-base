<?php
/**
 * Apps core file. This loads the entire Apps site enviroment
 * which will be used by all included apps
 */

/**
 * Get required files
 */
require_once('apps_version.php');
require_once('apps_config.php');
require_once('apps_includes/core.functions.php');
require_once('apps_includes/db.class.php');

define('APP_URL', SITE_URL .'/'. APP_PATH);

/**
 * Start database connection
 */
$db = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
 
/**
 * Load the index template file
 * I don't know how else to do this...
 */
require_once(SITE_PATH .'/apps_template/Index.template.php');

/**
 * Define a $page array to store page details
 */
$page = array(
	'action' => '',
	
	'areas' => array(),
	'area' => '',
	'view_id' => '',
	
	'tabs' => array(),
	
	'title' => '',
	'template' => '',
	'sub_template' => '',
	'stylesheets' => array(),
	
	'has_message' => '',
	'the_message' => '',
	
	'db_result' => array(),
	'cells' => array(),
	'divisions' => array(),
	'locations' => array()
);

/**
 * App initializer
 */
call_user_func(init());