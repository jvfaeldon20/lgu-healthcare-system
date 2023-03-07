<?php include 'server/server.php' ?>
<?php
    $supply_name = strtoupper($_POST['supply_name']);
    $description = $_POST['description'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];


    $query = "INSERT INTO tbl_medical_supply (supply_name, description, category, quantity)
                VALUES ('$supply_name','$description','$category','$quantity')";
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add item!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully created item!';
        $_SESSION['success'] = 'success';
    }
    header('location: supplies.php');
?>