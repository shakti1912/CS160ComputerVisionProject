
<?php
//require_once('createDB.php');
session_start();
$_SESSION[''] = time();



$FName = $_REQUEST['FirstName'] ;
$LName = $_REQUEST['LastName'] ;
$UserName = $_REQUEST['username'] ;
$Password = $_REQUEST['password'] ;

$config = require("config.php");
$con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

$stmt = mysqli_prepare($con,'INSERT INTO UserLogin(Username, Password, firstName, lastName) VALUES (?,?,?,?)');
		mysqli_stmt_bind_param($stmt, "ssss", $UserName, $Password, $FName, $LName);
		mysqli_stmt_execute($stmt);







