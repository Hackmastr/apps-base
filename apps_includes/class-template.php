<?php

/**
 * Template class
 *
 * @author Keith Brinks <keith.brinks@venturamfg.com>
 * @since 1.0.0
 */

class Template {

	/**
	 * Site options
	 */
	private $site_options;
	
	/**
	 * App options
	 */
	private $app_options;
	
	/**
	 * Page title
	 */
	public $page_title;
	
	/**
	 * Stores scripts to be added to <head>
	 */
	private $head_scripts;
	
	/**
	 * Parent page
	 */
	public $parent_page;
	
	/**
	 * Sub navigation menu
	 */
	public $subnav;
	
	/**
	 * Page values
	 */
	private $page_values = array();
	
	/**
	 * Construct
	 */
	function __construct($site_options, $app_options) {
		$this->site_options = $site_options;
		$this->app_options = $app_options;
	}
	
	/**
	 * Adds stylesheet or other scripts to <head>
	 */
	function addScript($src) {
		$this->head_scripts[] = $src;
	}
	
	/**
	 * Returns scripts added to <head>
	 */
	function getScripts() {
		return $this->head_scripts;
	}
	
	/**
	 * Generates navbar from $subnav
	 */
	function subnav() {
	
		if (!empty($this->subnav)) {

			$subnav = '<div class="navbar-collapse collapse">
				<ul class="nav nav-sidebar">';
			
				foreach($this->subnav as $subnav_item => $subnav_item_properties) {
					
					$subnav .= '<li><a href="'. $subnav_item_properties['url'] .'">'. $subnav_item_properties['title'] .'</a></li>';
					
				}
			
				$subnav .= '</ul>
			</div>';
			
			// Returns results
			return $subnav;
			
		} else {
			
			return 'Subnav not defined.';
			
		}

	}
	
	/**
	 * Sets various page values
	 */
	function setPageValues($values) {
		array_push($this->page_values, $values);
	}
	
	/**
	 * Print page values
	 */
	function printVal($value) {
		return $this->page_values[0][$value];
	}
	
}