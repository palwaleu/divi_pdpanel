<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);
require_once('_sys/init.php');

if(is_null(Users::getUser())) {
	Request::redirect('login');
}

$page = new Page;

$page->_header();
echo '<body class="">';
$page->metroContent();
$page->charmContent();
$page->desktopContent();
$page->_footer();

?>