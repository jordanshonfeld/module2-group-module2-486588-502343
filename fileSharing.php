<!DOCTYPE html>
<html>
    <head>
        <title>Module2 group project</title>
    </head>
    <body>
        <form name = "input" action = "fileSharing.php" method = "get">
            <label for="userName">Enter your user name here: </label>
            <input type="text" id="userName" name="userName">
            <input type="submit" value="Submit">
    </body>
</html>


<?php
$h = fopen("/srv/uploads/userNames/users.txt", "r");
$input_user_name = $_GET['userName']; 
$is_user = false;

while( !feof($h) ){
    $user_name = trim(fgets($h));
    $is_user = $is_user | ($input_user_name == $user_name);
}

if($is_user && isset($input_user_name)) {
    session_start();
    echo '<h1>' .$input_user_name .' files</h1>';
    $_SESSION['userName'] = $input_user_name;
    header("Location: userInterface.php");

}

if(!$is_user && isset($input_user_name)) {
    echo '<br> <h1>Please enter a valid user name</h1>';
}

fclose($h);
?>
