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

<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 themmoi">
					<div class="jumbotron text-xs-center">
							<h1 class="display-3">Thêm mới ảnh</h1>
							<p class="lead">Thêm mới ảnh vào csdl.</p>
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
						<form action="<?php echo base_url(); ?>Admin/addimage" method="post" enctype="multipart/form-data">
							<fieldset class="form-group">
								<label for="formGroupExampleInput">Tên ảnh</label>
								<input name="tenanh" type="text" class="form-control" placeholder="Tên ảnh">
							</fieldset>

							<fieldset class="form-group">
								<label for="formGroupExampleInput">Thể loại</label>
								<select name="theloai" id="" class="form-control">
									<?php foreach ($tl as $valuetl): ?>					
									<option value="<?= $valuetl['typeid'] ?>"> <?= $valuetl['typename'] ?> </option>
									<?php endforeach ?>
								</select>
							</fieldset>
							<?php
							if(!empty($error['errorupload']))
							{
								echo "<div class=\"alert alert-danger\" role=\"alert\">".$error['error']."</div>";
							}
							?>
							<fieldset class="form-group">
								<label for="formGroupExampleInput">Upload</label>
								<input name="link" type="file" class="form-control">
							</fieldset>

							<fieldset class="form-group">
								<input type="submit" class="btn btn-success" value="Thêm ảnh">
							</fieldset>
						</form>
					</div>
				<div class="jumbotron text-xs-center">
						<h1 class="display-3">Thêm danh mục</h1>
						<p class="lead">Thêm danh mục ảnh vào csdl.</p>
						<hr class="m-y-md"> 
				</div>
				<form class="form-inline" action="<?php echo base_url(); ?>Admin/addtypeimage" method="post">
				  <div class="form-group mx-sm-3 mb-2">
				    <input type="text" class="form-control" name="typename" placeholder="Thêm danh mục ảnh mới">
				  </div>
				  <button type="submit" class="btn btn-primary mb-2">Thêm</button>
				</form>
				<br>
				<?php foreach ($tl as $valuetl): ?>	
				<form class="form-inline" action="<?php echo base_url(); ?>Admin/updatetypeimage/<?= $valuetl['typeid'] ?>" method="post">
				  <div class="form-group mx-sm-3 mb-2">
				  	<input type="hidden" class="form-control" name="id" value="<?= $valuetl['typeid'] ?>">
				    <input type="text" class="form-control" name="typename" value="<?= $valuetl['typename'] ?>" placeholder="<?= $valuetl['typename'] ?>">
				  </div>
				  <button type="submit" class="btn btn-primary mb-2">Update</button>
				  <a href="<?php echo base_url(); ?>Admin/deletetypeimage/<?= $valuetl['typeid'] ?>" class="btn btn-outline-danger mb-2">Xóa</a>
				</form>
				<?php endforeach ?>
				<div class="jumbotron text-xs-center">
						<h1 class="display-3">Cập nhật tài khoản</h1>
						<p class="lead">Cập nhật tài khoản vào csdl.</p>
						<hr class="m-y-md"> 
				</div>
				<form class="form-inline" action="<?php echo base_url(); ?>Admin/updateaccount" method="post">
				  <div class="form-group mx-sm-3 mb-2">
				    Username<input type="text" class="form-control" name="username" value="<?= $acc['username'] ?>" placeholder="<?= $acc['username'] ?>">
				  </div>
				  <div class="form-group mx-sm-3 mb-2">
				  	Password<input type="text" class="form-control" name="password" value="<?= $acc['password'] ?>" placeholder="<?= $acc['password'] ?>">
				  </div>
				  <button type="submit" class="btn btn-primary mb-2">Update</button>
				</form>
			</div>
			<div class="col-sm-6 danhsach">
						<div class="jumbotron text-xs-center">
							<h1 class="display-3">Danh sách ảnh</h1>
							<p class="lead">Danh sách các ảnh trong csdl.</p>
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
					<?php foreach ($kq as $value): ?>
							<div class="col-sm-4">
								<div class="card">
								<?php 
									if(empty($value['link'])){
								 ?>
									<img style="height: 14rem;" class="card-img-top img-fluid"  src="http://placehold.it/700x300" alt="Card image cap">
								 <?php }
								 else { ?>

									<img style="height: 14rem;" class="card-img-top img-fluid" src="<?= $value['link'] ?>" alt="Card image cap">

									<?php } ?>
									<div class="card-block">
										<h4 class="card-title"><?= $value['name'] ?></h4>
										<p class="card-text"><?= $value['typename'] ?></p>
										<a href="<?php echo base_url()."Admin/edit/".$value['id']; ?>" class="btn btn-outline-danger"><i class="fa fa-pencil"></i></a>
										<a href="<?php echo base_url()."Admin/delete/".$value['id']; ?>" class="btn btn-outline-warning"><i class="fa fa-remove"></i></a>
									</div>
								</div>
							 
							</div>
					<?php endforeach ?>		
					</div>
			</div>
			<!-- end danh sach tin -->
			<?php
					echo $this->pagination->create_links();
			?>
			</div>
		</div>
	</div>
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
