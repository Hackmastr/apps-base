<?php
/**
 * Base Apps bootstrap class
 */
 
require_once('class_locations.php');
require_once('class_cells.php');

class Bootstrap {
	
	public static $db;
	
	public static function Locations() {

		$location = new Locations();
		$location->setDB(self::$db);

		return $location;

	}
	
	public static function Cells() {
		$cells = new Cells();
		$cells->setDB(self::$db);
		
		return $cells;
	}
	
}