<?php include 'server/server.php' ?>
<?php
    $username = $_POST['username'];
    $display_name = strtoupper($_POST['display_name']);
    $user_type = $_POST['user_type'];
    $password = sha1($_POST['password']);


    $query = "INSERT INTO tbl_users (username, display_name, user_type, password, status )
                VALUES ('$username','$display_name','$user_type','$password',1)";
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add user!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully created user!';
        $_SESSION['success'] = 'success';
    }
    header('location: manage-user.php');
?>