<?php

class PAkteContent {
	
	public function page($uid) {
		global $_DB;

		$r = '<div class="pakte-top">';
		$r .= '<center><div id="addAkteJS"><button class="button success" onclick="addAkte()"><span style="margin-right: 5px;"class="mif-plus icon"></span>  Eintrag hinzufügen</button></div></center>';
		$r .= '<div id="addPakte" class="addaktehtml">';
		$r .= '<p class="text-center">';
		$r .= '<textarea data-role="textarea" id="aktenText" placeholder="Eintrag schreiben..."></textarea><br>';
		$r .= '<a href="javascript:void(0)" class="addAkteRatingLink" onclick="addAkteRating()">Bewertung anfügen</a>';
		$r .= '<div class="addAkteRating"><input id="aktenRating" data-role="rating" data-stared-color="orange" /></div>';
		$r .= '<button class="button success" onclick="addAktenPost('.$uid.', \''.Users::getUser()->PD_Username.'\')">Hinzufügen</button>';
		$r .= '</p>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '<div class="pcontainer">';
		$stmt = $_DB[7]->prepare("SELECT * FROM `PD_Personalakte` WHERE `UID` = :uid ORDER BY `id` DESC");
		$stmt->execute(array(':uid' => $uid));
		if($stmt->rowCount() == 0) {
			$r .= '<div class="noAkteFound bg-red padding10 text-shadow fg-white">Es sind keine Akteneinträge vorhanden!</div>';
			$r .= '<div class="timeline">';
			$r .= '</div>';
		} else {
			$r .= '<div class="noAkteFound bg-red padding10 text-shadow fg-white" style ="display:none;">Es sind keine Akteneinträge vorhanden!</div>';
			$f = $stmt->fetchAll(PDO::FETCH_OBJ);
			$r .= '<div class="timeline">';
			for($i = 0; $i < $stmt->rowCount(); $i++) {
				$r .= '<div id="pakte_'.$f[$i]->id.'" class="timeline-container primary">';
				$r .= '<div class="timeline-icon">';
				$r .= '<i class="mif-file-text"></i>';
				$r .= '</div>';
				$r .= '<div class="timeline-body">';
				if($f[$i]->valuation > 0 && $f[$i]->valuation < 6) {
					$r .= '<span class="badge"><input data-role="rating" data-stared-color="orange" data-value="'.$f[$i]->valuation.'" data-static="true"></span>';
				}
				
				$r .= $f[$i]->text;
				$r .= '<p class="timeline-subtitle text-shadow">'.date("d.m.Y", $f[$i]->addtime).' um '.date("H:i", $f[$i]->addtime).' Uhr von '.$f[$i]->admin.' | <a href="javascript:void(0)" onclick="pakte_delete('.$f[$i]->id.', '.$f[$i]->UID.')" class="timeline-link"><span class="mif-bin"></span> Eintrag löschen</a></p>';
				$r .= '</div>';
				$r .= '</div>';
			}
			                                                             
			$r .= '</div>';
		}
		
		$r .= '</div>';

		echo $r;
	}
	
}

?>