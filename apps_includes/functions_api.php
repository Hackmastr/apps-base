<?php
/**
 * Apps API
 */

$api_head_actions = array();
$api_menu_actions = array();
 
/**
 * Loads actions into head
 */
function apps_head() {

	global $api_head_actions;
	
	foreach($api_head_actions as $api_head_action) {
		echo $api_head_action;
	}
	
}
 
/**
 * Adds stylesheet to head
 */
function add_stylesheet($src) {

	global $api_head_actions;
	
	// Format our style tag string
	$tag = '<link rel="stylesheet" type="text/css" href="'. $src .'" />';

	// Add stylesheet to $api_actions
	array_push($api_head_actions, $tag);

}

/**
 * Creates actions
 */
function create_actions($arg, $actions) {

	global $page, $api_menu_actions;

	// Check if action has been set
	if (isset($_GET[$arg]) && array_key_exists($_GET[$arg], $actions)) {
	
		// Build our actions menu
		foreach($actions as $action) {
		
			$api_menu_actions = array(
			);
		
		}
		
		// Set the page title
		$page['title'] = $actions[$_GET[$arg]]['name'];
		
		// Get required file
		if (file_exists(APP_SOURCES_PATH .'/'. $actions[$_GET[$arg]]['file'])) {
			require(APP_SOURCES_PATH .'/'. $actions[$_GET[$arg]]['file']);
			return $actions[$_GET[$arg]]['function'];
		} else {
			$page['error'] = 'Source file doesn\'t exist!';
		}
	
	} else {
	
		$page['error'] = 'Page not found.';
	
	}

}

/**
 * Prints actions menu
 * @todo Refactor to use $api_menu_actions
 */
function get_actions_menu() {

	global $api_menu_actions;

	/*global $page;
	
	$menu = '<ul>';
	
	foreach($page['actions'] as $action) {
		
		$active = (isset($_GET['action']) && $_GET['action'] == $action['link']) ? ' class="active"' : '';
		$menu .= '<li'. $active .'><a href="'. APP_URL .'index.php?p='. $action['page'] .'&action='. $action['link'] .'">'. $action['name'] .'</a></li>';
		
	}
	
	$menu .= '</ul>';
	
	echo $menu;*/
	
	print_r($api_menu_actions);

}