<?php
/**
 * Manage class
 */

class Manage {

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
	 * Dispays data in a table-like structure for respective area
	 */
	function display() {
	
		// Build the SQL query
		$sql = 'SELECT ';
		$sql .= implode(', ', $this->db_columns);
		$sql .= ' FROM app_'. $this->area;
		
		// Request data from database for respective area
		$results = $this->db->query($sql);
		
		// Check if there are any results from the database
		if ($results->rowCount() > 0) {
		
			$first_cell = false;
		
			echo '<ul class="apps_data_list">
				<li class="apps_data_list_header">
					<dl>';
					
					// Loop through the database columns to display as headers
					foreach ($this->db_columns as $header => $column) {
						if ($first_cell) {
							echo '<dd class="'. $column .'">'. $header .'</dd>';
						} else {
							echo '<dt class="'. $column .'">'. $header .'</dt>';
							$first_cell = true;
						}				
					}
					
					echo '</dl>
				</li>
				<li class="apps_data_list_data">';
			
				// Loop through each row retrieved
				foreach ($results->fetchAll() as $data) {
				
					// Reset $first_row for each row
					$first_cell = false;
					
					echo '<dl>';
				
					// Loop through each column defined
					// This is so we can dynamically select the data we need
					foreach($this->db_columns as $column) {
					
						if ($first_cell) {
							echo '<dd class="'. $column .'">'. $data->$column .'</dd>';
						} else {
							echo '<dt class="'. $column .'">'. $data->$column .'</dt>';
							$first_cell = true;
						}
					
					}
					
					echo '</dl>';
					
			}
			
				echo '</li>
			</ul>';
			
		} else {
			
			echo '<p>There\'s nothing to display!</p>';
			
		}
		
	}
	
	/**
	 * Adds data to respective area
	 */
	function add($form_data) {
		
		// Create an array to hold quantity of value placeholders
		$placeholders = array();
		
		// Create variable to keep count of how many database columns we have
		$db_column_count = 0;
	
		// Count number of database columns, and for each one
		// add a placeholder
		while (count($this->db_columns) > $db_column_count) {
			array_push($placeholders, '?');
			$db_column_count++;
		}
		
		// Build the SQL query and execute
		$query = $this->db->prepare('INSERT INTO app_'. $this->area .' ('. implode(', ', $this->db_columns) .') VALUES('. implode(', ', $placeholders) .')');
		$result = $query->execute($form_data);
		
		//echo 'INSERT INTO app_'. $this->area .' ('. implode(', ', $this->db_columns) .') VALUES('. implode(', ', $placeholders) .')';
		
		// Check the results
		if ($result) {
		
			generate_message('success', 'New location has been added successfully');
			
		} else {
			
			generate_message('error', 'Error adding new location');
			
		}
		
	}
	
	/**
	 * Updates data for a respective area
	 */
	function update() {
		
	}
	
	/**
	 * Deletes data from a respective area
	 */
	function delete() {
		
	}
	
}