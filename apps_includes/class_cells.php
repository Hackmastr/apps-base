<?php
/**
 * Base Apps cells class
 */

class Cells {
	
	private $db;
	private $id;
	private $db_fields;
	
	/**
	 * Establish database connection
	 */
	function setDB($db) {
		$this->db = $db;
	}
	
	/**
	 * Sets requested ID
	 */
	function setID($id) {
		$this->id = $id;
	}	
	
	/**
	 * Sets the database fields
	 */
	function set_db_fields($fields) {
		$this->db_fields = $fields;
	}
	
	/**
	 * Retrieves list from database
	 */
	function getList() {
		
		$sql = 'SELECT id, cell_name FROM app_cells';
		
		return $this->db->select($sql);		
		
	}
	
}