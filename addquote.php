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

	$sql = "SELECT MAX(ID) AS m FROM Quotes";
	$result = $conn->query($sql);

	$only = $result->fetch_assoc();
	$id = $only["m"] + 1;

	$insert = $conn->prepare("INSERT INTO Quotes VALUES (?, ?)");
	$quote = $_GET['q'];

	$insert->bind_param("is", $id, $quote);
	$insert->execute();
	$insert->close();
	$conn->close();
	echo "Quote added successfully.";
?>
