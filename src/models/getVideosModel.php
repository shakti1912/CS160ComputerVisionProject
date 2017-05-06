<?php

namespace CS160\models;
require_once 'Model.php';
/**
 * return a associative array based on the userID
 */
class getVideosModel extends Model
{

    function doQuery($data = []) {
      $UserID = $data["UserID"];
      $config = require("./src/configs/config.php");

		  $con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

      //get all information for the videos from UserID
      $stmt = mysqli_prepare($con,'SELECT Name, Width, Height, v.VideoID FROM UserVideo u JOIN Video v ON u.VideoID = v.VideoID WHERE UserID = ?');
        mysqli_stmt_bind_param($stmt, "s", $UserID);
        mysqli_execute($stmt);

      mysqli_stmt_bind_result($stmt, $Name, $Width, $Height, $VideoID);

      $AllVideo = [];
      while(mysqli_stmt_fetch($stmt)) {
        $Video = [$Name, $Width, $Height, $VideoID];
        array_push($AllVideo, $Video);
      }

    $con->close();
    return $AllVideo;
    }


}
