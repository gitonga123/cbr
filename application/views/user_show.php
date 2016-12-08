<?php
defined('BASEPATH') or exit('No direct script access is allowed');
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
            <link rel="stylesheet" type="text/css" href="/cbr/assets/css/chat.css"></link>  
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"></link>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"></link>
            <script type="text/javascript" src='/cbr/assets/js/jquery-1.12.3.js'></script>
            <script type="text/javascript" src="/cbr/assets/js/bootstrap.min.js"></script>
            <style>
                body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
                .myLink {display: none}
            </style>
            <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico"></link>
    </head>
    <body>
       
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-comment"></span> Chat
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-refresh">
                                            </span>Refresh</a></li>
                                    <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-ok-sign">
                                            </span>Available</a></li>
                                    <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-remove">
                                            </span>Busy</a></li>
                                    <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-time"></span>
                                            Away</a></li>
                                    <li class="divider"></li>
                                    <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-off"></span>
                                            Sign Out</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <ul class="chat">
                                <div class="chat_result">
                                    
                                </div>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <form method="post" action="" id="send_message">
                                <div class="input-group">
                                    <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." name ="message"/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-warning btn-sm" id="btn-chat">
                                            Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function () {
                    $('form#send_message').on('submit', function (form) {
                        form.preventDefault();
                        $.post('send_message', $('form#send_message').serialize(), function (data) {
                            $('div.chat_result').html(data);
                        });
                    });
                });
            </script>

        </div>

    </body>
</html>
