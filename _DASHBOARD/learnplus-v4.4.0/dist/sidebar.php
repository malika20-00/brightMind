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
            <a href="student-dashboard.html" class="navbar-brand">
                <img src="https://bright-minds.ma/wp-content/uploads/2019/05/logo1-w.png" style="height:66px;" class="mr-2" alt="LearnPlus" />
                <!-- <span class="d-none d-xs-md-block">LearnPlus</span> -->
            </a>

            <!-- Search -->
            <!-- <form class="search-form d-none d-md-flex">
                <input type="text" class="form-control" placeholder="Search">
                <button class="btn" type="button"><i class="material-icons font-size-24pt">search</i></button>
            </form> -->
            <!-- // END Search -->

            <div class="flex"></div>


            <li class="nav-item dropdown ml-1 ml-md-3">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                    <!-- <img src="assets/images/profile.png" alt="Avatar" class="rounded-circle" width="40"> -->
                     <img src="<?php
                                                                                                    if (file_exists("../../admin/include/upload/" . $id . ".png")) {
                                                                                                        echo "../../admin/include/upload/" . $id . ".png";
                                                                                                    } else if (file_exists("../../admin/include/upload/" . $id . ".jpeg")) {
                                                                                                        echo "../../admin/include/upload/" . $id . ".jpeg";
                                                                                                    } else if (file_exists("../../admin/include/upload/" . $id . ".jpg")) {
                                                                                                        echo "../../admin/include/upload/" . $id . ".jpg";
                                                                                                    } else {
                                                                                                        echo "../../admin/include/upload/template.png";
                                                                                                    }

                                                                                                    ?>" alt="Avatar" class="rounded-circle" width="50" height="50">
                 
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="student-account-edit.php">
                        <i class="material-icons">edit</i> Edit Account
                    </a>
                    <a class="dropdown-item" href="guest-forgot-password.php">
                        <i class="material-icons">edit</i> Forgot Password
                    </a>
                    <a class="dropdown-item" href="../../admin/include/deconnection.php">
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
                        <span class="link_name">Account</span>
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
                <a href="../../admin/include/deconnection.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Logout</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../../admin/include/deconnection.php">Logout</a></li>
                </ul>
            </li>

        </ul>
        
    </div>
   