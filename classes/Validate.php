<?php 
include_once 'Database.php';

/**
* Validate
*/
class Validate
{	
	private $db;
	private $dbtbl = 'users';
	
	function __construct()
	{
		$db = new Database();
		$this->db = $db;
	}

	public function regiValid($data)
	{
		$uname = $data['username'];
		$name = $data['name'];
		$email = $data['email'];
		$pass = $data['password'];

		$emailCheck = $this->emailCheck($email);

		if (empty($uname)) {
			$err['uname'] = "Username field must not be empty!";
			return $err;
		}
		if (empty($name)) {
			$err['name'] = "Full Name field must not be empty!";
			return $err;
		}
		if (empty($email)) {
			$err['email'] = "Email field must not be empty!";
			return $err;
		} elseif ($emailCheck) {
			$err['email'] = "Email address already exist! Please Login <a href='index.php'>here</a>";
			return $err;
		}
		if (empty($pass)) {
			$err['pass'] = "Password field must not be empty!";
			return $err;
		} elseif (strlen($pass) < 6) {
			$err['pass'] = "Password must be at least 6 characters long!";
			return $err;
		}
	}

	public function emailCheck($email)
	{
		$sql = "SELECT * FROM $this->dbtbl WHERE email=:email";
		$stmt = $this->db->pdo->prepare($sql);
		$stmt->execute(array(
			':email'	=> $email
			));
		if ($stmt->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	
}