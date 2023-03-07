<?php include 'server/server.php' ?>
<?php
    $generic_name = strtoupper($_POST['generic_name']);
    $description = $_POST['description'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $dosage = $_POST['dosage'];
    $unit = $_POST['unit'];


    $query = "INSERT INTO tbl_medicine (generic_name, description, category, quantity, dosage, unit)
                VALUES ('$generic_name','$description','$category','$quantity','$dosage','$unit')";
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add item!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully created item!';
        $_SESSION['success'] = 'success';
    }
    header('location: medicine.php');
?>