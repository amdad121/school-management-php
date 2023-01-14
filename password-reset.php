<?php $page_title = 'Password Change'; include_once 'inc/header.php'; ?>
<?php include_once 'classes/Student.php'; ?>
<?php if (isset($_SESSION['id'])) : ?>

<?php 
	$stdn = new Student();
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change'])) {
		$pass = $stdn->passChange($_POST['change']);
		var_dump($pass['email']);
	}
?>
	<div class="panel-body">
		<fieldset>
			<legend style="margin-bottom: 10px;">Password Change</legend>
			<form action="" method="POST">
				<div class="form-group">
					<label for="eml">Email</label>
					<input type="email" class="form-control" name="eml" id="eml">
				</div>
				<div class="form-group">
					<label for="pws">New Password</label>
					<input type="password" class="form-control" name="pws" id="pws">
				</div>
				<div class="form-group">
					<label for="pws2">New Password Again</label>
					<input type="password" class="form-control" name="pws2" id="pws2">
				</div>
				<button name="change" class="btn btn-default pull-right">Submit</button>
			</form>
		</fieldset>
	</div>
<?php include_once 'inc/footer.php'; ?>
<?php else: header('location: login.php'); endif;  ?>