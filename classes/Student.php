<?php include_once 'Database.php';
/**
* Student add
*/
class Student
{
	private $db;
	private $dbtbl = 'students';
	
	function __construct()
	{
		$db = new Database();
		$this->db = $db;
	}

	public function addStudent($data)
	{
		$nam = ucwords($data['nam']);
		$fnm = ucwords($data['fnm']);
		$gdr = ucwords($data['gdr']);
		$dob = $data['dob'];
		$phn = $data['phn'];
		$eml = $data['eml'];
		$skp = $data['skp'];
		$fid = $data['fid'];
		$tad = $data['tad'];
		$pad = $data['pad'];
		$crs = $data['crs'];
		$bth = $data['bth'];
		$cds = $data['cds'];
		$cde = $data['cde'];
		$sid = $data['sid'];
		$pmt = $data['pmt'];

		if (!empty($nam) && !empty($fnm) && !empty($gdr) && !empty($dob) && !empty($phn) && !empty($eml) && !empty($skp) && !empty($fid) && !empty($tad) && !empty($pad) && !empty($crs) && !empty($bth) && !empty($cds) && !empty($cde) && !empty($sid) && !empty($pmt)) {
			
			//Image Upload
			if (isset($_FILES['pic']['name'])) {
				$pic = $_FILES['pic']['name'];
				$target = "assets/img/".basename($_FILES['pic']['name']);

				move_uploaded_file($_FILES['pic']['tmp_name'], $target);

				$sql = "INSERT INTO $this->dbtbl (name, fname, gender, dob, phone, email, facebook, skype, preaddress, paraddress, courses, betch, cstart, cend, sid, payment, image, updated, created) VALUES (:name, :fname, :gender, :dob, :phone, :email, :facebook, :skype, :preaddress, :paraddress, :courses, :betch, :cstart, :cend, :sid, :payment, :image, now(), now())";
				$stmt = $this->db->pdo->prepare($sql);
				$res = $stmt->execute(array(
					':name' 		=> $nam,
					':fname'		=> $fnm,
					':gender'		=> $gdr,
					':dob'			=> $dob,
					':phone'		=> $phn,
					':email'		=> $eml,
					':facebook'		=> $fid,
					':skype'		=> $skp,
					':preaddress'	=> $tad,
					':paraddress'	=> $pad,
					':courses'		=> $crs,
					':betch'		=> $bth,
					':cstart'		=> $cds,
					':cend'			=> $cde,
					':sid'			=> $sid,
					':payment'		=> $pmt,
					':image'		=> $pic
					));

				if ($res) {
                    return '<div class="alert alert-success"><strong>Success! </strong>Student Successfully Added.</div>';
				}
			}
		} else {
            return '<div class="alert alert-danger"><strong>Error! </strong>Field must not be Empty</div>';
		}
	}

	public function viewStudent($sql)
	{
		$stmt = $this->db->pdo->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	public function updateStudent($data, $id)
	{	
		$nam = ucwords($data['nam']);
		$fnm = ucwords($data['fnm']);
		$gdr = ucwords($data['gdr']);
		$dob = $data['dob'];
		$phn = $data['phn'];
		$eml = $data['eml'];
		$skp = $data['skp'];
		$fid = $data['fid'];
		$tad = $data['tad'];
		$pad = $data['pad'];
		$crs = $data['crs'];
		$bth = $data['bth'];
		$cds = $data['cds'];
		$cde = $data['cde'];
		$sid = $data['sid'];
		$pmt = $data['pmt'];

		if (!empty($nam) && !empty($fnm) && !empty($gdr) && !empty($dob) && !empty($phn) && !empty($eml) && !empty($skp) && !empty($fid) && !empty($tad) && !empty($pad) && !empty($crs) && !empty($bth) && !empty($cds) && !empty($cde) && !empty($sid) && !empty($pmt)) {

			$sql = "UPDATE $this->dbtbl SET name=:name, fname=:fname, gender=:gender, dob=:dob, phone=:phone, email=:email, facebook=:facebook, skype=:skype, preaddress=:preaddress, paraddress=:paraddress, courses=:courses, betch=:betch, cstart=:cstart, cend=:cend, sid=:sid, payment=:payment, now() WHERE id=:id";
			$stmt = $this->db->pdo->prepare($sql);
			$res = $stmt->execute(array(
						':name' 		=> $nam,
						':fname'		=> $fnm,
						':gender'		=> $gdr,
						':dob'			=> $dob,
						':phone'		=> $phn,
						':email'		=> $eml,
						':facebook'		=> $fid,
						':skype'		=> $skp,
						':preaddress'	=> $tad,
						':paraddress'	=> $pad,
						':courses'		=> $crs,
						':betch'		=> $bth,
						':cstart'		=> $cds,
						':cend'			=> $cde,
						':sid'			=> $sid,
						':payment'		=> $pmt,
						':id'			=> $id
						));
			if ($res) {
                return '<div class="alert alert-success"><strong>Success! </strong>Student Successfully Added.</div>';
				}
		} else {
            return '<div class="alert alert-danger"><strong>Error! </strong>Field must not be Empty</div>';
		}
	}

	public function studentById($id)
	{
		$sql = "SELECT * FROM  $this->dbtbl WHERE id=:id";
		$stmt = $this->db->pdo->prepare($sql);
		$stmt->execute(array(
			':id'	=> $id
			));
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function totalCount()
	{
		$sql = "SELECT * FROM  $this->dbtbl";
		$stmt = $this->db->pdo->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	public function search($data)
	{
		$sql = "SELECT * FROM $this->dbtbl WHERE name LIKE '%$data%' OR email LIKE '%$data%'";
		$stmt = $this->db->pdo->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	public function pagi($query, $page, $perpage)
	{
        $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;
        return $query." LIMIT $start, $perpage";
	}

	public function pagination($sql, $perpage)
	{
		$stmt = $this->db->pdo->prepare($sql);
		$stmt->execute();
		$total = $stmt->rowCount();
        return ceil($total / $perpage);
	}

	public function passChange($data)
	{
		$email = $_POST['eml'];
		$pass1 = $_POST['pws'];
		$pass2 = $_POST['pws2'];

		$sql = "SELECT * FROM users WHERE email=:email";
		$stmt = $this->db->pdo->prepare($sql);
		$stmt->execute(array(
			':email' => $email
			));
		return $stmt->fetch();
	}
}