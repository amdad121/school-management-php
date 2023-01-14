<?php include_once 'Database.php';
/**
* User
*/
class User
{	
	private $db;
	private $dbtbl = 'users';
	
	function __construct()
	{
		$db = new Database();
		$this->db = $db;
	}

	public function register($data)
	{
		$uname = strtolower($data['username']);
		$name = ucwords($data['name']);
		$email = strtolower($data['email']);
		$pass = md5($data['password']);

		$sql = "INSERT INTO $this->dbtbl (uname, name, email, pass, created, updated) VALUES (:uname, :name, :email, :pass, now(), now())";
		$stmt = $this->db->pdo->prepare($sql);
		$res = $stmt->execute(array(
			':uname' 	=> $uname,
			':name'		=> $name,
			':email'	=> $email,
			':pass'		=> $pass
			));

		if ($res) {
            return '<div class="alert alert-success"><strong>Success! </strong>You Are Successfully Registered. Now you can Login <a class="alert-link" href="index.php">here</a>.</div>';
		}
	}
	public function login($data)
	{
		$email = $data['email'];
		$pass = md5($data['password']);

		if (!empty($data['rem'])) {
			if (!empty($email) && !empty($pass)) {
				$cookie_name = $email;
				$cookie_value = $pass;
				setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			}
		}

		$sql = "SELECT * FROM $this->dbtbl WHERE email=:email AND pass=:pass";
		$stmt = $this->db->pdo->prepare($sql);
		$stmt->execute(array(
			':email'	=> $email,
			':pass'	=> $pass
			));
		if ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			$_SESSION['id'] = $row->id;
			$_SESSION['email'] = $row->email;
			$_SESSION['uname'] = $row->uname;
			$_SESSION['name'] = $row->name;
			$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Success! </strong>You Are Successfully Logged in.</div>';
			header('location: dashbord.php');
			return $_SESSION;
		} else {
            return '<div class="alert alert-danger"><strong>Error! </strong>Your Email or Password is not correct!</div>';
		}
	}
}