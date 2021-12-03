var Root = 'http://localhost/newpd';
var _userPic = 'http://localhost/newpd/img/';

function invalidForm(){
 	var form  = $(this);
    form.addClass("ani-ring");
    setTimeout(function(){
    	form.removeClass("ani-ring");
    }, 1000);
	checkUseraccount();
 }

 function validateForm(){
	 checkUseraccount();
	 checkLogin();
 	/*$(".login-form").animate({
    	opacity: 0
    });*/
}

function passwordLost() {
	$(".passwordlostcontent").html('<p>Wenden Sie sich bitte an Ihren vorgesetzten, sofern Sie Ihr Passwort vergessen haben!</p>');
	$(".usernameJS").slideDown().hide('1000');
	$(".passwordJS").slideDown().hide('1000');
	$(".passwordlostJS").slideDown().hide('1000');
	$(".passwordlostcontent").slideUp().show('1000');
	$(".loginJS").slideDown().hide('1000');
	$(".passwordLosingJS").slideUp().show('1000');
}
		
function loginReturn() {
	$(".usernameJS").slideDown().show('1000');
	$(".passwordJS").slideDown().show('1000');
	$(".passwordlostJS").slideDown().show('1000');
	$(".passwordlostcontent").slideUp().hide('1000');
	$(".loginJS").slideDown().show('1000');
	$(".passwordLosingJS").slideUp().hide('1000');
}

function checkUseraccount() {
	var userfield = $('#usernamefieldJS').val();
	$.ajax({
		url: 'http://localhost/newpd/_ajax.php?handle=checkuseraccount',
		method: 'POST',
		data: 'userfield='+userfield,
		dataType:'json',
		success: function(result) {
			if(result.code == 1) {
				$("#userPicJS").attr("src",_userPic+result.pic);
			} else {
				$("#userPicJS").attr("src",_userPic+'default.svg');
			}
			//alert('User: '+result.code+' | '+result);
		}
	});
}

function checkLogin() {
	$('.loginJS button').prop('disabled', true);
	$('.loginJS button').html('<span class="mif-windows ani-shake" style="margin-right:5px;"></span> Bitte warten...');
	var userfield = $('#usernamefieldJS').val();
	var passfield = $('#passwordfieldJS').val();
	$.ajax({
		url: 'http://localhost/newpd/_ajax.php?handle=checklogin',
		method: 'POST',
		data: 'userfield='+userfield+'&pw='+passfield,
		dataType:'json',
		success: function(result) {
			if(result.code == 1) {
				$(".login-form").animate({
					opacity: 0
				});
				
				setTimeout(function() { 
					window.location.replace(Root+'/desktop.php?ssid='+result.ssid); 
				}, 2000);
				
			} else {
				$(".passwordlostcontent").html('<p>Ihre Zugangsdaten sind nicht korrekt.<br />Versuchen Sie es erneut!</p>');
				$(".usernameJS").slideDown().hide('1000');
				$(".passwordJS").slideDown().hide('1000');
				$(".passwordlostJS").slideDown().hide('1000');
				$(".passwordlostcontent").slideUp().show('1000');
				$(".loginJS").slideDown().hide('1000');
				$(".passwordLosingJS").slideUp().show('1000');
				$('#passwordfieldJS').val('');
				$('.loginJS button').prop('disabled', false);
				$('.loginJS button').html('Einloogen');
			}
		}
	});
	
}

function NoticeEdit(notice, id, ssid) {
  	var check = -1;
	if($('#'+id).prop("checked") == true){
		$('.pw123').html(notice+' ist checked');
		check = 1;
               // console.log("Checkbox is checked.");
    }
    else if($('#'+id).prop("checked") == false){
		$('.pw123').html(notice+' ist NICHT checked');
		check = 0;
    	//console.log("Checkbox is unchecked.");
    }
	
	
	$.ajax({
		url: 'http://localhost/newpd/_ajax.php?handle=SystemNotice',
		method: 'POST',
		data: 'notice='+notice+'&check='+check+'&ssid='+ssid,
		dataType:'json',
		success: function(result) {
			if(result.code == 1) {
				Metro.toast.create("Einstellung gespeichert", function(){
					$('.toast').remove();
				}, 5000, 'success');
			} else {
				Metro.toast.create(result.error, function(){
					$('.toast').remove();
				}, 5000, 'danger');
			}
		}, 
		error: function (xhr, ajaxOptions, thrownError) {
			Metro.toast.create("Fehler: Ressourcen wurden nicht geladen!<br />"+xhr.responseText, function(){
				$('.toast').remove();
			}, 5000, 'danger');
		  }
	});
	
	
}

function ChangeDesktop(desktop, ssid, defaultd) {

	$.ajax({
		url: 'http://localhost/newpd/_ajax.php?handle=ChangeDesktop',
		method: 'POST',
		data: 'desktop='+desktop+'&ssid='+ssid,
		dataType:'json',
		success: function(result) {
			if(result.code == 1) {
				$('#changedesktopdemoJS').html('<div class="demo-box" data-role="image-box" data-image="'+_userPic+'/desktop/'+desktop+'.jpg" style="height: 200px;width: 200px;"></div>');
				
				parent.document.getElementById('desktopChangeJS').style.background = '#242F43 url("'+_userPic+'/desktop/'+desktop+'.jpg") center center no-repeat';
				parent.document.getElementById('desktopChangeJS').style.backgroundSize = 'cover';

			} else {
				Metro.toast.create(result.error, function(){
					$('.toast').remove();
				}, 5000, 'danger');
			}
		}, 
		error: function (xhr, ajaxOptions, thrownError) {
			Metro.toast.create("Fehler: Ressourcen wurden nicht geladen!<br />"+xhr.responseText, function(){
				$('.toast').remove();
			}, 5000, 'danger');
		  }
	});
	
}

function ChangeTaskbarBackground() {
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	var ssid = urlParams.get('ssid');
	var col = $('#color-controller').val();
	
	$.ajax({
		url: 'http://localhost/newpd/_ajax.php?handle=ChangeTaskbarBackground',
		method: 'POST',
		data: 'color='+col+'&ssid='+ssid,
		dataType:'json',
		success: function(result) {
			if(result.code == 1) {
				
				//document.getElementsById('TaskBarJS').style.backgroundColor = col;
				parent.document.getElementById('TaskBarJS').style.backgroundColor = col;
				//console.log(parent.document.getElementById("TaskBarJS"));
				//console.log(parent.document.getElementbyId("TaskBarJS").innerHTML);
				//console.log(parent.document.getElementsById('TaskBarJS'))
				//parent.document.getElementById('desktopChangeJS').style.backgroundSize = 'cover';

			} else {
				Metro.toast.create(result.error, function(){
					$('.toast').remove();
				}, 5000, 'danger');
			}
		}, 
		error: function (xhr, ajaxOptions, thrownError) {
			Metro.toast.create("Fehler: Ressourcen wurden nicht geladen!<br />"+xhr.responseText, function(){
				$('.toast').remove();
			}, 5000, 'danger');
		  }
	});
  //console.log($('#color-controller').val());
}

function ChangeTaskbarColor() {
	
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	var ssid = urlParams.get('ssid');
	
	var col = $('#color-controller2').val();
	console.log(col);
	$.ajax({
		url: 'http://localhost/newpd/_ajax.php?handle=ChangeTaskbarColor',
		method: 'POST',
		data: 'color='+col+'&ssid='+ssid,
		dataType:'json',
		success: function(result) {
			if(result.code == 1) {
				//document.getElementsById('TaskBarJS').style.backgroundColor = col;
				parent.document.getElementById('TaskBarJS').style.color = col;
				parent.document.getElementById('start-menu-toggle TaskBarLogoJS').style.color = col;
				parent.document.getElementById('open-charm TaskBarCharmJS').style.color = col;
				//console.log(parent.document.getElementById('start-menu-toggle TaskBarLogoJS').innerHTML);
				//parent.document.getElementById('TaskBarLogoJS').style.color = col;
				
				//console.log(parent.document.getElementById("TaskBarJS"));
				//console.log(parent.document.getElementbyId("TaskBarJS").innerHTML);
				//console.log(parent.document.getElementsById('TaskBarJS'))
				//parent.document.getElementById('desktopChangeJS').style.backgroundSize = 'cover';

			} else {
				Metro.toast.create(result.error, function(){
					$('.toast').remove();
				}, 5000, 'danger');
			}
		}, 
		error: function (xhr, ajaxOptions, thrownError) {
			Metro.toast.create("Fehler: Ressourcen wurden nicht geladen!<br />"+xhr.responseText, function(){
				$('.toast').remove();
			}, 5000, 'danger');
		  }
	});
}

function setPassword(ssid) {
	var pw = $("#newpwJS").val();
	var pw2 = $("#newpw2JS").val();
	if(pw === "") {
		Metro.toast.create("Geben Sie zuerst Ihr neues Passwort ein!", function(){
						$('.toast').remove();
					}, 2000, 'alert');
	} else if(pw2 === "") {
		Metro.toast.create("Wiederholen Sie Ihr neues Passwort!", function(){
						$('.toast').remove();
					}, 2000, 'alert');
	} else if(pw.length < 6) {
		Metro.toast.create("Ihr Passwort muss mindestens 6 Zeichen haben!", function(){
						$('.toast').remove();
					}, 2000, 'alert');
	} else if(pw !== pw2) {
		Metro.toast.create("Die beiden Passwörter stimmen nicht überein!", function(){
						$('.toast').remove();
					}, 2000, 'alert');
		$("#newpw2JS").val('');
	} else {
		$.ajax({
			url: 'http://localhost/newpd/_ajax.php?handle=ChangePassword',
			method: 'POST',
			data: 'pw='+pw+'&ssid='+ssid,
			dataType:'json',
			success: function(result) {
				if(result.code == 1) {
					Metro.toast.create("Ihr neues Passwort wurde aktiviert!", function(){
						$('.toast').remove();
					}, 5000, 'success');

				} else {
					Metro.toast.create(result.error, function(){
						$('.toast').remove();
					}, 5000, 'danger');
				}
			}, 
			error: function (xhr, ajaxOptions, thrownError) {
				Metro.toast.create("Fehler: Ressourcen wurden nicht geladen!<br />"+xhr.responseText, function(){
					$('.toast').remove();
				}, 5000, 'danger');
			  }
		});
	}
	
}

function palwaltest() {
	//$("#pwtest").html("check");
	/*if($("#tTimeactive").is(":checked")) {
            $("#pwtest").html("check");
        } else {
			$("#pwtest").html("kein check");
		}*/
	//$("#tTimeactive").prop("checked", true);

// Uncheck
//$("#checkbox").prop("checked", false);
	var lol = $("#tTimezone").data("selectinfo");
	//var selected_option = $('#tTimezone option:selected');
	var selected_option = $("#tTimezone").val();
	if(lol === selected_option) {
		//var ex = parent.document.getElementById('changeTimeJS').innerHTML;
		var ex = parent.document.querySelector('#changeTimeJS');
		$("#pwtest").html('JA '+ex.dataset.timeZone);
	} else {
		$("#pwtest").html('Nein');
	}
	//$("#pwtest").html(lol+'<br>Check: '+selected_option);
}

function t_timeactive() {
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	var ssid = urlParams.get('ssid');
	if($("#tTimeactive").is(":checked")) {
		$("#tTimeformat").prop("disabled", false);
		
		$("#tPmamactive").prop("disabled", false);
		$("#tSecactive").prop("disabled", false);
		$("#tTimedivider").prop("disabled", false);
		$("#tDivider").prop("disabled", false);
		$.post("http://localhost/newpd/_ajax.php?handle=setTime", {set: "showtime", ssid: ssid, value: "true"})
			.fail( function(xhr, textStatus, errorThrown) {
				Metro.toast.create(xhr.responseText, function(){
						$('.toast').remove();
					}, 2000, 'alert');
			});
		BuildTaskbarDateTimer(null, true, null, null, null, null, null, null, null, null);
		timeDateOnOff(true);
		_checkTimeZoneActive();
    } else {
		$("#tTimeformat").prop("disabled", true);
		$("#tPmamactive").prop("disabled", true);
		$("#tSecactive").prop("disabled", true);
		$("#tTimedivider").prop("disabled", true);
		$("#tDivider").prop("disabled", true);
		$.post("http://localhost/newpd/_ajax.php?handle=setTime", {set: "showtime", ssid: ssid, value: "false"})
			.fail( function(xhr, textStatus, errorThrown) {
				Metro.toast.create(xhr.responseText, function(){
						$('.toast').remove();
					}, 2000, 'alert');
			});
		BuildTaskbarDateTimer(null, false, null, null, null, null, null, null, null, null);
		timeDateOnOff(false);
		_checkTimeZoneActive();
	}
}

function t_dateactive() {
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	var ssid = urlParams.get('ssid');
	
	if($("#tDateactive").is(":checked")) {
		$("#tDateformat").prop("disabled", false);
		$("#tDatedivider").prop("disabled", false);
		$.post("http://localhost/newpd/_ajax.php?handle=setTime", {set: "showdate", ssid: ssid, value: "true"})
			.fail( function(xhr, textStatus, errorThrown) {
				Metro.toast.create(xhr.responseText, function(){
						$('.toast').remove();
					}, 2000, 'alert');
			});
		BuildTaskbarDateTimer(true, null, null, null, null, null, null, null, null, null);
		timeDateOnOff(true);
		_checkTimeZoneActive();
    } else {
		$("#tDateformat").prop("disabled", true);
		$("#tDatedivider").prop("disabled", true);
		$.post("http://localhost/newpd/_ajax.php?handle=setTime", {set: "showdate", ssid: ssid, value: "false"})
			.fail( function(xhr, textStatus, errorThrown) {
				Metro.toast.create(xhr.responseText, function(){
						$('.toast').remove();
					}, 2000, 'alert');
			});
		BuildTaskbarDateTimer(false, null, null, null, null, null, null, null, null, null);
		timeDateOnOff(false);
		_checkTimeZoneActive();
	}
}

function t_dateformat() {
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	var ssid = urlParams.get('ssid');
	
	var ex = $("#tDateformat").val();
	if(ex != _getTimeParam('data-date-format')) {
		$.post("http://localhost/newpd/_ajax.php?handle=setTime", {set: "dateformat", ssid: ssid, value: ex})
			.fail( function(xhr, textStatus, errorThrown) {
				Metro.toast.create(xhr.responseText, function(){
						$('.toast').remove();
					}, 2000, 'alert');
			});
		BuildTaskbarDateTimer(null, null, null, ex, null, null, null, null, null, null);
		console.log(ex);
	}	
}

function t_timezone() {
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	var ssid = urlParams.get('ssid');
	
	var ex = $("#tTimezone").val();
	if(ex != _getTimeParam('data-time-zone')) {
		$.post("http://localhost/newpd/_ajax.php?handle=setTime", {set: "timezone", ssid: ssid, value: ex})
			.fail( function(xhr, textStatus, errorThrown) {
				Metro.toast.create(xhr.responseText, function(){
						$('.toast').remove();
					}, 2000, 'alert');
			});
		BuildTaskbarDateTimer(null, null, null, null, null, null, null, null, ex, null);
		console.log(ex);
	}	
}

function t_timeformat() {
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	var ssid = urlParams.get('ssid');
	
	var ex = $("#tTimeformat").val();
	if(ex != _getTimeParam('data-time-format')) {
		$.post("http://localhost/newpd/_ajax.php?handle=setTime", {set: "timeformat", ssid: ssid, value: ex})
			.fail( function(xhr, textStatus, errorThrown) {
				Metro.toast.create(xhr.responseText, function(){
						$('.toast').remove();
					}, 2000, 'alert');
			});
		BuildTaskbarDateTimer(null, null, null, null, null, ex, null, null, null, null);
		console.log(ex);
	}
	if(ex == "12") {
		$("#tPmamactive").prop("disabled", false);
	} else {
		$("#tPmamactive").prop("disabled", true);
	}
}

function t_pmamactive() {
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	var ssid = urlParams.get('ssid');
	
	if($("#tPmamactive").is(":checked")) {
		$.post("http://localhost/newpd/_ajax.php?handle=setTime", {set: "showsuffix", ssid: ssid, value: "true"})
			.fail( function(xhr, textStatus, errorThrown) {
				Metro.toast.create(xhr.responseText, function(){
						$('.toast').remove();
					}, 2000, 'alert');
			});
		BuildTaskbarDateTimer(null, null, null, null, null, null, null, true, null, null);
    } else {
		$.post("http://localhost/newpd/_ajax.php?handle=setTime", {set: "showsuffix", ssid: ssid, value: "false"})
			.fail( function(xhr, textStatus, errorThrown) {
				Metro.toast.create(xhr.responseText, function(){
						$('.toast').remove();
					}, 2000, 'alert');
			});
		BuildTaskbarDateTimer(null, null, null, null, null, null, null, false, null, null);
	}
}

function t_secondactive() {
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	var ssid = urlParams.get('ssid');
	
	if($("#tSecactive").is(":checked")) {
		$.post("http://localhost/newpd/_ajax.php?handle=setTime", {set: "showtick", ssid: ssid, value: "true"})
			.fail( function(xhr, textStatus, errorThrown) {
				Metro.toast.create(xhr.responseText, function(){
						$('.toast').remove();
					}, 2000, 'alert');
			});
		BuildTaskbarDateTimer(null, null, true, null, null, null, null, null, null, null);
    } else {
		$.post("http://localhost/newpd/_ajax.php?handle=setTime", {set: "showtick", ssid: ssid, value: "false"})
			.fail( function(xhr, textStatus, errorThrown) {
				Metro.toast.create(xhr.responseText, function(){
						$('.toast').remove();
					}, 2000, 'alert');
			});
		BuildTaskbarDateTimer(null, null, false, null, null, null, null, null, null, null);
	}
}

function t_datedivider() {
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	var ssid = urlParams.get('ssid');
	
	var ex = $("#tDatedivider").val();
	if(ex != _getTimeParam('data-date-divider')) {
		$.post("http://localhost/newpd/_ajax.php?handle=setTime", {set: "datedivider", ssid: ssid, value: ex})
			.fail( function(xhr, textStatus, errorThrown) {
				Metro.toast.create(xhr.responseText, function(){
						$('.toast').remove();
					}, 2000, 'alert');
			});
		BuildTaskbarDateTimer(null, null, null, null, ex, null, null, null, null, null);
		console.log(ex);
	}	
}
//
function t_timedivider() {
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	var ssid = urlParams.get('ssid');
	
	var ex = $("#tTimedivider").val();
	if(ex != _getTimeParam('data-time-divider')) {
		$.post("http://localhost/newpd/_ajax.php?handle=setTime", {set: "timedivider", ssid: ssid, value: ex})
			.fail( function(xhr, textStatus, errorThrown) {
				Metro.toast.create(xhr.responseText, function(){
						$('.toast').remove();
					}, 2000, 'alert');
			});
		BuildTaskbarDateTimer(null, null, null, null, null, null, null, null, null, ex);
		console.log(ex);
	}	
}

function t_divider() {
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	var ssid = urlParams.get('ssid');
	
	var ex = $("#tDivider").val();
	if(ex != _getTimeParam('data-divider')) {
		$.post("http://localhost/newpd/_ajax.php?handle=setTime", {set: "divider", ssid: ssid, value: ex})
			.fail( function(xhr, textStatus, errorThrown) {
				Metro.toast.create(xhr.responseText, function(){
						$('.toast').remove();
					}, 2000, 'alert');
			});
		BuildTaskbarDateTimer(null, null, null, null, null, null, ex, null, null, null);
		timeDateOnOff(true);
		console.log(ex);
	}	
}

function timeDateOnOff(on = true) {
	if(_getTimeParam('data-divider') == '<br>' && _getTimeParam('data-show-date') == "true" && _getTimeParam('data-show-time') == "true" && on) {
		parent.document.getElementById('desktopTimeJS').classList.add("timeDateon");
		parent.document.getElementById('desktopTimeJS').classList.remove("timeDateoff");
	} else {
		parent.document.getElementById('desktopTimeJS').classList.add("timeDateoff");
		parent.document.getElementById('desktopTimeJS').classList.remove("timeDateon");
	}
}

function _checkTimeZoneActive() {
	if(_getTimeParam('data-show-date') == "false" && _getTimeParam('data-show-time') == "false") {
		$("#tTimezone").prop("disabled", true);
	} else {
		$("#tTimezone").prop("disabled", false);
	}
}

function palwaltest2() {
	
	//var ex = parent.document.getElementById('changeTimeJS').innerHTML;
	//const exampleAttr= ex.getAttribute('id');
	//ex1 = _getTimeParam('data-show-time');
	//ex2 = _getTimeParam('data-time-zone');
	//$("#pwtest").html("T "+ex2+" st "+ex1);
	//_setTimeParam('data-show-time', 'true');
	//var ex2 = parent.document.getElementById('changeTimeJS').outerHTML;
  //console.log(ex2)
	//parent.document.getElementById('changeTimeJS').outerHTML = ex2;
	//parent.document.getElementById('changeTimeJS').innerHTML = ex2;
	//var ex = parent.document.getElementById('desktopTimeJS').innerHTML;
	
	//parent.document.getElementById('desktopTimeJS').innerHTML = '<span data-role="clock" id="changeTimeJS" class="w-auto reduce-1" data-show-date="true" data-show-time="true" data-show-tick="false" data-date-format="europe" data-date-divider="." data-time-format="12" data-divider="<br>" data-show-suffix="false" data-leading-zero="true" data-time-zone="Africa/Cairo"></span>';
	BuildTaskbarDateTimer(null, true, null, null, null, null, null, null, null);
}

function BuildTaskbarDateTimer(showDate = null, showTime = null, showTick = null, dateFormat = null, dateDivider = null, timeFormat = null, divider = null, showSuffix = null, timeZone = null, timeDivider = null) {
	showDate = showDate == null ? _getTimeParam('data-show-date') : showDate;
	showTime = showTime == null ? _getTimeParam('data-show-time') : showTime;
	
	showTick = showTick == null ? _getTimeParam('data-show-tick') : showTick;
	dateFormat = dateFormat == null ? _getTimeParam('data-date-format') : dateFormat;
	dateDivider = dateDivider == null ? _getTimeParam('data-date-divider') : dateDivider;
	timeFormat = timeFormat == null ? _getTimeParam('data-time-format') : timeFormat;
	divider = divider == null ? _getTimeParam('data-divider') : divider;
	showSuffix = showSuffix == null ? _getTimeParam('data-show-suffix') : showSuffix;
	timeZone = timeZone == null ? _getTimeParam('data-time-zone') : timeZone;
	
	timeDivider = timeDivider == null ? _getTimeParam('data-time-divider') : timeDivider;
	var html = '<span data-role="clock" id="changeTimeJS" class="w-auto reduce-1" data-show-date="'+showDate+'" data-show-time="'+showTime+'" data-show-tick="'+showTick+'" data-date-format="'+dateFormat+'" data-time-divider="'+timeDivider+'" data-date-divider="'+dateDivider+'" data-time-format="'+timeFormat+'" data-divider="'+divider+'" data-show-suffix="'+showSuffix+'" data-leading-zero="true" data-time-zone="'+timeZone+'"></span>';
	parent.document.getElementById('desktopTimeJS').innerHTML = html;
}

function _getTimeParam(param) {
	var ex = parent.document.getElementById('changeTimeJS');
    var attr = ex.getAttribute(param);
	return attr;
}



$(function() {
    
	
});
