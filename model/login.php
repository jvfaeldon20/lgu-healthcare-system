<?php 
	include '../server/server.php';

	$username 	= $conn->real_escape_string($_POST['username']);
	$password	= sha1($conn->real_escape_string($_POST['password']));


	if($username != '' AND $password != ''){
		$query 		= "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password' AND status=1";
		$result 	= $conn->query($query);
		
		if($result->num_rows){
			while ($row = $result->fetch_assoc()) {
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['role'] = $row['user_type'];
				$_SESSION['avatar'] = $row['avatar'];
				$_SESSION['display_name'] = $row['display_name'];
			}

			$_SESSION['message'] = 'You have successfully logged as <b class="text-primary">'.$_SESSION['role'].'</b> user!';
			$_SESSION['success'] = 'success';

            header('location: ../dashboard.php');

		}else{
			$_SESSION['message'] = 'Invalid login. Please try again!';
			$_SESSION['success'] = 'danger';
            header('location: ../login.php');
		}
	}else{
		$username 	= $conn->real_escape_string("resident");
		$password	= sha1($conn->real_escape_string("resident"));
		$query 		= "SELECT * FROM tbl_users WHERE username = '$username' AND password = '$password'";
		$result 	= $conn->query($query);
		
		if($result->num_rows){
			while ($row = $result->fetch_assoc()) {
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['role'] = $row['user_type'];
				$_SESSION['avatar'] = $row['avatar'];
				$_SESSION['display_name'] = $row['display_name'];
			}

			$_SESSION['message'] = 'You have successfully logged as general user!';
			$_SESSION['success'] = 'success';

            header('location: ../dashboard.php');

		}else{
			$_SESSION['message'] = 'Username or password is incorrect!';
			$_SESSION['success'] = 'danger';
            header('location: ../login.php');
		}
	}

    

	$conn->close();

