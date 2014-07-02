<?php
/**
 * Template class
 */

class Template {

	private $site_template_path;
	private $app_template_path;
	private $sub_template;
	private $sub_func;
	private $page_title;
	private $tab_page_title;
	private $theMessage;
	private $hasMessage;
	private $messageType;
	private $options;
	private $parent_page;
	private $child_page;
	private $head_scripts = array();
	
	/**
	 * Template initializer
	 */
	function __construct($options) {
		
		// Set the site's options
		$this->options = $options;
		
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
	 * Sets app template path
	 */
	function set_app_template_path($app_template_path) {
		$this->options['app_template_path'] = $this->get_option('site_path') . $app_template_path;
	}
	
	/**
	 * Sets the page title
	 */
	function set_page_title($title) {
		$this->page_title = $title;
	}
	
	/**
	 * Returns the page title
	 */
	function get_page_title() {
		return $this->page_title;
	}
	
	/**
	 * Sets the tab page title
	 */
	function set_tab_page_title($title) {
		$this->tab_page_title = $title;
	}
	
	/**
	 * Returns the tab page title
	 */
	function get_tab_page_title() {
		return $this->tab_page_title;
	}
	
	/**
	 * Sets sub template to be used within a page
	 */
	function set_sub_template($sub_template, $sub_func = 'main') {
		$this->sub_template = $sub_template;
		$this->sub_func = $sub_func;
	}
	
	/**
	 * Returns sub template name
	 */
	function get_sub_template() {
		return $this->sub_template;
	}
	
	/**
	 * Returns sub function to call
	 */
	function get_sub_func() {
		return $this->sub_func;
	}
	
	/**
	 * Sets the app URL
	 */
	function setAppURL($url) {
		$this->options['app_url'] = $url;
	}
	
	/**
	 * Get site options
	 */
	function get_option($option) {
		
		switch ($option) {
			case 'site_title':
				return $this->options['site_title'];
				break;
			case 'site_url':
				return $this->options['site_url'];
				break;
			case 'site_path':
				return $this->options['site_path'];
				break;
			case 'site_template_path':
				return $this->options['site_template_path'];
				break;
			case 'app_url':
				return $this->options['app_url'];
				break;
			case 'app_template_path':
				return $this->options['app_template_path'];
				break;
			default:
				throw new Exception('Option does not exist!');
		}
		
	}
	
	/**
	 * Validates form input
	 *
	 * @return false on failure, otherwise value of form input
	 */
	function validate_input($input) {
		
		if (!empty($input)) {
			return $input;
		} else {
			throw new Exception('Please fill in all required fields!');
		}
		
	}
	
	/**
	 * Sets parent page name
	 */
	function setParentPage($name) {
		$this->parent_page = $name;
	}
	
	/**
	 * Returns parent page name
	 */
	function getParentPage() {
		if (isset($this->parent_page)) {
			return $this->parent_page;
		} else {
			return '';
		}
	}
	
	/**
	 * Sets parent page name
	 */
	function setChildPage($name) {
		$this->child_page = $name;
	}
	
	/**
	 * Returns parent page name
	 */
	function getChildPage() {
		if (isset($this->child_page)) {
			return $this->child_page;
		} else {
			return '';
		}
	}
	
	/**
	 * Redirects page
	 */
	function redirect($url) {
		header('Location: '. $url);
		exit();
	}
	
}