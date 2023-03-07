<?php include 'server/server.php' ?>
<?php
    $id = $_POST['id'];
    $status = "scheduled";
    $appointment_date = $_POST['appointment_date'];
    $remarks = $_POST['remarks'];
    $staff_in_charge = $_POST['staff_in_charge'];

    $query = "UPDATE tbl_appointment
                SET status='$status',
                    appointment_date = '$appointment_date',
                    remarks= '$remarks',
                    staff_in_charge= '$staff_in_charge'
              WHERE id='$id'";
    
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update item!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully updated item!';
        $_SESSION['success'] = 'success';
    }
    header('location: appointment.php');
?>