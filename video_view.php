<?php

namespace CS160;

use CS160\controllers as C;

if(isset($_REQUEST['c']) && isset($_REQUEST['m']) && isset($_REQUEST['name']) && isset($_REQUEST['width']) && isset($_REQUEST['height']) && isset($_REQUEST['user']) && isset($_REQUEST['VideoID'])) {

  if($_REQUEST['c'] === "view" && $_REQUEST['m'] === "view") {

    require_once("./src/controllers/videoViewController.php");
    $videoViewController = new C\videoViewController();
    $videoViewController->invoke($_REQUEST);
  }

} else {
  echo('Something has gone terribly wrong');
}
