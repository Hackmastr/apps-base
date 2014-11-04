<?php
/**
 * Manage locations class
 *
 * @since 1.0.0
 */

class Location {
	
	private $id;
	private $location_name;
	private $location_country;
	private $location_state;
	private $location_city;
	private $location_street;
	private $location_zip;
	
	/**
	 * Gets single location
	 */
	static function getLocation($id) {
	
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_locations WHERE id = :id');
		$query->bindValue('id', $id);
		
		if ($query->execute())
			return $query->fetchAll(PDO::FETCH_CLASS, 'Location')[0];
			
	}

	/**
	 * Gets all roles in database
	 */
	static function getAllLocations() {
	
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_locations');
		
		if ($query->execute())
			return $query->fetchALL(PDO::FETCH_CLASS, 'Location');
		
	}
	
	/**
	 * Adds location to database
	 */
	public static function addLocation($post) {
		
		$db = DB::getInstance();
		
		$query = $db->dbh->prepare('INSERT INTO app_locations (location_name, location_country, location_state, location_city, location_street, location_zip) VALUES (:location_name, :location_country, :location_state, :location_city, :location_street, :location_zip)');
		$query->bindValue('location_name', $post['location_name']);
		$query->bindValue('location_country', $post['location_country']);
		$query->bindValue('location_state', $post['location_state']);
		$query->bindValue('location_city', $post['location_city']);
		$query->bindValue('location_street', $post['location_street']);
		$query->bindValue('location_zip', $post['location_zip']);
		
		if ($query->execute())
			return true;
		
	}
	
	/**
	 * Saves location to database
	 */
	public static function saveLocation($id, $post) {
		
		$db = DB::getInstance();
		$query = $db->dbh->prepare('UPDATE app_locations SET location_name = :location_name, location_country = :location_country, location_state = :location_state, location_city = :location_city, location_street = :location_street, location_zip = :location_zip WHERE id = :id');
		$query->bindValue('id', $id);
		$query->bindValue('location_name', $post['location_name']);
		$query->bindValue('location_country', $post['location_country']);
		$query->bindValue('location_state', $post['location_state']);
		$query->bindValue('location_city', $post['location_city']);
		$query->bindValue('location_street', $post['location_street']);
		$query->bindValue('location_zip', $post['location_zip']);
		
		if ($query->execute())
			return true;
		
	}
	
	/**
	 * Deletes location from database
	 */
	public static function deleteLocation($id) {
		
		$db = DB::getInstance();
		$query = $db->dbh->prepare('DELETE FROM app_locations WHERE id = :id');
		$query->bindValue('id', $id);
		
		if ($query->execute())
			return true;
		
	}
	
	/**
	 * Get location ID
	 */
	function getID() {
		return $this->id;
	}
	
	/**
	 * Get location name
	 */
	function getName() {
		return $this->location_name;
	}
	
	/**
	 * Get location country
	 */
	function getCountry() {
		return $this->location_country;
	}
	
	/**
	 * Get location state
	 */
	function getState() {
		return $this->location_state;
	}
	
	/**
	 * Get location city
	 */
	function getCity() {
		return $this->location_city;
	}

	/**
	 * Get location street
	 */
	function getStreet() {
		return $this->location_street;
	}
	
	/**
	 * Get location ZIP
	 */
	function getZip() {
		return $this->location_zip;
	}
	
}