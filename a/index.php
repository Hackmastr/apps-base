<?php
/**
 * Ventura Apps apps overview page
 */
// Setup our app environment
require_once('../apps-core.php');
$template->set_app_template_path('/apps_template');
$template->set_page_title('Apps');
$template->setParentPage('apps');

load_template('apps-dashboard');