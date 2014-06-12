<?php
/**
 * Base Apps bootstrap class
 */
 
require_once('class_locations.php');

class Bootstrap {
	
	public static $db;
	
	public static function Locations() {

		$location = new Locations();
		$location->setDB(self::$db);

		return $location;

	}
	
}