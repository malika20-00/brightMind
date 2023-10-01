<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot password</title>

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500%7CRoboto:400,500&display=swap" rel="stylesheet">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="assets/vendor/perfect-scrollbar.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="assets/css/material-icons.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="assets/css/fontawesome.css" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="assets/vendor/spinkit.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">

</head>

<body class="login">

    <div class="d-flex align-items-center" style="min-height: 100vh">
        <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px;">
            <div class="text-center mt-5 mb-1">
                <div class="avatar avatar-lg">
                    <img src="assets/images/logo/primary.svg" class="avatar-img rounded-circle" alt="LearnPlus" />
                </div>
            </div>
            <div class="d-flex justify-content-center mb-5 navbar-light">
                <!-- Brand -->
                <a href="student-dashboard.html" class="navbar-brand m-0">
                    LearnPlus
                </a>
            </div>
            <div class="card navbar-shadow">
                <div class="card-header text-center">
                    <h4 class="card-title">Forgot Password?</h4>
                    <p class="card-subtitle">Recover your account password</p>
                </div>
                <div class="card-body">

                    <div class="alert alert-light border-1 border-left-3 border-left-primary d-flex" role="alert">
                        <!-- <i class="material-icons text-success mr-3">check_circle</i> -->
                        <div class="text-body">Set new password</div>
                    </div>

                    <form id="sign-up-form">
                        <input value="<?php echo $_GET['email']; ?>" name="email" style="display:none;">

                        <div class="form-group">
                            <label class="form-label" for="email">New password</label>
                            <div id="show_hide_password" class="input-group input-group-merge" style="margin-bottom:5px;">
                                <input id="pw" type="password" class="form-control form-control-prepended" placeholder="Enter new password" value="" required name="pw">

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <!-- <span class="far fa-envelope"></span> -->
                                    </div>
                                </div>
                                <div class="input-group-addon" style="padding: 9px 3px; ">
                                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>

                            </div>
                            <p class="error" id="pwError"></p>


                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Confirm password</label>
                            <div id="show_hide" class="input-group input-group-merge">
                                <input id="pwVerif" name="pwVerif" type="password" class="form-control form-control-prepended" placeholder="Confirm password" required onChange="onChange()">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <!-- <span class="far fa-envelope"></span> -->
                                    </div>
                                </div>
                                <div class="input-group-addon" style="padding: 9px 3px; ">
                                    <a id="a" href=""><i id="i" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <p class="error" id="pwVerifError"></p>

                        <input type="submit" id="connecte" class="btn btn-primary btn-block" value="save">
                    </form>
                    <p id="error" class="error"></p>

                </div>
                <!-- <div class="card-footer text-center text-black-50">Remember your password? <a href="guest-login.html">Login</a></div> -->
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- MDK -->
    <script src="assets/vendor/dom-factory.js"></script>
    <script src="assets/vendor/material-design-kit.js"></script>

    <!-- App JS -->
    <script src="assets/js/app.js"></script>

    <!-- Highlight.js -->
    <script src="assets/js/hljs.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>
    <script src="assets/js/pw.js"></script>
    <script src="assets/js/password.js"></script>
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
        });

        $(document).ready(function() {
            $("#show_hide #a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide input').attr("type") == "text") {
                    $('#show_hide input').attr('type', 'password');
                    $('#show_hide #i').addClass("fa-eye-slash");
                    $('#show_hide #i').removeClass("fa-eye");
                } else if ($('#show_hide input').attr("type") == "password") {
                    $('#show_hide input').attr('type', 'text');
                    $('#show_hide #i').removeClass("fa-eye-slash");
                    $('#show_hide #i').addClass("fa-eye");
                }
            });
        });
    </script>

</body>

</html>