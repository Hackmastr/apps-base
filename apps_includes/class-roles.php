<?php
/**
 * Base Apps manage roles class
 */

class Roles extends Master {

	function __construct() {
		
		$this->db_table = 'app_roles';
		$this->db_fields = array('id', 'role_name');
		
	}
	
}