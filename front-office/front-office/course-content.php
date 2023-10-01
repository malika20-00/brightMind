<?php
if (!empty($_GET)) {
	session_start();
	if (!isset($_SESSION['id'])) {
		header("Location:../include/deconnection.php");
	}

	require_once 'prof/class/Prof.class.php';
	$prof = new Prof();
	$prof->supprimerCommentSansFils();
	$idCours = $_GET['cours'];
	$idClass = $_GET['class'];
	$idProf = 1;
	$cours = $prof->getCoursById($idCours);


?>
	<!doctype html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Course</title>

		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/fontawesome-all.css">
		<link rel="stylesheet" href="assets/css/flaticon.css">
		<link rel="stylesheet" type="text/css" href="assets/css/meanmenu.css">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/video.min.css">
		<link rel="stylesheet" href="assets/css/lightbox.css">
		<link rel="stylesheet" href="assets/css/progess.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/css/responsive.css">
		<link rel="stylesheet" href="assets/css/calender.css">

		<link rel="stylesheet" href="assets/css/colors/switch.css">
		<link href="assets/css/colors/color-2.css" rel="alternate stylesheet" type="text/css" title="color-2">
		<link href="assets/css/colors/color-3.css" rel="alternate stylesheet" type="text/css" title="color-3">
		<link href="assets/css/colors/color-4.css" rel="alternate stylesheet" type="text/css" title="color-4">
		<link href="assets/css/colors/color-5.css" rel="alternate stylesheet" type="text/css" title="color-5">
		<link href="assets/css/colors/color-6.css" rel="alternate stylesheet" type="text/css" title="color-6">
		<link href="assets/css/colors/color-7.css" rel="alternate stylesheet" type="text/css" title="color-7">
		<link href="assets/css/colors/color-8.css" rel="alternate stylesheet" type="text/css" title="color-8">
		<link href="assets/css/colors/color-9.css" rel="alternate stylesheet" type="text/css" title="color-9">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<style>
		.underline::before {
			content: '';
			position: absolute;
			left: 0;
			bottom: -4px;
			height: 8px;
			width: 90px;
			border-radius: 8px;
			background: linear-gradient(135deg, #00c9fd, #81ee8e);

		}

		.iframParent {
			cursor: pointer;
			position: relative;
			display: inline-block;
			width: 278px;
			height: 174px;
			overflow: hidden;
			margin: 20px 20px;
		}

		.ouvrirPdf {
			border: none;
			background-color: #b0b7bb3d;
			height: 40px;
			width: 150px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			box-shadow: rgb(0 0 0 / 25%) 0px 54px 55px, rgb(0 0 0 / 12%) 0px -12px 30px, rgb(0 0 0 / 12%) 0px 4px 6px, rgb(0 0 0 / 17%) 0px 12px 13px, rgb(0 0 0 / 9%) 0px -3px 5px;
			font-size: 18px;
			font-weight: bold;
		}

		/* //comme */
		@media (min-width: 0) {
			.g-mr-15 {
				margin-right: 1.07143rem !important;
			}
		}

		@media (min-width: 0) {
			.g-mt-3 {
				margin-top: 0.21429rem !important;
			}
		}

		.g-height-50 {
			height: 50px;
		}

		.g-width-50 {
			width: 50px !important;
		}

		@media (min-width: 0) {
			.g-pa-30 {
				padding: 2.14286rem !important;
			}
		}

		.g-bg-secondary {
			background-color: #fafafa !important;
		}

		.u-shadow-v18 {
			box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
		}

		.g-color-gray-dark-v4 {
			color: #777 !important;
		}

		.g-font-size-12 {
			font-size: 0.85714rem !important;
		}

		.media-comment {
			margin-top: 20px
		}

		.textareaedit {
			background-color: #eeeeee;
			padding: 15px;
			border-radius: 4px;
			margin-bottom: 10px;
			width: 100%;
			border: none;
		}
	</style>

	<body>
		<div class="modal fade" id="deletecommentaire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<div class="modal-body">
						<h3 style="text-align: center;">Delete comment</h3>
						<div class="container">
							<!-- <p id="idCoursSupprime" ></p> -->
							<br>
							<p style="font-size: 20px;">Are you sure you want to delete this comment ?</p>
							<div style="margin-bottom:15px;margin-top: 20px; color: #fff;float: right;">
								<form action="./prof/include/supprimerComment.php" method="POST">
									<input type="hidden" id="idcommentsupprimer" name="idCommentSupprime">
									<input type="hidden" id="idclass" name="idClass" value="<?php echo $idClass; ?>">
									<input type="hidden" id="idcours" name="idCours" value="<?php echo $idCours; ?>">
									<a href="course-content.php?class=<?php echo $idClass; ?>&cours=<?php echo $idCours; ?>" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b">Cancel</a>
									<button class="btn btn-primary" data-role="button" data-inline="true">Delete</a>
								</form>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modifiercommentaire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<div class="modal-body">
						<div class=" section-title-2 ">
							<h2 style="color:black; text-align:center;">EDIT COMMENT</h2>
						</div>
						<form class="contact_form" action="./prof/include/modifierComment.php" method="POST" enctype="multipart/form-data">
							<br>
							<div class="payment-info">
								<label class="control-label" style="color:black;">comment: </label>

								<textarea class="form-control" id="textareaedit" name="commentContenu" placeholder="Enter the comment" cols="30" rows="5"></textarea>
								<input type="hidden" id="idcommentmodifier" name="idCommentModifier">
								<input type="hidden" id="idclass" name="idClass" value="<?php echo $idClass; ?>">
								<input type="hidden" id="idcours" name="idCours" value="<?php echo $idCours; ?>">

							</div>
							<button class="btn btn-primary" data-role="button" data-inline="true">Save changes</a>
						</form>

					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="replycommentaire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<div class="modal-body">
						<div class=" section-title-2 ">
							<h2 style="color:black; text-align:center;">REPLY COMMENT</h2>
						</div>
						<form class="contact_form" action="./prof/include/replyComment.php" method="POST" enctype="multipart/form-data">
							<br>
							<div class="payment-info">
								<label class="control-label" style="color:black;">comment: </label>

								<textarea class="form-control textareaedit" name="replyContenu" placeholder="Enter the reply" cols="30" rows="5"></textarea>
								<input type="hidden" id="idcommentreply" name="idCommentReply">
								<input type="hidden" id="idclass" name="idClass" value="<?php echo $idClass; ?>">
								<input type="hidden" id="idcours" name="idCours" value="<?php echo $idCours; ?>">

							</div>
							<button class="btn btn-primary" data-role="button" data-inline="true">Reply Comment</a>
						</form>

					</div>
				</div>
			</div>
		</div>

		<div id="preloader"></div>

		<div id="switch-color" class="color-switcher">
			<div class="open"><i class="fas fa-cog fa-spin"></i></div>
			<h4>COLOR OPTION</h4>
			<ul>
				<li><a class="color-2" onclick="setActiveStyleSheet('color-2'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
				<li><a class="color-3" onclick="setActiveStyleSheet('color-3'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
				<li><a class="color-4" onclick="setActiveStyleSheet('color-4'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
				<li><a class="color-5" onclick="setActiveStyleSheet('color-5'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
				<li><a class="color-6" onclick="setActiveStyleSheet('color-6'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
				<li><a class="color-7" onclick="setActiveStyleSheet('color-7'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
				<li><a class="color-8" onclick="setActiveStyleSheet('color-8'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
				<li><a class="color-9" onclick="setActiveStyleSheet('color-9'); return true;" href="#!"><i class="fas fa-circle"></i></a> </li>
			</ul>
			<button class="switcher-light">WIDE </button>
			<button class="switcher-dark">BOX </button>
			<a class="rtl-v" href="#">RTL </a>
		</div>



		<!-- Start of Header section
		============================================= -->
		<header>
			<div id="main-menu" class="main-menu-container">
				<div class="main-menu">
					<div class="container">
						<div class="navbar-default">
							<div class="navbar-header float-left">
								<a class="navbar-brand text-uppercase" href="#"><img src="https://bright-minds.ma/wp-content/uploads/2019/05/logo1-w.png" style="width: 100px;" alt="logo"></a>
							</div><!-- /.navbar-header -->

							<!-- <div class="select-lang">
								<select>
									<option value="9" selected="">ENG</option>
									<option value="10">BAN</option>
									<option value="11">ARB</option>
									<option value="12">FRN</option>
								</select>
							</div> -->
							<div class="cart-search float-right ul-li">
								<ul>
									<!-- <li><a href="#"><i class="fas fa-shopping-bag"></i></a></li> -->

									<li>
										<button type="button" class="toggle-overlay search-btn">
											<i class="fas fa-search"></i>
										</button>

										<div class="search-body">

											<div class="search-form">
												<form action="#">
													<input class="search-input" type="search" placeholder="Search Here">
													<div class="outer-close toggle-overlay">
														<button type="button" class="search-close">
															<i class="fas fa-times"></i>
														</button>
													</div>
												</form>

											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="log-in float-right">
								<!-- <a  data-toggle="modal" data-target="#myModal" href="#">log in</a> -->


								<!-- The Modal -->
								<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content"> -->

								<!-- Modal Header -->
								<!-- <div class="modal-header backgroud-style">
												<div class="gradient-bg"></div>
												<div class="popup-logo">
													<img src="assets/img/logo/p-logo.jpg" alt="">
												</div>
												<div class="popup-text text-center">
													<h2> <span>Login</span> Your Account.</h2>
													<p>Login to our website, or <span>REGISTER</span></p>
												</div>
											</div> -->

								<!-- Modal body -->
								<!-- <div class="modal-body">
												<div class="facebook-login">
													<a href="#">
														<div class="log-in-icon">
															<i class="fab fa-facebook-f"></i>
														</div>
														<div class="log-in-text text-center">
															Login with Facebook
														</div>
													</a>
												</div>
												<div class="alt-text text-center"><a href="#">OR SIGN IN</a> </div>
												<form class="contact_form" action="#" method="POST" enctype="multipart/form-data">
													<div class="contact-info">
														<input class="name" name="Email" type="email" placeholder="Your@email.com*">
													</div>
													<div class="contact-info">
														<input class="pass" name="name" type="password" placeholder="Your password*">
													</div>
													<div class="nws-button text-center white text-capitalize">
														<button type="submit" value="Submit">LOg in Now</button> 
													</div> 
												</form>
												<div class="log-in-footer text-center">
													<p>* Denotes mandatory field.</p>
													<p>** At least one telephone number is required.</p>
												</div>
											</div> -->
								<!-- </div>
									</div>
								</div> -->
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<nav class="navbar-menu float-right">
								<div class="nav-menu ul-li">
									<ul>
										<li>
											<a href="classes.php">home</a>

										</li>
										<!-- <li><a href="studentlist.html">Student</a></li> -->
										<li class="menu-item-has-children ul-li-block">
											<a href="#">Student</a>
											<ul class="sub-menu">
												<?php foreach ($prof->yourClass($idProf) as $class) {
												?>
													<!-- <li><a href="teacher-courses.html" >class 1</a></li> -->
													<li><a href="studentlist.php?class=<?php echo $class['id']; ?>"><?php echo $class['nom']; ?></a></li>
												<?php } ?>
											</ul>
										</li>


										<li class="menu-item-has-children ul-li-block">
											<a href="#">Courses</a>
											<ul class="sub-menu">
												<?php foreach ($prof->yourClass($idProf) as $class) {
												?>
													<!-- <li><a href="teacher-courses.html" >class 1</a></li> -->
													<li><a href="teacher-courses.php?class=<?php echo $class['id']; ?>"><?php echo $class['nom']; ?></a></li>
												<?php } ?>
											</ul>
										</li>
										<li class="menu-item-has-children ul-li-block">
											<a href="#">Meeting</a>
											<ul class="sub-menu">
												<?php foreach ($prof->yourClass($idProf) as $class) {
												?>
													<!-- <li><a href="teacher-courses.html" >class 1</a></li> -->
													<li><a href="profMeet.php?class=<?php echo $class['id']; ?>"><?php echo $class['nom']; ?></a></li>
												<?php } ?>
											</ul>
										</li>


										<li class="menu-item-has-children ul-li-block">
											<a href="#">my account</a>
											<ul class="sub-menu">
												<li><a href="../include/deconnection.php">log out</a></li>
												<li><a data-toggle="modal" data-target="#modifierProfil" href="#">edit account</a></li>
												<!-- <li><a href="forgotPassword.php">forgot password</a></li> -->


											</ul>
										</li>

									</ul>



									<!-- The Modal -->
									<?php
									$profActuel = $prof->getProf($idProf);
									?>
									<div class="modal fade" id="modifierProfil" tabindex="-1" role="dialog" aria-hidden="true">
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
														<!-- <p>Login to our website, or <span>REGISTER</span></p> -->
													</div>
												</div>

												<!-- Modal body -->
												<div class="modal-body">

													<div class="alt-text text-center"><a href="#">Your info</a> </div>
													<form class="contact_form" action="" method="POST" enctype="multipart/form-data" id="modifierProfil_form">
														<div class="row">
															<div class="col-md-6 ">
																<div class="contact-info">
																	<input class="name" name="prenom" type="text" placeholder="first name" value="<?php echo $profActuel['prenom']; ?>">
																	<p class="error" id="prenomError"></p>
																</div>
															</div>

															<div class="col-md-6">
																<div class="contact-info">
																	<input class="name" name="nom" type="text" placeholder="last name" value="<?php echo $profActuel['nom']; ?>">
																	<p class="error" id="nomError"></p>
																</div>
															</div>
														</div>
														<div class="contact-info">
															<input class="name" name="email" type="email" placeholder="Your email" value="<?php echo $profActuel['email']; ?>">
															<p class="error" id="emailError"></p>
														</div>
														<div class="contact-info">
															<input class="pass" name="oldPassword" type="password" placeholder="Your old password">
															<p class="error" id="oldPasswordError"></p>
														</div>
														<div class="contact-info">
															<input class="pass" name="newPassword" type="password" placeholder="Your new password">
															<p class="error" id="newPasswordError"></p>
														</div>
														<div class="nws-button text-center white text-capitalize">

															<button type="submit" value="Submit">Save changes</button>
														</div>
													</form>

												</div>
											</div>
										</div>
									</div>
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
														<!-- <p>Login to our website, or <span>REGISTER</span></p> -->
													</div>
												</div>

												<!-- Modal body -->
												<div class="modal-body">
													<!-- <div class="facebook-login">
													<a href="#">
														<div class="log-in-icon">
															<i class="fab fa-facebook-f"></i>
														</div>
														<div class="log-in-text text-center">
															Login with Facebook
														</div>
													</a>
												</div> -->
													<div class="alt-text text-center"><a href="#">Your info</a> </div>
													<form class="contact_form" action="#" method="POST" enctype="multipart/form-data">
														<div class="row">
															<div class="col-md-6 ">
																<div class="contact-info">
																	<input class="name" name="fn" type="email" placeholder="first name">
																</div>
															</div>

															<div class="col-md-6">
																<div class="contact-info">
																	<input class="name" name="ln" type="email" placeholder="last name">
																</div>
															</div>
														</div>
														<div class="contact-info">
															<input class="name" name="Email" type="email" placeholder="Your email">
														</div>
														<div class="contact-info">
															<input class="pass" name="name" type="password" placeholder="Your old password">
														</div>
														<div class="contact-info">
															<input class="pass" name="name" type="password" placeholder="Your new password">
														</div>
														<div class="nws-button text-center white text-capitalize">
															<button type="submit" value="Submit">Save changes</button>
														</div>
													</form>
													<!-- <div class="log-in-footer text-center">
													<p>* Denotes mandatory field.</p>
													<p>** At least one telephone number is required.</p>
												</div> -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</nav>

							<!-- <div class="mobile-menu">
								<div class="logo"><a href="index-1.html"><img src="assets/img/logo/logo.png" alt="Logo"></a></div>
								<nav>
									<ul>
										<li><a href="index-1.html">Home</a>
										</li>
										<li><a href="about.html">About</a></li>
										<li><a href="blog.html">Blog</a>
											<ul>
												<li><a href="blog.html">Blog</a></li>
												<li><a href="blog-single.html">Blog sinlge</a></li>
											</ul>
										</li>
										<li><a href="shop.html">Shop</a>
										</li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="#">Pages</a>
											<ul>
												<li><a href="course.html">Course</a></li>
												<li><a href="course-details.html">course sinlge</a></li>
												<li><a href="teacher.html">teacher</a></li>
												<li><a href="teacher-details.html">teacher details</a></li>
												<li><a href="faq.html">FAQ</a></li>
												<li><a href="check-out.html">Check Out</a></li>
											</ul>
										</li>
									</ul>
								</nav>

							</div> -->
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Start of Header section
 		============================================= -->


		<!-- Start of breadcrumb section
		============================================= -->
		<section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
			<div class="blakish-overlay"></div>
			<div class="container">
				<div class="page-breadcrumb-content text-center">
					<div class="page-breadcrumb-title">
						<h2 class="breadcrumb-head black bold"><span>Course</span></h2>
					</div>
					<div class="page-breadcrumb-item ul-li">
						<ul class="breadcrumb text-uppercase black">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">COURSE</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section id="course-details" class="course-details-section">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="affiliate-market-guide mb65">

							<div class="section-title-2 mb20 headline text-left ">
								<h2 class="underline"><span>
										<?php


										foreach ($prof->GetClass($idClass) as $class) {
											echo $class['nom'];
										}
										?>
									</span></h2>
							</div>

							<br>
							<div class="section-title-2 mb20 headline text-left ">
								<h2>
									<?php

									echo $cours['titre']; ?>
								</h2>
							</div>
							<div class="container">
								<div class="section section-1">

									<?php

									echo $cours['description'];
									?>
								</div>
								<div class="section section-1">

									<?php

									echo $cours['contenu'];
									?>
								</div>
								<div>

									<?php $files = $prof->readFilesByIdCours($idCours);
									foreach ($files as $file) {
									?>
										<div class="iframParent" id="<?php echo $file['id'] ?>">
											<iframe src="prof/include/files/<?php echo $file['nom']; ?>" scrolling="no" seamless="seamless"></iframe>


											<?php if ($prof->typeOfFile($file['nom']) == "pdf") { ?>
												<a href="../include/lirePdf.php?name=<?php echo $file['nom']; ?>" class="ouvrirPdf">Open file</a>
											<?php } ?>
										</div>

									<?php } ?>


								</div>
							</div>
							<!-- <button class="prevtab btn btn-outline-info" style="float: left;">Prev</button>
						<button class="nexttab btn btn-outline-info " style="float: right;">Next</button> -->








						</div>
						<h2>comments</h2>
						<!-- //commentaire -->
						<div>

							<?php foreach ($prof->commentaires_sans_parent($idCours) as $comment) {
								require("commentaire.php");
							} ?>

						</div>
						
						<div style="padding: 20px;">
							<form action="prof/include/addComment.php" method="POST">
								<textarea name="comment" id="" cols="60" rows="8" style="width: 100%;background-color: #fafafa;border:none;padding:10px" placeholder="write here"></textarea>
						<input type="hidden" value="<?php echo $idClass?>" name="idClass">
						<input type="hidden" value="<?php echo $idCours?>" name="idCours">
						<div >
						<button style="border: none;margin-top:10px;color: #fff;" class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font ml-auto">ADD COMMENT <i class="fas fa-caret-right"></i></button>
						</div>
						</form>
						</div>
						
						<!-- //finCommetaire -->

					</div>
					<div class="col-md-3">
						<div class="side-bar-widget first-widget">
							<div class="card" style="border: transparent ;background: rgb(241, 243, 245);">
								<div class="card-body">
									<h2 class="widget-title text-capitalize" style="font-size: 25px;">Lastest <span>COMMENTS</span></h2>
									<ul>
										<?php
										foreach ($prof->dernierCommentaires() as $commentaire) {
										?>
											<li><a href="#"><?php echo $commentaire;
															?></a></li>

										<?php }	 ?>

									</ul>


								</div>
							</div>
						</div>

						<div class="side-bar-widget">
							<div class="card" style="border: transparent ;background: rgb(241, 243, 245);">
								<div class="card-body">
									<h2 class="widget-title text-capitalize" style="font-size: 25px;">CALEN<span>DAR.</span></h2>
									<div class="price-range relative-position">
										<div class="calendar calendar-first" id="calendar_first">
											<div class="calendar_header">
												<button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
												<h2></h2>
												<button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
											</div>
											<div class="calendar_weekdays"></div>
											<div class="calendar_content"></div>
										</div>
									</div>
								</div>
							</div>
						</div>



						<div class="side-bar-widget">
							<div class="card" style="border: transparent ;background: rgb(241, 243, 245);">
								<div class="card-body">
									<h2 class="widget-title text-capitalize" style="font-size: 25px;">Upcoming <span>MEETS</span></h2>

									<?php foreach ($prof->upCommingMeet() as $meet) {
									?>
										<div class="card" style="border: transparent ;background: rgb(241, 243, 245);">
											<hr style="margin-top: 0px;">

											<p><i style="margin-right: 20px;" class='far fa-clock'></i><?php echo $meet['datedebut']; ?> </p>
											<div style="position: relative;padding-top: 5px;display:flex;justify-content:space-between;">
												<span>class : <?php $class = $prof->getClassById($meet['idClass']);
																echo $class['nom']; ?> </span>
												<a href="<?php echo $meet['lien']; ?>" style="display: flex; align-items: center;right: 0; top: 0px;border: solid 1px #e1dede; padding: 5px 10px; border-radius :20px;box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
													<i class='fas fa-video' style="margin-right: 20px;"></i>Join meet
												</a>
											</div>
											<div class="row" style="margin-left:1px;margin-top:15px">
												<div style="display: flex; justify-content : space-between; ">
													<i class='far fa-comment-alt' style="margin-right: 20px; margin-top: 10px;"></i>
													<p> <?php echo $meet['description']; ?></p>

												</div>
												<div>
												</div>



											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>





					</div>
				</div>
			</div>
		</section>



		<?php require_once("footerProf.php"); ?>
		<!-- End of footer section
		============================================= -->



		<!-- For Js Library -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/jarallax.js"></script>
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/lightbox.js"></script>
		<script src="assets/js/jquery.meanmenu.js"></script>
		<script src="assets/js/scrollreveal.min.js"></script>
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/waypoints.min.js"></script>
		<script src="assets/js/jquery-ui.js"></script>
		<script src="assets/js/gmap3.min.js"></script>
		<script src="assets/js/switch.js"></script>

		<script src="assets/js/calender.js"></script>
		<script src="assets/js/script.js"></script>
		<script>
			function supprimerComment(id) {
				document.getElementById('idcommentsupprimer').value = id;
			}

			function modifierComment(id, contenu) {
				document.getElementById('idcommentmodifier').value = id;
				document.getElementById('textareaedit').value = contenu;
				console.log(contenu);
			}

			function replyComment(id) {
				document.getElementById('idcommentreply').value = id;
			}
		</script>
		<script src="./prof/js/modifierProfil.js"></script>
		<style>
			.error {
				color: red;
			}
		</style>
	</body>

	</html>
<?php } ?>