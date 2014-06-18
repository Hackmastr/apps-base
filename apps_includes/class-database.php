<?php
/**
 * Database class
 */

class Database {

	var $dbhost;
	var $dbname;
	var $dbuser;
	var $dbpass;
	var $db;
	var $dbconn;
	
	/**
	 * Database init
	 */
	function __construct($dbhost, $dbname, $dbuser, $dbpass) {
	
		$this->dbhost = $dbhost;
		$this->dbname = $dbname;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
		
		$this->connect();
		
	}
	
	/**
	 * Connects to database
	 */
	function connect() {
		
		$dbconn = false;

		try {
			$this->db = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS);
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			if (DEBUG) {
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			$this->dbconn = true;
		} catch (PDOException $e) {
			throw new Exception($e->getMessage());
			$this->dbconn = false;
		}
		
	}
	
	/**
	 * Select
	 */
	function select($sql, $return_single = false) {
	
		// Get results from query
		$result = $this->db->query($sql);
		
		// Check if anything was returned
		// and return results, if any
		// otherwise return false
		if ($result->rowCount() > 0) {
			if ($return_single) {
				return $result->fetch();
			} else {
				return $result->fetchAll();
			}
		} else {
			return false;
		}
		
	}
	
	/**
	 * Insert
	 */
	function insert($sql, $post_array) {
		
		// Prepare SQL query
		$query = $this->db->prepare($sql);
		
		// Bind params
		foreach ($post_array as $field => &$value) {
			$query->bindParam(':'. $field, $value);
		}
		
		// Execute
		$result = $query->execute();
		
		// Return results
		return $result;
		
	}
	
	/**
	 * Update
	 */
	function update($sql, $post_array) {
	
		// Prepare SQL query
		$query = $this->db->prepare($sql);
		
		// Bind params
		foreach ($post_array as $field => &$value) {
			$query->bindParam(':'. $field, $value);
		}
		
		// Execute
		$result = $query->execute();
		
		// Return results
		return $result;
				
	}
	
	/**
	 * Delete
	 */
	function delete($sql) {
		
		$query = $this->db->prepare($sql);
		$result = $query->execute();
		
		// Return the results
		return $result;
		
	}
	
	/**
	 * Gets the ID of the last inserted record
	 */
	function getLastInsertID() {
		
		return $this->db->lastInsertID();
		
	}
	
}