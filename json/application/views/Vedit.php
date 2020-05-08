<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>JSON</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="Cedit/edit" method="post" accept-charset="utf-8">
		<?php foreach ($mangdl as $value): ?>

			<label for="">Ten: </label>
			<input type="text" name="ten[]" value="<?= $value['ten'] ?>"> <!-- vi co nhieu ten va tuoi trong day json nen phai co [] de phan biet -->
			<label for="">Tuoi: </label>
			<input type="text" name="tuoi[]" value="<?= $value['tuoi'] ?>">
			<br>

		<?php endforeach ?>
		<br>
		<input type="submit" name="submit">
	</form>
</body>
</html> 