<?php
/**
 * Main page to Ventura Apps
 */

// Setup our app environment
require_once('apps-core.php');
$template->set_app_template_path('/apps_template');
$template->set_page_title('Home');
$template->setParentPage('home');

require_once('apps_includes/functions-dashboard-template.php');
$links = Bootstrap::Load('Links');
	
load_template('home');