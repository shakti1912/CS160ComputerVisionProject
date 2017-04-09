<?php
namespace CS160\controllers;

include("Controller.php");
use CS160\views as V;
use CS160\models as M;
/**
 * controller for displaying the login view
 */
class loginController extends Controller
{

    function invoke($info = [])
    {
        //initial
        if(empty($info)) {
            require_once("./src/views/loginView.php");
            $loginView = new V\loginView();
            $loginView->render();
        } else {
            //model if user is trying to log in
            require_once("./src/models/checkUserModel.php");
            $checkUserModel = new M\checkUserModel();
            $result = $checkUserModel->doQuery($info);

            //user does not exist
            if(!$result["first"] && !$result["last"])
    		{
                require_once("./src/views/loginView.php");
                $loginView = new V\loginView();
                //displays error message in the login view
                $result["error_message"] = "Error in username or password";
                $loginView->render($result);
    		}
            //user does exist and displays the user view
    		else
    		{
                require_once("./src/views/userView.php");
                $userView = new V\userView();
                $userView->render($result);
            }
        }

    }
}
