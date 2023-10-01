<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Contact Page</title>


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

<body>
	<section id="contact-page" class="contact-page-section">
		<div class="container">
			<div class="section-title mb45 headline text-center">
				<span class="subtitle text-uppercase">SEND US A MESSAGE</span>
				<h2>Keep<span> In Touch.</span></h2>
			</div>
			<div class="social-contact">
				<div class="category-icon-title text-center">
					<div class="category-icon">
						<i class="text-gradiant fab fa-facebook-f"></i>
					</div>
					<div class="category-title">
						<h4>Facebbok</h4>
					</div>
				</div>
				<div class="category-icon-title text-center">
					<div class="category-icon">
						<i class="text-gradiant fab fa-twitter"></i>
					</div>
					<div class="category-title">
						<h4>Twitter</h4>
					</div>
				</div>
				<div class="category-icon-title text-center">
					<div class="category-icon">
						<i class="text-gradiant fab fa-google-plus-g"></i>
					</div>
					<div class="category-title">
						<h4>Google +</h4>
					</div>
				</div>
				<div class="category-icon-title text-center">
					<div class="category-icon">
						<i class="text-gradiant fab fa-behance"></i>
					</div>
					<div class="category-title">
						<h4>Behance</h4>
					</div>
				</div>
				<div class="category-icon-title text-center">
					<div class="category-icon">
						<i class="text-gradiant fab fa-instagram"></i>
					</div>
					<div class="category-title">
						<h4>Instagram</h4>
					</div>
				</div>
				<div class="category-icon-title text-center">
					<div class="category-icon">
						<i class="text-gradiant fab fa-dribbble"></i>
					</div>
					<div class="category-title">
						<h4>Dribble</h4>
					</div>
				</div>
				<div class="category-icon-title text-center">
					<div class="category-icon">
						<i class="text-gradiant fab fa-deviantart"></i>
					</div>
					<div class="category-title">
						<h4>Devianart</h4>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of contact section
		============================================= -->

	<!-- Start of contact area form
		============================================= -->
	<section id="contact-form" class="contact-form-area_3 contact-page-version">
		<div class="container">
			<div class="section-title mb45 headline text-center">
				<span class="subtitle text-uppercase">Send us a message</span>
				<h2>Send Us A<span> Message.</span></h2>
			</div>

			<div class="contact_third_form">
				<form class="contact_form" action="prof/include/contact.php" method="POST" enctype="multipart/form-data" id="contacterNous_form">
					<div class="row">
						<div class="col-md-4">
							<div class="contact-info">
								<input class="name" name="nom" type="text" placeholder="Your Name.">
								<p class="error" id="nomError"></p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-info">
								<input class="email" name="email" type="email" placeholder="Your Email">
								<p class="error" id="emailError"></p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-info">
								<input class="name" name="phone" type="text" placeholder="Phone Number">

							</div>
						</div>
					</div>
					<textarea name="message" placeholder="Message."></textarea>
					<p class="error" id="messageError"></p>
					<div class="nws-button text-center  gradient-bg text-uppercase">
						<button type="submit" value="Submit">SEND EMAIL <i class="fas fa-caret-right"></i></button>
					</div>
				</form>
			</div>
		</div>
	</section>
	<style>
		.error {
			color: red;
		}
	</style>
	<!-- <script src="prof/js/contact.js"></script> -->
</body>

</html>