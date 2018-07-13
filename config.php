<?php
	#session_start();
	include("login.get.php");
	
	
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'apacheserver');
   define('DB_PASSWORD', 'iamapache12');
   define('DB_DATABASE', 'gametree_games');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
	if (!$db) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$num = 0;
	
	session_start();
	//$_SESSION["lan"] = "en";
	//$_SESSION["gid"] = 2;
	//('cookie', $_COOKIE) 
	if (isset($_COOKIE[$cookie_name])) {
	//echo ("<script> console.log('The uname is:".$_COOKIE[$cookie_name]."');</script>");
	} else {
		//echo ("<script> console.log('No cookie');</script>");
	}	
	
	//<script> console.log('onload');</script>
	
	//
	
	$_SESSION["auth"] = (false);
?>
