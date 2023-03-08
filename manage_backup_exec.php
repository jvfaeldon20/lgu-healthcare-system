<?php include 'server/server.php' ?>
<?php
   $backup_data = $_POST['backup_data'];
   if($backup_data == 'bis'){
     
      require('backup/backup_db.php');
   }else{
      require('backup/backup_table.php?tbl='.$backup_data);
   }
?>