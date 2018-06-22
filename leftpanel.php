<p> 

<?php 

if (!isset($_COOKIE[$cookie_name])) {
    echo ('<a href="login.php" class="link">Login</a>');
} else {
    //echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Your name is: " . $_COOKIE[$cookie_name];
	echo ('<br><a href="login.php" class="link">Change Name</a><br>');
	echo ('<a href="viewmyorders.php?user='. $_COOKIE[$cookie_name].'&submit=GO" class="link">View My Orders</a><br>');
}
?>



<br>

<a href="search_game.php" class="link">Search all Games</a><br>
<a href="search_food.php" class="link">Buy Food</a>
</p>
