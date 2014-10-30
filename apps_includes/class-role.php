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
	 * Gets single role
	 */
	static function getRole($id) {
	
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT innolunch_week FROM app_roles WHERE id = :id');
		$query->bindValue('id', $id);
		$query->execute();
		
		if ($query->rowCount() > 0)
			return $query->fetchAll(PDO::FETCH_CLASS, 'Role')[0];
			
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
	 * Adds role to database
	 */
	public static function addRole($post) {
		
		$db = DB::getInstance();
		
		$query = $db->dbh->prepare('INSERT INTO app_roles (role_name) VALUES (:role_name)');
		$query->bindValue('role_name', $post['role_name']);
		
		if ($query->execute())
			return true;
		
	}
	
	/**
	 * Saves role to database
	 */
	public static function saveRole($id, $post) {
		
		$db = DB::getInstance();
		$query = $db->dbh->prepare('UPDATE app_roles SET role_name = :role_name WHERE id = :id');
		$query->bindValue('id', $id);
		$query->bindValue('role_name', $post['role_name']);	
		
		if ($query->execute())
			return true;
		
	}
	
	/**
	 * Deletes role from database
	 */
	public static function deleteRole($id) {
		
		$db = DB::getInstance();
		$query = $db->dbh->prepare('DELETE FROM app_roles WHERE id = :id');
		$query->bindValue('id', $id);
		
		if ($query->execute())
			return true;
		
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