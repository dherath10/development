<?php 
//database Connectivity
include "include/dbconnection.php";
//To get the item id
$iid=$_REQUEST['id'];
//To get Accession No
$acc=$_REQUEST['acc'];

//To delete copy details
$sqldelC="DELETE FROM `copy` WHERE Accession_No='$acc'";
mysqli_query($con,$sqldelC);

$msg="Accession No: ".$acc." details successfully deleted!";
header("Location:delItemDetails.php?id=$iid&msg=$msg");