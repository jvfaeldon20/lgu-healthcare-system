<?php 
	include '../server/server.php';

	if(!isset($_SESSION['username'])){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}

	$name	= $conn->real_escape_string($_POST['name']);
    $age 	= $conn->real_escape_string($_POST['age']);
	$gender	= $conn->real_escape_string($_POST['gender']);
    $duty	= $conn->real_escape_string($_POST['duty']);
    $description	= $conn->real_escape_string($_POST['description']);
    $prescription	= $conn->real_escape_string($_POST['prescription']);
	// change profile2 name
	$newName = date('dmYHis').str_replace(" ", "", $profile2);

	  // image file directory
  	$target = "../assets/uploads/resident_profile/".basename($newName);
	$check = "SELECT id FROM medical_hystory WHERE name='$name'";
	$nam = $conn->query($check)->num_rows;	

	if($nam == 0){
		if(!empty($fname)){

			if(!empty($profile) && !empty($profile2)){

				$query = "INSERT INTO medical_history (`name`,`age`,`gender`,`duty`,`description`,`prescription`) 
							VALUES ('$name','$age','$gender','$duty','$description','$prescription')";

				if($conn->query($query) === true){

					$_SESSION['message'] = 'Medical hystory has been saved!';
					$_SESSION['success'] = 'success';
				}
			}
			}else if(!empty($profile) && empty($profile2)){

				$query = "INSERT INTO medical_history (`name`,`age`,`gender`,`duty`,`description`,`prescription`) 
							VALUES ('$name','$age','$gender','$duty','$description','$prescription')";

				if($conn->query($query) === true){

					$_SESSION['message'] = 'Medical hystory has been saved!';
					$_SESSION['success'] = 'success';

			}else if(empty($profile) && !empty($profile2)){

				$query = "INSERT INTO medical_history (`name`,`age`,`gender`,`duty`,`description`,`prescription`) 
							VALUES ('$name','$age','$gender','$duty','$description','$prescription')";

				if($conn->query($query) === true){

					$_SESSION['message'] = 'Medical hystory has been saved!';
					$_SESSION['success'] = 'success';
				

					if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){

						$_SESSION['message'] = 'Resident Information has been saved!';
						$_SESSION['success'] = 'success';
					}
				}

			}else{
				$query = "INSERT INTO medical_history (`name`,`age`,`gender`,`duty`,`description`,`prescription`) 
							VALUES ('$name','$age','$gender','$duty','$description','$prescription')";

				if($conn->query($query) === true){

					$_SESSION['message'] = 'Medical hystory has been saved!';
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
     header("Location: ../medical_history.php");

	$conn->close();

