<?php include_once 'Database.php';
/**
* Batch
*/
class Batch
{
	private $db;
	private $dbtbl = 'courses';
	
	function __construct()
	{
		$db = new Database();
		$this->db = $db;
	}

	public function addCourse($data)
	{
		$name = $data['crs'];

		if (empty($name)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Feild must not be empty!</div>';
		} else {
			$sql = "INSERT INTO $this->dbtbl (name) VALUES (:name)";
			$stmt = $this->db->pdo->prepare($sql);
			$res = $stmt->execute(array(
				':name' 	=> $name
				));
			if ($res) {
				$res = '<div class="alert alert-success"><strong>Success! </strong>Course Successfully Added.</div>';
				return $res;
			}
		}
		return $msg;
	}
}