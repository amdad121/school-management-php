<?php $page_title = 'Profile Edit'; include_once 'inc/header.php'; ?>
<?php include_once 'classes/Student.php'; ?>

<?php 
    $stdn = new Student();
    if (isset($_GET['id'])) {
    	$id = $_GET['id'];

    	$res = $stdn->studentById($id);

    	if (isset($_POST['update'])) {
		$udt = $stdn->updateStudent($_POST, $id);
		}
    }
 ?>
<?php if (isset($_SESSION['id'])) : ?>
		<div class="panel-body">
		<?php if (isset($udt)) {
			echo $udt;
		} ?>
			<form action="" method="POST" enctype="multipart/form-data">
				<fieldset>
					<legend>Personal Info</legend>
					<div class="col-sm-6 form-group">
						<label for="nam" class="control-label">Student Name</label>
						<input type="text" id="nam" name="nam" value="<?php echo $res['name']; ?>" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label for="fnm" class="control-label">Father's Name</label>
						<input type="text" id="fnm" name="fnm" value="<?php echo $res['fname']; ?>" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label for="gdr" class="control-label">Gender</label>
						<select id="gdr" name="gdr" class="form-control">
							  <option value="">Select Gender</option>
							  <option value="Male" <?php if ($res['gender'] == 'Male') { echo 'selected';} ?>>Male</option>
							  <option value="Female" <?php if ($res['gender'] == 'Female') { echo 'selected';} ?>>Female</option>
						</select>
					</div>
					<div class="col-sm-6 form-group">
						<label for="dob" class="control-label">Dath of Birth</label>
						<input type="date" id="dob" name="dob" value="<?php echo $res['dob']; ?>" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label for="phn" class="control-label">Phone NO.</label>
						<input type="text" id="phn" name="phn" value="<?php echo $res['phone']; ?>" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label for="eml" class="control-label">Email ID</label>
						<input type="text" id="eml" name="eml" value="<?php echo $res['email']; ?>" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label for="fid" class="control-label">Facebook ID</label>
						<input type="text" id="fid" name="fid" value="<?php echo $res['facebook']; ?>" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label for="skp" class="control-label">Skype ID</label>
						<input type="text" id="skp" name="skp" value="<?php echo $res['skype']; ?>" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label for="tad" class="control-label">Present Address</label>
						<input type="text" id="tad" name="tad" value="<?php echo $res['preaddress']; ?>" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label for="pad" class="control-label">Parmanent Address</label>
						<input type="text" id="pad" name="pad" value="<?php echo $res['paraddress']; ?>" class="form-control">
					</div>
				</fieldset>
				<fieldset>
					<legend>Course Info</legend>
					<div class="col-sm-6 form-group">
						<label for="crs" class="control-label">Course Name</label>
						<select id="crs" name="crs" class="form-control">
							  <option>Select Course</option>

							  <?php $sql = "SELECT * FROM courses";
							  	$result = $stdn->viewStudent($sql);
							  	while ($row = $result->fetch(PDO::FETCH_OBJ)) : ?>

							  	<option value="<?php echo $row->id; ?>" <?php if ($res['courses'] == $row->id) {echo "selected";} ?>><?php echo $row->name; ?></option>

							  <?php endwhile; ?>
						</select>
					</div>
					<div class="col-sm-6 form-group">
						<label for="bth" class="control-label">Betch NO.</label>
						<input type="text" id="bth" name="bth" value="<?php echo $res['betch']; ?>" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label for="cds" class="control-label">Course Start</label>
						<input type="date" id="cds" name="cds" value="<?php echo $res['cstart']; ?>" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label for="cde" class="control-label">Course End</label>
						<input type="date" id="cde" name="cde" value="<?php echo $res['cend']; ?>" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label for="sid" class="control-label">Student ID</label>
						<input type="text" id="sid" name="sid" value="<?php echo $res['sid']; ?>" class="form-control">
					</div>
					<div class="col-sm-6 form-group">
						<label for="pmt" class="control-label">Payment</label>
						<div class="input-group">
						<span class="input-group-addon">৳</span>
							<input type="number" id="pmt" name="pmt" value="<?php echo $res['payment']; ?>" class="form-control">
						</div>
					</div>
				</fieldset>
				<fieldset>
					<legend></legend>
					<button style="font-weight:bold;margin-bottom: 15px;" class="btn btn-default pull-left" name="delete" onclick="return confirm('Are you sure you want to delete this Student?')">DELETE</button>
					<button style="font-weight:bold;margin-bottom: 15px;" class="btn btn-default pull-right" name="update">UPDATE STUDENT</button>
				</fieldset>
			</form>
		</div>
<?php include_once 'inc/footer.php'; ?>
<?php else: header('location: login.php'); endif;  ?>