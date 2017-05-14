<?php

namespace CS160;

use CS160\models as M;
use CS160\controllers as C;

if(isset($_REQUEST['username']) && isset($_POST['submit']) && isset($_FILES)) {
    $username = $_REQUEST['username'];

    $fileName = $_FILES['file']['name'];
	  $temp = $_FILES['file']['tmp_name'];

    $fileExtension = strtolower(end(explode('.', $fileName)));
    $extensions = array("avi", "flv", "wmv", "mov", "mp4");


    //if video file has the right extension
    //store userID and Video ID to database with uploadFileController
    if(in_array($fileExtension, $extensions)) {

      require_once("./src/models/newVideoModel.php");
      $newVideoModel = new M\newVideoModel();
      $VideoID = $newVideoModel->newVideo($fileName);

      mkdir("Users/" . $username . "/" . $VideoID, 0777, true);

      move_uploaded_file($_FILES['file']['tmp_name'], "Users/" . $username . '/' . $VideoID . '/' .  $_FILES["file"]["name"]);
      $_REQUEST['filename'] = $fileName;
      $_REQUEST['VideoID'] = $VideoID;
    } else {
      $_REQUEST['error_message'] = 'Must be in the right format';
    }
    require_once("./src/controllers/uploadFileController.php");
    $uploadFileController = new C\uploadFileController();
    $uploadFileController->invoke($_REQUEST);

} else {
    echo('Something has gone terribly wrong');
}
