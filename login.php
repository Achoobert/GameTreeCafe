<?php session_start(); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script> 
	<div class="navbar">
    <div class="navbar-inner">
        <div class="left">
            <a href="#" class="back link">
                <i class="icon icon-back"></i>
                <span>Back</span>
            </a>
        </div>
		
        <div class="center sliding">
<?php if (isset($_SESSION["username"])) {
	echo $_SESSION["username"];
} else {
	echo ('Login');
}	
?> </div>
        <div class="right">
            <a href="#" class="link icon-only open-panel"><i class="icon icon-bars"></i></a>
        </div>
    </div>
</div>
	
<?php
	include("config.php");
	//include("header.html");

if (isset($_GET['uname'])) {
	echo $_GET['uname'];
	$_SESSION["username"] = $_GET['uname'];#bool
}

$set = isset($_SESSION["username"]); //auth
echo ('
<div class="pages">
    <div  class="page">
        <div class="page-content">
            <div class="content-block">');
echo "the current name is:".$_COOKIE[$cookie_name]."."; // $_COOKIE[$cookie_name];
			
#echo $_GET['uname'];





if ((strlen($_SESSION['username']) < 1)) {
        echo ('
			<p id="name"></p>
			<div id="nameform">
                Please enter your name for food delivery
				<form name="searchinput" action="" method="post">
				Your name: <input type="text" name="uname"><br>				
				
				</form>	
				
				<button type="button" onclick="saveUser()">Save Name</button>
		</div>
		');
} 

#logout

   
   
 ?>


