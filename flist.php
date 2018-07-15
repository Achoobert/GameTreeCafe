

<?php
#?viewid='1'&submit=GO'
	if(!isset($db)){
		include("config.php");
	}
   #include("config.php");
   //session_start();

	$viewid = (isset($_GET['viewid']) ? $_GET['viewid'] : ' ');
	$fname = (isset($_GET['fname']) ? $_GET['fname'] : ' ');#$fname = $_GET['fname'];
	#$mech = (isset($_GET['mech']) ? $_GET['mech'] : ' ');
	#echo ('mech is: ' .$mech . '<br>');
	#$genre = (isset($_GET['genre']) ? $_GET['genre'] : ' ');		
	$bhat = (isset($_GET['bhat']) ? $_GET['bhat'] : ' ');
	$type = (isset($_GET['type']) ? $_GET['type'] : ' ');
		#$viewid = $_GET['viewid'];
	echo ('<head><link rel="stylesheet" href="css/styles.css"></head>');
	 
	#SELECT `id`, `bhat`, `fname`, `img_url`, `type` FROM `food` WHERE 1
	$searchparam = ' WHERE `visible` =1 AND';
	$and = '';
	if($fname != ' '){
		$searchparam = ($searchparam . "`fname` LIKE $fname");
		$and = ' AND ';
	}
	if($viewid != ' '){
		$searchparam = ($searchparam .$and. "`id` = ".$viewid."");
		$and = ' AND ';
	}
	if($type != ' '){
		$searchparam = ($searchparam .$and. "`type` = ".$type."");
		$and = ' AND ';
	}
	if($bhat != ' '){
		$searchparam = ($searchparam .$and. "`bhat` = ".$bhat."");
		
	}
	#echo ('"'.$searchparam.'"');
	
	
	#SELECT * FROM `game_data` WHERE `id` = 2 ORDER BY `img_url`
   $sql = ("SELECT * FROM `food` " . ($searchparam==' WHERE ' ? '' : $searchparam) ); #is string
   #echo ('The query reads:'.$sql);
   $result = mysqli_query($db,$sql); #is query on sql, runs when called
   #echo mysqli_num_rows($result);
   
	if( mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
			$myarray = $row;
			/* echo var_dump($myarray);
			/* list($id, $gamename, $img_url, $g1, $g2, $m1, $m2, $iplay, $minplay, $maxplay, $plytimmin, $plytimusu) = $myarray; 
			echo "$gamename is $id and $minplay makes it special.\n";
			echo ('<br>hi<br>');
			echo var_dump($num);
			echo var_dump($row);
			echo ('<br>hi<br>');
			#$curow = mysqli_query($db,("SELECT * FROM 'game_data' WHERE 'id' =". ($row['id']))); 
			echo var_dump($curow);*/
	
			echo ( "<a href='view_food.php?viewid=".($myarray['id'])."&submit=GO'><div class='floating-box'><img src='".$myarray['img_url']."' alt='".$myarray['img_url']."' style='width:100%;'></a></div>"); #needs a style set inline in order to obey the stylesheet. Actually 40%
			#$timeresult = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `time` WHERE id ='". $myarray['playtimeusual']."'"));
			#$trange = $timeresult['trange'];
			#$prange = ($myarray['minplyer'] ." to ". $myarray['maxplyer']);
			echo "<p> <a href='view_food.php?viewid=".($myarray['id'])."&submit=GO'>". $myarray['fname'] . '<br>' . $myarray['bhat']. ' baht<br>' 
			." </p>";
			echo('</a><br><p class="clear" style="clear: both;"></p>'); 				#link to the viewgame page, with a GO
			
		}   
	}
	else{
	   echo '<h1>No items match your input data</h1>';
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