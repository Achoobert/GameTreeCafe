<!-- We don't need a full layout in this file because this page will be parsed with Ajax. 

This page will containt he form and the php->sql code for edit/update, add, and hiding food items
Unnecciary code will be rmove as this will be embeded in edit.php
-->

<!-- Top Navbar-->

<?php
 
   
//checking if form has been submitted and converting to local variables
if (isset($_GET['submit'])) {
	$dob1 = $_GET['dob1'];
	$sex1 = $_GET['sex1'];
	$email1 = $_GET['email1'];
}


//switch


   
   
 ?>



 
<div class="navbar">
    <div class="navbar-inner">
        <div class="left">
            <a href="#" class="back link">
                <i class="icon icon-back"></i>
                <span>Back</span>
            </a>
        </div>
		
        <div class="center sliding">Edit Game Page</div>
        <div class="right">
            <a href="#" class="link icon-only open-panel"><i class="icon icon-bars"></i></a>
        </div>
    </div>
</div>
<div class="pages">
    <div  class="page">
        <div class="page-content">
            <div class="content-block">
                <p>Here is where new games can be added to the database!</p>
                
				
					INSERT INTO `game_data` (`id`, `gamename`, `embedthumbnail`, `genera1`, `genera2`, `mechanic1`, `mechanic2`, `idealplyer`, `minplyer`, `maxplyer`, `playtimemin`, `playtimeusual`) VALUES (NULL, 'Power Grid', '/img/powergrid.jpg', '1', '5', '3', '6', '4', '3', '6', '7', '12');
				<!--  order form area-->
					

				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
				First name: <input type="text" name="firstname1"><br>
				Last name: <input type="text" name="lastname1"><br>
				Date of Birth: <input type="text" name="dob1"><br>
				Male <input type="radio" name="sex1" value="Male"> Female <input type="radio" name="sex1" value="Female"><br> 
				Email: <input type="text" name="email1"><br>
				<input type="submit" name="submit" value="GO">
				</form>	
				
<?php
	// if the form has been submitted it echos the local variables to the screen
	$sql = "SELECT * FROM orders"; #is string
	$result = mysqli_query($db,$sql); #is query on sql, runs when called
	if( mysqli_num_rows($result)>0){
		echo ( "These are the current orders<br>");
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { #MYSQLI_USE_RESULT
			$myarray = $row;
			echo ( "table number = ".$myarray['tnum']." Item Ordered = ".$myarray['item']."<br>"); #
		}   
	}else{
	   echo 'it brings no data....';
	}	
				
				
	if (isset($_GET['submit'])) {
		$sql = "INSERT INTO 'orders' ('id', 'tnum', 'item') VALUES (NULL, '".$firstname1."', '".$lastname1."')";
		$result = mysqli_query($db,$sql); #is query on sql, runs when called

		echo ("<p>First name: $firstname1</p>
		<p>Last name: $lastname1</p>
		<p>Date of Birth: $dob1</p>
		<p>Sex: $sex1</p>
		<p>Email: $email1</p>");
	} 
?>
				
				
				
					<button id="addr">view</button>
					<div id="address">
					  <label for="mechanic1">mechanic1:</label>
					  <input type="name" name="name" id="name"></br>										
					  <label for="street">playtimemin:</label>
					  <input type="text" name="gamename" id="gamename	"></br>
					  <label for="gamename">gamename:</label>
					  <input type="text" name="city" id="city"></br>
					  <label for="postcode">embedthumbnail:</label>
					  <input type="text" name="postcode" id="postcode"></br>
					  <button id="" onClick="">view</button>
					</div>

		
				<a href="#page2" class="ui-btn" data-transition="flow" onClick="JavaScript:writeit()">Submit Order</a>  
					  
					</form>
					<!-- end Testing labes area -->
		<?php
// if the form has been submitted it echos the local variables to the screen

if (isset($_GET['submit'])) {
	
	

	echo ("<p>First name: $mechanic1</p>
	<p>Last name: $gamename</p>
	<p>Date of Birth: $dob1</p>
	<p>Sex: $sex1</p>
<p>Email: $email1</p>");
} 
?>
            </div>
        </div>
    </div>
</div>
