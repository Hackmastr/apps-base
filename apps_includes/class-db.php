<?php
/**
 * Database class
 *
 * @since 1.0.0
 */

class DB {

	// Database configuration
	private static $conf;
	
	// Database handle
	public $dbh;
	
	// Database instance
	private static $instance;
	
	/**
	 * Writes database config parameters
	 */
	public static function writeConf($name, $value) {
		self::$conf[$name] = $value;
	}
	
	/**
	 * Initialize database connection
	 */
	private function __construct() {
		
		$this->dbh = new PDO('mysql:host='. self::$conf['db_host'] .';dbname='. self::$conf['db_name'], self::$conf['db_user'], self::$conf['db_pass']);
		$this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
	}
	
	/**
	 * Get database instance
	 */
	static function getInstance() {
	
		if (!isset(self::$instance)) {
			$object = __CLASS__;
			self::$instance = new $object;
		}
		
		return self::$instance;

	}
	
}