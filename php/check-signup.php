<?php

if (isset($_POST["submit"])) {
    
    #We define parameters posted from form as variables with corresponding super globals
    $Name = $_POST["name"];
    $Email = $_POST["Email"];
    $Passwd = $_POST["Passwd"];
    $PasswdRepeat = $_POST["PasswdRepeat"];


    require_once '../config.php';
    require_once 'mydef-func.incl.php';

    if (emptyInputSignup($Name, $Email, $Passwd, $PasswdRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($Email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (PasswdMatch($Passwd, $PasswdRepeat) !== false) {
        header("location: ../signup.php?error=passwordsdonotmatch");
        exit();
    }
    if (uidExists($conn, $Name, $Email) !== false) {
        header("location: ../signup.php?error=usernamealreadyexists");
        exit();
    }

    createUser($conn, $Name, $Email, $Passwd);

    echo "You have successfully signed up!";
    exit();

}

?>