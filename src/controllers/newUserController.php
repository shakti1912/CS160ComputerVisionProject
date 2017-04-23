<?php
namespace CS160\controllers;

include("Controller.php");
use CS160\views as V;
use CS160\models as M;
/**
 * controller for displaying the login view
 */
class newUserController extends Controller
{

    function invoke($info = [])
    {
        //add new user with newUserModel
        require_once("./src/models/newUserModel.php");
        $newUserModel = new M\newUserModel();
        $result = $newUserModel->doQuery($info);

        //check if successful creating username
        if($result) {
          mkdir('./Users/' . $info["username"], 0777, true);

          //redirect page to index.php
          header('Location: index.php');
          exit();
        }
        else {
          $info["error_message"] = "Username already exists";

          require_once("./src/views/registerView.php");
          $registerView = new V\registerView();
          $registerView->render($info);
        }
    }
}
