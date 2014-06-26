<?php
/**
 * Base Apps cells class
 */

class Links extends Master {

	function __construct() {
		
		$this->db_table = 'app_links';
		$this->db_fields = array('id', 'link_name', 'link_description', 'link_url', 'link_bg_color', 'link_order', 'link_icon_class');
		
	}
	
}