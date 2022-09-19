<?php
session_start();
$input_user_name = $_SESSION['userName'];
echo '<h1> Hello ' . $input_user_name . '</h1>';
$directory_name = '/srv/uploads/' . $input_user_name . "Files";
echo '<form name = "input" action = "viewFiles.php" method = "get">';
if (is_dir($directory_name)) {
    if ($dh = opendir($directory_name)) {
        while (($file = readdir($dh)) !== false) {
            if($file != "." && $file != ".."){
                $view = '<input type="radio" id=' .$file. ' value =' .$file. ' name = "file"/>
                <label for='.$file.'>'.$file.'</label><br>';
                echo $view;
            }
        }
        closedir($dh);
    }
}
echo '<input type ="submit" value="View"/>
</form>';
$upload_format = '<form enctype="multipart/form-data" action="uploader.php" method="POST">
<p>
    <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
    <label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
</p>
<p>
    <input type="submit" value="Upload File" />
</p>
</form>';
$delete_format ='  <form name = "input" action = "delete.php" method = "get">
<label for="file_to_delete">type the file name to be deleted here:</label>
<input type="text" name="file_to_delete" id="file_to_delete"/>
<input type="submit" value="Delete File" />
</form>';
$change_username ='  <form name = "input" action = "changeUsername.php" method = "get">
<label for="new_name">change the user name:</label>
<input type="text" name="new_name" id="new_name"/>
<input type="submit" value="change username" />
</form>';
echo $upload_format;
echo $delete_format;
echo $change_username;
?>

<form name = "input" action = "fileSharing.php" method = "get">
<input type ="submit" value="Log out"/>
</form>
