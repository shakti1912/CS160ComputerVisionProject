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

        $config = require("./src/configs/config.php");
        $con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

        $stmt = mysqli_prepare($con,'INSERT INTO User(Username, Password, firstName, lastName) VALUES (?,?,?,?)');
        		mysqli_stmt_bind_param($stmt, "ssss", $UserName, $Password, $FName, $LName);
        		mysqli_stmt_execute($stmt);

        $con->close();
    }
}
