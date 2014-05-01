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
		
		// Check if there's any results from the database
		if ($results->rowCount() > 0) {
		
			$header_count = 0;
			$column_count = 0;
			
			echo '<ul class="apps_data_list">
				<li>
					<dl class="apps_data_list_header">';
			
			// Loop through the DB columns as headers
			foreach($this->db_columns as $header => $db_column) {
				
				if ($header_count == 0) {
					echo '<dt class="'. $db_column .'">'. $header .'</dt>';
				} else {
					echo '<dd class="'. $db_column .'">'. $header .'</dd>';
				}
				
			}
			
				echo '</dl>
			</li>
			<li>
				<dl class="apps_data_list_data">';
			
			// Loop through the results and display
			foreach ($results->fetch() as $db_column => $data) {
				
				if ($column_count == 0) {
					echo '<dt class="'. $db_column .'">'. $data .'</dt>';
				} else {
					echo '<dd class="'. $db_column .'">'. $data .'</dd>';
				}				
				
			}
			
				echo '</dl>
				</li>
			</ul>';
			
		} else {
			
			echo '<p>There\'s nothing to display!</p>';
			
		}
		
	}
	
	/**
	 * Adds data to respective area
	 */
	function add($form_submit) {
	
		// Process form data if the form has been submitted
		if (isset($form_submit)) {
			
			// Build the SQL query and execute
			$query = $db->prepare('INSERT INTO app_'. $this->area .' ('. implode(', ', $this->db_columns) .') VALUES('. implode(', :', $this->db_columns) .')');
			$result = $query->execute($this->db_columns);
			
			// Check the results
			if ($result) {
			
				generate_message('success', 'New location has been added successfully');
				
			} else {
				
				generate_message('error', 'Error adding new location');
				
			}
			
		} else {
			
			generate_message('error', 'Form has not been submitted');
			
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