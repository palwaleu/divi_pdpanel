<?php

class Utils {
	public function getRankName($rang) {
		global $_DB;
		$stmt = $_DB[6]->prepare("SELECT RankName FROM `Factions_Ranks` WHERE `FactionID` = :fid AND `RankID` = :rid LIMIT 1");
		$stmt->execute(array(':fid' => Fraction, ':rid' => $rang));
		return $stmt->rowCount()==0 ? 'Unbekannt' : $stmt->fetch(PDO::FETCH_OBJ)->RankName;
	}
}

/*class Utils {
	private static $_supported_timezones = array(
								"Europe/Berlin" => "Deutschland",
								"Europe/Madrid" => "Spanien",
								"Europe/London" => "Groß-Britanien",	
								"Europe/Paris" => "Frankreich",
								"Europe/Rome" => "Italien",
								"Europe/Budapest" => "Ungarn",
								"Europe/Bucharest" => "Romänien",
								"Europe/Minsk" => "Belarus",
								"Europe/Kiev" => "Ukraine",
								"Europe/Moscow" => "Russland",
								"America/Chicago" => "Illinois - USA",
								"America/Denver" => "Colorado - USA",
								"America/Phoenix" => "Arizona - USA",
								"America/Los_Angeles" => "Kalifornien - USA",
								"America/Anchorage" => "Alaska - USA",
								"Pacific/Honolulu" => "Hawaii - USA",
								"Atlantic/South_Georgia" => "Georgia - USA",
								"Africa/Cairo" => "Ägypten",
								"Africa/Sao_Tome" => "Zentralafrika",
								"Africa/Tripoli" => "Libyen",
								"Africa/Lagos" => "Nigeria",
								"Africa/Douala" => "Kamerun",
								"Asia/Dhaka" => "Bangladesch",
								"Asia/Gaza" => "Palästina",
								"Asia/Dubai" => "Vereinigten Arabischen Emiraten",
								"Asia/Kuwait" => "Kuwait",
								"Asia/Kabul" => "Afghanistans",
								"Indian/Comoro" => "Ostafrika",
								"Indian/Maldives" => "Südasien",
								"Indian/Mahe" => "Seychellen",
								"Antarctica/Troll" => "Norwegische Forschungsstadtion Troll",
								"Antarctica/Macquarie" => "Macquarie Insel",
								"Antarctica/Syowa" => "Antarktis",
								"Australia/Sydney" => "Australien",
								"Pacific/Saipan" => "Saipan Insel",
								"Pacific/Tongatapu" => "Tonga Insel",
								"Asia/Shanghai" => "China",
								"Atlantic/Azores" => "Portugal",
								"Atlantic/Bermuda" => "Bermuda");
	
	public static function getSelectTimezone($select_value) {
		
		$r = '';
		foreach(self::$_supported_timezones as $key => $value) {
			$r .= '<option value="'.$key.'"';
			if($select_value == $key) {
				$r .= ' selected="selected"';
			}
			
			$r .= '>'.$value.'</option>';
		}
		
		return $r;
	}
}*/


?>