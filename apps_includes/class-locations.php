<?php
/**
 * Base Apps manage locations class
 */

class Locations extends Master {

	function __construct() {
		
		$this->db_table = 'app_locations';
		$this->db_fields = array('id', 'location_name', 'location_country', 'location_state', 'location_city', 'location_street', 'location_zip');
		
	}
	
}