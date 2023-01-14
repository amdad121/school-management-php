<?php $page_title = 'Profile Edit'; include_once 'inc/header.php'; ?>
<?php include_once 'classes/Course.php'; ?>

<?php 
    if (isset($_GET['action']) == 'edit' && isset($_GET['id'])) {
    	$id = $_GET['id'];
		$crs = new Course();
    	$res = $crs->courseById($id);
    }
 ?>
<?php if (isset($_SESSION['id'])) : ?>
	<div class="panel-body">
		<form class="form-horizontal" action="" method="POST">
				<fieldset>
				<legend>Course Info</legend>
				<div class="form-group">
					<label for="crs" class="col-sm-3 control-label">Course Name</label>
					<div class="col-sm-8">
						<input type="text" id="crs" name="crs" value="<?php echo $res['name']; ?>" class="form-control">
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend></legend>
				<button style="font-weight:bold;margin-bottom: 15px;" class="btn btn-default pull-right" name="course">UPDATE COURSE</button>
			</fieldset>
		</form>
	</div>
<?php include_once 'inc/footer.php'; ?>
<?php else: header('location: login.php'); endif;  ?>