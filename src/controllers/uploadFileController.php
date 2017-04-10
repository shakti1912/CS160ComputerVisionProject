<?php
namespace CS160\controllers;

include("Controller.php");
use CS160\views as V;
use CS160\models as M;
/**
 * controller for displaying the login view
 */
class uploadFileController extends Controller
{

    function invoke($info = [])
    {

        $pathToVid = 'Users/' . $info["username"] . '/' . $info["filename"];

        //count number of frames in video
        $command = 'ffprobe -v error -count_frames -select_streams v:0 -show_entries stream=nb_read_frames -of default=nokey=1:noprint_wrappers=1 ' . $pathToVid;
        $info["NumberOfFrames"] = intval(shell_exec($command));

        //frames per second
        $command = 'ffprobe -v error -select_streams v:0 -show_entries stream=avg_frame_rate -of default=noprint_wrappers=1:nokey=1 ' . $pathToVid;
        $info["fps"] = intval(explode("/", shell_exec($command))[0]);

        //resolution of video
        $command = 'ffprobe -v error -of flat=s=_ -select_streams v:0 -show_entries stream=height,width ' . $pathToVid;
        $arr_resolution = explode("\n", shell_exec($command));
        foreach($arr_resolution as $value) {
            if(strpos($value, 'height')) {
                $info["height"] = intval(explode("=", $value)[1]);
            }
            if(strpos($value, 'width')) {
                $info["width"] = intval(explode("=", $value)[1]);
            }
        }
        //$command = '/usr/bin/ffmpeg -i ' . $pathToVid . ' -vf fps=30 /opt/lampp/htdocs/CS160ComputerVisionProject/Users/e/output%d.png';

        //add new video metadata to database
        require_once("./src/models/newVideoModel.php");
        $newVideoModel = new M\newVideoModel();
        $newVideoModel->doQuery($info);

    }
}
