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
	<script src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
 	<script src="<?= base_url() ?>/ckeditor/ckfinder/ckfinder.js"></script>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url()?>css/style.css"/>



	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

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
<div class="container">
		<div class="row">
			<div class="col-sm-10 push-sm-1">
				<div class="jumbotron text-xs-center">
							<h1 class="display-3">Sửa tin blog</h1>
							<p class="lead">Sửa nội dung của blog.</p>
							<hr class="m-y-md">
							 
						</div>
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
					<div class="formthemmoi">
						<form action="<?= base_url(); ?>Blog/doedit" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?= $value['id'] ?>">
							<fieldset class="form-group">
								<label for="formGroupExampleInput">Tiêu đề</label>
								<input value="<?= $value['title'] ?>" name="title" type="text" class="form-control" id="formGroupExampleInput"  >
							</fieldset>

							
							<fieldset class="form-group">
							<?php
								if(!empty($error['errorupload']))
								{
									echo "<div class=\"alert alert-danger\" role=\"alert\">".$error['errorupload']."</div>";
								}
							?>
							<img src="<?php echo $value['linkimg'] ?>" alt="" class="img-fluid">

							<input type="hidden" value="<?php echo $value['linkimg'] ?>" name="linkimgcu">
								<label for="formGroupExampleInput">Ảnh tin</label>
 								<input name="linkimg" type="file" class="form-control" placeholder="Ảnh tin ">
							</fieldset>


							<fieldset class="form-group">
								<label for="formGroupExampleInput">Trích dẫn</label>
								<input name="head" type="text" class="form-control" value="<?php echo $value['head'] ?>">
							</fieldset>



							<fieldset class="form-group">
								<label for="formGroupExampleInput">Danh mục tin</label>
								<select name="category" id="" class="form-control">
										 				
										 <option value="<?php echo $value['cateid'] ?>"><?= $value['catename']; ?></option>
										 <?php foreach ($dulieudanhmuc as $value2): ?>						
									

											<option value="<?= $value2['cateid'] ?>"> <?= $value2['catename'] ?> </option>
									 
										<?php endforeach ?>
										 
								</select>
							</fieldset>
							<fieldset class="form-group">
								<label for="formGroupExampleInput">Nội dung tin</label>
								<textarea name="content" id="noidungtin" class="noidungtin" cols="30" rows="10" 
								  >
									<?php echo $value['content'] ?>
								</textarea>
							</fieldset>

								
							
							<fieldset class="form-group">
							<div class="row">
								<div class="col-sm-6">								
								<input type="submit" class="btn btn-outline-info btn-block btn-lg" value="Lưu tin ">
								</div>
								<div class="col-sm-6">
								
								<a href="<?= base_url(); ?>Blog/delete/<?php echo $value['id'] ?>" class="btn btn-outline-danger btn-block btn-lg"  >
								Xóa tin 
								</a>
								</div>
							</div>
							</fieldset>
						</form>
					</div>

			</div>
		</div>
	</div>
	<script>
		 

		 CKEDITOR.replace( 'noidungtin', {
		    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
		    filebrowserImageBrowseUrl:  '/ckfinder/ckfinder.html?Type=Images'});
	</script>

<br>
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
