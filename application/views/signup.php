<?php
defined('BASEPATH') or exit("No direct script access allowed");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1" ></meta>
            <title><?php
                if (!empty($title)) {
                    echo($title);
                }
                ?></title>
            <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"></link>
            <link rel="stylesheet" type="text/css" href="assets/admin/css/style.css"></link>
            <link rel="stylesheet" href="assets/admin/assets/admincss/plugins/datapicker/datepicker3.css" rel="stylesheet"></link>
            <link rel="stylesheet" type="text/css" href="assets/admin/font-awesome/css/font-awesome.css"></link>
            <link rel="stylesheet" type="text/css" href="assets/admin/css/plugins/iCheck/custom.css"></link>
            <link rel="stylesheet" type="text/css" href="assets/admin/css/animate.css"></link>            
            <link rel="stylesheet" type="text/css" href="assets/admin/css/plugins/steps/jquery.steps.css" rel="stylesheet"></link>


            <style>
                body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
                .myLink {display: none}
            </style>
            <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico"></link>
    </head>


    <body>

        <div id="wrapper">






            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>New User</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <h2>
                                    Create A New Account
                                </h2>


                                <form id="form" action="welcome/new_user" class="wizard-big" method="post">
                                    <h1>Account</h1>
                                    <fieldset>
                                        <h2>Account Information</h2>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Username *</label>
                                                    <input id="name" name="name" type="text" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Role *</label>
                                                    <select class="form-control m-b  required">
                                                        <option value="">--Select--</option>
                                                        <option value="doctor">Doctor</option>
                                                        <option value="patient">Patient</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Password *</label>
                                                    <input id="password" name="password" type="password" class="form-control required" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirm Password *</label>
                                                    <input id="confirm" name="confirm" type="password" class="form-control required" />
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                    <h1>Profile</h1>
                                    <fieldset>
                                        <h2>Profile Information</h2>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-froup">
                                                    <label>surname *</label>
                                                    <div class="input-group m-b">
                                                        <span class="input-group-btn">
                                                            <select class="btn btn-white dropdown-toggle">
                                                                <option>Title</option>
                                                                <option>Mr.</option>
                                                                <option>Mrs.</option>
                                                                <option>Ms.</option>
                                                                <option>Miss</option>
                                                            </select>
                                                        </span> <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email *</label>
                                                    <input id="email" name="email" type="email" class="form-control required email"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>First Name *</label>
                                                    <input id="first_name" name="first_name" type="text" class="form-control required" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Address *</label>
                                                    <input id="address" name="address" type="text" class="form-control required" />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control m-b  required">
                                                        <option value="">--Select--</option>
                                                        <option value="M"><i class="fa fa-female"></i>Female</option>
                                                        <option value="F"><i class="fa fa-male"></i>Male</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input id="number" name="number" type="number" class="form-control required"/>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <h1>Personal Information Continued</h1>
                                    <fieldset>
                                        <h2>Personal Information</h2>
                                        <p>
                                            This Information can be very helpful to the Doctor or determining your Diagnosis.
                                        </p>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group" id="data_1">
                                                    <label>Date Of Birth (Optional)</label>
                                                    
                                                    <div class="input-group date">
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        <input type="text" class="form-control" value="03/04/2014" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Smoker *</label>
                                                    <select class="form-control m-b  required">
                                                        <option value="">--Select--</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Occupational (optional)</label>
                                                    <input id="occupation" name="occupation" type="text" class="form-control" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Alergies</label>
                                                    <input id="alergies" name="alergies" type="text" class="form-control chosen-select" />
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <h1>Finish</h1>
                                    <fieldset>
                                        <h2>Set you Profile Picture</h2>
                                        <div class="errror">
                                            
                                        </div>
                                        <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <script src="assets/admin/js/jquery-2.1.1.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="assets/admin/js/inspinia.js"></script>
        <script src="assets/admin/js/plugins/pace/pace.min.js"></script>

        <!-- Steps -->
        <script src="assets/admin/js/plugins/staps/jquery.steps.min.js"></script>

        <!-- Jquery Validate -->
        <script src="assets/admin/js/plugins/validate/jquery.validate.min.js"></script>

        <!--Date Picker-->
        <script src="assets/admin/js/plugins/datapicker/bootstrap-datepicker.js"></script>

        <script type="text/javascript">

            $(document).ready(function () {
                $("#wizard").steps();
                $("#form").steps({
                    bodyTag: "fieldset",
                    onStepChanging: function (event, currentIndex, newIndex)
                    {
                        // Always allow going backward even if the current step contains invalid fields!
                        if (currentIndex > newIndex)
                        {
                            return true;
                        }
                        // Forbid suppressing "Warning" step if the user is to young
                        if (newIndex === 3 && Number($("#age").val()) < 18)
                        {
                            return false;
                        }
                        var form = $(this);

                        // Clean up if user went backward before
                        if (currentIndex < newIndex)
                        {
                            // To remove error styles
                            $(".body:eq(" + newIndex + ") label.error", form).remove();
                            $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                        }
                        // Disable validation on fields that are disabled or hidden.
                        form.validate().settings.ignore = ":disabled,:hidden";

                        // Start validation; Prevent going forward if false
                        return form.valid();
                    },
                    onStepChanged: function (event, currentIndex, priorIndex)
                    {
                        // Suppress (skip) "Warning" step if the user is old enough.
                        if (currentIndex === 2 && Number($("#age").val()) >= 18)
                        {
                            $(this).steps("next");
                        }

                        // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                        if (currentIndex === 2 && priorIndex === 3)
                        {
                            $(this).steps("previous");
                        }
                    },
                    onFinishing: function (event, currentIndex)
                    {
                        var form = $(this);
                        // Disable validation on fields that are disabled.
                        // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                        form.validate().settings.ignore = ":disabled";
                        // Start validation; Prevent form submission if false
                        return form.valid();
                    },
                    onFinished: function (event, currentIndex)
                    {
                        var form = $(this);
                        // Submit form input
                        form.submit();
                    }
                }).validate({
                    errorPlacement: function (error, element)
                    {
                        element.before(error);
                    },
                    rules: {
                        confirm: {
                            equalTo: "#password"
                        },
                        password: {
                            required: true,
                            minlength: 6
                        }
                    }
                });
                $('#data_1 .input-group.date').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });
            });

        </script>
    </body>
</html>