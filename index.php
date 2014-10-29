<?php

/**
 * VenturaApps Base App
 *
 * @author Keith Brinks <keith.brinks@venturamfg.com>
 * @version 1.0.0
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
$template->parent_page = 'home';

####################################################################
	
load_template('home');