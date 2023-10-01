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
		<section id="course-details" class="course-details-section">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="affiliate-market-guide mb65">
							<div class="section-title-2 mb20 headline text-left ">
								<h2 class="underline"><span><?php
															$crudClass = new CRUDClass();
															$class = $crudClass->getClassById($_GET['idClass']);
															echo $class['nom'];
															?></span></h2>
							</div><br>
							<div class="section-title-2 mb20 headline text-left ">
								<h2><?php $crudCours = new CRUDCours();
									$cours = $crudCours->readCoursById($_GET['idCours']);
									echo $cours['titre'];

									?></h2>
							</div>
							<div class="section section 1">
								<?php echo $cours['contenu']; ?>

								<?php $files = $crudCours->readFilesByIdCours($_GET['idCours']);
								foreach ($files as $file) {
									 ?>
										

										<div class="iframParent">
											<iframe src="prof/include/files/<?php echo $file['nom']; ?>" scrolling="no" seamless="seamless"></iframe>


											<?php if ($etudiant->typeOfFile($file['nom']) == "pdf") { ?>
												<a href="../include/lirePdf.php?name=<?php echo $file['nom']; ?>" class="ouvrirPdf">Open file</a>
											<?php } ?>
										</div>
									<?php } 
								
								?>
							</div>

							<!-- <button class="prevtab btn btn-outline-info" style="float: left;">Prev</button>
						<button class="nexttab btn btn-outline-info " style="float: right;">Next</button> -->







						</div>
					</div>
					<!-- <div class="col-md-3" >
					<div class="side-bar-widget first-widget">
					 <div class="card" style="border: transparent ;background: rgb(241, 243, 245);">
						<div class="card-body">
						  <h2 class="widget-title text-capitalize" style="font-size: 25px;">Lastest <span>COMMENTS</span></h2>
						  <ul>
							<li><a href="#">Class name</a></li>
							<li><a href="#">Class name</a></li>
							<li><a href="#">Class name</a></li>
							
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
					   </div>
					 </div>
					</div>

					



				</div> -->
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
	</body>

	</html>
<?php } ?>