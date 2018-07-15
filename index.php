<!DOCTYPE html>
<html>
<?php
   include("config.php");
?>
<?php
// Start the session
//session_start();
$_SESSION["lan"] = "en";
$_SESSION["username"] = "";
$_SESSION["gid"] = 2;
#echo "Session variables are set.";
#echo var_dump($_SESSION["lan"]);

$gamename = 'Game Tree Cafe Home'
?>
    <script src="js/jquery.js"></script> 
    <script src="js/jquery.form.js"></script> 
	<script type="text/javascript" src="js/jquery.cookie.min.js"></script>


<!-- EXAMPLE CODE -->

<!-- END EXAMPLE CODE -->
<head>
<script>

function loadDrink(){
console.log("drink");
var xhr = new XMLHttpRequest();
// OPEN - type, url/file, async
xhr.open('GET', "flist.php?type=1&submit=GO", true); //flist.php?type=1&submit=GO
//console.log(xhr);
	xhr.onload = function(){
		//console.log('onload');
		if(this.status == 200){
			//console.log('status');
			document.getElementById("demo1").innerHTML = (this.responseText);
		}
	}
xhr.send();
}
function loadDesserts(){
console.log("drink");
var xhr = new XMLHttpRequest();
// OPEN - type, url/file, async
xhr.open('GET', "flist.php?type=4&submit=GO", true); //flist.php?type=1&submit=GO
//console.log(xhr);
	xhr.onload = function(){
		//console.log('onload');
		if(this.status == 200){
			//console.log('status');
			document.getElementById("demo1").innerHTML = (this.responseText);
		}
	}
xhr.send();
}

function loadFood(){
console.log("food");
var xhr = new XMLHttpRequest();
// OPEN - type, url/file, async
xhr.open('GET', "flist.php?type=2&submit=GO", true); //you can just use the var
//console.log(xhr);
	xhr.onload = function(){
		//console.log('onload');
		if(this.status == 200){
			//console.log('status');
			document.getElementById("demo1").innerHTML = (this.responseText);
		}
	}
xhr.send(); 
}

function loadSnacks(){
console.log("food");
var xhr = new XMLHttpRequest();
// OPEN - type, url/file, async
xhr.open('GET', "flist.php?type=3&submit=GO", true); //you can just use the var
//console.log(xhr);
	xhr.onload = function(){
		//console.log('onload');
		if(this.status == 200){
			//console.log('status');
			document.getElementById("demo1").innerHTML = (this.responseText);
		}
	}
xhr.send(); 
}

 function searchOptions() {
    var x = document.getElementById("options");
    if (x.style.display === "none") {
		btns.style.display = "none";
        x.style.display = "block";

    } else {
		btns.style.display = "block";
        x.style.display = "none";
		form.style.display = "none";
    }
}

function setTnum(tnum){
   //Add table number to cookie	
   //PHPSESSID=din708j157b4rgs82d5d3ptoqv; user="Frank"
   console.log('saving the table number');
    var x = decodeURIComponent(document.cookie);
	var oldcook	 = x.split(';');
    //document.cookie = oldcook[0] + "; " + oldcook[1] + ";" + "table" + "=" + tnum + ";path=/";
	document.cookie = "table" + "=" + tnum + ";path=/";
	console.log(decodeURIComponent(document.cookie));
}
function setUname(){
	var uname = prompt('No order placed. Enter your name and re-submit');
	if (uname == null){ // this recurses if its still blank
		setUname();	
	}
	var appurl = `login.get.php?`; //viewid="${view}"&submit=GO`;
	if(uname.length > 0){
		appurl = appurl.concat(`uname="` , uname, '"');
	}

	console.log(appurl);
	//console.log(appurl);
	//create new xhr object
	var xhr = new XMLHttpRequest();
	// OPEN - type, url/file, async
	xhr.open('GET', appurl, true); //you can just use the var 

	xhr.onload = function(){
		//console.log('onload');
		if(this.status == 200){
			//console.log('status');
			alert("You may now place orders"+this.responseText);
			//document.getElementById("demo").innerHTML = (this.responseText);
		}
	}
	//document.getElementById("demo").innerHTML = xhr;
xhr.send();
}
function orderItem(item){
	//This gets username from cookie
/* 	var x = decodeURIComponent(document.cookie);
	//console.log(x);
	//console.log($.cookie('user'));
	//console.log($.cookie('table'));
	//console.log('variables');
	//var ca	 = x.split(';');
	//console.log(ca); */
	console.log($.cookie('user'));
    var uname = $.cookie('user');
	console.log(uname);
	if (uname == null){ // this keeps a cancellation from wiping the cookie
		console.log('setting');
		uname = setUname();	
	}
	
	//console.log(uname);
	uname = uname.substring(1, ((uname.length)-1));
	// table=2
	var oldtable = ($.cookie('table') == null ? 'null' : $.cookie('table'));
	//oldtable = oldtable.substring(7, (oldtable.length));
	console.log(oldtable);
	
	console.log(item);
	var pr = ("Please Enter your table number, " + uname);
	var tnum = prompt((pr), (oldtable == 'null' ? '' : oldtable));
	if (tnum != null){ // this keeps a cancellation from wiping the cookie
		setTnum(tnum);	
	}
	var appurl = '';
	appurl = appurl.concat("sql.php?ord=1&item=", item ,"&tnum=", tnum ,"&uname=", uname ,"&submit=GO");
	console.log(appurl);
	var xhr = new XMLHttpRequest();
	// OPEN - type, url/file, async
	xhr.open('GET', appurl, true); //you can just use the var 

	xhr.onload = function(){
		//console.log('onload');
		if(this.status == 200){
			//console.log('status');
			alert(this.responseText);
			//document.getElementById("demo").innerHTML = (this.responseText);
		}
	}
	//document.getElementById("demo").innerHTML = xhr;
	xhr.send();
}	

function saveUser(){
//?viewid=".($myarray['id'])."&submit=GO' 
console.log('loading save user');
var uname = document.searchinput.uname.value;
//console.log(uname);

var appurl = `login.get.php?`; //viewid="${view}"&submit=GO`;
if(uname.length > 0){
	appurl = appurl.concat(`uname="` , uname, '"');
}

console.log(appurl);
//console.log(appurl);
//create new xhr object
var xhr = new XMLHttpRequest();
// OPEN - type, url/file, async
xhr.open('GET', appurl, true); //you can just use the var 

xhr.onload = function(){
	//console.log('onload');
	if(this.status == 200){
		//console.log('status');   '<br><a href="#" class="link">Home</a>'
		document.getElementById("name").innerHTML = (this.responseText + '<br><a href="index.php" class="link">Home</a>'); // $_SESSION["username"]
		
		var element = document.getElementById("nameform");
		element.parentNode.removeChild(element);
	}
}
//document.getElementById("demo").innerHTML = xhr;
xhr.send();
}

function clearFilter(){ //clearFilter
	document.searchinput.reset();
}
function loadSearch(){	
        options.style.display = "none";
		btns.style.display = "block";
		//form.style.display = "none";
    
	
//?viewid=".($myarray['id'])."&submit=GO' 
//console.log('in loading');
//var gname = document.searchinput.gname.value;
//console.log(gname);
var complex = document.searchinput.complex.value;
console.log(complex);
//var genre = document.searchinput.genre.value;
//console.log(genre);
var ptime = document.searchinput.ptime.value;
console.log(ptime);
var pnum = document.searchinput.pnum.value;
console.log(pnum);
//var view = document.input.newview.value;

var appurl = `glist.php?`; //viewid="${view}"&submit=GO`;
var and = '';
/* if(gname.length > 0){
	appurl = appurl.concat(`gname="` , gname, '"');
	and = '&';
} */
if(complex.length > 0){
	appurl = appurl.concat(and, `complex="` , complex, '"');
	and = '&';
}
if(ptime.length > 0){
	appurl = appurl.concat(and, `ptime="` , ptime, '"');
	and = '&';
}
if(pnum.length > 0){
	appurl = appurl.concat(and, `pnum="` , pnum, '"');
	and = '&';
}
/* if(mech.length > 0){
	appurl = appurl.concat(`mech="` , mech, '"');
	and = '&';
} */
		
		

console.log(appurl);
console.log(appurl);
//create new xhr object
var xhr = new XMLHttpRequest();
// OPEN - type, url/file, async
xhr.open('GET', appurl, true); //you can just use the var 

xhr.onload = function(){
	//console.log('onload');
	if(this.status == 200){
		console.log('status');
		document.getElementById("demo").innerHTML = (this.responseText);
	}
}
//document.getElementById("demo").innerHTML = xhr;
xhr.send();
}
function loadAll(){
	var appurl = `glist.php?`;
	console.log(appurl);
	//create new xhr object
	var xhr = new XMLHttpRequest();
	// OPEN - type, url/file, async
	xhr.open('GET', appurl, true); //you can just use the var 

	xhr.onload = function(){
		console.log('onload');
		if(this.status == 200){
			console.log('status');
			document.getElementById("demo").innerHTML = (this.responseText);
		}
	}
	//document.getElementById("demo").innerHTML = xhr;
	xhr.send();
}
function loadFrame() {
	//?viewid=".($myarray['id'])."&submit=GO' 
	var gname = document.input.gname.value;//no form name?
	var mech = document.input.mech.value;
	var genre = document.input.genre.value;
	var ptime = document.input.ptime.value;
	var pnum = document.input.pnum.value;

	var appurl = `glist.php?gname="${gname}"&mech="${mech}"&genre="${genre}"&ptime="${ptime}"&pnum="${pnum}"&submit=GO`;
	document.getElementById("app").src = appurl;
}

function orderCancel(oid, tnum){
	console.log("order id", oid);
	//var tnum = prompt("Please Enter your table number");
	var appurl = '';
	appurl = appurl.concat("sql.php?ord=4&oid=", oid ,"&tnum=", tnum ,"&submit=GO");
	console.log(appurl);
	var xhr = new XMLHttpRequest();
	// OPEN - type, url/file, async
	xhr.open('GET', appurl, true); //you can just use the var 
	//alert('btn clicked');
	xhr.onload = function(){
		//console.log('onload');
		if(this.status == 200){
			//console.log('status');
			//document.getElementById("feedback").innerHTML = (this.responseText);
			alert(this.responseText);
		}
	}
	xhr.send();
}

</script>
    <!--
        Customize this policy to fit your own app's needs. For more guidance, see:
            https://github.com/apache/cordova-plugin-whitelist/blob/master/README.md#content-security-policy
        Some notes:
            * gap: is required only on iOS (when using UIWebView) and is needed for JS->native communication
            * https://ssl.gstatic.com is required only on Android and is needed for TalkBack to function properly
            * Disables use of inline scripts in order to mitigate risk of XSS vulnerabilities. To change this:
                * Enable inline JS: add 'unsafe-inline' to default-src
				frame-src = 'https://www.youtube.com'	
       
    <meta http-equiv="Content-Security-Policy" content="  default-src 'self' data: gap: https://ssl.gstatic.com 'unsafe-inline'; 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *">
	<meta http-equiv="Content-Security-Policy" content=" img-src 'self' data:; default-src 'self' data: gap: https://ssl.gstatic.com 'unsafe-inline' 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *">
	-->
	

    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Your app title -->
    <title>Game Tree</title>

    <!-- This template defaults to the iOS CSS theme. To support both iOS and material design themes, see the Framework7 Tutorial at the link below:
        http://www.idangero.us/framework7/tutorials/maintain-both-ios-and-material-themes-in-single-app.html
     -->

    <link rel="stylesheet" href="lib/framework7/css/framework7.ios.min.css">
    <link rel="stylesheet" href="lib/framework7/css/framework7.ios.colors.min.css">

    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- Status bar overlay for full screen mode (PhoneGap) -->
    <div class="statusbar-overlay"></div>

    <!-- Panels overlay-->
    <div class="panel-overlay"></div>
    <!-- Left panel with reveal effect-->
    <div class="panel panel-left panel-reveal">
        <div class="content-block">
            <p><?php
			//echo file_get_contents('leftpanel.php');
			include('leftpanel.php');
			?></p>
        </div>
    </div>

    <!-- Views -->
    <div class="views">
        <!-- Your main view, should have "view-main" class -->
        <div class="view view-main">
            <!-- Top Navbar-->
            <div class="navbar">
                <div class="navbar-inner">
                    <!-- We need cool sliding animation on title element, so we have additional "sliding" class -->
                    <div class="center sliding">Game Tree Cafe Home</div>
                    <div class="right">
                        <!--
                          Right link contains only icon - additional "icon-only" class
                          Additional "open-panel" class tells app to open panel when we click on this link
                        -->
                        <a href="#" class="link icon-only open-panel"><i class="icon icon-bars"></i></a>
                    </div>
                </div>
            </div>
            <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
            <div class="pages navbar-through toolbar-through">
                <!-- Page, "data-page" contains page name -->
                <div data-page="index" class="page">
                    <!-- Scrollable page content -->
                    <div class="page-content">
                        <div class="content-block">
						<div class="navbar-inner navbar-on-center">
                            <a href=
							"search_game.php" class="link"><h1>
							Find a Game<br><br></a>
							
							<a href=
							"search_food.php" class="link">
							Order Food</h1></a>
							</p></div>
							 
							
<?php
	#include("config.php");
	#session_start();
	#include("glist.php");
	
	#this may need ot be it's own page
  if($_SESSION["lan"] == "en"){
	  ;#let change to thai. willneed ajax
  }else{
	  ;#let change to eng
  }
?>
						   
                            <!-- Link to another page 
                            <a href="about.html">About app</a>-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bottom Toolbar-->
            <div class="toolbar">
                <div class="toolbar-inner">
                    <!-- Toolbar links -->
                    <a href="search_game.php" class="link"> <img src="img/search.png" alt="search" style="width:42px;height:42px;border:0;"> </a>
										
                    <a href="search_food.php" class="link"> <img src="img/food.jpg" alt="search" style="width:42px;height:42px;border:0;"> </a>
					<div class="right">
						<a href="#" class="back link">
							<i class="icon icon-back"></i>
							<span>Back</span>
						</a>
					</div>

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="lib/framework7/js/framework7.min.js"></script>
    <script type="text/javascript" src="js/my-app.js"></script>
</body>

</html>