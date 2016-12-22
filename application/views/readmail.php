
<?php
include 'home_header.php';
if ($_SESSION['is_logged_in']) {
    extract($mail_content);
    ?>
    <link rel="stylesheet" type="text/css" href="/cbr/assets/admin/css/style2.css"></link>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content mailbox-content">
                        <div class="file-manager">
                            <ul class="tab folder-list m-b-md" style="padding: 0; margin: 30px;">

                                <li><a href="/cbr/welcome/message" class="btn btn-block btn-primary"  style="color:white;"> Compose Mail</a></li>
                                <div class="space-25"></div>
                                <li><h5 style="margin: 30px;"></h5></li>
                                
                                <li><a href="/cbr/welcome/message" class="btn btn-block btn-warning" style="color:white"> <i class="fa fa-envelope-o"></i>Inbox</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 animated fadeInRight">
                <div class="mail-box-header">
                    <div class="pull-right tooltip-demo">
                        <a href="/cbr/welcome/message" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Reply"><i class="fa fa-reply"></i> Reply</a>
                        <!--<a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Print email"><i class="fa fa-print"></i> </a>-->
                        <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </a>
                    </div>
                    <h2>
                        View Message
                    </h2>
                    <div class="mail-tools tooltip-demo m-t-md">


                        <h3>
                            <span class="font-bold">Subject: </span><?php echo $title?>.
                        </h3>
                        <h5>
                            <span class="pull-right font-bold"><?php echo $timestamp ?></span>
                            <span class="font-bold">From: </span><?php echo $msg_from?>
                        </h5>
                    </div>
                </div>
                <div class="mail-box">


                    <div class="mail-body">
                       <?php 
                        echo "<p>".$message. "</p>";
                       ?>
                    </div>

                    <div class="mail-body text-right tooltip-demo">
                        <a class="btn btn-sm btn-white" href="/cbr/welcome/message"><i class="fa fa-reply"></i> Reply</a>
                        <a class="btn btn-sm btn-white" href="/cbr/welcome/message"><i class="fa fa-arrow-right"></i> Forward</a>
<!--                        <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Print" class="btn btn-sm btn-white"><i class="fa fa-print"></i> Print</button>
                        <button title="" data-placement="top" data-toggle="tooltip" data-original-title="Trash" class="btn btn-sm btn-white"><i class="fa fa-trash-o"></i> Remove</button>-->
                    </div>
                    <div class="clearfix"></div>


                </div>
            </div>
        </div>
    </div>


    <?php
    include 'home_footer.php';
    ?>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
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

//            var hy = document.getElementById('active_bar8');
//            hy.style.color = "#000000";
        });
        
    </script>
    </body>
    <?php
} else {
    redirect('login');
}
?>
</html>
