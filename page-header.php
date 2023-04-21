<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutor - Teams Scheduler</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="assets/css/mystyle.css" type="text/css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">

</head>
<body> 
       
        <header>
                <h1 style= "text-shadow: 3px 3px 3px #ababab; font-family: 'Audiowide', sans-serif;">Tutors - Teams Scheduler</h1>

                <div class="navbar">
                    <nav>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Our vision</a></li>
                            <li><a href="#">Our mission</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Latest tips</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">FAQs</a></li>
                            <?php
                            if (isset($_SESSION["userdata"]) && basename($_SERVER['PHP_SELF']) == "tutors.php") {
                                echo "<li><a href='index-main.php'>Return to Booking</a></li>";
                            }
                            ?>
                            <?php
                            if (isset($_SESSION["userdata"])){
                                echo "
                                <div class = 'navbar2'>
                                    <nav>
                                        <ul>
                                            <li><a href='tutors.php'>Our Tutors</a></li>
                                            <li><a href='logout.php'>Log Out</a></li>
                                        </ul>
                                    </nav>
                                </div>";
                            }
                            else {
                                echo "
                                    <div class = 'navbar2'>
                                        <nav>
                                            <ul>
                                                <li><a href='login.php'>Log in</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    ";
                            }
                        ?>
                        </ul>               
                    </nav>
                </div> 
        </header>
        <br>
</body>
</html>