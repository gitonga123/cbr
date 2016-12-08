<?php
defined('BASEPATH') or exit("No direct script access allowed");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1" ></meta>
            <title><?php
                if (!empty($title)) {
                    echo($title);
                }
                ?></title>
            <link rel="stylesheet" type="text/css" href="http://localhost/cbr/assets/css/login.css"></link>
            <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"></link>
            <link rel="stylesheet" type="text/css" href="assets/css/style.css"></link>  
            <link rel="stylesheet" href="assets/css/jquery-ui.min.css"></link>
            <link rel="stylesheet" href="assets/css/jquery-ui.theme.min.css"></link>
            <link rel="stylesheet" type="text/css" href="assets/css/w3.css"></link>
            <link rel="stylesheet" type="text/css" href="assets/css/family.css"></link>
            <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css"></link>
            <!--                <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"></link>
                            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"></link>
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"></link>
                            <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css"></link>-->
            <script type="text/javascript" src='assets/js/jquery-1.12.3.js'></script>
            <script type= "text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="assets/jqueryui/jquery-ui.min.js"></script> 
            <style>
                body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
                .myLink {display: none}
            </style>
            <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico"></link>
    </head>

    <body>

        <form class="form-horizontal" action="/cbr/welcome/new_user" method="POST" id="add_new_user" style="margin-left:25%; margin-top: 50px; padding: 50px;">
            <ul id="progressbar">
                <li class="active">Personal Information</li>
                <li>Residential Details</li>
                <!--<li>Residential Details</li>-->

            </ul>
            <fieldset>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="first_name">First Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="first_name" required="required" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="surname">surname:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="surname" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="username">username:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" placeholder="choose a username">
                    </div>
                </div>
                <div class="form-group">

                    <label class="control-label col-sm-2" for="password">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" />
                    </div>
                </div>

                <div class="form-group">

                    <label class="control-label col-sm-2" for="password2">Confirm Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password2"/> 
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="mobile">Phone Number:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="mobile">
                    </div>
                </div>

                <div class="form-group">

                    <label class="control-label col-sm-2" for="address">Physical Address:</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" rows="5" name="address"></textarea> 
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="previous " id="box1-trigger"><i class="fa fa-arrow-left"></i> Prev</div>
                <div class="next" id="box1-trigger">Next <i class="fa fa-arrow-right"></i></div>
            </fieldset>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="submit" value="New User" class="btn btn-primary active">
                </div>
            </div>
        </form>
        <script>

            $(function () {
                //jQuery time
                var current_fs, next_fs, previous_fs; //fieldsets
                var left, opacity, scale; //fieldset properties which we will animate
                var animating; //flag to prevent quick multi-click glitches

                $(".next").click(function () {
                    if (animating)
                        return false;
                    animating = true;

                    current_fs = $(this).closest('fieldset');
                    next_fs = $(this).closest('fieldset').next();

                    //activate next step on progressbar using the index of next_fs
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                        step: function (now, mx) {
                            //as the opacity of current_fs reduces to 0 - stored in "now"
                            //1. scale current_fs down to 80%
                            scale = 1 - (1 - now) * 0.2;
                            //2. bring next_fs from the right(50%)
                            left = (now * 50) + "%";
                            //3. increase opacity of next_fs to 1 as it moves in
                            opacity = 1 - now;
                            current_fs.css({'transform': 'scale(' + scale + ')'});
                            next_fs.css({'left': left, 'opacity': opacity});
                        },
                        duration: 800,
                        complete: function () {
                            current_fs.hide();
                            animating = false;
                        },
                        //this comes from the custom easing plugin
                        easing: 'easeInOutBack'
                    });
                });

                $(".previous").click(function () {
                    if (animating)
                        return false;
                    animating = true;

                    current_fs = $(this).closest('fieldset');
                    previous_fs = $(this).closest('fieldset').prev();

                    //de-activate current step on progressbar
                    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                    //show the previous fieldset
                    previous_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                        step: function (now, mx) {
                            //as the opacity of current_fs reduces to 0 - stored in "now"
                            //1. scale previous_fs from 80% to 100%
                            scale = 0.8 + (1 - now) * 0.2;
                            //2. take current_fs to the right(50%) - from 0%
                            left = ((1 - now) * 50) + "%";
                            //3. increase opacity of previous_fs to 1 as it moves in
                            opacity = 1 - now;
                            current_fs.css({'left': left});
                            previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
                        },
                        duration: 800,
                        complete: function () {
                            current_fs.hide();
                            animating = false;
                        },
                        //this comes from the custom easing plugin
                        easing: 'easeInOutBack'
                    });
                });

                $(".submit").click(function () {
                    return false;
                })


            });
        </script>
    </body>
</html>