<?php
/**
 * Base Apps cells class
 */

class Cells extends Master {

	function __construct() {
		
		$this->db_table = 'app_cells';
		$this->db_fields = array('id', 'cell_name');
		
	}
	
}