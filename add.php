<?php
include("sql.admin.php"); //does this cause probelms?
$a = ($_POST['gArray']);
$imgaddr = $a[1];//updated in uploader should be clean now
echo (substr($imgaddr, 0, 4));
if(substr($imgaddr, 0, 4) != "img/"){
	$imgaddr = substr($a[1], strrpos($a[1], '\\') + 1);
	$imgaddr = "img/" .$imgaddr;
}
$iValues = "( null,'".$a[0]."','".$imgaddr."',".$a[2].','.$a[3].','.$a[4].','.$a[5].','.$a[6].','.$a[7].','.$a[8].','.$a[9].','.$a[10] .', 1 )';

$sql = "INSERT INTO `game_data`(`id`, `gamename`, `embedthumbnail`, `genera1`, `genera2`, `mechanic1`, `mechanic2`, `idealplyer`, `minplyer`, `maxplyer`, `playtimemin`, `playtimeusual`, `visible`) VALUES". $iValues ;

if (mysqli_query($db, $sql)) { #is query on sql, runs when called
	echo "New game stored successfully!";#
} else {
	echo "Error";
}
#SELECT id FROM game_data WHERE gamename LIKE 'Gloomhaven'
$newid = mysqli_fetch_assoc(mysqli_query($db,"SELECT `id` FROM `game_data` WHERE gamename LIKE'".$a[0]."'"));
$sqldes = "INSERT INTO `description`(`id`, `engdes`, `thaides`) VALUES (".$newid['id'] .",'". $a[11] ."',' tbedit ')" ;#

if (mysqli_query($db, $sqldes)) { #is query on sql, runs when called
	echo "";#'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
} else {
	echo "description Error";
}




?>