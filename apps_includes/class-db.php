<?php
/**
 * Database class
 *
 */

class DB {

	public $dbh;
	private static $conf;
	private static $instance;
	
	/**
	 * Writes database config parameters
	 */
	public static function writeConf($name, $value) {
		self::$conf[$name] = $value;
	}
	
	/**
	 * Initializes database connection
	 */
	private function __construct() {
		$this->dbh = new PDO((self::$conf['db_connection_type'] == 'odbc' ? 'odbc' : 'mysql') .':host='. self::$conf['db_host'] .';dbname='. self::$conf['db_name'], self::$conf['db_user'], self::$conf['db_pass']);
		$this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	}
	
	/**
	 * Returns instance of database connection
	 */
	static function getInstance() {
	
		if (!isset(self::$instance)) {
			$object = __CLASS__;
			self::$instance = new $object;
		}
		
		return self::$instance;

	}
	
}