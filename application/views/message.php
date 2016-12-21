
<?php
include 'home_header.php';
if ($_SESSION['is_logged_in']) {
    ?>
    <link rel="stylesheet" type="text/css" href="/cbr/assets/admin/css/style2.css"></link>
    <div id="consulations" class="w3-container w3-white w3-padding-16"  style="margin-top: 2%;">
        <div id="wrapper">
            <div class="wrapper wrapper-content" style="height: 500px;">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content mailbox-content">
                                <div class="file-manager">
                                    <ul class="tab folder-list m-b-md" style="padding: 0; margin: 30px;">

                                        <li><a href="javascript:void(0)" class="tablinks btn btn-block btn-primary" onclick="openCity(event, 'compose-mail')" > Compose Mail</a></li>
                                        <div class="space-25"></div>
                                        <li><h5 style="margin: 30px;">Folders</h5></li>
                                        <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'inbox')" id="defaultOpen"><i class="fa fa-inbox "></i>
                                                Inbox <span class="label label-warning pull-right"><b class="inbox_size"></b></span></a></li>
                                        <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'sendMail')" > <i class="fa fa-envelope-o"></i> Send Mail</a></li>
                                        <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'important')"><i class="fa fa-certificate"></i> Important</a></li>
                                        <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'draft')"> <i class="fa fa-file-text-o"></i> Drafts <span class="label label-danger pull-right">2</span></a></li>
                                        <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'trash')" > <i class="fa fa-trash-o"></i> Trash</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="inbox" class="tabcontent col-lg-9 animated fadeInRight">
                        <div class="mail-box-header">
                            <form method="get" action="index.html" class="pull-right mail-search">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm" name="search" placeholder="Search email">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-warning">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <h2>Inbox(<b class="inbox_size"></b>)</h2>
                            <div class="mail-tools tooltip-demo m-t-md">
                                <div class="btn-group pull-right">
                                    <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                                    <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button> 
                                </div>
                                <button class="btn btn-white btn-sm" id="refresh-inbox" data-toggle="tooltip" data-placement="left" title="Refresh inbox">
                                    <i class="fa fa-refresh"></i> Refresh</button>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash" onclick="delete_msg()">
                                    <i class="fa fa-trash-o"></i> </button>
                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash" onclick="mark_important()">
                                    <i class="fa fa-certificate"></i> Mark Important</button>
                                <div class="mail-box" style="margin: 30px;">
                                    <div class="read-inbox">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="sendMail" class="tabcontent col-lg-9 animated fadeInRight">
                        <div class="mail-tools tooltip-demo m-t-md">
                            <div class="btn-group pull-right">
                                <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                                <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button> 
                            </div>
                            <button class="btn btn-white btn-sm" id="refresh_outbox" data-toggle="tooltip" data-placement="left" title="Refresh inbox">
                                <i class="fa fa-refresh"></i> Refresh</button>
                            <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash">
                                <i class="fa fa-trash-o"></i> </button>
                            <div class="mail-box" style="margin: 30px;">
                                <div class="read_outbox">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="important" class="tabcontent">
                        <div class="mail-tools tooltip-demo m-t-md">
                            <div class="btn-group pull-right">
                                <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                                <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button> 
                            </div>
                            <button class="btn btn-white btn-sm" id="refresh_important" data-toggle="tooltip" data-placement="left" title="Refresh inbox">
                                <i class="fa fa-refresh"></i> Refresh</button>
                            <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash">
                                <i class="fa fa-trash-o"></i> </button>
                            <div class="mail-box" style="margin: 30px;">
                                <div class="read_important">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div id="trash" class="tabcontent">
                        <p>Deleted</p>
                    </div>
                    <div id="compose-mail" class="tabcontent col-lg-9 animated fadeInRight">
                        <div class="mail-box-header">
                            <div class="pull-right tooltip-demo">
                                <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
                            </div>
                            <h2>Compose Mail</h2>
                        </div>
                        <div class="mail-box">
                            <div class="send_mail_notification">
                                <div class="mail-body">
                                    <form class="form-horizontal" method="post" action="" id="email_form">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">To:</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="user-emails" name="receipt_email" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 control-label">Subject:</label>

                                            <div class="col-sm-10"><input type="text" class="form-control" name="subject" required="required" id="emailtitle"></div>
                                        </div>


                                        <div class="mail-text h-200">

                                            <textarea class="summernote" placeholder="type message here" name="message_sent" required="required">

                                            </textarea>
                                            <div class="clearfix"></div>
                                            <div class="mail-body text-right tooltip-demo">
                                                <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Send" id="send_emails" onclick="save()"><i class="fa fa-reply"></i> Send</button>
                                                <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
                                                <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
            var x = document.getElementById('message');
            x.className = 'w3-red';

            var y = document.getElementById('active_bar5');
            y.style.color = "white";
            y.style.display = "block";
            x.className += ' w3-hover-blue';

            var ay = document.getElementById('active_bar2');
            ay.style.color = "black";

            var cy = document.getElementById('active_bar');
            cy.style.color = "#000000";
            var dy = document.getElementById('active_bar3');
            dy.style.color = "#000000";
            var ey = document.getElementById('active_bar4');
            ey.style.color = "#000000";
            var fy = document.getElementById('active_bar6');
            fy.style.color = "#000000";
            //            var gy = document.getElementById('active_bar7');
            //            gy.style.color = "#000000";

            var hy = document.getElementById('active_bar8');
            hy.style.color = "#000000";
        });

        $(document).ready(function () {
            $("#refresh-inbox").click(function (event) {
                event.preventDefault();
                check_in_box();
            });
        });

        $(document).ready(function () {
            $("#refresh_outbox").click(function (event) {
                event.preventDefault();

                check_out_box();
            });
            
            $("#refresh_important").click(function (event) {
                event.preventDefault();

                check_out_important();
            });
            
        });
        //Auto suggest for email address
        var srvRqst = $.ajax({
            url: 'http://localhost/cbr/index.php/welcome/get_email_address',
            data: {},
            type: 'post',
            datatype: 'json'

        }
        );
        srvRqst.done(function (response) {
            var dataSource = $.parseJSON(response);
            $("#user-emails").autocomplete({
                source: dataSource
            });
        });

        function sendemail() {
            var user = $('#user-emails').val();
            var title = $('#emailtitle').val();
            var aHTML = $('.summernote').code();
            a
        }

        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });
            $('.summernote').summernote();
        });

        var edit = function () {
            $('.click2edit').summernote({focus: true});
        };

        var save = function () {
            var user = $('#user-emails').val();
            var title = $('#emailtitle').val();
            var aHTML = $('.summernote').code();

            $srvrequest = $.ajax({
                url: 'http://localhost/cbr/index.php/welcome/send_email',
                type: 'post',
                data: {receipt_email: user, subject: title, message_sent: aHTML},
                datatype: 'text',

            });
            srvRqst.done(function (response) {
                $('.summernote').destroy();
                var html = '<p class="alert alert-danger">Message Send Successfully</p>';
                $('div.send_mail_notification').html(html);
            });

        };

        ;
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();

    </script>
    </body>
    <?php
} else {
    redirect('login');
}
?>
</html>