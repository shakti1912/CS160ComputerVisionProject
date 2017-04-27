<?php

namespace CS160\models;
include("Model.php");
/**
 * model for adding new user
 */
class newUserModel extends Model
{

    function doQuery($data = [])
    {
        $_SESSION[''] = time();


        $FName = $data['FirstName'] ;
        $LName = $data['LastName'] ;
        $UserName = $data['username'] ;
        $Password = $data['password'] ;
        $IPAddr = $_SERVER['REMOTE_ADDR'];

        $config = require("./src/configs/config.php");
        $con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

        //check for all user with that username
        $stmt = mysqli_prepare($con,'SELECT Username FROM User WHERE Username = ?');
        		mysqli_stmt_bind_param($stmt, "s", $UserName);
            mysqli_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rowCount = mysqli_num_rows($result);

        mysqli_free_result($result);

        if($rowCount < 1) { //username is not found in database, when the number of rows on query is less than 1
          $stmt = mysqli_prepare($con,'INSERT INTO User(Username, Password, firstName, lastName, UserIP) VALUES (?,?,?,?,?)');
          		mysqli_stmt_bind_param($stmt, "sssss", $UserName, $Password, $FName, $LName, $IPAddr);
          		mysqli_stmt_execute($stmt);
              return 1;
        } else {
          return 0;
        }


        $con->close();
    }
}
