<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ($_SESSION['is_logged_in']) {
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
                <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"></link>
                <link rel="stylesheet" type="text/css" href="assets/css/style.css"></link>
                <link rel="stylesheet" type="text/css" href="/cbr/assets/css/chat.css"></link>  
                <link rel="stylesheet" href="assets/css/jquery-ui.min.css"></link>
                <link rel="stylesheet" href="assets/css/jquery-ui.theme.min.css"></link>
                <link rel="stylesheet" type="text/css" href="assets/css/w3.css"></link>
                <link rel="stylesheet" type="text/css" href="assets/css/family.css"></link>
                <link rel="stylesheet" type="text/css" href="assets/admin/font-awesome/css/font-awesome.css"></link>
                <link rel="stylesheet" type="text/css" href="assets/admin/css/plugins/iCheck/custom.css"></link>
                <link rel="stylesheet" type="text/css" href="assets/admin/css/animate.css"></link>
                <link rel="stylesheet" type="text/css" href="assets/admin/css/plugins/summernote/summernote.css"></link>
                <link rel="stylesheet" type="text/css" href="assets/admin/css/plugins/summernote/summernote-bs3.css"></link>
                <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css"></link>
                <!--                <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"></link>
                                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"></link>
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"></link>-->
                <script type="text/javascript" src='assets/js/jquery-1.12.3.js'></script>
                
                <script type= "text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
                <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="assets/jqueryui/jquery-ui.min.js"></script> 
                <script type="text/javascript" src="assets/js/chat.js"></script>
                <script type="text/javascript" src='assets/admin/js/plugins/metisMenu/jquery.metisMenu.js'></script>
                <script type="text/javascript" src='assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js'></script>
                <script type="text/javascript" src='assets/admin/js/inspinia.js'></script>
               
                <script type="text/javascript" src="assets/admin/js/plugins/pace/pace.min.js"></script>
                <script type="text/javascript" src="assets/admin/js/plugins/iCheck/icheck.min.js"></script>
                <script type="text/javascript" src="assets/admin/js/plugins/summernote/summernote.min.js"></script>
                <style>
                    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
                    .myLink {display: none}
                </style>
                <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico"></link>
        </head>
    <?php
    }?>