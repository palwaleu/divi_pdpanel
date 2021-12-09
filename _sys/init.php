<?php
//error_reporting(E_ALL & ~E_NOTICE);
//ini_set('error_reporting', E_ALL);
require_once('settings.inc');

for($i=0; $i < MAX_DB_CONNECTION; $i++) {
	$_DB[$i] = new PDO('mysql:host='.MYSQL_HOST.';charset='.MYSQL_CHARSET.';port='.MYSQL_PORT.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
	$_DB[$i]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

require_once('classes/Request.php');
require_once('classes/Generate.php');
require_once('classes/Users.php');
require_once('classes/Utils.php');
require_once('classes/Page.php');
require_once('classes/SettingsContent.php');
require_once('classes/AccountsContent.php');
require_once('classes/PAkteContent.php');

$_UTILS = new Utils;

?>