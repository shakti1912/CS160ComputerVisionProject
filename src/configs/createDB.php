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

    //Create all data tables
    $stmt = mysqli_prepare($con,'DROP TABLE IF EXISTS User;');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'DROP TABLE IF EXISTS Video;');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'DROP TABLE IF EXISTS UserVideo;');
    mysqli_stmt_execute($stmt);


    $stmt = mysqli_prepare($con, 'CREATE TABLE User
        (
        UserID INT NOT NULL AUTO_INCREMENT,
        Username varchar(100),
		Password varchar(100),
		firstName varchar(100),
		lastName varchar(100),
		tstamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		UserIP varchar(100),
        PRIMARY KEY(UserID),
        UNIQUE (Username)
        );');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con, 'CREATE TABLE Video
        (
        VideoID INT NOT NULL AUTO_INCREMENT,
        FPS SMALLINT,
        Width SMALLINT,
        Height SMALLINT,
        NumberOfFrames INT,
        Name VARCHAR(100),
        PRIMARY KEY(VideoID)
        );');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con, 'CREATE TABLE UserVideo
        (
        UserID INT,
        VideoID INT,
        FOREIGN KEY (UserID) REFERENCES User(UserID),
        FOREIGN KEY (VideoID) REFERENCES Video(VideoID)
        );');
    mysqli_stmt_execute($stmt);
    $con->close();
    echo ("Database Successfully Initialized. Be sure to change check mysql login is correct.");
}

InitializeDB();
