<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Photographer | HTML Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="Photographer html template">
	<meta name="keywords" content="photographer, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Favicon -->
	<link href="<?php echo base_url()?>img/favicon.ico" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url()?>css/font-awesome.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url()?>css/magnific-popup.css"/>
	<link rel="stylesheet" href="<?php echo base_url()?>css/slicknav.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url()?>css/owl.carousel.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url()?>css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section  -->
	<header class="header-section hs-bd">
		<a href="<?php echo base_url()."Photos"?>" class="site-logo"><img src="<?php echo base_url()?>img/logo.png" alt="logo"></a>
		<div class="header-controls">
			<button class="nav-switch-btn"><i class="fa fa-bars"></i></button>
			<button class="search-btn"><i class="fa fa-search"></i></button>
		</div>
		<ul class="main-menu">
			<li><a href="<?php echo base_url()."Photos"?>">Home</a></li>
			<li><a href="<?php echo base_url()."Photos/About"?>">About the Artist </a></li>
			<li><a href="<?php echo base_url()."Photos/Blog"?>">Blog</a></li>
			<li><a href="<?php echo base_url()."Photos/Contact"?>">Contact</a></li>
			<li class="search-mobile">
				<button class="search-btn"><i class="fa fa-search"></i></button>
			</li>
		</ul>
	</header>
	<div class="clearfix"></div>
	<!-- Header section end  -->

	<!-- Google Map -->
	<!-- <div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14376.077865872314!2d-73.879277264103!3d40.757667781624285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1546528920522" style="border:0" allowfullscreen></iframe>
	</div> -->
	<!-- Google Map end -->

	<!-- Contact section  -->
	<section class="contact-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="contact-text">
						<h3>Get in touch</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas.</p>
						<ul>
							<li>Main Str, no 23, NY, <br>New York PK 23589</li>
							<li>+546 990221 123</li>
							<li>contact@industryalinc.com</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-8">
					<?php
						if(!empty($error['error']))
						{
							echo "<div class=\"alert alert-danger\" role=\"alert\">".$error['error']."</div>";
						}
						if(!empty($error['success']))
						{
							echo "<div class=\"alert alert-success\" role=\"alert\">".$error['success']."</div>";
						}
					?>
					<form class="contact-form" method="post" action="<?= base_url()?>Photos/sendmail">
						<div class="row">
							<div class="col-lg-6">
								<input type="text" name="nameclient" placeholder="Your Name">
							</div>
							<div class="col-lg-6">
								<input type="text" name="mailclient" placeholder="Your Email">
							</div>
							<div class="col-lg-4">
							</div>
							<div class="col-lg-12">
								<input type="text" name="subjectclient" placeholder="Subject">
								<textarea name="contentclient" class="text-msg" placeholder="Message"></textarea>
								<button class="site-btn" type="submit">send message</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact section end  -->

	<!-- Instagram section -->
	<!-- <div class="instagram-section">
		<h6>Instagram Feed</h6>
		<div id="instafeed" class="instagram-slider owl-carousel"></div>
	</div> -->
	<!-- Instagram section end -->
	
	<!-- Footer section   -->
	<footer class="footer-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 order-1 order-md-2">
					<div class="footer-social-links">
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-dribbble"></i></a>
						<a href=""><i class="fa fa-behance"></i></a>
					</div>
				</div>
				<div class="col-md-6 order-2 order-md-1">
					<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>	
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer section end  -->

	<!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search model end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="<?php echo base_url()?>js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>js/jquery.slicknav.min.js"></script>
	<script src="<?php echo base_url()?>js/owl.carousel.min.js"></script>
	<script src="<?php echo base_url()?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url()?>js/circle-progress.min.js"></script>
	<script src="<?php echo base_url()?>js/mixitup.min.js"></script>
	<script src="<?php echo base_url()?>js/instafeed.min.js"></script>
	<script src="<?php echo base_url()?>js/masonry.pkgd.min.js"></script>
	<script src="<?php echo base_url()?>js/main.js"></script>

	</body>
</html>
