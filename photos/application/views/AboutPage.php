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
			<li><a href="<?php echo base_url()."Admin"?>">Home</a></li>
			<li><a href="<?php echo base_url()."About"?>">About the Artist </a></li>
			<li><a href="<?php echo base_url()."Blog"?>">Blog</a></li>
			<li><a href="<?php echo base_url()."Contact"?>">Contact</a></li>
			<li><a href="<?php echo base_url()."Login/Logout"?>"><?= $this->session->userdata('admin');?> Logout</a></li>
			<li class="search-mobile">
				<button class="search-btn"><i class="fa fa-search"></i></button>
			</li>
		</ul>
	</header>
	<div class="clearfix"></div>
	<!-- Header section end  -->

	<!-- About section  -->
	<section class="about-section">
		<div class="container-fluid">
			<form action="<?= base_url()?>About/update/" method="post" enctype="multipart/form-data">
				<div class="row">
				<div class="col-lg-6 p-0">
					<div class="about-bg set-bg" data-setbg="<?= $value['linkava']?>"></div>
					<input type="hidden" name="linkanhcu" value="<?= $value['linkava']?>">
					<input type="file" name="linkava">
				</div>
				<div class="col-lg-6 p-0">
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
					<div class="about-text">
						<h2>About me. <input name="name" type="text" value="<?= $value['name']?>"></h2>
						<textarea name="content" rows="10" cols="74" value="<?= $value['content']?>"><?= $value['content']?></textarea>
						<h4>My Clients</h4>
						<textarea name="myclients" rows="5" cols="74" value="<?= $value['myclients']?>"><?= $value['myclients']?></textarea>
						<h4>Editorials</h4>
						<textarea name="editorials" rows="5" cols="74" value="<?= $value['editorials']?>"><?= $value['editorials']?></textarea>
						<input type="submit" name="submit" class="btn btn-success" value="Lưu thông tin">
					</div>
				</div>
				</div>
			</form>
		</div>
	</section>
	<!-- About section end  -->

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
