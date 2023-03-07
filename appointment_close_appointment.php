<?php include 'server/server.php' ?>
<?php
    $id = $_GET['id'];
    $tbl = $_GET['tbl'];
    $page = $_GET['page'];
    $query = "UPDATE $tbl SET status ='completed'WHERE id='$id'";
    
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to close appointment!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully closed appointment!';
        $_SESSION['success'] = 'success';
    }
    header('location: appointment.php');
?>