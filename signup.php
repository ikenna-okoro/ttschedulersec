<?php

require_once("config.php");
require_once("inc/header.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tutor Teams Signup</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        Padding-top:50px;
        Padding-bottom:50px; 
    }
</style>
</head>
<body class="hold-transition dark-mode" >

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="./" class="h1"><b>Student Signup</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register your detail here</p>

            <form class="border shadow p-3 rounded" action="php/check-signup.php" method="post">
            <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<div id='erroralert' style='text-align:center'><p style='color:skyblue'>Please fill in all fields!</p></div><br>";
        } else if ($_GET["error"] == "invalidemail") {
            echo "<div id='erroralert' style='text-align:center><p style='color:skyblue'>Enter a valid email address!</p></div>";
        } else if ($_GET["error"] == "passwordsdonotmatch") {
            echo "<div id='erroralert' style='text-align:center><p style='color:skyblue'>Please re-confirm. Your Passwords don't match!</p></div>";
        } else if ($_GET["error"] == "failedstmt") {
            echo "<div id='erroralert' style='text-align:center><p style='color:skyblue'>Oops! Sorry, process failed. Try again please!</p></div>";
        } else if ($_GET["error"] == "usernamealreadyexists") {
            echo "<div id='erroralert' style='text-align:center><p style='color:skyblue'>Your choice already exists in our system!</p></div>";
        }
    }
            ?>
                <div class="input-group mb-3">
                <input type="text" name="name" placeholder="Full name" style="width: 250px;">
                <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div><br>
                <div class="input-group mb-3">
                <input type="email" name="Email" placeholder="Email" style="width: 250px;">
                <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div><br>
                <div class="input-group mb-3">
                <input type="password" name="Passwd" placeholder = "Password" style="width: 250px;">
                <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
                <div class="input-group mb-3">
                  <input type="password" name="PasswdRepeat" placeholder="Confirm password" style="width: 250px;">
                  <div class="input-group-append">
                  </div>
                </div><br><br>
        <div class="row" style="display: flex; justify-content: center;align-items: center">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name ="submit">Sign Up</button>
                </div>
</div><br>
            </form>
  </div>
</body>
</html>