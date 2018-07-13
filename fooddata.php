<?php
	include("config.php");
	$viewid = '9';
	if (isset($_GET['viewid'])) {
		$viewid = $_GET['viewid'];
	}
	
	$result = [];
	
   $sql = "SELECT * FROM food WHERE id LIKE ($viewid)"; #is string
   $result = mysqli_query($db,$sql); #should only be one row  
	if( mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
			$myarray = $row; 
			echo implode(',',$myarray);
			// save the JSON encoded array
			//$jsonData = json_encode($myarray); 
			//echo ($jsonData);			
		}   
	} else{
		//$myarray =$gamename =$imgurl = $plytm = ('Error not found');
		echo('error') . $viewid . ('<br>');
	}
	
?>