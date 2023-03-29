<?php
require_once '../config.php';
require_once 'mydef-func.incl.php';
require_once ("../ESAPI/src/ESAPI.php");

$validator = ESAPI::getValidator();

if (isset($_POST["submit"])) {
  $Email = $validator->getValidEmail('POST', 'email', 'Email', 255, false);
  $Passwd = $validator->getValidInput('POST', 'password', 'Password', 'Password', 255, false);
  
  if (empty($Email)) {
    header("Location: ../login.php?error=Email is Required");
    exit();
  } else if (empty($Passwd)) {
    header("Location: ../login.php?error=Password is Required");
    exit();
} else {
    loginUser($conn, $Email, $Passwd);
}
} else {
header("Location: ../login.php");
exit();
}
?>



