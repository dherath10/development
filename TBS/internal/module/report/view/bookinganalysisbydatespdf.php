<?php
include '../../../common/session.php';
include '../../../common/session_handling.php';
include '../../../common/display.php';
$user_name=$row['user_name'];

$f=$_GET['from'];
$t=$_GET['to'];


include '../model/reportmodel.php';
$obj=new report();
$result=$obj->bookingAnalysisByDate($f,$t);
$nor=$result->num_rows;

include_once '../../../common/dompdf/dompdf_config.inc.php';

$html='<h2 align="center">Booking Analysis By Dates Report </h2>';
$html.='<table width="500"><tr><th>From :</th><th>'.$f.'</th><th>To :</th><th>'.$t.'</th><th>No of Record :</th><th>'.$nor.'</th></tr>';
$html.='</table>';
$html.='<table border="1" width="500" style="border-collapse:collapse">
                           <tr style="background-color:gray">
                               <th>ID</th>
                               <th>Source</th>
                               <th>Destination</th>
                               <th>Date and Time</th>
                               <th>Class</th>
                               <th>Customer Name</th>                                                         
                           </tr>';
   while($rowres=$result->fetch_assoc()) {
 $html.='<tr><td>'.$rowres['res_id'].'</td>
                               <td>'.$rowres['res_from'].'</td>
                               <td>'.$rowres['res_to'].'</td>
                               <td>'.$rowres['res_date']." ".$rowres['time'].'</td>
                               <td>'.$rowres['class'].'</td>
                               <td>'.$rowres['cus_title'].". ".$rowres['cus_fname']." ".$rowres['cus_lname'].'</td>                 
                            </tr>';   
     }
                           
    $html.='</table> ';
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("BOOKING_BY_DATES.pdf",
array("Attachment" => false));
exit(0);

?>
