<?php include 'server/server.php' ?>
<?php
    $id = $_POST['id'];
    $generic_name = $_POST['generic_name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $dosage = $_POST['dosage'];
    $unit = $_POST['unit'];


    $query = "UPDATE tbl_medicine 
                SET generic_name='$generic_name',
                    description = '$description',
                    category= '$category',
                    quantity='$quantity',
                    dosage='$dosage',
                    unit='$unit'
              WHERE id='$id'";
    
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update item!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully updated item!';
        $_SESSION['success'] = 'success';
    }
    header('location: medicine.php');
?>