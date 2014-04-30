<?php
/**
 * Source file for managing divisions
 */

/**
 * Main manage diviions function
 * This will get called every time the manage divisions
 * page is requested.
 */
function Divisions() {
	
	global $page;

	// Build our actions menu
	// $action => $function_to_call
	$actions = array(
		'view' => 'View',
		'add' => 'Add',
		'update' => 'Update',
		'delete' => 'Delete'
	);
	
	// Check if an action is being requested and
	// whether or not it exists in the actions array
	if (isset($_GET['action']) && array_key_exists($_GET['action'], $actions)) {
	
		// Call the action being requested
		call_user_func($actions[$_GET['action']]);
		
		// Set our page title
		$page['title'] = 'Add New Division';
		
		// Set the sub template
		$page['sub_template'] = 'Add';
		
		// Load template
		load_template('ManageDivisions');
	
	} else {
	
		// Set our page title
		$page['title'] = 'Manage Divisions';
	
		// Load template file
		load_template('ManageDivisions');
	
	}

}

/**
 * Displays a single division
 */
function View() {

}

/**
 * Adds new division to database
 */
function Add() {

}

/**
 * Updates division in database
 */
function Update() {

}

/**
 * Deletes division from database
 */
function Delete() {

}