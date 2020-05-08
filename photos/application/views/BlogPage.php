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

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 themmoi">
					<div class="jumbotron text-xs-center">
							<h1 class="display-3">Thêm mới tin</h1>
							<p class="lead">Thêm mới tin.</p>
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
						<form action="<?= base_url(); ?>Blog/add" method="post" enctype="multipart/form-data">
							<fieldset class="form-group">
								<label for="formGroupExampleInput">Tiêu đề tin</label>
								<input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Tiêu đề ">
							</fieldset>
							<fieldset class="form-group">
								<label for="formGroupExampleInput">Danh mục tin</label>
								<select name="category" id="" class="form-control">
									<?php foreach ($dulieu as $value): ?>						
									

									<option value="<?= $value['cateid'] ?>"> <?= $value['catename'] ?> </option>
								 
									<?php endforeach ?>

								</select>
							</fieldset>
							<fieldset class="form-group">
								<label for="formGroupExampleInput">Ảnh tin</label>
								<input name="linkimg" type="file" class="form-control btn btn-outline-success" id="anhtin">
							</fieldset>
							<fieldset class="form-group">
								<label for="formGroupExampleInput">Trích dẫn</label>
								<input name="head" type="text" class="form-control trichdan" id="trichdan">
							</fieldset>
							<fieldset class="form-group">
								<label for="formGroupExampleInput">Nội dung tin</label>
								<textarea name="content" id="noidungtin" class="noidungtin" cols="30" rows="10">
									
								</textarea>
							</fieldset>


							<fieldset class="form-group">
								 
								<input type="submit" class="btn btn-outline-success" value="Thêm tin ">
							</fieldset>
						</form>
					</div>
					<div class="jumbotron text-xs-center">
						<h1 class="display-3">Thêm danh mục</h1>
						<p class="lead">Thêm danh mục tin vào csdl.</p>
						<hr class="m-y-md"> 
					</div>
					<form class="form-inline" action="<?php echo base_url(); ?>Blog/addcate" method="post">
					  <div class="form-group mx-sm-3 mb-2">
					    <input type="text" class="form-control" name="catename" placeholder="Thêm danh mục tin mới">
					  </div>
					  <button type="submit" class="btn btn-primary mb-2">Thêm</button>
					</form>
					<br>
					<?php foreach ($dulieu as $valuetl): ?>	
					<form class="form-inline" action="<?php echo base_url(); ?>Blog/updatecate/<?= $valuetl['cateid'] ?>" method="post">
					  <div class="form-group mx-sm-3 mb-2">
					  	<input type="hidden" class="form-control" name="cateid" value="<?= $valuetl['cateid'] ?>">
					    <input type="text" class="form-control" name="catename" value="<?= $valuetl['catename'] ?>" placeholder="<?= $valuetl['catename'] ?>">
					  </div>
					  <button type="submit" class="btn btn-primary mb-2">Update</button>
					  <a href="<?php echo base_url(); ?>Blog/deletecate/<?= $valuetl['cateid'] ?>" class="btn btn-outline-danger mb-2">Xóa</a>
					</form>
					<?php endforeach ?>
			</div>
			<div class="col-sm-6 danhsach">
						<div class="jumbotron text-xs-center">
							<h1 class="display-3">Danh sách tin</h1>
							<p class="lead">Danh sách tin.</p>
							<hr class="m-y-md">
							 
						</div>
						<?php
								if(!empty($error['successdelete']))
								{
									echo "<div class=\"alert alert-success\" role=\"alert\">".$error['successdelete']."</div>";
								}
							?>
			<div class="row">
					
					<div class="card-group">

					<?php foreach ($dulieutin as $value): ?>
						
				
							<div class="col-sm-4">
								<div class="card">
								<?php 
									if(empty($value['linkimg'])){
								 ?>
									<img style="height: 14rem;" class="card-img-top img-fluid" src="http://placehold.it/700x300" alt="Card image cap">
								 <?php }
								 else { ?>

									<img style="height: 14rem;" class="card-img-top img-fluid" src="<?= $value['linkimg'] ?>" alt="Card image cap">

									<?php } ?>
									<div class="card-block">
										<h4 class="card-title"><?= $value['title'] ?></h4>
										<p class="card-text"><?= $value['head'] ?></p>
										<p class="card-text"><small class="text-muted">Đăng vào ngày <?= date('d/m/Y - G:i - A',$value['date']) ?></small></p>

										<a 
										href="<?= base_url(); ?>Blog/edit/<?= $value['id'] ?>"
										 class="btn btn-outline-success sua">
											<i class="fa fa-pencil"></i>
										</a>
										<a 
										href="<?= base_url(); ?>Blog/delete/<?= $value['id'] ?>"
										 class="btn btn-outline-danger xoa">
											<i class="fa fa-trash"></i>
										</a>
									</div>
								</div>
							 
							</div>
					<?php endforeach ?>		
					</div>
			</div>
			<?php
					echo $this->pagination->create_links();
			?>
			</div>
		</div>
	</div>

	<script>
		 

		 CKEDITOR.replace( 'noidungtin', {
		    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
		    filebrowserImageBrowseUrl:  '/ckfinder/ckfinder.html?Type=Images',
		 
		});
	</script>
	
	
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
