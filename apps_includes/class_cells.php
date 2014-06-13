<?php
/**
 * Base Apps cells class
 */

class Cells extends Master {

	function __construct() {
		
		$this->db_table = 'app_cells c';
		$this->db_fields = array('c.id', 'c.cell_name');
		
	}
	
}