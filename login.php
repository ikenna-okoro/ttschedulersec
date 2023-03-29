<?php

require_once("config.php");
require_once("inc/header.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tutor Teams Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body class="hold-transition login-page  dark-mode">

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="./" class="h1"><b>Student Login</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login to schedule an appointment</p>
      	<form action="php/check-login2.php" 
      	      method="post">
				<?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-primary" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
				<div class="input-group mb-3">
          <input type="text" class="form-control" name="email" placeholder="Student email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		<div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name ="submit">Log In</button>
          </div>

          <p><a href="signup.php">Register here!</a></p>
          <!-- /.col -->
        </div>
		</form>
      </div>

    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
	  </body>
</html>