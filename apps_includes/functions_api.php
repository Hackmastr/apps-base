<?php
/**
 * Apps API
 */

$api_actions = array();
 
/**
 * Loads actions into head
 */
function apps_head() {

	global $api_actions;
	
	foreach($api_actions as $api_action) {
		echo $api_action;
	}
	
}
 
/**
 * Adds stylesheet to head
 */
function add_stylesheet($src) {

	global $api_actions;
	
	// Format our style tag string
	$tag = '<link rel="stylesheet" type="text/css" href="'. $src .'" />';

	// Add stylesheet to $api_actions
	array_push($api_actions, $tag);

}