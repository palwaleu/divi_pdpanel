<?php

require_once('../_sys/init.php');

if(is_null(Users::getUser())) {
	Request::redirect('login');
}

$page = new Page;
$sc = new SettingsContent;

$page->_header();
$sc->SettingsLastlogin();
$page->_footer();

?>