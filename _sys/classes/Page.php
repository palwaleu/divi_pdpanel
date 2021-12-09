<?php


class Page {
	
	public function _header() {
		$r = '<!DOCTYPE html>';
		$r .= '<html lang="en">';
		$r .= '<head>';
		$r .= '<meta charset="UTF-8">';
		$r .= '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">';
		$r .= '<meta name="author" content="Patrick Walters">';
		$r .= '<link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">';
		$r .= '<link rel="icon" href="../../favicon.ico" type="image/x-icon">';
		$r .= '<link href="'.URL.'/css/metro-all.css?ver=@@b-version" rel="stylesheet">';
		$r .= '<link href="https://unpkg.com/microtip/microtip.css" rel="stylesheet">';
		$r .= '<link href="'.URL.'/css/diviicon.css" rel="stylesheet">';
		$r .= '<link href="'.URL.'/css/main.css" rel="stylesheet">';
		$r .= '<link href="'.URL.'/css/desktop.css" rel="stylesheet"><script src="https://code.jquery.com/jquery-2.2.4.js"></script>';
		
		//$r .= '<title>Polizeicomputer</title>';
		$r .= '</head>';

		echo $r;
	}
	
	public function _footer() {
		$r = '';
		$r .= '<script src="'.URL.'/js/metro.js"></script>';
		$r .= '<script src="'.URL.'/js/main.js"></script>';
		$r .= '<script src="'.URL.'/js/desktop.js"></script>';
		$r .= '</body>';
		$r .= '</html>';
		
		echo $r;
	}
	
	public function loginContent() {
		$r = '<body class="h-vh-100 bg-brandColor2 loginarea">';
		$r .= '<form class="login-form mx-auto"';
		$r .= ' data-role="validator"';
		$r .= ' action="javascript:"';
		$r .= ' data-clear-invalid="2000"';
		$r .= ' data-on-error-form="invalidForm"';
		$r .= ' data-on-validate-form="validateForm">';
		$r .= '<center><img id="userPicJS" src="img/default.svg" class="img-responsive img-circle img-thumbnailpd" height="64px;" width="64px;"><br /></center>';
		
		//Benutzername
		$r .= '<center><div class="form-group logingroup usernameJS">';
		$r .= '<input type="text" autocomplete="false" id="usernamefieldJS" data-role="input" placeholder="Dienstnummer/Benutzername" onfocusout="checkUseraccount()" data-validate="required">';
		$r .= '</div></center>';
		
		//Passwort
		$r .= '<center><div class="form-group logingroup passwordJS">';
		$r .= '<input type="password" autocomplete="false" id="passwordfieldJS" data-role="input" placeholder="Passwort" data-validate="required">';
		$r .= '</div></center>';
		
		//Passwort vergessen - Content
		$r .= '<div class="form-group logingroup passwordlostcontent">';
		$r .= '<p></p>';
		$r .= '</div>';
		
		//Domäne
		$r .= '<div class="form-group logingroup domaeneJS">';
		$r .= '<span class="logindomaene"><b>Domäne:</b> '.Domaene.'</span></a>';
		$r .= '</div>';
		
		//Passwort vergessen - link
		$r .= '<center><div class="form-group logingroup passwordlostJS">';
		$r .= '<a class="loginlink" href="javascript:passwordLost();">Passwort vergessen?</a>';
		$r .= '</div></center>';

		//Einloggen - Button
		$r .= '<center><div class="form-group logingroup loginJS">';
		$r .= '<button class="button secondary">Einloggen</button>';
		$r .= '</div></center>';
		
		//Passwort vergessen - Content Button
		$r .= '<center><div class="form-group logingroup passwordLosingJS">';
		$r .= '<button onclick="javascript:loginReturn();return false;" class="button secondary">Zurück</button>';
		$r .= '</div></center>';
		
		$r .= '</center>';
		$r .= '</form>';
		
		//Computer ausschalteb
		$r .= '<div class="power"><a href="javascript:void(0)" class="mif-settings-power"></a></div>';
		
		echo $r;
	}
	
	public static function metroContent() {
		$r = '<div data-role="charms" data-position="center" id="metrojs" class="p-4">';
		$r .= '<div class="bg-dark fg-white h-vh-100" data-role="charms" data-position="center" id="metro">';
		$r .= '<div class="container-fluid start-screen h-100">';
		$r .= '<h1 class="start-screen-title"><span aria-label="Zum Desktop zurück" data-microtip-position="right" role="tooltip"><span onclick="openMetro()" class="mif-arrow-left backtodesktop"></span></span> Start</h1>';
		$r .= '<div style="margin-top:50px;" class="tiles-area clear">';
		$r .= '<div class="tiles-grid tiles-group size-2 fg-white" data-group-title="General">';
		
		
		$r .= '<div data-role="tile" class="bg-emerald fg-white">';
		$r .= '<span class="mif-calendar icon"></span>';
		$r .= '<span class="branding-bar">Events</span>'; //Veranstaltungen
		$r .= '<span class="badge-bottom">10</span>';
		$r .= '</div>';
		$r .= '<div data-role="tile" class="bg-cyan fg-white">';
		$r .= '<span class="mif-envelop icon"></span>';
		$r .= '<span class="branding-bar">Email</span>'; //Email Client
		$r .= '<span class="badge-bottom">10</span>';
		$r .= '</div>';
		$r .= '<div data-role="tile" class="bg-orange fg-white" data-size="wide">';
		$r .= '<span class="mif-chrome icon"></span>';
		$r .= '<span class="branding-bar">Chrome</span>'; //Chrome Browser
		$r .= '</div>';
		$r .= '<div data-role="tile" data-size="small" class="bg-red fg-white">';
		$r .= '<span class="mif-bell icon"></span>'; //Alle Benachrichtigungen
		$r .= '</div>';
		
		$r .= '<div onclick="createWindowSettings()" aria-label="Systemsteuerung" data-microtip-position="top" role="tooltip" data-role="tile" data-size="small" class="bg-teal fg-white col-1 row-6"><span data-role="hint"
        data-hint-position="top"
        data-hint-text="This is a hinted button">';
		$r .= '<span class="mif-windows icon"></span>';
		$r .= '</span></div>';
		
	
		$r .= '<div data-role="tile" data-size="small" class="bg-cobalt fg-white">';
		$r .= '<span class="mif-table icon"></span>'; // Regelwerk
		$r .= '</div>';
		
    	$r .= '</div>';
		$r .= '<div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Bilder">';
		$r .= '<div class="bg-violet" data-role="tile" data-cover="img/user.svg">';
		$r .= '<span class="branding-bar">Ahent Aras</span>';
		$r .= '</div>';
		$r .= '<div data-role="tile" data-effect="animate-slide-left" data-effect-duration="10" data-effect="image-set" class="bg-violet">';
		$r .= '<img src="img/desktop/desktop1.jpg">';
		$r .= '<img src="img/desktop/desktop2.jpg">'; //Gallery - Alle Bilder anzeigen
        $r .= '<span class="branding-bar">Gallery</span>';
		$r .= '</div>';
		$r .= '<div data-role="tile" data-size="wide" data-effect="image-set">';
		$r .= '<img src="img/desktop/desktop1.jpg">';
		$r .= '<img src="img/desktop/desktop2.jpg">';
		$r .= '<img src="img/desktop/desktop3.jpg">';
		$r .= '<img src="img/desktop/desktop4.jpg">';
		$r .= '<img src="img/desktop/desktop5.jpg">';
		$r .= '<img src="img/desktop/desktop6.jpg">';
		$r .= '<img src="img/desktop/desktop7.jpg">';
		$r .= '<img src="img/desktop/desktop8.jpg">';
		$r .= '<img src="img/desktop/desktop9.jpg">';
		$r .= '<img src="img/desktop/desktop10.jpg">';
		$r .= '<img src="img/desktop/desktop11.jpg">';
		$r .= '<img src="img/desktop/desktop12.jpg">';
		$r .= '<img src="img/desktop/desktop13.jpg">';
		$r .= '<img src="img/desktop/desktop14.jpg">';
		$r .= '<img src="img/desktop/desktop15.jpg">';
		$r .= '<img src="img/desktop/desktop16.jpg">';
		$r .= '<img src="img/desktop/desktop17.jpg">';
		$r .= '<img src="img/desktop/desktop18.jpg">';
		$r .= '<img src="img/desktop/desktop19.jpg">';
		$r .= '<img src="img/desktop/desktop20.jpg">';
		$r .= '</div>';
		$r .= '</div>';
		
        $r .= '<div class="tiles-grid tiles-group size-1 fg-white" data-group-title="Polizei">';
		$r .= '<div data-role="tile" data-size="small" class="bg-crimson">';
		$r .= '<img src="img/policedatabase.png" class="icon">'; //EMA Abfrage
		$r .= '</div>';
		$r .= '<div data-role="tile" data-size="small" class="bg-brown">';
		$r .= '<img src="img/carsearch.png" class="icon">'; //Halter Abfrage
		$r .= '</div>';
		$r .= '<div data-role="tile" data-size="small" class="bg-green">';
		$r .= '<img src="img/warranty.png" class="icon">'; //Fandungsliste
        $r .= '</div>';
		$r .= '<div data-role="tile" data-size="small" class="bg-olive">';
		$r .= '<img src="img/prison.png" class="icon">'; //Alle im Prison
		$r .= '</div>';
		$r .= '<div data-role="tile" data-size="small" class="bg-lightBlue">';
		$r .= '<img src="img/police.png" class="icon">'; //Abzeigen (Erstatten)
		$r .= '</div>';
		$r .= '<div data-role="tile" data-size="small" class="bg-amber">';
		$r .= '<img src="img/garage.png" class="icon">'; //Beschlagnahmte Fahrzeuge
		$r .= '</div>';
		$r .= '<div data-role="tile" data-size="small" class="bg-taupe">';
		$r .= '<img src="img/speedcamera.png" class="icon">'; //Alle Blitzer (Blitzerverzeichnis)
		$r .= '</div>';
		$r .= '<div data-role="tile" data-size="small" class="bg-darkRed">';
		$r .= '<img src="img/evidence.png" class="icon">'; //Asservatenkammer
		$r .= '</div>';
		$r .= '<div data-role="tile" data-size="small" class="bg-mauve">';
		$r .= '<img src="img/stgb.png" class="icon">'; //Das Strafgesetzbuch 
		$r .= '</div>';
		$r .= '<div data-role="tile" data-size="small" class="bg-indigo">';
		$r .= '<img src="img/stvo.png" class="icon">'; //Die Straßenverkehrsordnung
		$r .= '</div>';
		$r .= '</div>';
		
		$r .= '<div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Administration">'; 
		$r .= '<div onclick="createAllAccounts()" data-role="tile" class="bg-magenta">';
		$r .= '<img src="img/accounts.png" class="icon">';
		$r .= '<span class="branding-bar">Alle Accounts</span>';
		$r .= '</div>';
		$r .= '<div data-role="tile" class="bg-grayBlue">';
		$r .= '<img src="img/policenews.png" class="icon">';
		$r .= '<span class="branding-bar">News</span>';
		$r .= '</div>';
		$r .= '</div>';
		
		
		$r .= '</div>';  
        $r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';

		echo $r;
	}
	
	public static function charmContent() {
		$r = '<div data-role="charms" data-position="right" id="charm" class="p-4">';
		$r .= '<div class="h-100 d-flex flex-column">';
		$r .= '<div class="charm-top">';
		$r .= '<div class="text-center m-4">';
		$r .= '<span>Google Chrome</span>';
		$r .= '</div>';
		$r .= '<div class="charm-notify">';
		$r .= '<img class="icon" src="../../images/me.jpg">';
		$r .= '<div class="title">About Author</div>';
		$r .= '<div class="content">The hornpipe fears with endurance, vandalize the galley until it waves.</div>';
		$r .= '<div class="secondary">14:17 &bull; www.facebook.com</div>';
		$r .= '</div>';
		$r .= '<div class="charm-notify">';
		$r .= '<img class="icon" src="../../images/me.jpg">';
		$r .= '<div class="title">About Author</div>';
		$r .= '<div class="content">The hornpipe fears with endurance, vandalize the galley until it waves.</div>';
		$r .= '<div class="secondary">14:17 &bull; www.facebook.com</div>';
		$r .= '</div>';
		$r .= '<div class="charm-notify">';
		$r .= '<img class="icon" src="../../images/me.jpg">';
		$r .= '<div class="title">About Author</div>';
		$r .= '<div class="content">The hornpipe fears with endurance, vandalize the galley until it waves.</div>';
		$r .= '<div class="secondary">14:17 &bull; www.facebook.com</div>';
		$r .= '</div>';
		$r .= '<div class="text-center m-4">';
		$r .= '<span>Information</span>';
		$r .= '</div>';
		$r .= '<div class="charm-notify">';
		$r .= '<span class="icon mif-info"></span>';
		$r .= '<div class="title">You have a news</div>';
		$r .= '<div class="content">The hornpipe fears with endurance, vandalize the galley until it waves.</div>';
		$r .= '</div>';
		$r .= '<div class="clear mt-4 reduce-1">';
		$r .= '<span class="place-left c-pointer">Collapse</span>';
		$r .= '<span class="place-right c-pointer">Clear notifies</span>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '<div class="charm-bottom mt-auto">';
		$r .= '<div class="d-flex">';
		$r .= '<div class="charm-tile">';
		$r .= '<span class="icon mif-tablet-landscape"></span>';
		$r .= '<span class="caption">Tablet mode</span>';
		$r .= '</div>';
		$r .= '<div class="charm-tile">';
		$r .= '<span class="icon mif-wifi-full"></span>';
		$r .= '<span class="caption">Network</span>';
		$r .= '</div>';
		$r .= '<div class="charm-tile">';
		$r .= '<span class="icon mif-cog"></span>';
		$r .= '<span class="caption">Preferences</span>';
		$r .= '</div>';
		$r .= '<div class="charm-tile active">';
		$r .= '<span class="icon mif-rocket"></span>';
		$r .= '<span class="caption">Fly mode</span>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '<div class="d-flex">';
		$r .= '<div class="charm-tile active">';
		$r .= '<span class="icon mif-target"></span>';
		$r .= '<span class="caption">Position</span>';
		$r .= '</div>';
        $r .= '<div class="charm-tile">';
		$r .= '<span class="icon mif-bluetooth"></span>';
		$r .= '<span class="caption">Not connected</span>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';

		echo $r;
	}
	
	public function desktopContent() {
		$r = '<div class="desktop">';
		$r .= '<div id="desktopChangeJS" class="window-area" style="background: #242F43 url(\''.URL.'/img/';
		$r .= Users::getUser()->desktop == NULL ? 'lspddesktop.jpg' : 'desktop/'.Users::getUser()->desktop;
		$r .= '\') center center no-repeat; background-size:cover;"></div>';
		$r .= '<div class="task-bar" id="TaskBarJS" style="background-color: ';
		$r .= Users::getUser()->taskbar_background == NULL ? '#1E1F20;' : Users::getUser()->taskbar_background.';';
		$r .= 'color: ';
		$r .= Users::getUser()->taskbar_color == NULL ? '#FFFFFF;' : Users::getUser()->taskbar_color.';';
		$r .= '"><div class="task-bar-section">';
		$r .= '<button class="task-bar-item" id="start-menu-toggle TaskBarLogoJS" style="color: ';
		$r .= Users::getUser()->taskbar_color == NULL ? '#FFFFFF;' : Users::getUser()->taskbar_color.';';
		$r .= '" onclick="openMetro()"><span class="mif-windows"></span></button>';
		
		/*$r .= '<div class="start-menu" data-role="dropdown" data-toggle-element="#start-menu-toggle">';
		$r .= '<div class="start-menu-inner">';
		$r .= '<div class="explorer">';
		$r .= '<ul class="v-menu w-100 bg-brandColor2 fg-white">';
		$r .= '<li><a onclick="createWindowYoutube()">Youtube window</a></li>';
		$r .= '<li><a onclick="createWindow()">New window</a></li>';
		$r .= '<li><a onclick="createWindowWithCustomButtons()">Custom buttons</a></li>';
		$r .= '<li><a onclick="createWindowModal()">Modal window</a></li>';
		$r .= '<li><a onclick="openMetro()">Metro</a></li>';
		$r .= '</ul>';
		$r .= '</div>';
		$r .= '</div>';
		$r .= '</div>';*/
		
		$r .= '</div>';
		$r .= '<div class="task-bar-section tasks"></div>';
		$r .= '<div class="task-bar-section system-tray ml-auto">';
		$r .= '<button class="task-bar-item" id="open-charm TaskBarCharmJS" style="color: ';
		$r .= Users::getUser()->taskbar_color == NULL ? '#FFFFFF;' : Users::getUser()->taskbar_color.';';
		$r .= '" onclick="openCharm()"><span class="mif-comment"></span></button>';
		$r .= '<span style="line-height: 19px;text-align:center" class="pr-4 desktopTimeJS ';
		$r .= Users::getUser()->divider == '<br>' && Users::getUser()->showdate == "true" && Users::getUser()->showtime == "true" ? 'timeDateon' : 'timeDateoff';
		$r .= '" id="desktopTimeJS">';
		$r .= '<span data-role="clock" id="changeTimeJS" class="w-auto reduce-1" data-show-date="'.Users::getUser()->showdate.'" data-show-time="'.Users::getUser()->showtime.'" data-show-tick="'.Users::getUser()->showtick.'" data-date-format="'.Users::getUser()->dateformat.'" data-date-divider="'.Users::getUser()->datedivider.'" data-time-divider="'.Users::getUser()->timedivider.'" data-time-format="'.Users::getUser()->timeformat.'" data-divider="'.Users::getUser()->divider.'" data-show-suffix="'.Users::getUser()->showsuffix.'" data-leading-zero="true" data-time-zone="'.Users::getUser()->timezone.'"></span>';
		$r .= '</span>';
		$r .= '</div>';
        $r .= '</div>';
		$r .= '</div>';

		echo $r;
	}
	
}
?>