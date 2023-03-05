<?php 
	include('../server/server.php');

    if(!isset($_SESSION['username'])){
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    
	$username  = $conn->real_escape_string($_POST['username']);
	$password	= sha1($conn->real_escape_string($_POST['password']));
    $user_type	= $conn->real_escape_string($_POST['user_type']);

    $select = " SELECT * FROM tbl_users WHERE username = '$username' ";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message'] = 'User already exist!';
        $_SESSION['success'] = 'danger';
    }

    elseif(!empty($username) && !empty($password)){

        $insert  = "INSERT INTO tbl_users (`username`, `password`, `user_type`) 
                    VALUES ('$username', '$password', '$user_type')";
        $result  = $conn->query($insert);

    
        if($result === true){
            $_SESSION['message'] = 'user added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }
        

    
    
    } 

    
    
    
    
    else{

        $_SESSION['message'] = 'Please fill up the form completely!';
        $_SESSION['success'] = 'danger';
    }

    header("Location: ../login.php");

	$conn->close();
