<?php
include 'dbconnection.php';
date_default_timezone_set('Asia/Colombo');
$cdate=  date('Y-m-d');

$title=$_POST['title'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$telno=$_POST['telno'];
$from=$_POST['from'];
$to=$_POST['to'];
$rdate=$_POST['rdate'];
$rtime=$_POST['rtime'];
$class=$_POST['class'];
$ac=$_POST['ac'];
$remarks=$_POST['remarks'];
$sqlcus="INSERT INTO customer  VALUES('','$title','$fname','$lname','$telno','$email','Active')";
$resultcus=$con->query($sqlcus);
$cus_id=$con->insert_id;

if($resultcus){
$sqlres="INSERT INTO reservation VALUES('','$from','$to','$rdate','$rtime','$class','$ac','$cus_id','Pending','$cdate','$remarks','Unseen')";
$resultres=$con->query($sqlres);

$res_id=$con->insert_id;

header("Location:bookingview.php?res_id=$res_id");
}else{
    header("Location:index.php");
}
?>
