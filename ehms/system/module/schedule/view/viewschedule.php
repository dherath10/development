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

require_once '../../../common/php_mailer/PHPMailer/PHPMailerAutoload.php';

?>
<html>
    <head>
        <title>Elder's Home Management System</title>
        <link rel="icon" href="../../../images/favicon.png" />
  <link rel="stylesheet" type="text/css" 
        href="../../../bootstrap/css/bootstrap.min.css" />
  
  <link rel="stylesheet" type="text/css" href="../../../css/newlayout.css" />
  <link rel="stylesheet" type="text/css" href="../../../css/calender.css" />
  <link href="../../../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
    
  <script type="text/javascript" src="../../../js/jquery-1.8.3.min.js">  </script>

      <script type="text/javascript" src="../../../js/jquery.autocomplete.pack.js"></script>
<script type="text/javascript" src="../../../js/script.js"></script>
<script>
function printDiv(divID) {
         
var prtContent = document.getElementById(divID);
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=600,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close(); 
        
        }
  
      $(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }],
    });
});
    </script>
      <script src="http://code.highcharts.com/highcharts.js"></script>
     
    </head>
    <body>
        <div id="newmain">
            <div id="newheader">
                <?php  
                //To get header part
                include '../../../common/newheader.php'; ?>
            </div>
            <div id="newcontent">
                <div id="newsidebar">
                    <?php include '../../../common/sidebar.php'; ?>
                </div>
                
                <div id="subcontent">
         <!-- To show the path -->
         <ol class="breadcrumb">
            
            <li>
                <a  class="a1" href='../../login/view/dashboard.php'>Dashboard</a></li>
            <li > <a class="a1" href='schedule.php'>Schedule Management</a></li>
            <li class="active">View a Schedule</li>
</ol>
         
          <!-- To End the path -->          
                    <!-- Header -->

                    <h3 class="pa">View  <small>Schedule</small></h3>               
                    <div style="padding-left: 150px; padding-right: 150px">
                       <div id="printDiv">
                        <table align="center" width="30%" border="1" 
                               class="table">
                            <tr>
                                <th colspan="2">Receipt : 
                                    <?php echo $sch_id; ?></th>
                            </tr>
                            <tr><td colspan="2">
                                    
                                    <b><?php echo $row['ts_type']; ?></b>
                                    
                                    &nbsp;</td></tr>
                            <tr>
                                <td> Date :  <?php echo $row['sch_date']; ?></td>
                                <td>Time : <?php echo $row['ts_slot']; ?> </td>
                            </tr>
                            <tr>
                                <td colspan="2"> Donor Name :
                                <?php echo $row['donor_name']; ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="2"> Email Address
                                <?php echo $row['donor_email']; ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="2"> Telephone No :
                                <?php echo $row['donor_tel']; ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="2"> Addresss :
                                <?php echo $row['donor_add']; ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="2"> Distance </td>
                                
                            </tr>
                        </table>
                       </div>
                        <hr />
                        <table align="center" width="30%">
                            <tr>
                                <td>
                                    
                                    <button class="btn btn-primary" 
                                            onclick="printDiv('printDiv')">Print</button>
                                
                                
                                </td>
                                <td>
                                    <a href="viewschedulepdf.php?sch_id=<?php echo $sch_id; ?>" target="_blank">                 
                 <button class="btn btn-primary">PDF</button>
                                
                                    </a>                                    
                                </td>                                
                            </tr>                            
                        </table> 
                             <div id="container" style="height: 300px"></div>
                        </div>
                
                    
                   </div>      
            </div>
                      
        </div>
        
       
    </body>
</html>

<?php

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

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPAuth=true;

$mail->Host = 'smtp.gmail.com';
$mail->Username='dherath10@gmail.com';
$mail->Password='010044403@ucsc';
$mail->SMTPSecure='ssl';
$mail->Port=465;

$mail->From="admin@ehms.com";

$mail->FromName='Elders Home';
$mail->addAddress($row['donor_email'], $row['donor_name']);
//$mail->AddCC("gihan798114@gmail.com");
//$mail->addAttachment('Ceylon_Government_Railways_logo.jpg');
//$mail->addAttachment('Ceylon_Government_Railways_logo.jpg');
$mail->isHTML(true);
//$mail->AddEmbeddedImage('../../images/Ceylon_Government_Railways_logo.gif', 'logoimg', 'logo.gif'); 
//$mail->AddEmbeddedImage('../../images/sintameng2.PNG', 'logoimg1', 'sintameng2.PNG'); 
//$mail->AddEmbeddedImage('../../images/Government_of_Sri_Lanka.png', 'logoimg2', 'logo.gif'); 
$mail->Subject='Confirmation of Schedule';


$mail->Body= $html;
$mail->AltBody = $html;

if($mail->send()){
	$m="An Email has been successfully sent";

}else{
	$m=$mail->ErrorInfo;
}

echo $m;


########################################################
# Login information for the SMS Gateway
########################################################

$ozeki_user = "admin";
$ozeki_password = "abc123";
$ozeki_url = "http://127.0.0.1:9501/api?";

########################################################
# Functions used to send the SMS message
########################################################
function httpRequest($url){
    $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
    preg_match($pattern,$url,$args);
    $in = "";
    $fp = fsockopen("$args[1]", $args[2], $errno, $errstr, 30);
    if (!$fp) {
       return("$errstr ($errno)");
    } else {
        $out = "GET /$args[3] HTTP/1.1\r\n";
        $out .= "Host: $args[1]:$args[2]\r\n";
        $out .= "User-agent: Ozeki PHP client\r\n";
        $out .= "Accept: */*\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        while (!feof($fp)) {
           $in.=fgets($fp, 128);
        }
    }
    fclose($fp);
    return($in);
}
function ozekiSend($phone, $msg, $debug=false){
      global $ozeki_user,$ozeki_password,$ozeki_url;

      $url = 'username='.$ozeki_user;
      $url.= '&password='.$ozeki_password;
      $url.= '&action=sendmessage';
      $url.= '&messagetype=SMS:TEXT';
      $url.= '&recipient='.urlencode($phone);
      $url.= '&messagedata='.urlencode($msg);

      $urltouse =  $ozeki_url.$url;
    // if ($debug) { echo "Request: <br>$urltouse<br><br>"; }

      //Open the URL to send the message
      $response = httpRequest($urltouse);
      /*
      if ($debug) {
           echo "Response: <br><pre>".
           str_replace(array("<",">"),array("&lt;","&gt;"),$response).
           "</pre><br>"; }
           */
     //return($response);
}

########################################################
# GET data from sendsms.html
########################################################

$phonenum = $row['donor_tel'];
$message = "Your Schedule Date :".$row['sch_date']." Time Slot :".$row['ts_slot']. "Thank You";
$debug = true;

ozekiSend($phonenum,$message,$debug);



?>