<?php

class Request {
	
	public static function getSession() {
		return (isset($_GET['ssid'])) ? $_GET['ssid'] : false;
	}
	
	public static function redirect($site, $withssid = false) {
		$url = URL.'/'.$site.'.php';
		if(Request::getSession()!=false && $withssid) {
			$url .= '?ssid='.Request::getSession();
		}
		@header('Location: '.$url);
		exit;
	}
	
}

?>