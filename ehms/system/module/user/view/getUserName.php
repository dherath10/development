<?php

$key=$_GET['q'];
include '../model/usermodel.php';
$ob=new user();
$result=$ob->getUserName($key);
$no=$result->num_rows;
if($no==0){
    echo "<i class='alert-success'>Availbale User Name</i>";
}else{
    echo "<i class='alert-danger'>Existing User Name</i>";
}
?>
