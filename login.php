<?php session_start(); ?>
<?php include_once 'classes/User.php'; ?>
<?php include_once 'classes/Validate.php'; ?>
<?php 
    $vld = new Validate();
    $usr = new User();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $logmsg = $usr->login($_POST);
    }

    if (!isset($_SESSION['id'])) :
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login :: SM</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div style="margin-top:50px;" class="panel panel-default">
                    <div style="margin-bottom:0;" class="panel panel-heading text-center">
                        <h2 style="margin:0;font-weight:600;">Login</h2>
                    </div>
                    <div class="panel-body">
                    <?php if (isset($logmsg)) {echo $logmsg;} ?>
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="rem"> Remember Me
                                </label>
                            </div>
                            <button style="font-weight:bold;" class="btn btn-default btn-block" name="login">LOGIN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
<?php else: header('location: dashboard.php'); endif;  ?>