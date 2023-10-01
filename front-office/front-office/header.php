<header>
    <div id="main-menu" class="main-menu-container">
        <div class="main-menu">
            <div class="container">
                <div class="navbar-default">
                    <div class="navbar-header float-left">
                        <a class="navbar-brand text-uppercase" href="#"><img src="https://bright-minds.ma/wp-content/uploads/2019/05/logo1-w.png" style="width: 100px;" alt="logo"></a>
                    </div><!-- /.navbar-header -->

               
                    
                    
                    <nav class="navbar-menu float-right">
                        <div class="nav-menu ul-li">
                            <ul>
                                <li class="menu-item-has-children ul-li-block">
                                    <a href="student-home.php">Home</a>

                                </li>

                                <li class="menu-item-has-children ul-li-block">
                                    <a href="#!">Courses</a>
                                    <ul class="sub-menu">
                                    <?php $etudiant  = new Etudiant();
											foreach ($etudiant->getClassByIdStudent($_SESSION['id']) as $affectation) {
												$crudClass = new CRUDClass();
												$class = $crudClass->getClassById($affectation['idClass']); ?>
												<li><a href="student-class.php?id=<?php echo $affectation['idClass'] ?>"><?php echo $class['nom'];  ?></a></li>
											<?php } ?>
                                       

                                    </ul>
                                </li>
                                <li class="menu-item-has-children ul-li-block">
                                    <a href="#!">Participants</a>
                                    <ul class="sub-menu">
                                    <?php $etudiant  = new Etudiant();
											foreach ($etudiant->getClassByIdStudent($_SESSION['id']) as $affectation) {
												$crudClass = new CRUDClass();
												$class = $crudClass->getClassById($affectation['idClass']); ?>
												<li><a href="student-participants-list.php?id=<?php echo $affectation['idClass'] ?>"><?php echo $class['nom'];  ?></a></li>
											<?php } ?>
                                       

                                    </ul>
                                </li>
                                <li><a href="studentmeets.php">Meetings</a></li>
                                <li class="menu-item-has-children ul-li-block">
                                    <a href="#">my account</a>
                                    <ul class="sub-menu">
                                        <li><a href="../include/deconnection.php">log out</a></li>
                                        <li><a  data-toggle="modal" data-target="#myModal" href="#">edit account</a></li>
                                        


                                    </ul>
                                </li>
                            </ul>
                           

                            <!-- The Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header backgroud-style">
                                            <div class="gradient-bg"></div>
                                            <div class="popup-logo">
                                                <img src="assets/img/logo/p-logo.jpg" alt="">
                                            </div>
                                            <div class="popup-text text-center">
                                                <h2> <span>Edit</span> Your Account.</h2>
                                            </div>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <?php $crudStudent = new CRUDStudent();
                                             $student = $crudStudent->readStudentById($_SESSION['id']); ?>
                                            <div class="alt-text text-center"><a href="#">Your info</a> </div>
                                            <form id="forme-edit" class="contact_form" action="#" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="contact-info">
                                                            <input class="name" name="prenom" type="text" placeholder="first name" value="<?php echo $student['prenom']; ?>">
                                                            <p class="error" id="prenomError"></p>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="contact-info">
                                                            <input class="name" name="nom" type="text" placeholder="last name" value="<?php echo $student['nom']; ?>">
                                                            <p class="error" id="nomError"></p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="contact-info">
                                                    <input class="name" name="email" type="email" placeholder="Your email" value="<?php echo $student['email']; ?>">
                                                    <p class="error" id="emailError"></p>

                                                </div>
                                                <div class="contact-info">
                                                    <input class="name" name="cin" type="text" placeholder="Your cin" value="<?php echo $student['cin']; ?>">
                                                    <p class="error" id="cinError"></p>

                                                </div>
                                                <div class="contact-info">
                                                    <input class="name" name="tel" type="text" placeholder="Your number phone" value="<?php echo $student['telephone']; ?>">
                                                    <p class="error" id="telError"></p>

                                                </div>
                                                <div class="contact-info">
                                                    <input list="navigateurs" name="niveauScolaire" id="niveau" placeholder="Your level school" value="<?php echo $student['niveauScolaire']; ?>" />
                                                    <datalist id="navigateurs">
                                                        <option value="first year of primary school">
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
                                                <div class="contact-info">
                                                    <input class="pass" name="pw" type="password" placeholder="Your password">
                                                    <p class="error" id="pwError"></p>

                                                </div>
                                                <div class="contact-info">
                                                    <input class="pass" name="pwVerif" type="password" placeholder="Password confirmation">
                                                    <p class="error" id="pwVerifError"></p>

                                                </div>
                                                <div class="nws-button text-center white text-capitalize">
                                                    <button id="submit" type="submit" value="Submit">Save changes</button>
                                                </div>
                                            </form>
                                            
                                            <p id="success"></p>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>


                </div>
            </div>
        </div>
    </div>
</header>