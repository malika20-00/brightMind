<?php require_once '../include/autoloadEtudiant.php';
$etudiant = new Etudiant();
if (!isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION['email'])) {
	header("Location:accueil.php");
} else {
?>
	<!doctype html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Courses</title>

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
		

	</head>
	<style>
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

		.content:hover {
			color: #17d0cf;
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
	</style>

	<body>




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
		<?php include('header.php'); ?>

		<!-- Start of Header section
 		============================================= -->


		<!-- Start of breadcrumb section
		============================================= -->

		<!-- Start of Header section
 		============================================= -->


		<!-- Start of breadcrumb section
		============================================= -->
		<section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
			<div class="blakish-overlay"></div>
			<div class="container">
				<div class="page-breadcrumb-content text-center">
					<div class="page-breadcrumb-title">
						<h2 class="breadcrumb-head black bold"><span>Courses</span></h2>
					</div>
					<div class="page-breadcrumb-item ul-li">
						<ul class="breadcrumb text-uppercase black">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Courses</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<?php require_once '../include/autoloadEtudiant.php';
		$etudiant = new Etudiant();
		$crudClass = new CRUDClass();
		$crudCours  = new CRUDCours();
		$class = $crudClass->getClassById($_GET['idClass']);
		$cours  = $crudCours->readCoursById($_GET['idCours']);
		?>
		<section id="course-details" class="course-details-section">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="affiliate-market-guide mb65">
							<div class="section-title-2 mb20 headline text-left ">
								<h2 class="underline"><span><?php echo $class['nom']; ?></span></h2>
							</div><br>
							<div class="section-title-2 mb20 headline text-left ">
								<h2><?php echo $cours['titre']; ?></h2>
							</div>
							<div>
							<p style="margin-bottom: 15px;">	<?php echo $cours['contenu']; ?></p>
								<?php $files = $crudCours->readFilesByIdCours($_GET['idCours']);
								foreach ($files as $file) {
									if ($etudiant->typeOfFile($file['nom']) == "pdf") { ?>
										<div class="iframParent">
											<iframe src="prof/include/files/<?php echo $file['nom']; ?>" scrolling="no" seamless="seamless"></iframe>
											<button class="ouvrirPdf"><a href="../include/lirePdf.php?name=<?php echo $file['nom']; ?>">Open file</a></button>
										</div>
									<?php }  else { ?>
										<div class="iframParent">
										<iframe src="prof/include/files/<?php echo $file['nom']; ?>" scrolling="no" seamless="seamless" ></iframe>
										</div>
							<?php

									}
								}
								?>


							</div>
							<div class="affiliate-market-accordion">
								<div id="accordion" class="panel-group">
									<?php $chapitre =  $crudCours->readChapterByIdCours($cours['id']);
									$i = 0;
									foreach ($chapitre as $chap) {
										$i++;
									?>
										<div class="panel">
											<div class="panel-title" id="heading<?php echo $etudiant->convert_number_to_words($i); ?>">
												<div class="ac-head">

													<button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $etudiant->convert_number_to_words($i); ?>" aria-expanded="true" aria-controls="collapse<?php echo $etudiant->convert_number_to_words($i); ?>">
														<span>01</span> <?php echo strtoupper($chap['titre']); ?>
													</button>

												</div>
											</div>
											<div id="collapse<?php echo $etudiant->convert_number_to_words($i); ?>" class="collapse show" aria-labelledby="heading<?php echo $etudiant->convert_number_to_words($i); ?>" data-parent="#accordion">
												<div class="panel-body">

													<div style="float:left;">
														<a href="student-course-details.php?idClass=<?php echo $class['id'] ?>&idCours=<?php echo $cours['id'] ?>&idChapitre=<?php echo $chap['id'] ?>" class="content"><strong><?php echo strtolower($chap['titre']); ?> </strong></a>
													</div>
													<br>
													<ol>
														<?php $Lecon = $crudCours->readLeconByIdChapitre($chap['id']);
														foreach ($Lecon as $lecon) { ?>
															<li><a href="#"><?php echo $lecon['titre']; ?></a></li>
														<?php } ?>
														<!-- <li><a href="#">Lesson title</a></li>
													<li><a href="#">Quiz</a></li> -->
													</ol>

												</div>
											</div>
										</div>
									<?php } ?>
								
								
								</div>
							</div>







						</div>

						<h2>comments</h2>
						<!-- //commentaire -->
						<?php
						//require_once 'prof/class/Prof.class.php';
						$prof=new CRUDCours();
						$profActuel=$prof->getProfByClass($_GET['idClass']);
						
						
						?>
						<div>

							<?php foreach ($prof->commentaires_sans_parent($_GET['idCours']) as $comment) {
								require("commentaireStudent.php");
							} ?>

						</div>
						
						<div style="padding: 20px;">
							<form action="prof/include/addComment.php" method="POST">
								<textarea name="comment" id="" cols="60" rows="8" style="width: 100%;background-color: #fafafa;border:none;padding:10px" placeholder="write here"></textarea>
						<input type="hidden" value="<?php echo $_GET['idClass'];?>" name="idClass">
						<input type="hidden" value="<?php echo $_GET['idCours']; ?>" name="idCours">
						<input type="hidden"  name="student" value="1">
						<div >
						<button style="border: none;margin-top:10px;color: #fff;" class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font ml-auto">ADD COMMENT <i class="fas fa-caret-right"></i></button>
						</div>
						</form>
						</div>
					</div>
				
					<div class="col-md-3" style="margin-top: 20px">
						<div class="side-bar-widget first-widget">
							<div class="card" style="border: transparent ;background: rgb(241, 243, 245);">
								<div class="card-body">
									<h2 class="widget-title text-capitalize" style="font-size: 25px;">Lastest <span>COMMENTS</span></h2>
									<ul>
										<?php $etudiant = new Etudiant();
										$crudClass = new CRUDClass();
										foreach ($etudiant->dernierCommentaires() as $commentaire) {
										?>
											<li><a href="#"><?php echo $commentaire; ?></a></li>

										<?php } ?>

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

									<?php foreach ($etudiant->upCommingMeets() as $meet) {
									?>
										<div class="card" style="border: transparent ;background: rgb(241, 243, 245);">
											<hr style="margin-top: 0px;">

											<p><i style="margin-right: 20px;" class='far fa-clock'></i><?php echo $meet['datedebut']; ?> </p>
											<div style="position: relative;padding-top: 5px;display:flex;justify-content:space-between;">
												<span>class : <?php $calss = $crudClass->getClassById($meet['idClass']);
																echo $class['nom']; ?> </span>
												<a href="<?php echo $meet['lien']; ?>" style="display: flex;
                                 align-items: center;
									right: 0; top: 0px;border: solid 1px #e1dede; padding: 5px 10px; border-radius :20px;box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;"><i class='fas fa-video' style="margin-right: 20px;"></i><span>Join meet</span>
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
								<input type="hidden" id="idclass" name="idClass" value="<?php echo  $_GET['idClass']; ?>">
								<input type="hidden" id="idcours" name="idCours" value="<?php echo $_GET['idCours']; ?>">
								<input type="hidden"  name="student" value="1">
							</div>
							<button class="btn btn-primary" data-role="button" data-inline="true">Save changes</a>
						</form>

					</div>
				</div>
			</div>
		</div>

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
									<input type="hidden" id="idclass" name="idClass" value="<?php echo $_GET['idClass']; ?>">
									<input type="hidden" id="idcours" name="idCours" value="<?php echo $_GET['idCours']; ?>">
									<input type="hidden"  name="student" value="1">
									<a href="student-course.php?idClass=<?php echo $_GET['idClass']; ?>&idCours=<?php echo $_GET['idCours']; ?>" class="btn btn-secondary" data-role="button" data-inline="true" data-theme="b">Cancel</a>
									<button class="btn btn-primary" data-role="button" data-inline="true">Delete</a>
								</form>


							</div>
						</div>
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
								<input type="hidden" id="idclass" name="idClass" value="<?php echo $_GET['idClass']; ?>">
								<input type="hidden" id="idcours" name="idCours" value="<?php echo $_GET['idCours']; ?>">
								<input type="hidden"  name="student" value="1">
							</div>
							<button class="btn btn-primary" data-role="button" data-inline="true">Reply Comment</a>
						</form>

					</div>
				</div>
			</div>
		</div>

		<?php include('footer.php'); ?>

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
		<script src="http://maps.google.com/maps/api/js?key=AIzaSyC61_QVqt9LAhwFdlQmsNwi5aUJy9B2SyA"></script>
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

	</body>

	</html>
<?php } ?>