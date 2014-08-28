<?php
/**
 * Main page to Ventura Apps
 */

// Setup our app environment
define('APP_NAME', 'apps');
require_once('apps-core.php');
$template->set_app_template_path('/apps_template');
$template->set_page_title('Home');
$template->setParentPage('home');

require_once('apps_includes/functions-dashboard-template.php');
$links = Bootstrap::Load('Links');
$innolunch = Bootstrap::Load('Innolunch');

$template->addScript('<link rel="stylesheet" type="text/css" href="'. $template->get_option('site_url') .'/apps_template/base.css" />');
	
load_template('home');