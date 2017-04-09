<?php

function InitializeDB()
{

    $config = require("config.php");
    $con = mysqli_connect($config['host'], $config['username'], $config['password']);
    $stmt = mysqli_prepare($con, 'DROP DATABASE IF EXISTS CS160');
    mysqli_stmt_execute($stmt);
    $stmt = mysqli_prepare($con,'CREATE DATABASE CS160;' );
    mysqli_stmt_execute($stmt);
    mysqli_select_db($con,"CS160");

    //Create data table
    $stmt = mysqli_prepare($con,'DROP TABLE IF EXISTS UserLogin;');
    mysqli_stmt_execute($stmt);
    $stmt = mysqli_prepare($con, 'CREATE TABLE UserLogin
        (
        Username varchar(100),
		Password varchar(100),
		firstName varchar(100),
		lastName varchar(100),
		tstamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		UserIP varchar(100)
        )');
    mysqli_stmt_execute($stmt);
    echo ("Database Successfully Initialized. Be sure to change check mysql login is correct.");
}

InitializeDB();
