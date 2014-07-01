<?php
/**
 * Master class
 * Because I don't have a better name...
 */

class Master {
	
	protected $db;
	protected $db_table;
	protected $db_fields;
	protected $left_join;
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
		$left_join = isset($args['left_join']) ? $args['left_join'] : isset($this->left_join) ? $this->left_join : array();
		$orderby = isset($args['orderby']) ? $args['orderby'] : NULL;
		
		// Begin our SQL SELECT statement
		$sql = 'SELECT ';
		
		// Determine which set of fields to select
		if (empty($fields)) {
			$sql .= $this->db_table .'.'. implode(', '. $this->db_table .'.', $this->db_fields);
		} else {
			$sql .= $this->db_table .'.'. implode(', '. $this->db_table .'.', $fields);
		}
		
		// Select from left join?
		if (!empty($left_join)) {
			foreach ($left_join as $join) {
			
				$sql .= ', '. $join['table'] .'.'. implode(', '. $join['table'] .'.', $join['select']);
			
			}
		}
		
		// Select from defined table
		$sql .= ' FROM '. $this->db_table;
		
		// Left join any tables?
		if (!empty($left_join)) {
		
			foreach ($left_join as $join) {
				
				$sql .= ' LEFT JOIN '. $join['table'] .' ON '. $join['table'] .'.'. implode(' AND '. $join['table'] .'.', $join['on']);
				
			}
			
		}
		
		// Is a criteria set?
		if (!is_null($where)) {
			$sql .= ' WHERE '. $where;
		}
		
		// Are we ording by a specific column?
		if ($orderby) {
			$sql .= ' ORDER BY '. $orderby;
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
	
		// If ID isn't set, then we must not be in an edit action
		if (empty($this->id)) {
			return '';
		} else {
			
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
	
	/**
	 * Submits data to database to be either added or modified
	 */
	function submitData($post_array) {
	
		// Remove item from $post_array if it doesn't exist in $this->db_fields
		foreach($post_array as $field => $value) {
			if (!in_array($field, $this->db_fields)) {
				unset($post_array[$field]);
			}
		}
		
		$fields = '';
		$params = '';
		
		// If ID isn't set, insert record
		// Otherwise, update an existing record
		if (empty($this->id)) {
		
			$sql = 'INSERT INTO '. $this->db_table .' (';
			
			foreach ($post_array as $field => $value) {
				$fields .= $field .', ';
			}
			$sql .= rtrim($fields, ', ');
			
			$sql .= ') VALUES (';
			
			foreach ($post_array as $field => $values) {
				$params .= ':'. $field .', ';
			}
			$sql .= rtrim($params, ', ');
			
			$sql .= ')';
		
		} else {
		
			$sql = 'UPDATE '. $this->db_table .' SET';
				
			foreach($post_array as $field => $value) {
				$fields .= ' '. $field .' = :'. $field .',';
			}
			$sql .= rtrim($fields, ', ');
			
			$sql .= ' WHERE id = '. $this->id;
		
		}
		
		// Get results
		if (empty($this->id)) {
			$results = $this->db->insert($sql, $post_array);
		} else {
			$results = $this->db->update($sql, $post_array);
		}
		
		// Return result of results
		if ($results) {
			return $results;
		} else {
			return false;
		}
		
	}
	
	/**
	 * Deletes data from database
	 */
	function deleteData() {
		
		$this->db->delete('DELETE FROM '. $this->db_table .' WHERE id = '. $this->id);
		
	}
	
	/**
	 * Selects single record data from database
	 */
	function getRecord($what, $field = 'id', $orderby = 'id') {
		
		switch ($what) {
			
			case 'first':
				
				$filter = array(
					'fields' => array($field),
					'limit' => true,
					'orderby' => $orderby
				);
				
				$results = $this->getData($filter);
				
				break;
			
			case 'next':
			
				if ($this->id) {
			
					$next_record = $this->id + 1;
					$filter = array(
						'fields' => array($field),
						'where' => 'id = '. $next_record,
						'limit' => true,
						'orderby' => $orderby
					);
					
					$results = $this->getData($filter);
					
				} else {
				
					$results = false;
				
				}
			
				break;
				
			default:
				$results = false;
			
		}
		
		return $results->$field;
		
	}
	
}