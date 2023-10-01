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
                        <i class="material-icons text-success mr-3">check_circle</i>
                        <div class="text-body">An email with code has been sent to your email address</div>
                    </div>

                    <form id="sign-up-form">
                        <div class="form-group">
                            <label class="form-label" for="code">Verfication Code:</label>
                            <div class="input-group input-group-merge">
                                <input id="code" name="code" type="text" required="" value="" class="form-control form-control-prepended" placeholder="Your code">
                                <input type="text" value="<?php echo  $_GET['email']; ?>" name="email" style="display:none;">

                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="far fa-envelope-open"></span>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: right;margin-top: 2px;">
                                <a href="" id="sendCodeAgain">Send code again</a>
                            </div>
                        </div>
                        <br>
                        <input  id="submit" type="submit" class="btn btn-primary btn-block" value="Next">
                    </form>
                    <p id = "error" class="error"></p>

                </div>
                <div class="card-footer text-center text-black-50">Remember your password? <a href="guest-login.php">Login</a></div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm" style="display:none;" id="codeWasSent"></button>

    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div style="height: 100px; text-align:center;padding-top:40px;">The code was sent to your email.</div>
    </div>
  </div>
</div>
<script>
    document.getElementById("sendCodeAgain").addEventListener('click',function(e){

        e.preventDefault();
    var data = {
        'email': "<?php echo $_GET['email']?>"
    };
    var xhr = new XMLHttpRequest();
    //ecouter lorsqu'on a un changement d'état
    xhr.onreadystatechange = function () {
        if (this.readyState != 4) {
            document.getElementById("sendCodeAgain").style.pointerEvents = "none";
            document.getElementById("sendCodeAgain").innerHTML = "Loading...";


        }
      if (this.readyState == 4 && this.status == 200) {
      
        document.getElementById("sendCodeAgain").style.pointerEvents = "auto";
        document.getElementById("sendCodeAgain").innerHTML = "send code again";
        if (this.response) {
         
          
  document.getElementById("codeWasSent").click();
         
        } 
          
      }
     
    }
  
    xhr.open("POST", "../../admin/include/sendCodeAgainAjax.php?email=<?php echo $_GET['email']?>", true);
    xhr.responseType = "json";
    xhr.send(data);  
  });
</script>
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
    <script src="assets/js/code.js"></script>


</body>

</html>