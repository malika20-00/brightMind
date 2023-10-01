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
        <title>List class</title>

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

        <style>
            .selectdrop {
                max-height: 40.5px;
                border: 1px solid #f0f1f2;
                border-radius: 0.25rem;
                box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
            }

            .col-md-6 {
                flex: 0 0 50%;
                max-width: fit-content;
            }

            [dir] .mb-1,
            [dir] .my-1 {
                margin-bottom: 15px !important;
            }

            .foo {
                display: flex;
                justify-content: end;
                margin-top: 50px;
                margin-bottom: 50px;
            }

            [dir] .card-body {
                margin-left: 21px;
            }

            @media only screen and (max-width: 746px) {
                .col-md-6 {
                    max-width: fit-content;
                }
            }

            @media only screen and (max-width: 490px) {
                .col-md-6 {
                    max-width: 100%;
                }
            }
        </style>

    </head>


    <body>
    <button style="display:none;" type="button" class="btn btn-primary button-afficher-class" data-toggle="modal" data-target=".afficher-class-modal"></button>

    <div class="modal fade afficher-class-modal" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title nomClass" id="exampleModalLongTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <table class="table table-striped table-bordered" style="width:100%;">
                            <thead>
                                <tr>

                                    <th>FIRSTNAME</th>
                                    <th>LASTNAME</th>
                                    <th>EMAIL</th>
                                    <th>LEVEL SCHOOL</th>

                                </tr>
                            </thead>
                            <tbody class="list arrayStudent">
                            </tbody>
                        </table>
                        
                        <div class="flex mb-2 mb-sm-0">
                            <h1 class="h2">Courses</h1>
                        </div>

                        <div class="table-responsive border-bottom arrayCours " data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]' style="background-color: #f8f9fa;">

                           
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteclass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                        Are you sure you want to delete this class ?
                                    </h3>
                                </div>

                                <div style="margin-bottom:20px; float: right;">
                                    <!-- <input data-dismiss="modal" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b" value="Cancel"> -->
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a id="delete" class="btn btn-primary" data-role="button" data-inline="true">Delete</a>
                                    <p class="p-in-modal" style="display:none;"></p>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editclass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="col-lg container-fluid page__container">
                        <form id="edit-class-form">
                            <input name="id" id="idclassp" style="display:none;">

                            <section id="checkout" class="checkout-section">
                                <div class="container">
                                    <div class="section-title mb45 headline text-center">

                                    </div>
                                    <br>
                                    <h1 class="h2">CLASS INFORMATION</h1>
                                    <div class="card">

                                        <div class="list-group list-group-fit">
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-Class name">
                                                    <div class="form-row">
                                                        <label id="label-firstname" for="Class name" class="col-md-3 col-form-label form-label">CLASS NAME</label>
                                                        <div class="col-md-9">
                                                            <input name="name" id="nom" type="text" placeholder="Class name" value="" class="form-control" required>
                                                            <p id="nomError" class="error"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-idProf">
                                                    <div class="form-row">
                                                        <label id="label-idProf" for="idProf" class="col-md-3 col-form-label form-label">Instructor</label>
                                                        <div class="col-md-9">
                                                            <select name="prof" id="prof" class="selectdrop">
                                                                <?php $prof = new CRUDProf();
                                                                foreach ($prof->readProf() as $pr) {
                                                                ?>
                                                                    <option value="<?php echo $pr['id']; ?>"><?php echo $pr['nom'] . " "; ?><?php echo $pr['prenom']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <p id="teacherError" class="error"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-subject">
                                                    <div class="form-row">
                                                        <label id="label-subject" for="subject" class="col-md-3 col-form-label form-label"> Subject</label>
                                                        <div class="col-md-9">
                                                            <input class="selectdrop" list="navigateurs" id="subject" name="subject" value="<?php echo $class['matiere']; ?>" style="width:100%;" />
                                                            <datalist id="navigateurs">
                                                                <option value="maths">
                                                                <option value="physics">
                                                                <option value="science of life and earth">
                                                                <option value="frensh">
                                                                <option value="english">
                                                                <option value="philosophie">
                                                                <option value="History and Geography">
                                                            </datalist>
                                                            <p id="subjectError" class="error"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>


                                </div>
                                <p id="error-edit-class25555"></p>

                                <div class="foo">
                                    <input type="submit" value="Edit class" id="submit" class="btn btn-success">
                                </div>

                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addclass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">


                    <div class="col-lg container-fluid page__container">
                        <form id="edit-class">

                            <section id="checkout" class="checkout-section">
                                <div class="container">
                                    <div class="section-title mb45 headline text-center">

                                    </div>
                                    <br>
                                    <h1 class="h2">CLASS INFORMATION</h1>
                                    <div class="card">

                                        <div class="list-group list-group-fit">
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-Class name">
                                                    <div class="form-row">
                                                        <label id="label-firstname" for="classname" class="col-md-3 col-form-label form-label">Class name</label>
                                                        <div class="col-md-9">
                                                            <input name="name" type="text" id="classname" placeholder="Class name" value="" class="form-control" required>
                                                            <p id="nomError"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-idProf">
                                                    <div class="form-row">
                                                        <label id="label-idProf" for="idProf" class="col-md-3 col-form-label form-label">Subject</label>
                                                        <div class="col-md-9">
                                                            <input list="navigateurs" type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required />
                                                            <datalist id="navigateurs">
                                                                <option value="maths">
                                                                <option value="physics">
                                                                <option value="science of life and earth">
                                                                <option value="frensh">
                                                                <option value="english">
                                                                <option value="philosophie">
                                                                <option value="History and Geography">
                                                            </datalist>
                                                            <p id="subjectError"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item">
                                                <div class="form-group m-0" role="group" aria-labelledby="label-subject">
                                                    <div class="form-row">
                                                        <label id="label-subject" for="prof" class="col-md-3 col-form-label form-label">Instructor</label>
                                                        <select name="prof" id="prof" class="selectdrop">
                                                            <?php $prof = new CRUDProf();
                                                            foreach ($prof->readProf() as $pr) {
                                                            ?>
                                                                <option value="<?php echo $pr['id']; ?>"><?php echo $pr['nom'] . " "; ?><?php echo $pr['prenom']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <p id="teacherError"></p>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>


                                </div>


                                <div class="foo">
                                    <input type="submit" id="submit" class="btn btn-success" value="Add Class">
                                </div>

                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>







        <?php include("sidebar.php"); ?>

        <section class="home-section" style="overflow:auto; padding-bottom: 150px;">
            <div class="home-content" style="overflow: auto;">
                <div class="container-fluid page__container p-0">
                    <div class="row m-0">
                        <div class="col-lg container-fluid page__container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="instructor-dashboard.html">Home</a></li>
                                <li class="breadcrumb-item active">Classes</li>
                            </ol>
                            <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                                <div class="flex mb-2 mb-sm-0">
                                    <h1 style="text-align: center;font-size: 35px;font-weight: 200;color: #333;">Class list</h1>
                                </div>
                                <div style="float: right;margin-bottom: 0;margin-top: 70px;">
                                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addclass">New Class</a>
                                </div>
                            </div>
                            <?php require_once '../../admin/class/Admin.class.php';
                            require_once '../../admin/class/CRUDProf.class.php';
                            $student = new Admin();
                            $prof = new CRUDProf();
                            foreach ($student->afficherMatieres() as $matiere) {
                            ?>

                                <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                                    <div class="flex mb-2 mb-sm-0">
                                        <h1 class="h2"><?php echo $matiere['matiere']; ?></h1>

                                    </div>

                                </div>





                                <div class="row">
                                    <?php foreach ($student->afficherclassParMatiere($matiere['matiere']) as $class) { ?>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">

                                                    <div class="d-flex flex-column flex-sm-row">
                                                        <!-- <a href="#" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3"> -->

                                                        </a>
                                                        <div class="flex" id="card" style="min-width: 200px;">
                                                            <h4 class="card-title"><?php echo $class['nom']; ?></h4>
                                                            <p class="text-black-70 card-text"><?php $teacher = $prof->readProfById($class['idProf']);
                                                                                                echo $teacher['nom'] . " " . $teacher['prenom'];   ?></p>
                                                            <p style="display:none;" class="text-black-70"><?php echo $class['id']; ?></p>
                                                            <p styel="display:none;" id="matiere"><?php echo $class['matiere'] ?></p>
                                                            <p style="display:none;" id="id-prof"><?php echo $teacher['id'] ?></p>

                                                            <?php $admin = new Admin();
                                                            $studentss = $admin->readStudentByClass($class['id']);

                                                            $arrayStudents = array();
                                                            $i = 0;
                                                            foreach ($studentss as $studentt) {
                                                                $arrayStudents[$i++][] = $studentt;
                                                            }
                                                            $courses = $admin->readCoursByIdClass($class['id']);
                                                            $coursesArray = array();
                                                            $j = 0;
                                                            foreach ($courses as $cours) {
                                                                $tab[] = array();
                                                                array_push($tab, $cours['titre']);
                                                                array_push($tab, $admin->getNumberOfChapters($cours["id"]));
                                                                array_push($tab, $admin->getNumberOfLessons($cours['id']));
                                                                $coursesArray[$j++][] = $tab;
                                                            }
                                                            ?>

                                                            <div class="d-flex align-items-end">

                                                                <div class="text-center showClassBtn">

                                                                    <a href="#"  class="btn btn-sm btn-white" onclick='afficherClass(<?php echo json_encode($arrayStudents); ?>,<?php echo json_encode($coursesArray); ?>)'>show class</a>



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

                                                        <a onclick="editerClass('<?php echo $class['nom'] ?>','<?php echo $class['id'] ?>','<?php echo $class['matiere']; ?>','<?php echo $teacher['id'] ?>')" class="editClass dropdown-item text-warning" href="#">Edit</a>
                                                        <a onclick="deleterClass('<?php echo $class['id'] ?>')" class="dropdown-item text-danger delete-class" href="#">Delete</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>



                                </div>
                            <?php } ?>

                            <button class="editButton" data-toggle="modal" data-target="#editclass" style="display:none;"></button>
                            <button class="button-delete" data-toggle="modal" data-target="#deleteclass" style="display:none;"></button>






                        </div>


                    </div>
                </div>
            </div>
        </section>
        <?php

        ?>
        <div class="modal fade " id="showclass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content">


                    <div class="col-lg container-fluid page__container" style="margin-top: 40px; margin-bottom: 20px;">
                        <h2 class="text-center " style="text-transform: uppercase;margin-bottom:12px;"> Student List</h2>
                        <table class="table mb-0 mt-4">


                            <thead style="background-color: rgb(255, 255, 255);">
                                <tr class="list-head">
                                    <th>FIRST NAME</th>
                                    <th>LAST NAME</th>
                                    <th>SCHOOL LEVEL</th>
                                    <th>E-MAIL</th>

                                </tr>
                            </thead>



                            <tbody id="tbody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/afficherClass.js"></script>

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
        <script src="assets/js/editclass.js"></script>
        <script src="assets/js/modifierClass.js"></script>
        <script src="assets/js/deleteclass.js"></script>
        <script src="assets/js/ajouterClass.js"></script>

        <script>
            document.getElementById('subject').addEventListener('focus', function(e) {
                e.target.value = "";
            });
            document.getElementById('subject').addEventListener('mouseleave', function(e) {
                if (e.target.value == "") {
                    e.target.value = "<?php echo  $class['matiere']; ?>";
                }
            });

            // function afficherStudents(id) {
            //     var xhr = new XMLHttpRequest();
            //     xhr.onreadystatechange = function() {
            //         if (this.readyState == 4 && this.status == 200) {
            //             console.log(this.response);
            //             document.getElementById("tbody").innerHTML = this.response;

            //             // console.log(this.response);

            //         }
            //     };


            //     xhr.open("GET", "listClassAjax.php?classAjax=" + id, true);


            //     xhr.send();


            // }
        </script>



        <style>
            .modal-content {

                width: fit-content;
            }
        </style>





    </body>

    </html>
<?php } ?>