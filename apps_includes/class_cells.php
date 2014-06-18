<?php
/**
 * Base Apps cells class
 */

class Cells extends Master {

	function __construct() {
		
		$this->db_table = 'app_cells';
		$this->db_fields = array('id', 'app_division_id', 'app_location_id', 'cell_name', 'cell_number', 'cell_iq_connector', 'cell_status');
		
	}
	
}