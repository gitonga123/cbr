<?php
require_once 'header.php';
if ($_SESSION['is_logged_in']) {
    ?>
    <script>
        function show_confirm(act, gotoid) {

            if (act === "edit_symptom") {

                var r = confirm("Do you really want to edit the Symptom?");
            } else if (act === "edit_disease") {

                var r = confirm("Do you really want to edit the Disease?");
            } else if (act === "delete_symptom") {

                var r = confirm("Do you really want to edit the Symptom?");
            } else if (act === "delete_disease") {

                var r = confirm("Do you really want to delete the Disease");
            } else if (act === "edit_user") {
                var r = confirm("Do you really want to edit the user?");
            } else {
                var r = confirm("Do yo really want to delete the user?");
            }

            if (r === true) {

                window.location = "index.php/welcome/" + act + "/" + gotoid;
            }
    //            function display_name() {
    //                console.log('Daniel Mutwiri');
    //            }
        }
    </script>
    <body class="w3-light-grey" onload="setInterval('updateChats()', 10000)">
        <div>
            <ul class="w3-navbar w3-white w3-border-bottom w3-xlarge">
                <li><a href="#" class="w3-text-blue w3-hover-blue-gray"><b><i class="w3-margin-right"><img src="assets/images/logo11.png"></i>CBR DIAGNOSIS</b></a></li>

                <li class="w3-right"><a href="login/logout" class="w3-hover-red w3-text-grey"><i class="fa fa-sign-out"></i>Log Out</a></li>
            </ul>


            <!-- Header -->
            <header class="w3-display-container w3-content w3-hide-medium" style="max-width:2000px">
                <img class="w3-image" src="assets/images/BG.png" alt="London" width="1500" height="700">
                <div class="w3-display-middle" style="width:90%; height: 90%">
                    <ul class="w3-navbar w3-black">
                        <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'Home');"><i class="fa fa-home w3-margin-right"></i>Home</a></li>
                        <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'User');"><i class="fa fa-user w3-margin-right"></i>User Profile</a></li>
                        <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'Cases');"><i class="fa fa-briefcase w3-margin-right"></i>Cases</a></li>
                        <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'consult');"><i class="fa fa-hospital-o w3-margin-right"></i>Consulation</a></li>
                        <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'message');"><i class="fa fa-envelope-square w3-margin-right"></i>Read Message</a></li>
                        <li><a href="javascript:void(0)" class="tablink" onclick="openLink(event, 'search');"><i class="fa fa-search w3-margin-right"></i>Search</a></li>

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
                        <h3>List of All Users</h3>
                        <table class="table table-bordered">
                            <tr>
                                <th scope="col">User ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Mobile</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                            <?php foreach ($users as $details) { ?>
                                <tr>
                                    <td><?php echo $details->user_id ?></td>
                                    <td><?php echo $details->user_name ?></td>
                                    <td><?php echo $details->email ?></td>
                                    <td><?php echo $details->physical_address ?></td>
                                    <td><?php echo $details->mobile_number ?></td>
                                    <td width="40" align="left"><a href="#" onClick="show_confirm('edit_user',<?php echo $details->user_id; ?>)">Edit</a></td>
                                    <td width="40" align="left" ><a href="#" onClick="show_confirm('delete_user',<?php echo $details->user_id; ?>)">Delete </a></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="7" align="right"> <button class="btn btn-warning" type="submit" id="new_user">Insert New User</button></td>
                            </tr>		
                        </table>
                    </div>
                    <div class="modal fade" id="myModal3" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Add New User</h4>
                                    <div class="user_error">

                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" action="/cbr/welcome/new_user" method="POST" id="add_new_user">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="first_name">First Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="first_name" required="required" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="surname">surname:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="surname" required="required">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Email:</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="username">username:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="username" placeholder="choose a username">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label class="control-label col-sm-2" for="password">Password:</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="password" />
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <label class="control-label col-sm-2" for="password2">Confirm Password:</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="password2"/> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="mobile">Phone Number:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="mobile">
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <label class="control-label col-sm-2" for="address">Physical Address:</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control" rows="5" name="address"></textarea> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <input type="submit" name="submit" value="New User" class="btn btn-primary active">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $("#new_user").click(function () {
                                $("#myModal3").modal({backdrop: false});
                            });
                            $('form#add_new_user').on('submit', function (form) {
                                form.preventDefault();
                                $.post('index.php/welcome/new_user', $('form#add_new_user').serialize(), function (data) {
                                    $('div.user_error').html(data);
                                });
                            });
                        });
                    </script>
                    <div id="Cases" class="w3-container w3-white w3-padding-16 myLink">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#case"><i class="fa fa-suitcase w3-margin-right"></i>Cases</a></li>
                            <li><a data-toggle="tab" href="#symptom"><i class="fa fa-stethoscope w3-margin-right"></i>Symptom</a></li>
                            <li><a data-toggle="tab" href="#disease"><i class="fa fa-plus-square w3-margin-right"></i>Disease</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="case" class="tab-pane fade in active">
                                <h3>Cases: Disease and Symptom Combination</h3>
                                <button type="button" class="btn btn-info btn-sm" id="myBtn2"><i class="fa fa-bookmark w3-margin-right"></i>Create A Case</button>
                                <button type="button" class="btn btn-info btn-sm" id="editCaseBtn"><i class="fa fa-edit w3-margin-right"></i>Edit a Case</button>
                                <div>
                                    <?php
                                    echo "<table class='table table-hover'>
					<thead>
                                            <tr>
						<th>Case Number</th>
						 <th>Disease Name</th>
						<th>Symptom Name</th>
                                            </tr>
					</thead>
								";
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
                                                echo "<td>{$value_symptom->symptom_name}</td></tr>";
                                            }
                                        }
                                    }

                                    echo "</table>";
                                    ?>
                                </div>
                                <!-- Create a New Case-->
                                <div class="modal fade" id="myModal2" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                                <h4 class="modal-title">Create A Case: Select one Disease and Multiple Symptoms</h4>
                                            </div>

                                            <div class="modal-body"> 
                                                <form method="post" action="index.php/welcome/new_case" class="form-horizontal">
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
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

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


                                            <script>
                                                $('#sel1').on('change', function () {
                                                    var value = $(this).val();
                                                    var valuex = $.ajax({
                                                        url: 'http://localhost/cbr/index.php/welcome/displayID',
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
                                            </script>

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
                            <!--                        Symptom Display and Edit-->
                            <div id="symptom" class="tab-pane fade">
                                <h3>Cases: List of All Respiratory Symptom</h3>
                                <div><button class="btn btn-primary" id="symptomBtn"><i class="fa fa-bell-o w3-margin-right"></i>Add A New Symptom</button>
                                </div> <div>
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
                                                    <td align="left"><a href="#" onClick="show_confirm('edit_symptom',<?php echo $value_symptom->symptom_id; ?>)">Edit</a></td>
                                                    <td align="left" ><a href="#" onClick="show_confirm('delete_symptom',<?php echo $value_symptom->symptom_id; ?>)">Delete</a></td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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
                                            <form method="post" action="index.php/welcome/submission" class="form-horizontal" id="formaddsymptom">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="symptom">Symptom Name:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="symptom">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <input type="submit" name="submit" value="Create New Symptom" class="btn btn-primary active">
                                                    </div>
                                                </div>	
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <!--                            Disease Display and Edit-->
                            <div id="disease" class="tab-pane fade">
                                <h3>Cases: List of All Respiratory Disease</h3>
                                <div>
                                    <button id="diseaseBtn" class="btn btn-primary"><i class="fa fa-bell-o w3-margin-right"></i>Add A New Disease</button>
                                </div>
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

                                                    <td align="left"><a href="#" onClick="show_confirm('edit_disease',<?php echo $value_cases->disease_id; ?>)">Edit</a></td>
                                                    <td align="left" ><a href="#" onClick="show_confirm('delete_disease',<?php echo $value_cases->disease_id; ?>)">Delete </a></td>
                                                </tr>

                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function () {
                                    $('#dataTable2').DataTable();
                                });
                            </script>
                            <div class="modal fade" id="newDisease" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Add A New Disease</h4>
                                            <div class="jsError">

                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="index.php/welcome/submissiond" class="form-horizontal" id="new_disease">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2" for="disease">Disease:</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="disease">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <input type="submit" name="submit" value="Create New Disease" class="btn btn-primary active">
                                                    </div>
                                                </div>	
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('form#new_disease').on('submit', function (form) {
                                        form.preventDefault();
                                        $.post('index.php/welcome/submissiond', $('form#new_disease').serialize(), function (data) {
                                            $('div.jsError').html(data);
                                        });
                                    });
                                    $('#formaddsymptom').on('submit', function (form) {
                                        form.preventDefault();
                                        $.post('index.php/welcome/submissiond', $('form#formaddsymptom').serialize(), function (data) {
                                            $('div.jsErrors').html(data);
                                        });
                                    });
                                });
                            </script>
                        </div>

                    </div>       

                    <!--                    Live consultation From a doctor-->
                    <div id="consult" class="w3-container w3-white w3-padding-16 myLink">


                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <span class="glyphicon glyphicon-comment"></span> Chat
                                            <div class="btn-group pull-right">
                                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                                </button>
                                                <ul class="dropdown-menu slidedown">
                                                    <li><a href="#" id="refresh" onclick="updateChats()"><span class="glyphicon glyphicon-refresh">
                                                            </span>Refresh</a></li>
                                                    <li><a href="#"><span class="glyphicon glyphicon-ok-sign">
                                                            </span>Available</a></li>
                                                    <li><a href="#"><span class="glyphicon glyphicon-remove">
                                                            </span>Busy</a></li>
                                                    <li><a href="#"><span class="glyphicon glyphicon-time"></span>
                                                            Away</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#"><span class="glyphicon glyphicon-off"></span>
                                                            Sign Out</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <ul class="chat">
                                                <div class="chat_result">

                                                </div>
                                            </ul>
                                        </div>
                                        <div class="panel-footer">
                                            <form method="post" action="" id="send_message">
                                                <div class="input-group">
                                                    <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." name ="message"/>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-warning btn-sm" id="btn-chat">
                                                            Send</button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function () {
                                    $('form#send_message').on('submit', function (form) {
                                        form.preventDefault();
                                        $.post('welcome/send_message', $('form#send_message').serialize(), function (data) {
                                            $('div.chat_result').html(data);
                                        });
                                    });
                                    $("#btn-input").click(function () {
                                        //$("#btn").trigger(':reset');
                                        console.log("Hello");
                                    });
                                });

                            </script>

                        </div>


                    </div>


                    <div id="message" class="w3-container w3-white w3-padding-16 myLink">
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
                                                <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash">
                                                    <i class="fa fa-trash-o"></i> </button>
                                                <div class="mail-box" style="margin: 30px;">
                                                    <div class="read-inbox">
                                                        <script type="text/javascript">
                                                            $(document).ready(function () {
                                                                $("#refresh-inbox").click(function (event) {
                                                                    event.preventDefault();

                                                                    check_in_box();
                                                                });
                                                            });
                                                        </script>
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
                                                    <script type="text/javascript">
                                                        $(document).ready(function () {
                                                            $("#refresh_outbox").click(function (event) {
                                                                event.preventDefault();

                                                                check_out_box();
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="important" class="tabcontent">

                                    </div>
                                    <div id="draft" class="tabcontent">
                                        <p>Draft Messages</p>
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
                                <script type="text/javascript">
                                function sendemail(){
                                    var user=$('#user-emails').val();
                                    var title=$('#emailtitle').val();
                                    var aHTML = $('.summernote').code();
                                    alert(aHTML);
                                }
                                    // $(document).ready(function () {
                                    //     $('form#email_form').on('submit', function (form) {
                                    //         form.preventDefault();
                                    //         $.post('welcome/send_email', $('form#email_form').serialize(), function (data) {
                                    //             $('div.send_mail_notification').html(data);
                                    //         });
                                    //     });
                                    // });
                                   

                                </script>

                                <div class="footer">
                                    <div class="pull-right">
                                        <strong>Check Your Email Oftenly</strong>
                                    </div>
                                    <div>
                                        <strong>Copyright</strong> X-Diagnosis &copy; 2016
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
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
                            var user=$('#user-emails').val();
                                    var title=$('#emailtitle').val();
                                    var aHTML = $('.summernote').code();
                                    alert(aHTML); //save HTML If you need(aHTML: array).
                                    $srvrequest= $.ajax({
                                        url: 'http://localhost/cbr/index.php/welcome/send_email',
                                        type: 'post',
                                        data: {receipt_email : user, subject : title, message_sent: aHTML},
                                        datatype: 'text',

                                    });
                                    srvRqst.done(function (response) {
                                       $('.summernote').destroy();
                                       var html='<p class="alert alert-danger">Message Send Successfully</p>';
                                        $('div.send_mail_notification').html(html);
                                        });
                            
                        };
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
                </div>

                <div id="search" class="w3-container w3-white w3-padding-16 myLink">

                    <h3>Search Diagnosis</h3>
                    <div class="search_result">

                    </div>
                    <form class="form form-horizontal" id="search_form">

                        <div class="form-group" id="dynamic_search_field">
                            <label class="control-label col-sm-2" for="symptom">Symptom:</label>
                            <div class="col-sm-10" style="margin-bottom:20px;">
                                <input type="text" class="form-control" id="symptom_search" name="symptom_search[]" placeholder="Enter symptom to search">
                            </div>
                        </div>


                        <div class="form-group"> 
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default" id="add_search"><i class="fa fa-search-plus w3-margin-right"></i>Add Search</button>
                                <button type="submit" class="btn btn-default" id="search_button"><i class="fa fa-search w3-margin-right"></i>Search</button>
                                <button type="submit" class="btn btn-danger" id="remove_added_fields">Clear Fields</button>
                            </div>
                        </div>
                    </form>
                    <?php ?>
                </div>
                <script>
                    //Auto suggest for symptoms inputs
                    var srvRqst = $.ajax({
                        url: 'http://localhost/cbr/index.php/welcome/searchArea',
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

                    //Add dynamic fields
                    $(document).ready(function () {
                        var srvRqst = $.ajax({
                            url: 'http://localhost/cbr/index.php/welcome/searchArea',
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
                            $.post('index.php/welcome/search_result', $('form#search_form').serialize(), function (data) {
                                $('div.search_result').html(data);
                            });
                        });
                    });
                </script>
        </div> 
    </header>
    <script>
        $("#myBtn2").click(function () {
            $("#myModal2").modal({backdrop: false});
        });
        $("#editCaseBtn").click(function () {
            $("#editCase").modal({backdrop: false});
        });
        $("#diseaseBtn").click(function () {
            $("#newDisease").modal({backdrop: false});
        });
        $("#symptomBtn").click(function () {
            $("#addSymptom").modal({backdrop: false});
        });
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
            $("#createCaseBtn").click(function () {
                $("#createCaseForm").modal({backdrop: "true"});
                $("#myModal").modal({keyboard: true});
            });
        });
        $(document).ready(function () {
            $('#dataTables').DataTable();
        });
    </script>
    </div>
    </body>
    <?php
} else {
    redirect('login/index');
}
?>
</html>