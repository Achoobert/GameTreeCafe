<?php
//this is admin file for hide/delete food, a user's tab post-payment, and hide/delete games
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'apacheserver'); #admin deleteing priveledges
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
	$uname = (isset($_GET['uname']) ? $_GET['uname'] : '');
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

if( isset($_GET['foodedit'])){
	$edit = ($_GET['foodedit']);
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
	if ($edit == 2) { #depreciated?
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
	if ($edit == 3) { #http://localhost/sql.admin.php?foodedit=3&id=34&vis=0&submit=GO
		#UPDATE `game_data` SET `visible`= 1 WHERE `id` = 2
		$sql = "UPDATE `food` SET `visible`= ". $vis ." WHERE `id` = ". $id;
		//echo ($sql);
		#echo ($item);
		if (mysqli_query($db, $sql)) { #is query on sql, runs when called
			echo "item ".$id." is set to visible state: ". $vis; #'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
		} else {
			echo "Error not hidden";
		}

	}	
	if ($edit == 4) { #edit: delete a user
		#UPDATE `game_data` SET `visible`= 1 WHERE `id` = 2
		$uname = ($_GET['uname']);
		$sql = "DELETE FROM `orders` WHERE `uname` = '". $uname."'";
		//echo ($sql);
		#echo ($item);
		if (mysqli_query($db, $sql)) { #is query on sql, runs when called
			echo "user ".$uname."\'s tab has been cleared: ". $vis;
		} else {
			echo "Error not deleted";
		}

	}	
	if ($edit == 5) { #edit: delete a food item
		$id = ($_GET['id']);
		$sql = "DELETE FROM `food` WHERE `id` = ". $id."";
		//echo ($sql);
		#echo ($item);
		if (mysqli_query($db, $sql)) { #is query on sql, runs when called
			echo "item ".$id." is permenently gone:"; #'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
		} else {
			echo "Error not deleted";
		}

	}	
}	
if( isset($_GET['edit'])){
		
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
	if ($edit == 4) { #edit: delete
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
		$sql = "INSERT INTO `orders` (`id`, `time_ord`, `tnum`, `item`, `uname`) VALUES (NULL, '". date("g:i") ."', '".$tnum."', '".$item."', '".$uname."')"; //date("g:i")
		#echo ($item);
		#to prevent accidental entries
		if ($tnum == 0){
			echo "No order placed. Please enter valid number";
		}
		elseif (mysqli_query($db, $sql)) { #is query on sql, runs when called
			echo "Order will be delivered to ".$uname." at table ".$tnum." soon!";#'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
		} else {
			echo "Error";
		}

	} 
	#stopgap until I figure out prepared statments?
	if ($ord == 3) { #ord tnum viewid
		
		#UPDATE `orders` SET `visible`=[value-5] WHERE `tnum`  =
		$sql = "UPDATE `orders` SET `visible`=0 WHERE `tnum`  = ".$tnum;
		
		#echo ($item);
		if (mysqli_query($db, $sql)) { #is query on sql, runs when called
			$page = '/view_orders.php';
			echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
			echo "Table ".$tnum." done!"; #'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
		} else {
			echo "Error";
		}

	} 
	#stopgap until I figure out prepared statments?
	if ($ord == 2) { #ord tnum viewid
		
		#"update and hide FROM `orders` WHERE `id`  = 10;
		#sql.php?ord=2&oid=11&tnum=3&submit=GO
		$sql = "UPDATE `orders` SET `visible`=0 WHERE `id`  = ".$oid;
		#echo ($item);
		if (mysqli_query($db, $sql)) { #is query on sql, runs when called
			$page = '/view_orders.php';
			echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
			echo "Order ".$oid." done!";#'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
		} else {
			echo "Error";
		}

	}
	if ($ord == 4) { #USER edit: hide/cancell
		$sql = "UPDATE `orders` SET `visible`= '0', `Cancel`= '1' WHERE `id` = ". $oid;
		#echo ($sql);
		#echo ($item);
		if (mysqli_query($db, $sql)) { #is query on sql, runs when called
			echo "item ".$oid." is cancelled: ". $vis; #'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
		} else {
			echo "Error ".$oid." not hidden";
		}
	}

}	

?>
