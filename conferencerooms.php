<?php
/**
* VenturaApps updates page
*/

####################################################################
#                        App setup & config                        #
####################################################################

require_once 'apps-core.php';

$app = new App();
$app->name = 'Base';
$app->prefix = 'apps';
$app->url = $options['site_url'];

$template = new Template($options, $app);

####################################################################

$template->page_title = 'Conference Rooms';
load_template('conferencerooms');
