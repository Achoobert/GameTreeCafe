<?php
//checking if form has been submitted and converting to local variables

if (isset($_GET['submit'])) {
	$firstname1 = $_GET['firstname1'];
	$lastname1 = $_GET['lastname1'];
	$dob1 = $_GET['dob1'];
	$sex1 = $_GET['sex1'];
	$email1 = $_GET['email1'];
}
?>
<html>
<head>

</head>
<body>

<h3>This is Page 2</h3>
<p>It gets the input from the user and prints it out on the screen</p>

<p>This is a simple HTML form that sends it to $_SERVER['PHP_SELF'] when the submit button is pressed using the GET method.</p>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
First name: <input type="text" name="firstname1"><br>
Last name: <input type="text" name="lastname1"><br>
Date of Birth: <input type="text" name="dob1"><br>
Male <input type="radio" name="sex1" value="Male"> Female <input type="radio" name="sex1" value="Female"><br> 
Email: <input type="text" name="email1"><br>
<input type="submit" name="submit" value="GO">
</form>

<p>I have opened PHPMyAdmin control panel and added the following: </p>
Database: lab3<br>
Table: people<br>
Columns: (all varchar 255)
<ul>
	<li>first</li>
	<li>last</li>
	<li>dob</li>
	<li>sex</li>
	<li>email</li>
</ul>
<p>I will be using the database user/password I made last class..</p>

<?php
//connect to the database lab3
	$dbcnx = mysqli_connect("localhost", "toby", "1234", "lab3");
//if the submit button has been pressed, then add the local variables into the database
	
		if (isset($_GET['submit'])) {
	$sql = "INSERT INTO people SET first='$firstname1', last='$lastname1', dob='$dob1', sex='$sex1', email='$email1' ";
		if ($dbcnx->query($sql)) {
		echo("<P>Data has been added!</p>");
		} else {
		echo("<P><font color=red>Error occured.  Data not added!</font>");
		}
	}

// close the database connection
	$dbcnx->close();
?>

<p>Page 3 is the page that reads the information from the database! <a href="page3.php">View Page 3 here</a></p>

</body>
</html>