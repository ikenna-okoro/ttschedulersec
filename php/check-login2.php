<?php

session_start();
if (isset($_POST["submit"])) {

    $Email = $_POST["email"];
    $Passwd = $_POST["password"];

    require_once '../config.php';
    require_once 'mydef-func.incl.php';

	function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
  
      $Email = test_input($_POST['email']);
      $password = test_input($_POST['password']);
  
      if (empty($Email)) {
          header("Location: ../login.php?error=Email is Required");
      }else if (empty($password)) {
          header("Location: ../login.php?error=Password is Required");
      }else {
 
    loginUser($conn, $Email, $Passwd);
}
}
else {
    header("location: ../login.php");
    exit();
}


