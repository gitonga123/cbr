<?php
include 'home_header.php';
if ($_SESSION['is_logged_in']) {
    ?>
    <style type="text/css">
        .loader{
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-right: 5px solid green;
            border-left: 5px solid red; 
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 2s linear infinite;

        }
        @keyframes spin{
            0% { transform: rotate(0deg); }
            100% {transform: rotate(360deg);}
        }
    </style>
    <div id="Cases" class="w3-container w3-white w3-padding-16"  style="margin-top: 1%;">
        <h3>Cases: Disease and Symptom Combination</h3>
        <button type="button" class="btn btn-info btn-mini" id="myBtn2"><i class="fa fa-bookmark w3-margin-right"></i>Create A Case</button>
        <span style="margin-left: 20px;"></span>

        <a  class="btn btn-info btn-mini" href="#" onclick="activate_all()"><i class="fa fa-toggle-on w3-margin-right">Activate All</i></a>     
        <span style="margin-left: -20px;">

        </span> 
        <a  class="btn btn-warning btn-mini" href="#" onclick="diactivate_all()"><i class="fa fa-toggle-on w3-margin-right">Diactivate All</i></a> 
        <?php
        if (empty($error_message) || $error_message = "Nothing to insert") {
            
        } else {
            echo " <p class='alert alert-info'> {$error_message}</p>";
        }
        ?>
        <div class="loader">

        </div>
        <div class="activation_case"></div>
        <div>
            <?php
            echo "<table class='table table-hover' id='table_case'>
                    <thead>
                        <tr>
                            <th>Case Number</th>
                             <th>Disease Name</th>
                            <th>Symptom Name</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                  <tbody>";
            foreach ($disease as $value_cases) {
                $num = 0;
                foreach ($symptom as $value_symptom) {
                    if ($value_cases->disease_id == $value_symptom->disease_id) {
                        $check = (int) sizeof($value_symptom->symptom_name);
                        $num = $num + $check;
                    }
                }
                echo "<tr><th rowspan='{$num}'>" . $num . "</th>";

                echo "<th rowspan='{$num}'>" . $value_cases->disease_name . "</th>";

                foreach ($symptom as $value_symptom) {
                    if ($value_cases->disease_id == $value_symptom->disease_id) {
                        if ($value_symptom->active) {
                            echo "<td>{$value_symptom->symptom_name}</td><td id='thumbs_up'><a href='#' class='btn btn-danger bt-xs' onclick='deletes({$value_symptom->cases_id})'> <i class='fa fa-thumbs-o-down'></i></td></tr>";
                        } else {
                            echo "<td>{$value_symptom->symptom_name}</td><td id='thumbs_down'><a href='#' class='btn btn-info bt-xs' onclick='actives({$value_symptom->cases_id})'><i class='fa fa-thumbs-up'></i></td></tr>";
                        }
                    }
                }
            }

            echo "</tbody></table>";
            ?>
        </div>

        <!-- Create a New Case-->
        <div class="modal fade" id="myModal2" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Create A Case: Select one Disease and Multiple Symptoms</h4>
                    </div>

                    <div class="modal-body"> 
                        <form method="post" action="/cbr/cases" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="disease_name">Select Disease</label>
                                <div class="col-sm-10">
                                    <select class="form-control input-sm" id="selelection_new" name="selection1" required="required">
                                        <option>--Select--</option>
                                        <?php
                                        foreach ($disease2 as $disease_value) {
                                            echo "<option value='" . $disease_value->disease_id . "'>" . $disease_value->disease_name . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="symptom_name">Select Symptom</label>
                                <div class="col-sm-10">
                                    <select class="form-control input-sm" id="selection_new2" name="selection2[]" multiple="multiple" required="required">
                                        <option>--Select--</option>
                                        <?php
                                        foreach ($symptom2 as $symptom_value) {
                                            echo "<option value='" . $symptom_value->symptom_id . "'>" . $symptom_value->symptom_name . "</option>";
                                        }
                                        ?>  
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class='col-sm-offset-2 col-sm-10'>
                                    <input type="submit" name="submit" value="Add New Disease" class="btn btn-primary active">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <!--        End of create Case Modal-->


        <!-- EDIT A CASE-->

        <div class="modal fade" id="editCase" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <form method="post" class="form-horizontal" id="form1">
                            <div class="form-group">
                                <label class="modal-title" for="disease_name">Select Case to Edit:</label>
                                <div class="col-sm-10">
                                    <select class="form-control input-sm" id="sel1" name="selection1">
                                        <option>--Select--</option>
                                        <?php
                                        foreach ($disease as $disease_value) {
                                            echo "<option value='" . $disease_value->disease_id . "'>" . $disease_value->disease_name . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>




                    <div class="modal-body" id="modal-bodies">
                        <div id="result">

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <div style="padding-top: 10%;"></div>
    <?php
    require_once 'home_footer.php';
    ?>
    <script>
        $('#sel1').on('change', function () {
            var value = $(this).val();
            var valuex = $.ajax({
                url: 'http://localhost/cbr/cases/displayID',
                type: 'post',
                data: {diseaseID: value},
                dataType: 'json'
            });
            valuex.done(function (response) {

                responses = JSON.stringify(response);
                var responseObj = $.parseJSON(responses);
                var symptoms = responseObj['SYMPTOMS'];
                var listItems = '<form class="form-horizontal" >';
                for (var i = 0; i < symptoms.length; i++) {
                    listItems += '<div class="form-group"><label class="control-label col-sm-2">Symptom' + (i + 1) + '</label>';
                    listItems += '<div class="col-sm-10"><input class="form-control" type="text" value = "' + symptoms[i]['symptom_name'] + '"></div>';
                    listItems += "</div>";
                }
                listItems += "<div class='form-group'><div class='col-sm-offset-2 col-sm-10'>\n\
                                <button class='btn btn-danger'>Submit</button></div></div>";
                listItems += "</form>";
                $('#modal-bodies').html(listItems);
            });
        });

        $(document).ready(function () {
            $('.loader').hide();
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
            $('#table_case').DataTable();
        });
        $("#myBtn2").click(function () {
            $("#myModal2").modal({backdrop: false});

        });

        $("#editCaseBtn").click(function () {
            $("#editCase").modal({backdrop: false});
        });

        function deletes(data) {
            srvRqst = $.ajax({
                url: 'http://localhost/cbr/cases/inactive_case',
                type: 'post',
                data: {symptom_id: data},
                datatype: {},

            });
            srvRqst.done(function (response) {
                //var html = '<p class="alert alert-danger">Symptom Modified</p>';
                $('div.activation_case').html(response);
                $('#cbr_system').load('/cbr/cases');
            });
        }

        function actives(data) {
            srvRqst = $.ajax({
                url: 'http://localhost/cbr/cases/active_case',
                type: 'post',
                data: {symptom_id: data},
                datatype: {},

            });
            srvRqst.done(function (response) {
                // var html = '<p class="alert alert-danger">Symptom Modified</p>';
                $('div.activation_case').html(response);
                $('#cbr_system').load('/cbr/cases');
            });
        }

        function diactivate_all() {
            $('.loader').show();
            var srvRqst = $.ajax({
                url: 'http://localhost/cbr/cases/diactivate_all',
                data: {},
                type: 'post',
                datatype: 'json'

            }
            );
            srvRqst.done(function (response) {
                // var html = '<p class="alert alert-danger">Symptom Modified</p>';
                $('div.activation_case').html(response);
                $('#cbr_system').load('/cbr/cases');
            });
        }

        function activate_all() {
            $('.loader').show();
            var srvRqst = $.ajax({
                url: 'http://localhost/cbr/cases/activate_all',
                data: {},
                type: 'post',
                datatype: 'json'

            }
            );
            srvRqst.done(function (response) {
                // var html = '<p class="alert alert-danger">Symptom Modified</p>';
                $('div.activation_case').html(response);
                $('#cbr_system').load('/cbr/cases');
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