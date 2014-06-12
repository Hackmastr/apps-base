<?php
/**
 * Base Apps manage locations class
 */

class Locations {

	private $db;
	private $id;
	
	function setDB($db) {
		$this->db = $db;
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
	 * Sets requested location ID
	 */
	function setID($id) {
		$this->id = $id;
	}
	
}