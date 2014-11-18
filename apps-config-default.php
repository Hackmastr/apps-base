<?php
/**
 * Site configuration
 */

$options = array(
	'site_title' => 'Ventura Apps',
	'site_url' => 'http://localhost/projects/ventura/apps',
	'site_path' => dirname(__FILE__) .'/',
	'apps_directory' => dirname(__FILE__) .'/a/',
	'email_host' => '',
	'email_port' => '25',
	'email_from' => '',
	'email_from_name' => '',
	'email_username' => '',
	'email_password' => ''
);

/**
 * Define database connection settings
 */
define('DB_HOST', 'localhost');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_CONNECTION_TYPE', '');

/**
 * Turn on or off dev mode
 * true/false
 */
define('DEV_MODE', true);