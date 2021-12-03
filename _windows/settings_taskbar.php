<?php

require_once('../_sys/init.php');

if(is_null(Users::getUser())) {
	Request::redirect('login');
}

$page = new Page;
$sc = new SettingsContent;

$page->_header();
$sc->SettingsTaskbar();
/*
$(document).ready(function(){
	$( "#color-controller" ).change(function() {
 // $('.palwalcolor').html($("#color-controller").val());
      console.log('GEHHHHT')
});
   
});
*/
$page->_footer();

?>