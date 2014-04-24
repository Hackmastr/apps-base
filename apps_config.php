<?php
/**
 * Site configuration
 */

/**
 * Set the site's title
 */
define('SITE_TITLE', 'Ventura Apps');

/**
 * Set the site's URL
 */
define('SITE_URL', '//localhost/apps');

/**
 * Set the site's path
 */
define('SITE_PATH', dirname(__FILE__) .'/');

/**
 * Set the site's template path
 */
define('SITE_TEMPLATE_PATH', SITE_PATH .'/apps_template');

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
define('DEBUG', true);