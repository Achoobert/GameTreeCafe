<!-- We don't need a full layout in this file because this page will be parsed with Ajax. -->

<!-- Top Navbar-->
    <script src="js/jquery.js"></script> 
    <script src="js/jquery.form.js"></script> 
	<script type="text/javascript" src="js/jquery.cookie.min.js"></script>

<?php
	include("config.php");
	include("header.html");

//checking if form has been submitted and converting to local variables
if (isset($_POST['submit'])) {
	$credentials = array($_POST['uname'], $_POST['pword']);
	#later update this to look in database so it can be altered easily
	$_SESSION["auth"] = ($credentials === array('admin', 'password'));#bool
}

$auth = $_SESSION["auth"];

#echo $_POST['uname'];
switch ($auth) {
    case false:
        echo ('
<div class="pages">
    <div  class="page">
        <div class="page-content">
            <div class="content-block">
                <p>please login</p>
				<form action="'. $_SERVER['PHP_SELF'] .'" method="post">
				Username: <input type="text" name="uname"><br>
				Password: <input type="password" name="pword"><br>
				<input type="submit" name="submit" value="GO">
				</form>	
		
		');
        break;
    case true:
        include('edit_game.php');
		
        break;
    case label3:
        echo ('please login');
        break;
    default:
        echo ('please login');
} 

#logout

   
   
 ?>


