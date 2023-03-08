<?php include 'server/server.php' ?>
<?php
    $id = $_GET['id'];
    $query = "DELETE FROM tbl_users WHERE id='$id'";
    
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to delete user!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully deleted user!';
        $_SESSION['success'] = 'success';
    }
    header('location: manage-user.php');
?>