

<?php
#?viewid='1'&submit=GO'
	if(!isset($db)){
		include("config.php");
	}
   if(!isset($_SESSION)){
		session_start();
	}
   #$viewid = $gname = $genre = $ptime = $pnum = '';
	#($db_field['late']==0 ? ' ' : $db_field['late'])
	$viewid = (isset($_GET['viewid']) ? $_GET['viewid'] : ' ');
	$gname = (isset($_GET['gname']) ? $_GET['gname'] : ' ');#$gname = $_GET['gname'];
	$mech = (isset($_GET['mech']) ? $_GET['mech'] : ' ');
	#echo ('mech is: ' .$mech . '<br>');
	$complex = (isset($_GET['complex']) ? $_GET['complex'] : ' ');		
	$ptime = (isset($_GET['ptime']) ? $_GET['ptime'] : ' ');#$ptime = $_GET['ptime'];
	$pnum = (isset($_GET['pnum']) ? $_GET['pnum'] : ' ');#$pnum = $_GET['pnum'];
		#$viewid = $_GET['viewid'];
	echo ('<head><link rel="stylesheet" href="css/styles.css"></head>');
	 
	#SELECT *  FROM `game_data` WHERE `gamename` LIKE 'gna' AND `genera1` = 4 AND `mechanic1` = 3 AND `idealplyer` = a AND `playtimemin` = 2 ORDER BY `embedthumbnail`  ASC LIMIT 0, 25
	#(if !'') 
	# ...`gamename` LIKE `gna` AND...
	$searchparam = ' WHERE ';
	$and = '';
	if($gname != ' '){
		$searchparam = ($searchparam . "`gamename` LIKE $gname");
		$and = ' AND ';
	}
	if($viewid != ' '){
		$searchparam = ($searchparam .$and. "`id` = ".$viewid." AND ");
		#$and = ' AND ';
	}
	if($complex != ' '){
		$searchparam = ($searchparam .$and. "`complex` = ".$complex." AND ");
		#$and = ' AND ';
	}
	if($ptime != ' '){
		$searchparam = ($searchparam .$and. "`playtimeusual` = ".$ptime." AND ");
		#$and = ' AND ';
	}
	if($pnum != ' '){
		$pquery = (" ((`idealplyer` =".$pnum.") OR ( `minplyer` <= ".$pnum." AND `maxplyer` >=". $pnum."))");
		$searchparam = ($searchparam .$and. $pquery." AND ");
	}
	//echo ('<script>console.log("'.$ptime.'")</script>');
	//SELECT * FROM `game_data` WHERE `playtimeusual` = " 12" AND ((`idealplyer` =" 4") OR ( `minplyer` < " 4" AND `maxplyer` >" 4"))
	//echo ('"'.$searchparam.'"');
	
	
	#SELECT * FROM `game_data` WHERE `id` = 2 ORDER BY `embedthumbnail`
   $sql = ("SELECT * FROM `game_data` " . $searchparam . " `visible` = true ORDER BY `idealplyer`"); #is string
   #echo ('The query reads:'.$sql);
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
	
			echo ( "<a href='view_game.php?viewid=".($myarray['id'])."&submit=GO'><div class='floating-box'><img src='".$myarray['embedthumbnail']."' alt='".$myarray['embedthumbnail']."' style='width:100%;'></a></div>"); #needs a style set inline in order to obey the stylesheet. Actually 40%
			$timeresult = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `time` WHERE id ='". $myarray['playtimeusual']."'"));
			$trange = $timeresult['trange'];
			$prange = ($myarray['minplyer'] ." to ". $myarray['maxplyer']);
			echo "<p> <a href='view_game.php?viewid=".($myarray['id'])."&submit=GO'>". $myarray['gamename'] . " <br>". $trange . "<br>Players: ". $prange. " </p>";
			echo('</a><br><p class="clear" style="clear: both;"></p>');#link to the viewgame page, with a GO
			#$gamename = $row['gamename'];
			#echo " Game name ", $row['gamename'], " yes? <br>";
		}   
	}
	else{
	   echo '<h1>No games match your input data</h1>';
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