<?php
require_once 'home_header.php';
if ($_SESSION['is_logged_in']) {
    ?>
    <!--Search For Diagnosis-->
    <div id="search" class="w3-container w3-white w3-padding-16" style="margin-top: 2%;">

        <h3>Search Diagnosis</h3>
        <div class="ibox-content" id="search_result_diagnosis">
            <div>                                                 
                <canvas id="lineChart" height="95"></canvas>
            </div>
        </div> 
        <div class="search_result">

        </div>

        <form class="form form-horizontal" id="search_form">

            <div class="form-group" id="dynamic_search_field">
                <label class="control-label col-sm-2" for="symptom">Symptom:</label>
                <div class="col-sm-10" style="margin-bottom:20px;">
                    <input type="text" class="form-control" id="symptom_search" name="symptom_search[]" placeholder="Enter symptom to search" required="required">
                </div>
            </div>


            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info" id="add_search"><i class="fa fa-search-plus w3-margin-right"></i>Add Search</button>
                    <span style="margin-left: 5%;"></span>
                    <button type="submit" class="btn btn-success" id="search_button"><i class="fa fa-search w3-margin-right"></i>Search</button>

                </div>
            </div>
        </form>
        <?php ?>
    </div>
    <?php
    require_once 'home_footer.php';
    ?>

    <script>

        $(document).ready(function () {
            var x = document.getElementById('search1');
            x.className = 'w3-red';
            var y = document.getElementById('active_bar2');
            y.style.color = "white";

            var ay = document.getElementById('active_bar');
            ay.style.color = "black";

            var by = document.getElementById('active_bar3');
            by.style.color = "#000000";

            var cy = document.getElementById('active_bar4');
            cy.style.color = "#000000";

            var dy = document.getElementById('active_bar5');
            dy.style.color = "#000000";

            var ey = document.getElementById('active_bar6');
            ey.style.color = "#000000";

    //            var fy = document.getElementById('active_bar7');
    //            fy.style.color = "#000000";

            var gy = document.getElementById('active_bar8');
            gy.style.color = "#000000";
    //
    //            var hy = document.getElementById('active_bar8');
    //            hy.style.color = "#000000";

        });


        //Auto suggest for symptoms inputs
        var srvRqst = $.ajax({
            url: 'http://localhost/cbr/search/searchArea',
            data: {},
            type: 'post',
            datatype: 'json'

        }
        );
        srvRqst.done(function (response) {
            var dataSource = $.parseJSON(response);
            $("#symptom_search").autocomplete({
                source: dataSource
            });
        });

        //Add dynamic fields
        $(document).ready(function () {
            var srvRqst = $.ajax({
                url: 'http://localhost/cbr/search/searchArea',
                data: {},
                type: 'post',
                datatype: 'json'

            });
            var max_fields = 15;
            var wrapper = $("#dynamic_search_field");
            var add_button = $("#add_search");
            var intial = 1;
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (intial < max_fields) { //max input box allowed
                    intial++; //text box increment
                    $(wrapper).append(
                            '<div>\n\
                                             \n\<label class="control-label col-sm-2" for="symptom">Symptom:</label>\n\
                                        \n\
                                            <div class="col-sm-10">\n\
                                                <input type="text" name="symptom_search[]" class="form-control ui-autocomplete-input" placeholder="Enter symptom to search" id="symptomsearch" autocomplete="off" />\n\
                                            </div>\n\
                                        \n\<button id="remove" class="btn btn-danger remove-me" type="button" style="margin-top:10px; margin-bottom:10px; margin-left:18.3%;">-</button>\n\
                                        \n\ </div>'); //add input box

                }
                srvRqst.done(function (response) {
                    var dataSource = $.parseJSON(response);
                    $(wrapper).find('input[type=text]:last').autocomplete({
                        source: dataSource
                    });
                });
            });
            $(wrapper).on("click", "#remove", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                intial--;
            });
            srvRqst.done(function (response) {
                var dataSource = $.parseJSON(response);
                $("input[name^='symptom_search']").autocomplete({
                    source: dataSource
                });
            });
        });
        $(document).ready(function () {
            $('form#search_form').on('submit', function (form) {
                form.preventDefault();
                $.post('search/search_result', $('form#search_form').serialize(), function (data) {
                    $('div.search_result').html(data);
                });
            });
            $("form#search_form").click(function () {
                $("#search_result_diagnosis").hide();
            });
        });

    </script>

    </body>
    <?php
} else {
    redirect('login');
}
?>
</html>