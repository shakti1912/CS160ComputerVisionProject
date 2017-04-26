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

                <h1>Welcome Back<?php echo($data["first"] . " " . $data["last"]) ?>! (<a href="logout.php">LOGOUT</a>)</h1>
                <!-- form to upload files -->
                <form action="upload_file.php" method="post" enctype="multipart/form-data">
                    <label for="file"><span>Filename:</span></label>
                    <input type="file" name="file" id="file" />

                    <br />
                    <button type="submit" class="btn btn-default" name="submit" value="Submit" />Submit</button>
                    <input type="hidden" name="username" value=<?php echo('"' . $data["username"] . '"'); ?>>
                    <input type="hidden" name="UserID" value=<?php echo('"' . $data["UserID"] . '"'); ?>>

                    <input type="hidden" name="first" value=<?php echo('"' . $data["first"] . '"'); ?>>
                    <input type="hidden" name="last" value=<?php echo('"' . $data["last"] . '"'); ?>>
                    <p><font color="white">Supported Video Files: avi, flv, wmv, mov, mp4</font></p>

                    <div class="error_message">
                      <?php
                      if(isset($data["error_message"]))
                  {
                          ?>
                              <p><font color="red"><?php echo($data["error_message"]); ?></font></p>
                          <?php
                  }
                      ?>
                    </div>
                </form>

            </body>
        </html>

        <?php
    }
}
