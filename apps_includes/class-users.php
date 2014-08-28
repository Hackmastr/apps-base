<?php
/**
 * Base Apps manage users class
 */

class Users extends Master {

	function __construct() {
		
		$this->db_table = 'app_users';
		$this->db_fields = array('id', 'app_roles_id', 'app_divisions_id', 'user_name', 'user_email_address', 'user_shift', 'user_notification_threshold', 'user_is_cell_lead');
		
	}
	
	/**
	 * Pre submit
	 */
	function submitData($action, $post_array) {
		
		// Submit data to database
		$submit_users_result = parent::submitData($action, $post_array);
		
		if ($submit_users_result) {
			
			// Delete all users_cells records for matching user ID
			// to ensure user cells assignment is always up-to-date
			if (!empty($this->id)) {
				$this->db->delete('DELETE FROM app_users_cells WHERE app_users_id = '. $this->id);
				$user_id = $this->id;
			} else {
				$user_id = $this->db->getLastInsertID();
			}
			
			// Get each user_cell ID and insert into metric_cells table
			foreach ($post_array['user_cells'] as $cell_id) {
			
				$post_array = array(
					'app_users_id' => $user_id,
					'app_cell_id' => $cell_id
				);
				
				$result = $this->db->insert('INSERT INTO app_users_cells (app_users_id, app_cells_id) VALUES (:app_users_id, :app_cell_id)', $post_array);
				
			}
			
			if ($result) {
				return $result;
			} else {
				return false;
			}
			
		}	
		
	}
	
	/**
	 * Pre delete
	 */
	function deleteData() {
		
		$delete_user_result = parent::deleteData();
		
		if (!empty($this->id)) {
			$result = $this->db->delete('DELETE FROM app_users_cells WHERE app_users_id = '. $this->id);
		} else {
			$result = false;
		}
		
		if ($result) {
			return $result;
		} else {
			return false;
		}
		
	}
	
}