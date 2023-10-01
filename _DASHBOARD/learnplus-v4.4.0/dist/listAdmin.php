<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location:guest-login.php");
} else {
    require_once '../../admin/include/autoloadAdmin.php';

    $admin = new Admin();
    if ($_SESSION['admin'] == 0 or $admin->isSuperviseur() != $_SESSION['id']) {
        header("Location:guest-login.php");
    }


    $id = $_SESSION['id'];



?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <style>
        .foo {
            display: flex;
            justify-content: end;
            margin-top: 50px;
        }
    </style>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin list</title>

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


    <body>


        <div class="modal fade" id="disableAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                        Are you sure you want to disable admin ?
                                    </h3>
                                </div>

                                <div style="margin-bottom:20px; float: right;">
                                    <!-- <input data-dismiss="modal" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b" value="Cancel"> -->
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a class="btn btn-primary" data-role="button" data-inline="true" id="disableadmin">Disable</a>
                                    <p id="idStudent" style="display: none;"></p>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="enableadminn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                    Are you sure you want to enable admin ?
                                </h3>
                                <div class="modal-button">
                                    <a href="studentlist.php" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b">Cancel</a>
                                    <a class="btn btn-primary" data-role="button" data-inline="true" id="enableadmin">enable</a>
                                    <p id="idStudentp" style="display: none;"></p>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        

       

        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">


                    <div class="col-lg container-fluid page__container">


                        <form id="add-form">

                            <section id="checkout" class="checkout-section">
                                <div class="container">
                                    <div class="section-title mb45 headline text-center">

                                    </div>
                                    <br>
                                    <h1 class="h2">ADMIN INFORMATIONS</h1>
                                    <div class="card">

                                        <div class="list-group list-group-fit">
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                                    <div class="form-row">
                                                        <label id="label-firstname" for="firstname-add" class="col-md-3 col-form-label form-label">First name</label>
                                                        <div class="col-md-9">
                                                            <input name="prenom" id="firstname-add" type="text" placeholder="Admin first name" value="" class="form-control" required>
                                                            <p class="error" id="prenomError"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                    <div class="form-row">
                                                        <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">Last name</label>
                                                        <div class="col-md-9">
                                                            <input name="nom" id="lastname" type="text" placeholder="Admin last name" value="" class="form-control" required>
                                                            <p class="error" id="nomError"></p>

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
                                                                <input name="email" id="email" type="email" placeholder="Admin email address" value="" class="form-control form-control-prepended" required>
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="material-icons">email</i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="error" id="emailError"></p>

                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                    <div class="form-row">
                                                        <label id="label-lastname" for="cin-add" class="col-md-3 col-form-label form-label">CIN</label>
                                                        <div class="col-md-9">
                                                            <input name="cin" id="cin-add" type="text" placeholder="Admin CIN" value="" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-phone">
                                                    <div class="form-row">
                                                        <label id="label-phone" for="phone" class="col-md-3 col-form-label form-label">Phone number</label>
                                                        <div class="col-md-9">
                                                            <input name="tel" id="phone" type="text" placeholder="Admin phone number" value="" class="form-control
                                                                       required">
                                                            <p class="error" id="telError"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-password">
                                                    <div class="form-row">
                                                        <label id="label-password" for="password" class="col-md-3 col-form-label form-label">Password</label>
                                                        <div class="col-md-9">
                                                            <input id="pw" name="pw" type="password" placeholder="Admin password" value="" class="form-control" aria-describedby="passwordHelpBlock" onChange="onChange()">

                                                            <input type="checkbox" onclick="show()" id="check-pw"> <label for="check-pw">Show Password</label>
                                                            <p class="error" id="pwError"></p>

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
                                                            <p class="error" id="pwVerifError"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <div class="foo">
                                    <input id="add-admin" type="submit" class="btn btn-success" style="margin-bottom: 15px;margin-right: 10px;" value="Add Admin">
                                </div>

                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">


                    <div class="col-lg container-fluid page__container">
                        <form id="edit-form-admin">
                            <input style="display: none;" name="id" id="id-edit-admin">
                            <section id="checkout" class="checkout-section">
                                <div class="container">
                                    <div class="section-title mb45 headline text-center">

                                    </div>
                                    <br>
                                    <h1 class="h2">ADMIN INFORMATIONS</h1>
                                    <div class="card">

                                        <div class="list-group list-group-fit">
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                                    <div class="form-row">
                                                        <label id="label-firstname" for="firstname" class="col-md-3 col-form-label form-label">First name</label>
                                                        <div class="col-md-9">
                                                            <input id="firstname-edit" type="text" placeholder="Admin first name" value="" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                    <div class="form-row">
                                                        <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">Last name</label>
                                                        <div class="col-md-9">
                                                            <input id="lastname-edit" type="text" placeholder="Admin last name" value="" class="form-control" disabled>
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
                                                                <input name="email" id="email-edit" type="email" placeholder="Admin email address" value="" class="form-control form-control-prepended" required>
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="material-icons">email</i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <p class="error" id="emailError-edit"></p>

                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                    <div class="form-row">
                                                        <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">CIN</label>
                                                        <div class="col-md-9">
                                                            <input id="cin-edit" type="text" placeholder="Admin CIN" value="" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-phone">
                                                    <div class="form-row">
                                                        <label id="label-phone" for="phone" class="col-md-3 col-form-label form-label">Phone number</label>
                                                        <div class="col-md-9">
                                                            <input id="phone-edit" type="text" placeholder="Admin phone number" value="" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>


                                </div>

                                <div class="foo">
                                    <input id="submit-edit-admin" type="submit" class="btn btn-success" style="margin-bottom: 15px; margin-right: 10px;" value="Edit Admin">
                                </div>

                            </section>
                        </form>

                    </div>
                </div>
            </div>
        </div>





        <?php include("sidebar.php"); ?>


        <section class="home-section" style="overflow:auto ; padding-bottom: 150px;">
            <div class="home-content" style="overflow: auto;">
                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="instructor-dashboard.html">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>

                    <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                        <div class="flex mb-2 mb-sm-0">
                            <h1 class="h2">Manage Admins</h1>
                        </div>
                        <a href="#" class="btn btn-success" id="addAdminBtn" data-toggle="modal" data-target="#exampleModalLong">Add Admin</a>
                    </div>
                    <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                        <div class="d-flex flex-wrap2 align-items-center mb-headings">

                        </div>




                        <div class="row">
                            <?php
                            $crudAdmin = new CRUDAdmin();
                            foreach ($crudAdmin->readAdmin() as $admin) { ?>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="d-flex flex-column flex-sm-row">
                                                <span class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">

                                                </span>
                                                <div class="flex" style="min-width: 200px;">
                                                    <!-- <h5 class="card-title text-base m-0"><a href="instructor-course-edit.html"><strong>Learn Vue.js</strong></a></h5> -->
                                                    <h4 class="card-title mb-1"><?php echo $admin['prenom'] . " "; ?><?php echo $admin['nom']; ?></h4>
                                                    <p class="text-black-70"><?php echo $admin['cin']; ?></p>
                                                    <p class="text-black-70"><?php echo $admin['email']; ?></p>
                                                    <p class="text-black-70"><?php echo $admin['telephone']; ?></p>


                                                    <div class="d-flex align-items-end">

                                                        <div class="text-center">

                                                            <span style="cursor: pointer;" onclick="editer('<?php echo $admin['id']; ?>','<?php echo $admin['nom']; ?>','<?php echo $admin['prenom']; ?>','<?php echo $admin['email']; ?>','<?php echo $admin['cin']; ?>','<?php echo $admin['telephone']; ?>')" class="btn btn-sm btn-white">Edit</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card__options dropdown right-0 pr-2">
                                            <span style="cursor:pointer" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                                <i class="material-icons">more_vert</i>
                                            </span>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <?php if ($admin['status'] == 0) { ?>
                                                    <span onclick="disable(<?php echo $admin['id']; ?>)" class=" dropdown-item text-warning" style="cursor:pointer">Disable</span>

                                                <?php } else { ?>
                                                    <span onclick="enable(<?php echo $admin['id']; ?>)" class=" dropdown-item text-warning" style="cursor:pointer">Enable</span>

                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php } ?>
                            <button style="display:none;" data-toggle="modal" data-target="#editadmin" id="button-edit-admin"></button>
                            <button style="display:none;" class="buttonDisable" data-toggle="modal" data-target="#disableAdmin"></button>
                            <button style="display:none;" class="buttonEnable" data-toggle="modal" data-target="#enableadminn"></button>


                        </div>


                    </div>


                </div>
            </div>
        </section>

        <script src="assets/js/script.js"></script>
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
        <script src="assets/js/studentlist.js"></script>
        <script src="assets/js/pw.js"></script>
        <script src="assets/js/enable.js"></script>
        <script src="assets/js/inscrire.js"></script>
        <script src="assets/js/modifierAdmin.js"></script>

    </body>

    </html>
<?php } ?>