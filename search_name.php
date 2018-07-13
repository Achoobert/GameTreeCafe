<?php
#http://localhost/search_name.php?type=%27food%27&name='Leo%20Beer'
if(!isset($db)){
	include("config.php");
}
$type = (isset($_GET['type']) ? $_GET['type'] : '');
$name = (isset($_GET['name']) ? $_GET['name'] : '');
$id;
$searchArea = 'unset';		
if ($type == "'food'") {
	$searchArea =  ("`food` WHERE `fname`");
}else if ($type == "'game'") {
	$searchArea = ("`game_data` WHERE `gamename`");
}
$sql = ("SELECT * FROM ".$searchArea." = " . $name); 
//echo ($sql);
$result = mysqli_query($db,$sql); 
if(isset($_GET['type'],$_GET['name'])){
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$id = ($row['id']);
		}
	echo ($id);
	}
}else{
   echo '1';
}
?>
