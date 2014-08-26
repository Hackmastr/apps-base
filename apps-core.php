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
require_once('apps_includes/class-database.php');
require_once('apps_includes/class-bootstrap.php');
require_once('apps_includes/phpmailer/class.phpmailer.php');
require_once('apps_includes/class-template.php');

/**
 * Start database connection
 */
$database = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
Bootstrap::$db = $database;

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
$template = new Template($site_options);