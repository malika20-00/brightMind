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
									<li><a href="student-home.php"><i class="fas fa-caret-right"></i>Home</a></li>
									<li class="menu-item-has-children ul-li-block">
										<a href="#!"><i class="fas fa-caret-right"></i>Participants</a>
										<ul class="sub-menu">
											<?php $etudiant  = new Etudiant();
											foreach ($etudiant->getClassByIdStudent($_SESSION['id']) as $affectation) {
												$crudClass = new CRUDClass();
												$class = $crudClass->getClassById($affectation['idClass']); ?>
												<li><a href="student-participants-list.php?id=<?php echo $affectation['idClass'] ?>"><?php echo $class['nom'];  ?></a></li>
											<?php } ?>


										</ul>
									</li>
									<!-- <li><a href="#"><i class="fas fa-caret-right"></i>Courses</a></li> -->
									<li><a href="studentmeets.php"><i class="fas fa-caret-right"></i>Meetings</a></li>
									<!-- <li><a href="#"><i class="fas fa-caret-right"></i>Graphic Design</a></li>
										<li><a href="#"><i class="fas fa-caret-right"></i>Mobile Apps</a></li> -->
								</ul>
							</div>
						</div>
						<div class="footer-menu ul-li-block">
							<h2 class="widget-title">Account Info</h2>
							<ul>
								<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fas fa-caret-right"></i>Edit account</a></li>
								<li><a href="../include/deconnection.php"><i class="fas fa-caret-right"></i>log out</a></li>

								<li><a href="accueil.php#contact-form"><i class="fas fa-caret-right"></i>Contact Us</a></li>

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
							<p>© 2022 - www.BrightMinds.com. All rights reserved</p>
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