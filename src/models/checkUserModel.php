<?php

namespace CS160\models;
include("Model.php");
/**
 * model for adding new user
 */
class checkUserModel extends Model
{

    function doQuery($data = [])
    {
        $username = $data['username'];
		$password = $data['password'];
		$config = require("./src/configs/config.php");
		$con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);
		$stmt = mysqli_prepare($con, "select FirstName, LastName, Username from UserLogin where username=? and Password=?");
		mysqli_stmt_bind_param($stmt, "ss",  $username, $password);
		mysqli_stmt_execute($stmt);

        //bind result to first and last
		mysqli_stmt_bind_result($stmt, $first, $last, $username);
		mysqli_stmt_fetch($stmt);

        $result = array(
            "first" => $first,
            "last" => $last,
            "username" => $username
        );
        return $result;
    }
}
