<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location:guest-login.php");
} else {
    if ($_SESSION['admin'] == 0) {
        header("Location:guest-login.php");
    }

    require_once '../../admin/include/autoloadAdmin.php';

    $id = $_SESSION['id'];



?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Student list</title>

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

        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Boxiocns CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link type="text/css" href="assets/css/profile.css?v=<?php echo time(); ?>" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>


    <style>
        .container .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
            color: rgba(77, 57, 69, 0.84);
        }

        .container .title::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            height: 3px;
            width: 70px;
            border-radius: 8px;
            background: linear-gradient(135deg, #cce4ff, #66afff);

        }

        .accordion {
            background-color: #cce4ff;
            color: rgba(57, 68, 77, .84);
            cursor: pointer;
            padding: 18px;
            width: 100%;
            text-align: left;
            border: none;
            outline: none;
            transition: 0.4s;
            font-size: 20px;
        }

        .accordion:hover {
            background-color: #66afff;
        }

        .panel {
            padding: 0 18px;
            background-color: #ffffff;
            /* max-height: 0; */
            /* overflow: hidden; */
            display: none;
            transition: max-height 0.2s ease-out;
        }

        .accordion:after {
            content: '\02795';
            /* Unicode character for "plus" sign (+) */
            font-size: 13px;
            color: rgb(255, 255, 255);
            float: right;
            margin-left: 5px;
        }

        /* .active:after {
            content: "\2796"; /* Unicode character for "minus" sign (-) 
          }*/

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            border-radius: 12px 12px 0 0;
        }

        .btn.btn1 {
            padding: 5px;
            height: 40px;
            width: 100;
            outline: none;
            color: #eee;
            border: none;
            font-size: 18px;
            font-weight: 500;
            border-radius: 5px;
            letter-spacing: 1px;
            background: #c6e2fe;
            display: flex;
            justify-content: end;
            margin-top: 10px;
            box-sizing: border-box;
            box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.05);
            float: right;
            background: linear-gradient(135deg, #24C6DC, #348ac7);
        }

        #showinstructor {
            position: absolute;
            top: 10px;
            right: 0px;
            bottom: 0;
            left: 0;
            z-index: 10040;
            overflow: auto;
            overflow-y: auto;
        }
    </style>








    <body>
        <div class="modal fade" id="modifyinstructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">


                    <div class="col-lg container-fluid page__container">


                        <section id="checkout" class="checkout-section">
                            <div class="container">
                                <form id="edit-form-prof">
                                    <input name="id" id="idEtudiant-edit" style="display:none;">

                                    <div class="section-title mb45 headline text-center">

                                    </div>
                                    <br>
                                    <h1 class="h2">INSTRUCTUR INFORMATIONS</h1>
                                    <div class="card">

                                        <div class="list-group list-group-fit">
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                                    <div class="form-row">
                                                        <label id="label-firstname" for="firstname" class="col-md-3 col-form-label form-label">Full name</label>
                                                        <div class="col-md-9">
                                                            <input id="prenom-edit" type="text" placeholder="Instructor full name" value="" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-email">
                                                    <div class="form-row">
                                                        <label id="label-email" for="email" class="col-md-3 col-form-label form-label"> email address</label>
                                                        <div class="col-md-9">
                                                            <div role="group" class="input-group input-group-merge">
                                                                <input name="email" id="mail-edit" type="email" placeholder="Instructor email address" value="" class="form-control form-control-prepended" required>
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="material-icons">email</i>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <p class="error" id="emailError"></p>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                    <div class="form-row">
                                                        <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">CIN</label>
                                                        <div class="col-md-9">
                                                            <input id="cin-edit" type="text" placeholder="Instructor CIN" value="" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-phone">
                                                    <div class="form-row">
                                                        <label id="label-phone" for="phone" class="col-md-3 col-form-label form-label">Phone number</label>
                                                        <div class="col-md-9">
                                                            <input id="tel-edit" type="text" placeholder="Instructor phone number" value="" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <p class="error-modify-prof"></p>

                                    <div class="foo">
                                        <input id="submit" type="submit" class="btn btn-success" style="margin-right: 15px; margin-bottom: 15px;float:right;" value="Edit Instructor">
                                    </div>
                                </form>
                            </div>




                    </div>


                    </section>
                </div>
            </div>
        </div>
        <div class="modal fade" id="showinstructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <!-- <div class="container"> -->

                    <div class="card user-card">

                        <div class="card-header">
                            <h2>Profile</h2>
                        </div>
                        <div class="card-block">
                            <div class="user-image">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-radius" alt="User-Profile-Image">
                            </div>
                            <h6 class="f-w-600 m-t-25 m-b-10" style="font-size: large;" id="afficher-nom">Alessa Robert</h6>
                            <p class="text-muted">Teacher Informations</p>
                            <hr>
                            <div id=pForm>
                                <div class="form-group row" style="text-align: left; margin-left: 90px;">
                                    <h4 class="col-sm-3 col-form-label form-label" style="font-size: large;color:#2e3974;">full name:
                                    </h4>
                                    <label class="col-sm-5 col-form-label form-label" style="font-size: large; ;" id="afficher-full-name">Alessa Robert
                                    </label>

                                </div>

                                <div class="form-group row" style="text-align: left;margin-left: 90px;">
                                    <h4 class="col-sm-3 col-form-label form-label" style="font-size: large;color:#2e3974;">CIN:
                                    </h4>
                                    <label class="col-sm-5 col-form-label form-label" style="font-size: large; " id="afficher-cin">F1111
                                    </label>

                                </div>

                                <div class="form-group row" style="text-align: left;margin-left: 90px;">
                                    <h4 class="col-sm-3 col-form-label form-label" style="font-size: large;color:#2e3974;"> SUBJECT:
                                    </h4>
                                    <label class="col-sm-5 col-form-label form-label" style="font-size: large; text-transform: lowercase;" id="afficher-matiere">Mathematics
                                    </label>

                                </div>

                                <div class="form-group row" style="text-align: left;margin-left: 90px;">
                                    <h4 class="col-sm-3 col-form-label form-label" style="font-size: large;color:#2e3974;">Email:
                                    </h4>
                                    <label class="col-sm-6 col-form-label form-label" style="font-size: large; text-transform: lowercase;" id="afficher-email">alessarobert@gmail.com
                                    </label>

                                </div>
                                <div class="form-group row" style="text-align: left;margin-left: 90px;">
                                    <h4 class="col-sm-3 col-form-label form-label" style="font-size: large;color:#2e3974;">phone number:
                                    </h4>
                                    <label class="col-sm-5 col-form-label form-label" style="font-size: large; text-transform: lowercase;" id="afficher-phone">0611111111
                                    </label>

                                </div>
                            </div>











                        </div>



                        <hr>
                        <div class="container row justify-content-center user-social-link" style="margin-bottom: 50px;">
                            <div class="row" style="margin: auto;">
                                <div class="col-md" id="user-stats">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">classes</h5>
                                                    <span class="h2 font-weight-bold mb-0" id="afficher-nbr-classes">350,897</span>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                        <i class="fas fa-home"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-muted text-sm">
                                                <span class="text-success mr-2"><i class="fa fa-line-chart"></i>
                                                    <span id="nbr-file"></span></span>
                                                <span class="text-nowrap">Files pdf or images or videos</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" id="user-stats">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">courses</h5>
                                                    <span class="h2 font-weight-bold mb-0" id="afficher-nbr-courses"></span>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                        <i class="fas fa-book"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-muted text-sm">
                                                <span class="text-danger mr-2"><i class="fa fa-line-chart"></i>
                                                    <spna id="nbr-cours-disabled"></spna>
                                                </span>
                                                <span class="text-nowrap">Number of courses disabled</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md mt-3" id="user-stats">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="card-title text-uppercase text-muted mb-0">STUDENT</h5>
                                                    <span class="h2 font-weight-bold mb-0" id="afficher-nbr-etudiant">924</span>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                        <i class="fas fa-users"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-3 mb-0 text-muted text-sm">
                                                <span class="text-warning mr-2"><i class="fa fa-line-chart"></i>
                                                    <span id="nbr-account-disabled"></span></span>
                                                </br>
                                                <span class="text-nowrap">Account disabled </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <a id="a-view-details" href="instructor-details.php" class="btn btn-danger btn-rounded" style="width: 125px; margin-top: 50px;"><i class="material-icons">add</i> <span class="icon-text">VIEW ALL</span></a>
                        </div>


                    </div>







                </div>
            </div>
        </div>


        <div class="modal fade" id="deleteinstructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="col-lg container-fluid page__container">
                        <section id="checkout" class="checkout-section">
                            <div class="col-lg container-fluid page__container" style="margin-top: 70px;">

                                <div class=" media-center">
                                    <div class="forum-icon-wrapper">
                                        <a class="forum-thread-icon media-center" style="margin: auto;">
                                            <img src="assets/images/croix2.png" width="150" height="150px" style="display: block;">
                                        </a>

                                    </div>
                                </div>
                                <div class="row" style="margin-top: 70px;margin-bottom: 20px;">
                                    <h3 style="text-align: center;">
                                        Are you sure you want to delete instructor ?
                                    </h3>
                                </div>
                                <div style="margin-bottom:40px;float: right;">
                                    <a href="listProf.html" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b">Cancel</a>
                                    <a href="listProf.html" class="btn btn-primary" data-role="button" data-inline="true">Delete</a>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="disableinstructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="col-lg container-fluid page__container">
                        <section id="checkout" class="checkout-section">
                            <div class="col-lg container-fluid page__container" style="margin-top: 70px;">
                                <div class=" media-center">
                                    <div class="forum-icon-wrapper">
                                        <a class="forum-thread-icon media-center" style="margin: auto;">
                                            <img class="croix" src="assets/images/exclamation-mark.png" width="150" height="150px" style="display: block;">
                                        </a>

                                    </div>
                                </div>
                                <div class="row" style="margin-top: 70px;margin-bottom: 20px;">
                                    <h3 class="disableTitle">
                                        Are you sure you want to disable instructor ?
                                    </h3>
                                </div>

                                <div style="margin-bottom:20px; float: right;">
                                    <!-- <input data-dismiss="modal" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b" value="Cancel"> -->
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="listProf.html" class="btn btn-primary" data-role="button" data-inline="true">Disable</a>
                                    <p id="idinstructordisable" style="display: none;"></p>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>


        
        <div class="modal fade" id="enableinstructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="col-lg container-fluid page__container">
                        <section id="checkout" class="checkout-section">
                            <div class="container">
                                <div class=" media-center">
                                    <div class="forum-icon-wrapper">
                                        <img class="croix" src="assets/images/checked.png" alt="">

                                    </div>
                                </div>
                                <!-- <h3 style="text-align: center;">Enable student</h3> -->
                                <h3 class="disableTitle">
                                    Are you sure you want to enable instructor ?
                                </h3>
                                <div class="modal-button">
                                    <a href="studentlist.php" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b">Cancel</a>
                                    <a href="studentlist.php" class="btn btn-primary" data-role="button" data-inline="true" id="enableStudent">enable</a>
                                    <p id="idinstructorenable" style="display: none;"></p>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addinstructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <form id="sign-up-formm">
                        <div class="col-lg container-fluid page__container">

                            <section id="checkout" class="checkout-section">
                                <div class="container">
                                    <div class="section-title mb45 headline text-center">

                                    </div>
                                    <br>
                                    <h1 class="h2">Instructor INFORMATIONS</h1>
                                    <div class="card">

                                        <div class="list-group list-group-fit">
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                                    <div class="form-row">
                                                        <label id="label-firstname" for="firstname" class="col-md-3 col-form-label form-label">First name</label>
                                                        <div class="col-md-9">
                                                            <input name="prenom" id="firstname" type="text" placeholder="Instructor first name" value="" class="form-control" required>
                                                            <p class="error" id="prenomError-add"></p>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                    <div class="form-row">
                                                        <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">Last name</label>
                                                        <div class="col-md-9">
                                                            <input name="nom" id="lastname" type="text" placeholder="Instructor last name" value="" class="form-control" required>
                                                            <p class="error" id="nomError-add"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-email">
                                                    <div class="form-row">
                                                        <label id="label-email" for="email" class="col-md-3 col-form-label form-label"> email address</label>
                                                        <div class="col-md-9">
                                                            <div role="group" class="input-group input-group-merge">
                                                                <input name="email" id="email" type="email" placeholder="Instructor email address" value="" class="form-control form-control-prepended" required>
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="material-icons">email</i>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <p class="error" id="emailError-add"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                    <div class="form-row">
                                                        <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">CIN</label>
                                                        <div class="col-md-9">
                                                            <input name="cin" id="CIN" type="text" placeholder="Instructor CIN" value="" class="form-control" required>
                                                            <p class="error" id="cinError-add"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-phone">
                                                    <div class="form-row">
                                                        <label id="label-phone" for="phone" class="col-md-3 col-form-label form-label">Phone number</label>
                                                        <div class="col-md-9">
                                                            <input name="tel" id="phone" type="text" placeholder="Instructor phone number" value="" class="form-control
                                                                   required">
                                                            <p class="error" id="telError-add"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-password">
                                                    <div class="form-row">
                                                        <label id="label-password" for="password" class="col-md-3 col-form-label form-label">Password</label>
                                                        <div class="col-md-9">
                                                            <input id="pw" name="pw" type="password" placeholder="Enter password" value="" class="form-control" aria-describedby="passwordHelpBlock" onChange="onChange()">
                                                            <p class="error" id="pwError-add"></p>

                                                            <input type="checkbox" onclick="show()"> Show Password

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-password">
                                                    <div class="form-row">
                                                        <label id="label-cpassword" for="cpassword" class="col-md-3 col-form-label form-label">Confirm Password</label>
                                                        <div class="col-md-9">
                                                            <input id="cpassword" name="pwVerif" type="password" placeholder="confirm password" value="" class="form-control" aria-describedby="passwordHelpBlock" onChange="onChange()">
                                                            <p class="error" id="pwVerifError-add"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <p id="error-add-instructor"></p>

                                </div>

                        </div>

                        <div class="foo">
                            <input id="inscrir" type="submit" class="btn btn-success" style="margin-right: 15px;; margin-bottom: 15px;float:right;" value="Add instructor">
                        </div>


                </div>
                </section>
            </div>
            </form>
        </div>
        </div>
        </div>









        <div class="preloader">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>
        </div>

        <div class="mdk-header-layout js-mdk-header-layout">
            <div id="header" data-fixed class="mdk-header js-mdk-header mb-0">
                <div class="mdk-header__content">

                </div>
                <?php include("sidebar.php"); ?>
                <!-- Header -->
                <section class="home-section" style="overflow: auto;padding-bottom: 150px;">
                    <div class="home-content" style="overflow: auto;">
                        <div class="container-fluid page__container p-0">
                            <div class="row m-0">
                                <div class="col-lg container-fluid page__container">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
                                        <li class="breadcrumb-item ">Student list</li>

                                    </ol>
                                    <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                                        <div class="flex mb-2 mb-sm-0">
                                            <h1 style="text-align: center;font-size: 35px;font-weight: 200;color: #333;">Instructor list</h1>
                                        </div>
                                        <div style="float: right;margin-bottom: 0;margin-top: 70px;">
                                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addinstructor">New Instructor</a>
                                        </div>
                                    </div>
                                    <section id="checkout" class="checkout-section">
                                        <div class="card">
                                            <ul class="nav nav-tabs nav-tabs-card">
                                                <?php $admin = new Admin();
                                                ?>
                                                <?php $i = 0;
                                                foreach ($admin->afficherMatieres() as $matiere) {
                                                    $i++;
                                                ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php if ($i == 1) {
                                                                                echo "active";
                                                                            } ?> " href="#<?php echo strtolower($admin->convert_number_to_words($i)) ?>" data-toggle="tab"><?php echo $matiere['matiere']; ?></a>
                                                    </li>

                                                <?php } ?>

                                            </ul>
                                            <div class="card-body tab-content">

                                                <?php $crudProf = new CRUDProf();
                                                $crudClass  = new CRUDClass();
                                                $i = 0;
                                                foreach ($admin->afficherMatieres() as $matiere) {
                                                    $i++;
                                                    $classes =   $crudClass->readClassByMatiere($matiere['matiere']);

                                                ?>
                                                    <div class="tab-pane <?php if ($i == 1) {
                                                                                echo "active";
                                                                            } ?>" id="<?php echo strtolower($admin->convert_number_to_words($i)) ?>">

                                                        <div class="table-responsive" data-toggle="lists" data-lists-values='["name","last","email"]'>


                                                            <div class="search-form search-form--light mb-3">
                                                                <input type="text" class="form-control search" placeholder="Search">
                                                                <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                            </div>


                                                            <table class="table table-striped table-bordered table-rounded">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>FIRSTNAME</th>
                                                                        <th>LASTNAME</th>
                                                                        <th>EMAIL</th>
                                                                        <th>PHONE NUMBER</th>
                                                                        <th>CIN</th>
                                                                        <th>SUBJECT</th>
                                                                        <th>ACTIONS</th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="list">
                                                                    <?php foreach ($classes as $class) {
                                                                        $prof = $crudProf->readProfById($class['idProf']);  ?>
                                                                        <tr>
                                                                            <td><?php echo $prof['id']; ?></td>
                                                                            <td class="name"><?php echo $prof['prenom']; ?></td>
                                                                            <td class="last"><?php echo $prof['nom']; ?></td>
                                                                            <td class="email"><?php echo $prof['email']; ?></td>
                                                                            <td>
                                                                                <div><?php echo $prof['telephone']; ?></div>
                                                                            </td>
                                                                            <td>
                                                                                <div><?php echo $prof['cin']; ?></div>
                                                                            </td>
                                                                            <td>
                                                                                <div><?php echo $class['matiere']; ?></div>
                                                                            </td>
                                                                            <td>
                                                                                <div>
                                                                                    <span onclick="editerProf('<?php echo $prof['id']; ?>','<?php echo $prof['prenom']; ?>','<?php echo $prof['nom']; ?>','<?php echo $prof['email']; ?>','<?php echo $prof['cin']; ?>','<?php echo $prof['telephone']; ?>')" style="cursor:pointer;" class="modify"><i class="fa fa-edit" style="display: center;cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Edit"></i></span>
                                                                                    <button id="editProf" data-toggle="modal" data-target="#modifyinstructor" style="display:none;"></button>

                                                                                    <?php if ($prof['status'] == 0) { ?>
                                                                                        <a class="disableButton" onclick="disableInstructor('<?php echo $prof['id'] ?>')" style="cursor:pointer; text-decoration: underline;color:#66afff " data-toggle="tooltip" data-placement="top" title="Disable"><i class='fa fa-unlock'></i></a>

                                                                                    <?php } else { ?>
                                                                                        <a class="enableButton" onclick="enableInstructor('<?php echo $prof['id'] ?>')" style="cursor:pointer; text-decoration: underline;color:#66afff" data-toggle="tooltip" data-placement="top" title="Enable"><i class='fa fa-lock'></i></a>

                                                                                    <?php } ?>


                                                                               
                                                                           
                                                                            
                                                                                <?php $nbrEtudiant = $admin->countStudentOfTeacher($prof['id']);

                                                                                $nbrClasses = $admin->countClassesOfTeacher($prof['id']);
                                                                                $nbrCourses = $admin->countCoursesOfTeacher($prof['id']);
                                                                                $nbrFile = $admin->getNumberOfFiles($prof['id']);
                                                                                $nbrCoursesDisabled = $admin->countCoursesDisabled($prof['id']);
                                                                                $nbrAccountDisabled = $admin->countAccountDisabled($prof['id']);      ?>
                                                                                <span onclick="afficher('<?php echo $prof['id']; ?>','<?php echo $prof['prenom']; ?>','<?php echo $prof['nom']; ?>','<?php echo $prof['email']; ?>','<?php echo $prof['cin']; ?>','<?php echo $prof['telephone']; ?>','<?php echo $matiere['matiere']; ?>','<?php echo $nbrClasses ?>','<?php echo $nbrCourses; ?>','<?php echo $nbrEtudiant; ?>','<?php echo $nbrFile ?>','<?php echo $nbrCoursesDisabled ?>','<?php echo $nbrAccountDisabled ?>')" class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Show Profil" style="display: center; color: rgb(67, 160, 246);cursor:pointer;margin-left: 20px;"></span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                <?php
                                                } ?>
                                                <button style="display:none;" class="buttonShow" data-toggle="modal" data-target="#showinstructor"></button>
                                                <button style="display:none;" class="buttonDisable" data-toggle="modal" data-target="#disableinstructor"></button>
                                                <button style="display:none;" class="buttonEnable" data-toggle="modal" data-target="#enableinstructor"></button>

                                            </div>

                                        </div>

                                </div>
                            </div>

                </section>





                <script src="assets/js/pw.js"></script>
                <script src="assets/js/studentlist.js"></script>
                <script src="assets/js/script.js"></script>

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
                <!-- <script src="assets/js/app-settings.js"></script> -->

                <!-- List.js -->
                <script src="assets/vendor/list.min.js"></script>
                <script src="assets/js/list.js"></script>
                <script src="assets/js/creerProf.js"></script>
                <script src="assets/js/enable.js"></script>
                <script src="assets/js/modify.js"></script>
                <script src="assets/js/modifierProf.js"></script>
                <script src="assets/js/afficherProf.js"></script>


    </body>

    </html>
<?php } ?>