<?php

class Database
{
	private $_connection;
	static $_instance;

	private function __construct() {
		$servername = "localhost";
		$username = "test";
		$password = "test123";
		$this->_connection = new PDO("mysql:host=$servername;dbname=test;charset=utf8", $username, $password);
		$this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	private function __clone(){}

	public static function getInstance() {
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function getConnection() {
		return $this->_connection;
	}
}

$servername = "localhost";
$username = "test";
$password = "test123";
    $db     = Database::getInstance();
    $db     = $db->getConnection();
try {
	$conn = new PDO("mysql:host=$servername;dbname=test;charset=utf8", $username, $password);
}
catch(PDOException $e)
{ echo $e->getMessage(); }