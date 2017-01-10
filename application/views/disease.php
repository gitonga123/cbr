<?php
include 'home_header.php';
if ($_SESSION['is_logged_in']) {
    ?>

    <div id="Cases" class="w3-container w3-white w3-padding-16"  style="margin-top: 2%;">
        <h3>Cases: List of All Respiratory Disease</h3>
        <div>
            <button id="diseaseBtn" class="btn btn-success btn-mini"><i class="fa fa-bell-o w3-margin-right"></i>Add A New Disease</button>
        </div>
        <span>
            <?php
            if (empty($error_message)) {
                
            } else {
                echo "<p class='alert alert-info'>{$error_message}</p>";
            }
            ?>
        </span>
        <div style="padding-bottom: 1%;"></div>
        <div>
            <table class='table table-condensed' id="dataTable2">
                <thead>
                <th>Disease Name:</th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                    <?php foreach ($disease2 as $value_cases) { ?>
                        <tr>
                            <td><?php echo $value_cases->disease_name; ?></td>

                            <td align="left"><a href="/cbr/disease/edit_disease?id=<?php echo $value_cases->disease_id; ?>">Edit</a></td>
                            <td align="left" ><a href="#">Delete </a></td>
                        </tr>

                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="newDisease" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add A New Disease</h4>

                    </div>
                    <div class="modal-body">
                        <form method="post" action="/cbr/disease/submissiond" class="form-horizontal" id="new_disease">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="disease">Disease:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="disease" required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="disease">Disease Description:</label>
                                <div class="col-sm-10">
                                    <textarea rows="3"  placeholder="type message here" name="description" required="required" class="form-control"/>

                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="disease">Disease Treament</label>
                                <div class="col-sm-10">
                                    <textarea rows="3" placeholder="type message here" name="treatment" required="required" class="form-control">
                                                                
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="disease">Medication</label>
                                <div class="col-sm-10">
                                    <textarea rows="3" placeholder="type message here" name="medication" required="required" class="form-control">
                                                                
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" name="submit" value="Create New Disease" class="btn btn-success active">
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
            $('#dataTable2').DataTable();
        });
        $("#diseaseBtn").click(function () {
            $("#newDisease").modal({backdrop: false});
        });
        function show_confirm(act, gotoid) {
            controller = "";
            if (act === "edit_disease") {
                controller = "disease";
                var r = confirm("Do you really want to edit the Disease?");
            } else {

                var r = confirm("Do you really want to edit the Symptom?");
                controller = "disease";
            }
            if (r === true) {

                window.location = controller + "/" + act + "/" + gotoid;
            }

        }


    </script>

    </body>
    <?php
} else {
    redirect('login');
}
?>
</html>