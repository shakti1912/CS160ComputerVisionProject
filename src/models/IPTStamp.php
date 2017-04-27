<?php

namespace CS160\models;
require_once 'Model.php';
/**
 * model for updating IP address and timestamp
 */
class IPTStamp extends Model
{

    function doQuery($data = [])
    {
        $username = $data['username'];
		$password = $data['password'];
		$config = require("./src/configs/config.php");
		$con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

    $stmt = mysqli_prepare($con,'UPDATE User SET UserIP = ? WHERE UserID = ?');
        mysqli_stmt_bind_param($stmt, "ss", $_SERVER['REMOTE_ADDR'], $data["UserID"]);
        mysqli_stmt_execute($stmt);

    $con->close();
    return;
    }


}
