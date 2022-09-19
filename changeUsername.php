<!DOCTYPE html>
<html lang="en">
    <head>
        <title>change user name page</title>
    </head> 
    <body>
<?php
session_start();
$new_username = $_GET['new_name'];
$username_to_delete = $_SESSION['userName'];
$directory_name = '/srv/uploads';

//check whether the new user name is taken
$is_user = false;
$h = fopen("/srv/uploads/userNames/users.txt", "r");
while( !feof($h) ){
    $user_name = trim(fgets($h));
    $is_user = $is_user | ($new_username == $user_name);
}

if(!$is_user) {
    //change the user name in the users.txt
    $str=file_get_contents('/srv/uploads/userNames/users.txt');
    $str=str_replace($username_to_delete, $new_username,$str);
    file_put_contents('/srv/uploads/userNames/users.txt', $str);
    $_SESSION['userName'] = $new_username;
    
    //rename userfiles
    $old_name = "/srv/uploads/".$username_to_delete."Files";
    $new_name = "/srv/uploads/".$new_username."Files";
    rename($old_name,$new_name);
    header("Location: userInterface.php");
} else {
    if($new_username == "") {
        echo '<h1> invalid user name</h1>';
    } else{
        echo '<h1> this user name is already taken</h1>';
    }
}
?>

<!-- a button used to go back to the previous page when the user name is taken-->
<form name = "input" action = "userInterface.php" method = "get">
<input type ="submit" value="Back"/>
</form>
</body>
</html>