<?php
/**
 * Manage class
 */

class Database {

	/**
	 * Contains database connection string
	 */
	var $db;

	/**
	 * Contains the area we're working with
	 */
	var $area;
	
	/**
	 * Contains database column name
	 */
	var $db_columns;
	
	/**
	 * Contains values from select statement
	 */
	var $values;

	/**
	 * Class init
	 */
	function __construct() {
		
	}
	
	/**
	 * Sets database connection string
	 */
	function set_db($db) {
		$this->db = $db;
	}
	
	/**
	 * Sets the area to work with
	 */
	public function set_area($area) {
		$this->area = $area;
	}
	
	/**
	 * Sets database table columns
	 */
	function set_db_columns($columns) {
		$this->db_columns = $columns;
	}
	
	/**
	 * Selects data from database
	 */
	function select($id = '') {
	
		// Build the SQL query
		$sql = 'SELECT id, ';
		$sql .= implode(', ', $this->db_columns);
		$sql .= ' FROM app_'. $this->area;

		// Define WHERE clause if $id is set
		if (!empty($id)) {
			$sql .= ' WHERE id = '. $id;
		}
		
		// Get results from query
		$result = $this->db->query($sql);
		
		// Check if anything was returned
		// and return results, if any
		// otherwise return false
		if ($result->rowCount() > 0) {
			return $result;
		} else {
			return false;
		}
	
	}
	
	/**
	 * Custom SQL query
	 */
	function query($sql) {
		
		// Get results from query
		$result = $this->db->query($sql);
		
		// Check if anything was returned
		// and return results, if any
		// otherwise return false
		if ($result->rowCount() > 0) {
			return $result->fetchAll();
		} else {
			return false;
		}
		
	}
	
	/**
	 * Insert data into database
	 */
	function insert($sql, $data) {
		
		$query = $this->db->prepare($sql);
		$result = $query->execute($data);
		
		return $result;
		
	}
		
	/**
	 * Single view
	 * @return void
	 */
	function view($id) {
		
		if ($this->select($id)) {
		
			foreach ($this->select($id)->fetchAll() as $data) {
			
				foreach($this->db_columns as $column) {
				
					$this->values[$column] = $data->$column;				
				
				}
			
			}
		
		}
		
	}
	
	/**
	 * Retrieves single value from database results
	 * @return string
	 */
	function get_value($column) {
		
		return $this->values[$column];
		
	}
	
	/**
	 * Adds data to respective area
	 * @return boolean True or false from database SQL query
	 */
	function add($form_data) {
		
		// Create an array to hold quantity of value placeholders
		$values = array();
		
		// Count how many elements exist inside $form_data;
		$form_data_count = count($form_data);
	
		// Count number of database columns, and for each one
		// add a placeholder
		for ($i = 0; $i < $form_data_count; ++$i) {
			$values[] = '?';
		}
		
		// Build the SQL query and execute
		$query = $this->db->prepare('INSERT INTO app_'. $this->area .' ('. implode(', ', $this->db_columns) .') VALUES('. implode(', ', $values) .')');
		$result = $query->execute($form_data);
		
		// Return the results
		return $result;
		
	}
	
	/**
	 * Updates data for a respective area
	 * @return boolean True or false from database SQL query
	 */
	function update($form_data, $id) {
	
		// Create an array to hold quantity of value placeholders
		$values = array();
		
		// Count how many elements exist inside $form_data;
		$form_data_count = count($form_data);
	
		// Count number of database columns, and for each one
		// add a placeholder
		foreach ($this->db_columns as $column) {
			$values[] = $column .' = ?';
		}
		
		// Build the SQL query and execute
		$query = $this->db->prepare('UPDATE app_'. $this->area .' SET '. implode(', ', $values) .' WHERE id = '. $id);
		$result = $query->execute($form_data);
		
		// Return the results
		return $result;
		
	}
	
	/**
	 * Deletes data from a respective area
	 * @return boolean True or false from database SQL query
	 */
	function delete($id) {
		
		$query = $this->db->prepare('DELETE FROM app_'. $this->area .' WHERE id = '. $id);
		$result = $query->execute();
		
		// Return the results
		return $result;
		
	}
	
}