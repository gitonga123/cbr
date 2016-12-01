<?php require_once 'header.php';
?>
<body class="w3-light-grey">
    <div class="container">
        <ul class="w3-navbar w3-white w3-border-bottom w3-xlarge">
            <li><a href="#" class="w3-text-blue w3-hover-blue-gray"><b><i class="w3-margin-right"><img src="assets/images/logo11.png"></i>CBR DIAGNOSIS</b></a></li>
            <li class="w3-right"><a href="#" class="w3-hover-red w3-text-grey"><i class="fa fa-search">Log Out</i></a></li>
        </ul>


        <!-- Header -->
        <header class="w3-display-container w3-content w3-hide-medium" style="max-width:2000px">
            <img class="w3-image" src="assets/images/BG.png" alt="London" width="1500" height="700">
            <div class="w3-display-middle" style="width:75%; height: 85%">
                <ul class="w3-navbar w3-black">
                    <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'Home');"><i class="fa fa-home w3-margin-right"></i>Home</a></li>
                    <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'User');"><i class="fa fa-user w3-margin-right"></i>User Profile</a></li>
                    <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'Cases');"><i class="fa fa-certificate w3-margin-right"></i>Cases</a></li>
                    <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'consult');"><i class="fa fa-certificate w3-margin-right"></i>Consulation</a></li>
                    <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'message');"><i class="fa fa-envelope-square w3-margin-right"></i>Read Message</a></li>

                </ul>

                <!-- Tabs -->
                <div id="Home" class="w3-container w3-white w3-padding-16 myLink">
                    <h3>Find Out what is Ailing you</h3>
                    <!--                <div class="w3-row-padding" style="margin:0 -16px;">
                                        <div class="w3-half">
                                            <label>From</label>
                                            <input class="w3-input w3-border" type="text" placeholder="">
                                        </div>
                                        <div class="w3-half">
                                            <label>To</label>
                                            <input class="w3-input w3-border" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <p><button class="w3-btn w3-dark-grey">Search and find dates</button></p>-->
                </div>

                <div id="User" class="w3-container w3-white w3-padding-16 myLink">
                    <h3>User Profile</h3>
    <!--                <p>Book a hotel with us and get the best fares and promotions.</p>
                    <p>We know hotels - we know comfort.</p>
                    <p><button class="w3-btn w3-dark-grey">Search Hotels</button></p>-->
                </div>


                <div id="Cases" class="w3-container w3-white w3-padding-16 myLink">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#case">Cases</a></li>
                        <li><a data-toggle="tab" href="#symptom">Symptom</a></li>
                        <li><a data-toggle="tab" href="#disease">Disease</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="case" class="tab-pane fade in active">
                            <h3>Cases: Disease and Symptom Combination</h3>
                            <button type="button" class="btn btn-info btn-sm" id="createCaseBtn">Create A Case</button>
                            <div class="modal fade" id="createCaseForm" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button> 
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?php echo base_url("index.php/welcome/new_case"); ?>" class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="disease_name">Select Disease</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control input-sm" id="selelection_new" name="selection1">
                                                            <option>--Select--</option>
                                                            <?php
                                                            foreach ($disease as $disease_value) {
                                                                echo "<option value='" . $disease_value->disease_id . "'>" . $disease_value->disease_name . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="symptom_name">Select Symptom</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control input-sm" id="selection_new2" name="selection2[]" multiple="multiple">
                                                            <option>--Select--</option>
                                                            <?php
                                                            foreach ($symptom as $symptom_value) {
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal" id="createCaseBtn">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="consult" class="w3-container w3-white w3-padding-16 myLink">
                    <h3>Best car rental in the world!</h3>
                    <p><span class="w3-tag w3-deep-orange">DISCOUNT!</span> Special offer if you book today: 25% off anywhere in the world with CarServiceRentalRUs</p>
                    <input class="w3-input w3-border" type="text" placeholder="Pick-up point">
                    <p><button class="w3-btn w3-dark-grey">Search Availability</button></p>
                </div>

                <div id="message" class="w3-container w3-white w3-padding-16 myLink">
                    <h3>Best car rental in the world!</h3>
                    <p><span class="w3-tag w3-deep-orange">DISCOUNT!</span> Special offer if you book today: 25% off anywhere in the world with CarServiceRentalRUs</p>
                    <input class="w3-input w3-border" type="text" placeholder="Pick-up point">
                    <p><button class="w3-btn w3-dark-grey">Search Availability</button></p>
                </div>
            </div>
        </header>
        <script>
            // Tabs
            function openLink(evt, linkName) {
                var i, x, tablinks;
                x = document.getElementsByClassName("myLink");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < x.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
                }
                document.getElementById(linkName).style.display = "block";
                evt.currentTarget.className += " w3-red";
            }
            // Click on the first tablink on load
            document.getElementsByClassName("tablink")[0].click();

            $(document).ready(function () {
                //            $("#createCaseBtn").click(function () {
                //                $("#createCaseForm").modal();
                //            });
                $("#createCaseBtn").click(function () {
                    $("#createCaseForm").modal({backdrop: "true"});
                });
            });
        </script>
    </div>
</body>
</html>