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
	
	$_SESSION["auth"] = (false);
?>
