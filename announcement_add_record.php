<?php include 'server/server.php' ?>
<?php
    $image = $_FILES["fileToUpload"]["name"];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $target_dir = "assets/img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $create_date = date("Y-m-d");
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    
    $query = "INSERT INTO tbl_announcement (image,title,status,category,description,create_date) 
                VALUES ('$image','$title',1,'$category','$description','$create_date')";
    echo $query;
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add announcement!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully added announcement!';
        $_SESSION['success'] = 'success';
    }
    header('location: announcement.php');
?>