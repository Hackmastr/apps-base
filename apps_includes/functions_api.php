<?php
/**
 * Apps API
 */

$api_head_actions = array();
 
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