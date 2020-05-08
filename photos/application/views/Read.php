<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Photographer | HTML Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="Photographer html template">
	<meta name="keywords" content="photographer, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&amp;subset=vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">
	
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
	

	<script type="text/javascript" src="<?= base_url(); ?>vendor/bootstrap.js"></script>


  	<script type="text/javascript" src="<?= base_url(); ?>1.js"></script>

	<link rel="stylesheet" href="<?= base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url(); ?>vendor/font-awesome.css">
	<link rel="stylesheet" href="<?= base_url(); ?>1.css">

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
	<div class="tieudenews">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-xs-center wow  flipInY" data-wow-delay="0s">
							<div class="tdtintuchome">
								<span class="fontdancing">My Blog</span>
								<h2 class="fontroboto">News</h2>
							</div>
						
				</div>
			</div>
		</div>
 	</div>   <!-- HET TIEDE DE NEWS -->

	<section class="noidungtin">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="mottinchuan mb-3  wow  fadeInUp fontroboto">
						<img src="<?= $value['linkimg'] ?>" alt="">
						<a href="" class="tieudetin1 fontoswarld"><?= $value['title'] ?></a>
						<div class="ngaythang1"><?= date('d/m/Y - G:i - A',$value['date']) ?> In <span class="vang"> <?= $value['category'] ?></span></div>
						<?= $value['content'] ?>					 
					</div>
					 
					<div class="row">
						<div class="col-sm-12">
							<h3> Các tin khác</h3>
							<hr>
						</div>

						<?php foreach ($tlq as $value): ?>
							
						
						<div class="col-sm-4">
							<div class="card-deck-wrapper">
								<div class="card-deck">
									<div class="card">
										<a href="<?= base_url(); ?>Photos/Read/<?= $value['id'] ?>"><img class="card-img-top img-fluid"  
										src="<?= $value['linkimg'] ?>" alt="Card image cap"></a>
										<div class="card-block">
											<h4 class="card-title"><?= $value['title'] ?></h4>
											<p class="card-text">
												<?= $value['head'] ?>
											</p>
											<p class="card-text"><small class="text-muted">
											<?= date('d/m/Y - G:i - A',$value['date']) ?> In <span class="vang"> <?= $value['catename'] ?></span></small></p>
										</div>
									</div>
									 
								</div>
							</div>
						</div>
						<?php endforeach ?>
						 
					</div>
				</div> <!-- HET COT 9 -->
				<div class="col-sm-3">
					<div class="phansearch  wow  fadeInUp">
							 <input type="text" class="form-control phansearchct"  placeholder="Search">
							 
							<button type="submit" class="iconsearch"><i class="fa fa-search"></i></button>
						
					</div>

					<div class="khoilistlink my-2  wow  fadeInUp">
						<h3 class="fontoswarld">Category </h3>
						<ul class="fontroboto">
							 <?php foreach ($cacdanhmuc as $value): ?>
								
							
							<li><a href="<?= base_url(); ?>Photos/Danhmuc/<?= $value['cateid'];?>/0"> <?= $value['catename'] ; ?></a></li>
							<?php endforeach ?>
						</ul>
					</div><!--  	het listlink  -->
				</div>  <!-- HET COT 3 -->

			</div>
		</div>		

	</section><!--  het noidung tin -->
	
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
