<?php
	include("config.php");
//checking if form has been submitted and converting to local variables
//$viewid = (isset($_GET['viewid']) ? $_GET['viewid'] : ' ');
if (isset($_GET['uname'])) {
	#later update this to look in database so it can be altered easily
	$_SESSION["username"] = $_GET['uname'];#bool
	echo "username is: ";
	echo $_SESSION["username"];
} 
   
 ?>


