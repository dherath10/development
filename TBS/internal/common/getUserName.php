<?php

$username=$_GET['q'];
include 'dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();



$sql="SELECT * FROM login WHERE user_name='$username'";
$result=$con->query($sql);
$no = $result->num_rows;

if($no==0){
    echo "<span class='alert-success'>".$username." is not existing</span>";
}else{
    echo "<span class='alert-danger'>".$username." is existing</span>";
}


?>