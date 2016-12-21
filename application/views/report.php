<?php
include 'home_header.php';
if ($_SESSION['is_logged_in']) {
    ?>

    <div id="Cases" class="w3-container w3-white w3-padding-16"  style="margin-top: 2%;">
        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">
                <div class="wrapper wrapper-content animated fadeInRight">


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h3>View Reports</h3>

                                    <div class="hr-line-dashed"></div>
                                    <div class="ibox-content">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Select Report:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control m-b" name="account" id="searchReport">
                                                    <option value="">--Select Report--</option>
                                                    <option value="case_view">Graphical Case View</option>
                                                    <option value="case_summary">Case Summary</option>
                                                    <option value="sytem_user">Summary of System Users</option>
                                                    <option value="frequently_searched">Frequent Searched Cases</option>                                             
                                                </select>
                                            </div>
                                        </div> 
                                    </div>
                                </div> 
                            </div>                              
                        </div>
                    </div>
                    <div class="row" id="case_summaries">

                        <div class="ibox-content">
                            <div class="case_view_graphical">
                                <canvas id="case_view_graphical" height="100"></canvas>
                            </div>

                            <div class="row" id="case_summary_view">
                                <div class="col-lg-12">
                                    <h3>Symptoms With out Any Case</h3>
                                    <div class="symptom_unaccount">

                                    </div>
                                </div>
                                <div class="col-log-12">
                                    <h3>Symptom Frequency</h3>
                                    <div class="symptom_frequency">
                                        <canvas id="symptom_frequency" height="100"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="frequent_searched_case">
                        <div class="col-lg-12">
                            <div class="ibox-content">
                                <div class="frequent_search">
                                    <canvas id="frequent_search" height="100"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row" id="system_users">
                        <div class="ibox-content">
                            <div class="reports_areas"></div>
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
            var x = document.getElementById('report');
            x.className = 'w3-red';
            var y = document.getElementById('active_bar6');
            y.style.color = "white";
            y.style.display = "block";
            x.className += ' w3-hover-blue';
            var ay = document.getElementById('active_bar2');
            ay.style.color = "black";
            //            var by = document.getElementById('active_bar2');
            //            by.style.color = "#000000";

            var cy = document.getElementById('active_bar');
            cy.style.color = "#000000";
            var dy = document.getElementById('active_bar4');
            dy.style.color = "#000000";
            var ey = document.getElementById('active_bar5');
            ey.style.color = "#000000";
            var fy = document.getElementById('active_bar3');
            fy.style.color = "#000000";
            //            var gy = document.getElementById('active_bar7');
            //            gy.style.color = "#000000";

            var hy = document.getElementById('active_bar8');
            hy.style.color = "#000000";
        });


    </script>

    </body>
    <?php
} else {
    redirect('login');
}
?>
</html>