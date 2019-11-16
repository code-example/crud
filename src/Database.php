<?php

include_once "./config/config.php";

class Database
{
	private $DB_HOST = DB_HOST;
	private $DB_NAME = DB_NAME;
	private $DB_USER = DB_USER;
	private $DB_PASS = DB_PASS;

	private static $_instance = null;
	private $connection = null;

	private function __construct () 
	{
		$this->connection = new mysqli($this->DB_HOST,
			$this->DB_USER, $this->DB_PASS, $this->DB_NAME);

		$res = mysqli_query($this->connection, "CREATE TABLE IF NOT EXISTS Product(
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			title VARCHAR(100) NOT NULL,
			price DECIMAL(10, 2) NOT NULL,
			description VARCHAR(1000),
			properties VARCHAR(1000));");
	}

	private function __clone () {}
	private function __wakeup () {}

	public static function getInstance()
	{
		if (self::$_instance == null) {
			self::$_instance = new Database();
			return self::$_instance;
		}
		return new self::$_instance;
	}
	public function getConnection() 
	{
		if($this->connection)
			return $this->connection;
		else return null;
	}
}