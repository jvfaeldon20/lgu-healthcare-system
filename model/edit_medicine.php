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
   
	
	

	$check = "SELECT id FROM medicine WHERE medname='$name'";
	$med = $conn->query($check)->fetch_assoc();	
	if($med['id'] == $id || count($nat) <= 0){
		if(!empty($id)){

			if(!empty($profile) && !empty($profile2)){

				$query = "UPDATE medicine SET `medtype`=$type , `medname`=$name, $ava=`avail`, $dt1=`date1`, $dt2=`date2`, $stk=`stock`
						WHERE id=$id;";

				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!';
					$_SESSION['success'] = 'success';
				}
			}else if(!empty($profile) && empty($profile2)){

				$query = "UPDATE medicine SET `medtype`=$type , `medname`=$name, $ava=`avail`, $dt1=`date1`, $dt2=`date2`, $stk=`stock`
						WHERE id=$id;";

				
				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!';
					$_SESSION['success'] = 'success';
				}

			}else if(empty($profile) && !empty($profile2)){

				$query = "UPDATE medicine SET `medtype`=$type , `medname`=$name, $ava=`avail`, $dt1=`date1`, $dt2=`date2`, $stk=`stock`
						WHERE id=$id;";


				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!!';
					$_SESSION['success'] = 'success';

					if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){

						$_SESSION['message'] = 'Resident Information has been updated!!';
						$_SESSION['success'] = 'success';
					}
				}

			}else{
				$query = "UPDATE medicine SET `medtype`=$type , `medname`=$name, $ava=`avail`, $dt1=`date1`, $dt2=`date2`, $stk=`stock`
						WHERE id=$id;";

				
				if($conn->query($query) === true){

					$_SESSION['message'] = 'Resident Information has been updated!';
					$_SESSION['success'] = 'success';
				}
			}

		}else{

			$_SESSION['message'] = 'Please complete the form!';
			$_SESSION['success'] = 'danger';
		}
	}else{
		$_SESSION['message'] = 'National ID is already taken. Please enter a unique national ID!';
		$_SESSION['success'] = 'danger';
	}
    header("Location: ../resident.php");

	$conn->close();