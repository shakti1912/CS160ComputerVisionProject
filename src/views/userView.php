<?php

namespace CS160\views;
include("View.php");
/**
 * view for the login form
 */
class userView extends View
{

    function render($data = [])
    {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Welcome!</title>

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
                <link rel="stylesheet" href="style.css">
            </head>
            <body>

                <h1>Welcome Back <?php echo($data["first"] . " " . $data["last"] . "!") ?></h1>
                <!-- form to upload files -->
                <form action="#" method="post" enctype="multipart/form-data">
                    <label for="file"><span>Filename:</span></label>
                    <input type="file" name="file" id="file" />

                    <br />
                    <button type="submit" class="btn btn-default" name="submit" value="Submit" />Submit</button>
                </form>

            </body>
        </html>

        <?php
    }
}
