<?php
if(!isset($_SESSION)){    
    session_start();
}

include 'dbconnection.php';

$donation_id=$_SESSION['donation_id'];
$amount=$_SESSION[''];

$sql=$con->query("UPDATE donation SET donation_status='Paid' "
        . "WHERE donation_id='$donation_id'");
$msg="Paymant has been done successfully";
header("Location:donation.php?msg=$msg");
?>
