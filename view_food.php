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
			$vis = $myarray['visible'] ;
			$gamename = $myarray['fname'] ;
			$imgurl = $myarray['img_url'];
			$bhat = $myarray['bhat'];
			$des = $myarray['des'];
		}   
	} else{
		$myarray =$gamename =$imgurl = $plytm = ('Error not found');
		echo('<br>No game in database for ID: ') . $viewid . ('<br>');
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
				<ul>
				<strong><li><?php echo $gamename; ?></li>
				<li>Cost: <?php echo $bhat; ?> baht</li>
				<?php 
				$print = ($des != '' ? ('<li>'.$des.'</li>') : '');
				echo $print;
				$print = (!$vis ? ('<li>hidden</li>') : '');
				echo $print;
				?>
				</ul>
				
				<button type="button" onclick="orderItem(<?php echo $viewid; ?>)">Order This Item</button>
				
				<?php if (isset($_COOKIE[$cookie_name])) {
					//echo ("<br>Hello ".$_COOKIE[$cookie_name]);
				} 
				?>
                <p class="clear"><?//php echo $engdes; ?></p>
            </div>
        </div>
    </div>
</div>
