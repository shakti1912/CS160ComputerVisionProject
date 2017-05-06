<?php

namespace CS160\views;
include("View.php");
/**
 * view for the login form
 */
class videoView extends View
{

    function render($data = [])
    {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Sign In</title>

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
                <link rel="stylesheet" href="style.css">

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="./src/scripts/script.js" charset="utf-8"></script>
            </head>
            <body>
                <a href="index.php">HOME</a>
                <h1><?php echo($data['name']) ?></h1>
                <div class="container">
                  <video width="<?php echo($data['width']) ?>" height="<?php echo($data['height']) ?>" controls>
                    <?php $video = './Users/' . $data['user'] . '/' . $data['VideoID'] . '/' . $data['name']; ?>
                    <source src="<?php echo($video); ?>" type="video/mp4">
                    Your browser does not support the video tag
                  </video>
                </div> <!-- container -->
            </body>
        </html>

        <?php
    }
}
