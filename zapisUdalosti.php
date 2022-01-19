<?php

if (empty($_POST)) {
	header("Location: edit.php", true, 303);
	exit();
}

spl_autoload_register(function ($className) {
	require_once("model/{$className}.class.php");
});


$lektor = trim($_POST["lektor"]);
$mistnost = trim($_POST["mistnost"]);
$kurz = trim($_POST["kurz"]);

if (empty($lektor) || empty($mistnost) || empty($kurz)) {
	header("Location: /", true, 400);
	exit();
}

$udalost = new Udalost();

$udalost->lektor_clovek_id = $lektor;
$udalost->behy_id = $kurz;
$udalost->mistnost = $mistnost;
$udalost->zacatek = $_POST["cas"];
$udalost->trvani = $_POST["trvani"];

if ($udalost->save()) {
	header("Location: prehled.php", true, 303);
	exit();
}

// $id, $lektor_clovek_id, $behy_id, $nazev, $zacatek, $trvani, $mistnost;