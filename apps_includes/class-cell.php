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
	private $cell_order;

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
	 * Get cells by division
	 */
	static function getCellsByDivision($id, $status = '', $orderby = '') {

		$db = DB::getInstance();
		$params = [];

		$sql = 'SELECT *
			FROM
				app_cells
			WHERE
				app_division_id = :id';

		if ($status != '') {
			$sql .= ' AND cell_status = :status';
			$params['status'] = $status;
		}

		if ($orderby != '') {
			$sql .= ' ORDER BY '. $orderby;
		}

		// Prepare data params
		$params['id'] = $id;

    // Prepare & execute query
    $query = $db->dbh->prepare($sql);
    $result = $query->execute($params);

		// Check results
		if ($query->execute($params))
			return $query->fetchAll(PDO::FETCH_CLASS, 'Cell');

	}

	/**
	 * Gets single cell
	 */
	public static function getCell($id) {

		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_cells WHERE id = :id');
		$query->bindValue('id', $id);

		if ($query->execute())
			return $query->fetchAll(PDO::FETCH_CLASS, 'Cell')[0];

	}

	/**
	 * Adds cell to database
	 */
	public static function addCell($post) {

		$db = DB::getInstance();

		$query = $db->dbh->prepare('INSERT INTO app_cells (app_division_id, app_location_id, cell_number, cell_name, cell_iq_connector, cell_status, cell_order) VALUES (:app_division_id, :app_location_id, :cell_number, :cell_name, :cell_iq_connector, :cell_status, :cell_order)');
		$query->bindValue('app_division_id', $post['app_division_id']);
		$query->bindValue('app_location_id', $post['app_location_id']);
		$query->bindValue('cell_number', $post['cell_number']);
		$query->bindValue('cell_name', $post['cell_name']);
		$query->bindValue('cell_iq_connector', $post['cell_iq_connector']);
		$query->bindValue('cell_status', $post['cell_status']);
		$query->bindValue('cell_order', $post['cell_order']);

		if ($query->execute())
			return true;

	}

	/**
	 * Saves cell to database
	 */
	public static function saveCell($id, $post) {

		$db = DB::getInstance();
		$query = $db->dbh->prepare('UPDATE app_cells SET app_division_id = :app_division_id, app_location_id = :app_location_id, cell_number = :cell_number, cell_name = :cell_name, cell_iq_connector = :cell_iq_connector, cell_status = :cell_status, cell_order = :cell_order WHERE id = :id');
		$query->bindValue('id', $id);
		$query->bindValue('app_division_id', $post['app_division_id']);
		$query->bindValue('app_location_id', $post['app_location_id']);
		$query->bindValue('cell_number', $post['cell_number']);
		$query->bindValue('cell_name', $post['cell_name']);
		$query->bindValue('cell_iq_connector', $post['cell_iq_connector']);
		$query->bindValue('cell_status', $post['cell_status']);
		$query->bindValue('cell_order', $post['cell_order']);

		if ($query->execute())
			return true;

	}

	/**
	 * Deletes cell from database
	 */
	public static function deleteCell($id) {

		$db = DB::getInstance();
		$query = $db->dbh->prepare('DELETE FROM app_cells WHERE id = :id');
		$query->bindValue('id', $id);

		if ($query->execute())
			return true;

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

	/**
	 * Get cell number
	 */
	function getNumber() {
		return $this->cell_number;
	}

	/**
	 * Get cell division ID
	 */
	function getDivisionID() {
		return $this->app_division_id;
	}

	/**
	 * Get cell location ID
	 */
	function getLocationID() {
		return $this->app_location_id;
	}

	/**
	 * Get cell IQ connector
	 */
	function getIQConnector() {
		return $this->cell_iq_connector;
	}

	/**
	 * Get cell status
	 */
	function getStatus() {
		return $this->cell_status;
	}

	/**
	 * Get cell display order
	 */
	function getOrder() {
		return $this->cell_order;
	}

}
