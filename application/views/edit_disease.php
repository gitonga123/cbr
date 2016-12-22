<?php
include 'home_header.php';
if ($_SESSION['is_logged_in']) {
    ?>
    <div id="Cases" class="w3-container w3-white w3-padding-16"  style="margin-top: 2%;">
        <form method="post" action="/cbr/disease/update" class="form-horizontal">

            <?php
            extract($user);
            ?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="disease_name">Disease Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="disease_name" value="<?php echo $disease_name; ?>" required="required"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="disease_description">Disease Description</label>
                <div class="col-sm-10">
                    <textarea rows="5" class="form-control" name="disease_description" required="required">
                        <?php echo $disease_description; ?>
                    </textarea>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-2" for="disease_treatment">Disease Treatment</label>
                <div class="col-sm-10">
                    <textarea rows="5" class="form-control" name="disease_treatment" required="required">
                        <?php echo $disease_treatment; ?>                           
                    </textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="disease_medication">Disease Medication</label>
                <div class="col-sm-10">
                    <textarea rows="5" class="form-control" name="disease_medication" required="required">
                        <?php echo $disease_medication; ?>
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="id" value="<?php echo $disease_id; ?>" />
                    <input type="submit" name="submit" value="Update Account" class="btn btn-primary active">
                </div>
            </div>	
        </form>
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
    </script>
    </body>
    <?php
} else {
    redirect('login');
}
?>
</html>