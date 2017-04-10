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

        $stmt = mysqli_prepare($con,'INSERT INTO Video(FPS, Width, Height, NumberOfFrames, Name) VALUES (?,?,?,?,?)');
        		mysqli_stmt_bind_param($stmt, "iiiis", $data["fps"], $data["width"], $data["height"], $data["NumberOfFrames"], $data["filename"]);
        		mysqli_stmt_execute($stmt);

        $VideoID = $con->insert_id;

        $stmt = mysqli_prepare($con,'INSERT INTO UserVideo(UserID, VideoID) VALUES (?,?)');
                mysqli_stmt_bind_param($stmt, "ii", intval($data["userID"]), $VideoID);
                mysqli_stmt_execute($stmt);
        $con->close();
    }
}
