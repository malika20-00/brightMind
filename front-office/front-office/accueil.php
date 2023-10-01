
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Home Page 1</title>

	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.css">
	<link rel="stylesheet" href="assets/css/flaticon.css">
	<link rel="stylesheet" type="text/css" href="assets/css/meanmenu.css?v=<?php echo time();?>">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/video.min.css">
	<link rel="stylesheet" href="assets/css/lightbox.css">
	<link rel="stylesheet" href="assets/css/progess.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="assets/css/responsive.css?v=<?php echo time();?>">
	<!-- sweet alert -->
	<link rel="stylesheet" href="sweetalert2.min.css">
	<link rel="stylesheet" href="assets/css/colors/switch.css">
	<link href="assets/css/colors/color-2.css" rel="alternate stylesheet" type="text/css" title="color-2">
	<link href="assets/css/colors/color-3.css" rel="alternate stylesheet" type="text/css" title="color-3">
	<link href="assets/css/colors/color-4.css" rel="alternate stylesheet" type="text/css" title="color-4">
	<link href="assets/css/colors/color-5.css" rel="alternate stylesheet" type="text/css" title="color-5">
	<link href="assets/css/colors/color-6.css" rel="alternate stylesheet" type="text/css" title="color-6">
	<link href="assets/css/colors/color-7.css" rel="alternate stylesheet" type="text/css" title="color-7">
	<link href="assets/css/colors/color-8.css" rel="alternate stylesheet" type="text/css" title="color-8">
	<link href="assets/css/colors/color-9.css" rel="alternate stylesheet" type="text/css" title="color-9">
		<!-- sweet alert -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="sweetalert2.all.min.js"></script>


</head>

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
	<header>
		<div id="main-menu" class="main-menu-container">
			<div class="main-menu">
				<div class="container">
					<div class="navbar-default">
						<div class="navbar-header float-left">
							<a class="navbar-brand text-uppercase" href="#"><img width="100" height="100" src="https://bright-minds.ma/wp-content/uploads/2019/05/logo1-w.png" class="attachment-full size-full" alt="bright minds cool math" loading="lazy" srcset="https://bright-minds.ma/wp-content/uploads/2019/05/logo1-w.png 705w, https://bright-minds.ma/wp-content/uploads/2019/05/logo1-w-300x181.png 300w, https://bright-minds.ma/wp-content/uploads/2019/05/logo1-w-600x363.png 600w" sizes="(max-width: 705px) 100vw, 705px"></a>
						</div>
						


						<div class="log-in float-right">
							<a data-toggle="modal" data-target="#myModal" href="#">log in</a>
							<a data-toggle="modal" data-target="#myModalR" href="#">Register</a>

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
												<h2> <span>Login</span> Your Account.</h2>
												<p>Login to our website, or <span style="cursor:pointer; text-decoration: underline;" id="register">REGISTER</span></p>
											</div>
										</div>

										<!-- Modal body -->
										<div class="modal-body">

											<form id="sign-form" class="contact_form" action="#" method="POST" enctype="multipart/form-data">
												<div class="contact-info">
													<input class="name" type="email" name="email" value="<?php if (isset($_COOKIE["emailBright"])) echo $_COOKIE["emailBright"]; ?>" placeholder="Your@email.com">
													<p id="emailError"></p>
												</div>
												<div class="contact-info">
													<input class="pass" type="password" name="pw" value="<?php if (isset($_COOKIE["passwordBright"])) {
																												echo $_COOKIE['passwordBright'];
																											} ?>" placeholder="Your password">
													<p id="pwError"></p>

												</div>
												<div class="nws-button text-center white text-capitalize">
													<button type="submit" id="connecte">LOg in Now</button>
												</div>

												<div class="log-in-footer " style="margin-top: 10px;">
													<a href="forgotPassword.php" style="float:right;cursor:pointer; text-decoration: underline;font-weight:500;text-transform:none;padding: 0px;color:#14cbd4;">Forget password</a>
													<div>
														<input name="souvenir" id="souvenir" type="checkbox" style="height: 13px;width:13px;">
														<label for="souvenir">Remember Me</label>
														<button id="close-modal" style="display: none;" data-dismiss="modal"></button>

													</div>

												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>


						<button id="register-button" style="display:none" data-toggle="modal" data-target="#myModalR"></button>
						<div class="modal fade" id="myModalR" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">

									<!-- Modal Header -->
									<div class="modal-header backgroud-style">
										<div class="gradient-bg"></div>
										<div class="popup-logo">
											<img src="assets/img/logo/p-logo.jpg" alt="">
										</div>
										<div class="popup-text text-center">
											<h2> <span>Create</span> Your Account.</h2>
										</div>
									</div>

									<!-- Modal body -->
									<div class="modal-body">

										<form id="sign-up-form" class="contact_form" action="#" method="POST" enctype="multipart/form-data">
											<div class="contact-info">
												<input class="name" type="text" id="prenom" name="prenom" placeholder="First Name">
												<p class="error" id="prenomErrorRR"></p>
											</div>
											<div class="contact-info">
												<input class="name" type="text" id="nom" name="nom" placeholder="Last Name ">
												<p class="error" id="nomErrorRR"></p>

											</div>
											<div class="contact-info">
												<input class="name" id="email" name="email" type="email" placeholder="Your@email.com">
												<p class="error" id="emailErrorRR"></p>

											</div>
											<div class="contact-info">
												<input class="name" id="tel" name="tel" type="text" placeholder="06....">
												<p class="error" id="telErrorRR"></p>

											</div>
											<div class="contact-info">
												<input class="name" list="navigateurs" name="niveauScolaire" id="niveau" placeholder="Level School">
												<datalist id="navigateurs">
													<!-- <option value="first year of primary school">first year of primary school</option>
													<option value="second year of primary school">
													<option value="third year of primary school">
													<option value="fourth year of primary school">
													<option value="fifth year of primary school">
													<option value="sixth year of primary school">
													<option value="first year of middle school">
													<option value="second year of middle school">
													<option value="third year of middle school"> -->
													<option value="4éme Année collège">
													<option value="Tronc Commun">
													<option value="1er Année Baccalaureat">
													<option value="2ème Année Baccalaureat">
													<option value="university">
													
												</datalist>
												<p class="error" id="niveauErrorRR"></p>
											</div>
											<div class="contact-info">
												<input class="pass" id="pw" name="pw" type="password" placeholder="Your password">
												<p class="error" id="pwErrorRR"></p>

											</div>
											<div class="contact-info">
												<input class="name" type="password" id="pwVerif" name="pwVerif" placeholder="Confirm Your Password">
												<p class="error" id="pwVerifErrorRR"></p>

											</div>
											<div class="nws-button text-center white text-capitalize">
												<button id="inscrir" type="submit" value="Submit">Register</button>
											</div>
										</form>
										<p id="errorRR"></p>

									</div>
								</div>
							</div>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<nav class="navbar-menu float-right">
							<div class="nav-menu ul-li">
								<ul>
									<li class=" ul-li-block">
										<a href="#why-choose-us">Why Bright Minds</a>
									</li>
									<li><a href="#about-us">About Us</a></li>
									<li><a href="#contact-form">Contact Us</a></li>
									<li ><?php require "beTeacher.php"; ?></li>


								</ul>
							</div>
						</nav>
						<div class="mobile-menu">
								<div class="logo"><a href="index-1.html"><img src="assets/img/logo/logo.png" alt="Logo"></a></div>
								<nav>
									<ul>
										<li><a href="index-1.html">Home</a>
										</li>
										<li><a href="#about-us">About</a></li>
										<li>
										<a href="#why-choose-us">Why Bright Minds</a>
										</li>
										
										

									
									</ul>
								</nav>

							</div>


					</div>
				</div>
			</div>
		</div>
	</header>
	
	<!-- Start of Header section
	============================================= -->


	<!-- Start of slider section
		============================================= -->
	<section id="slide" class="slider-section">
		<div id="slider-item" class="slider-item-details">
			<div class="slider-area slider-bg-1 relative-position">
				<div class="slider-text">
					<div class="section-title mb20 headline text-center ">
						<div class="layer-1-1">
							<span class="subtitle text-uppercase">START INVESTING IN YOU</span>
						</div>
						<div class="layer-1-3">
							<h2><span>Start </span> Investing <br> In <span>You</span></h2>
						</div>
					</div>
					<div class="layer-1-4">
						<div id="course-btn">
							<div class="genius-btn  text-center text-uppercase ul-li-block bold-font">
								<a href="#" data-toggle="modal" data-target="#myModal">Get Started <i class="fas fa-caret-right"></i></a>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="slider-area slider-bg-2 relative-position">
				<div class="slider-text">
					<div class="section-title mb20 headline text-center ">
						<div class="layer-1-1">
							<span class="subtitle text-uppercase">START INVESTING IN YOU</span>
						</div>
						<div class="layer-1-2">
							<h2 class="secoud-title"> Change Your <span>Life By Learning.</span></h2>
						</div>
					</div>
					<div class="layer-1-3">

						<div class="layer-1-4">
							<div class="slider-course-category ul-li text-center">
								<span class="float-left">COURSES :</span>
								<ul>
									<li>University</li>
									<li>Height school</li>
									<li>Middle school</li>
									<li>Primary school</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="slider-area slider-bg-3 relative-position">
				<div class="slider-text">

					<div class="section-title mb20 headline text-center ">
						<div class="layer-1-3">
							<h2 class="third-slide"> Develop Your Low Level <br> <span> in basic subjects.</span></h2>
						</div>
					</div>
					<div class="layer-1-4">
						<div class="about-btn text-center">
							<div class="genius-btn text-center text-uppercase ul-li-block bold-font">
								<a href="#about-us">About Us <i class="fas fa-caret-right"></i></a>
							</div>
							<div class="genius-btn text-center text-uppercase ul-li-block bold-font">
								<a href="#contact-form">contact us <i class="fas fa-caret-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="slider-area slider-bg-4 relative-position">
				<div class="slider-text">
					<div class="section-title mb20 headline text-center ">
						<span class="subtitle text-uppercase">START INVESTING IN YOU</span>
						<h2 class=""><span>Inventive</span> Solution <br> for <span>Education</span></h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of slider section
		============================================= -->



	<!-- Start of Search Courses
		============================================= -->
	
	<!-- End of Search Courses
		============================================= -->


	<!-- Start popular course
		============================================= -->

	<!-- End popular course
		============================================= -->


	<!-- Start of about us section
		============================================= -->
	<section id="about-us" class="about-us-section">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="about-resigter-form backgroud-style relative-position">
						<div class="register-content">
							<div class="register-fomr-title text-center">
								<h3 class="bold-font"><span>Get a</span> Free Registration.</h3>
								<p>More Than 80 Online Available Courses</p>
							</div>
							<div class="register-form-area">
								<form class="contact_form" id="form-register" enctype="multipart/form-data">
									<div class="contact-info">
										<input class="name" name="prenom" type="text" placeholder="Your First Name">
										<p class="error" id="prenomErrorR"></p>

									</div>
									<div class="contact-info">
										<input class="nbm" name="nom" type="number" placeholder="Your Last Name">
										<p class="error" id="nomErrorR"></p>

									</div>
									<div class="contact-info">
										<input class="email" name="email" type="email" placeholder="Email Address.">
										<p class="error" id="emailErrorR"></p>

									</div>
									<input list="navigateurs" name="niveauScolaire" id="niveau" placeholder="Level School">
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
									<p class="error" id="niveauErrorR"></p>
									<div class="contact-info">
										<input type="text" name="tel" placeholder="Your Number Phone">
										<p class="error" id="telErrorR"></p>

									</div>
									<div class="contact-info">
										<input type="password" id="pw" name="pw" placeholder="Your Passsword">
										<p class="error" id="pwErrorR"></p>

									</div>
									<div class="contact-info">
										<input type="password" id="pwVerif" name="pwVerif" placeholder="Password Confirmation">

										<p class="error" id="pwVerifErrorR"></p>

									</div>
									<div class="nws-button text-uppercase text-center white text-capitalize">
										<button id="inscrir" type="submit" value="Submit">REGISTER</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="bg-mockup">
						<img src="assets/img/about/phoneee.jpg" alt="" style="width:400px;height:845px;">
					</div>
				</div>
				<!-- /form -->

				<div class="col-md-7">
					<div class="about-us-text">
						<div class="section-title relative-position mb20 headline text-left ">
							<span class="subtitle ml42 text-uppercase">SORT ABOUT US</span>
							<h2>We are <span>Bright Minds</span>
								work since 2021.</h2>
							<p>Bright Minds help people achieve their goals and dreams. This allows participants everywhere to benefit from the best education in Morocco by developing your capabilities in the various fields</p>
						</div>
						<div class="about-content-text">
							<p class="">Our founder’s vision that anyone with an opportunity offers access to learning. that’s why he decided to set up this platform to help these Teachers: trainers are happy to share their knowledge and to help the participants. transform lives : Although talent is universal, learning opportunities are not the same everywhere.</p>
							<div class="about-list mb65 ul-li-block ">
								<ul>
									<li>Acquire in-demand skills through more than 48 courses</li>
									<li>Choose courses with experienced teachers</li>
									<li>Learn at your own pace and enjoy unlimited access to our website</li>
								</ul>
							</div>
							<div class="about-btn ">
								<div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
									<a href="#about-us">About Us <i class="fas fa-caret-right"></i></a>
								</div>
								<div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
									<a href="#contact-form">contact us <i class="fas fa-caret-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of about us section
		============================================= -->


	<!-- Start of why choose us section
		============================================= -->
	<section id="why-choose-us" class="why-choose-us-section">
		<div class="jarallax  backgroud-style">
			<div class="container">
				<div class="section-title mb20 headline text-center ">
					<span class="subtitle text-uppercase">BRIGHT MINDS ADVANTAGES</span>
					<h2>Reason <span>Why Choose Bright Minds.</span></h2>
				</div>
				<div id="service-slide-item" class="service-slide">
					<div class="service-text-icon ">
						<div class="service-icon float-left">
							<i class="text-gradiant flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i>
						</div>
						<div class="service-text">
							<h3 class="bold-font">The Power Of Education.</h3>
							<p>Education is the most empowering force in the world. It creates knowledge, builds confidence, and breaks down barriers to opportunity.</p>
						</div>
					</div>
					<div class="service-text-icon ">
						<div class="service-icon float-left">
							<i class="text-gradiant flaticon-clipboard-with-pencil"></i>
						</div>
						<div class="service-text">
							<h3 class="bold-font">Best Online Education.</h3>
							<p>Bright mind is one of the best personal growth and
								transformation platforms. Its goal is to help students succeed
								at work in a short period of time.</p>
						</div>
					</div>
					<div class="service-text-icon ">
						<div class="service-icon float-left">
							<i class="text-gradiant flaticon-list"></i>
						</div>
						<div class="service-text">
							<h3 class="bold-font">Education For All Student.</h3>
							<p>The courses are designed for both children (aged 10+) and adults. Their goal is to make learning fun, engaging, and interacting.</p>
						</div>
					</div>
					<div class="service-text-icon ">
						<div class="service-icon float-left">
							<i class="text-gradiant flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i>
						</div>
						<div class="service-text">
							<h3 class="bold-font">As a Student in Morocco.</h3>
							<p>You will find here everything you need to pass your exams. Here you will find the courses exercises and exams of the Lycée in Morocco.</p>
						</div>
					</div>
					<div class="service-text-icon">
						<div class="service-icon float-left">
							<i class="text-gradiant flaticon-clipboard-with-pencil"></i>
						</div>
						<div class="service-text">
							<h3 class="bold-font">Tronc Commun.</h3>
							<p>Designation given to the first year of secondary school because it is the year of initiation to the chosen course after successfully completing the 3rd year of his studies.</p>
						</div>
					</div>
					<div class="service-text-icon">
						<div class="service-icon float-left">
							<i class="text-gradiant flaticon-list"></i>
						</div>
						<div class="service-text">
							<h3 class="bold-font">1st Year Baccalaureat.</h3>
							<p>If you are in you absolutely must prepare well for regional exams, we strongly recommend you to register to receive all our news on the preparation for regional exams.</p>
						</div>
					</div>
					<div class="service-text-icon">
						<div class="service-icon float-left">
							<i class="text-gradiant flaticon-maths-class-materials-cross-of-a-pencil-and-a-ruler"></i>
						</div>
						<div class="service-text">
							<h3 class="bold-font">2nd year of baccalaureat.</h3>
							<p>The bright-minds.ma website helps high school and bachelor’s students pass their exams in the best possible form.</p>
						</div>
					</div>
					<div class="service-text-icon">
						<div class="service-icon float-left">
							<i class="text-gradiant flaticon-clipboard-with-pencil"></i>
						</div>
						<div class="service-text">
							<h3 class="bold-font">Develop new skills .</h3>
							<p>Bright minds website helps you to find classes that are designed for real life..</p>
						</div>
					</div>
					<div class="service-text-icon">
						<div class="service-icon float-left">
							<i class="text-gradiant flaticon-list"></i>
						</div>
						<div class="service-text">
							<h3 class="bold-font">Achieve your goals.</h3>
							<p>Bright minds provides high-quality teaching and learning material that is available in easy accessible format.</p>
						</div>
					</div>
				</div>
				<!-- /service-slide -->
				<div class="testimonial-slide">
					<div class="section-title-2 mb65 headline text-left ">
						<h2>Students <span>Testimonial.</span></h2>
					</div>

					<div id="testimonial-slide-item" class="testimonial-slide-area">
						<div class="student-qoute ">
							<p>“On 15% progress but I'm loving the process.
								I had been self-teaching and having this course sharpens
								my knowledge. <b>Very precise and understandable instructor.
									I never skipped topic </b> as each topic can makes me relearn
								and unlearn some learnings I have before.”</p>
							<div class="student-name-designation">
								<span class="st-name bold-font">Fatima Nahari </span>
								<span class="st-designation">Height School Student</span>
							</div>
						</div>



						<div class="student-qoute ">
							<p>“I have always wanted to know how websites, and apps work and<b>
									I am finally getting all the answers I looked for.</b>
								I have always wanted to have hands on knowledge on height
								school and I have used various means like Youtube but now
								I finally understand all the things fome great teachers. Thank you all so much!!”</p>
							<div class="student-name-designation">
								<span class="st-name bold-font">Ilham Abchi </span>
								<span class="st-designation">Height School Student</span>
							</div>
						</div>
						<div class="student-qoute ">
							<p>“IIII LOOOOOVE THIS COURSE ,<b> So great teachers.

									Learned more in two month than 1 year at university seriously.</b> They make everything really fun as well.

								Keep it up.”</p>
							<div class="student-name-designation">
								<span class="st-name bold-font">Mohammed Amrani </span>
								<span class="st-designation">University Student</span>
							</div>
						</div>
						<div class="student-qoute">
							<p>“Let me tell you the exactly how is this course !<b> if you are searching the best
									courses then you are in the right place</b>. I have already see
								so many courses from other web sites this one is my favorite web site among them.”</p>
							<div class="student-name-designation">
								<span class="st-name bold-font">Yassine El Houssni </span>
								<span class="st-designation">Height School Student</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of why choose us section
		============================================= -->


	<!-- Start latest section
		============================================= -->

	<!-- End latest section
		============================================= -->


	<!-- Start of sponsor section
		============================================= -->

	<!-- End of sponsor section
		============================================= -->


	<!-- Start of best course
		============================================= -->

	<!-- End of best course
		============================================= -->

	<!-- Start of course teacher
		============================================= -->

	<!-- End of course teacher
		============================================= -->



	<!-- Start of best product section
		============================================= -->

	<!-- End  of best product section
		============================================= -->


	<!-- Start FAQ section
		============================================= -->
	<section id="faq" class="faq-section">
		<div class="container">
			<div class="section-title mb45 headline text-center ">
				<span class="subtitle text-uppercase">BRIGHT MINDS FAQ</span>
				<h2>Frequently<span> Ask & Questions</span></h2>
			</div>
			<div class="faq-tab">
				<div class="faq-tab-ques ul-li">
					<div class="tab-button text-center mb65 ">
						<ul class="product-tab">
							<li class="active" rel="tab1">GENERAL </li>
							<li rel="tab2"> COURSES </li>
							<li rel="tab3"> TEACHERS </li>

						</ul>
					</div>
					<!-- /tab-head -->

					<!-- tab content -->
					<div class="tab-container">

						<!-- 1st tab -->
						<div id="tab1" class="tab-content-1 pt35">
							<div class="row">
								<div class="col-md-6">

									<div class="ques-ans mb45 headline ">
										<div class="service-text-icon">
											<div class="service-icon float-left">
												<i class="text-gradiant flaticon-clipboard-with-pencil"></i>
											</div>
											<div class="service-text">
												<h3> What is Bright Minds?</h3>
												<p>Our founder’s vision that anyone with an opportunity offers access to learning. that’s why he decided to set up this platform to help these Teachers: trainers are happy to share their knowledge.</p>
											</div>
										</div>
									</div>
									<div class="ques-ans mb45 headline ">
										<div class="service-text-icon">
											<div class="service-icon float-left">
												<i class="text-gradiant flaticon-clipboard-with-pencil"></i>
											</div>
											<div class="service-text">
												<h3> How to Paid courses in Brigth Minds?</h3>
												<p>The only thing that you have to do is to subscribe, and go to iris center to be a student in there, then you will be affected to a class where you will find all of your courses.</p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="ques-ans mb45 headline " style="margin-bottom: 0px;">
										<div class="service-text-icon">
											<div class="service-icon float-left">
												<i class="text-gradiant flaticon-clipboard-with-pencil"></i>
											</div>
											<div class="service-text">
												<h3> How to learn from Bright Minds?</h3>
												<p>To learn in this web site, we have free
													courses which are available for every
													one, hwo want to learn and Develop their
													skills, and paid courses that are made for
													student who desire to have supervising.</p>
											</div>
										</div>
									</div>
									<div class="ques-ans mb45 headline" style="margin-bottom: 0px;text-align:center;">
										<img src="assets/img/teacher/faq.svg" style="max-height: 150px; margin: 0 auto;">
									</div>
								</div>



							</div>
						</div>
						<!-- #tab1 -->

						<div id="tab2" class="tab-content-1 pt35">
							<div class="row">

								<div class="col-md-6">
									<div class="ques-ans mb45 headline ">
										<div class="service-text-icon">
											<div class="service-icon float-left">
												<i class="text-gradiant flaticon-clipboard-with-pencil"></i>
											</div>
											<div class="service-text">
												<h3> What is Bright Minds Courses?</h3>
												<p>Bright Minds Courses are made for all student, in every level as well, they help student to succeed in their study, and pass their exams successfully, especially student who have national exam and regional as well.</p>
											</div>
										</div>
									</div>
										<div class="ques-ans mb45 headline ">
											<div class="service-text-icon">
												<div class="service-icon float-left">
													<i class="text-gradiant flaticon-clipboard-with-pencil"></i>
												</div>
												<div class="service-text">
													<h3> What are the Categories of Courses?</h3>
													<p>Courses are divided into levels and subjects, we have all levels like, primary school, middle school, height school and university as well, in all subjects like maths, physics, frensh, english ...</p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
									<div class="ques-ans mb45 headline " style="margin-bottom: 0px;">
										<div class="service-text-icon">
											<div class="service-icon float-left">
												<i class="text-gradiant flaticon-clipboard-with-pencil"></i>
											</div>
											<div class="service-text">
											<h3> How to Register or Make An Account in Bright Minds?</h3>
											<p>In one click you can have account or register in Brigth Minds web site, go the top of the page click register, add your information as well as your number phone, then click in register button, congratulation now you have an account.</p>

											</div>
										</div>
									</div>
									<div class="ques-ans mb45 headline" style="margin-bottom: 0px;text-align:center;">
										<img src="assets/img/teacher/faq.svg" style="max-height: 150px; margin: 0 auto;">
									</div>
								</div>
									
								</div>
							</div>
							<!-- #tab2 -->

							<div id="tab3" class="tab-content-1 pt35">
								<div class="row">
									<div class="col-md-6">
										<div class="ques-ans mb45 headline">
											<div class="service-text-icon">
												<div class="service-icon float-left">
													<i class="text-gradiant flaticon-clipboard-with-pencil"></i>
												</div>
												<div class="service-text">
													<h3> Who are Bright Minds Teachers?</h3>
													<p>Teachers of bright minds are graduated from great schools, they are so competent and qualified, they are good formed in teaching, they have at least 10 years of experience.</p>
												</div>
											</div>
										</div>

										<div class="ques-ans mb45 headline">
											<div class="service-text-icon">
												<div class="service-icon float-left">
													<i class="text-gradiant flaticon-clipboard-with-pencil"></i>
												</div>
												<div class="service-text">
													<h3> Can We Get in Touch with Teachers?</h3>
													<p>Bright Minds allows you to get in touch with teachers, by writing comments in courses and lessons, where they will respond you immediately, and by attending to the on line meetings.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
									<div class="ques-ans mb45 headline " style="margin-bottom: 0px;">
										<div class="service-text-icon">
											<div class="service-icon float-left">
												<i class="text-gradiant flaticon-clipboard-with-pencil"></i>
											</div>
											<div class="service-text">
											<h3> Can I be a teacher in Bright Minds?</h3>
											<p>Of course you can, to be a teacher in our web site , you have just to click in be a teacher button in the header of the web site, then you have to fill your information in the form, without forgeting your resume, and our Bright minds will contact you as soon as possible.</p>

											</div>
										</div>
									</div>
									<div class="ques-ans mb45 headline" style="margin-bottom: 0px;text-align:center;">
										<img src="assets/img/teacher/faq.svg" style="max-height: 150px; margin: 0 auto;">
									</div>
								</div>
									
								</div>
							</div>
							<!-- #tab3 -->

						</div>

					</div>
				</div>
			</div>
	</section>
	<!-- End FAQ section
		============================================= -->
		<section id="search-course-2" class="search-course-section home-third-course-search backgroud-style">
			<div class="container">
				<div class="section-title mb20 headline text-center">
					<span class="subtitle text-uppercase">LEARN NEW SKILLS</span>
					<h2><span>About</span> Bright Minds.</h2>
				</div>
			

				<div class="search-app">
					<div class="row">
						<div class="col-md-6">
							<div class="app-mock-up">
								<img src="assets/img/about/values.jpg" alt="" style="height:471px;">
							</div>
						</div>

						<div class="col-md-6">
							<div class="about-us-text search-app-content">
								<div class="section-title relative-position mb20 headline text-left">
									<h2><span>Goals</span> Of Bright Minds And <span>Values.</span></h2>
								</div>

								<div class="app-details-content">
									<p>Bright Minds help people achieve their goals and dreams.</p>

									<div class="about-list mb30 ul-li-block">
										<ul>
											<li>Acquire in-demand skills through more than 48 courses</li>
											<li>Choose courses with experienced teachers</li>
											<li>Learn at your own pace and enjoy unlimited access to our website</li>
										</ul>
									</div>
									<div class="about-btn">
										<div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
											<a data-toggle="modal" data-target="#myModalR" href="#">REGISTER NOW <i class="fas fa-caret-right"></i></a>
										</div>

										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<!-- Start Course category
		============================================= -->
	<section id="course-category" class="course-category-section">
		<div class="container">
			<div class="section-title mb45 headline text-center ">
				<span class="subtitle text-uppercase">COURSES CATEGORIES</span>
				<h2>Browse Courses<span> By Category.</span></h2>
			</div>
			<div class="category-item">
				<div class="row">
					<div class="col-md-3">
						<div class="category-icon-title text-center ">
							<div class="category-icon">
								<i class="text-gradiant flaticon-technology"></i>
							</div>
							<div class="category-title">
								<h4>Primary School</h4>
							</div>
						</div>
					</div>
					<!-- /category -->

					<div class="col-md-3">
						<div class="category-icon-title text-center ">
							<div class="category-icon">
								<i class="text-gradiant flaticon-app-store"></i>
							</div>
							<div class="category-title">
								<h4>Middle School</h4>
							</div>
						</div>
					</div>
					<!-- /category -->

					<div class="col-md-3">
						<div class="category-icon-title text-center ">
							<div class="category-icon">
								<i class="text-gradiant flaticon-artist-tools"></i>
							</div>
							<div class="category-title">
								<h4>Height School</h4>
							</div>
						</div>
					</div>
					<!-- /category -->

					<div class="col-md-3">
						<div class="category-icon-title text-center ">
							<div class="category-icon">
								<i class="text-gradiant flaticon-business"></i>
							</div>
							<div class="category-title">
								<h4>University</h4>
							</div>
						</div>
					</div>
					<!-- /category -->

					<div class="col-md-3">
						<div class="category-icon-title text-center ">
							<div class="category-icon">
								<i class="text-gradiant flaticon-dna"></i>
							</div>
							<div class="category-title">
								<h4>Science</h4>
							</div>
						</div>
					</div>
					<!-- /category -->

					<div class="col-md-3">
						<div class="category-icon-title text-center ">
							<div class="category-icon">
								<i class="text-gradiant flaticon-cogwheel"></i>
							</div>
							<div class="category-title">
								<h4>Languages</h4>
							</div>
						</div>
					</div>
					<!-- /category -->

					<div class="col-md-3">
						<div class="category-icon-title text-center ">
							<div class="category-icon">
								<i class="text-gradiant flaticon-technology-1"></i>
							</div>
							<div class="category-title">
								<h4>Literature</h4>
							</div>
						</div>
					</div>
					<!-- /category -->

					<div class="col-md-3">
						<div class="category-icon-title text-center ">
							<div class="category-icon">
								<i class="text-gradiant flaticon-technology-2"></i>
							</div>
							<div class="category-title">
								<h4>Economics</h4>
							</div>
						</div>
					</div>
					<!-- /category -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Course category
		============================================= -->


	<!-- Start of contact area
		============================================= -->
	<section id="contact-area" class="contact-area-section backgroud-style">
		<div class="container">
			<div class="contact-area-content">
				<div class="row">
					<div class="col-md-6">
						<div class="contact-left-content ">
							<div class="section-title  mb45 headline text-left">
								<span class="subtitle ml42  text-uppercase">CONTACT US</span>
								<h2><span>Get in Touch</span></h2>
								<p>
								learning opportunities are not the same everywhere. With access to online training and learning resources, everyone can acquire skills and make a significant difference in their lives.								</p>
							</div>

							<div class="contact-address">
								<div class="contact-address-details">
									<div class="address-icon relative-position text-center float-left">
										<i class="fas fa-map-marker-alt"></i>
									</div>
									<div class="address-details ul-li-block">
										<ul>
											<li><span>Primary: </span>Les iris,Oujda,Maroc</li>
											<li><span>Our Location </span></li>

										</ul>
									</div>
								</div>

								<div class="contact-address-details">
									<div class="address-icon relative-position text-center float-left">
										<i class="fas fa-phone"></i>
									</div>
									<div class="address-details ul-li-block">
										<ul>
											<li><span>Primary: </span> (+212) 676-925763</li>
											<li><span>Mobile</span></li>

										</ul>
									</div>
								</div>

								<div class="contact-address-details">
									<div class="address-icon relative-position text-center float-left">
										<i class="fas fa-envelope"></i>
									</div>
									<div class="address-details ul-li-block">
										<ul>
											<li><span>Primary: </span>coolmath.bright@gmail.com</li>
											<li><span>Write Some Words </span></li>

										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="genius-btn mt60 gradient-bg text-center text-uppercase ul-li-block bold-font ">
							<a href="#contact-form">Contact Us <i class="fas fa-caret-right"></i></a>
						</div>
					</div>

					<div class="col-md-6">
						<div id="contact-map" class="contact-map-section">
							<div id="google-map">
							<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1jQWQpoRxvdQs7t900y-fTEw7fvQihYY&ehbc=2E312F" width="100%" height="100%"></iframe>
								<!-- <div id="googleMaps" class="google-map-container"></div> -->
							</div><!-- /#google-map-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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
	<!-- End of contact area
		============================================= -->

		<section id="search-course-2" class="search-course-section home-third-course-search backgroud-style" style="padding-top:0px;padding-bottom:20px;">
			<div class="container">
				<div class="section-title mb20 headline text-center">
					<span class="subtitle text-uppercase">START INVESTING IN YOU</span>
					<h2><span>Become</span> A Teacher.</h2>
				</div>
			

				<div class="search-app">
					<div class="row">
						
					   <div class="col-md-6">
							<div class="app-mock-up">
								<img src="assets/img/about/teacher.jpg" alt="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="about-us-text search-app-content">
								<div class="section-title relative-position mb20 headline text-left">
									<h2><span>Monetize</span> Your <span>Expertise.</span></h2>
								</div>

								<div class="app-details-content">
									<p>Build your online course and monetize your expertise by sharing your knowledge across MOROCCO.</p>

									<div class="about-list mb30 ul-li-block">
										<ul>
											<li>Teaching Online</li>
											<li>Earn a Bachelor’s Degree</li>
											<li>Distance learning allows you to organize at your own pace and have another activity</li>
										</ul>
									</div>
									<div class="about-btn">
										<div class="genius-btn gradient-bg text-center text-uppercase ul-li-block bold-font">
											<span id="discover-now">DISCOVER NOW <i class="fas fa-caret-right"></i></span>
											
										</div>

										
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>


	<!-- Start of footer section
		============================================= -->
		<footer>
					<section id="footer-area" class="footer-area-section">
						<div class="container">
							<div class="footer-content pb10">
								<div class="row">
									<div class="col-md-3">
										<div class="footer-widget">
										<h2 class="widget-title">Bright Minds</h2>
											<div class="footer-about-text">
											<p>Education is the most powerful weapon which you can use to change the world. </p>
										<p>Change Your Life By Learning.</p>	
										</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="footer-widget">
											<div class="footer-menu ul-li-block">
												<h2 class="widget-title">Useful Links</h2>
												<ul>
													<li><a href="#why-choose-us"><i class="fas fa-caret-right"></i>Why Bright Minds</a></li>
													<li><a href="#about-us"><i class="fas fa-caret-right"></i>About Us</a></li>
													<li><a href="#contact-form"><i class="fas fa-caret-right"></i>Contact Us</a></li>
													<li><a id="be-teacher-footer" href="#"><i class="fas fa-caret-right"></i>Be A Teacher</a></li>

													<!-- <li><a href="#"><i class="fas fa-caret-right"></i>Graphic Design</a></li>
										<li><a href="#"><i class="fas fa-caret-right"></i>Mobile Apps</a></li> -->
												</ul>
											</div>
										</div>
										<div class="footer-menu ul-li-block">
											<h2 class="widget-title">Account Info</h2>
											<ul>
												<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fas fa-caret-right"></i>Log In</a></li>

												<li><a data-toggle="modal" data-target="#myModalR"><i class="fas fa-caret-right"></i>Register</a></li>

											</ul>
										</div>
									</div>
									<div class="col-md-3">
										<div class="footer-widget">
										<div class="footer-social ul-li">
									<h2 class="widget-title">Social Network</h2>
									<ul>
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
									</ul>
								</div>
											
										</div>
									</div>
								</div>
							</div>
					

							<div class="copy-right-menu">
								<div class="row">
									<div class="col-md-6">
										<div class="copy-right-text">
										<p>© 2022 - www.bright-minds.ma All rights reserved</p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="copy-right-menu-item float-right ul-li">
											<ul>
												<li><a href="#">License</a></li>
												<li><a href="#">Privacy & Policy</a></li>
												<li><a href="#">Term Of Service</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</footer>
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
	<script src="assets/js/script.js"></script>
	<script src="assets/js/inscrire.js"></script>
	<script src="assets/js/connecte.js"></script>
	<script src="assets/js/beTeacher.js"></script>
	

	


</body>

</html>