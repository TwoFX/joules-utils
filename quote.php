<?php
	$servername = "mysql17.1blu.de";
	$username = "s220334_2232988";
	$dbname = "db220334x2232988";

	$pwfile = fopen("password", "r" ) or die("Could read password");
	$password = fread($pwfile, 24);

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT MAX(ID) AS m FROM Quotes";
	$result = mysqli_query($conn, $sql);

	$only = mysqli_fetch_assoc($result);
	$maxid = $only["m"];

	$index = rand(0, $maxid);

	$quote= "SELECT Quote FROM Quotes WHERE ID = $index";
	$result = mysqli_query($conn, $quote);
	$only = mysqli_fetch_assoc($result);
	echo $only["Quote"];

	mysqli_close($conn);
?>
