<?php
/**
 * Master class
 * Because I don't have a better name...
 */

class Master {
	
	protected $db;
	protected $db_table;
	protected $db_fields;
	protected $id;
	
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
	 * Retrieves data from database
	 */
	function getData($args = '') {
	
		$fields = isset($args['fields']) ? $args['fields'] : array();
		$where = isset($args['where']) ? $args['where'] : NULL;
		
		// Begin our SQL SELECT statement
		$sql = 'SELECT ';
		
		// Determine which set of fields to select
		if (empty($fields)) {
			$sql .= implode(', ', $this->db_fields);
		} else {
			$sql .= implode(', ', $fields);
		}
		
		// Select from defined table
		$sql .= ' FROM '. $this->db_table;
		
		// Is a criteria set?
		if (!is_null($where)) {
			$sql .= ' WHERE '. $where;
		}
		
		// Get results
		$results = $this->db->select($sql);
		
		// Return result of results
		if ($results) {
			return $results;
		} else {
			return false;
		}
		
	}
	
}