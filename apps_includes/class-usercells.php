<?php
/**
 * Users cells class
 */

class UserCells extends Master {
	
	function __construct() {
		
		$this->db_table = 'app_users_cells';
		$this->db_fields = array(
			'id',
			'app_users_id',
			'app_cells_id'
		);
		
	}
	
}