<?php
defined('BASEPATH') or exit("No direct script access allowed");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" ></meta>
        <title><?php
            if (!empty($title)) {
                echo($title);
            }
            ?></title>
        <link rel="stylesheet" type="text/css" href="/cbr/assets/css/w3.css"></link>
        <link rel="stylesheet" type="text/css" href="/cbr/assets/css/bootstrap.min.css"></link>

        <link rel="stylesheet" href="/cbr/assets/admin/css/plugins/datapicker/datepicker3.css" rel="stylesheet"></link>
        <link rel="stylesheet" type="text/css" href="/cbr/assets/admin/font-awesome/css/font-awesome.css"></link>
        <link rel="stylesheet" type="text/css" href="/cbr/assets/admin/css/plugins/iCheck/custom.css"></link>
        <link rel="stylesheet" type="text/css" href="/cbr/assets/admin/css/animate.css"></link>            
        <link rel="stylesheet" type="text/css" href="/cbr/assets/admin/css/plugins/steps/jquery.steps.css" rel="stylesheet"></link>
        <link rel="icon" type="image/x-icon" href="/cbr/assets/images/favicon.ico"></link>
    </head>
    <body>

        <!-- Navbar (sit on top) -->
        <div class="w3-top">
            <ul class="w3-navbar w3-white w3-wide w3-padding-8 w3-card-2">
                <li>
                    <a href="#home" class="w3-margin-right w3-hover-blue"><img src="/cbr/assets/images/logo11.png" height="30px;" /></i>CBR DIAGNOSIS</b></a>
                </li>
                <!-- Float links to the right. Hide them on small screens -->
                <li class="w3-right w3-hide-small">
                    <a href="#home" class="w3-left w3-hover-blue">Home</a>
                    <a href="#about" class="w3-left w3-hover-blue">About</a>
                    <a href="#contact" class="w3-left w3-margin-right w3-hover-blue">Contact</a>
                    <a href="#signup" class="w3-left w3-margin-right w3-hover-blue">Sign up</a>
                </li>
            </ul>
        </div>

        <!-- Header -->
        <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
            <img class="w3-image" src="/cbr/assets/images/home4.png" alt="Architecture" width="1500" height="700" />
            <div class="row" style="margin-top: -30%; margin-bottom: 10%">
                <div class="col-lg-7">
                    <div class="w3-display-middle w3-margin-top w3-center">
                        <h1 class="w3-xxlarge w3-text-white">
                            <span class="w3-padding w3-black w3-opacity-min"><b>CBR</b></span>
                            <span class="w3-hide-small w3-text-light-grey">Diagnosis</span>
                        </h1>
                    </div>
                </div>
                <div class="col-lg-5" style="color:white">
                    <div>
                        <?php echo $error_message;?>
                    </div>
                    <div style="margin-left: -5%" >
                        <form class="form-horizontal" method="post" action="/cbr/login/user_validate" id="loginForm">
                            <p class="text-capitalize font-bold" style="color:whitesmoke; font-size: 18px;">Sign in today for more expirience.</p>
                            <div class="form-group">
                                <label class="col-lg-2 control-label"><bold>Username</bold></label>
                                <div class="col-lg-10">
                                    <input type="name" placeholder="Username" class="form-control" required="required" name="username"/> 
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label"> <bold>Password</bold></label>
                                <div class="col-lg-10">
                                    <input type="password" placeholder="Password" class="form-control" required="required" name="password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Remember me </label></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-info" type="submit">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </header>

        <!-- Page content -->
        <div class="w3-content w3-padding" style="max-width:1564px">


            <!-- About Section -->
            <div class="w3-container w3-padding-32" id="about">
                <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">About</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
                    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>

            <div class="w3-row-padding w3-grayscale">
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <img src="/w3images/team2.jpg" alt="John" style="width:100%">
                        <h3>John Doe</h3>
                        <p class="w3-opacity">CEO & Founder</p>
                        <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                        <p><button class="w3-btn-block">Contact</button></p>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <img src="/w3images/team1.jpg" alt="Jane" style="width:100%">
                        <h3>Jane Doe</h3>
                        <p class="w3-opacity">Architect</p>
                        <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                        <p><button class="w3-btn-block">Contact</button></p>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <img src="/w3images/team3.jpg" alt="Mike" style="width:100%">
                        <h3>Mike Ross</h3>
                        <p class="w3-opacity">Architect</p>
                        <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                        <p><button class="w3-btn-block">Contact</button></p>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <img src="/w3images/team4.jpg" alt="Dan" style="width:100%">
                        <h3>Dan Star</h3>
                        <p class="w3-opacity">Architect</p>
                        <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                        <p><button class="w3-btn-block">Contact</button></p>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="w3-container w3-padding-32" id="contact">
                <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">Contact</h3>
                <p>Contact us for any questions and Suggestions that you may have to improve this project</p>
                <form action="form.asp" target="_blank">
                    <input class="w3-input" type="text" placeholder="Name" required name="Name" />
                    <input class="w3-input w3-section" type="text" placeholder="Email" required name="Email" />
                    <input class="w3-input w3-section" type="text" placeholder="Subject" required name="Subject" />
                    <input class="w3-input w3-section" type="text" placeholder="Comment" required name="Comment"/>
                    <button class="w3-btn w3-section" type="submit">
                        <i class="fa fa-paper-plane"></i> SEND MESSAGE
                    </button>
                </form>
            </div>

            <!-- Project Section -->
            <div class="w3-container w3-padding-32" id="signup">
                <h3 class="w3-border-bottom w3-border-light-grey w3-padding-12">New User</h3>
                <p> Create Account here to have access to the Account</p>
                <form  id="form" action="/cbr/signup/upload_file" class="wizard-big" method="post" enctype="multipart/form-data">
                    <h1>Account</h1>
                    <fieldset style="border: 0">
                        <h2>Account Information</h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Username *</label>
                                    <input id="name" name="user_name" type="text" class="form-control required" />
                                </div>
                                <div class="form-group">
                                    <label>Role *</label>
                                    <select class="form-control m-b  required" name="role">
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
                    <fieldset style="border: 0">
                        <h2>Profile Information</h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-froup">
                                    <label>surname *</label>
                                    <div class="input-group m-b">
                                        <span class="input-group-btn">
                                            <select class="btn btn-white dropdown-toggle required" name="title">
                                                <option value="">Title</option>
                                                <option value="Mr.">Mr.</option>
                                                <option values="Mrs.">Mrs.</option>
                                                <option value="Ms.">Ms.</option>
                                                <option value="Miss">Miss</option>
                                            </select>
                                        </span> <input type="text" class="form-control" name="sur_name"/>
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
                                    <select class="form-control m-b  required" name="gender">
                                        <option value="">--Select--</option>
                                        <option value="M"><span><i class="fa fa-female"></i>Female</span></option>
                                        <option value="F"><span><i class="fa fa-male"></i>Male</span></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input id="number" name="mobile_number" type="number" class="form-control required"/>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <h1>Personal Information Continued</h1>
                    <fieldset style="border:0">
                        <h2>Personal Information</h2>
                        <p>
                            This Information can be very helpful to the Doctor or in determining your Diagnosis.
                        </p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group" id="data_1">
                                    <label>Date Of Birth (Optional)</label>

                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" value="" name="dob"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Smoker *</label>
                                    <select class="form-control m-b  required" name="smoker">
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
                    <fieldset style="border: 0">
                        <h2>Set you Profile Picture</h2>
                        <div class="row">
                            <?php echo $error_message; ?>
                            <div class="col-lg-6"> 
                                <div class="form-group">
                                    <input type="file" name="fileToUpload" id="fileToUpload" />
                                </div>
                                <div class="from-group">
                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"/> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                </div>
                            </div>
                            <div class="col-lg-6"> 
                                <div class = "upload-image-messages" style="margin-top: 10px;height:50px;width:50px;">
                                    <img id="blah" src="#" alt="your image" />

                                </div>
                            </div>   

                        </div>
                    </fieldset>
                </form>
            </div>

            <!-- End page content -->
        </div>

        <!-- Footer -->
        <footer class="w3-center w3-black w3-padding-16">
            <p><i class="fa fa-user w3-margin-right"></i> <a href="http://www.w3schools.com/w3css/default.asp" title="Daniel Mutwiri" target="_blank" class="w3-hover-text-green">Daniel Mutwiri P15/1477/2013</a></p>
        </footer>
        <script type="text/javascript" src='/cbr/assets/js/jquery-1.12.3.js'></script>
        <script src="/cbr/assets/js/bootstrap.min.js"></script>
        <script src="/cbr/assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="/cbr/assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="/cbr/assets/admin/js/inspinia.js"></script>
        <script src="/cbr/assets/admin/js/plugins/pace/pace.min.js"></script>

        <!-- Steps -->
        <script src="/cbr/assets/admin/js/plugins/staps/jquery.steps.min.js"></script>

        <!-- Jquery Validate -->
        <script src="/cbr/assets/admin/js/plugins/validate/jquery.validate.min.js"></script>

        <!--Date Picker-->
        <script src="/cbr/assets/admin/js/plugins/datapicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="/cbr/assets/admin/js/demo/chartjs-demo.js"></script>
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

                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#blah').attr('src', e.target.result);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#fileToUpload").change(function () {
                    readURL(this);
                });
            });
            $(document).ready(function () {
                
//                $('#loginForm').on('submit', function (form) {
//                    form.preventDefault();
//                    $.post('login/user_validate', $('#loginForm').serialize(), function (data) {
//                        $('div.LoginError').html(data);
//                    });
//                });
            });
        </script>
    </body>
</html>
