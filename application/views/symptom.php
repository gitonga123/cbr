<?php
include 'home_header.php';
if ($_SESSION['is_logged_in']) {
    ?>
    <div id="Cases" class="w3-container w3-white w3-padding-16"  style="margin-top: 2%;">
        <h3>Cases: List of All Respiratory Symptom</h3>
        <div><button class="btn btn-success btn-mini" id="symptomBtn"><i class="fa fa-bell-o w3-margin-right"></i>Add A New Symptom</button>
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
            <table class='table table-striped' id="dataTables">
                <thead>

                    <tr>
                        <th>
                            Symptom Name:
                        </th>
                        <th></th>
                        <th></th>
                    </tr>

                </thead>
                <tbody>
                    <?php foreach ($symptom2 as $value_symptom) { ?>
                        <tr><td> <?php echo "{$value_symptom->symptom_name}"; ?> </td>
                            <td align="left"><a href="/cbr/symptom/edit_symptom?id=<?php echo $value_symptom->symptom_id; ?>">Edit</a></td>
                            <td align="left" ><a href="/cbr/symptom/delete_symptom?id=<?php echo $value_symptom->symptom_id; ?>">Delete</a></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="addSymptom" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Add A New Symptom</h4>
                        <div class="jsErrors">

                        </div>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/cbr/symptom/submission" class="form-horizontal" id="formaddsymptom">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="symptom">Symptom Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="symptom" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="symptom_description">Symptom Name:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="symptom_description" required="required"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" name="submit" value="Create New Symptom" class="btn btn-success active">
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

            var hy = document.getElementById('active_bar8');
            hy.style.color = "#000000";
        });
        $(document).ready(function () {
            $('#dataTables').DataTable();
        });

        $("#symptomBtn").click(function () {
            $("#addSymptom").modal({backdrop: false});
        });

    </script>

    </body>
    <?php
} else {
    redirect('login');
}
?>
</html>