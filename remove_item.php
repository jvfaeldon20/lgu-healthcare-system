<?php include 'server/server.php' ?>
<?php
    $delID = $_GET['id'];
    $table = $_GET['tbl'];
    $returnPage = $_GET['page'];
    $query = "DELETE FROM $table WHERE id=$delID";
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to remove item!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully removed item!';
        $_SESSION['success'] = 'success';
    }
    header('location: '.$returnPage.'.php');
?>