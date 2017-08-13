<?php
if(!isset($_SESSION)){
    session_start();
}
include 'dbconnection.php';
$res_id=$_SESSION['res_id'];
$amount=$_SESSION['pay'];
$pay_date=date('Y-m-d');
$pay_time=date('H:i:s');

$sqlpay="SELECT * FROM payment WHERE res_id='$res_id'";
$sqlresult=$con->query($sqlpay);
$nop=$sqlresult->num_rows;

if($nop==0){
$sqlpay="INSERT INTO payment VALUES('','$amount','$res_id',"
        . "'$pay_date','$pay_time','Paid')";
$resultpay=$con->query($sqlpay);
$pay_id=$con->insert_id;
}else{
    $rowpay=$sqlresult->fetch_assoc();
    $pay_id=$rowpay['pay_id'];
}

$sql = "SELECT * from reservation r, customer c"
        . " WHERE r.cus_id=c.cus_id AND r.res_id='$res_id'";
$result = $con->query($sql);
$row=$result->fetch_assoc();

$cus_email=$row['cus_email'];
$cus_fname=$row['cus_fname'];
$cus_lname=$row['cus_lname'];
$cus_name=$cus_fname." ".$cus_lname;
$cus_telno=$row['cus_telno'];

$sqlp = "SELECT * from payment WHERE pay_id='$pay_id'";
$resultp = $con->query($sqlp);
$rowp=$resultp->fetch_assoc();

//To call DOMPDF library
include_once 'dompdf/dompdf_config.inc.php';
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="website_css.css" type="text/css" />
        <script src="myjs/js1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <style>
/*@media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}*/
</style>
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
      </script>
    </head>
    <body>

        <div class="container">


            <ul class="nav nav-pills">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="ourpackages.php">Our Packages</a></li>
                <li><a href="signup.php">Sign up</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
            </ul>

        </div>
        <div id="section-to-print">
        <div class="level2">
            <div class="col-sm-12">
                <img src="images/logo_single.jpg">
            </div>
        </div>
        <div>
            
        </div>

        <br/>

        <div class="container">

            <table class="table">
                <tr>
                    <td>Res ID: </td>
                    <td>
                        <?PHP echo $row['res_id']; ?>
                        &nbsp;</td>
                    <td>Invoice No:</td>
                    <td>
                        <?PHP echo $rowp['pay_id']; ?>
                        &nbsp;</td>
                </tr>
                 <tr>
                    <td>Customer Name: </td>
                    <td>
                        <?PHP echo $row['cus_fname']." ".$row['cus_lname']; ?>
                        &nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                 <tr>
                    <td>From:
                    <?PHP echo $row['res_from']; ?>
                    </td>
                    <td>&nbsp;</td>
                    <td>To:
                    <?PHP echo $row['res_to']; ?>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Date: </td>
                    <td><?PHP echo $rowp['pay_date']; ?>&nbsp;</td>
                    <td>Time:</td>
                    <td><?PHP echo $rowp['pay_time']; ?>&nbsp;</td>
                </tr>
                <tr>
                    <td>Payment: </td>
                    <td><?PHP echo $rowp['amount']; ?>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp; </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                
            </table>
        </div>
        </div>
            <div style="text-align: center">
           <button type="button" class="btn btn-primary" onClick="javascript:printDiv('section-to-print')">Print</button>
           <a href="invoicepdf.php" target="_blank">
             <button type="button" class="btn btn-primary">PDF</button>
           </a>   
            </div>
           
        </div>


      

        <!--<div class="contact_bar">-->
       

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" id="footer_div">
                    <div class="col-sm-4">
                        <p id="footer_div_text1">Colombo<span id="footer_div_text1_p_span1">C</span>abs 
                            <span id="footer_div_text1_p_span2">&copy; 2016 | Privacy Policy</span></p>

                        <p id="footer_div_text2">Website Designed by Rasith Ranawaka</p><!--
                        -->
                    </div>
                    <div class="col-sm-4">

                        <p id="fb_logo_text">Like us on facebook
                            <a href="https://www.facebook.com/Colombo-Cabs-0114203303-395661753842077/">
                                &nbsp; <img src="images/facebook4.png" id="footer_div_img"> </a> </p> 
                    </div>
                    <div class="col-sm-4">
                        <p id="footer_div_text3_contact">Call Us: 4 203 203 / 4 200 800</p>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
<?php
//if($nop==0){
    require_once 'php_mailer/PHPMailer/PHPMailerAutoload.php';
    
   $html="<table border='1' width='400' align='center'>"
        . "<tr><th colspan='4'>Invoice </th></tr>"
        . "<tr><td>Invoice No:</td><td>".$pay_id."</td><td>Date</td>"
        . "<td>".$pay_date."</td></tr>"
        . "<tr><td>Reservation ID</td><td>".$res_id."</td>"
        . "<td>Customer Name</td><td>".$row['cus_fname']." ".$row['cus_lname']."</td></tr>"
        . "<tr><td>Booked Date </td><td>".$row['date']."</td>"
        . "<td>Booked Time</td><td>".$row['time']."</td></tr>"
        . "<tr><td>Paid Amount</td><td colspan='3'> Rs. ".$rowp['amount']."</td></tr>"        
        . "</table>";
    
    
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPAuth=true;

    $mail->Host = 'smtp.gmail.com';
    $mail->Username='dherath10@gmail.com';
    $mail->Password='010044403@ucsc';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;

    $mail->From="admin@tbs.com";

    $mail->FromName='Taxi Booking System';
    $mail->addAddress($cus_email, $cus_name);
    //$mail->AddCC("gihan798114@gmail.com");
    $mail->addAttachment('images/logo_single.jpg');
    //$mail->addAttachment('Ceylon_Government_Railways_logo.jpg');
    $mail->isHTML(true);
    //$mail->AddEmbeddedImage('../../images/Ceylon_Government_Railways_logo.gif', 'logoimg', 'logo.gif'); 
    //$mail->AddEmbeddedImage('../../images/sintameng2.PNG', 'logoimg1', 'sintameng2.PNG'); 
    //$mail->AddEmbeddedImage('../../images/Government_of_Sri_Lanka.png', 'logoimg2', 'logo.gif'); 
    $mail->Subject='Confirmation of your Booking';


    $mail->Body= $html;
    $mail->AltBody = $html;

    if($mail->send()){
            $m="Yes";
 $sqlno1="INSERT INTO notification (no_dt,no_type,no_cat,no_status,ref_id) VALUES(now(),'Email','reservation','Unseen','$res_id')";
 $resultno1=$con->query($sqlno1);          

    }else{
            $m=$mail->ErrorInfo;
    }
    
   echo $m; 
   
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
        
 $sqlno2="INSERT INTO notification (no_dt,no_type,no_cat,no_status,ref_id) VALUES(now(),'SMS','reservation','Unseen','$res_id')";
 $resultno2=$con->query($sqlno2);  
        
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
      if ($debug) { echo "Request: <br>$urltouse<br><br>"; }

      //Open the URL to send the message
      $response = httpRequest($urltouse);
      if ($debug) {
           echo "Response: <br><pre>".
           str_replace(array("<",">"),array("&lt;","&gt;"),$response).
           "</pre><br>"; }

      return($response);
}

########################################################
# GET data from sendsms.html
########################################################

$phonenum = $cus_telno;
$message = $res_id;
$debug = true;

ozekiSend($phonenum,$message,$debug);
   
    
//}

?>