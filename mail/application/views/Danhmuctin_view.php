<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="<?= base_url() ?>/vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>/1.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>/vendor/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>/vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?= base_url() ?>/1.css">
</head>
<body>
	<?php 
	include 'header_backend.php';
 ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
		        <div class="jumbotron jumbotron-fluid">
					<div class="container">
						<h1 class="display-4">Thêm danh mục tin </h1>
						<p class="lead">Form này cho phép thêm danh mục tin và cơ sở dữ liệu.</p>
					</div>
				</div>
				<!-- <form action="<?php echo base_url(); ?>Tin/themdanhmuc" method="post"> -->
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Tên danh mục</label>
						<input name="tendanhmuc" type="text" class="form-control" id="tendanhmuc" placeholder="Tên danh mục">
					</fieldset>
					<fieldset class="form-group">
 						<input type="button" id="nutthemdanhmuc" class="form-control" value="Thêm danh mục">
					</fieldset>
				<!-- </form> -->
			</div>
			<div class="col-sm-6 cacdanhmuc">
				<div class="jumbotron jumbotron-fluid">
					<div class="container">
						<h1 class="display-3">Danh sach cac muc tin</h1>
						<p class="lead">Cac danh muc tin da them</p>
					</div>
				</div>
				<?php foreach ($kq as $value): ?>
				<div class="card card-inverse card-primary mb-3 text-center">
					<div class="card-block">
						<div class="thaotac"> <!-- them moi -->
							<blockquote class="ten card-blockquote">
							<p><?= $value['tendanhmuc'];?></p>
							</blockquote>
							<a data-href="" class="nutedit btn btn-danger"><i class="fa fa-pencil"></i></a>
							<a data-href="<?php echo base_url()."Tin/deleteJquery/".$value['id']; ?>" class="nutremove btn btn-warning"><i class="fa fa-remove"></i></a>
						</div>
						
						<div class="hienlen card-blockquote hidden-xs-up"> <!-- them moi -->
							<input type="text" class="form-control tendanhmucsua"
							value="<?= $value['tendanhmuc'];?>"
							>
							<a data-href="<?= $value['id'];?>" class="nutluu btn btn-success">Luu</a>
						</div>

					</div>
				</div>
			<?php endforeach ?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#nutthemdanhmuc').click(function(event){
				var tendanhmuc= $('#tendanhmuc').val();
				// console.log(tendanhmuc);
				if(tendanhmuc != '')
				{

					$.ajax({
						url: "<?= base_url()?>Tin/addJquery",
						type: 'POST',
						dataType: 'json',
						data: {tendanhmuc: $('#tendanhmuc').val()}, //$('#tendanhmuc').val() = tendanhmuc da khai bao o tren
						success: function(res)
						{
							ress=res; 
						}
					})
					.done(function() {
						// console.log("success");
					})
					.fail(function() {
						// console.log("error");
					})
					.always(function() {
						console.log(ress);
						var noidung ='<div class="card card-inverse card-primary mb-3 text-center">';
						noidung+='<div class="card-block">';
						noidung+='<div class="thaotac">';
						noidung+='<blockquote class="ten card-blockquote">';
						noidung+='<p>'+tendanhmuc+'</p>';
						noidung+='</blockquote>';
						noidung+='<a data-href="" class="nutedit btn btn-danger"><i class="fa fa-pencil"></i></a>';
						noidung+='<a data-href="http://localhost/mail/Tin/deleteJquery/'+ress+'" class="nutremove btn btn-warning"><i class="fa fa-remove"></i></a></div>';
						noidung+='<div class="hienlen card-blockquote hidden-xs-up">';
						noidung+='<input type="text" class="form-control tendanhmucsua" value="'+tendanhmuc+'">';//
						noidung+='<a data-href="'+ress+'" class="nutluu btn btn-success">Luu</a></div>';
						noidung+='</div>';
						noidung+='</div>';
						$('.cacdanhmuc').append(noidung);
						$('#tendanhmuc').val('');
					});
				};
			});

			$('body').on('click', '.nutremove', function(event){ // luon luon lang nghe luon luon thau hieu
				linkxoa=$(this).data('href');
				console.log(linkxoa);
				doituongcanxoa1=$(this).parent().parent().parent();
				$.ajax({
					url: linkxoa,
					type: 'POST',
					dataType: 'json',
					data: {param1: 'value1'},
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
					doituongcanxoa1.remove();
				});
			});

			$('body').on('click', '.nutedit', function(event) {
				// $('.thaotac').addClass('hidden-xs-up');
				// $('.hienlen').removeClass('hidden-xs-up');
				$(this).parent().addClass('hidden-xs-up');
				$(this).parent().next().removeClass('hidden-xs-up');
			});
			$('body').on('click', '.nutluu', function(event) {
				giatri= $(this).prev().val();
				id=$(this).data('href');
				phantu1=$(this).parent().addClass('hidden-xs-up');
				phantu2=$(this).parent().prev().removeClass('hidden-xs-up');
				hienthi3=$(this).parent().prev().children('.ten').html(giatri);
				$.ajax({
					url: '<?= base_url()?>Tin/updateJquery',
					type: 'POST',
					dataType: 'json',
					data: { id: id, tendanhmuc: giatri},
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				
			});
		});
	</script>
</body> 
</html>