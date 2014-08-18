<?php
/**
 * Master App class
 */
class App {
	
	protected $appURL;
	protected $secondary_nav;
	
	/**
	 * Sets the App URL
	 */
	function setAppURL($url) {
		$this->appURL = $url; 
	}
	
	/**
	 * Gets the app URL
	 */
	function getAppURL() {
		return $this->appURL;
	}
	
	/**
	 * Gets secondary nav menu
	 */
	function getSecondaryNav() {
		return $this->secondary_nav;
	}
	
}