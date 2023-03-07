<?php include 'server/server.php' ?>
<?php
    $id = $_POST['id'];
    $supply_name = strtoupper($_POST['supply_name']);
    $description = $_POST['description'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];

    $query = "UPDATE tbl_medical_supply 
                SET supply_name='$supply_name',
                    description = '$description',
                    category= '$category',
                    quantity='$quantity'
              WHERE id='$id'";
    
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update item!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully updated item!';
        $_SESSION['success'] = 'success';
    }
    header('location: supplies.php');
?>