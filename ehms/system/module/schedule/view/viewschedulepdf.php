<?php
if(!isset($_SESSION)){
    session_start();    
}
// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//session handling - to check whether login or not
include '../../../common/session_handling.php';

$userinfo=$_SESSION['userinfo']; //To get from session
$username=$userinfo['username'];
$user_id=$userinfo['user_id'];
$role_id=$userinfo['role_id'];
$role_name=$userinfo['role_name'];
$user_image=$userinfo['user_image'];

$sch_id=$_GET['sch_id'];

include '../../../common/query.php'; //To call common queries
$obj=new query(); //To create an object using query class
$row=$obj->getScheduleInfo($sch_id);

include_once '../../../common/dompdf/dompdf_config.inc.php';

$html='<table align="center" width="400" border="1" 
                               class="table">
                            <tr>
                                <th colspan="2">Receipt : 
                                    <?php echo $sch_id; ?></th>
                            </tr>
                            <tr><td colspan="2">
                                    
                                    <b>'.$row['ts_type'].'</b>
                                    
                                    &nbsp;</td></tr>
                            <tr>
                                <td> Date :'.$row['sch_date'].'</td>
                                <td>Time :'.$row['ts_slot'].' </td>
                            </tr>
                            <tr>
                                <td colspan="2"> Donor Name :
                                '.$row['donor_name'].'
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="2"> Email Address
                                '.$row['donor_email'].'
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="2"> Telephone No :
                                '.$row['donor_tel'].'
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="2"> Addresss :
                                '.$row['donor_add'].'
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="2"> Distance </td>
                                
                            </tr>
                        </table>';
$pdf_name=$sch_id;
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$pdf = $dompdf->output();
$file_location = $pdf_name.".pdf";
file_put_contents($file_location,$pdf);
$dompdf->stream("dompdf_out.pdf",
array("Attachment" => false)); 
exit(0);

?>

                       