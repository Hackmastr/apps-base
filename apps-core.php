<?php
/**
 * Apps core file. This loads the entire Apps site enviroment
 * which will be used by all included apps
 */
session_start();

define('APPS_CORE_VERSION', '1.0a');

/**
 * Get required files
 */
require_once('apps-config.php');
require_once('apps_includes/functions-core.php');
require_once('apps_includes/functions-general-template.php');
require_once('apps_includes/phpmailer/class.phpmailer.php');

/**
 * Class autoloader
 */
spl_autoload_register(function ($class) {

	if (defined('APP_NAME')) { 

		// Construct our class' file path
		$class_file = __DIR__ .'/a/'. APP_NAME .'/'. APP_NAME .'_includes/class-'. strtolower($class) .'.php';
		$class_file_fallback = __DIR__ .'/apps_includes/class-'. strtolower($class) .'.php';
		
		// Check if class file exists inside app's includes directory
		// Of not, fall back to the base app's includes directory
		if (file_exists($class_file)) {
			require_once $class_file;
		} else if (file_exists($class_file_fallback)) {
			require_once $class_file_fallback;
		} else {
			throw new Exception('Class file "'. $class_file .'" can\'t be found!');
		}
		
	} else {
	
		throw new Exception('APP_NAME is not defined!');
	
	}
	
});

/**
 * Start database connection
 */
try {
	$database = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
	Bootstrap::$db = $database;
} catch (Exception $e) {
	if (DEBUG) {
		echo $e;
	} else {
		echo '<b>ERROR: Could not load Database class!</b>';
	}
}

/**
 * Initialize and configure PHPMailer
 */
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = $site_options['email_host'];
$mail->Port = $site_options['email_port'];
$mail->From = $site_options['email_from'];
$mail->FromName = $site_options['email_from_name'];
$mail->SMTPAuth = true;
$mail->Username = $site_options['email_username'];
$mail->Password = $site_options['email_password'];

/**
 * Begin template
 */
try {
	$template = new Template($site_options);
} catch (Exception $e) {
	if (DEBUG) {
		echo $e;
	} else {
		echo '<b>ERROR: Could not load Template class!</b>';
	}
}