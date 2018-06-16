<?php
	#session_start();
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
	
	if (isset($_SESSION["username"])) {
	echo ("<script> console.log('The uname is:".$_SESSION["username"]."');</script>");
	} else {
		echo ("<script> console.log('Not saved session');</script>)");
	}	
	
	//<script> console.log('onload');</script>
	
	$_SESSION["auth"] = (false);
?>
