<?php
	if(isset($_GET["install"])) {	
		require_once("connectDB.php");

		$sql = file_get_contents('users.sql');
		$conn->multi_query($sql);
		
		echo "Install completed. Please for security, remove install.php and users.sql";
		
		$conn->close();		
	} else {
		echo "Configure connectDB.php before you press install.";
		echo "<form> <button name='install' value='yes'>Install</button> </form>";
	}
?>