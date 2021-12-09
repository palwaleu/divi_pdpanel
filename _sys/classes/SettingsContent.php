<?php

class SettingsContent {
	
	public function SettingsStartpage() {
		//SELECT * FROM `PD_Logins` WHERE `ssid` = ?
		//picture PD_Username
		//INSERT INTO `Email_Accounts` (`id`, `email`, `maxmails`, `standart`, `active`, `ssid`) VALUES (NULL, 'ahmet.aras@police.net', '100', '1', '1', 'i34fw');
		//var_dump(Users::getUser());	
		$r = '<body class="m4-cloak">';
		//$r .= var_dump(Generate::Code(3));
		//$r .= var_dump(Generate::DeviceName('Am'));
		$r .= '<div class="systemsteuerung-container-top">';
		$r .= '<img id="userPicJS" src="'.URL.'/img/'.Users::getUser()->picture.'" class="img-responsive img-circle img-thumbnailpd systemsteuerung_userpic" height="64px;" width="64px;">';
		$r .= '<div class="systemsteuerung_info"><h3>'.Users::getUser()->PD_Username.'</h3>';
		if(Users::getStandartMailAccount()!=NULL) { $r .= Users::getStandartMailAccount()->email; }
		$r .= '</div>';
		$r .= '</div>';
		$r .= '<div class="systemsteuerung-container">';
		$r .= '<div class="grid">';
		$r .= '<div class="row">';
		$r .= '<div class="cell-3"><a href="'.URL.'/_windows/settings_system.php?ssid='.Request::getSession().'">';
		$r .= '<div data-role="tile" data-role-tile="true" class="tile-medium">';
		$r .= '<span class="mif-info icon"></span>';
		$r .= '<span class="branding-bar">System</span>';
		$r .= '<!---<span class="badge-bottom">10</span>--->';
		$r .= '</div>';
		$r .= '</a></div>';
		$r .= '<div class="cell-3"><a href="'.URL.'/_windows/settings_personal.php?ssid='.Request::getSession().'">';
		$r .= '<div data-role="tile" data-role-tile="true" class="tile-medium">';
		$r .= '<span class="mif-pencil icon"></span>';
		$r .= '<span class="branding-bar">Personalisierung</span>';
		$r .= '</div>';
		$r .= '</a></div>';
		$r .= '<div class="cell-3"><a href="'.URL.'/_windows/settings_account.php?ssid='.Request::getSession().'">';
      	$r .= '<div data-role="tile" data-role-tile="true" class="tile-medium">';
		$r .= '<span class="mif-user icon"></span>';
		$r .= '<span class="branding-bar">Konto</span>';
		$r .= '</div>';
		$r .= '</a></div>';
		$r .= '<div class="cell-3"><a href="'.URL.'/_windows/settings_security.php?ssid='.Request::getSession().'">';
		$r .= '<div data-role="tile" data-role-tile="true" class="tile-medium">';
		$r .= '<span class="mif-security icon"></span>';
		$r .= '<span class="branding-bar">Sicherheit</span>';
		$r .= '</div>';
		$r .= '</a></div>';
		$r .= '</div>';
		$r .= '<div class="row">';
		$r .= '<div class="cell-3"><a href="'.URL.'/_windows/settings_time.php?ssid='.Request::getSession().'">';
		$r .= '<div data-role="tile" data-role-tile="true" class="tile-medium">';
		$r .= '<span class="mif-watch icon"></span>';
		$r .= '<span class="branding-bar">Datum & Uhrzeit</span>';
		$r .= '</div>';
        $r .= '</a></div>';
		
		/*$r .= '<div class="cell-3"><a onclick="parent.createWindowSettings()">';
		$r .= '<div data-role="tile" data-role-tile="true" class="tile-medium">';
		$r .= '<span class="mif-watch icon"></span>';
		$r .= '<span class="branding-bar">Datum & Uhrzeit</span>';
		$r .= '</div>';
        $r .= '</a></div>';*/
		
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';
	
		echo $r;
	}
	
	public function SettingsSystem() {
		$r = '<body class="m4-cloak">';
		$r .= '<div class="grid">';
		$r .= '<div class="row">';
		$r .= '<div class="cell-4 systemsteuerung-navi">';
		$r .= '<ul class="sidenav-m3">';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings.php?ssid='.Request::getSession().'"><span class="mif-home icon"></span>Startseite</a></li>';
		$r .= '<li class=""><a class="active" href="'.URL.'/_windows/settings_system.php?ssid='.Request::getSession().'"><span class="mif-info icon"></span>Info</a></li>';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings_notice.php?ssid='.Request::getSession().'"><span class="mif-chat icon"></span>Benachrichtigungen</a></li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '<div class="cell-7 systemsteuerung-content">';
		$r .= '<h3>Info</h3>';
		$r .= '<h5>Der PC wird überwacht und geschützt</h5>';
		$r .= '<h6>Gerätespezifikationen</h6>';
		$r .= '<table class="table">';
		$r .= '<tbody>';
		$r .= '<tr><td>Gerätename</td><td>';
		$r .= Users::getUser()->devicename == NULL ? 'Unbekannt' : Users::getUser()->devicename;
		$r .='</td></tr>';
		$r .= '<tr><td>Prozessor</td><td>Intel(R) Core(TM) i5-4670K CPU @ 3.40GHz   3.40 GHz</td></tr>';
		$r .= '<tr><td>Installierter Ram</td><td>16,0 GB</td></tr>';
		$r .= '<tr><td>Geräte-ID</td><td>5DD10083-E686-44F0-A8F3-669CD6DBB58D</td></tr>';
		$r .= '<tr><td>Produkt-ID</td><td>00331-10000-00001-AA611</td></tr>';
		$r .= '<tr><td>Systemtyp</td><td>64-Bit-Betriebssystem, x64-basierter Prozessor</td></tr>';
		$r .= '</tbody>';
		$r .= '</table>';
		$r .= '<div class="systemsteuerung-mt-30">';
		$r .= '<h6>Windows-Spezifikationen</h6>';
		$r .= '<table class="table">';
		$r .= '<tbody>';
		$r .= '<tr><td>Edition</td><td>Windows 10 Pro</td></tr>';
		$r .= '<tr><td>Version</td><td>21H1</td></tr>';
		$r .= '<tr><td>Installiert am</td><td>';
		$r .= Users::getUser()->addtime == 0 ? 'Unbekannt' : date("H:i / d.m.Y",Users::getUser()->addtime);
		$r .= '</td></tr>';
		$r .= '<tr><td>Betriebsystembuild</td><td>19043.1348</td></tr>';
		$r .= '<tr><td>Leistung</td><td>Windows Feature Experience Pack 120.2212.3920.0</td></tr>';
		$r .= '<tr><td>Domäne</td><td>'.Domaene.'</td></tr>';
		$r .= '</tbody>';
		$r .= '</table>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';
		
		echo $r;
	}
	
	public static function SettingsNotice() {
		/* notice_new_email 	int(1) 			No 	1 	Benachrichtigung bei neuen Mails 		Change Change 	Drop Drop 	

    More More

	14 	notice_rules 	int(1) 			No 	1 	Benachrichtigung bei Regelwerk-Änderungen 		Change Change 	Drop Drop 	

    More More

	15 	notice_news_leader 	int(1) 			No 	1 	Benachrichtigung bei Leader News 		Change Change 	Drop Drop 	

    More More

	16 	notice_wanteds 	int(1) 			No 	1 	Benachrichtigung bei Fahndungsausschreibungen 		Change Change 	Drop Drop 	

    More More

	17 	notice_events 	int(1) 			No 	1 	Benachrichtigungen bei Events und Veranstaltungen 		Change Change 	Drop Drop 	

    More More

	18 	notice_team_update 	int(1) 			No 	1 	Benachrichtigung bei Team Updates 		Change Change 	Drop Drop 	

    More More

	19 	notice_akte 	int(1) 			No 	1 	Benachrichtigung bei eigene Personalakte */
		$r = '<body class="m4-cloak">';
		$r .= '<div class="grid">';
		$r .= '<div class="row">';
		$r .= '<div class="cell-4 systemsteuerung-navi">';
		$r .= '<ul class="sidenav-m3">';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings.php?ssid='.Request::getSession().'"><span class="mif-home icon"></span>Startseite</a></li>';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings_system.php?ssid='.Request::getSession().'"><span class="mif-info icon"></span>Info</a></li>';
		$r .= '<li class=""><a class="active" href="'.URL.'/_windows/settings_notice.php?ssid='.Request::getSession().'"><span class="mif-chat icon"></span>Benachrichtigungen</a></li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '<div class="cell-7 systemsteuerung-content">';
		$r .= '<h3>Benachrichtigungen</h3>';
		$r .= '<small>Sie können genau festlegen, wann Sie Benachrichtigungen erhalten möchten oder nicht.</small><br /><br />';
		$r .= '<ul data-role="treeview">';
		$r .= '<li class="expanded">';
		$r .= '<ul>';
		$r .= '<li><input type="checkbox" data-role="checkbox" onclick="NoticeEdit(\'notice_new_email\', \'bnewEmails\', \''.Request::getSession().'\')" id="bnewEmails" data-caption="Neue E-Mails" ';
		$r .= Users::getUser()->notice_new_email == 1 ? 'checked="checked"' : '';
		$r .= '></li>';
		$r .= '<li><input type="checkbox" data-role="checkbox" onclick="NoticeEdit(\'notice_rules\', \'bnewRules\', \''.Request::getSession().'\')" id="bnewRules" data-caption="Polizei Regelwerk-Änderungen" ';
		$r .= Users::getUser()->notice_rules == 1 ? 'checked="checked"' : '';
		$r .= '></li>';
		$r .= '<li><input type="checkbox" data-role="checkbox" onclick="NoticeEdit(\'notice_news_leader\', \'bnewNewsLeader\', \''.Request::getSession().'\')" id="bnewNewsLeader" data-caption="Neuigkeiten von der Leitung" ';
		$r .= Users::getUser()->notice_news_leader == 1 ? 'checked="checked"' : '';
		$r .= '></li>';
		$r .= '<li><input type="checkbox" data-role="checkbox" onclick="NoticeEdit(\'notice_wanteds\', \'bnewWanteds\', \''.Request::getSession().'\')" id="bnewWanteds" data-caption="Fandungsausschreibungen" ';
		$r .= Users::getUser()->notice_wanteds == 1 ? 'checked="checked"' : '';
		$r .= '></li>';
		$r .= '<li><input type="checkbox" data-role="checkbox" onclick="NoticeEdit(\'notice_events\', \'bnewEvents\', \''.Request::getSession().'\')" id="bnewEvents" data-caption="Veranstaltungen & Events bei der Polizei" ';
		$r .= Users::getUser()->notice_events == 1 ? 'checked="checked"' : '';
		$r .= '></li>';
		$r .= '<li><input type="checkbox" data-role="checkbox" onclick="NoticeEdit(\'notice_team_update\', \'bnewTeamUpdate\', \''.Request::getSession().'\')" id="bnewTeamUpdate" data-caption="Beförderung & Degradation von Kollegen" ';
		$r .= Users::getUser()->notice_team_update == 1 ? 'checked="checked"' : '';
		$r .= '></li>';
		$r .= '<li><input type="checkbox" data-role="checkbox" onclick="NoticeEdit(\'notice_akte\', \'bnewAkte\', \''.Request::getSession().'\')" id="bnewAkte" data-caption="Eintragungen in der eigenen Personalakte" ';
		$r .= Users::getUser()->notice_akte == 1 ? 'checked="checked"' : '';
		$r .= '></li>';
		$r .= '</ul>';
		$r .= '</li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';

		echo $r;
	}
	
	public function SettingsPersonal() {
		$r = '<body class="m4-cloak">';
		$r .= '<div class="grid">';
		$r .= '<div class="row">';
		$r .= '<div class="cell-4 systemsteuerung-navi">';
		$r .= '<ul class="sidenav-m3">';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings.php?ssid='.Request::getSession().'"><span class="mif-home icon"></span>Startseite</a></li>';
		$r .= '<li class=""><a class="active" href="'.URL.'/_windows/settings_personal.php?ssid='.Request::getSession().'"><span class="mif-featured-video icon"></span>Hintergrund</a>';
		$r .= '</li>';
		$r .= '<li class=""><a class="" href="'.URL.'/_windows/settings_taskbar.php?ssid='.Request::getSession().'"><span class="mif-contrast icon"></span>Taskleiste</a></li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '<div class="cell-7 systemsteuerung-content">';
		$r .= '<h3>Hintergrund</h3>';
		$r .= '<small>Hier können Sie Ihr Hintergrund nach Ihren Bedürfnissen ändern.</small><br /><br />';
		$r .= '<b>Aktuelles Hintergrund:</b><br />';
		$r .= '<div id="changedesktopdemoJS"><div class="demo-box" data-role="image-box" data-image="'.URL.'/img/';
		$r .= Users::getUser()->desktop == NULL ? 'lspddesktop.jpg' : 'desktop/'.Users::getUser()->desktop;
		$r .= '" style="height: 200px;width: 200px;"></div></div>';
		$r .= '<div class="systemsteuerung-mt-30">';
		$r .= '<b>Hintergrund ändern:</b><br />';
		$r .= '<div id="grid" data-role="image-grid" data-role-imagegrid="true" class="image-grid">';
		$r .= '<div onclick="ChangeDesktop(\'desktop1\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item image-grid__item-portrait systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop1.jpg" alt="Kuning"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop2\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop2.jpg"></div>';
    	$r .= '<div onclick="ChangeDesktop(\'desktop3\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop3.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop4\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop4.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop5\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop5.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop6\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop6.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop7\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop7.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop8\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop8.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop9\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop9.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop10\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop10.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop11\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop11.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop12\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop12.jpg"></div>';
        $r .= '<div onclick="ChangeDesktop(\'desktop13\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop13.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop14\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop14.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop15\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop15.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop16\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop16.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop17\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop17.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop18\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop18.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop19\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop19.jpg"></div>';
		$r .= '<div onclick="ChangeDesktop(\'desktop20\', \''.Request::getSession().'\', \''.Users::getUser()->desktop.'\')" class="image-grid__item systemsteuerung-backgroundpic" data-role="hint" data-hint-text="Als Hintergund wählen" data-cls-hint="bg-cyan fg-white drop-shadow"><img src="'.URL.'/img/desktop/desktop20.jpg"></div>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';
	
		
		echo $r;
	}
	
	public function SettingsTaskbar() {
		$r = '<body class="m4-cloak">';
		$r .= '<div class="grid">';
		$r .= '<div class="row">';
		$r .= '<div class="cell-4 systemsteuerung-navi">';
		$r .= '<ul class="sidenav-m3">';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings.php?ssid='.Request::getSession().'"><span class="mif-home icon"></span>Startseite</a></li>';
		$r .= '<li class=""><a class="" href="'.URL.'/_windows/settings_personal.php?ssid='.Request::getSession().'"><span class="mif-featured-video icon"></span>Hintergrund</a></li>';
		$r .= '<li class=""><a class="active" href="'.URL.'/_windows/settings_taskbar.php?ssid='.Request::getSession().'"><span class="mif-contrast icon"></span>Taskleiste</a></li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '<div class="cell-7 systemsteuerung-content">';
		$r .= '<h3>Taskleiste</h3>';
		$r .= '<small>Sie können die Hintergrund- und Schriftfarbe der Taskleiste beliebig anpassen.</small><br /><br />';
		$r .= '<div class="systemsteuerung-mt-30">';
		$r .= '<b>Hintergrundfarbe anpassen</b><br />';
		$r .= '<ul data-role="treeview">';
		$r .= '<li class="expanded">';
		$r .= '<ul>';
		$r .= '<li><div data-role="color-selector" data-controller="#color-controller" data-default-swatches="#1E1F20" data-init-color="'.Users::getUser()->taskbar_background.'"></div></li>';
		$r .= '<li><div id="domLoadCTBB"></div></li>';
		$r .= '</ul>';
    	$r .= '</li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '<div class="systemsteuerung-mt-30">';
		$r .= '<b>Schriftfarbe anpassen</b><br />';
		$r .= '<ul data-role="treeview">';
		$r .= '<li class="">';
		$r .= '<ul>';
		$r .= '<li><div data-role="color-selector" data-controller="#color-controller2" data-return-as-string="true" data-return-as-string="true" data-default-swatches="#FFFFFF" data-init-color="'.Users::getUser()->taskbar_color.'"></div></li>';
		$r .= '<li><div id="domLoadCTBC"></div></li>';
        $r .= '</ul>';
		$r .= '</li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '<script>function loadContentTaskbarDom() {
		
		$("#domLoadCTBB").html(\'<input type="text" data-role="input" id="color-controller" val="'.Users::getUser()->taskbar_background.'" onchange="ChangeTaskbarBackground()" class="w-306 mb-4 disabled" disabled>\');
		$("#domLoadCTBC").html(\'<input type="text" data-role="input" id="color-controller2" val="'.Users::getUser()->taskbar_color.'" onchange="ChangeTaskbarColor()" class="w-306 mb-4 disabled" disabled>\');
} setTimeout(loadContentTaskbarDom, 1000);</script>';

		echo $r;
	}
	
	public function SettingsAccount() {
		$r = '<body class="m4-cloak">';
		$r .= '<div class="grid">';
		$r .= '<div class="row">';
		$r .= '<div class="cell-4 systemsteuerung-navi">';
		$r .= '<ul class="sidenav-m3">';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings.php?ssid='.Request::getSession().'"><span class="mif-home icon"></span>Startseite</a></li>';
		$r .= '<li class=""><a class="active" href="'.URL.'/_windows/settings_account.php?ssid='.Request::getSession().'"><span class="mif-lines icon"></span>Ihre Infos</a></li>';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings_email.php?ssid='.Request::getSession().'"><span class="mif-mail icon"></span>E-Mail Konten</a></li>';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings_domaene.php?ssid='.Request::getSession().'"><span class="mif-suitcase icon"></span>Auf Arbeitskonto zugreifen</a></li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '<div class="cell-7 systemsteuerung-content">';
		$r .= '<h3>Ihre Infos</h3>';
		$r .= '<center>';
		$r .= '<img id="userPicJS" src="'.URL.'/img/'.Users::getUser()->picture.'" class="img-responsive img-circle img-thumbnailpd" height="64px;" width="64px;" style="height: 64px; width: 64px; margin-top: 0px; margin-bottom: 0px;"><br />';
		$r .= '<small>'.Users::getUser()->PD_Username.'</small><br />';
		$r .= Users::getUser()->PD_Rang >= 13 ? '' : '<small>Benutzer</small><br />';
		$r .= '</center>';
		if(Users::getUser()->PD_Rang >= 13) {
			$r .= '<div class="systemsteuerung-mt-30"><span style="color:#157c10" class="mif-verified icon"></span> Sie sind Administrator und haben die Berechtigung, alle Konten zu bearbeiten!</div>';
		}
		
		$r .= '<table class="table systemsteuerung-mt-30">';
		$r .= '<tbody>';
		$r .= '<tr><td>Rang</td><td>'.Users::getFrakRang().'</td></tr>';
		$r .= '<tr><td>Beigetreten am</td><td>'.date("d.m.Y", Users::getUser()->addtime).'</td></tr>';
		$r .= '<tr><td>Bewertung</td><td><input data-role="rating" data-stared-color="orange" data-value="';
		$r .= (Users::getUser()->valuation < 0) ? '0' : (Users::getUser()->valuation > 5) ? '5' : Users::getUser()->valuation;
		$r .= '" data-static="true">';
		$r .= Users::haveNewValation() ? '<br /><small style="color:#ea7115;">Ihre Bewertung wird demnächst aktualisiert!</small>' : '';
		$r .= '</td></tr>';
    	$r .= '<tr><td>Interner Funkcode</td><td>'.Users::getUser()->funkcode.'</td></tr>';
		$r .= '<tr><td>Ausbilder Qualifikation</td><td>';
		$r .= (Users::getUser()->trainer == 0 && Users::getUser()->PD_Rang <= 12) ? 'Nein' : 'Ja';
		$r .= '</td></tr>';
		$r .= '</tbody>';
		$r .= '</table>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';

		echo $r;
	}
	
	public function SettingsEmail() {
		global $_DB;
		$r = '<body class="m4-cloak">';
		$r .= '<div class="grid">';
		$r .= '<div class="row">';
		$r .= '<div class="cell-4 systemsteuerung-navi">';
		$r .= '<ul class="sidenav-m3">';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings.php?ssid='.Request::getSession().'"><span class="mif-home icon"></span>Startseite</a></li>';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings_account.php?ssid='.Request::getSession().'"><span class="mif-lines icon"></span>Ihre Infos</a></li>';
		$r .= '<li class=""><a class="active" href="'.URL.'/_windows/settings_email.php?ssid='.Request::getSession().'"><span class="mif-mail icon"></span>E-Mail Konten</a></li>';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings_domaene.php?ssid='.Request::getSession().'"><span class="mif-suitcase icon"></span>Auf Arbeitskonto zugreifen</a></li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '<div class="cell-7 systemsteuerung-content">';
		$r .= '<h3>E-Mail Konten</h3>';
		$r .= '<center>';
		$r .= '<img id="userPicJS" src="'.URL.'/img/'.Users::getUser()->picture.'" class="img-responsive img-circle img-thumbnailpd" height="64px;" width="64px;" style="height: 64px; width: 64px; margin-top: 0px; margin-bottom: 0px;"><br />';
		$r .= '<small>'.Users::getUser()->PD_Username.'</small><br />';
		$r .= '</center>';
		
		$stmt = $_DB[3]->prepare("SELECT * FROM `Email_Accounts` WHERE `ssid` = :ssid AND `active` = 1 ORDER BY `standart` DESC");
		$stmt->execute(array(':ssid' => Request::getSession()));
		
		if($stmt->rowCount() == 0) {
			$r .= '<div class="card">';
			$r .= '<div class="card-content p-4 bg-red fg-white">';
			$r .= 'Sie haben keine Email-Accounts!';
			$r .= '</div>';
			$r .= '</div>';
		} else {
			$f = $stmt->fetchAll();
			for($i = 0; $i < $stmt->rowCount(); $i++) {
				$r .= '<div class="icon-box border bd-default systemsteuerung-mt-30">';
				$r .= '<div class="icon bg-cyan fg-white"><span class="mif-';
				$r .= $f[$i]["standart"] == 1 ? 'contacts-mail' : 'mail';
				$r .= '"></span></div>';
				$r .= '<div class="content p-4">';
				$r .= '<div class="text-upper">E-Mail Adresse</div>';
				$r .= '<div class="text-bold text-lead">'.$f[$i]["email"].'</div>';
				//$r .= '<div><a href="javascript:void(0)" onclick="createWindowSettings()">Mail Programm öffnen</a></div>';
				$r .= '</div>';
				$r .= '</div>';
			}
		}
#
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';

		echo $r;
	}
	
	public function SettingsDomaene() {
		$r = '<body class="m4-cloak">';
		$r .= '<div class="grid">';
		$r .= '<div class="row">';
		$r .= '<div class="cell-4 systemsteuerung-navi">';
		$r .= '<ul class="sidenav-m3">';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings.php?ssid='.Request::getSession().'"><span class="mif-home icon"></span>Startseite</a></li>';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings_account.php?ssid='.Request::getSession().'"><span class="mif-lines icon"></span>Ihre Infos</a></li>';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings_email.php?ssid='.Request::getSession().'"><span class="mif-mail icon"></span>E-Mail Konten</a></li>';
		$r .= '<li class=""><a class="active" href="'.URL.'/_windows/settings_domaene.php?ssid='.Request::getSession().'"><span class="mif-suitcase icon"></span>Auf Arbeitskonto zugreifen</a></li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '<div class="cell-7 systemsteuerung-content">';
		$r .= '<h3>Auf Arbeitskonto zugreifen</h3>';
		$r .= '<small>Verbinden Sie sich mit einen Arbeitskonto</small>';
		$r .= '<div class="icon-box border bd-default systemsteuerung-mt-30">';
    	$r .= '<div class="icon bg-red fg-white"><span class="mif-server"></span></div>';
		$r .= '<div class="content p-4">';
		$r .= '<div class="text-upper">Zugriff auf die Domäne</div>';
		$r .= '<div class="text-bold text-lead">'.Domaene.'</div>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '<span class="mif-checkmark"></span> Sie sind mit dem Polizei-Netzwerk verbunden!';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';

		echo $r;
	}
	
	public function SettingsSecurity() {
		$r = '<body class="m4-cloak">';
		$r .= '<div class="grid">';
		$r .= '<div class="row">';
		$r .= '<div class="cell-4 systemsteuerung-navi">';
		$r .= '<ul class="sidenav-m3">';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings.php?ssid='.Request::getSession().'"><span class="mif-home icon"></span>Startseite</a></li>';
		$r .= '<li class=""><a class="active" href="'.URL.'/_windows/settings_security.php?ssid='.Request::getSession().'"><span class="mif-lock icon"></span>Passwort</a></li>';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings_lastlogins.php?ssid='.Request::getSession().'"><span class="mif-enter icon"></span>Letzte Logins</a></li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '<div class="cell-7 systemsteuerung-content">';
		$r .= '<h3>Ihr Passwort ändern</h3>';
		$r .= '<small>Sie können Ihr Passwort ändern</small>';
		$r .= '<div class="form-group">';
		$r .= '<input type="password" id="newpwJS"data-role="input" data-prepend="Neues Passwort">';
		$r .= '</div>';
		$r .= '<div class="form-group">';
		$r .= '<input type="password" id="newpw2JS" data-role="input" data-prepend="Wiederholen">';
		$r .= '</div>';
    	$r .= '<div class="form-group">';
		$r .= '<button onclick="setPassword(\''.Request::getSession().'\')" class="button">Speichern</button>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';

		echo $r;
	}
	
	public function SettingsLastlogin() {
		global $_DB;
		$r = '<body class="m4-cloak">';
		$r .= '<div class="grid">';
		$r .= '<div class="row">';
		$r .= '<div class="cell-4 systemsteuerung-navi">';
		$r .= '<ul class="sidenav-m3">';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings.php?ssid='.Request::getSession().'"><span class="mif-home icon"></span>Startseite</a></li>';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings_security.php?ssid='.Request::getSession().'"><span class="mif-lock icon"></span>Passwort</a></li>';
		$r .= '<li class=""><a class="active" href="'.URL.'/_windows/settings_lastlogins.php?ssid='.Request::getSession().'"><span class="mif-enter icon"></span>Letzte Logins</a></li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '<div class="cell-7 systemsteuerung-content">';
		$r .= '<h3>Letzte Logins</h3>';
		
		$stmt = $_DB[4]->prepare("SELECT * FROM `PD_Lastlogins` WHERE `ssid` = :ssid ORDER BY `lastlogintime` ASC LIMIT 5");
		$stmt->execute(array(':ssid' => Request::getSession()));
		
		if($stmt->rowCount() == 0) {
			$r .= '<div class="card bg-red fg-white">';
			$r .= '<div class="card-content p-4">';
			$r .= 'Es sind keine Daten vorhanden!';
			$r .= '</div>';
			$r .= '</div>';
		} else {
			$f = $stmt->fetchAll(PDO::FETCH_ASSOC);
			for($i = 0; $i < $stmt->rowCount(); $i++) {
				$r .= '<div class="card">';
				$r .= '<div class="card-content p-2">';
				$r .= 'Eingeloggt am '.date("d.m.Y", $f[$i]['lastlogintime']).' um '.date("H:i", $f[$i]['lastlogintime']).' Uhr';
				$r .= '</div>';
				$r .= '</div>';
			}
		}
		
		
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';
    
		echo $r;
	}
	
	public function SettingsTime() {
		$r = '<body class="m4-cloak">';
		$r .= '<div class="grid">';
		$r .= '<div class="row">';
		$r .= '<div class="cell-4 systemsteuerung-navi">';
		$r .= '<ul class="sidenav-m3">';
		$r .= '<li class=""><a href="'.URL.'/_windows/settings.php?ssid='.Request::getSession().'"><span class="mif-home icon"></span>Startseite</a></li>';
		$r .= '<li class=""><a class="active" href="'.URL.'/_windows/settings_time.php?ssid='.Request::getSession().'"><span class="mif-watch icon"></span>Datum/Uhrzeit einstellen</a></li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '<div class="cell-7 systemsteuerung-content">';
		$r .= '<h3>Datum & Uhrzeit einstellen</h3>';
		$r .= '<div class="systemsteuerung-mt-30">';
		$r .= '<small>Sie können hier Ihre individuelle Datum & Uhrzeit - Einstellungen vornehmen.</small>';
		$r .= '</div>';
		$r .= '<div class="systemsteuerung-mt-30 systemsteuerung-mb-30">';
		$r .= '<ul data-role="treeview">';
		$r .= '<li class="expanded">';
		$r .= '<ul>';
		$r .= '<li><input type="checkbox" data-role="switch" onclick="t_timeactive()" data-material="true" id="tTimeactive" data-caption="Uhrzeit anzeigen"';
		$r .= Users::getUser()->showtime == "true" ? ' checked="checked"' : '';
		$r .= '></li>';
		$r .= '<li><input type="checkbox" data-role="switch" onclick="t_dateactive()" data-material="true" id="tDateactive" data-caption="Datum anzeigen"';
		$r .= Users::getUser()->showdate == "true" ? ' checked="checked"' : '';
		$r .= '></li>';
		$r .= '<li><label for="tDateformat">Datumformat</label><select onchange="t_dateformat()" id="tDateformat" data-role="select"><option value="europe">Europa</option><option value="american">Amerika</option></select></li>';
		$r .= '<li><label for="tTimezone">Zeitzone</label><select data-selectinfo="'.Users::getUser()->timezone.'" onchange="t_timezone()" id="tTimezone" data-role="select"><option value="Europe/Berlin">Deutschland</option>
		
		<option value="Europe/Madrid">Spanien</option>
		
		<option value="Europe/London">Groß-Britanien</option>
		
		<option value="Europe/Paris">Frankreich</option>
		
		<option value="Europe/Rome">Italien</option>
		
		<option value="Europe/Budapest">Ungarn</option>
		
		<option value="Europe/Bucharest">Romänien</option>
		
		<option value="Europe/Minsk">Belarus</option>
		
		<option value="Europe/Kiev">Ukraine</option>
		
		<option value="Europe/Moscow">Russland</option>
		
		<option value="America/Chicago">Illinois - USA</option>
		
		<option value="America/Denver">Colorado - USA</option>
		
		<option value="America/Phoenix">Arizona - USA</option>
		
		<option value="America/Los_Angeles">Kalifornien - USA</option>
		
		<option value="America/Anchorage">Alaska - USA</option>
		
		<option value="Pacific/Honolulu">Hawaii - USA</option>
		
		<option value="Atlantic/South_Georgia">Georgia - USA</option>
		
		<option value="Africa/Cairo">Ägypten</option>
		
		<option value="Africa/Sao_Tome">Zentralafrika</option>
		
		<option value="Africa/Tripoli">Libyen</option>
		
		<option value="Africa/Lagos">Nigeria</option>
		
		<option value="Africa/Douala">Kamerun</option>
		
		<option value="Asia/Dhaka">Bangladesch</option>
		
		<option value="Asia/Gaza">Palästina</option>
		
		<option value="Asia/Dubai">Vereinigten Arabischen Emiraten</option>
		
		<option value="Asia/Kuwait">Kuwait</option>
		
		<option value="Asia/Kabul">Afghanistans</option>
		
		<option value="Indian/Comoro">Ostafrika</option>
		
		<option value="Indian/Maldives">Südasien</option>
		
		<option value="Indian/Mahe">Seychellen</option>
		
		<option value="Antarctica/Troll">Norwegische Forschungsstadtion Troll</option>
		
		<option value="Antarctica/Macquarie">Macquarie Insel</option>
		
		<option value="Antarctica/Syowa">Antarktis</option>
		
		<option value="Australia/Sydney">Australien</option>
		
		<option value="Pacific/Saipan">Saipan Insel</option>
		
		<option value="Pacific/Tongatapu">Tonga Insel</option>
		
		<option value="Asia/Shanghai">China</option>
		
		<option value="Atlantic/Azores">Portugal</option>
		
		<option value="Atlantic/Bermuda">Bermuda</option></select></li>';
		$r .= '<li><label for="tTimeformat">Zeitformat</label><select onchange="t_timeformat()" data-selectinfo="'.Users::getUser()->timeformat.'"  id="tTimeformat" data-role="select"><option value="24">24</option><option value="12">12</option></select></li>';
		$r .= '<li><input type="checkbox" data-role="switch" onclick="t_pmamactive()" data-material="true" id="tPmamactive" data-caption="PM/AM bei Uhrzeit anzeigen"';
		$r .= Users::getUser()->showsuffix == "true" ? ' checked="checked"' : '';
		$r .= '></li>';
		$r .= '<li><input type="checkbox" data-role="switch" onclick="t_secondactive()" data-material="true" id="tSecactive" data-caption="Sekunden anzeigen"';
		$r .= Users::getUser()->showtick == "true" ? ' checked="checked"' : '';
		$r .= '></li>';
		$r .= '<li><label for="tDatedivider">Datum-Teiler</label><select data-selectinfo="'.Users::getUser()->datedivider.'"  onchange="t_datedivider()" id="tDatedivider" data-role="select"><option value=".">.</option><option value="/">/</option><option value=":">:</option><option value="|">|</option><option value="-">-</option><option value="_">_</option><option value=">">></option><option value="<"><</option><option value=",">,</option><option value=";">;</option></select></li>';
		$r .= '<li><label for="tTimedivider">Uhrzeit-Teiler</label><select onchange="t_timedivider()" data-selectinfo="'.Users::getUser()->timedivider.'"  id="tTimedivider" data-role="select"><option value=".">.</option><option value="/">/</option><option value=":">:</option><option value="|">|</option><option value="-">-</option><option value="_">_</option><option value=">">></option><option value="<"><</option><option value=",">,</option><option value=";">;</option></select></li>';
		$r .= '<li><label for="tDivider">Datum/Uhrzeit Darstellung</label><select data-selectinfo="'.Users::getUser()->divider.'"  onchange="t_divider()" id="tDivider" data-role="select"><option value="<br>">Neue Zeile</option><option value=" - ">-</option><option value=" / ">/</option><option value=" = ">=</option> <option value=" > ">></option><option value=" < "><</option><option value=" >> ">>></option><option value=" << "><<</option><option value=" * ">*</option><option value=" : ">:</option><option value=" ; ">;</option><option value=" | ">|</option><option value=" # ">#</option></select></li>';
		$r .= '</ul>';
		$r .= '</li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '';
		$r .= '';
		$r .= '';
		$r .= '';				

		echo $r;
	}
	
}

?>