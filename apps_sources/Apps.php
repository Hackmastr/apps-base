<?php
/**
 * Source file for apps overview page
 */

/**
 * Apps page
 */
function apps() {

	global $page;
	
	// Set page parent for main nav highlight
	$page['parent'] = 'apps';
	
	$page['title'] = 'Dashboard';

	load_template('apps');

}