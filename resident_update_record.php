<?php include 'server/server.php' ?>
<?php
    $id = $_POST['id'];
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


    $query = "UPDATE tblresident 
                SET firstname  ='$first_name',
                    middlename ='$middle_name',
                    lastname   ='$last_name',
                    age        ='$age', 
                    birthdate  ='$birthdate',
                    civilstatus='$civil_status',
                    gender     ='$gender',
                    purok      ='$purok',
                    voterstatus='$voterstatus' 
             WHERE id='$id'";
               
            $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update resident!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully updated resident!';
        $_SESSION['success'] = 'success';
    }
    header('location: resident.php');
?>