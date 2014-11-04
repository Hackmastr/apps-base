<?php
/**
 * Division class
 */

class Division {

	private $id;
	private $division_name;

	function __construct($db = '') {
		$this->db = $db;
	}
	
	/**
	 * Gets single division
	 */
	static function getDivision($id) {
	
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_divisions WHERE id = :id');
		$query->bindValue('id', $id);
		
		if ($query->execute())
			return $query->fetchAll(PDO::FETCH_CLASS, 'Division')[0];
			
	}

	/**
	 * Gets all divisions in database
	 */
	static function getAllDivisions() {
	
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_divisions');
		
		if ($query->execute())
			return $query->fetchALL(PDO::FETCH_CLASS, 'Division');
		
	}
	
	/**
	 * Adds division to database
	 */
	public static function addDivision($post) {
		
		$db = DB::getInstance();
		
		$query = $db->dbh->prepare('INSERT INTO app_divisions (division_name) VALUES (:division_name)');
		$query->bindValue('division_name', $post['division_name']);
		
		if ($query->execute())
			return true;
		
	}
	
	/**
	 * Saves division to database
	 */
	public static function saveDivision($id, $post) {
		
		$db = DB::getInstance();
		$query = $db->dbh->prepare('UPDATE app_divisions SET division_name = :division_name WHERE id = :id');
		$query->bindValue('id', $id);
		$query->bindValue('division_name', $post['division_name']);	
		
		if ($query->execute())
			return true;
		
	}
	
	/**
	 * Deletes division from database
	 */
	public static function deleteDivision($id) {
		
		$db = DB::getInstance();
		$query = $db->dbh->prepare('DELETE FROM app_divisions WHERE id = :id');
		$query->bindValue('id', $id);
		
		if ($query->execute())
			return true;
		
	}
	
	/**
	 * Get division ID
	 */
	function getID() {
		return $this->id;
	}
	
	/**
	 * Get division name
	 */
	function getName() {
		return $this->division_name;
	}
	
}