<?php include 'server/server.php' ?>
<?php
   $backup_data = $_POST['backup_data'];
   if($backup_data == 'bis'){
      header('location: ./backup/backup_db.php');
   }else{
      header('location: ./backup/backup_table.php?tbl='.$backup_data);
   }
?>