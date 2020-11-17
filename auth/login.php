<?php 
	require_once("connectDB.php");

	// Get username and password from credentials table
	$stmt = $conn->prepare("SELECT * FROM credentials WHERE user=?");
	$stmt->bind_param("s", $_POST["user"]);
	$stmt->execute();
	$result = $stmt->get_result();
	
	// Verify credentials
	if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {
		echo credentials_verify($row);
		session_start();
		$_SESSION["username"] = $_POST["user"];
	  }
	} else {
	  echo 0;
	}

	$conn->close();
	
	function credentials_verify($row) {
		if($_POST["user"] != $row["user"]) return 0; 
		if(!password_verify($_POST["pass"], $row["pass"])) return 0;
		return 1;
	}	
?>