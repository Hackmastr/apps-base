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
require_once('apps_includes/core.vars.php');
require_once('apps_includes/core.functions.php');
require_once('apps_includes/db.class.php');

/**
 * Load the database class
 */
$db = new Database();
 
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
	'area' => '',
	'title' => '',
	'sub_template' => '',
	'has_message' => '',
	'the_message' => '',
	'areas' => array(
		'sub' => array ('', ''),
	),
	'has_action' => '',
	
	'db_result' => array()
);

/**
 * Connect to the database
 */
$db_is_conn;
try {
	$db_conn = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS);
	$db_conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	if (DEBUG) {
		$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	$db_is_conn = true;
} catch (PDOException $e) {
	throw new Exception($e->getMessage());
	$db_is_conn = false;
}

if ($db_is_conn) {
	$db->set_db($db_conn);
}