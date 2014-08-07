<?php
/**
 * Base Apps manage users class
 */

class Users extends Master {

	function __construct() {
		
		$this->db_table = 'app_users';
		$this->db_fields = array('id', 'app_roles_id', 'app_cells_id', 'app_divisions_id', 'user_name', 'user_email_address', 'user_shift', 'user_notification_threshold');
		
	}
	
}