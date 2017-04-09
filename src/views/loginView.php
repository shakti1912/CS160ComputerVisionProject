<?php

namespace CS160\views;
include("View.php");
/**
 * view for the login form
 */
class loginView extends View
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
            </head>
            <body>

                <div class="container">
                    <form action = "index.php">
                        <h2>Sign In</h2>
                        <h5><a href="./index.php?c=register&m=register">Click here to register</a></h5>
                        <label for="username"></label>
                        <input type="text" class="form-control" name = "username" placeholder="Username" id="username">

                        <label for="password"></label>
                        <input type="password" class="form-control" name="password" placeholder="Password" id="password">

                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div> <!-- checkbox -->

                        <button type="submit" class="btn btn-lg btn-primary btn-block">LOG IN</button>

                        <input type="hidden" name="c" value="checkUser">
                        <input type="hidden" name="m" value="checkUser">

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
                </div> <!-- container -->
            </body>
        </html>

        <?php
    }
}
