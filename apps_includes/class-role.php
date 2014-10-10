<?php
/**
 * User roles class
 *
 * @since 1.0.0
 */

class Role {

	private $id;
	private $role_name;

	function __construct($db = '') {
		$this->db = $db;
	}

	/**
	 * Gets all roles in database
	 */
	static function getAllRoles() {
	
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_roles');
		
		if ($query->execute())
			return $query->fetchALL(PDO::FETCH_CLASS, 'Role');
		
	}
	
	/**
	 * Get role ID
	 */
	function getID() {
		return $this->id;
	}
	
	/**
	 * Get role name
	 */
	function getName() {
		return $this->role_name;
	}
	
}