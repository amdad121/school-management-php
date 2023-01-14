<?php $page_title = 'Add Course'; include_once 'inc/header.php'; ?>
<?php include_once 'classes/Course.php'; ?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['course'])) {
    	$crs = new Course();
        $res = $crs->addCourse($_POST);
    }
 ?>
<?php if (isset($_SESSION['id'])) : ?>
	<div class="panel-body">
	<?php if (isset($res)) {echo $res;} ?>
		<form class="form-horizontal" action="" method="POST">
				<fieldset>
				<legend>Course Info</legend>
				<div class="form-group">
					<label for="crs" class="col-sm-3 control-label">Course Name</label>
					<div class="col-sm-8">
						<input type="text" id="crs" name="crs" class="form-control">
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend></legend>
				<button style="font-weight:bold;margin-bottom: 15px;" class="btn btn-default pull-right" name="course">ADD COURSE</button>
			</fieldset>
		</form>
	</div>
<?php include_once 'inc/footer.php'; ?>
<?php else: header('location: login.php'); endif;  ?>