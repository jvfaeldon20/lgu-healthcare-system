<?php include 'server/server.php' ?>
<?php
    $resident_name = strtoupper($_POST['resident_name']);
    $age = $_POST['age'];
    $request_date = date("Y-m-d");
    $appointment_type = $_POST['appointment_type'];
    $concern = $_POST['concern'];
    $mobile_no = $_POST['mobile_no'];


    $query = "INSERT INTO tbl_appointment (resident_name, age, request_date, appointment_type, concern, status, staff_in_charge,mobile_no)
                VALUES ('$resident_name','$age','$request_date','$appointment_type','$concern','active', 'unassigned', '$mobile_no')";
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to create appointment!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully created an appointment!';
        $_SESSION['success'] = 'success';
    }
    header('location: appointment.php');
?>