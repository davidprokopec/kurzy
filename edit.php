<?php
spl_autoload_register(function ($className) {
	require_once("model/{$className}.class.php");
});

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Editace události</title>
</head>

<body>
	<form action="" method="post">
		<div class="row">
			<label for="cas">cas zacatku</label>
			<input type="datetime-local" name="cas" id="cas">
		</div>
		<div class="row">
			<label for="tvani">trvani</label>
			<input type="time" name="trvani" id="trvani">
		</div>
		<div class="row">
			<label for="lektor">lektor</label>
			<input type="text" name="lektor" id="lektor">
		</div>
		<div class="row">
			<label for="kurz">kurz</label>
			<input type="text" name="kurz" id="kurz">
		</div>
		<div class="row">
			<label for="mistnost">mistnost</label>
			<input type="text" name="mistnost" id="misnost">
		</div>
		<div class="row">
			<input type="submit" value="submit">
		</div>
	</form>

</body>

</html>