<?php

namespace CS160\models;
include("Model.php");
/**
 * model for adding new user
 */
class newVideoModel extends Model
{

    function doQuery($data = [])
    {
        $config = require("./src/configs/config.php");
        $con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

        $stmt = mysqli_prepare($con,'UPDATE Video SET FPS = ?, Width = ?, Height = ?, NumberOfFrames = ? WHERE VideoID = ?');
        		mysqli_stmt_bind_param($stmt, "iiiii", $data["fps"], $data["width"], $data["height"], $data["NumberOfFrames"], intval($data["VideoID"]));
        		mysqli_stmt_execute($stmt);

        $stmt = mysqli_prepare($con,'INSERT INTO UserVideo(UserID, VideoID) VALUES (?,?)');
                mysqli_stmt_bind_param($stmt, "ii", intval($data["UserID"]), intval($data["VideoID"]));
                mysqli_stmt_execute($stmt);
        $con->close();
    }

    public function newVideo($data)
    {
      $config = require("./src/configs/config.php");
      $con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

      $stmt = mysqli_prepare($con,'INSERT INTO Video(Name) VALUES (?)');
          mysqli_stmt_bind_param($stmt, "s", $data);
          mysqli_stmt_execute($stmt);

      $VideoID = $con->insert_id;

      $con->close();
      return $VideoID;
    }
}
