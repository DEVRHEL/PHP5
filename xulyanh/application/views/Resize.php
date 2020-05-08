<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload file bằng code có sẵn </title>
</head>
<body>
	<h1> Upload file </h1>
	<form action="<?= base_url(); ?>/Upload/resize" enctype="multipart/form-data" 
	method="post">
		<input type="file" name="anh">
		<input type="submit" name="gui" value="Upload anh">
		
	</form>
</body>
</html>