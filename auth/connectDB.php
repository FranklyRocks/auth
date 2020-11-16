<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "users"; // database where users credentials locate

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
	  die($conn->connect_error);
	}
?>