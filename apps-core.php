<?php
/**
 * Apps core file. This loads the entire Apps site enviroment
 * which will be used by all included apps
 */
session_start();
ob_start();

/**
 * Get required files
 */
require_once 'apps-config.php';
require_once 'apps_includes/functions-core.php';
require_once 'apps_includes/phpmailer/class.phpmailer.php';
require_once 'apps_includes/eos/Stack.php';
require_once 'apps_includes/eos/Parser.php';
require_once 'apps_includes/class-app.php';

/**
 * Class autoloader
 */
spl_autoload_register(function ($class) {

	global $options, $app;

	$base_include_path = $options['site_path'] .'apps_includes/class-'. strtolower($class) .'.php';

	if (!empty($app->directory))
		$app_include_path = $class_file = $options['apps_directory'] . $app->directory .'/'. $app->prefix .'_includes/class-'. strtolower($class) .'.php';

	if (empty($app->directory))
		$class_file = $base_include_path;
	else if (!file_exists($app_include_path))
		$class_file = $base_include_path;
	else
		$class_file = $app_include_path;

	if (file_exists($class_file))
		include $class_file;
	else
		throw new Exception('Class file ('. $class .') cannot be found!');

});

/**
 * Start database connection
 */
DB::writeConf('db_host', DB_HOST);
DB::writeConf('db_name', DB_NAME);
DB::writeConf('db_user', DB_USER);
DB::writeConf('db_pass', DB_PASS);
DB::writeConf('db_connection_type', DB_CONNECTION_TYPE);

/**
 * Initialize and configure PHPMailer
 */
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = $options['email_host'];
$mail->Port = $options['email_port'];
$mail->From = $options['email_from'];
$mail->FromName = $options['email_from_name'];
$mail->SMTPAuth = true;
$mail->Username = $options['email_username'];
$mail->Password = $options['email_password'];

/**
 * Initialize EOS
*/
$eos = new jlawrence\eos\Parser();

/**
 * User Login Management
 */
$usr = new UserLogin();

if (isset($_POST['login'])) {

	$login_result = $usr->login($_POST['user_name'], $_POST['user_password']);

	if (!$login_result) {
		create_message('danger', 'The login information you provided was incorrect. Please try again.');
	} else {
		redirect(get_page_url());
	}

}
if (isset($_POST['logout'])) {
	$usr->logout();
	redirect(get_page_url());
}
