<?php

namespace CS160;

use CS160\controllers as C;

if(isset($_REQUEST['username']) && isset($_POST['submit'])) {
    $username = $_REQUEST['username'];

    $name = $_FILES['file']['name'];
	$temp = $_FILES['file']['tmp_name'];

    // moves the uploaded video to the directory of upload
	move_uploaded_file($_FILES['file']['tmp_name'], "Users/" . $_REQUEST['username'] . '/' .  $_FILES["file"]["name"]);

    $_REQUEST['filename'] = $name;

    //store userID and Video ID to database with uploadFileController
    require_once("./src/controllers/uploadFileController.php");
    $uploadFileController = new C\uploadFileController();
    $uploadFileController->invoke($_REQUEST);

} else {
    echo('Something has gone terribly wrong');
}
