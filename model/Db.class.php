<?php

class db
{
	private const USER = "root";
	private const HOST = "localhost";
	private const PASS = "";
	private const DB_N = "wa_kurzy";
	private const SETT = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
	];

	private $connection;

	public function __construct()
	{
		$this->connection = new PDO("mysql:host" . self::HOST . ";dbname=" . self::DB_N, self::USER, self::PASS, self::SETT);
	}

	public function getConnection()
	{
		return $this->connection;
	}
}
