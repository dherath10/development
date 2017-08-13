<?php

$district_id=$_GET['q'];
include 'dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();



$sql="SELECT * FROM district d, province p WHERE d.province_id = p.province_id AND d.district_id='$district_id'";
$result=$con->query($sql);
$row=$result->fetch_assoc();
echo $row['province_name'];


?>