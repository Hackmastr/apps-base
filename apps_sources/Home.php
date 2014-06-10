<?php
/**
 * Apps home page source file
 */

/**
 * Home page
 */
function home() {

	global $template;

	$template->set_page_title('Home');
	
	load_template('home');

}