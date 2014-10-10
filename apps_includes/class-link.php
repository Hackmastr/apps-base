<?php
/**
 * Base Apps cells class
 *
 * @since 1.0.0
 */

class Link {

	private $id;
	private $link_name;
	private $link_description;
	private $link_url;
	private $link_bg_color;
	private $link_order;
	private $link_icon_class;
	
	/**
	 * Gets all links
	 */
	public static function getAllLinks() {
		
		$db = DB::getInstance();
		$query = $db->dbh->prepare('SELECT * FROM app_links');
		
		if ($query->execute())
			return $query->fetchALL(PDO::FETCH_CLASS, 'Link');		
		
	}
	
	/**
	 * Gets link ID
	 */
	function getID() {
		return $this->id;
	}
	
	/**
	 * Gets link name
	 */
	function getName() {
		return $this->link_name;
	}
	
	/**
	 * Gets link description
	 */
	function getDescription() {
		return $this->link_description;
	}
	
	/**
	 * Gets link URL
	 */
	function getURL() {
		return $this->link_url;
	}
	
	/**
	 * Gets link background color
	 */
	function getBGColor() {
		return $this->link_bg_color;
	}
	
	/**
	 * Gets link order
	 */
	function getOrder() {
		return $this->link_order;
	}
	
	/**
	 * Gets link icon class
	 */
	function getIconClass() {
		return $this->link_icon_class;
	}
	
}