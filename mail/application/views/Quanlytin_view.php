<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý tin </title>

	<link rel="stylesheet" href="<?= base_url() ?>/vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>/vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?= base_url() ?>/1.css">

 	<script src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
 	<script src="<?= base_url() ?>/ckeditor/ckfinder/ckfinder.js"></script>
</head>
<body>
	<?php 
	include 'header_backend.php';
 ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 themmoi">
					<div class="jumbotron text-xs-center">
							<h1 class="display-3">Thêm mới tin</h1>
							<p class="lead">Thêm mới tin.</p>
							<hr class="m-y-md">
							 
						</div>
					<div class="formthemmoi">
						<form action="<?= base_url(); ?>Tin/themtin" method="post" enctype="multipart/form-data">
							<fieldset class="form-group">
								<label for="formGroupExampleInput">Tiêu đề tin</label>
								<input name="tieude" type="text" class="form-control" id="formGroupExampleInput" placeholder="Tiêu đề ">
							</fieldset>

							<fieldset class="form-group">
								<label for="formGroupExampleInput">Danh mục tin</label>
								<select name="iddanhmuc" id="" class="form-control">
									<?php foreach ($dulieu as $value): ?>						
									

									<option value="<?= $value['id'] ?>"> <?= $value['tendanhmuc'] ?> </option>
								 
									<?php endforeach ?>

								</select>
							</fieldset>
							<fieldset class="form-group">
								<label for="formGroupExampleInput">Ảnh tin</label>
								<input name="anhtin" type="file" class="form-control" id="anhtin">
							</fieldset>
							<fieldset class="form-group">
								<label for="formGroupExampleInput">Trích dẫn</label>
								<input name="trichdan" type="text" class="form-control trichdan" id="trichdan">
							</fieldset>
							<fieldset class="form-group">
								<label for="formGroupExampleInput">Nội dung tin</label>
								<textarea name="noidungtin" id="noidungtin" class="noidungtin" cols="30" rows="10">
									
								</textarea>
							</fieldset>


							<fieldset class="form-group">
								 
								<input type="submit" value="Thêm tin ">
							</fieldset>
						</form>
					</div>

			</div>
			<div class="col-sm-6 danhsach">
						<div class="jumbotron text-xs-center">
							<h1 class="display-3">Danh sách tin</h1>
							<p class="lead">Danh sách tin.</p>
							<hr class="m-y-md">
							 
						</div>

			<!-- khoi danh sach tin -->
			<div class="row">
					
					<div class="card-group">

					<?php foreach ($dulieutin as $value): ?>
						
				
							<div class="col-sm-4">
								<div class="card">
								<?php 
									if(empty($value['anhtin'])){
								 ?>
									<img class="card-img-top img-fluid" src="http://placehold.it/700x300" alt="Card image cap">
								 <?php }
								 else { ?>

									<img class="card-img-top img-fluid" src="<?= $value['anhtin'] ?>" alt="Card image cap">

									<?php } ?>
									<div class="card-block">
										<h4 class="card-title"><?= $value['tieude'] ?></h4>
										<p class="card-text"><?= $value['trichdan'] ?></p>
										<p class="card-text"><small class="text-muted">Đăng vào ngày <?= date('d/m/Y - G:i - A',$value['ngaytao']) ?></small></p>

										<a 
										href="<?= base_url(); ?>Tin/suatin/<?= $value['id'] ?>"
										 class="btn btn-outline-success sua">
											<i class="fa fa-pencil"></i>
										</a>
									</div>
								</div>
							 
							</div>
					<?php endforeach ?>		
					</div>
			</div>
			<!-- end danh sach tin -->

			</div>
		</div>
	</div>

	<script>
		 

		 CKEDITOR.replace( 'noidungtin', {
		    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
		    filebrowserImageBrowseUrl:  '/ckfinder/ckfinder.html?Type=Images',
		 
});
	</script>
</body>
</html>
