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

        <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
        <!-- Boxiocns CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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




        <div class="modal fade" id="disablestudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="col-lg container-fluid page__container">
                        <section id="checkout" class="checkout-section">
                            <div class="container">

                                <div class=" media-center">
                                    <div class="forum-icon-wrapper">
                                        <img class="croix" src="assets/images/exclamation-mark.png" alt="">

                                    </div>
                                </div>
                                <!-- <h3 style="text-align: center;text-transform: uppercase;margin-top:8px;">Disable student</h3> -->
                                <h3 class="disableTitle">
                                    Are you sure you want to disable student ?
                                </h3>
                                <div class="modal-button ">
                                    <a href="studentlist.php" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b">Cancel</a>
                                    <a href="studentlist.php" class="btn btn-primary" data-role="button" data-inline="true" id="disableStudent">Disable</a>
                                    <p id="idstudentdisable" style="display: none;"></p>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------------------enable ------------------------------------->
        <div class="modal fade" id="enablestudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                    Are you sure you want to enable student ?
                                </h3>
                                <div class="modal-button">
                                    <a href="studentlist.php" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b">Cancel</a>
                                    <a href="studentlist.php" class="btn btn-primary" data-role="button" data-inline="true" id="enableStudent">enable</a>
                                    <p id="idstudentenable" style="display: none;"></p>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------fin enable ----------------------------------->

        <div class="modal fade" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form id="sign-up-form">
                    <div class="modal-content">

                        <div class="col-lg container-fluid page__container">

                            <section id="checkout" class="checkout-section">
                                <div class="container">
                                    <div class="section-title mb45 headline text-center">

                                    </div>
                                    <br>
                                    <h2 class="text-center">STUDENT INFORMATIONS</h2>
                                    <div class="card">

                                        <div class="list-group list-group-fit">
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                                    <div class="form-row">
                                                        <label id="label-firstname" for="prenom" class="col-md-3 col-form-label form-label">First name</label>
                                                        <div class="col-md-9">
                                                            <input id="prenom" name="prenom" type="text" placeholder="Student first name" value="" class="form-control" required>
                                                            <p class="error" id="prenomError"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                    <div class="form-row">
                                                        <label id="label-lastname" for="nom" class="col-md-3 col-form-label form-label">Last name</label>
                                                        <div class="col-md-9">
                                                            <input id="nom" name="nom" type="text" placeholder="Student last name" value="" class="form-control" required>
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
                                                                <input id="email" name="email" type="email" placeholder="Student email address" value="" class="form-control form-control-prepended" required>

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
                                                        <label id="label-lastname" for="cin" class="col-md-3 col-form-label form-label">CIN</label>
                                                        <div class="col-md-9">
                                                            <input name="cin" id="cin" type="text" placeholder="Student CIN" value="" class="form-control">
                                                            <p class="error" id="cinError"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-phone">
                                                    <div class="form-row">
                                                        <label id="label-phone" for="tel" class="col-md-3 col-form-label form-label">Phone number</label>
                                                        <div class="col-md-9">
                                                            <input id="tel" name="tel" type="text" placeholder="Student phone number" value="" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-phone">
                                                    <div class="form-row">
                                                        <label id="label-phone" for="niveau" class="col-md-3 col-form-label form-label">School level</label>
                                                        <div class="col-md-9">
                                                            <input placeholder="School level" class="form-control" list="navigateurs" name="niveauScolaire" id="niveau" />
                                                            <datalist id="navigateurs">
                                                                <option value="first year of primary school">first year of primary school</option>
                                                                <option value="second year of primary school">
                                                                <option value="third year of primary school">
                                                                <option value="fourth year of primary school">
                                                                <option value="fifth year of primary school">
                                                                <option value="sixth year of primary school">
                                                                <option value="first year of college">
                                                                <option value="second year of college">
                                                                <option value="third year of college">
                                                                <option value="first year of high school">
                                                                <option value="second year of high school">
                                                                <option value="third year of high school">
                                                                <option value="university">
                                                                <option value="not at school">
                                                            </datalist>
                                                            <p class="error" id="niveauError"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-password">
                                                    <div class="form-row">
                                                        <label id="label-password" for="pw" class="col-md-3 col-form-label form-label">Password</label>
                                                        <div class="col-md-9">
                                                            <input id="pw" name="pw" type="password" placeholder="Student password" value="" class="form-control" aria-describedby="passwordHelpBlock" onChange="onChange()">

                                                            <input type="checkbox" onclick="show()" style="margin-top:12px;"> Show Password
                                                            <p class="error" id="pwError"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-password">
                                                    <div class="form-row">
                                                        <label id="label-cpassword" for="pwVerif" class="col-md-3 col-form-label form-label">Confirm Password</label>
                                                        <div class="col-md-9">
                                                            <input type="password" id="pwVerif" name="pwVerif" type="password" placeholder="confirm password" value="" class="form-control" aria-describedby="passwordHelpBlock" onChange="onChange()">
                                                            <p class="error" id="pwVerifError"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <h4 class="text-center">AFFECT STUDENT TO CLASS</h4>

                                    <div class="alert alert-light border-1 border-left-3 border-left-primary d-flex justify-content-center" style="margin:10px auto;">
                                        <div class="row" style="margin-bottom: 20px;">
                                        <?php


                                        $i = 0;
                                        $student= new Admin();
                                        $Student = new Admin();
                                        ?>

                                            </div>
                                    <select name="subject[]"  class="js-example-basic-multiple select-edit-student" multiple style="width:100%;">
                                    <?php 
                                    
                                    foreach ($Student->afficherMatieres() as $matiere) {
                                        ?>
                                                <optgroup  label="<?php echo "--". $matiere['matiere']."--";?>"></optgroup>
                                                        <?php foreach ($student->afficherclassParMatiere($matiere['matiere']) as $class) { ?>
                                                            <option value="<?php echo $class['id']; ?>" ><?php echo $class['nom']; ?></option>
                                                        <?php  } ?>
                                                    <?php } ?>

                                                    </select>
                                                
                                                
                                                
                                           



                                        </div>
                                    </div>
                                </div>

                                <div class="foo">
                                    <input id="inscrir" type="submit" class="btn btn-success" style="float: right;margin: 10px 35px 0 13px;" value="Add Student">
                                </div>
                                <p id="error"></p>

                            </section>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="modal fade" id="modify-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <form id="edit-form">
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
                                                            <input id="id-edit" type="text" placeholder="Student ID" value="" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input id="id-edit-two" name="id" style="display:none;">


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
                                                </div>
                                                <p class="error" id="emailError-edit"></p>

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
                                    <!-- first version -->
                                    <h3 class="text-center">AFFECTE STUDENT</h3>
                                    <div class="alert alert-light border-1 border-left-3 border-left-primary d-flex justify-content-center" style="margin:10px auto;">
                                        <div class="row" style="width:100%;">
                                            <div class="col">
                                               
                                            
                                    <?php


                                        $i = 0;
                                        $student= new Admin();
                                        $Student = new Admin();
                                        ?>

                                            </div>
                                    <select name="subject[]"  class="js-example-basic-multiple select-edit-student" multiple style="width:100%;">
                                    <?php 
                                    
                                    foreach ($Student->afficherMatieres() as $matiere) {
                                        ?>
                                                <optgroup  label="<?php echo "--". $matiere['matiere']."--";?>"></optgroup>
                                                        <?php foreach ($student->afficherclassParMatiere($matiere['matiere']) as $class) { ?>
                                                            <option value="<?php echo $class['id']; ?>" ><?php echo $class['nom']; ?></option>
                                                        <?php  } ?>
                                                    <?php } ?>

                                                    </select>
                                                

                                        </div>
                                    </div>


                                            
                                                                           
                                                        




                                    <p class="error-modify"></p>
                                    <div class="foo">
                                        <a href="studentlist.php" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b">Cancel</a>
                                        <input id="submit" type="submit" class="btn btn-success" style="float: right; margin-bottom: 15px;" value="Edit Student" onClick="document.location.reload(true)">
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </form>
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
                                        <h1 style="text-align: center;font-size: 35px;font-weight: 200;color: #333;">Student list</h1>
                                    </div>
                                    <div style="float: right;margin-bottom: 0;margin-top: 70px;">
                                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addstudent">New Student</a>
                                    </div>
                                </div>
                                <section id="checkout" class="checkout-section">

                                    <div class="card">
                                        <ul class="nav nav-tabs nav-tabs-card">
                                            <?php $admin = new Admin();
                                            $crudStudent = new CRUDStudent();
                                            $NiveauScolaire = $admin->getLevelSchoolStudent();
                                            $i = 0;
                                            foreach ($NiveauScolaire as $niveauScolaire) {

                                                $i++;
                                            ?>
                                                <li class="nav-item">
                                                    <a class="nav-link <?php if ($i == 1) {
                                                                            echo "active";
                                                                        }  ?>" href="#<?php echo strtolower($admin->convert_number_to_words($i)) ?>" data-toggle="tab">
                                                        <?php echo $niveauScolaire['niveauScolaire']; ?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <div class="card-body tab-content ">
                                            <?php $NiveauScolaire = $admin->getLevelSchoolStudent();
                                            $i = 0;
                                            foreach ($NiveauScolaire as $niveauScolaire) {
                                                $students = $crudStudent->readStudentByLevelSchool($niveauScolaire['niveauScolaire']);

                                                $i++; ?>
                                                <div class="tab-pane <?php if ($i == 1) {
                                                                            echo "active";
                                                                        }  ?>" id="<?php echo strtolower($admin->convert_number_to_words($i)) ?>">

                                                    <div class="table-responsive" data-toggle="lists" data-lists-values='["name","last","email"]'>


                                                        <div class="search-form search-form--light mb-3">
                                                            <input type="text" class="form-control search" placeholder="Search">
                                                            <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                        </div>


                                                        <table class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>FIRSTNAME</th>
                                                                    <th>LASTNAME</th>
                                                                    <th>EMAIL</th>
                                                                    <th>PHONE NUMBER</th>

                                                                    <th>LEVEL</th>
                                                                    <th>ACTIONS </th>

                                                                </tr>
                                                            </thead>
                                                            <tbody class="list">

                                                                <?php
                                                                foreach ($students as $student) { ?>
                                                                    <tr>
                                                                        <td><?php echo $student['id']; ?></td>
                                                                        <td class="name"><?php echo $student['prenom']; ?></td>                                                                        
                                                                        <td class="last"><?php echo $student['nom']; ?></td>
                                                                        <td class="email"><?php echo $student['email']; ?></td>
                                                                        <td>
                                                                            <div><?php echo $student['telephone']; ?></div>
                                                                        </td>

                                                                        <td>
                                                                            <div><?php echo $student['niveauScolaire']; ?></div>
                                                                        </td>
                                                                        <td>

                                                                            <div>
                                                                                <?php $idCalsses = $admin->getIdClassByIdStudent($student['id']);
                                                                                $idClass = "";
                                                                                $y = 0;
                                                                                foreach ($idCalsses as $class) {
                                                                                    $idClass .= $class['idClass'] . " ";
                                                                                }
                                                                                ?>
                                                                                <span onclick="edit('<?php echo $student['id']; ?>',
                                                                                '<?php echo $student['prenom']; ?>',
                                                                                '<?php echo $student['nom']; ?>',
                                                                                '<?php echo $student['email']; ?>',
                                                                                '<?php echo $student['telephone']; ?>',
                                                                                '<?php echo $idClass; ?>')" 
                                                                                class="fa fa-edit" style="display: center;cursor:pointer;" 
                                                                                data-toggle="tooltip" data-placement="top" title="Edit"> </span>
                                                                                <button data-toggle="modal" data-target="#modify-student" id="pop-up-edit" style="display:none;"></button>

                                                                                <?php if ($student['status'] == 0) { ?>
                                                                                    <a onclick="disableStudent('<?php echo $student['id'] ?>')" class="disableButton" data-toggle="tooltip" data-placement="top" title="Disable"><i class='fa fa-unlock'></i></a>
                                                                                    </a>

                                                                                <?php } else { ?>
                                                                                    <a onclick="enableStudent('<?php echo $student['id'] ?>')" class="enableButton" data-toggle="tooltip" data-placement="top" title="Enable"><i class='fa fa-lock'></i></a>
                                                                                    </a>

                                                                                <?php } ?>

                                                                            </div>


                                                                        </td>
                                                                        <!-- <td>
                                                                                <a type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#showstudent">Show</a>
                                                                            </td> -->
                                                                    </tr>

                                                                <?php       } ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        </div>


                                    </div>
                            </div>


                        </div>














                        <button style="display:none;" class="buttonDisable" data-toggle="modal" data-target="#disablestudent"></button>
                        <button style="display:none;" class="buttonEnable" data-toggle="modal" data-target="#enablestudent"></button>



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
        <script src="assets/js/creerEtudiant.js"></script>
        <script src="assets/js/enable.js"></script>
        <script src="assets/js/modifierEtudiant.js"></script>

        <!-- select2 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    



    <script>
       $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});


    </script>







    </body>

    </html>
<?php } ?>