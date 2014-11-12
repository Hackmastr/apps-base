<?php
	
class UserLogin {
	
	private $id;
	
	function __construct() {
		if (isset($_SESSION['user_id'])) {
			$this->id = $_SESSION['user_id'];
		}
	}
	
	function login($username, $password) {
		
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT id, user_password FROM app_users WHERE user_email_address = :username');
		$query->bindValue('username', $username);
		$query->execute();
		
		if ($result = $query->fetch()) {
			if (password_verify($password, $result->user_password)) {
				$_SESSION['user_id'] = $result->id;
				return true;	
			}
		} else {
			return false;
		}
		
	}
	
	function logout() {
		unset($_SESSION['user_id']);
	}
	
	function isLoggedIn() {
		if (isset($this->id)) {
			return true;
		}
	}
	
	function getID() {
		return $this->id;
	}
	
}