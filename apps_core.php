<?php
/**
 * Apps core file. This loads the entire Apps site enviroment
 * which will be used by all included apps
 */
 
define('APPS_CORE_VERSION', '1.0-alpha');

/**
 * Get required files
 */
require_once('apps_config.php');
require_once('apps_includes/functions-general-template.php');
require_once('apps_includes/core.functions.php');
require_once('apps_includes/class_database.php');
require_once('apps_includes/class_bootstrap.php');
require_once('apps_includes/class_template.php');

/**
 * Start database connection
 */
$database = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
Bootstrap::$db = $database;

/**
 * Begin template
 */
$template = new Template($site_options);

/**
 * Define a $page array to store page details
 */
$page = array(
	'action' => '',
	
	'parent' => '',
	
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
	'locations' => array(),
	
	// New
	'sub_nav' => array(),
	'tabbed_nav' => array(),
	'tab_selected' => false,
);