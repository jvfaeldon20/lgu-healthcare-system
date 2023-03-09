<?php include 'server/server.php' ?>
<?php
    $first_name = strtoupper($_POST['first_name']);
    $middle_name = strtoupper($_POST['middle_name']);
    $last_name = strtoupper($_POST['last_name']);
    $age = strtoupper($_POST['age']);
    $birthdate = strtoupper($_POST['birthdate']);
    $civil_status = strtoupper($_POST['civil_status']);
    $gender = strtoupper($_POST['gender']);
    $purok = strtoupper($_POST['purok']);
    $voterstatus = strtoupper($_POST['voterstatus']);
    $first_name = strtoupper($_POST['first_name']);


    $query = "INSERT INTO tblresident (firstname, 
                                        middlename, 
                                        lastname, 
                                        age, 
                                        birthdate, 
                                        civilstatus,
                                        gender,
                                        purok,
                                        voterstatus)
                VALUES ('$first_name',
                        '$middle_name',
                        '$last_name',
                        '$age',
                        '$birthdate',
                        '$civil_status',
                        '$gender',
                        '$purok',
                        '$voterstatus')";
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add resident!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully added resident!';
        $_SESSION['success'] = 'success';
    }
    header('location: resident.php');
?>