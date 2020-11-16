<?php 
	require_once("connectDB.php");
	
	// Check if username is null or empty
	if(!isset($_GET["user"]) || $_GET["user"] == "") {
		die("0");
		$conn->close();
	}
	
	$passwordHash = password_hash($_GET["pass"], PASSWORD_DEFAULT);
	
	// Insert username and password in credentials table
	$stmt = $conn->prepare("INSERT INTO credentials (user, pass) VALUES (?,?)");
	$stmt->bind_param("ss", $_GET["user"], $passwordHash);
	$stmt->execute();
	
	// Check if insert was OK or username already exists
	if($conn->error == null) {
		echo 1;
		session_start();
		$_SESSION["username"] = $_GET["user"];
	} else {
		echo 0;
	}

	$conn->close();
?>