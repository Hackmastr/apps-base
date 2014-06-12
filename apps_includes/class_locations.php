<?php
/**
 * Base Apps manage locations class
 */

class Locations {

	private $db;
	private $id;
	
	/**
	 * Establish database connection
	 */
	function setDB($db) {
		$this->db = $db;
	}
	
	/**
	 * Sets requested location ID
	 */
	function setID($id) {
		$this->id = $id;
	}
	
	/**
	 * Retrieves the database fields
	 */
	function get_db_fields() {
		return array('location_name', 'location_country', 'location_state', 'location_city', 'location_street', 'location_zip');
	}
	
	/**
	 * Class init
	 */
	function __construct() {
		
	}
	
	/**
	 * Retrieves list of locations from database
	 */
	function getLocationsList() {
	
		$sql = 'SELECT id, l.location_name as name, l.location_country as country, l.location_city as city,
		        l.location_state as state, l.location_street as street, l.location_zip as zip
		        FROM app_locations l';
		
		return $this->db->select($sql);
		
	}
	
	/**
	 * Retrieves requsted location from database
	 */
	function getLocation($field) {
	
		if (isset($this->id)) {
	
			$sql = 'SELECT id, location_name as name, location_country as country, location_city as city, location_state as state, location_street as street, location_zip as zip
			FROM app_locations
			WHERE id = '. $this->id;
		
			// Get results
			$result = $this->db->select($sql, true);
			
			// Return requested field
			return $result->$field;
			
		} else {
			return '';
		}	
	}
	
	/**
	 * Adds location to database
	 */
	function add($post_data) {
	
		$this->db->insert('INSERT INTO app_locations (location_name, location_country, location_state, location_city, location_street, location_zip) VALUES(?, ?, ?, ?, ?, ?)', $post_data);
		
	}
	
	/**
	 * Updates existing location in database
	 */
	function update() {
		
	}
	
	/**
	 * Deletes location from database
	 */
	function delete() {
		
	}
	
}