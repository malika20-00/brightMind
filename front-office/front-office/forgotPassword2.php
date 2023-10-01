<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>forgot password Page</title>

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" type="text/css" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/video.min.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="assets/css/progess.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/calender.css">

    <link rel="stylesheet" href="assets/css/colors/switch.css">
    <link href="assets/css/colors/color-2.css" rel="alternate stylesheet" type="text/css" title="color-2">
    <link href="assets/css/colors/color-3.css" rel="alternate stylesheet" type="text/css" title="color-3">
    <link href="assets/css/colors/color-4.css" rel="alternate stylesheet" type="text/css" title="color-4">
    <link href="assets/css/colors/color-5.css" rel="alternate stylesheet" type="text/css" title="color-5">
    <link href="assets/css/colors/color-6.css" rel="alternate stylesheet" type="text/css" title="color-6">
    <link href="assets/css/colors/color-7.css" rel="alternate stylesheet" type="text/css" title="color-7">
    <link href="assets/css/colors/color-8.css" rel="alternate stylesheet" type="text/css" title="color-8">
    <link href="assets/css/colors/color-9.css" rel="alternate stylesheet" type="text/css" title="color-9">

</head>

<body>
    <div>
        <a class="navbar-brand text-uppercase" href="#"><img src="assets/img/logo/f-logo.png" alt="logo" style=" margin: 0;
            position: absolute;
            top: 10%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%)"></a>
    </div>
    <div class="order-payment" style="width:500px; margin: auto; margin-top: 100px;">
        <div class="section-title-2  headline text-left">
            <h2> <span> </span></h2>
        </div>
        <div class="payment-method">
            <div class="payment-method-header">


                <div class="section-title-2  headline text-left">
                    <h2 style="text-align: center;"> <span> Forgot Password?</span></h2><br>
                </div>

            </div>
            <h2 class="widget-title" style="font-size: large;">An email with code has been sent to you</h2>
            <form id="sign-up-form" action="#" method="post">

                <div class="payment-info">
                    <input  id="code" name="code"  type="text" class="form-control" name="name" placeholder="verification code" value="" style="width: 500px;">
                    <input type="text" value="<?php echo  $_GET['email']; ?>" name="email" style="display:none;">

                </div>
                <a  style="color: rgb(0, 174, 255);cursor:pointer;" id="sendCodeAgain">send code again</a>
                <div>
                <input  id="submit" type="submit"  value="Next" class="genius-btn mt25 gradient-bg text-center text-uppercase  bold-font" style="width: 500px;border:none;">

                </div>

            </form>
            <p id = "error" class="error"></p>

            <div class="card-footer text-center " style="background-color: transparent;">Remember your password? <a href="accueil.php" style="color:#0fc0e1">Login</a></div>

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
  
    xhr.open("POST", "../include/sendCodeAgainAjax.php?email=<?php echo $_GET['email']?>", true);
    xhr.responseType = "json";
    xhr.send(data);  
  });
</script>
    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jarallax.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/jquery.meanmenu.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/gmap3.min.js"></script>
    <script src="assets/js/switch.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyC61_QVqt9LAhwFdlQmsNwi5aUJy9B2SyA"></script>
    <script src="assets/js/calender.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/code.js"></script>


</body>

</html>