<html>
<head>

</head>
<body>

<h3>This is Page 3</h3>
<p>reads the database and prints it out on the screen</p>

<?php
//connect to the database lab3
	$dbcnx = mysqli_connect("localhost", "toby", "1234", "lab3");
//read the variables from the database one row at a time
	$read = $dbcnx->query("SELECT first, last, dob, sex, email FROM people");

	if ($read->num_rows > 0) {
// output data of each row with a space between each word and a line break (br) at the end of each row
	    while($row = $read->fetch_assoc()) {
				echo($row["first"]. " " . $row["last"] . " " . $row["dob"]. " " . $row["sex"] . " " . $row["email"] ."<br>");
	    }
	} else {
	    echo "0 results";
	}

// close the database connection
	$dbcnx->close();
?>

<p>Go back to page 2 to add more data! <a href="page2.php">View Page 2 here</a></p>

</body>
</html>