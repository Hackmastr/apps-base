<?php
/**
 * Apps home page source file
 */

/**
 * Home page
 */
function home() {

	global $page;
	
	// Set page parent for main nav highlight
	$page['parent'] = 'home';
	
	$page['title'] = 'Dashboard';

	load_template('home');

}