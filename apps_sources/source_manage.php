<?php
/**
 * Apps manage source file
 */

/**
 * Apps Manage main page
 */
function manage() {

	global $page;
	
	$page['title'] = 'Manage';

	load_template('manage');

}