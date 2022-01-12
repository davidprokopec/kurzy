<?php

require_once "Db.class.php";

class udalost
{
	private $id, $lektor_clovek_id, $behy_id, $nazev, $zacatek, $trvani, $mistnost;

	public function __get($propName)
	{
		if (!array_key_exists($propName, get_object_vars($this))) {
			throw new Exception("Vlastnost {$propName} neexistuje.");
		}
		return $this->$propName;
	}

	public function __set($propName, $value)
	{
		if (!array_key_exists($propName, get_object_vars($this))) {
			throw new Exception("Vlasnost {$propName} neexistuje.");
		}

		$pouzeProCteni = ["id"];
		if (in_array($propName, $pouzeProCteni)) {
			throw new Exception("Vlanost {$propName} je pouze pro čtení.");
		}

		$this->$propName = $value;
	}

	public static function getAll()
	{
		$connection = (new Db())->getConnection();
		$sql = "SELECT id, lektor_clovek_id, behy_id, nazev, zacatek, trvani, mistnost FROM udalosti";

		$udalostiStmt = $connection->prepare($sql);
		$udalostiStmt->execute();

		return $udalostiStmt->fetchAll(PDO::FETCH_CLASS, __CLASS__);
	}

	public static function get($id)
	{
		$connection = (new Db())->getConnection();
		$sql = "SELECT id, lektor_clovek_id, behy_id, nazev, zacatek, trvani, mistnost FROM udalosti WHERE id = :id";

		$udalostStmt = $connection->prepare($sql);
		$udalostStmt->bindValue(":id", $id, PDO::PARAM_INT);
		$udalostStmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
		$udalostStmt->execute();

		return $udalostStmt->fetch();
	}
}
