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
        //there is no error on the video format
        if(!isset($info['error_message'])) {
          $pathToVid = 'Users/' . $info["username"] . '/' . $info["VideoID"] . '/' . $info["filename"];

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

          //add new video metadata to database
          require_once("./src/models/newVideoModel.php");
          $newVideoModel = new M\newVideoModel();
          $newVideoModel->doQuery($info);

          //split frames according to their fps
          $path = '/opt/lampp/htdocs/CS160ComputerVisionProject/Users/' . $info["username"] . '/' . $info["VideoID"];
          $splitFrame = '/usr/bin/ffmpeg -i ' . $pathToVid . ' -vf fps=' . $info["fps"] . ' ' . $path . '/' . $info["VideoID"] . '.%d.png';
          shell_exec($splitFrame);

          //get 68 facial points for each frame
          // for ($i=1; $i <= $info["NumberOfFrames"]; $i++) {
          for ($i=1; $i <= 5; $i++) {
            shell_exec("~/Downloads/OpenFace/build/bin/FaceLandmarkImg -f " . $path . '/' . $info["VideoID"] . "." . $i . ".png" . " -ofdir " . $path);
          }

          for($i=1; $i <=5; $i++) {
            shell_exec("python ./src/scripts/delaunay_triangles.py " . $path . "/" . $info["VideoID"] . "." . $i .".png " . $path . "/" . $info["VideoID"] . "." . $i . "_det_0.pts " . $path . "/out_" . $info["VideoID"] . "." . $i . ".png" );
          }

          //ffmpeg to stitch together the video
        }

        $arr = [
          'width' => $info['width'],
          'height' => $info['height'],
          'user' => $info['username'],
          'VideoID' => $info['VideoID'],
          'name' => $info["filename"] //change this to the face mesh video
        ];
        //redirect to face mesh video
        require_once("./src/views/videoView.php");
        $videoView = new V\videoView();
        $videoView->render($arr);
    }
}
