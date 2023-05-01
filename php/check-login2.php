
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
  
    if (emptyInputLogin($Email, $Passwd) !== false) {
        header("location: ../user-login.php?error=emptylogininput");
        exit();
    }else if (invalidUid($Email) !== false) {
        header("location: ../login.php?error=exceptional error!");
        exit();
    } else {
        loginUser($conn, $Email, $Passwd);
    }
    } else {
    header("Location: ../login.php");
    exit();
    }
    ?>





