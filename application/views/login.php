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
        <link rel="stylesheet" type="text/css" href="assets/css/w3.css"></link>

    </head>
    <body class="w3-light-grey">
        <ul class="w3-navbar w3-white w3-border-bottom w3-xlarge">
            <li><a href="#" class="w3-text-blue w3-hover-blue-gray"><b><i class="w3-margin-right"><img src="assets/images/logo11.png" /></i>CBR DIAGNOSIS</b></a></li>
            <li class="w3-right"><a href="signup" class="w3-hover-red w3-text-black"><i class="fa fa-sign-out"></i>Sign up</a></li>
            <li class="w3-right"><a href="login/logout" class="w3-hover-red w3-text-black"><i class="fa fa-mobile-phone"></i>Contact</a></li>
            <li class="w3-right"><a href="login/logout" class="w3-hover-red w3-text-black"><i class="fa fa-book"></i>About</a></li>
            <li class="w3-right"><a href="login/logout" class="w3-hover-red w3-text-black"><i class="fa fa-home"></i>Home</a></li>
        </ul>
        <header class="w3-display-container w3-content w3-hide-medium" style="max-width:2000px">
            <img class="w3-image" src="assets/images/9466516615.jpg" alt="Medical" width="1500" height="700" />
            <div class="w3-display-middle" style="width:90%; height: 90%">

                
                <div class="w3-container w3-half w3-margin-top">

                    <form class="w3-container w3-card-4">

                        <p>
                            <input class="w3-input" type="text" style="width:90%" required>
                                <label class="w3-label w3-validate">Name</label></p>
                        <p>
                            <input class="w3-input" type="password" style="width:90%" required>
                                <label class="w3-label w3-validate">Password</label></p>

                        <p>
                            <input class="w3-radio" type="radio" name="gender" value="male" checked>
                                <label class="w3-validate">Male</label></p>

                        <p>
                            <input class="w3-radio" type="radio" name="gender" value="female">
                                <label class="w3-validate">Female</label></p>

                        <p>
                            <input class="w3-radio" type="radio" name="gender" value="" disabled>
                                <label class="w3-validate">Don't know (Disabled)</label></p>

                        <p>
                            <input id="milk" class="w3-check" type="checkbox" checked="checked">
                                <label class="w3-validate">Stay logged in</label></p>

                        <p>
                            <button class="w3-btn w3-section w3-teal w3-ripple"> Log in </button></p>

                    </form>

                </div>
                <!--                <div class="container container-fluid">
                                    <form class="form-horizontal" method="post" action="/cbr/login/user_validate">
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
                                </div>-->
            </div>
    </body>
</html>
