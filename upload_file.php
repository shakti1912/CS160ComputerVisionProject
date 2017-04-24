<?php

namespace CS160;

use CS160\controllers as C;

if(isset($_REQUEST['username']) && isset($_POST['submit'])) {
    $username = $_REQUEST['username'];

    $fileName = $_FILES['file']['name'];
	  $temp = $_FILES['file']['tmp_name'];

    $fileExtension = strtolower(end(explode('.', $fileName)));
    $extensions = array("avi", "flv", "wmv", "mov", "mp4");


    //if video file has the right extension
    //store userID and Video ID to database with uploadFileController
    if(in_array($fileExtension, $extensions)) {
      move_uploaded_file($_FILES['file']['tmp_name'], "Users/" . $_REQUEST['username'] . '/' .  $_FILES["file"]["name"]);
      $_REQUEST['filename'] = $fileName;

    } else {
      $_REQUEST['error_message'] = 'Video is not in the right format';
    }
    require_once("./src/controllers/uploadFileController.php");
    $uploadFileController = new C\uploadFileController();
    $uploadFileController->invoke($_REQUEST);

} else {
    echo('Something has gone terribly wrong');
}
