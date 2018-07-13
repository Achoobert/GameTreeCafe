<?php
include("sql.admin.php"); //does this cause probelms?
$a = ($_POST['gArray']);
/* 
0 document.getElementById('storeid').innerHTML,
1 document.getElementById('name').value,
2 document.getElementById('imgurl').innerHTML,
3 document.getElementById('yturl').value,
4 document.getElementById('maxply').value,
5 document.getElementById('ply').value,
6 document.getElementById('minply').value,
7 document.newinput.complex.value,
8 document.newinput.time.value,
 */

$imgaddr = $a[2];//updated in uploader should be clean now
//echo (substr($imgaddr, 0, 4));
/* if(substr($imgaddr, 0, 4) != "img/"){
	$imgaddr = substr($a[1], strrpos($a[1], '\\') + 1);
	$imgaddr = "img/" .$imgaddr;
} */
$iValues = "( null,'$a[1]','$imgaddr','$a[3]',$a[7],$a[5],$a[6],$a[4],$a[8], $a[9], 1 )";

			//null,'name','img/1.png','der.com','der.com',3,2,2,4,3, 1 )

$sql = "INSERT INTO `game_data`(`id`, `gamename`, `embedthumbnail`, `youtube`, `complex`, `idealplyer`, `minplyer`, `maxplyer`, `playtimeusual`, `des`, `visible`) VALUES". $iValues ;

if($a[0] != ""){
	//UPDATE `game_data` SET `gamename`=[value-2],`embedthumbnail`=[value-3],`youtube`=[value-4],`complex`=[value-5],`idealplyer`=[value-6],`minplyer`=[value-7],`maxplyer`=[value-8],`playtimeusual`=[value-9],`visible`=[value-10] WHERE 1
	$sql = "UPDATE `game_data` SET `gamename`='".$a[1]."', `embedthumbnail`='".$imgaddr."', `youtube`='".$a[2]."', `complex`='".$a[3]."', `idealplyer`='".$a[7]."', `minplyer`='".$a[5]."', `maxplyer`='".$a[6]."', `playtimeusual`='".$a[4]."',`des`='".$a[9]."' `visible`=1 WHERE `id` = ".$a[0];
}
echo $sql;
if (mysqli_query($db, $sql)) { #is query on sql, runs when called
	echo ('  '.$a[1]." stored successfully!");#
} else {
	echo "Error";
}






?>