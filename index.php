<?php
/**
 * Main page to Ventura Apps
 */

// Setup our app environment
require_once('apps-core.php');
$template->set_app_template_path('/apps_template');
$template->set_page_title('Home');
	
load_template('home');