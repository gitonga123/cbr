<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ($_SESSION['is_logged_in']) {
        $image = "/cbr/assets/images/profile_small.jpg";
        $first_name = $_SESSION['first_name'];
        $second_name = $_SESSION['surname'];
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

                <link rel="stylesheet" type="text/css" href="/cbr/assets/css/bootstrap.min.css"></link>
                <link rel="stylesheet" type="text/css" href="/cbr/assets/css/style.css"></link> 
                <link rel="stylesheet" type="text/css" href="/cbr/assets/admin/css/style.css"></link>
                <!--<link href="/cbr/assets/admin/css/plugins/toastr/toastr.min.css" rel="stylesheet"></link>-->

                <link rel="stylesheet" type="text/css" href="/cbr/assets/css/chat.css"></link> 
                <link rel="stylesheet" href="/cbr/assets/css/jquery-ui.min.css"></link>
                <link rel="stylesheet" href="/cbr/assets/css/jquery-ui.theme.min.css"></link> 
                <link rel="stylesheet" type="text/css" href="/cbr/assets/css/w3.css"></link>
                <link rel="stylesheet" type="text/css" href="/cbr/assets/css/family.css"></link> 
                <link rel="stylesheet" type="text/css" href="/cbr/assets/admin/font-awesome/css/font-awesome.css"></link>
                <link rel="stylesheet" type="text/css" href="/cbr/assets/admin/css/plugins/iCheck/custom.css"></link> 
                <link rel="stylesheet" type="text/css" href="/cbr/assets/admin/css/animate.css"></link>
                <link rel="stylesheet" type="text/css" href="/cbr/assets/admin/css/plugins/summernote/summernote.css"></link>
                <link rel="stylesheet" type="text/css" href="/cbr/assets/admin/css/plugins/summernote/summernote-bs3.css"></link>
                <link rel="stylesheet" type="text/css" href="/cbr/assets/css/jquery.dataTables.min.css"></link> 
                <!--                <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"></link>
                                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"></link>
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"></link>-->
                <style>
                    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
                    .myLink {display: none}
                </style>
                <link rel="icon" type="image/x-icon" href="/cbr/assets/images/favicon.ico"></link>
        </head>
        <body class="top-navigation">

            <div id="wrapper">
                <div id="page-wrapper" class="gray-bg" style="background-image: url('/cbr/assets/images/11.png');">
                    <div class="row border-bottom white-bg">
                        <nav class="navbar navbar-static-top" role="navigation">
                            <div class="navbar-header">
                                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                    <i class="fa fa-reorder"></i>
                                </button>
                                <a href="#" class="navbar-brand w3-hover-blue" style="background-color: white; color:#2196F3"><b><i class="w3-margin-right"><img src="/cbr/assets/images/logo11.png" height="30px;"></i>CBR DIAGNOSIS</b></a>
                            </div>

                            <div class="navbar-collapse collapse" id="navbar">
                                <ul class="nav navbar-nav">
                                    <li class="active" id="home">
                                        <a id="active_bar" aria-expanded="false" role="button" href="/cbr/welcome" class="w3-hover-blue"><i class="fa fa-home w3-margin-right"></i>Home</a>
                                    </li>
                                    <li class="active" id="search1">
                                        <a id="active_bar2" aria-expanded="false" role="button" href="/cbr/search" class="w3-hover-blue"><i class="fa fa-search w3-margin-right"></i>Search Diagnosis</a>
                                    </li>
                                    <?php if (($_SESSION['user_category'] = "Admin") || ($_SESSION['user_category'] = "Doctor")) {
                                        ?>

                                        <li class="dropdown" id="case">
                                            <a id="active_bar3" aria-expanded="false" role="button" href="case" class="dropdown-toggle w3-hover-blue" data-toggle="dropdown"><i class="fa fa-briefcase w3-margin-right"></i> Cases <span class="caret"></span></a>
                                            <ul role="menu" class="dropdown-menu w3-hover-blue">
                                                <li style="color: black; font-size: 15px;"><a href="/cbr/cases">System Cases</a></li>

                                                <li style="color: black; font-size: 15px;"><a href="/cbr/disease">Disease</a></li>
                                                <li style="color: black; font-size: 15px;"><a href="/cbr/symptom">Symptom</a></li>

                                            </ul>
                                        </li>
                                    <?php } ?>

                                    <li class="active" id="consulation">
                                        <a id="active_bar4" aria-expanded="false" role="button" href="/cbr/welcome/chat" class="w3-hover-blue"><i class="fa fa-hospital-o w3-margin-right"></i>Live Consultation</a>
                                    </li>

                                    <li class="active" id="message">
                                        <a id="active_bar5" aria-expanded="false" role="button" href="/cbr/welcome/message" class="w3-hover-blue"><i class="fa fa-envelope-square w3-margin-right"></i>Messages</a>
                                    </li>
                                    <?php if (($_SESSION['user_category'] = "Admin") || ($_SESSION['user_category'] = "Doctor")) {
                                        ?>
                                        <li class="active" id="report">
                                            <a id="active_bar6" aria-expanded="false" role="button" href="/cbr/welcome/report" class="w3-hover-blue"><i class="fa fa-bar-chart w3-margin-right"></i>Reports</a>
                                        </li>
                                    <?php } ?>
                                    <!--                                    <li class="dropdown" id="report">
                                                                            <a id="active_bar6" aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bar-chart w3-margin-right"></i>Reports <span class="caret"></span></a>
                                                                            <ul role="menu" class="dropdown-menu">
                                                                                <li><a href="">Menu item</a></li>
                                                                                <li><a href="">Menu item</a></li>
                                                                                <li><a href="">Menu item</a></li>
                                                                                <li><a href="">Menu item</a></li>
                                                                            </ul>
                                                                        </li>-->

                                    <!-- <li class="active">
                                        <a id="active_bar7" aria-expanded="false" role="button" href="#" ><i class="fa fa-home w3-margin-right"></i>Learn More</a>
                                    </li> -->

                                    <!--                                    <ul class="nav navbar-top-links navbar-right" >
                                                                            <li class="dropdown">
                                                                                <a id="active_bar8" aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user w3-margin-right"></i>Profile <span class="caret"></span></a>
                                                                                <ul role="menu" class="dropdown-menu">
                                                                                    <li>
                                                                                        <a href="/cbr/login/logout" id="active_bar9"> 
                                                                                            <i class="fa fa-sign-out"></i> Log out
                                                                                        </a>
                                                                                    </li>
                                    
                                                                                    <li><a href="">View My profile</a></li>
                                                                                </ul>
                                                                            </li>
                                    
                                                                        </ul>-->
                                    <ul class="nav navbar-top-links navbar-right"  style="margin-left: 20px">
                                        <div class="dropdown profile-element"> <span>
                                                <img alt="image" class="img-circle" src="<?php echo $image;?>" />
                                            </span>
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $first_name . "  " .$second_name;?></strong>
                                                    </span> <span class="text-muted text-xs block"><?php echo $_SESSION['user_category'];?><b class="caret"></b></span> </span> </a>
                                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                                <li><a href="profile.html">Profile</a></li>

                                                <li class="divider"></li>
                                                <li><a href="/cbr/login/logout">Logout</a></li>
                                            </ul>
                                        </div>
                                    </ul>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <?php
                }?>