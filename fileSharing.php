<!-- a html page used to let user to type in the user name to login-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>first entry portal</title>
    </head>
    <body>
        <form name = "input" action = "fileSharing.php" method = "get">
            <label for="userName">Enter your user name here: </label>
            <input type="text" id="userName" name="userName">
            <input type="submit" value="Submit">
    </form>
    <?php
    //according to the input user name, go to the users.txt file and check whether it's a valid user
    session_destroy();
    $h = fopen("/srv/uploads/userNames/users.txt", "r");
    $input_user_name = $_GET['userName']; 
    $is_user = false;

    while( !feof($h) ){
        $user_name = trim(fgets($h));
        $is_user = $is_user | ($input_user_name == $user_name);
    }

    //once user type some user name and submit and that user name is valid, go to userInterface.php and store that user name
    if($is_user && isset($input_user_name) && $input_user_name != "") {
        session_start();
        $_SESSION['userName'] = $input_user_name;
        header("Location: userInterface.php");

    }

    if($input_user_name == "" && isset($input_user_name)) {
        echo '<h1>Please enter a valid user name</h1>';
    }

    //once user type some user name and submit and that user name is invalid, echo the error message
    if(!$is_user && isset($input_user_name)) {
        echo '<h1>Please enter a valid user name</h1>';
    }

    fclose($h);
    ?>
    </body>

</html>

