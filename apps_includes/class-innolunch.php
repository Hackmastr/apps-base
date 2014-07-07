<?php
/**
 * Innolunch menu class
 */

class Innolunch extends Master {

	function __construct() {
		
		$this->db_table = 'app_innolunch_week';
		$this->db_fields = array('id', 'innolunch_week');
		$this->left_join = array(
			'left_join' => array (
				'select' => array('id as lunch_id', 'innolunch_week_id', 'innolunch_day', 'innolunch_item', 'innolunch_price'),
				'table' => 'app_innolunch',
				'on' => array(
					'innolunch_week_id = app_innolunch_week.id'
				)
			)
		);
		
	}
	
}