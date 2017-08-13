<?php
ob_start();
error_reporting(E_ALL ^ E_NOTICE);
 include'../../../common/session.php';
include '../model/backupmodel.php';
$obj=new backup();
$user_id=$row['user_id'];
$action=$_REQUEST['action'];

if($action=="backup"){

   
$a=$obj->backup_tables();
//http://www.latestcode.net/2013/03/create-compressed-zip-file-in-php.html
$zip = new ZipArchive();
$archive_name = "../view/store/".$_SESSION['path1'].".zip";//name of the output zip file
$file_to_compress = $_SESSION['path'];//this is the file that you need to compress

if ($zip->open($archive_name, ZIPARCHIVE::CREATE)!==TRUE) {
exit("Error while opening $archive_name");
}else{ 
if(file_exists($file_to_compress) && is_file($file_to_compress)){
$zip->addFile($file_to_compress,$_SESSION['path1'].".sql");
$zip->close();
echo 'File size = '.number_format((filesize($archive_name)/1024),2).' Kb';
}else{
exit("File does not exists");
}
}

 $result=$obj->takeBackup($user_id,$_SESSION['path1']);
 $msg= "Successfully store a backup...";
header("Location:../view/backup.php?msg=$msg");
    
    
    
    
}

if($action=="restore"){
    $ref=$_GET['ref'];
    echo $refname=$ref.".sql";
    
    
    $mysqli = new mysqli("localhost", "root", "", "tbs1");
$mysqli->query('SET foreign_key_checks = 0');
if ($result = $mysqli->query("SHOW TABLES"))
{
    while($row = $result->fetch_array(MYSQLI_NUM))
    {
        $mysqli->query('DROP TABLE IF EXISTS '.$row[0]);
    }
}

$mysqli->query('SET foreign_key_checks = 1');


$filename ="../view/store/".$refname;

// Select database
//mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());
 
// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
    // Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;
 
    // Add this line to the current segment
    $templine .= $line;
    // If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';')
    {
        // Perform the query
        mysqli_query($mysqli,$templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($mysqli) . '<br /><br />');
        // Reset temp variable to empty
        $templine = '';
    }
}


 $msg= "You have successfully restore the Database...";
 $mysqli->close();
    
  header("Location:../view/restorebackup.php?msg=$msg");  
    
}