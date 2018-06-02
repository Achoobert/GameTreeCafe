<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'apacheserver'); #should be a special admin type account with editing preveleges
   define('DB_PASSWORD', 'iamapache12');
   define('DB_DATABASE', 'gametree_games');
   #here is where paramiterized queries start
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
	if (!$db) {
		die("Connection failed: " . mysqli_connect_error());
	}
#case orders
	#has type='ord'
	$ord = (isset($_GET['ord']) ? $_GET['ord'] : '');
	$tnum = (isset($_GET['tnum']) ? $_GET['tnum'] : '');
	$item = (isset($_GET['item']) ? $_GET['item'] : '');
	$oid = (isset($_GET['oid']) ? $_GET['oid'] : '');
#case new:
	#input is gname, genre genre, ptime, pnum, pnumrange, mech mech, vis
	$viewid = (isset($_POST['viewid']) ? $_POST['viewid'] : '');
	$gname = (isset($_POST['gname']) ? $_POST['gname'] : '');
	$genre = (isset($_POST['genre']) ? $_POST['genre'] : '');		
	$ptime = (isset($_POST['ptime']) ? $_POST['ptime'] : '');
	$pnum = (isset($_POST['pnum']) ? $_POST['pnum'] : '');
	$mech = (isset($_POST['mech']) ? $_POST['mech'] : '');
	
#case edit
	#input is viewid, UPDATED DATA

#case hide/unhide
	#input is viewid, desired state
	#sql.php?edit=3&id=2&vis=1&submit=GO
	$edit = (isset($_GET['edit']) ? $_GET['edit'] : '');
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	$vis = (isset($_GET['vis']) ? $_GET['vis'] : '');

	#echo ('opening the sql page');



	#Storing Order
/* 	if (isset($_GET['submit'])) {
		$sql = "INSERT INTO 'orders' ('id', 'tnum', 'item') VALUES (NULL, '".$firstname1."', '".$lastname1."')";
		$result = mysqli_query($db,$sql); #is query on sql, runs when called

		echo ("<p>First name: $firstname1</p>
		<p>Last name: $lastname1</p>
		<p>Date of Birth: $dob1</p>
		<p>Sex: $sex1</p>
		<p>Email: $email1</p>");
	}  */
if( isset($_GET['edit'])){
	#stopgap until I figure out prepared statments?
	if ($edit == 1) { #ord tnum viewid
		#INSERT INTO `orders` (`id`, `time_ord`, `tnum`, `item`) VALUES (NULL, CURRENT_TIMESTAMP, '13', '4'); DATE_FORMAT(CURRENT_TIMESTAMP, \"%H:%i\") 
		$sql = "INSERT INTO `orders` (`id`, `time_ord`, `tnum`, `item`) VALUES (NULL, CURRENT_TIMESTAMP, '".$tnum."', '".$item."')";
		#echo ($item);
		if (mysqli_query($db, $sql)) { #is query on sql, runs when called
			echo "New order stored successfully!";#'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
		} else {
			echo "Error";
		}

	} 
	#stopgap until I figure out prepared statments?
	#stopgap until I figure out prepared statments?
	if ($edit == 2) { #ord tnum viewid
		
		#"DELETE FROM `orders` WHERE `id`  = 10;
		#sql.php?ord=2&oid=11&tnum=3&submit=GO
		$sql = "DELETE FROM `orders` WHERE `id`  = ".$oid;
		#echo ($item);
		if (mysqli_query($db, $sql)) { #is query on sql, runs when called
			echo "Order ".$oid." done!";#'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
		} else {
			echo "Error";
		}

	}
	if ($edit == 3) { #edit: hide 
		#UPDATE `game_data` SET `visible`= 1 WHERE `id` = 2
		$sql = "UPDATE `game_data` SET `visible`= ". $vis ." WHERE `id` = ". $id;
		#echo ($sql);
		#echo ($item);
		if (mysqli_query($db, $sql)) { #is query on sql, runs when called
			echo "item ".$id." is visible: ". $vis; #'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
		} else {
			echo "Error not hidden";
		}

	}
}	
if( isset($_GET['ord'])){
	#stopgap until I figure out prepared statments?
	if ($ord == 1) { #ord tnum viewid
		#INSERT INTO `orders` (`id`, `time_ord`, `tnum`, `item`) VALUES (NULL, CURRENT_TIMESTAMP, '13', '4'); DATE_FORMAT(CURRENT_TIMESTAMP, \"%H:%i\") 
		$sql = "INSERT INTO `orders` (`id`, `time_ord`, `tnum`, `item`) VALUES (NULL, CURRENT_TIMESTAMP, '".$tnum."', '".$item."')";
		#echo ($item);
		if (mysqli_query($db, $sql)) { #is query on sql, runs when called
			echo "New order stored successfully!";#'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
		} else {
			echo "Error";
		}

	} 
	#stopgap until I figure out prepared statments?
	if ($ord == 3) { #ord tnum viewid
		
		#"DELETE FROM `orders` WHERE `tnum`  = ".$oid."; or.... DELETE FROM `orders` WHERE `tnum`  = 14;
		$sql = "DELETE FROM `orders` WHERE `tnum`  = ".$tnum;
		#echo ($item);
		if (mysqli_query($db, $sql)) { #is query on sql, runs when called
			echo "Table ".$tnum." done!"; #'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
		} else {
			echo "Error";
		}

	} 
	#stopgap until I figure out prepared statments?
	if ($ord == 2) { #ord tnum viewid
		
		#"DELETE FROM `orders` WHERE `id`  = 10;
		#sql.php?ord=2&oid=11&tnum=3&submit=GO
		$sql = "DELETE FROM `orders` WHERE `id`  = ".$oid;
		#echo ($item);
		if (mysqli_query($db, $sql)) { #is query on sql, runs when called
			echo "Order ".$oid." done!";#'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
		} else {
			echo "Error";
		}

	}
}	
?>

<?php
 /* function dropdown(tname) {
	$sql = "SELECT * FROM $tname"; #is string
	$result = mysqli_query($db,$sql); #is query on sql, runs when called
   if( mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
			foreach($row as $key => $value){
			<option value=echo ("<option value=' ". $key ."'>".$value."</option>"); #
			}
		}   
	}
	else{
	   echo 'no values :( ';
	}
}  */
?>