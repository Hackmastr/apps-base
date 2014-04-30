<?php
/**
 * Apps home page source file
 */

/**
 * Home page
 */
function home() {

	global $page;
	
	$page['title'] = 'Dashboard';

	load_template('home');

}