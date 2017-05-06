<?php
namespace CS160\controllers;

include("Controller.php");
use CS160\views as V;
use CS160\models as M;
/**
 * controller for displaying the login view
 */
class videoViewController extends Controller
{

    function invoke($info = [])
    {
      require_once("./src/views/videoView.php");
      $videoView = new V\videoView();
      $videoView->render($info);
    }
}
