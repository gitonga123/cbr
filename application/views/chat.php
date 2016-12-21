<?php
include 'home_header.php';
if ($_SESSION['is_logged_in']) {
    ?>
    <div id="consulations" class="w3-container w3-white w3-padding-16"  style="margin-top: 2%;">

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
                                    <li><a href="#" id="refresh" onclick="updateChats()"><span class="glyphicon glyphicon-refresh">
                                            </span>Refresh</a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-ok-sign">
                                            </span>Available</a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-remove">
                                            </span>Busy</a></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-time"></span>
                                            Away</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><span class="glyphicon glyphicon-off"></span>
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
                            <form method="post" action="" id="chat_message_content">
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


        </div>
    </div>
    <?php
    include 'home_footer.php';
    ?>
    <script>
        $(document).ready(function () {
            var x = document.getElementById('consulation');
            x.className = 'w3-red';

            var y = document.getElementById('active_bar4');
            y.style.color = "white";
            y.style.display = "block";
            x.className += ' w3-hover-blue';

            var ay = document.getElementById('active_bar2');
            ay.style.color = "black";

            var cy = document.getElementById('active_bar');
            cy.style.color = "#000000";
            var dy = document.getElementById('active_bar3');
            dy.style.color = "#000000";
            var ey = document.getElementById('active_bar5');
            ey.style.color = "#000000";
            var fy = document.getElementById('active_bar6');
            fy.style.color = "#000000";
            //            var gy = document.getElementById('active_bar7');
            //            gy.style.color = "#000000";

            var hy = document.getElementById('active_bar8');
            hy.style.color = "#000000";
        });
        
            $('#chat_message_content').on('submit', function (e) {
                e.preventDefault();

                $.post('/cbr/welcome/send_message', $('#chat_message_content').serialize(), function (data) {
                    $('div.chat_result').html(data);

                });
            });


            $("#btn-chat").click(function () {
                $("#btn-input").trigger(':reset');
            });
       
    </script>
    </body>
    <?php
} else {
    redirect('login');
}
?>
</html>