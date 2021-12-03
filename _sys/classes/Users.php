<?php

class Users {
	
	public static function getUser($newssid = null) {
		global $_DB;
		if(!Request::getSession()) {
			return null;
		}
		
		$stmt = $_DB[0]->prepare("SELECT * FROM `PD_Logins` WHERE `ssid` = :ssid LIMIT 1");
		$stmt->execute(array(':ssid' => ($newssid==NULL) ? Request::getSession() : $newssid));
		
		return $stmt->rowCount() == 0 ? NULL : $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	public static function getStandartMailAccount($newssid = null) {
		//INSERT INTO `Email_Accounts` (`id`, `email`, `maxmails`, `standart`, `active`, `ssid`) VALUES (NULL, 'ahmet.aras@police.net', '100', '1', '1', 'i34fw');
		global $_DB;
		if(!Request::getSession()) {
			return null;
		}
		
		$stmt = $_DB[0]->prepare("SELECT * FROM `Email_Accounts` WHERE `ssid` = :ssid AND `active` = 1 AND `standart` = 1 LIMIT 1");
		$stmt->execute(array(':ssid' => ($newssid==NULL) ? Request::getSession() : $newssid));
		
		return $stmt->rowCount() == 0 ? NULL : $stmt->fetch(PDO::FETCH_OBJ);
	}
	
	public static function getFrakRang($newssid = null) {
		global $_DB;
		$stmt = $_DB[1]->prepare("SELECT `RankName` FROM `Factions_Ranks` WHERE `FactionID` = :fid AND `RankID` = :rang");
		$stmt->execute(array(':fid' => Fraction, ':rang' => self::getUser($newssid)->PD_Rang));
		return $stmt->rowCount() == 0 ? 'Unbekannt' : $stmt->fetch(PDO::FETCH_OBJ)->RankName;
	}
	
	public static function haveNewValation($newssid = null) {
		global $_DB;
		$stmt = $_DB[2]->prepare("SELECT `id` FROM `PD_Valuation_Cron` WHERE `uid` = :uid");
		$stmt->execute(array(':uid' => self::getUser()->ID));
		return $stmt->rowCount() == 0 ? false : true;
	}
	
}

?>