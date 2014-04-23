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
require_once('apps_includes/functions_theme.php');

/**
 * Define a $page array to store page details
 */
$page = array(
	'title' => '',
);