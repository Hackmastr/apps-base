<?php
/**
 * VenturaApps base app main index file
 *
 * Displays dashboard links and the Innolunch menu
 */

####################################################################
#                        App setup & config                        #
####################################################################

require_once 'apps-core.php';

$app = new App();
$app->name = 'Base';
$app->version = '1.0.0';
$app->prefix = 'apps';
$app->url = $options['site_url'];

$template = new Template($options, $app);

$p = get_var ('p');

####################################################################

if ($p == 'zeelunch') {
  
  $menu = get_var('menu');
  
  if ($menu && $menu == 'edit' && isset($_POST['save'])) {
  
  	Innolunch::Save($_POST);
  	redirect($options['site_url'] .'/index.php?p=zeelunch#innolunch');
  
  } 
  
  $template->parent_page = 'zeelunch';
  $template->page_title = 'Zeeland Lunch Schedule';
  load_template('zeelunch');
  
} else {
	
	$template->parent_page = 'home';
  $template->page_title = 'Dashboard';
  load_template('home');
  
}