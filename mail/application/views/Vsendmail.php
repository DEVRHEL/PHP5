<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gui mail</title>
	<script type="text/javascript" src="<?php echo base_url();?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url();?>1.css">
	<!-- jquert file upload -->
	<script type="text/javascript" src="<?php echo base_url();?>jqueryupload/js/vendor/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>jqueryupload/js/jquery.fileupload.js"></script>
</head>
<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 push-sm-3">
				<form action="Mmail/dosend" method="post">
					<fieldset class="form-group">
						<label for="formGroupExampleInput">Ten nguoi gui</label>
						<input type="text" name="ten" class="form-control" id="formGroupExampleInput" placeholder="rhel">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Email nguoi nhan</label>
						<input type="text" name="nguoinhan" class="form-control" id="formGroupExampleInput" placeholder="rhel@gmail.com">
					</fieldset>
					<fieldset class="form-group">
						<label for="formGroupExampleInput2">Noi dung</label>
						<textarea name="noidung" id="" cols="85" rows="10">
						</textarea>
					</fieldset>
					<fieldset class="form-group">
						<input type="submit" class="form-control btn btn-outline-danger" value="Gui">
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<br>
	<div class="khoidatban text-xs-center wow fadeInUp" data-wow-delay="0s">
		<form action="Mmail/datban" method="post">
		<div class="container">

		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="thongtindatban fontroboto">
					<h2 class="fontroboto">Make A Reservation</h2>
					<p class="tt ">Booking a table has never been so easy with free   instant online restaurant reservations, booking now!!</p>
					<p class="giodb">Monday to Friday   <span class="vang"> 9:00 am - 23:00 pm </span> Saturday to Sunday <span class="vang"> 10:00 am - 22:00 pm</span>
	Note: Arctica Restaurant is closed on holidays.</p>
					<div class="dtdb fontoswarld">0844.335.1211</div>
				</div>
				

			</div>
			<div class="col-sm-3"></div>

			<div class="col-sm-10 push-sm-1">
			
				<div class="formdatban">
					<div class="row">

				
						<div class="col-sm-12">
							<h2 class="text-xs-center fontroboto">Book Your Table Online</h2>

						</div>
						
						<div class="col-sm-4">						 
								<div class="form-group">								 
									<input name="tenkh" type="text" class="form-control" placeholder="Your Name * ">
								</div>	 
						</div>
						<div class="col-sm-4">						 
								<div class="form-group">								 
									<input name="email" type="email" class="form-control" placeholder="Your Email * ">
								</div>	 
						</div>
						<div class="col-sm-4">						 
								<div class="form-group">								 
									<input name="sdt" type="number" class="form-control" placeholder="Your Mobile * ">
								</div>	 
						</div>
						<div class="col-sm-4">						 
								<div class="form-group">								 
									<input name="ngaydatban" type="date" class="form-control" placeholder="Date * ">
								</div>	 
						</div>
						
						<div class="col-sm-4">						 
								<div class="form-group">								 
									<input name="giodatban" type="time" class="form-control" placeholder="Time * ">
								</div>	 
						</div>
						<div class="col-sm-4">						 
								<div class="form-group">								 
									<input name="songuoi" type="number" class="form-control" placeholder="No. of person * ">
								</div>	 
						</div>

						<div class="col-sm-12 text-xs-center">
							<input type="submit" value="Book Table Now" class="btn btn-warning datban2">
							 
						</div>
						
					
					</div>
					 
				</div> <!-- het form dat ban -->
			</div>
		</div> <!-- het row -->
			
		</div><!--  het container -->
		</form>
	</div>  <!-- HET DAT BAN -->
</body>
</html>