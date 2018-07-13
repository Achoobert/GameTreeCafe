
<?php
include("sql.admin.php");
$a = ($_POST['gArray']);

#C:\fakepath\29791949_247105115833344_1872063849327230976_n.jpg
#

#0   document.getElementById('fileToUpload').value,
#1   newinput.name.value,
#2   newinput.bhat.value,
#3   newinput.type.value,
#4   newinput.des.value,] )" value="Save New Menue Item">



//$imgaddr = substr($a[0], strrpos($a[0], '\\') + 1);
//$imgaddr = "img/" .$imgaddr;
$imgaddr = $a[0];
echo (substr($imgaddr, 0, 4));
/* if(substr($imgaddr, 0, 4) != "img/"){
	$imgaddr = substr($a[0], strrpos($a[0], '\\') + 1);
	$imgaddr = "img/" .$imgaddr;
} */

#INSERT INTO `food`(`id`, `bhat`, `fname`, `img_url`, `type`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])

$iValues = ("(null,'".$a[2]."', '".$a[1]."', '".$imgaddr."', '".$a[3]."','".$a[4]."')");

//add new
$sql = "INSERT INTO `food`(`id`, `bhat`, `fname`, `img_url`, `type`, `des`) VALUES". $iValues ;
//edit existing
if($a[5] != ""){
	$sql = "UPDATE `food` SET  `bhat`= '".$a[2]."', `fname`= '".$a[1]."', `img_url`= '".$imgaddr."', `type`= '".$a[3]."', `des`= '".$a[4]."' WHERE `id` = ".$a[5]."";
}


if (mysqli_query($db, $sql)) { #is query on sql, runs when called
	echo ("New game stored successfully!");#'sucessfully ordered a (sqlqery'food where like viewid') for table TNUM
} else {
	echo "Error";
}

?>