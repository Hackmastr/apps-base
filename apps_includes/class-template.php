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
	
	/**
	 * Template initializer
	 */
	function __construct($options) {
		
		// Set the site's options
		$this->options = $options;
		
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
	 * Creates error message
	 */
	function createMessage($type, $message, $return = false) {
		$this->theMessage = $message;
		$this->hasMessage = true;
		$this->messageType = $type;
		
		if ($return) {
			return $this->getMessage();
		}
		
	}
	
	/**
	 * Returns error message
	 */
	function getMessage() {
	
		$message = '<div class="msg_box '. $this->messageType .'">';
		$message .= $this->theMessage;
		$message .= '</div>';
		
		return $message;
	}
	 
	/**
	 * Returns error message status
	 */
	function hasMessage() {
		if ($this->hasMessage) {
			return true;
		} else {
			return false;
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
	 * Gets site nav menu
	 * @TODO: Populate database with nav link, and retrieve from there
	 *        Clean up this code!!
	 */
	function get_nav_menu() {
	
		$nav_menu = '<ul>';

		$nav_menu_setup = array(
			'home' => array(
				'title' => 'Home',
				'url' => '/index.php',
			),
			'apps' => array(
				'title' => 'Apps',
				'url' => '/a/index.php',
				'children' => array(
					'monthly' => array(
						'title' => 'Monthly',
						'url' => '/a/monthly/index.php',
					),
				),
			),
			'manage' => array(
				'title' => 'Admin',
				'url' => '/admin.php',
			),
		);
		
		foreach($nav_menu_setup as $nav_item => $nav_item_properties) {
			
			if (isset($nav_item_properties['children'])) {
				
				$nav_menu .= '<li '. ($this->getParentPage() == $nav_item ? 'class="current-menu-item"' : '') .'>
					<a href="'. $this->get_option('site_url') . $nav_item_properties['url'] .'">'. $nav_item_properties['title'] .'</a>
					<ul>';
				
					foreach ($nav_item_properties['children'] as $child_item => $child_item_properties) {
					
						$nav_menu .= '<li><a href="'. $this->get_option('site_url') . $child_item_properties['url'] .'">'. $child_item_properties['title'] .'</a></li>';
						
					}
				
					$nav_menu .= '</ul>
				</li>';
				
			} else {
				
				$nav_menu .= '<li '. ($this->getParentPage() == $nav_item ? 'class="current-menu-item"' : '') .'><a href="'. $this->get_option('site_url') . $nav_item_properties['url'] .'">'. $nav_item_properties['title'] .'</a></li>';
				
			}
			
		}
		
		$nav_menu .= '</ul>';
		
		return $nav_menu;
		
	}
	
}