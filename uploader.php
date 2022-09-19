<?php
	session_start();
	// Get the filename and make sure it is valid
	$filename = basename($_FILES['uploadedfile']['name']);
	if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
		echo "Invalid filename";
		exit;
	}

	// Get the username and make sure it is valid
	$username = $_SESSION['userName'];
	if( !preg_match('/^[\w_\-]+$/', $username) ){
		echo "Invalid username";
		exit;
	}

	$full_path = sprintf("/srv/uploads/%sFiles/%s", $username, $filename);
	if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
		header("Location: userInterface.php");
		exit;
	}else{
		header("Location: userInterface.php");
		exit;
	}
?>

