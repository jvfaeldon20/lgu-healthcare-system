<?php include 'server/server.php' ?>
<?php
    $id = $_GET['id'];
    $status = $_GET['status'];

    $query = "UPDATE tbl_users 
                SET status='$status'
              WHERE id='$id'";
    
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update user status!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully updated user status!';
        $_SESSION['success'] = 'success';
    }
    header('location: manage-user.php');
?>