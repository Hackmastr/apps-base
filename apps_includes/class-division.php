<?php
/**
 * Division class
 *
 * @since 1.0.0
 */

class Division {

	private $id;
	private $division_name;

	/**
	 * Gets all roles in database
	 */
	static function getAllDivisions() {
	
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_divisions');
		
		if ($query->execute())
			return $query->fetchALL(PDO::FETCH_CLASS, 'Division');
		
	}
	
	function getID() {
		return $this->id;
	}
	
	function getName() {
		return $this->division_name;
	}
	
}