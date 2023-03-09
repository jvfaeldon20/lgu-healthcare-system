<?php include 'server/server.php' ?>
<?php
    $id = $_POST['id'];
    $image = $_FILES["fileToUpload"]["name"];
    $create_date = date("Y-m-d");
    $update_image = "";
    if($image){
        $target_dir = "assets/img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        $update_image = ",image='$image'";
    }

    $title = $_POST['title'];
    $status = $_POST['status'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    
    $query = "UPDATE tbl_announcement
                SET title = '$title',
                    status= '$status',
                    category= '$category',
                    description= '$description',
                    create_date='$create_date'
                    $update_image
              WHERE id='$id'";
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update announcement!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully updated announcement!';
        $_SESSION['success'] = 'success';
    }
    header('location: announcement.php');
?>