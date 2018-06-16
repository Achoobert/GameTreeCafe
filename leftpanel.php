<p> 
<?php
//$len = ;
if (strlen($_SESSION['username']) > 0) {
	echo "username is: ";
	echo $_SESSION["username"];
} else {
	echo ('<a href="login.php" class="link">Login</a>');
}	
?> 
<br>
<a href="search_game.php" class="link">Search all Games</a><br>
<a href="search_food.php" class="link">Buy Food</a>
</p>
