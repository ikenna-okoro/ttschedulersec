<?php
require_once("config.php");
include_once 'page-header.php';         
?>
<div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 ">
                    <div class="appoinment-content">
                        <img src="uploads/booking_call.jpg" alt="" class="img-fluid" id="frontpageimage"/>
                        Image by <a href="https://www.freepik.com/free-photo/schedule-time-management-planner-concept_16459048.htm#query=call%20booking&position=35&from_view=search&track=ais">rawpixel</a>
                        <div class="emergency">
                            <h2 class="text-lg"><i class="icofont-phone-circle text-lg"></i>+44 7359 337375</h2><br>
                            <h2 class="text-lg"><i class="icofont-phone-circle text-lg"></i>tutorteams@ttappmail.co.ac.uk</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10 ">
                    <div class="appoinment-wrap mt-5 mt-lg-0">
                        <h2 class="mb-2 title-color">Book appoinment</h2>
                        <p class="mb-4">
                            Give us a call Mondays to Friday within the hours of 9am to 4pm. We hope to get back to you as soon as possible to confirm meeting with your desired tutor.
                        </p>
                        <a href="index-main.php">Or return to <b>Secure an Appointment!</b></a><br><br>			
<div class="card-body">
	<div class="container-fluid">
        <h1 class="display-4 fs-1">Available Tutors</h1>
        <div class="container-fluid">
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>S/N</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name from `users` where id != '1' and id != '{$_settings->userdata('id')}' and `type` != 3 order by concat(firstname,' ',lastname) asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo ucwords($row['name']) ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


</div>
<br>
<br>
<br>