<?php
/**
 * Innolunch menu class
 */

class Innolunch {
	
	private $db;
	private $innolunch_week;
	private $id;
	private $innolunch_day;
	private $innolunch_item;
	private $innolunch_price;
	
	function __construct($db = '') {
		$this->db = $db;
	}
	
	/**
	 * Gets week of date
	 */
	static function getWeek() {
		
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_innolunch_week WHERE id = :id');
		$query->bindValue('id', 1);
		$query->execute();
		
		if ($query->rowCount() > 0)
			return $query->fetch()->innolunch_week;
		
	}
	
	/**
	 * Saves week
	 */
	static function saveWeek($week) {
		
		$db = DB::getInstance();
	
		$query = $db->dbh->prepare('UPDATE app_innolunch_week SET innolunch_week = :innolunch_week WHERE id = :id');	
		$query->bindValue('id', 1);	
		$query->bindValue('innolunch_week', $week);
		$result = $query->execute();
	
	}
	
	/**
	 * Gets lunch menu
	 */
	static function getMenu() {

		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_innolunch');
		$query->execute();
		
		if ($query->rowCount() > 0)
			return $query->fetchAll(PDO::FETCH_CLASS, 'Innolunch');
		
	}
	
	/**
	 * Saves lunch menu
	 */
	static function Save($post) {
		
		$db = DB::getInstance();
		
		$days = array(1, 2, 3, 4, 5);
		
		foreach ($days as $id) {
			
			$query = $db->dbh->prepare('UPDATE app_innolunch SET innolunch_item = :innolunch_item, innolunch_price = :innolunch_price WHERE id = :id');	
			$query->bindValue('id', $id);	
			$query->bindValue('innolunch_item', $post['innolunch_item_'. $id]);
			$query->bindValue('innolunch_price', $post['innolunch_price_'. $id]);
			$result = $query->execute();
			
		}
		
		if ($result) {
			self::saveWeek($post['innolunch_week']);
			return true;
		} else {
			return false;
		}
		
	}
	
	function getID() {
		return $this->id;
	}
	
	function getDay() {
		return $this->innolunch_day;
	}
	
	function getItem() {
		return $this->innolunch_item;
	}
	
	function getPrice() {
		return $this->innolunch_price;
	}
	
}