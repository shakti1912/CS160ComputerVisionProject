<?php
//log out user
session_start();

session_unset();

session_destroy();

header("Location: index.php");
