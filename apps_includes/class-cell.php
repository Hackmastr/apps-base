<?php
/**
 * Base Apps cell class
 *
 * @author Keith Brinks <keith.brinks@venturamfg.com>
 * @since 1.0.0
 */

class Cell {

	private $db;
	private $id;
	private $app_division_id;
	private $app_location_id;
	private $cell_number;
	private $cell_name;
	private $cell_iq_connector;
	private $cell_status;
	
	function __construct($db = '') {
		$this->db = $db;
	}
	
	/**
	 * Gets all cells
	 */
	static function getAllCells() {
	
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_cells');
		
		if ($query->execute())
			return $query->fetchAll(PDO::FETCH_CLASS, 'Cell');
		
	}
	
	/**
	 * Gets single cell
	 */
	public static function getCell($id) {
	
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_cells WHERE id = :id');
		$query->bindValue('id', $id);
		$query->execute();
		
		if ($query->rowCount() > 0)
			return $query->fetchAll(PDO::FETCH_CLASS, 'Cell')[0];
			
	}
	
	/**
	 * Get cell ID
	 *
	 * @since 1.0.0
	 */
	function getID() {
		return $this->id;
	}
	
	/**
	 * Get cell name
	 *
	 * @since 1.0.0
	 */
	function getName() {
		return $this->cell_name;
	}
	
}