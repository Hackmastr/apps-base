<?php
/**
 * Base Apps manage locations class
 */

class Divisions extends Master {

	function __construct() {
		
		$this->db_table = 'app_divisions';
		$this->db_fields = array('id', 'division_name');
		
	}
	
}