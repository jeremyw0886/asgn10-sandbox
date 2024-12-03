<?php
ob_start();

// Assign file paths to PHP constants
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

// Assign the root URL to a PHP constant
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

require_once('functions.php');
require_once('validation_functions.php');
require_once('db_credentials.php');
require_once('classes/database.class.php');
require_once('classes/databaseobject.class.php');
require_once('classes/bird.class.php');
require_once('classes/member.class.php');
require_once('classes/session.class.php');

// Initialize Database connection
Database::db_connect();
$database = Database::db_connect();
DatabaseObject::set_database($database);

$session = new Session;

function require_login() {
    global $session;
    if(!$session->is_logged_in()) {
        redirect_to(url_for('/members/login.php'));
    }
}
?>
