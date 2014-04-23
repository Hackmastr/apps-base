<?php
/**
 * Apps core file. This loads the entire Apps site enviroment
 * which will be used by all included apps
 */

/**
 * Define the relative path to this file
 */
define('ABS_PATH', dirname(__FILE__) .'/');

/**
 * Get required files
 */
require_once('apps_version.php');
require_once('apps_config.php');
require_once('apps_includes/functions_api.php');
require_once('apps_includes/functions_theme.php');

/**
 * Define a $page array to store page details
 */
$page = array(
	'title' => '',
);

/**
 * Connect to the database
 */
$db_conn;
try {
	$database = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS);
	if (DEBUG) {
		$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	$db_conn = true;
} catch (PDOException $e) {
	throw new Exception($e->getMessage());
	$db_conn = false;
}