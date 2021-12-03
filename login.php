<?php

require_once('_sys/init.php');

if(!is_null(Users::getUser())) {
	Request::redirect('desktop', true);
}

$page = new Page;

$page->_header();
$page->loginContent();
$page->_footer();

?>