<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}

	$type 	= $conn->real_escape_string($_POST['medtype']);
	$name	= $conn->real_escape_string($_POST['medname']);
	$ava	= $conn->real_escape_string($_POST['avail']);
	$dt1 	= $conn->real_escape_string($_POST['date1']);
    $dt2 	= $conn->real_escape_string($_POST['date2']);
	$stk	= $conn->real_escape_string($_POST['stock']);
   
	$select = " SELECT * FROM medicine WHERE medname = '$name' AND  date2= '$dt2' ";
    $result = mysqli_query($conn, $select);
  	
	

	if (mysqli_num_rows($result) > 0) {
        $_SESSION['message'] = 'Medicine already exist!';
        $_SESSION['success'] = 'danger';    
    }

    elseif(!empty($name) && ($type)){

        $insert  = "INSERT INTO medicine (`medtype`, `medname`, `avail`, `date1`, `date2`, `stock`) 
                    VALUES ('$type', '$name', '$ava','$dt1','$dt2','$stk')";
        $result  = $conn->query($insert);

    
        if($result === true){
            $_SESSION['message'] = 'medicine added!';
            $_SESSION['success'] = 'success';

        }else{
            $_SESSION['message'] = 'Something went wrong!';
            $_SESSION['success'] = 'danger';
        }
        
	}
     header("Location: ../medicine.php");

	$conn->close();