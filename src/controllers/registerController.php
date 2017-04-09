<?php
namespace CS160\controllers;

include("Controller.php");
use CS160\views as V;
/**
 * controller for registering for an account
 */
class registerController extends Controller
{

    function invoke($info = [])
    {

        require_once("./src/views/registerView.php");
        $registerView = new V\registerView();
        $registerView->render();
    }
}
