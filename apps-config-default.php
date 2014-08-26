<?php
/**
 * Site configuration
 */

$site_options = array(
	'site_title' => 'Ventura Apps',
	'site_url' => '//localhost/apps',
	'site_path' => dirname(__FILE__) .'/',
	'site_template_path' => dirname(__FILE__) .'/apps_template',
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
define('DB_NAME', 'ventura_apps');
define('DB_USER', 'root');
define('DB_PASS', '');

/**
 * Turn on or off debug mode
 * true/false
 */
define('DEBUG', false);