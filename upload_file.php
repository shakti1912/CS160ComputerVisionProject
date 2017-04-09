<?php

namespace CS160;

use CS160\controllers as C;

if(isset($_REQUEST['username']) && isset($_POST['submit'])) {
    $username = $_REQUEST['username'];

    $name = $_FILES['file']['name'];
	$temp = $_FILES['file']['tmp_name'];

    // moves the uploaded video to the directory of upload
	move_uploaded_file($_FILES['file']['tmp_name'], "Users/" . $_REQUEST['username'] . '/' .  $_FILES["file"]["name"]);

    //write information to database
} else {
    echo('Something has gone terribly wrong');
}
