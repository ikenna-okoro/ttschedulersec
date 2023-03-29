<?php require_once('config.php'); ?>
 <!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>
<?php
include_once 'page-header.php';
?>
<body class="dark-mode">
    <div id="formContainer" style= "Padding-top:100px; Padding-bottom:200px">
        <?php
        if(isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo"<p style='color:red'>Please fill in all fields!</p>";
            }

            else if ($_GET["error"] == "invaliduid") {
                echo"<p style='color:red'>Create a valid Username!</p>";
            }
            else if ($_GET["error"] == "invalidemail") {
                echo"<p style='color:red'>Enter a valid email address!</p>";
            }
            else if ($_GET["error"] == "passwordsdonotmatch") {
                echo"<p style='color:red'>Please re-confirm. Your Passwords don't match!</p>";
            }
            else if ($_GET["error"] == "failedstmt") {
                echo"<p style='color:red'>Oops! Sorry, process failed. Try again please!</p>";
            }
            else if ($_GET["error"] == "usernamealreadyexists") {
                echo"<p style='color:red'>Please choose another username. Your choice exists in our system!</p>";
            }
            else if ($_GET["error"] == "none") {
                echo "<div id='success' 
                style= 'margin-right:300px; margin-left:300px; display: flex; justify-content:center; align-items:center'><p class='alert alert-success' role='alert'>You have successfully signed up. WELCOME!</p></div>";
            }
            
        }
        ?>
    </div>
</body>
<?php
include_once 'inc/footer.php';
?>