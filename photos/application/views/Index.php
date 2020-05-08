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
	<header class="header-section">
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
			<li><a href="<?php echo base_url()."Login"?>">Login</a></li>
			<li class="search-mobile">
				<button class="search-btn"><i class="fa fa-search"></i></button>
			</li>
		</ul>
	</header>
	<div class="clearfix"></div>
	<!-- Header section end  -->

	<!-- Hero section  -->
	<div class="hero-section">

		<?php $i=7; $j=13; foreach ($dataimages as $value): ?>
			<?php if($i%7==0)
			{
				echo "<div class=\"hero-slider owl-carousel\">";
			}
			?>
			
			<div class="hero-item portfolio-item set-bg" data-setbg="<?php echo $value['link'];?>">
				<a href="<?php echo base_url()."Photos/Portfolio"?>" class="hero-link">
					<h2>Take a look at my Portfolio</h2>
				</a>
			</div>

			<?php if($j==$i)
			{
				echo "</div>";
				$j+=7;
			}
			?>
		<?php $i++; endforeach ?>

		<div class="hero-social-links">
			<a href=""><i class="fa fa-pinterest"></i></a>
			<a href=""><i class="fa fa-facebook"></i></a>
			<a href=""><i class="fa fa-twitter"></i></a>
			<a href=""><i class="fa fa-dribbble"></i></a>
			<a href=""><i class="fa fa-behance"></i></a>
		</div>
	</div>
	<!-- Hero section end  -->
	
	<!-- Intro section   -->
	<section class="intro-section">
		<div class="intro-warp">
			<div class="container-fluid">
				<?php foreach ($datawelcome as $value): ?>
				<div class="row">
					<div class="col-xl-6 col-lg-7 p-0">
						<div class="intro-text">
							<h2><?php echo $value['title']?></h2>
							<p><?php echo $value['content']?></p>
							<a href="#" class="sp-link">Take a look @my portfolio</a>
						</div>
					</div>
					<div class="col-xl-6 col-lg-5 p-0">
						<div class="skill-warp">
							<div class="single-progress-item">
								<div class="progress-bar-style" data-progress="<?= $value['nature'] ?>"></div>
								<p>Nature</p>
							</div>
							<div class="single-progress-item">
								<div class="progress-bar-style" data-progress="<?= $value['passion'] ?>"></div>
								<p>Passion</p>
							</div>
							<div class="single-progress-item">
								<div class="progress-bar-style" data-progress="<?= $value['portraits'] ?>"></div>
								<p>Portraits</p>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
			</div>
		</div>
	</section>
	<!-- Intro section end  -->
	
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
