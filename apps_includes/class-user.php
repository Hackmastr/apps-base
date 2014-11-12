<?php
/**
 * User class
 *
 * @since 1.0.0
 */

class User {

	private $id;
	private $user_name;
	private $app_roles_id;
	private $app_divisions_id;
	private $user_shift;
	private $user_email_address;
	private $user_notification_threshold;
	private $user_is_cell_lead;
	private $user_password;
	private $user_is_admin;

	/**
	 * Gets single user
	 */
	static function getUser($id) {
	
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_users WHERE id = :id');
		$query->bindValue('id', $id);
		
		if ($query->execute())
			return $query->fetchAll(PDO::FETCH_CLASS, 'User')[0];
			
	}
	
	/**
	 * Gets user by cell ID
	 */
	static function getUserByCellID($cell_id) {
	
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_users_cells uc
			INNER JOIN app_users u ON u.id = uc.app_users_id
			INNER JOIN app_roles r ON u.app_roles_id = r.id
			WHERE uc.app_cells_id = :cell_id');
		$query->bindValue('cell_id', $cell_id);
		
		if ($query->execute())
			return $query->fetchAll(PDO::FETCH_CLASS, 'User');
					
	}
	
	/**
	 * Gets all users in database
	 */
	static function getAllUsers() {
		
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_users');
		
		if ($query->execute())
			return $query->fetchALL(PDO::FETCH_CLASS, 'User');
		
	}
	
	/**
	 * Checks if user is in cell
	 */
	static function inCell($user_id, $cell_id) {
		
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_users_cells WHERE app_users_id = :user_id AND app_cells_id = :cell_id');
		$query->bindValue('user_id', $user_id);
		$query->bindValue('cell_id', $cell_id);
		
		if ($query->execute())
			return true;
		else
			return false;
		
	}
	
	/**
	 * Adds user to database
	 */
	public static function addUser($post) {
		
		if (!empty($post['user_password'])) {
			$password = password_hash($post['user_password'], PASSWORD_BCRYPT);
		} else {
			$password = '';
		}
		
		$db = DB::getInstance();
		
		$user_query = $db->dbh->prepare('INSERT INTO app_users (app_roles_id, user_name, user_email_address, user_notification_threshold, app_divisions_id, user_shift, user_is_cell_lead, user_password, user_is_admin) VALUES (:app_roles_id, :user_name, :user_email_address, :user_notification_threshold, :app_divisions_id, :user_shift, :user_is_cell_lead, :user_password, :user_is_admin)');
		$user_query->bindValue('app_roles_id', $post['app_roles_id']);
		$user_query->bindValue('user_name', $post['user_name']);
		$user_query->bindValue('user_email_address', $post['user_email_address']);
		$user_query->bindValue('user_notification_threshold', $post['user_notification_threshold']);
		$user_query->bindValue('app_divisions_id', $post['app_divisions_id']);
		$user_query->bindValue('user_shift', $post['user_shift']);
		$user_query->bindValue('user_is_cell_lead', $post['user_is_cell_lead']);
		$user_query->bindValue('user_password', $password);
		$user_query->bindValue('user_is_admin', $post['user_is_admin']);
		$user_result = $user_query->execute();
		
		if ($user_result) {
		
			if (!empty($post['user_cells'])) {
			
				self::setUserCells($db->dbh->lastInsertId(), $post);
				
			} else {
				return true;
			}
			
		} else {
			return false;
		}
		
	}
	
	/**
	 * Saves user to database
	 */
	public static function saveUser($id, $post) {
		
		$db = DB::getInstance();
		$query = $db->dbh->prepare('UPDATE app_users SET app_roles_id = :app_roles_id, user_name = :user_name, user_email_address = :user_email_address, user_notification_threshold = :user_notification_threshold, app_divisions_id = :app_divisions_id, user_shift = :user_shift, user_is_cell_lead = :user_is_cell_lead,'. (!empty($post['user_password']) ? ' user_password = :user_password,' : '') .' user_is_admin = :user_is_admin WHERE id = :id');
		$query->bindValue('id', $id);
		$query->bindValue('app_roles_id', $post['app_roles_id']);
		$query->bindValue('user_name', $post['user_name']);
		$query->bindValue('user_email_address', $post['user_email_address']);
		$query->bindValue('user_notification_threshold', $post['user_notification_threshold']);
		$query->bindValue('app_divisions_id', $post['app_divisions_id']);
		$query->bindValue('user_shift', $post['user_shift']);
		$query->bindValue('user_is_cell_lead', $post['user_is_cell_lead']);
		
		if (!empty($post['user_password'])) {
			$query->bindValue('user_password', password_hash($post['user_password'], PASSWORD_BCRYPT));
		}
		
		$query->bindValue('user_is_admin', $post['user_is_admin']);
		
		if ($query->execute()) {
			self::setUserCells($id, $post);
		}
		
	}
	
	/**
	 * Deletes user from database
	 */
	public static function deleteUser($id) {
		
		$db = DB::getInstance();
		$query = $db->dbh->prepare('DELETE FROM app_users WHERE id = :id');
		$query->bindValue('id', $id);
		
		if ($query->execute())
			self::deleteUserCells($id);
		
	}
	
	/**
	 * Sets cells user is assigned to
	 */
	public static function setUserCells($id, $post) {
	
		self::deleteUserCells($id);
		
		$db = DB::getInstance();
	
		foreach ($post['user_cells'] as $cell_id) {
		
			$query = $db->dbh->prepare('INSERT INTO app_users_cells (app_users_id, app_cells_id) VALUES (:app_users_id, :app_cells_id)');
			$query->bindValue('app_users_id', $id);
			$query->bindValue('app_cells_id', $cell_id);
			$result = $query->execute();
		
		}
		
		if ($result)
			return true;
	
	}
	
	/**
	 * Delete user cells
	 */
	public static function deleteUserCells($id) {
		
		$db = DB::getInstance();
		$query = $db->dbh->prepare('DELETE FROM app_users_cells WHERE app_users_id = :id');
		$query->bindValue('id', $id);
		$query->execute();
		
	}
	
	/**
	 * Get user ID
	 */
	public function getID() {
		return $this->id;
	}
	
	/**
	 * Get user name
	 */
	public function getName() {
		return $this->user_name;
	}
	
	/**
	 * Get role ID
	 */
	public function getRoleID() {
		return $this->app_roles_id;
	}
	
	/**
	 * Get division ID
	 */
	public function getDivisionID() {
		return $this->app_divisions_id;
	}
	
	/**
	 * Get user's shift
	 */
	public function getShift() {
		return $this->user_shift;
	}
	
	/**
	 * Get user's email address
	 */
	public function getEmailAddress() {
		return $this->user_email_address;
	}
	
	/**
	 * Get user's notification threshold
	 */
	public function getNotificationThreshold() {
		return $this->user_notification_threshold;
	}
	
	/**
	 * Returns whether user is cell lead or not
	 */
	public function getIsCellLead() {
		return $this->user_is_cell_lead;
	}
	
	public function getPassword() {
		return $this->user_password;
	}
	
	public function isAdmin() {
		return $this->user_is_admin;
	}
	
}