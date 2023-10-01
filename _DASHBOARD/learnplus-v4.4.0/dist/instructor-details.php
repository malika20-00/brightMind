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
        <title>instructor details</title>

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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link type="text/css" href="assets/css/profile.css" rel="stylesheet">


    </head>


    <body>

        <button style="display:none;" type="button" class="btn btn-primary button-afficher-cours" data-toggle="modal" data-target=".afficher-cours-modal"></button>

        <button style="display:none;" type="button" class="btn btn-primary button-afficher-class" data-toggle="modal" data-target=".afficher-class-modal"></button>

        <div class="modal fade afficher-cours-modal" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title titre-cours" id="exampleModalLongTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body contenu-cours">
                        ...
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
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

        <?php include("sidebar.php"); ?>
        <section class="home-section" style="overflow:auto ; padding-bottom: 150px;">
            <div class="home-content" style="overflow: auto;">
                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="instructor-dashboard.html">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>


                    <div class="flex mb-2 mb-sm-0">
                        <h1 class="h2">Classes</h1>
                    </div>

                    <div class="row" style="margin: auto;">
                        <?php $admin = new Admin();
                        $classes = $admin->readClassByProf($_GET['id']);
                        foreach ($classes as $class) {
                            $students = $admin->readStudentByClass($class['id']);
                            $arrayStudents = array();
                            $i = 0;
                            foreach ($students as $student) {
                                $arrayStudents[$i++][] = $student;
                            }
                            $courses = $admin->readCoursByIdClass($class['id']);
                            $coursesArray = array();
                            $j = 0;
                            foreach ($courses as $cours) {
                                $tab[] = array();
                                array_push($tab,$cours['titre'] );
                                array_push($tab ,$admin->getNumberOfChapters($cours["id"]) );
                                array_push($tab,$admin->getNumberOfLessons($cours['id']));
                                $coursesArray[$j++][] = $tab;
                            }

                        ?>

                            <div onclick='afficherClass(<?php echo json_encode($arrayStudents); ?>,<?php echo json_encode($coursesArray); ?>)' class="col-md-6 col-lg-4 column">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                    <i class="fas fa-users"></i>
                                                </div>

                                                <div class="media-body text-right">
                                                    <h3><?php echo ucfirst(strtolower($class['nom'])); ?></h3>
                                                    <span>Student Number <?php echo $admin->getNumberOfStudentOfClass($class['id']) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        <?php } ?>
                    </div>



                    <!-- <div class="flex mb-2 mb-sm-0">
                        <h1 class="h2">Courses</h1>
                    </div>

                    <div class="table-responsive border-bottom " data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]' style="background-color: #f8f9fa;">

                        <table class="table table-striped table-bordered" style="width:100%">

                            <tbody class="list" id="staff">
                                <?php $courses = $admin->getCoursesOfTeacher($_GET['id']);
                                foreach ($courses as $cours) {
                                ?>
                                    <tr class="selected">

                                        <td>
                                        <td>
                                            <span style="cursor:pointer;" onclick="afficherCours('<?php echo addslashes($cours['titre']); ?>','<?php echo addslashes($cours['description']); ?>','<?php echo addslashes($cours['contenu']) ?>')"><i class="fa fa-file-pdf-o" style="font-size:25px;color:red; "></i> <?php echo strtolower($cours["titre"]) ?></span>
                                        </td>
                                        </td>


                                        <td><small class="text-muted"><?php echo $admin->getNumberOfChapters($cours["id"]) . " chapters & " . $admin->getNumberOfLessons($cours['id']) . " lessons.";  ?></small></td>

                                    </tr>

                                <?php } ?>


                            </tbody>
                        </table>
                    </div> -->


                    <br>
                    <div class="flex mb-2 mb-sm-0">
                        <h1 class="h2">Students</h1>
                    </div>







                    <div class="card">
                        <ul class="nav nav-tabs nav-tabs-card">
                            <?php $admin = new Admin();
                            $crudStudent = new CRUDStudent();
                            $NiveauScolaire = $admin->getLevelSchoolStudentofTeacher($_GET['id']);
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

                        <div class="card-body tab-content">
                            <?php $NiveauScolaire = $admin->getLevelSchoolStudentofTeacher($_GET['id']);
                            $i = 0;
                            foreach ($NiveauScolaire as $niveauScolaire) {
                                $students = $crudStudent->readStudentByLevelSchoolTeacher($niveauScolaire['niveauScolaire'], $_GET['id']);

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
                                                    <th>CIN</th>
                                                    <th>LEVEL</th>

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
                                                            <div><?php echo $student['cin']; ?></div>
                                                        </td>
                                                        <td>
                                                            <div><?php echo $student['niveauScolaire']; ?></div>
                                                        </td>

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
        <script src="assets/js/afficherCours.js"></script>
        <script src="assets/js/afficherClass.js"></script>

    </body>

    </html>
<?php } ?>