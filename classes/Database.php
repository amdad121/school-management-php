<?php 
/**
* Database
*/
class Database
{	
	private $dbname = 'sm';
	private $dbhost = 'localhost';
	private $dbuser = 'root';
	private $dbpass = '';

	public $pdo;
	public $error;

	function __construct()
	{
		if (!isset($this->pdo)) {
			try {
				$conn = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname, $this->dbuser, $this->dbpass);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->pdo = $conn;
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}
	}
}