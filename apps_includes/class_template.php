<?php
/**
 * Template class
 */

class Template {

	private $site_template_path;
	private $app_template_path;
	private $page_title;
	private $options;
	
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
		$this->options['app_template_path'] = $app_template_path;
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
			case 'site_template_path':
				return $this->options['site_template_path'];
				break;
			case 'app_template_path':
				return $this->options['app_template_path'];
				break;
			default:
				throw new Exception('Option does not exist!');
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
				'url' => '/index.php?p=apps',
				'children' => array(
					'monthly' => array(
						'title' => 'Monthly',
						'url' => '/a/index.php',
					),
				),
			),
			'Manage' => array(
				'title' => 'Manage',
				'url' => '/index.php?p=manage',
			),
		);
		
		foreach($nav_menu_setup as $nav_item => $nav_item_properties) {
			
			if (isset($nav_item_properties['children'])) {
				
				$nav_menu .= '<li>
					<a href="'. $this->get_option('site_url') . $nav_item_properties['url'] .'">'. $nav_item_properties['title'] .'</a>
					<ul>';
				
					foreach ($nav_item_properties['children'] as $child_item => $child_item_properties) {
					
						$nav_menu .= '<li><a href="'. $this->get_option('site_url') . $child_item_properties['url'] .'">'. $child_item_properties['title'] .'</a></li>';
						
					}
				
					$nav_menu .= '</ul>
				</li>';
				
			} else {
				
				$nav_menu .= '<li><a href="'. $this->get_option('site_url') . $nav_item_properties['url'] .'">'. $nav_item_properties['title'] .'</a></li>';
				
			}
			
		}
		
		$nav_menu .= '</ul>';
		
		return $nav_menu;
		
	}
	
}