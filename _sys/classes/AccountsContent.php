<?php

class AccountsContent {
	public function page() {
		global $_DB, $_UTILS;
		$self_pdrang = Users::getUser()->PD_Rang;
		$self_id = Users::getUser()->ID;
      	$r = '';

		$stmt = $_DB[5]->prepare("SELECT * FROM `PD_Logins` ORDER BY `ID` ASC");
		$stmt->execute();
		if($stmt->rowCount()==0 || $self_pdrang < 13) {
			$r .= '<div class="pos-relative">';
			$r .= '<div class="bg-red fg-white">';
			$r .= '<p class="p-10 text-center">';
			$r .= 'Es sind keine Accounts vorhanden!';
			$r .= '</p>';
			$r .= '</div>';
			$r .= '</div>';
		} else {
			$f = $stmt->fetchAll(PDO::FETCH_OBJ);
			$r .= '<table class="table table-border cell-border">';
			$r .= '<tbody>';
			for($i = 0; $i < $stmt->rowCount(); $i++) {
				$r .= '<tr>';
				$r .= '<td>'.($i+1).'</td>';
				$r .= '<td>';
				if($f[$i]->status==0) {
					$r .= '<i style="color:#f28118;" class="mif-wifi-off"></i> ';
				} elseif($f[$i]->status==2) {
					$r .= '<i style="color:#ff0000;" class="mif-lock"></i> ';
				}
				$r .= $f[$i]->PD_Username.'<br><small id="rankname_'.$f[$i]->ID.'">'.$_UTILS->getRankName($f[$i]->PD_Rang).'</small></td>';
				$r .= '<td><input data-role="rating" data-stared-color="orange" data-value="'.$f[$i]->valuation.'" data-static="true"></td>';
				$r .= '<td><span class="dividropdown">';
				$r .= '<button class="diviAccOption">Optionen</button>';
				$r .= '<label>';
				$r .= '<input class="dividown" type="checkbox">';
				$r .= '<ul>';
				if($self_pdrang >= 13 && ($f[$i]->PD_Rang < 14 && $self_id != $f[$i]->ID) || ($self_pdrang == 14 && $self_id != $f[$i]->ID && $f[$i]->PD_Rang < 14)) {
					$r .= '<li onclick="AdminRangUp('.$f[$i]->PD_Rang.', '.$f[$i]->ID.', \''.$f[$i]->PD_Username.'\')"><i class="mif-arrow-up"></i> Befördern</li>';
				}
				if($self_pdrang >= 13 && $f[$i]->PD_Rang > 0) {
					$r .= '<li onclick="AdminRangDown('.$f[$i]->PD_Rang.', '.$f[$i]->ID.', \''.$f[$i]->PD_Username.'\')"><i class="mif-arrow-down"></i> Degradieren</li>';
				}
				
				$r .= '<li onclick="AdminSetPassword('.$f[$i]->ID.', \''.$f[$i]->PD_Username.'\')"><i class="mif-security"></i> Passwort ändern</li>';
				$r .= '<li onclick="parent.createPAkte('.$f[$i]->ID.', \''.$f[$i]->PD_Username.'\')"><i class="mif-file-text"></i> Personalakte</li>';
				$r .= '<li onclick="AdminSetLohn('.$f[$i]->ID.', \''.$f[$i]->PD_Username.'\')"><i id="lohn_'.$f[$i]->ID.'" class="mif-money';
				if($f[$i]->PD_Lohn == '-1') {
					$r .= ' ani-shuttle';
				}
				$r .= '"></i> Gehalt bearbeiten</li>';
				if($f[$i]->status==1 && $self_pdrang >= 13 && $self_id != $f[$i]->ID) {
					$r .= '<li onclick="AdminLockUser('.$f[$i]->ID.', \''.$f[$i]->PD_Username.'\')"><i class="mif-lock"></i> Sperren</li>';
					$r .= '<li onclick="AdminDeactivateUser('.$f[$i]->ID.', \''.$f[$i]->PD_Username.'\')"><i class="mif-wifi-off"></i> Deaktivieren</li>';
				} elseif (($f[$i]->status==0 || $f[$i]->status==2) && $self_id != $f[$i]->ID) {
					$r .= '<li onclick="AdminUnlockUser('.$f[$i]->ID.', \''.$f[$i]->PD_Username.'\')"><i class="mif-unlock"></i> Freigeben</li>';
				}
				
				if($self_pdrang >= 13 && $self_id != $f[$i]->ID && $f[$i]->PD_Rang < 14) {
					$r .= '<li class="divider"></li>';
					$r .= '<li onclick="AdminDeleteUser('.$f[$i]->ID.', \''.$f[$i]->PD_Username.'\')" class="fg-red"><i class="mif-bin"></i> Account löschen</li>';
				}
				
				$r .= '</ul>';
				$r .= '</label>';
				$r .= '</span></td>';
				$r .= '</tr> ';
			}
			$r .= '</tbody>';
			$r .= '</table>';
		}
		
		

		echo $r;      
                
	}
}

?>