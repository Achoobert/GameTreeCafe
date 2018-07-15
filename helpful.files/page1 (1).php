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

<h3>This is Page 1</h3>
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

<?php
// if the form has been submitted it echos the local variables to the screen

if (isset($_GET['submit'])) {
	echo ("<p>First name: $firstname1</p>
	<p>Last name: $lastname1</p>
	<p>Date of Birth: $dob1</p>
	<p>Sex: $sex1</p>
<p>Email: $email1</p>");
} 
?>
</body>
</html>