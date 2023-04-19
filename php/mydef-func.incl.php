<?php

#Empty input functions for signup

function emptyInputSignup($Name, $Email, $Passwd, $PasswdRepeat) {

  $result; #state variable for whether true or false 
    if (empty($Name) || empty($Email) || empty($Passwd) || empty($PasswdRepeat)) {
    $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


#check for invalid characters in user's name

function invalidName($Name) {
  $result; #state variable for whether true or false 
    if (!preg_match("/^[a-zA-Z0-9]*$/", $Name)) {
    $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

#check for invalid characters in email

function invalidUid($Email) {
  $result; #state variable for whether true or false 
    if (!preg_match("/^[a-zA-Z0-9.@]*$/", $Email)) {
    $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


#check if invalid email address

  function invalidEmail($Email) {
    $result; #state variable for whether true or false 
      if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
      }
      else {
          $result = false;
      }
      return $result;
  }

  #Check for matching password

  function PasswdMatch($Passwd, $PasswdRepeat) {
    $result; #state variable for whether true or false 
      if ($Passwd !== $PasswdRepeat) {
        $result = true;
      }
      else {
          $result = false;
      }
      return $result;
  }

  function uidExists($conn, $Name, $Email) {
    $sql = "SELECT * FROM auth_users WHERE name = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=failedstmt");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $Name, $Email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);
  }

  function createUser($conn,$Name, $Email, $Passwd) {
    $sql = "INSERT INTO auth_users (name, email, password) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=failedstmt");
        exit();
    }
    $sql = "SELECT * FROM auth_users WHERE name = '$Name' AND email='$Email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        header("location: ../index.php?success");
        exit();
      } else {
        echo "You've got an error!!!";
      }
    
    
#password hashing

    $hashedPasswd = password_hash($Passwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $Name, $Email, $hashedPasswd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../successful-signup.php?error=none");
    exit();
}

#Empty input functions for login

function emptyInputLogin($Email, $Passwd) {
  $result; #state variable for whether true or false 
    if (empty($Email) || empty($Passwd)) {
    $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


function loginUser($conn, $Email, $Passwd) {
  $uidExists = uidExists($conn, $Email, $Email);

  if ($uidExists === false) {
    header("location: ../login.php?error=Loginincorrect!");
    exit();
  }
  $hashedPasswd = $uidExists["password"];
  $checkPwd = password_verify($Passwd, $hashedPasswd);

  if ($checkPwd === false) {
    header("location: ../login.php?error=Loginincorrect!");
    exit();  
  }
  else if ($checkPwd === true) {
    session_start();
    $cookie_value = sha1(mt_rand() . time() . "Impossible");
    setcookie("SchSession", $cookie_value, time()+1800, "/vulnerabilities/weak_id/", $_SERVER['HTTP_HOST'], true, true);
    $_SESSION["session_id"] = $cookie_value;
    $_SESSION["userid"] = $uidExists["id"];
    $_SESSION["userdata"] = $uidExists["name"];
    header("location: ../index-main.php?successful");
    exit(); 
    if (isset($_SESSION['expire_time']) && time() > $_SESSION['expire_time']) {
      // Destroy the session and unset all session variables
      session_unset();
      session_destroy();
      header("Location: index.php");
  }
  }



}

