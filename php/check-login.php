<?php  
session_start();
include "../config.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$email = test_input($_POST['email']);
	$password = test_input($_POST['password']);

	if (empty($email)) {
		header("Location: ../login.php?error=Email is Required");
	}else if (empty($password)) {
		header("Location: ../login.php?error=Password is Required");
	}else {

		// Hashing the password
		$password = password_hash($Passwd, PASSWORD_DEFAULT);

        
        $sql = "SELECT * FROM auth_users WHERE email='$email' AND password='$password'";


        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1 ) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
        	if ($row['password'] === $password && $row['email'] == $email) {
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['id'] = $row['id'];
        		$_SESSION['email'] = $row['email'];

				header("Location: ../index-main.php");

        	}else {
        		header("Location: ../login.php?error=Incorrect email or password");
        	}
        }else {
        	header("Location: ../login.php?error=Incorrect email or password");
        }

	}
	
}else {
	header("Location: ../login.php");
}