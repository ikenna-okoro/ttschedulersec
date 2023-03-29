<?php
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `appointments` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
    $qry2 = $conn->query("SELECT * FROM `student_meta` where student_id = '{$student_id}' ");
    foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
        $student[$row['meta_field']] = $row['meta_value'];
    }
  }
?>
<style>
#uni_modal .modal-content>.modal-footer{
    display:none;
}
#uni_modal .modal-body{
    padding-bottom:0 !important;
}
</style>
<div class="container-fluid">
    <p><b>Appointment Schedule:</b> <?php echo date("F d, Y",strtotime($date_sched))  ?></p>
    <p><b>Student Name:</b> <?php echo $student['name'] ?></p>
    <p><b>Phone number:</b> <?php echo $student['contact'] ?></p>
    <p><b>Email:</b> <?php echo $student['email'] ?></p>
    <p><b>Address:</b> <?php echo $student['address'] ?></p>
    <p><b>Message to tutor:</b> <?php echo $message ?></p>
    <p><b>Status:</b>
        <?php 
        switch($status){ 
            case(0): 
                echo '<span class="badge badge-primary">Pending</span>';
            break; 
            case(1): 
            echo '<span class="badge badge-success">Confirmed</span>';
            break; 
            case(2): 
                echo '<span class="badge badge-danger">Cancelled</span>';
            break; 
            default: 
                echo '<span class="badge badge-secondary">NA</span>';
        }
        ?>
    </p>
</div>
<div class="modal-footer border-0">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
