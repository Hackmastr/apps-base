<?php
/**
 * Checks if current page is a single view page
 */
function is_single() {

	$action = get_var('action');
	
	if ($action == 'view' || $action == 'add') {
		return true;
	} else {
		return false;
	}
	
}

/**
 * Returns requested $_GET
 *
 * @return boolean Returns value of $_GET, otherwise false if not set
 */
function get_var($requested_var) {
	
	// Check if the requested var is set
	if (isset($_GET[$requested_var])) {
			
		return $_GET[$requested_var];
		
	} else {
		
		return false;
		
	}
	
}

/**
 * Returns current page URL string
 *
 * Comes from code snippet by Chris Coyier
 * http://css-tricks.com/snippets/php/get-current-page-url/
 */
function get_page_url() {

  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
  $url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
  $url .= $_SERVER["REQUEST_URI"];
  return $url;
	
}

/**
 * Returns either system current time, or defined timestamp
 */
function get_time($timestamp = '', $format = 'M jS, Y') {
	return date($format, (empty($timestamp) ? time() : $timestamp));
}

/**
 * Loads template header file
 */
function get_header() {
	
	global $options, $template;
	
	$template_header_file = $options['site_path'] .'/apps_template/template-header.php';
	
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
	
	global $app, $options, $template;
	
	$template_file = $options['site_path'] . (!empty($app->directory) ? '/a/'. $app->directory : '') .'/'. $app->prefix .'_template/template-'. $requested_template .'.php';
	
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
	
	global $app, $options;
	
	$template_footer_file = $options['site_path'] .'/apps_template/template-footer.php';
	
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
	
	global $options, $template;
	
	$nav_menu = '<ul class="nav navbar-nav">';

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
				'pitchtracker' => array(
					'title' => 'PitchTracker',
					'url' => '/a/pitchtracker/index.php'
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
			
			$nav_menu .= '<li class="dropdown'. ($template->parent_page == $nav_item ? ' active"' : '') .'">
				<a class="dropdown-toggle" data-toggle="dropdown" href="'. $options['site_url'] . $nav_item_properties['url'] .'">'. $nav_item_properties['title'] .' <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">';
			
				foreach ($nav_item_properties['children'] as $child_item => $child_item_properties) {
				
					$nav_menu .= '<li><a href="'. $options['site_url'] . $child_item_properties['url'] .'">'. $child_item_properties['title'] .'</a></li>';
					
				}
			
				$nav_menu .= '</ul>
			</li>';
			
		} else {
			
			$nav_menu .= '<li '. ($template->parent_page == $nav_item ? 'class="active"' : '') .'><a href="'. $options['site_url'] . $nav_item_properties['url'] .'">'. $nav_item_properties['title'] .'</a></li>';
			
		}
		
	}
	
	$nav_menu .= '</ul>';
	
	echo $nav_menu;
	
}

/**
 * Creates message
 */
function create_message($type, $message, $echo = false) {

	$msg = '<div class="alert alert-'. $type .'">
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

/**
 * Redirects page
 */
function redirect($url) {
	header('Location: '. $url);
	exit();
}