<!-- We don't need a full layout in this file because this page will be parsed with Ajax. -->

<!-- Top Navbar-->
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

			
#echo $_GET['uname'];
switch ($set) {
    case false:
        echo ('
			<p id="name">
                <p>Please enter your name for food delivery</p>
				<form name="searchinput" action="" method="post">
				Your name: <input type="text" name="uname"><br>				
				
				</form>	
				
				<button type="button" onclick="saveUser()">Save Name</button>
		</p>
		');
        break;
    case true:
        echo $_SESSION["username"];
		//include('view_food.php');
		
        break;
    case label3:
        echo ('please login');
        break;
    default:
        echo ('please login');
} 

#logout

   
   
 ?>


