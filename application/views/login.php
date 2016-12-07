<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
    <head>
        <meta charset="utf-8"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1" ></meta>
        <title><?php
            if (!empty($title)) {
                echo($title);
            }
            ?>
        </title>
        <script src="http://localhost/cbr/assets/js/jquery-1.12.3.js"></script>
        <script src="http://localhost/cbr/assets/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type = "text/css" href="http://localhost/cbr/assets/css/bootstrap.min.css"></link>
        <link rel="stylesheet" type="text/css" href="http://localhost/cbr/assets/css/login.css"></link>

    </head>
    <body>
        <div class="container container-fluid">
            <form class="form-horizontal" method="post" action="login/user_validate">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="username">Username:</label>
                    <div class="col-sm-9">
                        <input  class="form-control" type="text" name="username" placeholder="Enter your email address or username"required="required"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="password" >Password</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="password" name="password" required="required"/>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-9">
                        <button type="submit" class="btn btn-info">Login</button>
                        <button type="submit" class="btn btn-warning">Create Account</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
