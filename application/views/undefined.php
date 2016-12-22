<?php
include 'home_header.php';
if ($_SESSION['is_logged_in']) {
    ?>
    <div id="Cases" class="w3-container w3-white w3-padding-16"  style="margin-top: 2%;">
        <div class="wrapper wrapper-content animated fadeInRight">


            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h3>View Undefined Symptoms</h3>
                        </div>
                        <div class="activation_function"></div>
                        <div class="ibox-content">
                            <table class="table table-bordered table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th>Symptom ID</th>
                                        <th>Symptom Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($symptom2 as $key => $value) {
                                        echo "<tr>"
                                        . "<td>{$value->symptom_id}</td>"
                                        . "<td>{$value->symptom_name}</td>";
                                        
                                        echo "<td width='40' align='left'><a href='#' class='btn btn-info btn-xm' onclick='active({$value->symptom_id})'>Activate</a></td>";
                                        echo "<td width='40' align='left' ><a href='#' class='btn btn-danger btn-xm' onclick='deletes({$value->symptom_id})'>Delete </a></td>
               
                ";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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
            var x = document.getElementById('case');
            x.className = 'w3-red';
            var y = document.getElementById('active_bar3');
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
            var fy = document.getElementById('active_bar6');
            fy.style.color = "#000000";
            //            var gy = document.getElementById('active_bar7');
            //            gy.style.color = "#000000";

    //            var hy = document.getElementById('active_bar8');
    //            hy.style.color = "#000000";
        });
        $(document).ready(function () {
            $('#dataTables').DataTable();
        });

        $("#symptomBtn").click(function () {
            $("#addSymptom").modal({backdrop: false});
        });

        function active(data) {

            srvRqst = $.ajax({
                url: 'http://localhost/cbr/symptom/active_symptom',
                type: 'post',
                data: {symptom_id: data},
                datatype: {},

            });
            srvRqst.done(function (response) {
                var html = '<p class="alert alert-danger">Symptom Modified</p>';
                $('div.activation_function').html(html);
            });

        }

        function deletes (data) {
            srvRqst = $.ajax({
                url: 'http://localhost/cbr/symptom/delete_symptoms',
                type: 'post',
                data: {symptom_id: data},
                datatype: {},

            });
            srvRqst.done(function (response) {
                var html = '<p class="alert alert-danger">Symptom Modified</p>';
                $('div.activation_function').html(html);
            });
        }
    </script>

    </body>
    <?php
} else {
    redirect('login');
}
?>
</html>
