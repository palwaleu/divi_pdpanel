<?php
require_once('_sys/init.php');

$handle = isset($_GET['handle']) ? $_GET['handle'] : false;

if(!$handle) {
	die('Aktion nicht möglich!');
	exit;
}

if($handle == 'checkuseraccount') {
	
	$stmt = $_DB[0]->prepare("SELECT * FROM `PD_Logins` WHERE `PD_Username` = :username OR `servicenumber` = :username LIMIT 1");
	$stmt->execute(array(':username' => $_POST['userfield']));
	if($stmt->rowCount() > 0) {
		$f = $stmt->fetch(PDO::FETCH_OBJ);
		$array = array('code' => 1,
					  'pic' => $f->picture);
	} else {
		$array = array('code' => 0);
	}
	echo json_encode($array);
}

if($handle == 'checklogin') {
	
	$stmt = $_DB[0]->prepare("SELECT * FROM `PD_Logins` WHERE (`PD_Username` = :username AND `PD_Password` = :password) OR (`servicenumber` = :username AND `PD_Password` = :password) LIMIT 1");
	$stmt->execute(array(':username' => $_POST['userfield'], ':password' => $_POST['pw']));
	if($stmt->rowCount() > 0) {
		$f = $stmt->fetch(PDO::FETCH_OBJ);
		$array = array('code' => 1,
					  'ssid' => $f->ssid);
	} else {
		$array = array('code' => 0);
	}
	echo json_encode($array);
}

if($handle == 'SystemNotice') {
	
	$notice = isset($_POST['notice']) ? $_POST['notice'] : false;
	$check = isset($_POST['check']) ? $_POST['check'] : false;
	$ssid = isset($_POST['ssid']) ? $_POST['ssid'] : false;
	if(!$ssid) {
		$array = array('code' => 0,
					  'error' => 'Session-ID wurde nicht gefunden oder übergeben! [Code: 01]');
	}
	if(!$check) {
		$array = array('code' => 0,
					  'error' => 'Checked-Control wurde nicht gefunden oder übergeben! [Code: 02]');
	}
	if(!$notice) {
		$array = array('code' => 0,
					  'error' => 'Session-ID wurde nicht gefunden oder übergeben! [Code: 03]');
	}
	
	try {
		$stmt = $_DB[0]->prepare("UPDATE `PD_Logins` SET `".$notice."` = :check WHERE `ssid` = :ssid LIMIT 1");
		$stmt->execute(array(':check' => $check, ':ssid' => $ssid));
		$array = array('code' => 1);
	} catch (PDOException $e) {
		$array = array('code' => 0,
					  'error' => 'DB-fehler: '.$e->getMessage().' [Code: 04]');
	}
	
	echo json_encode($array);
	exit;
}

if($handle == 'ChangeDesktop') {

	$desktop = isset($_POST['desktop']) ? $_POST['desktop'] : false;
	$ssid = isset($_POST['ssid']) ? $_POST['ssid'] : false;
	if(!$ssid) {
		$array = array('code' => 0,
					  'error' => 'Session-ID wurde nicht gefunden oder übergeben! [Code: 05]');
	}
	if(!$desktop) {
		$array = array('code' => 0,
					  'error' => 'Desktop-Info wurde nicht gefunden oder übergeben! [Code: 06]');
	}
	$desktop = $desktop.'.jpg';
	
	try {
		$stmt = $_DB[0]->prepare("UPDATE `PD_Logins` SET `desktop` = :desktop WHERE `ssid` = :ssid LIMIT 1");
		$stmt->execute(array(':desktop' => $desktop, ':ssid' => $ssid));
		$array = array('code' => 1);
	} catch (PDOException $e) {
		$array = array('code' => 0,
					  'error' => 'DB-fehler: '.$e->getMessage().' [Code: 07]');
	}
	
	echo json_encode($array);
	exit;
}

if($handle == 'ChangeTaskbarBackground') {
	$color = isset($_POST['color']) ? $_POST['color'] : false;
	$ssid = isset($_POST['ssid']) ? $_POST['ssid'] : false;
	if(!$ssid) {
		$array = array('code' => 0,
					  'error' => 'Session-ID wurde nicht gefunden oder übergeben! [Code: 08]');
	}
	if(!$color) {
		$array = array('code' => 0,
					  'error' => 'Desktop-Info wurde nicht gefunden oder übergeben! [Code: 09]');
	}
	
	try {
		$stmt = $_DB[0]->prepare("UPDATE `PD_Logins` SET `taskbar_background` = :color WHERE `ssid` = :ssid LIMIT 1");
		$stmt->execute(array(':color' => $color, ':ssid' => $ssid));
		$array = array('code' => 1);
	} catch (PDOException $e) {
		$array = array('code' => 0,
					  'error' => 'DB-fehler: '.$e->getMessage().' [Code: 10]');
	}
	
	echo json_encode($array);
	exit;
}

if($handle == 'ChangeTaskbarColor') {
	$color = isset($_POST['color']) ? $_POST['color'] : false;
	$ssid = isset($_POST['ssid']) ? $_POST['ssid'] : false;
	if(!$ssid) {
		$array = array('code' => 0,
					  'error' => 'Session-ID wurde nicht gefunden oder übergeben! [Code: 11]');
	}
	if(!$color) {
		$array = array('code' => 0,
					  'error' => 'Desktop-Info wurde nicht gefunden oder übergeben! [Code: 12]');
	}
	
	try {
		$stmt = $_DB[0]->prepare("UPDATE `PD_Logins` SET `taskbar_color` = :color WHERE `ssid` = :ssid LIMIT 1");
		$stmt->execute(array(':color' => $color, ':ssid' => $ssid));
		$array = array('code' => 1);
	} catch (PDOException $e) {
		$array = array('code' => 0,
					  'error' => 'DB-fehler: '.$e->getMessage().' [Code: 13]');
	}
	
	echo json_encode($array);
	exit;
}

if($handle == 'ChangePassword') {
	$pw = isset($_POST['pw']) ? $_POST['pw'] : false;
	$ssid = isset($_POST['ssid']) ? $_POST['ssid'] : false;
	if(!$ssid) {
		$array = array('code' => 0,
					  'error' => 'Session-ID wurde nicht gefunden oder übergeben! [Code: 14]');
	}
	if(!$pw) {
		$array = array('code' => 0,
					  'error' => 'Desktop-Info wurde nicht gefunden oder übergeben! [Code: 15]');
	}
	
	try {
		$stmt = $_DB[0]->prepare("UPDATE `PD_Logins` SET `PD_Password` = :pw WHERE `ssid` = :ssid LIMIT 1");
		$stmt->execute(array(':pw' => $pw, ':ssid' => $ssid));
		$array = array('code' => 1);
	} catch (PDOException $e) {
		$array = array('code' => 0,
					  'error' => 'DB-fehler: '.$e->getMessage().' [Code: 13]');
	}
	
	echo json_encode($array);
	exit;
}

if($handle == 'setTime') {
	$set = isset($_POST['set']) ? $_POST['set'] : false;
	$ssid = isset($_POST['ssid']) ? $_POST['ssid'] : false;
	$value = isset($_POST['value']) ? $_POST['value'] : false;

	try {
		$stmt = $_DB[0]->prepare("UPDATE `PD_Logins` SET `".$set."` = :value WHERE `ssid` = :ssid LIMIT 1");
		$stmt->execute(array(':value' => $value, ':ssid' => $ssid));
		//$array = array('code' => 1);
	} catch (PDOException $e) {
		//$array = array('code' => 0,
					//  'error' => 'DB-fehler: '.$e->getMessage().' [Code: 13]');
		die($e->getMessage());
	}
	
	//echo json_encode($array);
	exit;
}
?>