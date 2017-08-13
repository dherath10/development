<?php
if(!isset($_SESSION)){
    session_start();
}
include 'dbconnection.php';
$res_id=$_SESSION['res_id'];
$amount=$_SESSION['pay'];
$pay_date=date('Y-m-d');
$pay_time=date('H:i:s');

$sql = "SELECT * from reservation r, customer c, payment p"
        . " WHERE r.cus_id=c.cus_id AND r.res_id='$res_id' AND"
        . " p.res_id=r.res_id";
$result = $con->query($sql);
$row=$result->fetch_assoc();
$pay_id=$row['pay_id'];


$sqlp = "SELECT * from payment WHERE pay_id='$pay_id'";
$resultp = $con->query($sqlp);
$rowp=$resultp->fetch_assoc();

//To call DOMPDF library
include_once 'dompdf/dompdf_config.inc.php';

$html="<table border='1' width='400' align='center'><tr><th colspan='4'>"
        . "<img src='images/logo_single.jpg' width='150' height='auto' />"
        . "</th></tr>"
        . "<tr><th colspan='4'>Invoice </th></tr>"
        . "<tr><td>Invoice No:</td><td>".$pay_id."</td><td>Date</td>"
        . "<td>".$pay_date."</td></tr>"
        . "<tr><td>Reservation ID</td><td>".$res_id."</td>"
        . "<td>Customer Name</td><td>".$row['cus_fname']." ".$row['cus_lname']."</td></tr>"
        . "<tr><td>Booked Date </td><td>".$row['date']."</td>"
        . "<td>Booked Time</td><td>".$row['time']."</td></tr>"
        . "<tr><td>Paid Amount</td><td colspan='3'> Rs. ".$rowp['amount']."</td></tr>"        
        . "</table>";
    

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("invoice.pdf",
array("Attachment" => false));
exit(0);


?>
