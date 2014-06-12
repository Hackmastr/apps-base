<?php
/**
 * Base Apps bootstrap class
 */
 
require_once('class_locations.php');

class Bootstrap {
	
	public static $db;
	
	public static function Locations() {

		$location = new Locations();
		$location->set_db(self::$db);

		return $location;

	}
	
}