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
		$limit = isset($args['limit']) ? $args['limit'] : false;
		
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
		$results = $this->db->select($sql, $limit);
		
		// Return result of results
		if ($results) {
			return $results;
		} else {
			return false;
		}
		
	}
	
	/**
	 * Gets value from specified field from database
	 */
	function getValue($field) {
			
		// Filter our data
		$filter = array(
			'fields' => array('id', $field),
			'where' => 'id = '. $this->id,
			'limit' => true
		);
		
		// Get results
		$results = $this->getData($filter);
		
		// Check results and return requested field value
		// Otherwise, return a blank string
		if ($results) {
			return $results->$field;
		} else {
			return '';
		}
		
	}
	
}