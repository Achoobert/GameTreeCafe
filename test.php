<!DOCTYPE html>
<html>

<?php

// Start the session
session_start();
$_SESSION["favcolor"] = "green";
$_SESSION["gid"] = 2;
#echo "Session variables are set.";


$bool = false;
$num = 3 + 4;
$str = "A string here";
$gamename = 'Game Tree Cafe Home'
?>

<script type="text/javascript">
// boolean outputs "" if false, "1" if true
var bool = "<?php echo $bool ?>"; 

// numeric value, both with and without quotes
var num = <?php echo $num ?>; // 7
var str_num = "<?php echo $num ?>"; // "7" (a string)

var str = "<?php echo $str ?>"; // "A string here"




function viewGame()
{
	<?php echo("view_game.php");?>
	 <?php #include("view_game.php");?>
	return "http://www.google.com";
}






</script>

<!-- EXAMPLE CODE -->
<?php
   include("config.php");
   #session_start();
   #echo phpinfo();
    
   $sql = "SELECT * FROM game_data"; #is string
   $result = mysqli_query($db,$sql);
   #echo mysqli_num_rows($result);
   
	if( mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
			#$game_array[] = (object) array(($row['id']), ($row['gamename']));
			#echo "newline";
			#echo " <a href=\"view_game.php?gameid=",urlencode((string)$game_array[0]) ,">", (string)$game_array[1] ,"</a>";
			#$gamename = $row['gamename'];
			#echo " Game name ", $row['gamename'], " yes? <br>";
		}   
	}
	else{
	   echo 'it brings no data....';
	}
	
	$query = "SELECT 'picid-' FROM 'testtable' WHERE 'id' = 1";
	echo (mysqli_query($db,$query, MYSQLI_USE_RESULT));
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      echo "I'm in the if!"; 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
	  
	// Get cURL resource
	$curl = curl_init();
	// Set some options - we are passing in a useragent too here
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'http://testcURL.com/?item1=value&item2=value2',
		CURLOPT_USERAGENT => 'User Agent X'
	));
	// Send the request & save response to $resp
	$resp = curl_exec($curl);
	// Close request to clear up some resources
	curl_close($curl);
   }
   #var_dump(function_exists('curl_version'));
?>
<!-- END EXAMPLE CODE -->
<head>
    <!--
        Customize this policy to fit your own app's needs. For more guidance, see:
            https://github.com/apache/cordova-plugin-whitelist/blob/master/README.md#content-security-policy
        Some notes:
            * gap: is required only on iOS (when using UIWebView) and is needed for JS->native communication
            * https://ssl.gstatic.com is required only on Android and is needed for TalkBack to function properly
            * Disables use of inline scripts in order to mitigate risk of XSS vulnerabilities. To change this:
                * Enable inline JS: add 'unsafe-inline' to default-src
        -->
    <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *">

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
            <p>Left panel content goes here</p>
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
                    <div class="center sliding"><?php echo $gamename; ?></div>
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
                            <h1>Gloomhaven</h1>
							
							<p> <a href='view_game.php?viewid=9&submit=GO'>view game</a> </p>
							
							<button onclick="viewGame()">View me</button>
							<a href="javascript:document.location.href=getUrl();">Click here</a>
							
							
							<img src="/img/gloomh.jpg" alt="Gloomhaven1" >
							<!--<img src="/img/gloomh.jpg" alt="Gloomhaven1" >
							
							<img src='https://i.imgur.com/MPbDIXg.jpg' alt='Gloomhaven1'>
							
							<img src="https://cf.geekdo-images.com/medium/img/YHVaQODdRHLSsvKsjYwX4rO9Z-A=/fit-in/500x500/filters:no_upscale()/pic3552336.jpg" alt="Gloomhaven1" >
							-->
							<p>Test Hello World page by Isaac :D</p>
							<p>
							<a href="view_game.php" class="link">view game</a> <br>
							<a href="edit_game.php" class="link">test link</a> <br>
							<a href="edit_game.php" class="link">edit game</a><br>
							<?php
							echo "I'm Learning PHP!";
							?>
							</p>
							 <p><strong>Generate a list:</strong>
							 <?php
							  for ($number = 1; $number <= 10; $number++) {
								if ($number <= 9) {
									echo $number . ", ";
								} else {
									echo $number . "!";
								}
							  }
							  ?>}; 
							  
							   </p>
							   
							   <p><strong>Things you can do:</strong>
							  <?php
								$things = array("Talk to databases",
								"Send cookies", "Evaluate form data",
								"Build dynamic webpages");
								foreach ($things as $thing) {
									echo "<li>$thing</li>";
								}
								
								unset($thing);
							  ?>
							  <?php
   #include("config.php");
   #session_start();
    
   $sql = "SELECT * FROM game_data"; #is string
   $result = mysqli_query($db,$sql); #is query on sql, runs when called
   #echo mysqli_num_rows($result);
   
	if( mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
			$myarray = $row;
			/* echo var_dump($myarray);
			/* list($id, $gamename, $embedthumbnail, $g1, $g2, $m1, $m2, $iplay, $minplay, $maxplay, $plytimmin, $plytimusu) = $myarray; 
			echo "$gamename is $id and $minplay makes it special.\n";
			echo ('<br>hi<br>');
			echo var_dump($num);
			echo var_dump($row);
			echo ('<br>hi<br>');
			#$curow = mysqli_query($db,("SELECT * FROM 'game_data' WHERE 'id' =". ($row['id']))); 
			echo var_dump($curow);*/
			
			$hi = 'Hey';
			echo ("<br>$hi<br>");
			
			#echo ( "<img src='". $myarray['embedthumbnail'] ."' alt='Gloomhaven1'>"); #
			$imgurl = $myarray['embedthumbnail'];
			echo ( "<div class='floating-box'><img src='".$imgurl."' alt='Gloomhaven1' style='width:100%;'></div>"); #
			
			#<a href="view_game.php?gameid=2>Gloomhaven</a>
			echo "<p> <a href='view_game.php?gameid=".($myarray['id']) ."'>". $myarray['gamename'] . " </a></p>";
			echo('<br><a href="view_game.php">About app</a><br><p class="clear"></p>');
			#$gamename = $row['gamename'];
			#echo " Game name ", $row['gamename'], " yes? <br>";
		}   
	}
	else{
	   echo 'it brings no data....';
	}
	  
	$query = "SELECT 'picid-' FROM 'testtable' WHERE 'id' = 1";
	echo (mysqli_query($db,$query, MYSQLI_USE_RESULT));
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      echo "I'm in the if!"; 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
							</p>
							   
                            <!-- Link to another page -->
                            <a href="about.html">About app</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bottom Toolbar-->
            <div class="toolbar">
                <div class="toolbar-inner">
                    <!-- Toolbar links -->
                    <a href="#" class="link">Link 1</a>
                    <a href="#" class="link">Link 2</a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="lib/framework7/js/framework7.min.js"></script>
    <script type="text/javascript" src="js/my-app.js"></script>
</body>

</html>