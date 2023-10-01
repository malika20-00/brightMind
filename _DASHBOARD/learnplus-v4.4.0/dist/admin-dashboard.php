<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location:guest-login.php");
} else {
    if ($_SESSION['admin'] == 0) {
        header("Location:guest-login.php");
    }



    $id = $_SESSION['id'];



?>

    <?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'brightmind');
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if (mysqli_connect_errno()) {
        echo "" . mysqli_connect_error();
    }


    ?>

    <!DOCTYPE html>
    <html lang="en" dir="ltr">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Dashboard</title>

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
        <?php include("sidebar.php"); ?>


        <section class="home-section" style="overflow: auto;padding-bottom: 150px;">
            <div class="home-content" style="overflow: auto;">


                <!-- Header Layout Content
            <div class="mdk-header-layout__content"> -->

                <!-- <div data-push
                     data-responsive-width="992px"
                     class="mdk-drawer-layout js-mdk-drawer-layout">
                    <div class="mdk-drawer-layout__content page"> -->

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <h1 class="h2">Dashboard</h1>


                    <div class="row">
                        <div class="col-lg-7">
                            <!-- Student -->
                            <div class="card">

                                <div class="card-header d-flex align-items-center">
                                    <?php $query = mysqli_query($con, "SELECT * FROM `etudiant` WHERE `acceptePar` is NULL AND `ajouterPar` is NULL");


                                    $countStudent = mysqli_num_rows($query);

                                    ?>
                                    <div class="h2 mb-0 mr-3 text-primary"><?php echo $countStudent; ?></div>
                                    <div class="flex">
                                        <h4 class="card-title">Student's Request</h4>
                                        <p class="card-subtitle">This year</p>
                                    </div>
                                    <!-- <i class="material-icons text-muted ml-2 media-left">trending_up</i> -->
                                    <a href="listeEtudiant.php" class="btn btn-sm btn-primary"><i class="material-icons">keyboard_arrow_right</i></a>
                                </div>
                                <div class="card-body">
                                    <!-- <div id="legend"
                                                 class="chart-legend mt-0 mb-24pt justify-content-start"></div> -->
                                    <div class="chart" style="height: 400px;">
                                        <canvas id="studentChart" class="chartjs-render-monitor" data-chart-legend="#legend" data-chart-line-background-color="primary" data-chart-prefix="$" data-chart-suffix="k"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- / STudent Chart -->
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <?php $query = mysqli_query($con, "SELECT COUNT(*) as profCount FROM profreq"); ?>
                                    <div class="h2 mb-0 mr-3 text-primary"><?php
                                                                            if ($query) {
                                                                                if ($row = mysqli_fetch_assoc($query)) {
                                                                                }
                                                                                echo $row['profCount'];
                                                                            } ?></div>
                                    <div class="flex">

                                        <h4 class="card-title">Teacher's Request</h4>
                                        <p class="card-subtitle">This year</p>
                                    </div>
                                    <!-- <i class="material-icons text-muted ml-2 media-left">trending_up</i> -->
                                    <a href="listInstructors.php" class="btn btn-sm btn-primary"><i class="material-icons">keyboard_arrow_right</i></a>
                                </div>
                                <div class="card-body">
                                    <!-- <div id="legend"
                                                 class="chart-legend mt-0 mb-24pt justify-content-start"></div> -->
                                    <div class="chart" style="height: 400px;">
                                        <canvas id="teacherChart" class="chartjs-render-monitor" data-chart-legend="#legend" data-chart-line-background-color="primary" data-chart-prefix="$" data-chart-suffix="k"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card">
                                        <div class="card-header d-flex align-items-center">
                                            <div class="h2 mb-0 mr-3 text-primary">116</div>
                                            <div class="flex">
                                                <h4 class="card-title">Angular</h4>
                                                <p class="card-subtitle">Best score</p>
                                            </div>
                                            <div class="dropdown">
                                                <a href="#"
                                                   class="dropdown-toggle text-black-70"
                                                   data-toggle="dropdown">Popular Topics</a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href=""
                                                       class="dropdown-item">Popular Topics</a>
                                                    <a href=""
                                                       class="dropdown-item">Web Design</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart"
                                                 style="height: 319px;">
                                                <canvas id="topicIqChart"
                                                        class="chart-canvas js-update-chart-line"
                                                        data-chart-hide-axes="false"
                                                        data-chart-points="true"
                                                        data-chart-suffix=" points"
                                                        data-chart-line-border-color="primary"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <h4 class="card-title">Courses</h4>
                                                    <p class="card-subtitle">Your recent courses</p>
                                                </div>
                                                <div class="media-right">
                                                    <a class="btn btn-sm btn-primary"
                                                       href="student-my-courses.html">My courses</a>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-group list-group-fit mb-0"
                                            style="z-index: initial;">

                                            <li class="list-group-item"
                                                style="z-index: initial;">
                                                <div class="d-flex align-items-center">
                                                    <a href="student-take-course.html"
                                                       class="avatar avatar-4by3 avatar-sm mr-3">
                                                        <img src="assets/images/gulp.png"
                                                             alt="course"
                                                             class="avatar-img rounded">
                                                    </a>
                                                    <div class="flex">
                                                        <a href="student-take-course.html"
                                                           class="text-body"><strong>Learn Vue.js Fundamentals</strong></a>
                                                        <div class="d-flex align-items-center">
                                                            <div class="progress"
                                                                 style="width: 100px;">
                                                                <div class="progress-bar bg-primary"
                                                                     role="progressbar"
                                                                     style="width: 25%"
                                                                     aria-valuenow="25"
                                                                     aria-valuemin="0"
                                                                     aria-valuemax="100"></div>
                                                            </div>
                                                            <small class="text-muted ml-2">25%</small>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown ml-3">
                                                        <a href="#"
                                                           class="dropdown-toggle text-muted"
                                                           data-caret="false"
                                                           data-toggle="dropdown">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                               href="student-take-course.html">Continue</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item"
                                                style="z-index: initial;">
                                                <div class="d-flex align-items-center">
                                                    <a href="student-take-course.html"
                                                       class="avatar avatar-4by3 avatar-sm mr-3">
                                                        <img src="assets/images/vuejs.png"
                                                             alt="course"
                                                             class="avatar-img rounded">
                                                    </a>
                                                    <div class="flex">
                                                        <a href="student-take-course.html"
                                                           class="text-body"><strong>Angular in Steps</strong></a>
                                                        <div class="d-flex align-items-center">
                                                            <div class="progress"
                                                                 style="width: 100px;">
                                                                <div class="progress-bar bg-success"
                                                                     role="progressbar"
                                                                     style="width: 100%"
                                                                     aria-valuenow="100"
                                                                     aria-valuemin="0"
                                                                     aria-valuemax="100"></div>
                                                            </div>
                                                            <small class="text-muted ml-2">100%</small>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown ml-3">
                                                        <a href="#"
                                                           class="dropdown-toggle text-muted"
                                                           data-caret="false"
                                                           data-toggle="dropdown">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                               href="student-take-course.html">Continue</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item"
                                                style="z-index: initial;">
                                                <div class="d-flex align-items-center">
                                                    <a href="student-take-course.html"
                                                       class="avatar avatar-4by3 avatar-sm mr-3">
                                                        <img src="assets/images/nodejs.png"
                                                             alt="course"
                                                             class="avatar-img rounded">
                                                    </a>
                                                    <div class="flex">
                                                        <a href="student-take-course.html"
                                                           class="text-body"><strong>Bootstrap Foundations</strong></a>
                                                        <div class="d-flex align-items-center">
                                                            <div class="progress"
                                                                 style="width: 100px;">
                                                                <div class="progress-bar bg-warning"
                                                                     role="progressbar"
                                                                     style="width: 80%"
                                                                     aria-valuenow="80"
                                                                     aria-valuemin="0"
                                                                     aria-valuemax="100"></div>
                                                            </div>
                                                            <small class="text-muted ml-2">80%</small>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown ml-3">
                                                        <a href="#"
                                                           class="dropdown-toggle text-muted"
                                                           data-caret="false"
                                                           data-toggle="dropdown">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                               href="student-take-course.html">Continue</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <h4 class="card-title">Quizzes</h4>
                                                    <p class="card-subtitle">Your Performance</p>
                                                </div>
                                                <div class="media-right">
                                                    <a class="btn btn-sm btn-primary"
                                                       href="#">Quiz results</a>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-group list-group-fit mb-0">

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <a class="text-body"
                                                           href="student-quiz-results.html"><strong>Title of quiz goes here?</strong></a><br>
                                                        <div class="d-flex align-items-center">
                                                            <small class="text-black-50 text-uppercase mr-2">Course</small>
                                                            <a href="student-take-course.html">Basics of HTML</a>
                                                        </div>
                                                    </div>
                                                    <div class="media-right text-center d-flex align-items-center">
                                                        <span class="text-black-50 mr-3">Good</span>
                                                        <h4 class="mb-0">5.8</h4>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <a class="text-body"
                                                           href="student-quiz-results.html"><strong>Directives &amp; Routing</strong></a><br>
                                                        <div class="d-flex align-items-center">
                                                            <small class="text-black-50 text-uppercase mr-2">Course</small>
                                                            <a href="student-take-course.html">Angular in Steps</a>
                                                        </div>
                                                    </div>
                                                    <div class="media-right text-center d-flex align-items-center">
                                                        <span class="text-black-50 mr-3">Great</span>
                                                        <h4 class="mb-0 text-success">9.8</h4>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <a class="text-body"
                                                           href="student-quiz-results.html"><strong>Responsive &amp; Retina</strong></a><br>
                                                        <div class="d-flex align-items-center">
                                                            <small class="text-black-50 text-uppercase mr-2">Course</small>
                                                            <a href="student-take-course.html">Bootstrap Foundations</a>
                                                        </div>
                                                    </div>
                                                    <div class="media-right text-center d-flex align-items-center">
                                                        <span class="text-black-50 mr-3">Failed</span>
                                                        <h4 class="mb-0 text-danger">2.8</h4>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center">
                                            <div class="h2 mb-0 mr-3 text-primary">432</div>
                                            <div class="flex">
                                                <h4 class="card-title">Experience IQ</h4>
                                                <p class="card-subtitle">4 days streak this week</p>
                                            </div>
                                            <i class="material-icons text-muted ml-2">trending_up</i>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart"
                                                 style="height: 154px;">
                                                <canvas id="iqChart"
                                                        class="chart-canvas js-update-chart-line"
                                                        data-chart-points="true"
                                                        data-chart-suffix="pt"
                                                        data-chart-line-border-color="primary"></canvas>
                                            </div>
                                        </div>
                                    </div> -->


                        </div>
                        <div class="col-lg-5">




                            <div class="card border-left-3 border-left-primary card-2by1">
                                <div class="card-body">
                                    <div class="media flex-wrap align-items-center">
                                        <!-- <div class="media-left">
                                                    <i class="material-icons text-muted-light">credit_card</i>
                                                </div> -->

                                        <?php
                                        // $sql = "SELECT count( * ) as  total_record FROM `etudiant`"  ;   
                                        $query = mysqli_query($con, "SELECT * FROM `etudiant` WHERE `acceptePar` = 1");
                                        $countStudent = mysqli_num_rows($query);



                                        ?>



                                        <div class="media-body" style="min-width: 180px">
                                            Total of students : <strong><?php echo $countStudent; ?></strong>
                                        </div>
                                        <!-- <div class="media-right mt-2 mt-xs-plus-0">
                                                    <a class="btn btn-success"
                                                       href="student-account-billing-upgrade.html">Upgrade</a>
                                                </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card border-left-3 border-left-primary card-2by1">
                                <div class="card-body">
                                    <div class="media flex-wrap align-items-center">
                                        <!-- <div class="media-left">
                                                    <i class="material-icons text-muted-light">credit_card</i>
                                                </div> -->
                                        <div class="media-body" style="min-width: 180px">

                                            Total of teachers : <strong><?php
                                                                        $query = mysqli_query($con, "SELECT * FROM `professeur`");
                                                                        $countProf = mysqli_num_rows($query);
                                                                        echo $countProf


                                                                        ?></strong>
                                        </div>
                                        <!-- <div class="media-right mt-2 mt-xs-plus-0">
                                                    <a class="btn btn-success"
                                                       href="student-account-billing-upgrade.html">Upgrade</a>
                                                </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card border-left-3 border-left-primary card-2by1">
                                <div class="card-body">
                                    <div class="media flex-wrap align-items-center">
                                        <!-- <div class="media-left">
                                                    <i class="material-icons text-muted-light">credit_card</i>
                                                </div> -->
                                        <div class="media-body" style="min-width: 180px">
                                            Total of admins : <strong>
                                                <?php
                                                $query = mysqli_query($con, "SELECT * FROM `admin`");
                                                $countAdmin = mysqli_num_rows($query);
                                                echo $countAdmin;
                                                ?>
                                            </strong>
                                        </div>
                                        <!-- <div class="media-right mt-2 mt-xs-plus-0">
                                                    <a class="btn btn-success"
                                                       href="student-account-billing-upgrade.html">Upgrade</a>
                                                </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card border-left-3 border-left-primary card-2by1">
                                <div class="card-body">
                                    <div class="media flex-wrap align-items-center">
                                        <!-- <div class="media-left">
                                                    <i class="material-icons text-muted-light">credit_card</i>
                                                </div> -->
                                        <div class="media-body" style="min-width: 180px">
                                            Total number of classes : <strong>
                                                <?php
                                                $query = mysqli_query($con, "SELECT * FROM `class`");
                                                $countClass = mysqli_num_rows($query);
                                                echo $countClass;
                                                ?>
                                            </strong>
                                        </div>
                                        <!-- <div class="media-right mt-2 mt-xs-plus-0">
                                                    <a class="btn btn-success"
                                                       href="student-account-billing-upgrade.html">Upgrade</a>
                                                </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h4 class="card-title">TOP TEACHERS</h4>
                                            <p class="card-subtitle">Latest forum topics &amp; replies</p>
                                        </div>
                                        <div class="media-right">
                                            <div class="btn btn-danger btn-circle"><i class="material-icons">grade</i></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $query  = mysqli_query($con, "SELECT professeur.id,professeur.nom AS ProfName,professeur.prenom,class.idProf,class.matiere,class.nom ,
                                                  COUNT(class.nom) AS classNumber
                                                  FROM professeur,class 
                                                  WHERE professeur.id=idProf 
                                                  GROUP BY professeur.nom
                                                  ORDER BY `classNumber` DESC
                                                  LIMIT 1
                                                  ;
                                                  ");
                                if ($query) {
                                    if ($row = mysqli_fetch_assoc($query)) {
                                        $firstRow = $row;

                                        echo '
                                                            <ul class="list-group list-group-fit">

                                                            <li class="list-group-item forum-thread">
                                                                <div class="media align-items-center">
                                                                    <div class="media-left">
                                                                        <div class="forum-icon-wrapper">
                                                                            <a 
                                                                               class="forum-thread-icon">
                                                                               <img src="assets/images/gbadge.png" alt=""
                                                                               width="50" class="rounded-circle">
                                                                            </a>
                                                                            </div>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <div class="d-flex align-items-center">
                                                                                    <a href="#"
                                                                                       class="text-body"><strong>' . $row['ProfName'] . ' ' . $row['prenom'] . '</strong></a>
                                                                                    <small class="ml-auto text-muted">' . $row['matiere'] . '</small>
                                                                                </div>
                                                                                <a class="text-black-70"
                                                                                   href="#">number of classes : ' . $row['classNumber'] . '</a>
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                    

                                                                     

                                                            
                                                            ';
                                    }
                                } ?>
                                <ul class="list-group list-group-fit">

                                    <!-- <li class="list-group-item forum-thread">
                                                <div class="media align-items-center">
                                                    <div class="media-left">
                                                        <div class="forum-icon-wrapper">
                                                            <a 
                                                               class="forum-thread-icon">
                                                               <img src="assets/images/gbadge.png" alt=""
                                                               width="50" class="rounded-circle">
                                                            </a> -->
                                    <!-- <a href="#"
                                                               class="forum-thread-user">
                                                                <img src="assets/images/people/50/guy-1.jpg"
                                                                     alt=""
                                                                     width="20"
                                                                     class="rounded-circle">
                                                            </a> -->
                                    <!-- </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex align-items-center">
                                                            <a href="#"
                                                               class="text-body"><strong>Teacher's full name</strong></a>
                                                            <small class="ml-auto text-muted">subject</small>
                                                        </div>
                                                        <a class="text-black-70"
                                                           href="#">number of classes : ....</a>
                                                    </div>
                                                </div>
                                            </li> -->

                                    <!-- end's here -->
                                    <?php
                                    $query  = mysqli_query($con, "SELECT professeur.id,professeur.nom AS ProfName,professeur.prenom,class.idProf,class.matiere,class.nom ,
                                                  COUNT(class.nom) AS classNumber
                                                  FROM professeur,class 
                                                  WHERE professeur.id=idProf 
                                                  GROUP BY professeur.nom
                                                  ORDER BY `classNumber` DESC
                                                  LIMIT 1,1;
                                                  ;
                                                  ");
                                    if ($query) {
                                        if ($row = mysqli_fetch_assoc($query)) {
                                            $seconderow = $row;

                                            echo '
                                                        <li class="list-group-item forum-thread">
                                                <div class="media align-items-center">
                                                    <div class="media-left">
                                                        <div class="forum-icon-wrapper">
                                                            <a 
                                                               class="forum-thread-icon">
                                                               <img src="assets/images/sbadge.png"  alt=""
                                                               width="50"class="rounded-circle">
                                                            </a>
                                                            </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex align-items-center">
                                                            <a href="#"
                                                               class="text-body"><strong>' . $row['ProfName'] . ' ' . $row['prenom'] . '</strong></a>
                                                            <small class="ml-auto text-muted">' . $row['matiere'] . '</small>
                                                        </div>
                                                        <a class="text-black-70"
                                                           href="#">number of classes : ' . $row['classNumber'] . '</a>
                                                    </div>
                                                </div>
                                            </li>


                                                        ';
                                        }
                                    }
                                    ?>

                                    <!-- <li class="list-group-item forum-thread">
                                                <div class="media align-items-center">
                                                    <div class="media-left">
                                                        <div class="forum-icon-wrapper">
                                                            <a 
                                                               class="forum-thread-icon">
                                                               <img src="assets/images/sbadge.png"  alt=""
                                                               width="50"class="rounded-circle">
                                                            </a> -->
                                    <!-- <a href="#"
                                                               class="forum-thread-user">
                                                                <img src="assets/images/people/50/guy-2.jpg"
                                                                     alt=""
                                                                     width="20"
                                                                     class="rounded-circle">
                                                            </a> -->
                                    <!-- </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex align-items-center">
                                                            <a href="#.html"
                                                               class="text-body"><strong>seconde Teacher's full name</strong></a>
                                                            <small class="ml-auto text-muted">subject</small>
                                                        </div>
                                                        <a class="text-black-70"
                                                           href="#">number of classes : ....</a>
                                                    </div>
                                                </div>
                                            </li> -->
                                    <?php
                                    $query  = mysqli_query($con, "SELECT professeur.id,professeur.nom AS ProfName,professeur.prenom,class.idProf,class.matiere,class.nom ,
                                                  COUNT(class.nom) AS classNumber
                                                  FROM professeur,class 
                                                  WHERE professeur.id=idProf 
                                                  GROUP BY professeur.nom
                                                  ORDER BY `classNumber` DESC
                                                  LIMIT 2,1;
                                                  ;
                                                  ");
                                    if ($query) {
                                        if ($row = mysqli_fetch_assoc($query)) {
                                            $seconderow = $row;

                                            echo '
                                                        <li class="list-group-item forum-thread">
                                                <div class="media align-items-center">
                                                    <div class="media-left">
                                                        <div class="forum-icon-wrapper">
                                                            <a 
                                                               class="forum-thread-icon">
                                                               <img src="assets/images/bbadge.png" class="rounded-circle" alt=""
                                                               width="50">
                                                            </a>
                                                            </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex align-items-center">
                                                            <a href="#"
                                                               class="text-body"><strong>' . $row['ProfName'] . ' ' . $row['prenom'] . '</strong></a>
                                                            <small class="ml-auto text-muted">' . $row['matiere'] . '</small>
                                                        </div>
                                                        <a class="text-black-70"
                                                           href="#">number of classes  : ' . $row['classNumber'] . '</a>
                                                    </div>
                                                </div>
                                            </li>
                                            ';
                                        }
                                    } ?>

                                    <!-- <li class="list-group-item forum-thread">
                                                <div class="media align-items-center">
                                                    <div class="media-left">
                                                        <div class="forum-icon-wrapper">
                                                            <a 
                                                               class="forum-thread-icon">
                                                               <img src="assets/images/bbadge.png" class="rounded-circle" alt=""
                                                               width="50">
                                                            </a> -->
                                    <!-- <a href="student-profile.html"
                                                               class="forum-thread-user">
                                                                <img src="assets/images/people/50/woman-1.jpg"
                                                                     alt=""
                                                                     width="20"
                                                                     class="rounded-circle">
                                                            </a> -->
                                    <!-- </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="d-flex align-items-center">
                                                            <a href="#.html"
                                                               class="text-body"><strong>Teacher's full name</strong></a>
                                                            <small class="ml-auto text-muted">subject</small>
                                                        </div>
                                                        <a class="text-black-70"
                                                           href="#.html">number of classes  : without their names ....</a>
                                                    </div>
                                                </div>
                                            </li> -->


                                </ul>
                            </div>
                            <div class="card" style="height: 400px;">
                                <div class="card-header d-flex align-items-center">
                                    <div class="flex">
                                        <h4 class="card-title">ACTIVE CLASSES</h4>
                                        <p class="card-subtitle"></p>
                                    </div>
                                    <div class="media-right">
                                        <div class="btn btn-warning btn-circle"><i class="material-icons">grade</i></div>
                                    </div>
                                </div>
                                <div data-toggle="lists" data-lists-values='[
            "js-lists-values-total",
            "js-lists-values-date"
          ]' data-lists-sort-by="js-lists-values-date" data-lists-sort-desc="true" class="table-responsive">
                                    <table class="table table-nowrap m-0">
                                        <?php
                                        $query = mysqli_query($con, "SELECT professeur.id,professeur.nom AS profNom,professeur.prenom AS profPrenom,class.idProf,etudiant.acceptePar,etudiant.nom AS etudiantNom,etudiant.prenom AS etudiantPrenom,etudiant.id,class.nom AS classNom
                                                FROM professeur
                                                INNER JOIN class
                                                ON professeur.id = class.idProf
                                                INNER JOIN etudiant
                                                ON etudiant.acceptePar = professeur.id
                                                GROUP BY professeur.nom,professeur.prenom;");

                                        while ($row = mysqli_fetch_array($query)) {
                                            $profNom = $row['profNom'];
                                            $profPrenom = $row['profPrenom'];
                                            $classNom = $row['classNom'];
                                            $eNom = $row['etudiantNom'];
                                            $ePrenom = $row['etudiantPrenom'];



                                        ?>
                                            <thead class="thead-light" style="position:sticky;top:0; left:0; overflow:hidden;">
                                                <tr>
                                                    <th colspan="3">
                                                        <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-total">Total student</a>
                                                        <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-date">Date</a>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="list" style="overflow: scroll;">

                                                <tr>
                                                    <td>
                                                        <div class="media align-items-center">
                                                            <div class="media-body">
                                                                <a><strong><?php echo $classNom; ?></strong></a><br>
                                                                <small class="text-black-50 text-uppercase mr-2">
                                                                    <?php echo $profNom . ' ' . $profPrenom; ?>


                                                                </small><br>
                                                                <small class="text-black-50 text-uppercase mr-2">
                                                                    <?php $query = mysqli_query($con, "SELECT COUNT(etudiant.acceptePar) AS countE FROM etudiant INNER JOIN professeur ON professeur.id = etudiant.acceptePar");
                                                                    while ($row = mysqli_fetch_array($query)) {
                                                                        $countEt = $row['countE'];
                                                                    ?>
                                                                        <span class="js-lists-values-total"><?php echo $countEt;
                                                                                                        }  ?></span></small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <small class="text-muted text-uppercase js-lists-values-date">12 Nov 2022</small>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            <!-- <tr>
                                                        <td>
                                                            <div class="media align-items-center"> -->
                                            <!-- <a href="instructor-course-edit.html"
                                                                   class="avatar avatar-4by3 avatar-sm mr-3">
                                                                    <img src="assets/images/vuejs.png"
                                                                         alt="course"
                                                                         class="avatar-img rounded">
                                                                </a> -->
                                            <!-- <div class="media-body">
                                                                    <a
                                                                       ><strong>class name</strong></a><br>
                                                                    <small class="text-black-50 text-uppercase mr-2">
                                                                        techer name -->
                                            <!-- <a href="instructor-invoice.html"
                                                                           style="color: inherit;"
                                                                           class="js-lists-values-document">#8735</a> -
                                                                        &dollar;<span class="js-lists-values-amount">89</span> USD -->

                                            <!-- </small><br>
                                                                    <small class="text-black-50 text-uppercase mr-2"><span class="js-lists-values-total">20</span></small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            <small class="text-muted text-uppercase js-lists-values-date">20 Nov 2022</small>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="media align-items-center"> -->
                                            <!-- <a href="instructor-course-edit.html"
                                                                   class="avatar avatar-4by3 avatar-sm mr-3">
                                                                    <img src="assets/images/github.png"
                                                                         alt="course"
                                                                         class="avatar-img rounded">
                                                                </a> -->
                                            <!-- <div class="media-body">
                                                                    <a class="text-body js-lists-values-course"
                                                                       ><strong>class name</strong></a><br>
                                                                    <small class="text-black-50 text-uppercase mr-2">
                                                                        teacher name -->
                                            <!-- <a href="instructor-invoice.html"
                                                                           style="color: inherit;"
                                                                           class="js-lists-values-document">#8736</a> -
                                                                        &dollar;<span class="js-lists-values-amount">89</span> USD -->

                                            <!-- </small><br>
                                                                    <small class="text-black-50 text-uppercase mr-2"><span class="js-lists-values-total">17</span></small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            <small class="text-muted text-uppercase js-lists-values-date">14 Nov 2022</small>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="media align-items-center"> -->
                                            <!-- <a href="instructor-course-edit.html"
                                                                   class="avatar avatar-4by3 avatar-sm mr-3">
                                                                    <img src="assets/images/gulp.png"
                                                                         alt="course"
                                                                         class="avatar-img rounded">
                                                                </a> -->
                                            <!-- <div class="media-body">
                                                                    <a class="text-body js-lists-values-course"
                                                                       ><strong>class name</strong></a><br>
                                                                    <small class="text-black-50 text-uppercase mr-2">
                                                                        teacher name -->
                                            <!-- <a href="instructor-invoice.html"
                                                                           style="color: inherit;"
                                                                           class="js-lists-values-document">#8737</a> -
                                                                        &dollar;<span class="js-lists-values-amount">89</span> USD -->

                                            <!-- </small><br>
                                                                    <small class="text-black-50 text-uppercase mr-2"><span class="js-lists-values-total">21</span></small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            <small class="text-muted text-uppercase js-lists-values-date">03 Nov 2022</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="media align-items-center">
                                                                <div class="media-body">
                                                                    <a 
                                                                       ><strong>Class name</strong></a><br>
                                                                    <small  class="text-black-50 text-uppercase mr-2">
                                                                        teacher name -->
                                            <!-- <a href="instructor-invoice.html"
                                                                           style="color: inherit;"
                                                                           class="js-lists-values-document">#8734</a> -
                                                                        &dollar;<span class="js-lists-values-amount">89</span> USD -->

                                            <!-- </small><br>
                                                                    <small class="text-black-50 text-uppercase mr-2"><span class="js-lists-values-total">24</span></small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            <small class="text-muted text-uppercase js-lists-values-date">12 Nov 2022</small>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="media align-items-center">
                                                                <div class="media-body">
                                                                    <a 
                                                                       ><strong>Class name</strong></a><br>
                                                                    <small  class="text-black-50 text-uppercase mr-2">
                                                                        teacher name -->
                                            <!-- <a href="instructor-invoice.html"
                                                                           style="color: inherit;"
                                                                           class="js-lists-values-document">#8734</a> -
                                                                        &dollar;<span class="js-lists-values-amount">89</span> USD -->

                                            <!-- </small><br>
                                                                    <small class="text-black-50 text-uppercase mr-2"><span class="js-lists-values-total">12</span></small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            <small class="text-muted text-uppercase js-lists-values-date">12 Nov 2022</small>
                                                        </td>
                                                    </tr> -->

                                            </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h4 class="card-title">Upcoming meetings</h4>
                                            <p class="card-subtitle"></p>
                                        </div>
                                        <div class="media-right">
                                            <div class="btn btn-info btn-circle"><i class="material-icons">event_available</i></div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $query  = mysqli_query($con, "SELECT meet.datedebut,meet.idClass,class.nom AS className,professeur.nom,professeur.prenom

                                                  FROM meet
                                                  INNER JOIN class
                                                  ON class.id = meet.idClass
                                                  INNER JOIN professeur
                                                  ON professeur.id = class.idProf
                                                  ");
                                if ($query) {
                                    while ($row = mysqli_fetch_array($query)) {
                                        $nomProf = $row['nom'];
                                        $prenomProf = $row['prenom'];
                                        $nomClass = $row['className'];

                                        echo '<ul class="list-group list-group-fit">
                                                                    <li class="list-group-item forum-thread">
                                                                    <div class="media align-items-center">
                                                                    <div class="media-body">
                                                                    <div class="d-flex align-items-center">
                                                                    <a
                                                                
                                                                   class="text-body"><strong>' . $nomClass . '</strong></a>
                                                                <small class="ml-auto text-muted">' . $row['datedebut'] . '</small>
                                                            </div>
                                                            <small class="text-black-70"
                                                               >' . $nomProf . $prenomProf . '</small>
                                                        </div>
                                                    </div>
                                                </li>
                                                </ul>
    

                                                            ';
                                    }
                                }
                                ?>

                                <!-- <ul class="list-group list-group-fit">
    
                                                <li class="list-group-item forum-thread">
                                                    <div class="media align-items-center"> -->
                                <!-- <div class="media-left">
                                                            <div class="forum-icon-wrapper">
                                                                <a 
                                                                   class="forum-thread-icon">
                                                                   <img src="assets/images/people/50/guy-1.jpg" class="rounded-circle">
                                                                </a>
                                                                 <a href="#"
                                                                   class="forum-thread-user">
                                                                    <img src="assets/images/people/50/guy-1.jpg"
                                                                         alt=""
                                                                         width="20"
                                                                         class="rounded-circle">
                                                                </a> 
                                                            </div>
                                                        </div> -->
                                <!-- <div class="media-body">
                                                            <div class="d-flex align-items-center">
                                                               
                                                                <a
                                                                
                                                                   class="text-body"><strong>Class name</strong></a>
                                                                <small class="ml-auto text-muted">DATE</small>
                                                            </div>
                                                            <small class="text-black-70"
                                                               >Teacher's name</small>
                                                        </div>
                                                    </div>
                                                </li>
     -->
                                <!-- <li class="list-group-item forum-thread">
                                                    <div class="media align-items-center"> -->
                                <!-- <div class="media-left">
                                                            <div class="forum-icon-wrapper">
                                                                <a 
                                                                   class="forum-thread-icon">
                                                                   <img src="assets/images/people/50/guy-1.jpg" class="rounded-circle">
                                                                </a>
                                                                 <a href="#"
                                                                   class="forum-thread-user">
                                                                    <img src="assets/images/people/50/guy-2.jpg"
                                                                         alt=""
                                                                         width="20"
                                                                         class="rounded-circle">
                                                                </a> 
                                                            </div>
                                                        </div> -->
                                <!-- <div class="media-body">
                                                            <div class="d-flex align-items-center">
                                                                <a href="#.html"
                                                                   class="text-body"><strong>Class name</strong></a>
                                                                <small class="ml-auto text-muted">DATE</small>
                                                            </div>
                                                            <small class="text-black-70"
                                                               href="#">Teacher's name</small>
                                                        </div>
                                                    </div>
                                                </li> -->

                                <!-- <li class="list-group-item forum-thread">
                                                    <div class="media align-items-center"> -->
                                <!-- <div class="media-left">
                                                            <div class="forum-icon-wrapper">
                                                                <a 
                                                                   class="forum-thread-icon">
                                                                   <img src="assets/images/people/50/guy-1.jpg" class="rounded-circle">
                                                                </a>
                                                                 <a href="#"
                                                                   class="forum-thread-user">
                                                                    <img src="assets/images/people/50/guy-1.jpg"
                                                                         alt=""
                                                                         width="20"
                                                                         class="rounded-circle">
                                                                </a> 
                                                            </div>
                                                        </div> -->
                                <!-- <div class="media-body">
                                                            <div class="d-flex align-items-center">
                                                                <a
                                                                   class="text-body"><strong>Class name</strong></a>
                                                                <small class="ml-auto text-muted">DATE</small>
                                                            </div>
                                                            <small class="text-black-70"
                                                               >Teacher's name</small>
                                                        </div>
                                                    </div>
                                                </li>
    
                                            </ul> -->
                            </div>
                        </div>

                    </div>
                </div>
                <!-- </div>
                     </div> -->

                <!-- </div> -->

            </div>

        </section>


        <!-- <script src="//d3js.org/d3.v3.min.js"></script>
        <script src="assets/js/graph.js"></script> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
        </script>
        <script src="assets/js/studentChart.js"></script>

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
        <script src="assets/js/app-settings.js"></script>

        <!-- Global Settings -->
        <script src="assets/js/settings.js"></script>

        <!-- Moment.js -->
        <script src="assets/vendor/moment.min.js"></script>
        <script src="assets/vendor/moment-range.js"></script>

        <!-- Chart.js -->
        <script src="assets/vendor/Chart.min.js"></script>
        <script src="assets/js/chartjs-rounded-bar.js"></script>
        <script src="assets/js/chartjs.js"></script>

        <!-- Student Dashboard Page JS -->
        <!-- <script src="assets/js/chartjs-rounded-bar.js"></script> -->
        <script src="assets/js/page.student-dashboard.js"></script>
        <script src="assets/vendor/list.min.js"></script>
        <script src="assets/js/list.js"></script>

        <?php
        $NumberOfStudent = array();
        $query = mysqli_query($con, "SELECT MONTH(inscriptionDate) AS monthName,COUNT(etudiant.id) AS numOfEtudiant FROM `etudiant` where acceptePar IS NULL AND ajouterPar is NULL GROUP BY monthName;
                                ");
        foreach ($query as $data) {
            $month[] = $data['monthName'];
            $NumberOfStudent[$data['monthName'] - 1] = $data['numOfEtudiant'];
        }
        if (!empty($NumberOfStudent)) {
            for ($i = 0; $i < 12; $i++) {
                if (!array_key_exists($i, $NumberOfStudent)) {
                    $NumberOfStudent[$i] = 0;
                }
            }
        }
        ?>

        <?php $numberOfTeachers  = array();
         $sql = mysqli_query($con, "SELECT MONTH(inscrDate) AS month , COUNT(profreq.id) AS profReq FROM profreq GROUP BY month;");

        foreach ($sql as $opt) {
            $Tmonth[] = $opt['month'];
            $numberOfTeachers[$opt['month'] - 1] = $opt['profReq'];
        }
        if (!empty($numberOfTeachers)) {
            for ($i = 0; $i < 12; $i++) {
                if (!array_key_exists($i, $numberOfTeachers)) {
                    $numberOfTeachers[$i] = 0;
                }
            }
        }

        ?>

        <script>
            var test_labels = ["january",
                "february",
                "march",
                "april",
                "may",
                "june",
                "july",
                "august",
                "september",
                "october",
                "november",
                "december",
            ];
            var test_data = <?php echo json_encode($NumberOfStudent); ?>;
            var array = Object.keys(test_data).map(function(key) {
                return test_data[key];
            });
            test_data = array;

            var ttest_labels = ["january",
                "february",
                "march",
                "april",
                "may",
                "june",
                "july",
                "august",
                "september",
                "october",
                "november",
                "december",
            ];
            var ttest_data = <?php echo json_encode($numberOfTeachers); ?>;
            var arrayTwo = Object.keys(ttest_data).map(function(key) {
                return ttest_data[key];
            });
            ttest_data = arrayTwo;
            var studentChart = new Chart("studentChart", {
                type: "bar",
                data: {
                    labels: test_labels,
                    datasets: [{
                        data: test_data,
                        label: "student requests",
                        borderColor: "#66afff",
                        backgroundColor: '#66afff',
                        fill: false
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'student requests per month'
                    }
                }
            });
            var teacherChart = new Chart("teacherChart", {
                type: "bar",
                data: {
                    labels: ttest_labels,
                    datasets: [{
                        data: ttest_data,
                        label: "Teacher requests",
                        borderColor: "#66afff",
                        backgroundColor: '#66afff',
                        fill: false
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Teacher requests per month'
                    }
                }
            });

            function addData(chart, label, data) {
                chart.data.labels.push(label);
                chart.data.datasets.forEach((dataset) => {
                    dataset.data.push(data);
                });
                chart.update();
            }
        </script>

    </body>

    </html>
<?php } ?>