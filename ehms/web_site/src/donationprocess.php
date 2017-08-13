<?php
if(!isset($_SESSION)){    
    session_start();
}

include 'dbconnection.php';

$amount=$_POST['amount'];
$dname=$_POST['dname'];
$demail=$_POST['demail'];
$dtelno=$_POST['dtelno'];

$sql="SELECT * FROM donor WHERE donor_email='$demail'";
$result=$con->query($sql);
$count=$result->num_rows;

if($count==0){
    $sqlin="INSERT INTO donor (donor_email,donor_tel,donor_name) "
            . "VALUES('$demail','$dtelno','$dname')";
    $resultin=$con->query($sqlin);
    $donor_id=$con->insert_id;   
}else{
    $row=$result->fetch_assoc();
    $donor_id=$row['donor_id'];
    
}
echo $donor_id;
$sqld="INSERT INTO donation "
 . "VALUES('','$donor_id',CURDATE(),CURTIME(),'Fund','$amount','Pending')";
$resultd=$con->query($sqld);
$donation_id=$con->insert_id;

header("Location:donationview.php?donation_id=$donation_id");
?>
