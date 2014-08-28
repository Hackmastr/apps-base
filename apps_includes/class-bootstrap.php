<?php
/**
 * Base Apps bootstrap class
 */
class Bootstrap {
	
	public static $db;
	
	public static function Load($obj, $args = array()) {
		
		if (!empty($args)) {
			$obj = new $obj($args);
		} else {
			$obj = new $obj();
		}
		
		$obj->setDB(self::$db);
		
		return $obj;
		
	}
	
}