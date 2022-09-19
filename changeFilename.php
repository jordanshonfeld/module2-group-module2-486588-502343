<!DOCTYPE html>
<html lang="en">
    <head>
        <title>change file name page</title>
    </head>
<body>
    <?php
    //change the file name according to the user input
    session_start();
    $new_filename = $_GET['new_name'];
    $username = $_SESSION['userName'];
    $file_to_delete = $_GET['original_name'];

    $old_name = "/srv/uploads/".$username."Files/". $file_to_delete;
    $new_name = "/srv/uploads/".$username."Files/" . $new_filename;
    if(rename($old_name,$new_name)) {
        header("Location: userInterface.php");  
    } else {
        echo "no such file exist";
    }
    ?>

    <!-- a button used to go back to the previous page when the user name is taken-->
    <form name = "input" action = "userInterface.php" method = "get">
    <input type ="submit" value="Back"/>
    </form>
</body>
</html>