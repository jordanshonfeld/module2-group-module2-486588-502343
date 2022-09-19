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
    echo '<h1> this user name is already taken</h1>';
}
?>

<form name = "input" action = "userInterface.php" method = "get">
<input type ="submit" value="Back"/>
</form>