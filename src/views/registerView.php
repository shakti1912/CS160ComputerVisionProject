<?php

namespace CS160\views;
include("View.php");
/**
 * view for the sign up form
 */
class registerView extends View
{

    function render($data = [])
    {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Sign Up</title>

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
                <link rel="stylesheet" href="style.css">
            </head>
            <body>
                <div class="container">
                    <form action="./index.php">
                        <h2>Sign Up</h2>

                        <div class="row">
                            <div class="col-xs-6">
                                <label for="firstName"></label>
                                <input type="text" class="form-control" name="FirstName" placeholder="First Name" id="firstName">
                            </div>

                            <div class="col-xs-6">
                                <label for="lastName"></label>
                                <input type="text" class="form-control" name="LastName" placeholder="Last Name" id="lastName">
                            </div>

                        </div>

                        <label for="NewUserName"></label>
                        <input type="text" class="form-control" name="username" placeholder="Username" id="NewUserName">

                        <label for="NewUserPassword"></label>
                        <input type="password" class="form-control" name="password" placeholder="Password" id="NewUserPassword">

                        <button type="submit" class="btn btn-lg btn-primary btn-block">REGISTER</button>

                        <input type="hidden" name="c" value="newUser">
                        <input type="hidden" name="m" value="newUser">
                    </form>
                </div> <!-- container -->
            </body>
        </html>


        <?php
    }
}
