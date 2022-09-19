<!DOCTYPE html>
<html lang="en">
    <head>
        <title>delete a file</title>
    </head> 
<body>
<?php
session_start();
// get the file name to be deleted from the user input
$file_name_to_be_deleted = $_GET['file_to_delete'];
$username = $_SESSION['userName'];
$full_path = sprintf("/srv/uploads/%sFiles/%s", $username, $file_name_to_be_deleted);

//go to the directory used to store the current user files and delete that file
if (!unlink($full_path)) {
    echo "<h1> unable to delete</h1>";
}
else {
    header("Location: userInterface.php");
}

?>

<!-- a button used to go back to the previous page when an error happens deleting the file-->
<form name = "input" action = "userInterface.php" method = "get">
<input type ="submit" value="Back"/>
</form>
</body>
</html>