<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>JSON</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php foreach ($mangkq as $value): ?>
		<h1>Ten: <?= $value->ten ?></h1> <!-- ten va tuoi nam trong 1 object nen k xai array nhu thuong duoc -->
		<h1>Tuoi: <?= $value->tuoi?></h1>

		<a href="Cjs/xoa/<?= $value->tuoi?>" title="Xoa">Xoa</a>
	<?php endforeach ?>
	
	<hr>
	<form action="Cjs/add" method="post" accept-charset="utf-8">
		<input type="text" name="ten" placeholder="Ten">
		<input type="text" name="tuoi" placeholder="Tuoi">
		<input type="submit" name="submit">
	</form>
</body>
</html>