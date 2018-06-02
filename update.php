
<?php
include("config.php");
$a = ($_POST['gArray']);

#C:\fakepath\29791949_247105115833344_1872063849327230976_n.jpg
#\
$sqlD = "SELECT * FROM `game_data` WHERE `gamename` like '".$a[0]."'";
if (mysqli_query($db, $sqlD)) { #is query on sql, runs when called
	$sqlD = "DELETE FROM  `game_data` WHERE `gamename` like '".$a[0]."'";
	if (mysqli_query($db, $sqlD)) { #is query on sql, runs when called
	echo "Old data cleared!";#'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
	}
}

$imgaddr = substr($a[1], strrpos($a[1], '\\') + 1);
$imgaddr = "uploads/" .$imgaddr;

$iValues = "( null,'".$a[0]."','".$imgaddr."',".$a[2].','.$a[3].','.$a[4].','.$a[5].','.$a[6].','.$a[7].','.$a[8].','.$a[9].','.$a[10] .', 1 )';

$sql = "INSERT INTO `game_data`(`id`, `gamename`, `embedthumbnail`, `genera1`, `genera2`, `mechanic1`, `mechanic2`, `idealplyer`, `minplyer`, `maxplyer`, `playtimemin`, `playtimeusual`, `visible`) VALUES". $iValues ;

if (mysqli_query($db, $sql)) { #is query on sql, runs when called
	echo "New game stored successfully!";#'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
} else {
	echo "Error";
}
#SELECT id FROM game_data WHERE gamename LIKE 'Gloomhaven'
$newid = mysqli_fetch_assoc(mysqli_query($db,"SELECT `id` FROM `game_data` WHERE gamename LIKE'".$a[0]."'"));
$sqldes = "INSERT INTO `description`(`id`, `engdes`, `thaides`) VALUES (".$newid['id'] .",'". $a[11] ."',' tbedit ')" ;#([value-1],[value-2],[value-3])
#echo $sql;

if (mysqli_query($db, $sqldes)) { #is query on sql, runs when called
	echo "";#'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
} else {
	echo "description Error";
}




?>