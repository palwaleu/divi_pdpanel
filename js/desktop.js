function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

var Desktop = {
    options: {
        windowArea: ".window-area",
        windowAreaClass: "",
        taskBar: ".task-bar > .tasks",
        taskBarClass: ""
    },

    wins: {},

    setup: function(options){
        this.options = $.extend( {}, this.options, options );
        return this;
    },

    addToTaskBar: function(wnd){
        var icon = wnd.getIcon();
        var wID = wnd.win.attr("id");
        var item = $("<span>").addClass("task-bar-item started").html(icon);

        item.data("wID", wID);

        item.appendTo($(this.options.taskBar));
		console.log('Task-Add: '+wID+' wnd '+wnd);
    },

    removeFromTaskBar: function(wnd){
        var wID = wnd.attr("id");
        var items = $(".task-bar-item");
        var that = this;
		console.log('Task-Remove: '+wID+' wnd '+wnd);
        $.each(items, function(){
            var item = $(this);
            if (item.data("wID") === wID) {
                delete that.wins[wID];
                item.remove();
            }
        })
    },

    createWindow: function(o){
        o.onDragStart = function(){
            win = $(this);
            $(".window").css("z-index", 1);

            if (!win.hasClass("modal")) {
                win.css("z-index", 3);
            }
        };
        o.onDragStop = function(){
            win = $(this);
            if (!win.hasClass("modal"))
                win.css("z-index", 2);
        };
        o.onWindowDestroy = function(win){
            Desktop.removeFromTaskBar($(win));
        };

        var w = $("<div>").appendTo($(this.options.windowArea));
        var wnd = w.window(o).data("window");
		
		console.log('WindowsCreate wnd '+wnd+' w '+w);

        var win = wnd.win;
        var shift = Metro.utils.objectLength(this.wins) * 16;

        if (wnd.options.place === "auto" && wnd.options.top === "auto" && wnd.options.left === "auto") {
            win.css({
                top: shift,
                left: shift
            });
        }
        this.wins[win.attr("id")] = wnd;
        this.addToTaskBar(wnd);

        return wnd;
    }
};

Desktop.setup();

var w_icons = [
    'rocket', 'apps', 'cog', 'anchor'
];
var w_titles = [
    'rocket', 'apps', 'cog', 'anchor'
];

function createWindow(){
    //var index = $.random(0, 3);
	var index = getRandomInt(0, 3);
    var w = Desktop.createWindow({
        resizeable: true,
        draggable: true,
        width: 300,
        icon: "<span class='mif-"+w_icons[index]+"'></span>",
        title: w_titles[index],
        content: "<div class='p-2'>This is desktop demo created with Metro 4 Components Library</div>"
    });

    setTimeout(function(){
        w.setContent("New window content");
    }, 3000);
}

function createWindowWithCustomButtons(){
   // var index = random(0, 3);
	var index = getRandomInt(0,3);
    var customButtons = [
        {
            html: "<span class='mif-rocket'></span>",
            cls: "sys-button",
            onclick: "alert('You press rocket button')"
        },
        {
            html: "<span class='mif-user'></span>",
            cls: "alert",
            onclick: "alert('You press user button')"
        },
        {
            html: "<span class='mif-cog'></span>",
            cls: "warning",
            onclick: "alert('You press cog button')"
        }
    ];
    Desktop.createWindow({
        resizeable: true,
        draggable: true,
        customButtons: customButtons,
        width: 360,
        icon: "<span class='mif-"+w_icons[index]+"'></span>",
        title: w_titles[index],
        content: "<div class='p-2'>This is desktop demo created with Metro 4 Components Library.<br><br>This window has a custom buttons in caption.</div>"
    });
}

function createWindowModal(){
    Desktop.createWindow({
        resizeable: false,
        draggable: true,
        width: 300,
        icon: "<span class='mif-cogs'></span>",
        title: "Modal window",
        content: "<div class='p-2'>This is desktop demo created with Metro 4 Components Library</div>",
        //overlay: true,
        //overlayColor: "transparent",
        modal: true,
        place: "center",
        onShow: function(win){
            win = $(win);
            win.addClass("ani-swoopInTop");
            setTimeout(function(){
                $(win).removeClass("ani-swoopInTop");
            }, 1000);
        },
        onClose: function(win){
            win = $(win);
            win.addClass("ani-swoopOutTop");
        }
    });
}

function createWindowYoutube(){
	openMetro();
	Desktop.createWindow({
        resizeable: true,
        draggable: true,
        width: 500,
        /*icon: "<span class='mif-youtube'></span>",*/
		icon: "<img src='img/systemsteuerung.svg'>",
        title: "Login",
        /*content: "https://youtu.be/Qz6XNSB0F3E",*/
		content : "http://localhost/newpd/login.html",
        clsContent: "bg-dark"
    });
}

function createWindowSettings(){
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);

	openMetro();
	Desktop.createWindow({
        resizeable: true,
        draggable: true,
        width: 700,
		height: 500,
		modal: true,
        place: "center",
        /*icon: "<span class='mif-youtube'></span>",*/
		icon: "<i class='mif-windows'></i>",
        title: "Systemsteuerung",
        /*content: "https://youtu.be/Qz6XNSB0F3E",*/
		content : "http://localhost/newpd/_windows/settings.php?ssid="+urlParams.get('ssid'),
        clsContent: "bg-dark"
    });
}

function openCharm() {
    var charm = $("#charm").data("charms");
    charm.toggle();
}

function openMetro() {
    var charm = $("#metrojs");
    charm.toggle();
}

$(".window-area").on("click", function(){
    Metro.charms.close("#charm");
});

$(".charm-tile").on("click", function(){
    $(this).toggleClass("active");
});