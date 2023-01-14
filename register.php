<?php include_once 'classes/User.php'; ?>
<?php include_once 'classes/Validate.php'; ?>
<?php
    $vld = new Validate();
    $usr = new User();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        $data = $vld->regiValid($_POST);
        if (empty($data)) {
            $regi = $usr->register($_POST);
        }
    }

    if (!isset($_SESSION['id'])) :
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration :: SM</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div style="margin-top:50px;" class="panel panel-default">
                    <div style="margin-bottom:0;" class="panel panel-heading text-center">
                        <h2 style="margin:0;font-weight:600;">Registration</h2>
                    </div>
                    <div class="panel-body">
                        <?php if (isset($regi)) {echo $regi;} ?>
                        <form action="" method="post">
                            <div class="form-group <?php if (isset($data['uname'])) { echo 'has-error'; }; ?>">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control">
                                <div class="help-block"><?php if (isset($data['uname'])) { echo $data['uname']; }; ?></div>
                            </div>
                            <div class="form-group <?php if (isset($data['name'])) { echo 'has-error'; }; ?>">
                                <label class="control-label" for="name">Full Name</label>
                                <input type="tel" name="name" id="name" class="form-control">
                                <div class="help-block"><?php if (isset($data['name'])) { echo $data['name']; }; ?></div>
                            </div>
                            <div class="form-group <?php if (isset($data['email'])) { echo 'has-error'; }; ?>">
                                <label class="control-label" for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                                <div class="help-block"><?php if (isset($data['email'])) { echo $data['email']; }; ?></div>
                            </div>
                            <div class="form-group <?php if (isset($data['pass'])) { echo 'has-error'; }; ?>">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                <div class="help-block"><?php if (isset($data['pass'])) { echo $data['pass']; }; ?></div>
                            </div>
                            <button style="font-weight:bold;" class="btn btn-default btn-block" name="register">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
<?php else: header('location: dashbord.php'); endif;  ?>