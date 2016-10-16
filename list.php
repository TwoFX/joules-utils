<?php
	/*
	 * quote.php
	 * Copyright (c) 2015 Markus Himmel
	 * This file is distributed under the terms of the MIT license.
	 */

	$servername = "mysql17.1blu.de";
	$username = "s220334_2232988";
	$dbname = "db220334x2232988";

	$pwfile = fopen("password", "r" ) or die("Could read password");
	$password = fread($pwfile, 24);

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = $conn->prepare("SELECT Quote FROM Quotes WHERE Streamer = ?");
	if (!isset($_GET["s"])) {
		die("No streamer specified");
	}
	$streamer = $_GET["s"];
	$sql->bind_param("s", $streamer);
	$sql->execute();
	$sql->bind_result($q);
	if (!$sql->fetch()) {
		die("Query failed.");
	}
	while ($sql->fetch())
	{
		echo $q;
		echo "<br>";
	}

	mysqli_close($conn);
?>
