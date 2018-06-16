<!-- We don't need a full layout in this file because this page will be parsed with Ajax. -->
<?php
	//session_start(); 
	//if(!isset($db)){
	include("config.php");
	//}
	//session_start();
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
   $sql = "SELECT * FROM food WHERE id LIKE ($viewid)"; #is string
   $result = mysqli_query($db,$sql); #should only be one row
   #echo mysqli_num_rows($result);
   $str = 'hi';

   
	if( mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
			$myarray = $row; #This is super janky.
			$gid = $myarray['id'] ;
			$gamename = $myarray['fname'] ;
			$imgurl = $myarray['img_url'];
			$bhat = $myarray['bhat'];
			#$pnumrange = ($myarray['minplyer']. ' to '.$myarray['maxplyer']);
			
			#$timeresult = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `time` WHERE id ='". $myarray['playtimeusual']."'"));
			#$plytm = $timeresult['trange'];
			
			#$mechresult1 = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `mechanics` WHERE id ='". $myarray['mechanic1']."'"));
			#$mechresult2 = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `mechanics` WHERE id ='". $myarray['mechanic2']."'"));
			#$mech = ($mechresult1['mech'].', '.$mechresult2['mech']);
			
			#$genraresult1 = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `genera` WHERE id ='". $myarray['genera1']."'"));
			#$genraresult2 = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `genera` WHERE id ='". $myarray['genera2']."'"));
			#$genera = ($genraresult1['genera'].', '.$genraresult2['genera']);
			
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
			
			if($_SESSION["lan"] == "en"){
				$des = $myarray['engdes'];
			}else{
				$des = $myarray['thaides'];
			}
			#echo $myarray['thaides'];
		}   
	}else{
		$engdes =$thaides = ('');
		#echo('<br>No game in decription database for ID: ') . $viewid . ('<br>');
	}
	
?>
<head>

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
					<script>
					var $viewid= (<?php echo $viewid; ?>);
					console.log($viewid);
					</script>
				<ul><!--
				--><strong><li><?php echo $gamename; ?></li><!--
				
				--><li>Cost: <?php echo $bhat; ?> baht</li>
				</ul>
				
				<button type="button" onclick="orderItem(<?php echo $viewid; ?>)">Order This Item</button>
				
				<?php if (isset($_COOKIE[$cookie_name])) {
					echo ("<br>Hello ".$_COOKIE[$cookie_name]);
				} else {
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
				?>
                <p class="clear"><?php echo $engdes; ?></p>
            </div>
        </div>
    </div>
</div>
