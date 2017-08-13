<?php
if(!isset($_SESSION)){    
    session_start();
}

include 'dbconnection.php';

$in_cat=$_POST['in_cat'];
$msg=$_POST['msg'];
$in_name=$_POST['in_name'];
$in_email=$_POST['in_email'];

$sqlin="INSERT INTO inquiry "
        . "VALUES('','$in_cat','$msg','$in_name','$in_email',now(),'Unseen')";
    $resultin=$con->query($sqlin);
    $donor_id=$con->insert_id;   
    if($resultin){ $msg="Inquirey has been sent";}
    else{ $msg="Inquirey has not been sent";}

header("Location:inquiry.php?msg=$msg");
?>
