<?php

require_once('../_sys/init.php');

if(is_null(Users::getUser())) {
	Request::redirect('login');
}
$uid = isset($_GET['uid']) ? $_GET['uid'] : -1;

$page = new Page;
$sc = new PAkteContent;

$page->_header();
$sc->page($uid);
$page->_footer();

?>