<!-- We don't need a full layout in this file because this page will be parsed with Ajax. -->
<?php
	include("config.php");
	#session_start();
	#Test crossover

   	#get the ID of the game to be viewed
	$viewid = '9';
	if (isset($_SESSION["gid"])) {
		$viewid = $_SESSION["gid"];
		#echo ('ID is: ') . $viewid . ('<br>');
	}
	if (isset($_GET['viewid'])) {
		$viewid = $_GET['viewid'];
	}

    #SELECT * FROM `gametree_games`.`game_data` WHERE (CONVERT(`id` USING utf8) LIKE '%9%')
   $sql = "SELECT * FROM game_data WHERE id LIKE ($viewid)"; #is string
   $result = mysqli_query($db,$sql); #should only be one row
   #echo mysqli_num_rows($result);
   $str = 'hi';

   
	if( mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
			$myarray = $row; #This is super janky.
			$gid = $myarray['id'] ;
			$gamename = $myarray['gamename'] ;
			$imgurl = $myarray['embedthumbnail'];
			$plytm = $myarray['playtimeusual'];
			#echo " Game name ", $row['gamename'], " yes? <br>";
		}   
	} else{
		$myarray =$gamename =$imgurl = $plytm = ('Error not found');
		echo('<br>No game in database for ID: ') . $viewid . ('<br>');
	}
	$sql1 = "SELECT * FROM description WHERE id LIKE ($viewid)"; #is string
	$rsltdes = mysqli_query($db,$sql1); #should only be one row
	
	if( mysqli_num_rows($rsltdes)>0){
		while($row = mysqli_fetch_array($rsltdes, MYSQLI_ASSOC)) {
			#echo ('working');
			#MYSQLI_USE_RESULT
			$myarray = $row; #This is super janky.
			$engdes = $myarray['engdes'] ;
			$thaides = $myarray['thaides'];
			#echo $myarray['thaides'];
		}   
	}else{
		$engdes =$thaides = ('Error description not found');
		echo('<br>No game in decription database for ID: ') . $viewid . ('<br>');
	}

?>
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


    <link rel="stylesheet" href="css/styles.css">
</head>

<!-- Top Navbar-->
<div class="navbar">
    <div class="navbar-inner">
        <div class="left">
            <a href="#" class="back link">
                <i class="icon icon-back"></i>
                <span>Back</span>
            </a>
        </div>
		
        <div class="center sliding"><?php echo $gamename; ?></div>
        <div class="right">
            <a href="#" class="link icon-only open-panel"><i class="icon icon-bars"></i></a>
        </div>
    </div>
</div>


<div class="pages">
    <div data-page="view_page" class="page">
        <div class="page-content">
            <div class="content-block">
				<div class="floating-box"><img src='<?php echo $imgurl; ?>' alt='<?php echo $gamename; ?>' style="width:100%;"></div>
				
				<ul><!--
				--><li>Title: <?php echo $gamename; ?></li><!--
				--><li>Play time: <?php echo $plytm; ?> min</li><!--
				--><li>play time <?php echo $plytm; ?></li><!--
				--><li>player count: <?php echo $plytm; ?></li><!--
				--><li>play time <?php echo $plytm; ?></li>
				--><li>Game Id: <?php echo $gid; ?></li>
				</ul>
                <p class="clear"><?php echo $engdes; ?></p>
				
				<p> ขึ้นอยู่กับรัมมี่ที่มีชื่อว่า eros lectus.</p>
				
				<--! asdasdasd -->
				
				<!--<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
				id: <input type="text" name="viewid"><br>
				<input type="submit" name="submit" value="GO">
				</form>-->
				
				
            </div>
        </div>
    </div>
</div>
