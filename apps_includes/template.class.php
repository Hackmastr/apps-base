<?php
/**
 * Template class
 */

class Template {

	var $template_path;
	
	/**
	 * Template initializer
	 */
	function __construct($template_path) {
		
		$this->template_path = $template_path;
		
		require_once($this->template_path .'/Index.template.php');
		
	}
	
}