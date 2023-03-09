<?php
include '../server/server.php';

$conn->set_charset("utf8");

$sqlScript = "";
$sqlScript  = "# ABMS : MySQL database backup\n";
$sqlScript .= "#\n";
$sqlScript .= "# Generated: " . date( 'l j. F Y' ) . "\n";
$sqlScript .= "# Hostname: " . $host . "\n";
$sqlScript .= "# Database: " . $database . "\n";
$sqlScript .= "# --------------------------------------------------------\n";
$sqlTable  = $_GET['tbl'];
    
$query = "SELECT * FROM $sqlTable";
$result = $conn->query($query);

$columnCount = mysqli_num_fields($result);

// Prepare SQLscript for dumping data for each table
for ($i = 0; $i < $columnCount; $i ++) {

    while ($row = $result->fetch_row()) {
        $sqlScript .= "INSERT INTO $table VALUES(";
        for ($j = 0; $j < $columnCount; $j ++) {
            $row[$j] = $row[$j];
            
            if (isset($row[$j])) {
                $sqlScript .= '"' . $row[$j] . '"';
            } else {
                $sqlScript .= '""';
            }
            if ($j < ($columnCount - 1)) {
                $sqlScript .= ',';
            }
        }
        $sqlScript .= ");\n";
    }
}
    
    $sqlScript .= "\n"; 


if(!empty($sqlScript))
{
    // Save the SQL script to a backup file
    $date= date("Ymd");
    $backup_file_name = $sqlTable . '_' . $date . '.sql';
    $fileHandler = fopen($backup_file_name, 'w');
    $number_of_lines = fwrite($fileHandler, $sqlScript);
    fclose($fileHandler); 

    // Download the SQL backup file to the browser
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($backup_file_name));
    ob_clean();
    flush();
    readfile($backup_file_name);
    exec('rm ' . $backup_file_name); 
    header('location: ../manage_backup.php');
}