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

if($handle == 'setnewfrakrank') {
	$rank = isset($_POST['rank']) ? $_POST['rank'] : '0';
	$id = isset($_POST['id']) ? $_POST['id'] : '-1';
	try {
		$stmt = $_DB[0]->prepare("UPDATE `PD_Logins` SET `PD_Rang` = :rang WHERE `ID` = :id LIMIT 1");
		$stmt->execute(array(':rang' => $rank, ':id' => $id));
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	
}

if($handle == "AdminSetPassword") {
	$newpw = isset($_POST['newpw']) ? $_POST['newpw'] : '0';
	$id = isset($_POST['id']) ? $_POST['id'] : '-1';
	try {
		$stmt = $_DB[0]->prepare("UPDATE `PD_Logins` SET `PD_Password` = :pw WHERE `ID` = :id LIMIT 1");
		$stmt->execute(array(':pw' => $newpw, ':id' => $id));
		echo 1;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
}

if($handle == "AdminSetLohn") {
	$lohn = isset($_POST['lohn']) ? $_POST['lohn'] : '0';
	$id = isset($_POST['id']) ? $_POST['id'] : '-1';
	try {
		$stmt = $_DB[0]->prepare("UPDATE `PD_Logins` SET `PD_Lohn` = :lohn WHERE `ID` = :id LIMIT 1");
		$stmt->execute(array(':lohn' => $lohn, ':id' => $id));
		echo 1;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
}

if($handle == "AdminDeactivateUser"){
	$reason = isset($_POST['reason']) ? $_POST['reason'] : '0';
	$id = isset($_POST['id']) ? $_POST['id'] : '-1';
	try {
		$stmt = $_DB[0]->prepare("UPDATE `PD_Logins` SET `status` = :status, `banreason` = :reason WHERE `ID` = :id LIMIT 1");
		$stmt->execute(array(':status' => 0, ':reason' => $reason, ':id' => $id));
		echo 1;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
}

if($handle == "AdminLockUser") {
	$reason = isset($_POST['reason']) ? $_POST['reason'] : '0';
	$id = isset($_POST['id']) ? $_POST['id'] : '-1';
	try {
		$stmt = $_DB[0]->prepare("UPDATE `PD_Logins` SET `status` = :status, `banreason` = :reason WHERE `ID` = :id LIMIT 1");
		$stmt->execute(array(':status' => 2, ':reason' => $reason, ':id' => $id));
		echo 1;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
}

if($handle == "AdminUnlockUser") {
	$id = isset($_POST['id']) ? $_POST['id'] : '-1';
	try {
		$stmt = $_DB[0]->prepare("UPDATE `PD_Logins` SET `status` = :status, `banreason` = :reason WHERE `ID` = :id LIMIT 1");
		$stmt->execute(array(':status' => 1, ':reason' => NULL, ':id' => $id));
		echo 1;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
}

if($handle == "addPAkte") {
	$id = isset($_POST['id']) ? $_POST['id'] : '-1';
	$text = isset($_POST['text']) ? $_POST['text'] : '-1';
	$rating = isset($_POST['rating']) ? $_POST['rating'] : '-1';
	$admin = isset($_POST['admin']) ? $_POST['admin'] : '-1';
	$addtime = time();
	
	$text = nl2br($text);
	$text = str_replace('\n', '', $text);
	
	try {
		$stmt = $_DB[0]->prepare("INSERT INTO `PD_Personalakte` (`UID`, `text`, `admin`, `addtime`, `valuation`) VALUES (:uid, :text, :admin, :addtime, :rating)");
		$stmt->execute(array(':uid' => $id, ':text' => $text, ':admin' => $admin, ':addtime' => $addtime, ':rating' => $rating));
		if($rating > 0) {
			$stmt2 = $_DB[1]->prepare("INSERT INTO `PD_Valuation_Cron` (`uid`, `addtime`, `sid`, `valuation`) VALUES (:uid, :addtime, :sid, :valuation)");
			$stmt2->execute(array(':uid' => $id, ':addtime' => $addtime, ':sid' => '-1', ':valuation' => $rating));
		}
		echo $_DB[0]->lastInsertId();
	} catch (PDOException $e) {
		die($e->getMessage());
	}
}

if($handle == "deletePAkte") {
	$pid = isset($_POST['pid']) ? $_POST['pid'] : '-1';
	$id = isset($_POST['id']) ? $_POST['id'] : '-1';
	
	$stmt = $_DB[8]->prepare("SELECT * FROM `PD_Personalakte` WHERE `id` = :pid LIMIT 1");
	$stmt->execute(array(':pid' => $pid));
	$valuation = ($stmt->rowCount() > 0) ? $stmt->fetch(PDO::FETCH_OBJ)->valuation : 0;
	$delete = $_DB[9]->prepare("DELETE FROM `PD_Personalakte` WHERE `id` = :id");
	$delete->execute(array(':id' => $pid));
	
	if($valuation>0) {
		$rating = $_DB[7]->prepare("INSERT INTO `PD_Valuation_Cron` (`uid`, `addtime`, `sid`, `valuation`) VALUES (:uid, :addtime, :sid, :valuation)");
		$rating->execute(array(':uid' => $id, ':addtime' => time(), ':sid' => '-1', ':valuation' => '-'.$valuation));
	}
	
	$stmt2 = $_DB[6]->prepare("SELECT COUNT(*) FROM `PD_Personalakte` WHERE `UID` = :id");
	$stmt2->execute(array(':id' => $id));
	echo $stmt2->rowCount()-1;
}

if($handle == "AdminDeleteUser") {
	$id = isset($_POST['id']) ? $_POST['id'] : '-1';
	//PALWAL
	try {
		$stmt = $_DB[0]->prepare("DELETE FROM `PD_Logins` WHERE `ID` = :id LIMIT 1");
		$stmt->execute(array(':id' => $id));
		echo 1;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
}


if($handle == 'getfrakrank') {
	$rank = isset($_POST['rank']) ? $_POST['rank'] : false;
	if($rank == false) {return 1;}
	$stmt = $_DB[0]->prepare("SELECT RankName FROM `Factions_Ranks` WHERE `FactionID` = :fid AND `RankID` = :rid LIMIT 1");
	$stmt->execute(array(':fid' => Fraction, ':rid' => $rank));
	$r = $stmt->rowCount() == 0 ? 'Unbekannt' : $stmt->fetch(PDO::FETCH_OBJ)->RankName;
	echo $r;
}
?>