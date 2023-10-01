<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location:connecter.php");
} else {
    if ($_SESSION['admin'] == 0) {
        header("Location:connecter.php");
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
        <title>Instructor list</title>

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

        <div class="modal fade" id="deleteprof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="col-lg container-fluid page__container">
                        <section id="checkout" class="checkout-section">
                            <div class="container">
                                <h3 style="text-align: center;">Delete Instuctor Account</h3>
                                <h3>
                                    Are you sure you want to delete Instructor account ?
                                </h3>
                                <div style="margin-bottom:20px;">
                                    <a href="listProf.php" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b">Cancel</a>
                                    <a href="listProf.php" class="btn btn-primary" data-role="button" data-inline="true">Delete</a>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="disableprof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="col-lg container-fluid page__container">
                        <section id="checkout" class="checkout-section">
                            <div class="container">
                                <h3 style="text-align: center;">Disable Instuctor Account</h3>
                                <h3>
                                    Are you sure you want to disable Instuctor Account ?
                                </h3>
                                <div style="margin-bottom:20px;">
                                    <a href="listProf.php" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b">Cancel</a>
                                    <a href="listProf.php" id="disableStudent" class="btn btn-primary" data-role="button" data-inline="true">Disable</a>
                                    <p id="idStudent" style="display: none;"></p>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <!-- /****************************enable*******************************/ -->
        <div class="modal fade" id="enableprof" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="col-lg container-fluid page__container">
                        <section id="checkout" class="checkout-section">
                            <div class="container">
                                <h3 style="text-align: center;">enable Instuctor Account</h3>
                                <h3>
                                    Are you sure you want to enable Instuctor Account ?
                                </h3>
                                <div style="margin-bottom:20px;">
                                    <a href="listProf.php" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b">Cancel</a>
                                    <a href="listProf.php" id="enableStudent" class="btn btn-primary" data-role="button" data-inline="true">Enable</a>
                                    <p id="idStudent2" style="display: none;"></p>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- /*************************enable end ********************************/ -->



        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                            <input name="nom" id="lastname" type="text" placeholder="Instructor last name" value="" class="form-control" required>
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
                                                                <input name="email" id="email" type="email" placeholder="Instructor email address" value="" class="form-control form-control-prepended" required>
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
                                                            <input name="cin" id="CIN" type="text" placeholder="Instructor CIN" value="" class="form-control" required>
                                                            <p class="error" id="cinError"></p>

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
                                                            <input id="pw" name="pw" type="password" placeholder="Enter password" value="" class="form-control" aria-describedby="passwordHelpBlock" onChange="onChange()">
                                                            <p class="error" id="pwError"></p>

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
                                                            <p class="error" id="pwVerifError"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <p id="error"></p>

                                </div>

                        </div>

                        <div class="foo">
                            <input id="inscrir" type="submit" class="btn btn-success" style="margin-right: 15px;; margin-bottom: 15px;" value="Add instructor">
                        </div>


                </div>
                </section>
            </div>
            </form>
        </div>
        </div>
        </div>




        <div class="modal fade" id="modifyinstructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">


                    <div class="col-lg container-fluid page__container">


                        <section id="checkout" class="checkout-section">
                            <div class="container">
                                <form id="sign-up-form">
                                    <input name="id" id="idEtudiant" style="display:none;">

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
                                                            <input id="prenom" type="text" placeholder="Instructor full name" value="" class="form-control" disabled>
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
                                                                <input name="email" id="mail" type="email" placeholder="Instructor email address" value="" class="form-control form-control-prepended" required>
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
                                                            <input id="cin" type="text" placeholder="Instructor CIN" value="" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-phone">
                                                    <div class="form-row">
                                                        <label id="label-phone" for="phone" class="col-md-3 col-form-label form-label">Phone number</label>
                                                        <div class="col-md-9">
                                                            <input id="tel" type="text" placeholder="Instructor phone number" value="" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>


                                    <div class="foo">
                                        <input id="submit" type="submit" class="btn btn-success" style="margin-right: 15px; margin-bottom: 15px;" value="Save Changes">
                                    </div>
                                </form>
                            </div>




                    </div>


                    </section>
                </div>
            </div>
        </div>

        
        </div>
        </div>
        </div>













        <nav id="default-navbar" class="navbar navbar-expand navbar-dark bg-primary m-0">
            <div class="container-fluid">
                <!-- Toggle sidebar -->
                <!-- <button class="navbar-toggler d-block"
                                    data-toggle="sidebar close"
                                    type="button">
                                <span class="material-icons">menu</span>
                            </button> 
                             -->
                <div class="navbar-toggler d-block">
                    <i class='bx bx-menu'></i>
                    <!-- <span class="text"></span> -->
                </div>


                <!-- Brand -->
                <a href="student-dashboard.php" class="navbar-brand">
                    <img src="assets/images/logo/white.svg" class="mr-2" alt="LearnPlus" />
                    <span class="d-none d-xs-md-block">LearnPlus</span>
                </a>

                <!-- Search -->
                <form class="search-form d-none d-md-flex">
                    <input type="text" class="form-control" placeholder="Search">
                    <button class="btn" type="button"><i class="material-icons font-size-24pt">search</i></button>
                </form>
                <!-- // END Search -->

                <div class="flex"></div>



                <li class="nav-item dropdown ml-1 ml-md-3">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img src="assets/images/profile.png" alt="Avatar" class="rounded-circle" width="40"></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="student-account-edit.php">
                            <i class="material-icons">edit</i> Edit Account
                        </a>
                        <a class="dropdown-item" href="student-profile.php">
                            <i class="material-icons">edit</i> Forgot Password
                        </a>
                        <a class="dropdown-item" href="guest-login.php">
                            <i class="material-icons">lock</i> Logout
                        </a>
                    </div>
                </li>
                <!-- // END User dropdown -->

                </ul>
                <!-- // END Menu -->
            </div>
        </nav>
        <div class="sidebar close" style="margin-top: 64px;">
            <!-- <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">CodingLab</span>
    </div> -->
            <ul class="nav-links">
                <li>
                    <a href="admin-dashboard.php">
                        <i class='bx bx-grid-alt'></i>
                        <span class="link_name">Dashboard</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="admin-dashboard.php">Dashboard</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-collection'></i>
                            <span class="link_name">Request management</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Request management</a></li>
                        <li><a href="listeEtudiant.php">Students</a></li>
                        <li><a href="listInstructors.php">Instructors</a></li>

                    </ul>
                </li>
                <li>
                <li>
                    <a href="studentlist.php">
                        <i class='bx bxs-user-rectangle'></i>
                        <span class="link_name">Student</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="studentlist.php">Student</a></li>
                    </ul>
                </li>
                <li>
                    <a href="listProf.php">
                        <i class='bx bxs-graduation'></i>
                        <span class="link_name">Instructor</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="listProf.php">Instructor</a></li>
                    </ul>
                </li>
                <li>
                    <a href="listClass.php">
                        <i class='bx bx-book-bookmark'></i>
                        <span class="link_name">Classes</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="listClass.php">Classes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="listAdmin.php">
                        <i class='bx bx-user'></i>
                        <span class="link_name">Admin</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="listAdmin.php">Admin</a></li>
                    </ul>
                </li>
                <br>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-collection'></i>
                            <span class="link_name"> Account</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Account</a></li>
                        <li><a href="student-account-edit.php">Edit Account</a></li>
                        <li><a href="guest-forgot-password.php">Forgot password</a></li>

                    </ul>
                </li>
                <br>
                <li>
                    <a href="guest-login.php">
                        <i class='bx bx-log-out'></i>
                        <span class="link_name">Logout</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="guest-login.php">Logout</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <section class="home-section" style="overflow: auto; padding-bottom: 150px;">
            <div class="home-content" style="overflow: auto;">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="instructor-dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">instructor</li>
                    </ol>

                    <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                        <div class="flex mb-2 mb-sm-0">
                            <h1 class="h2">Manage Instructors</h1>
                        </div>
                        <a href="#" class="btn btn-success" id="addAdminBtn"  data-toggle="modal" data-target="#exampleModalLong">Add Instructor</a>
                    </div>

                    <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                        <form action="#">
                            <div class="d-flex flex-wrap2 align-items-center mb-headings">

                            </div>

                            <div class="row">
                                <?php
                                require_once '../../admin/class/CRUDProf.class.php';
                                require_once '../../admin/class/Admin.class.php';
                                $admin = new Admin();
                                $arrayProf = new CRUDProf();
                                foreach ($arrayProf->readProf() as $prof) { ?>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <p style="display: none;"><?php echo $prof['id']; ?></p>
                                            <div class="card-body">

                                                <div class="d-flex flex-column flex-sm-row">
                                                    <a href="#" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">

                                                    </a>
                                                    <div class="flex" style="min-width: 200px;">
                                                        <p><?php echo $prof['id']; ?></p>
                                                        <!-- <h5 class="card-title text-base m-0"><a href="instructor-course-edit.php"><strong>Learn Vue.js</strong></a></h5> -->
                                                        <h4 class="card-title mb-1"><?php echo $prof['prenom'] . " " . $prof['nom']; ?></h4>
                                                        <p class="text-black-100"><?php echo $prof['cin']; ?></p>
                                                        <p class="text-black-100"><?php echo $prof['email']; ?></p>
                                                        <p class="text-black-100"><?php echo $prof['telephone']; ?></p>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> classes <span class="caret"></span> </button>
                                                            <div class="dropdown-menu">
                                                                <?php foreach ($admin->readClassByProf($prof['id']) as $class) { ?>
                                                                    <span class="dropdown-item"><?php echo $class['nom']; ?></span>

                                                                <?php } ?>
                                                            </div>
                                                        </div>




                                                        <div class="d-flex align-items-end">

                                                            <div class="text-center">

                                                                <a href="#" class="btn btn-sm btn-white" id="accept">Edit</a>
                                                                <button id="editProf" data-toggle="modal" data-target="#modifyinstructor" style="display:none;"></button>





                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="card__options dropdown right-0 pr-2">
                                                <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">


                                                    <?php if ($prof['status'] == 0) { ?>
                                                        <a class="dropdown-item text-warning disableButton">Disable</a>

                                                    <?php } else { ?>
                                                        <a class="dropdown-item text-warning enableButton" id="addAdminBtn" data-toggle="modal" data-target="#enablestudent">Enable</a>

                                                    <?php } ?>
                                                    <button style="display: none;" class="buttonDisable" data-toggle="modal" data-target="#disableprof"></button>
                                                    <button style="display: none;" class="buttonEnable" data-toggle="modal" data-target="#enableprof"></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                <?php } ?>
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
        <script src="assets/js/pw.js"></script>
        <script>
            if (document.getElementById("accept") != null) {
                document.getElementById("accept").addEventListener('click', function(e) {

                    e.preventDefault();
                    var x = e.target.parentElement.parentElement.parentElement;

                    document.getElementById("editProf").click();
                    document.getElementById("prenom").value = x.children.item(1).innerHTML;
                    document.getElementById("mail").value = x.children.item(3).innerHTML;
                    document.getElementById("cin").value = x.children.item(2).innerHTML;

                    document.getElementById("tel").value = x.children.item(4).innerHTML;

                    document.getElementById("idEtudiant").value = x.children.item(0).innerHTML;



                });
            }



            document.getElementById("disableStudent").addEventListener('click', function(e) {
                e.preventDefault();
                var x = e.target.nextElementSibling
                window.location.href = "../../admin/include/activerCompteProf.php?id=" + x.innerText + "&status=0";

            });

            document.querySelector(".disableButton").addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('.buttonDisable').click();
                var x = e.target.parentElement.parentElement.parentElement.children[0].innerHTML;
                // var x = e.target.id;
                console.log(x);
                document.getElementById("idStudent").innerHTML = x;

            });

            //*************************enable */

            document.getElementById("enableStudent").addEventListener('click', function(e) {
                e.preventDefault();
                var x = e.target.nextElementSibling
                window.location.href = "../../admin/include/activerCompteProf.php?id=" + x.innerText + "&status=1";

            });

            document.querySelector(".enableButton").addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector('.buttonEnable').click();
                var x = e.target.parentElement.parentElement.parentElement.children[0].innerHTML;
                document.getElementById("idStudent2").innerHTML = x;

            });
        </script>
        <script src="assets/js/modifierProf.js"></script>
        <script src="assets/js/creerProf.js"></script>

    </body>

    </html>
<?php } ?>