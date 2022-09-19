<?php
	session_start();
	// Get the filename and make sure it is valid
	$filename = basename($_FILES['uploadedfile']['name']);
	if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
		echo "Invalid filename";
		echo'<form name = "input" action = "userInterface.php" method = "get">
			<input type ="submit" value="Back"/>
		</form>';
		exit;
	}

	// Get the username and make sure it is valid
	$username = $_SESSION['userName'];
	if( !preg_match('/^[\w_\-]+$/', $username) ){
		echo "Invalid username";
		echo'<form name = "input" action = "userInterface.php" method = "get">
		<input type ="submit" value="Back"/>
		</form>';
		exit;
	}

	$full_path = sprintf("/srv/uploads/%sFiles/%s", $username, $filename);
	if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
		header("Location: userInterface.php");
		exit;
	}else{
		echo '<h1> upload failed </h1>';
	}
?>

<form name = "input" action = "userInterface.php" method = "get">
<input type ="submit" value="Back"/>
</form>
