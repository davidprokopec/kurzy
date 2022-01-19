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

	public function save()
	{
		$connection = (new Db())->getConnection();
		if ($this->id < 1) {
			$sql = "INSERT INTO udalosti(lektor_clovek_id, behy_id, zacatek, trvani, mistnost) VALUES (:lektor, :kurz, :zacatek, :trvani, :mistnost)";

			$insertStmt = $connection->prepare($sql);
			$insertStmt->bindParam(":lektor", $this->lektor_clovek_id, PDO::PARAM_INT);
			$insertStmt->bindParam(":kurz", $this->behy_id, PDO::PARAM_INT);
			$insertStmt->bindParam(":mistnost", $this->mistnost, PDO::PARAM_INT);
			$insertStmt->bindParam(":zacatek", $this->zacatek);
			$insertStmt->bindParam(":trvani", $this->trvani);

			if ($insertStmt->execute()) {
				$this->id = $connection->lastInsertId();
				return true;
			} else
				return false;
		} else {
			$sql = "UPDATE udalosti SET lektor_clovek_id = :lektor, behy_id = :kurz, zacatek = :zacatek, trvani = :trvani, mistnost = :mistnost WHERE id = :id";

			$insertStmt = $connection->prepare($sql);
			$insertStmt->bindParam(":lektor", $this->lektor_clovek_id, PDO::PARAM_INT);
			$insertStmt->bindParam(":kurz", $this->behy_id, PDO::PARAM_INT);
			$insertStmt->bindParam(":mistnost", $this->mistnost, PDO::PARAM_INT);
			$insertStmt->bindParam(":zacatek", $this->zacatek);
			$insertStmt->bindParam(":trvani", $this->trvani);
			$insertStmt->bindParam(":id", )
		}
	}
}
