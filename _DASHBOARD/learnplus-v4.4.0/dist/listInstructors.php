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
    </style>








    <body>
      
        <div class="modal fade" id="acceptinstructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-body">
                        <h3 style="text-align: center;">Accept Instructor</h3>
                        <div class="container">
                            <!-- <p id="idCoursSupprime" ></p> -->
                            <br>
                            <p style="font-size: 20px;">Are you sure you want to accept this instructor ?</p>
                            <div style="margin-bottom:15px;margin-top: 20px; color: #fff;float: right;">
                                <form action="../../admin/include/AcceptBeTeacher.php" method="POST">
                                    <input type="hidden" id="idinstructoraccept" name="idInstructorAccept">


                                    <a href="listInstructors.php" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b">Cancel</a>
                                    <button class="btn btn-primary" data-role="button" data-inline="true">Accept</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deletinstructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-body">
                        <h3 style="text-align: center;">Delete Instructor</h3>
                        <div class="container">
                            <!-- <p id="idCoursSupprime" ></p> -->
                            <br>
                            <p style="font-size: 20px;">Are you sure you want to delete this instructor ?</p>
                            <div style="margin-bottom:15px;margin-top: 20px; color: #fff;float: right;">
                                <form action="../../admin/include/supprimerBeTeacher.php" method="POST">
                                    <input type="hidden" id="idinstructorsupprimer" name="idInstructorSupprime">


                                    <a href="listInstructors.php" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b">Cancel</a>
                                    <button class="btn btn-primary" data-role="button" data-inline="true">Delete</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="disablestudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="col-lg container-fluid page__container">
                        <section id="checkout" class="checkout-section">
                            <div class="col-lg container-fluid page__container" style="margin-top: 70px;">
                                <div class=" media-center">
                                    <div class="forum-icon-wrapper">
                                        <a class="forum-thread-icon media-center" style="margin: auto;">
                                            <img src="assets/images/cancel.png" width="150" height="150px" style="display: block;">
                                        </a>

                                    </div>
                                </div>
                                <div class="row" style="margin-top: 70px;margin-bottom: 20px;">
                                    <h3>
                                        Are you sure you want to disable student ?
                                    </h3>
                                </div>
                                <div style="margin-bottom:20px; float: right;">
                                    <a href="studentlist.html" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b">Cancel</a>
                                    <a href="studentlist.html" class="btn btn-primary" data-role="button" data-inline="true">Disable</a>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">


                    <div class="col-lg container-fluid page__container">
                        <section id="checkout" class="checkout-section">
                            <div class="container">
                                <div class="section-title mb45 headline text-center">

                                </div>
                                <br>

                                <h2 class=" text-center" style="text-transform: uppercase;">Instructor INFORMATIONS</h2>
                                <h2 class=" text-center" style="text-transform: uppercase;">INSTRUCTOR INFORMATIONS</h2>

                                <div class="card">
                                    <div class="list-group list-group-fit">
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                <div class="form-row">
                                                    <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">ID</label>
                                                    <div class="col-md-9">
                                                        <input id="ID" type="text" placeholder="Student ID" value="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                                <div class="form-row">
                                                    <label id="label-firstname" for="firstname" class="col-md-3 col-form-label form-label">First name</label>
                                                    <div class="col-md-9">
                                                        <input id="firstname" type="text" placeholder="Student first name" value="" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                <div class="form-row">
                                                    <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">Last name</label>
                                                    <div class="col-md-9">
                                                        <input id="lastname" type="text" placeholder="Student last name" value="" class="form-control" required>
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
                                                            <input id="email" type="email" placeholder="Student email address" value="" class="form-control form-control-prepended" required>
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="material-icons">email</i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-level">
                                                <div class="form-row">
                                                    <label id="label-level" for="level" class="col-md-3 col-form-label form-label">Level</label>
                                                    <div class="col-md-9">
                                                        <input id="level" type="text" placeholder="Student level" value="" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-cin">
                                                <div class="form-row">
                                                    <label id="label-cin" for="cin" class="col-md-3 col-form-label form-label">CIN</label>
                                                    <div class="col-md-9">
                                                        <input id="CIN" type="text" placeholder="Student CIN" value="" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-phone">
                                                <div class="form-row">
                                                    <label id="label-phone" for="phone" class="col-md-3 col-form-label form-label">Phone number</label>
                                                    <div class="col-md-9">
                                                        <input id="phone" type="text" placeholder="Student phone number" value="" class="form-control
                                                                       required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-password">
                                                <div class="form-row">
                                                    <label id="label-password" for="password" class="col-md-3 col-form-label form-label">Password</label>
                                                    <div class="col-md-9">
                                                        <input id="password" name="password" type="password" placeholder=" password" value="" class="form-control" aria-describedby="passwordHelpBlock" onChange="onChange()">
                                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                                        </small>
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
                                                        <input id="cpassword" name="cpassword" type="password" placeholder="confirm password" value="" class="form-control" aria-describedby="passwordHelpBlock" onChange="onChange()">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <h4 class="h2">AFFECT STUDENT TO CLASS</h4>

                                <div class="alert alert-light border-1 border-left-3 border-left-primary d-flex">
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col">

                                            <select name="s1" id="s1" class="form-control selcls" style="margin-right: 20px;">
                                                <option value="">subject</option>
                                                <option value="class2">class2</option>
                                                <option value="class3">class3</option>
                                                <option value="class4">class4</option>
                                            </select>
                                        </div>

                                        <div class="col">

                                            <select name="s1" id="s1" class="form-control selcls" style="margin-right: 20px;">
                                                <option value="">subject</option>
                                                <option value="class2">class2</option>
                                                <option value="class3">class3</option>
                                                <option value="class4">class4</option>
                                            </select>
                                        </div>

                                        <div class="col">

                                            <select name="s1" id="s1" class="form-control selcls" style="margin-right: 20px;">
                                                <option value="">subject</option>
                                                <option value="class2">class2</option>
                                                <option value="class3">class3</option>
                                                <option value="class4">class4</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select name="s1" id="s1" class="form-control selcls" style="margin-right: 20px;">
                                                <option value="">subject</option>
                                                <option value="class2">class2</option>
                                                <option value="class3">class3</option>
                                                <option value="class4">class4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="foo">
                                    <a href="studentlist.html" class="btn btn-success" style="float: right; margin-bottom: 15px;">Add student</a>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="acceptstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">


                    <div class="col-lg container-fluid page__container">
                        <section id="checkout" class="checkout-section">
                            <div class="container">
                                <div class="section-title mb45 headline text-center">

                                </div>
                                <br>
                                <h1 class="h2">STUDENT INFORMATIONS</h1>
                                <div class="card">
                                    <div class="list-group list-group-fit">
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                <div class="form-row">
                                                    <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">ID</label>
                                                    <div class="col-md-9">
                                                        <input id="ID" type="text" placeholder="Student ID" value="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                                <div class="form-row">
                                                    <label id="label-firstname" for="firstname" class="col-md-3 col-form-label form-label">First name</label>
                                                    <div class="col-md-9">
                                                        <input id="firstname" type="text" placeholder="Student first name" value="" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                <div class="form-row">
                                                    <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">Last name</label>
                                                    <div class="col-md-9">
                                                        <input id="lastname" type="text" placeholder="Student last name" value="" class="form-control" required>
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
                                                            <input id="email" type="email" placeholder="Student email address" value="" class="form-control form-control-prepended" required>
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="material-icons">email</i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-level">
                                                <div class="form-row">
                                                    <label id="label-level" for="level" class="col-md-3 col-form-label form-label">Level</label>
                                                    <div class="col-md-9">
                                                        <input id="level" type="text" placeholder="Student level" value="" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-cin">
                                                <div class="form-row">
                                                    <label id="label-cin" for="cin" class="col-md-3 col-form-label form-label">CIN</label>
                                                    <div class="col-md-9">
                                                        <input id="CIN" type="text" placeholder="Student CIN" value="" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-phone">
                                                <div class="form-row">
                                                    <label id="label-phone" for="phone" class="col-md-3 col-form-label form-label">Phone number</label>
                                                    <div class="col-md-9">
                                                        <input id="phone" type="text" placeholder="Student phone number" value="" class="form-control
                                                                       required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-password">
                                                <div class="form-row">
                                                    <label id="label-password" for="password" class="col-md-3 col-form-label form-label">Password</label>
                                                    <div class="col-md-9">
                                                        <input id="password" name="password" type="password" placeholder=" password" value="" class="form-control" aria-describedby="passwordHelpBlock" onChange="onChange()">
                                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                                        </small>
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
                                                        <input id="cpassword" name="cpassword" type="password" placeholder="confirm password" value="" class="form-control" aria-describedby="passwordHelpBlock" onChange="onChange()">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <h4 class="h2">AFFECT STUDENT TO CLASS</h4>

                                <div class="alert alert-light border-1 border-left-3 border-left-primary d-flex">
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col">

                                            <select name="s1" id="s1" class="form-control selcls" style="margin-right: 20px;">
                                                <option value="">subject</option>
                                                <option value="class2">class2</option>
                                                <option value="class3">class3</option>
                                                <option value="class4">class4</option>
                                            </select>
                                        </div>

                                        <div class="col">

                                            <select name="s1" id="s1" class="form-control selcls" style="margin-right: 20px;">
                                                <option value="">subject</option>
                                                <option value="class2">class2</option>
                                                <option value="class3">class3</option>
                                                <option value="class4">class4</option>
                                            </select>
                                        </div>

                                        <div class="col">

                                            <select name="s1" id="s1" class="form-control selcls" style="margin-right: 20px;">
                                                <option value="">subject</option>
                                                <option value="class2">class2</option>
                                                <option value="class3">class3</option>
                                                <option value="class4">class4</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select name="s1" id="s1" class="form-control selcls" style="margin-right: 20px;">
                                                <option value="">subject</option>
                                                <option value="class2">class2</option>
                                                <option value="class3">class3</option>
                                                <option value="class4">class4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="foo">
                                    <a href="listeEtudiant.html" class="btn btn-success" style="float: right; margin-bottom: 15px;">Accept student</a>
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
                                    <h2 class="text-center" style="text-transform: uppercase;">Instructor INFORMATIONS</h2>
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
                            <input id="inscrir" type="submit" class="btn btn-success" style="margin-right: 15px;; margin-bottom: 15px;float: right;" value="Add instructor">
                        </div>


                </div>
                </section>
            </div>
            </form>
        </div>
        </div>
        </div>

        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">


                    <div class="col-lg container-fluid page__container">
                        <section id="checkout" class="checkout-section">
                            <div class="container">
                                <div class="section-title mb45 headline text-center">

                                </div>
                                <br>
                                <h1 class="h2">STUDENT INFORMATIONS</h1>
                                <div class="card">
                                    <div class="list-group list-group-fit">
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                <div class="form-row">
                                                    <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">ID</label>
                                                    <div class="col-md-9">
                                                        <input id="ID" type="text" placeholder="Student ID" value="" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                                <div class="form-row">
                                                    <label id="label-firstname" for="firstname" class="col-md-3 col-form-label form-label">First name</label>
                                                    <div class="col-md-9">
                                                        <input id="firstname" type="text" placeholder="Admin first name" value="" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                <div class="form-row">
                                                    <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">Last name</label>
                                                    <div class="col-md-9">
                                                        <input id="lastname" type="text" placeholder="Admin last name" value="" class="form-control" disabled>
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
                                                            <input id="email" type="email" placeholder="Admin email address" value="" class="form-control form-control-prepended" required>
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="material-icons">email</i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                <div class="form-row">
                                                    <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">CIN</label>
                                                    <div class="col-md-9">
                                                        <input id="CIN" type="text" placeholder="Admin CIN" value="" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-phone">
                                                <div class="form-row">
                                                    <label id="label-phone" for="phone" class="col-md-3 col-form-label form-label">Phone number</label>
                                                    <div class="col-md-9">
                                                        <input id="phone" type="text" placeholder="Admin phone number" value="" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="foo">
                                    <a href="studentlist.html" class="btn btn-success" style="float: right; margin-bottom: 15px;">Modify student</a>
                                </div>
                            </div>
                        </section>
                    </div>
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

            <!-- Header -->

            <div id="header" data-fixed class="mdk-header js-mdk-header mb-0">
                <div class="mdk-header__content">

                </div>
                <?php include("sidebar.php"); ?>
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
                                            <h1 style="text-align: center;font-size: 35px;font-weight: 200;color: #333;">Instructors Request</h1>
                                        </div>
                                        
                                    </div>
                                    <section id="checkout" class="checkout-section">

                                        <div class="card">
                                            <!-- <ul class="nav nav-tabs nav-tabs-card">
                                            <li class="nav-item">
                                                <a class="nav-link active"
                                                   href="#first"
                                                   data-toggle="tab">2nd year Baccalaureate</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link "
                                                   href="#second"
                                                   data-toggle="tab">1st year Baccalaureate</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link "
                                                   href="#third"
                                                   data-toggle="tab">Common Core</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link "
                                                   href="#fourth"
                                                   data-toggle="tab">3rd year Middle School </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link "
                                                   href="#fifth"
                                                   data-toggle="tab">2nd year Middle School </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link "
                                                   href="#sixth"
                                                   data-toggle="tab">1st year Middle School </a>
                                            </li>
                                        </ul> -->
                                            <div class="card-body tab-content">
                                                <div class="tab-pane active" id="first">

                                                    <div class="table-responsive" data-toggle="lists" data-lists-values='["name","last","email"]'>


                                                        <div class="search-form search-form--light mb-3">
                                                            <input type="text" class="form-control search" placeholder="Search">
                                                            <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                        </div>


                                                        <table class="table table-striped table-bordered" style="width:100%;">
                                                            <thead>
                                                                <tr>

                                                                    <th>FIRSTNAME</th>
                                                                    <th>LASTNAME</th>
                                                                    <th>EMAIL</th>
                                                                    <th>PHONE NUMBER</th>
                                                                    <th>RESUME</th>
                                                                    <th colspan="3" scope="colgroup" class="text-center">ACTION</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody class="list">
                                                                <?php
                                                                $admin = new Admin();
                                                                foreach ($admin->GetBeTeacher() as $teacher) {


                                                                ?>
                                                                    <tr>

                                                                        <td class="name"><?php echo $teacher['nom']; ?></td>
                                                                        <td class="last"><?php echo $teacher['prenom']; ?></td>
                                                                        <td class="email"><?php echo $teacher['email']; ?></td>
                                                                        <td> <?php echo $teacher['phone']; ?></td>
                                                                        <td> <?php if ($teacher['resume']) { ?><a href="../../admin/include/lirePdf.php?name=<?php echo $teacher['resume']; ?> ">voir resume</a> <?php } ?></td>

                                                                        <td>

                                                                            <a href="#" id="addAdminBtn" onclick="acceptInstuctor(<?php echo $teacher['id']; ?>)" data-toggle="modal" data-target="#acceptinstructor">
                                                                                <i class="fa fa-user-plus text-success text-center" style="display: flex;justify-content: center;align-items: center;" data-toggle="tooltip" data-placement="bottom" title="ACCEPT"></i></a>


                                                                        </td>
                                                                        <td>
                                                                            <a href="#" id="addAdminBtn" onclick="deleteInstuctor(<?php echo $teacher['id']; ?>)" data-toggle="modal" data-target="#deletinstructor">
                                                                                <i class="fa fa-user-times text-danger" data-toggle="tooltip" data-placement="bottom" title="DISABLE"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>

                                            </div>





                                        </div>


                                </div>
                            </div>


                        </div>










                        <!-- <div class="container">
                            <h1>Student list</h1>
                                                <div class="section-title mb45 headline text-center">
                        
                                                </div>
                                                <br>
                                            <div class="title">Mathematics</div>
                                            <br>
                                            <button  class="accordion" >2nd year baccalaureate</button>
                                            <div class="panel">
                                                <section class="course-list-view table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                           <tr class="list-head">
                                                                <th>ID</th>
                                                                <th>FIRST NAME</th>
                                                                <th>LAST NAME</th>
                                                                <th>EMAIL</th>
                                                                <th>PHONE NUMBER</th>
                                                                <th>CIN</th>
                                                                <th>LEVEL</th>
                                                                <th>modify</th>
                                                                <th>disable</th>
                                                                <th>delete</th>
                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="course-list-text">1</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">oumayma</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">bounouh</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">oumayma@gmail.com</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">060000000</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">f000000</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">2nd year baccalaureate</div>
                                                                </td>
                                                                <td>
                                                                    <a  href="#" class="fa fa-edit" id="addAdminBtn" onclick="openForm" data-toggle="modal" data-target="#exampleModalLong"></a>
                                                                </td>
                                                                <td>
                                                                    <a class="fa fa-ban" id="addAdminBtn" onclick="openForm" data-toggle="modal" data-target="#disablestudent" ></a>
                                                                </td>
                                                                <td>
                                                                    <a class="fa fa-trash" id="addAdminBtn" onclick="openForm" data-toggle="modal" data-target="#deletestudent"></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="course-list-text">2</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">douaa</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">moutanabih</div>
                                                                </td>
                                                                <td>
                                                                <div class="course-list-text">douaa.01@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">2nd year baccalaureate</div>
                                                            </td>
                                                            <td>
                                                                <a  href="#" class="fa fa-edit" id="addAdminBtn" onclick="openForm" data-toggle="modal" data-target="#exampleModalLong" style="display: center;"></a>
                                                            </td>
                                                            <td>
                                                                <a class="fa fa-ban" id="addAdminBtn" onclick="openForm" data-toggle="modal" data-target="#disablestudent" ></a>
                                                            </td>
                                                            <td>
                                                                <a class="fa fa-trash" id="addAdminBtn" onclick="openForm" data-toggle="modal" data-target="#deletestudent"></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="course-list-text">3</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">rihab</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">moutanabih</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">rihab2001@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">2nd year baccalaureate</div>
                                                            </td>
                                                            <td>
                                                                <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="course-list-text">4</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">marwa</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">alibrahimi</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">marwaal02@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">2nd year baccalaureate</div>
                                                            </td>
                                                            <td>
                                                                <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="course-list-text">5</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">oumayma</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">bounouh</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">oumayma@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">2nd year baccalaureate</div>
                                                            </td>
                                                            <td>
                                                                <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="course-list-text">6</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">oumayma</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">bounouh</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">oumayma@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">2nd year baccalaureate</div>
                                                            </td>
                                                            <td>
                                                                <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                            
                                                </section>
                                            </div>
                                        
                                            <button  class="accordion">1st year baccalaureate</button>
                                            <div class="panel">
                                                <div class="course-list-view table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                           <tr class="list-head">
                                                                <th>ID</th>
                                                                <th>FIRST NAME</th>
                                                                <th>LAST NAME</th>
                                                                <th>EMAIL</th>
                                                                <th>PHONE NUMBER</th>
                                                                <th>CIN</th>
                                                                <th>LEVEL</th>
                                                                <th>modify</th>
                                                                <th>disable</th>
                                                                <th>delete</th>
                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="course-list-text">1</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">oumayma</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">bounouh</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">oumayma@gmail.com</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">060000000</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">f000000</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">1st year baccalaureate</div>
                                                                </td>
                                                                <td>
                                                                    <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                                </td>
                                                                <td>
                                                                    <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                                </td>
                                                                <td>
                                                                    <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="course-list-text">2</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">douaa</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">moutanabih</div>
                                                                </td>
                                                                <td>
                                                                <div class="course-list-text">douaa.01@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">1st year baccalaureate</div>
                                                            </td>
                                                            <td>
                                                                <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="course-list-text">3</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">rihab</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">moutanabih</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">rihab2001@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">1st year baccalaureate</div>
                                                            </td>
                                                            <td>
                                                                <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="course-list-text">4</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">marwa</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">alibrahimi</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">marwaal02@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">1st year baccalaureate</div>
                                                            </td>
                                                            <td>
                                                                <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="course-list-text">5</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">oumayma</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">bounouh</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">oumayma@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">1st year baccalaureate</div>
                                                            </td>
                                                            <td>
                                                                <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="course-list-text">6</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">oumayma</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">bounouh</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">oumayma@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">1st year baccalaureate</div>
                                                            </td>
                                                            <td>
                                                                <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                            </td>
                                                        </tr>
                                                </tbody>
                                                </table>
                                            
                                            </div>
                                            </div>
                                            <button  class="accordion">Tronc commun</button>
                                            <div class="panel">
                                                <section class="course-list-view table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                           <tr class="list-head">
                                                                <th>ID</th>
                                                                <th>FIRST NAME</th>
                                                                <th>LAST NAME</th>
                                                                <th>EMAIL</th>
                                                                <th>PHONE NUMBER</th>
                                                                <th>CIN</th>
                                                                <th>LEVEL</th>
                                                                <th>modify</th>
                                                                <th>disable</th>
                                                                <th>delete</th>
                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="course-list-text">1</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">oumayma</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">bounouh</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">oumayma@gmail.com</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">060000000</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">f000000</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">2ème bac</div>
                                                                </td>
                                                                <td>
                                                                    <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                                </td>
                                                                <td>
                                                                    <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                                </td>
                                                                <td>
                                                                    <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="course-list-text">2</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">douaa</div>
                                                                </td>
                                                                <td>
                                                                    <div class="course-list-text">moutanabih</div>
                                                                </td>
                                                                <td>
                                                                <div class="course-list-text">douaa.01@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">2ème bac</div>
                                                            </td>
                                                            <td>
                                                                <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="course-list-text">3</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">rihab</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">moutanabih</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">rihab2001@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">2ème bac</div>
                                                            </td>
                                                            <td>
                                                                <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="course-list-text">4</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">marwa</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">alibrahimi</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">marwaal02@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">2ème bac</div>
                                                            </td>
                                                            <td>
                                                                <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="course-list-text">5</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">oumayma</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">bounouh</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">oumayma@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">2ème bac</div>
                                                            </td>
                                                            <td>
                                                                <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="course-list-text">6</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">oumayma</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">bounouh</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">oumayma@gmail.com</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">060000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">f000000</div>
                                                            </td>
                                                            <td>
                                                                <div class="course-list-text">2ème bac</div>
                                                            </td>
                                                            <td>
                                                                <a class="btn" href="modify-student.html"><i class="fa fa-edit"></i></a>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-ban" onclick="desactiver()"></i></button>
                                                            </td>
                                                            <td>
                                                                <button class="btn"><i class="fa fa-trash" onclick="supprimer()"></i></button>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                            
                                                </section>
                                            </div>
                        </div> -->

                </section>
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
        <script>
            function deleteInstuctor(id) {
                document.getElementById('idinstructorsupprimer').value = id;

            }

            function acceptInstuctor(id) {
                document.getElementById('idinstructoraccept').value = id;

            }
        </script>

    </body>

    </html>
<?php } ?>