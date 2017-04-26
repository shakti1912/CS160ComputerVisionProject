<?php

namespace CS160;

use CS160\controllers as C;

//starts session
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
  require_once("./src/controllers/loginController.php");
  $loginController = new C\loginController();
  $loginController->invoke($_SESSION);
} else {
  if(isset($_REQUEST['c']) && isset($_REQUEST['m'])) {

      //register page
      if($_REQUEST['c'] === "register" && $_REQUEST['m'] === "register") {
          require_once("./src/controllers/registerController.php");
          $registerController = new C\registerController();
          $registerController->invoke();

      //creates new user
      } else if($_REQUEST['c'] === "newUser" && $_REQUEST['m'] === "newUser") {
          require_once("./src/controllers/newUserController.php");
          $newUserController = new C\newUserController();
          $newUserController->invoke($_REQUEST);
      //check for user login
      } else if($_REQUEST['c'] === "checkUser" && $_REQUEST['m'] === "checkUser") {
          $_SESSION['username'] = $_REQUEST['username'];
          $_SESSION['password'] = $_REQUEST['password'];
          header("Location: ."); //redirects to this script 
      }
  } else {
      //starts with the login page
      require_once("./src/controllers/loginController.php");
      $loginController = new C\loginController();
      $loginController->invoke();
  }
}
