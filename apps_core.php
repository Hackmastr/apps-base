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
require_once('apps_includes/functions.php');

/**
 * Load the index template file
 * I don't know how else to do this...
 */
require_once(SITE_PATH .'/apps_template/Index.template.php');

/**
 * Define a $page array to store page details
 */
$page = array(
	'title' => '',
	'has_message' => '',
	'the_message' => '',
	'areas' => array(
		'sub' => array ('', ''),
	),
	'actions' => array(),
);

/**
 * Connect to the database
 */
$db_conn;
try {
	$db = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS);
	if (DEBUG) {
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	$db_conn = true;
} catch (PDOException $e) {
	throw new Exception($e->getMessage());
	$db_conn = false;
}