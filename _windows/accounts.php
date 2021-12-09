<?php

require_once('../_sys/init.php');

if(is_null(Users::getUser())) {
	Request::redirect('login');
}

$page = new Page;
$sc = new AccountsContent;

$page->_header();
$sc->page();
$page->_footer();

?>