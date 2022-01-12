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
	<title>Přehled událostí</title>
</head>

<body>
	<h1>události</h1>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Lektor</th>
				<th>Kuzr / běh</th>
				<th>Název</th>
				<th>Začátek</th>
				<th>Trvání</th>
				<th>Místo</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<?php foreach (Udalost::getAll() as $udalost) : ?>
			<tr>
				<td><?= $udalost->id ?></td>
				<td><?= $udalost->lektor_clovek_id ?></td>
				<td><?= $udalost->behy_id ?></td>
				<td><?= $udalost->nazev ?></td>
				<td><?= $udalost->zacatek ?></td>
				<td><?= $udalost->trvani ?></td>
				<td><?= $udalost->mistnost ?></td>
				<td><a href="edit.php?id=<?= $udalost->id ?>">Upravit</a></td>
				<td><a href="smazat.php?id=<?= $udalost->id ?>">Smazat</a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>

</html>