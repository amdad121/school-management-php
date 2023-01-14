<?php $page_title = 'Add Student'; include_once 'inc/header.php'; ?>
<?php include_once 'classes/Student.php'; ?>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['student'])) {
    	$stdn = new Student();
        $stdnRes = $stdn->addStudent($_POST);
    }
 ?>
<?php if (isset($_SESSION['id'])) : ?>
	<div class="panel-body">
	<?php if (isset($stdnRes)) {echo $stdnRes;} ?>
		<form action="" method="POST" enctype="multipart/form-data">
			<fieldset>
				<legend>Personal Info</legend>
				<div class="col-sm-6 form-group">
					<label for="nam" class="control-label">Student Name</label>
					<input type="text" id="nam" name="nam" class="form-control">
				</div>
				<div class="col-sm-6 form-group">
					<label for="fnm" class="control-label">Father's Name</label>
					<input type="text" id="fnm" name="fnm" class="form-control">
				</div>
				<div class="col-sm-6 form-group">
					<label for="gdr" class="control-label">Gender</label>
					<select id="gdr" name="gdr" class="form-control">
							<option value="">Select Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
					</select>
				</div>
				<div class="col-sm-6 form-group">
					<label for="dob" class="control-label">Dath of Birth</label>
					<input type="date" id="dob" name="dob" class="form-control">
				</div>
				<div class="col-sm-6 form-group">
					<label for="phn" class="control-label">Phone NO.</label>
					<input type="text" id="phn" name="phn" class="form-control">
				</div>
				<div class="col-sm-6 form-group">
					<label for="eml" class="control-label">Email ID</label>
					<input type="text" id="eml" name="eml" class="form-control">
				</div>
				<div class="col-sm-6 form-group">
					<label for="fid" class="control-label">Facebook ID</label>
					<input type="text" id="fid" name="fid" class="form-control">
				</div>
				<div class="col-sm-6 form-group">
					<label for="skp" class="control-label">Skype ID</label>
					<input type="text" id="skp" name="skp" class="form-control">
				</div>
				<div class="col-sm-6 form-group">
					<label for="tad" class="control-label">Present Address</label>
					<input type="text" id="tad" name="tad" class="form-control">
				</div>
				<div class="col-sm-6 form-group">
					<label for="pad" class="control-label">Parmanent Address</label>
					<input type="text" id="pad" name="pad" class="form-control">
				</div>
			</fieldset>
			<fieldset>
				<legend>Course Info</legend>
				<div class="col-sm-6 form-group">
					<label for="crs" class="control-label">Course Name</label>
					<select id="crs" name="crs" class="form-control">
							<option>Select Course</option>

							<?php $sql = "SELECT * FROM courses";
							$res = $stdn->viewStudent($sql);
							while ($row = $res->fetch(PDO::FETCH_OBJ)) : ?>

							<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>

							<?php endwhile; ?>

					</select>
				</div>
				<div class="col-sm-6 form-group">
					<label for="bth" class="control-label">Betch NO.</label>
					<input type="text" id="bth" name="bth" class="form-control">
				</div>
				<div class="col-sm-6 form-group">
					<label for="cds" class="control-label">Course Start</label>
					<input type="date" id="cds" name="cds" class="form-control">
				</div>
				<div class="col-sm-6 form-group">
					<label for="cde" class="control-label">Course End</label>
					<input type="date" id="cde" name="cde" class="form-control">
				</div>
				<div class="col-sm-6 form-group">
					<label for="sid" class="control-label">Student ID</label>
					<input type="text" id="sid" name="sid" class="form-control">
				</div>
				<div class="col-sm-6 form-group">
					<label for="pmt" class="control-label">Payment</label>
					<div class="input-group">
					<span class="input-group-addon">৳</span>
						<input type="number" id="pmt" name="pmt" class="form-control">
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend></legend>
				<div class="col-sm-6 form-group">
					<input type="file" id="pic" name="pic">
					<p class="help-block">Available Formats: JPG, JPEG, PNG</p>
				</div>
				<button style="font-weight:bold;margin-bottom: 15px;" class="btn btn-default pull-right" name="student">ADD STUDENT</button>
			</fieldset>
		</form>
	</div>
<?php include_once 'inc/footer.php'; ?>
<?php else: header('location: login.php'); endif;  ?>