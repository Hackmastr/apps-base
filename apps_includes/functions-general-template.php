<?php
/**
 * Template functions
 */

/**
 * Loads template header file
 */
function get_header() {
	
	global $template;
	
	$template_header_file = $template->get_option('site_template_path') .'/template-header.php';
	
	if (file_exists($template_header_file)) {
		require_once($template_header_file);	
	} else {
		throw new Exception('Header template ('. $template_header_file .') cannot be found!');
	}	
	
}

/**
 * Loads requested template file
 */
function load_template($requested_template) {
	
	global $template;
	
	$template_file = $template->get_option('app_template_path') .'/template-'. $requested_template .'.php';
	
	if (file_exists($template_file)) {
		require_once($template_file);	
	} else {
		echo 'Requested template file ('. $template_file .') cannot be found!';
	}	
	
}

/**
 * Loads template footer file
 */
function get_footer() {
	
	global $template;
	
	$template_footer_file = $template->get_option('site_template_path') .'/template-footer.php';
	
	if (file_exists($template_footer_file)) {
		require_once($template_footer_file);	
	} else {
		echo 'Footer file ('. $template_footer_file .') cannot be found!';
	}	
	
}

/**
 * Loads apps <head>
 */
function apps_head() {
	
	global $template;
	
	// Are there any scripts being loaded?
	if (!empty($template->getScripts())) {
	
		foreach ($template->getScripts() as $script) {
			
			echo $script;
			
		}
		
	}
	
}

/**
 * Displays main nav menu
 */
function get_nav_menu() {
	
	global $template;
	
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
		'admin' => array(
			'title' => 'Admin',
			'url' => '/admin.php',
		),
	);
	
	foreach($nav_menu_setup as $nav_item => $nav_item_properties) {
		
		if (isset($nav_item_properties['children'])) {
			
			$nav_menu .= '<li '. ($template->getParentPage() == $nav_item ? 'class="current-menu-item"' : '') .'>
				<a href="'. $template->get_option('site_url') . $nav_item_properties['url'] .'">'. $nav_item_properties['title'] .'</a>
				<ul>';
			
				foreach ($nav_item_properties['children'] as $child_item => $child_item_properties) {
				
					$nav_menu .= '<li><a href="'. $template->get_option('site_url') . $child_item_properties['url'] .'">'. $child_item_properties['title'] .'</a></li>';
					
				}
			
				$nav_menu .= '</ul>
			</li>';
			
		} else {
			
			$nav_menu .= '<li '. ($template->getParentPage() == $nav_item ? 'class="current-menu-item"' : '') .'><a href="'. $template->get_option('site_url') . $nav_item_properties['url'] .'">'. $nav_item_properties['title'] .'</a></li>';
			
		}
		
	}
	
	$nav_menu .= '</ul>';
	
	echo $nav_menu;
	
}

/**
 * Creates message
 */
function create_message($type, $message, $echo = false) {

	$msg = '<div class="msg_box '. $type .'">
		'. $message .'
	</div>';
	
	if ($echo) {
		echo $msg;
	} else {
		$_SESSION['message'] = $msg;
	}
	
}

/**
 * Displays messages
 */
function get_message() {

	if (!empty($_SESSION['message']) && isset($_SESSION['message'])) {
		echo $_SESSION['message'];
	}
	
	$_SESSION['message'] = '';
	
}