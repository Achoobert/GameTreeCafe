
<?php
 
	//include("config.php");

	//checking if form has been submitted and converting to local variables
//$viewid = (isset($_GET['viewid']) ? $_GET['viewid'] : ' ');
/* if (isset($_GET['uname'])) {
	#later update this to look in database so it can be altered easily
	$_SESSION["username"] = $_GET['uname'];#bool
	//echo ("<script> console.log('The uname is:".$_SESSION["username"]."');</script>");
	//echo "username is: ";
	//echo $_SESSION["username"];
	
}  
   

if (isset($_SESSION["username"])) {
	echo ("<script> console.log('The uname is:".$_SESSION["username"]."');</script>");
} else {
	echo ("<script> console.log('Not saved session');</script>)");
}
*/

$cookie_name = "user";
if (isset($_GET['uname'])){
	$cookie_value = $_GET['uname'];
	setcookie($cookie_name, ';' , $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
	echo "New name is: " . $_GET['uname'];
} 
/* ?>
<html>
<body>
<?php */

?>
