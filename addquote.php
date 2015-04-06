<?php
	/*
	 * addquote.php
	 * Copyright (c) 2015 Markus Himmel
	 * This file is distributed under the terms of the MIT license.
	 */

	$servername = "mysql17.1blu.de";
	$username = "s220334_2232988";
	$dbname = "db220334x2232988";

	$pwfile = fopen("password", "r" ) or die("Could read password");
	$password = fread($pwfile, 24);


	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->conect_error);
	}

	$sql = $conn->prepare("SELECT MAX(ID) AS m FROM Quotes WHERE Streamer = ?");
	if (!isset($_GET["s"])) {
		die("No streamer specified");
	}
	$streamer = $_GET["s"];
	$sql->bind_param("s", $streamer);
	$sql->execute();
	$sql->bind_result($new);
	if (!$sql->fetch()) {
		die("Query failed.");
	}
	$id = $new + 1;
	$sql->close();
	$insert = $conn->prepare("INSERT INTO Quotes (ID, Quote, Streamer) VALUES (?, ?, ?)");
	$quote = $_GET["q"];
	$insert->bind_param("iss", $id, $quote, $streamer);
	$insert->execute();
	$insert->close();
	$conn->close();
	echo "Quote added successfully.";
?>
