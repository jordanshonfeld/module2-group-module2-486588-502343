<?php
session_start();
$file_name_to_be_deleted = $_GET['file_to_delete'];
$username = $_SESSION['userName'];
$full_path = sprintf("/srv/uploads/%sFiles/%s", $username, $file_name_to_be_deleted);

if (!unlink($full_path)) {
    echo "<h1> unable to delete</h1>";
}
else {
    header("Location: userInterface.php");
}

?>

<form name = "input" action = "userInterface.php" method = "get">
<input type ="submit" value="Back"/>
</form>