<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

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
                <a href="student-dashboard.html" class="navbar-brand m-0">LearnPlus</a>
            </div>
            <div class="card navbar-shadow">
                <div class="card-header text-center">
                    <h4 class="card-title">Login</h4>
                    <p class="card-subtitle">Access your account</p>
                </div>
                <div class="card-body">

                    <!-- <a href="student-dashboard.html" class="btn btn-light btn-block">
                        <span class="fab fa-google mr-2"></span>
                        Continue with Google
                    </a>

                    <div class="page-separator">
                        <div class="page-separator__text">or</div>
                    </div> -->

                    <form id="sign-in-form">
                        <div class="form-group">
                            <label class="form-label" for="email">Your email address:</label>
                            <div class="input-group input-group-merge">
                                <input id="email" name="email" type="email" required="" class="form-control form-control-prepended" placeholder="Your email address" value="<?php if (isset($_COOKIE["emailBrightAdmin"])) echo $_COOKIE["emailBrightAdmin"]; ?>">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="far fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p id="emailError"></p>
                        <div class="form-group">
                            <label class="form-label" for="password">Your password:</label>
                            <div class="input-group input-group-merge">
                                <input id="password" name="pw" type="password" required="" class="form-control form-control-prepended" placeholder="Your password" value="<?php if (isset($_COOKIE["passwordBrightAdmin"])) {
                                                                                                                                                                    echo $_COOKIE['passwordBrightAdmin'];
                                                                                                                                                                } ?>">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="far fa-key"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p id="pwError"></p>

                        <input type="checkbox" name="souvenir" id="souvenir">
                        <label for="souvenir">Remember me</label>


                        <div class="form-group ">
                            <button id="connecte" type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <div class="text-center">
                            <a href="guest-forgot-password.php" class="text-black-70" style="text-decoration: underline;">Forgot Password?</a>
                        </div>
                    </form>
                </div>
                <!-- <div class="card-footer text-center text-black-50">
                    Not yet a student? <a href="guest-signup.html">Sign Up</a>
                </div> -->
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
    <script src="assets/js/connecte.js"></script>

</body>

</html>