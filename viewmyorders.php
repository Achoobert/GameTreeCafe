<?php
	include("config.php");
	
	$user =  $_COOKIE[$cookie_name];
?>

<head>
    <!-- Your app title -->
    <title><?php ?></title>
    <link rel="stylesheet" href="lib/framework7/css/framework7.ios.min.css">
    <link rel="stylesheet" href="lib/framework7/css/framework7.ios.colors.min.css">

    <link rel="stylesheet" href="css/styles.css">
</head>
<div class="navbar">
    <div class="navbar-inner">
       <div class="left">
            <a href="#" class="back link">
                <i class="icon icon-back"></i>
                <span>Back</span>
            </a>
        </div>
        <div class="center sliding"><?php echo $user;?>s Orders</div>
        <div class="right">
            <a href="#" class="link icon-only open-panel"><i class="icon icon-bars"></i></a>
        </div>
    </div>
</div>


	
	
<!--This Script auto refreshes the whole page-->
<script type="text/javascript">
  function orderComplete(oid, tnum){
	console.log("order id", oid);
	//var tnum = prompt("Please Enter your table number");
	var appurl = '';
	appurl = appurl.concat("sql.php?ord=2&oid=", oid ,"&tnum=", tnum ,"&submit=GO");
	console.log(appurl);
	var xhr = new XMLHttpRequest();
	// OPEN - type, url/file, async
	xhr.open('GET', appurl, true); //you can just use the var 
	//alert('btn clicked');
	xhr.onload = function(){
		//console.log('onload');
		if(this.status == 200){
			//console.log('status');
			document.getElementById("feedback").innerHTML = (this.responseText);
		}
	}
	xhr.send();
 }
	//document.getElementById("demo").innerHTML = xhr;
	//xhr.send();  
  function tableComplete(table){
	console.log("table", table);
	//var tnum = prompt("Please Enter your table number");
	var appurl = '';
	appurl = appurl.concat("sql.php?ord=3&tnum=", table ,"&submit=GO");
	console.log(appurl);
	var xhr = new XMLHttpRequest();
	// OPEN - type, url/file, async
	xhr.open('GET', appurl, true); //you can just use the var 

	xhr.onload = function(){
		//console.log('onload');
		if(this.status == 200){
			//console.log('status');
			document.getElementById("feedback").innerHTML = (this.responseText);
		}
	}
	//document.getElementById("demo").innerHTML = xhr;
	xhr.send();
}	
  
  
  
</script>

<!-- 
Only active tables should be shown?

display OLDEST FIRST
OLD
(group table)
(group type)
(group item)

OLD 2
(group Tables)
(Group Type)
(group item)

-->

<div class="pages">
    <div data-page="about" class="page">
        <div class="page-content">
            <div class="content-block">
			<?php
			#iterate through active tables
			#then, iterate through relivant orders in each table
			$tnumsql = "SELECT DISTINCT `tnum` FROM `orders` WHERE `visible` = 1 AND `uname` = ".$user." ORDER BY `tnum`"; #get active AND visible tables
			//echo $tnumsql;
			//echo $user;
			$tnumresult = mysqli_query($db,$tnumsql); #runs when called
			if(mysqli_num_rows($tnumresult)>0){# If 
				while($trow = mysqli_fetch_array($tnumresult, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
					#in here, make box field for active table
					$tnum_i = $trow['tnum'];
					echo ("<div style='display: inline-block; float: left;'><fieldset ><legend><h3>Table:".$tnum_i."</h3></legend>");#t divs open
					$itemsql = "SELECT * FROM `orders` WHERE `visible` = 1 AND `tnum` = ".$tnum_i." AND `uname` = ".$user." ORDER BY `uname`"; #get active tables
					$tresult = mysqli_query($db,$itemsql); #runs when called
					if(mysqli_num_rows($tresult)>0){
						#select COUNT(*) FROM orders WHERE  `item` = 1 <iterate this> AND `tnum` = $tnum_i
						while($irow = mysqli_fetch_array($tresult, MYSQLI_ASSOC)) { #for everything in THIS table
							#in here, make box field for active table
							$myarr = $irow;
							$r = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `food` WHERE id =".$myarr['item']));
							echo ("<button type='button' onclick='orderComplete(". $myarr['id'] .",".$tnum_i.")'>Cancel</button>  ");#The "completed button
							
							$datetime1 = new DateTime($myarr['time_ord']);//start time
							$datetime2 = new DateTime(date("g:i"));//time("H:i:s");//end time time();->format('H:i:s')
							//$interval = $datetime1->diff($datetime2); // substr($myarr['time_ord'],11,12
							//$datetime1 = new DateTime('2016-11-30 03:55:06');//start time
							//$datetime2 = new DateTime('2016-11-30 11:55:06');//end time
							$interval = $datetime1->diff($datetime2);
							$waittime = $interval->format('%H hours %i minutes');
							echo ( $myarr['uname'] .", ". $r['fname'].": Waited: ". $waittime ."<br>"); 
						}   
					}
					echo ("<button type='button' onclick='tableComplete(". $tnum_i .")'>Cancel all</button>  ");
					echo ( "</fieldset> </div>"); #tdivs close
				}   
			}else{
			   echo 'There are no current Orders....';
			}	
			?>



            </div>
        </div>
    </div>
</div>
