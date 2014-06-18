<?php
/**
 * Base Apps bootstrap class
 */

require_once('class-master.php');
require_once('class-locations.php');
require_once('class-divisions.php');
require_once('class-cells.php');

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
	
	public static function Locations() {

		$location = new Locations();
		$location->setDB(self::$db);

		return $location;

	}
	
	public static function Divisions() {

		$division = new Divisions();
		$division->setDB(self::$db);

		return $division;

	}
	
	public static function Cells() {
	
		$cells = new Cells();
		$cells->setDB(self::$db);
		
		return $cells;
		
	}
	
}