<?php
include_once 'page-header.php';         
?>
<div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 ">
                    <div class="appoinment-content">
                        <img src="uploads/front image.jpg" alt="" class="img-fluid"/>
                        <div class="emergency">
                            <h2 class="text-lg"><i class="icofont-phone-circle text-lg"></i>+44 7548 889691</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10 ">
                    <div class="appoinment-wrap mt-5 mt-lg-0">
                        <h2 class="mb-2 title-color">Book appoinment</h2>
                        <p class="mb-4">
                            You can conveniently secure an appointment with a tutor here. We hope to get back to you as soon as possible to confirm meeting with your desired tutor.
                        </p>

                        <?php
                        if (isset($_POST['submit'])) {

                            if (isset($_POST['date']) && !empty($_POST['time']) && !empty($_POST['message']) && !empty($_POST['teamCode']) && !empty($_POST['tutName'])) {
                                $statement = $DB->prepare('INSERT INTO Appointments (date,time,description,teamCode,tutName,meetingID) VALUES (:date,:time,:description,:teamCode,:tutName,:meetingID ="")');



                                $is_done = $statement->execute([
                                    'date' => $_POST['date'],
                                    'time' => $_POST['time'],
				                    'description' => $_POST['message'],
                                    'teamCode' => $_POST['teamCode'],
				                    'tutName' => $_POST['tutName'],
                                    
                                ]);

                                if ($is_done) {
                                    echo "<p class='success'>Your appointment has been taken!</p>";
                                    header("Refresh:1;url= success.php");
                                }
                            } else {
                                echo "<p class='error'>Please fill out all form fields!</p>";
                            }
                        }
                        ?>

                        <form id="appointment" class="appoinment-form" method="post" action="success.php">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" id="tutor" name="tutor">
                                            <option>Choose a Tutor</option>
                                            <?php
                                            $stmt = $DB->prepare("SELECT * FROM Tutors");
                                            $stmt->execute();
                                            $tutors = $stmt->fetchAll();
                                            ?>
                                            <?php foreach ($tutors as $tutor): ?>
                                                <option value="<?php echo $tutor['tutName']; ?>"><?php echo $tutor['tutName']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="time" id="time" type="text" class="form-control" placeholder="Time">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="studName" id="name" type="text" class="form-control" placeholder="Team Rep's Full Name">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="email" id="email" type="email" class="form-control" placeholder="Student email">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" id="tutor" name="tutor">
                                            <option>Select Team Code</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                            <option>D</option>
                                            <option>E</option>
                                    </select> 
                                    </div>
                                </div>

                            </div>
                            <div class="form-group-2 mb-4">
                                <textarea name="message" id="message" class="form-control" rows="6" placeholder="Your Message"></textarea>
                            </div>

                            <input type="submit" name="submit" class="btn btn-main btn-round-full" value="Make Appoinment">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>