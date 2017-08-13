<?php
if(!isset($_SESSION)){
    session_start();
}
$_SESSION['donation_id']=$donation_id=$_GET['donation_id'];
include './dbconnection.php';

$sql="SELECT * FROM donation d, donor do WHERE d.donor_id=do.donor_id AND d.donation_id='$donation_id'";
$result=$con->query($sql);
$row=$result->fetch_assoc();

$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='bitresources13@gmail.com'; // Business email ID

$item_name=$row['donation_id']." - ".$row['donation_type'];
$_SESSION['amount']=$amount=$row['amount'];
$item_num=$row['donation_id'];

function convertCurrency($amount, $from, $to){
    $url  = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
    $data = file_get_contents($url);
    preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
    $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
    return round($converted, 3);
}
# Call function

$amount=convertCurrency($amount, "LKR", "USD");

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Elder's Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" 
              href="../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/layout.css" />
        <link rel="icon" href="../IMAGES/donate-icon-2x.png" />
        <script type="text/javascript" src="../jquery/jquery.min.js">
        </script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js">
            </script>
    </head>
    <body>
        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


function validate(){
    if(document.getElementById('uname').value==""){
        document.getElementById('show').innerHTML="errr";
        return false;
        
    }
    
}


</script>
        <div id="main">
            <div id="header">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div style="padding: 10px">
                            <img src="../IMAGES/favicon.png" height="75px" width="auto" />
                            
                        </div>
                        
                        
                        
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="tittle">
                            Love, Care and Treasure the Elderly People 
                            
                        </div>
                        
                        
                        
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="padlink">
                            <a href="http://www.facebook.com" data-toggle="tooltip"
                               title="FaceBook">
                            <img src="../IMAGES/facebook_30x30.png" />
                        </a>
                        <a href="http://www.facebook.com">
                            <img src="../IMAGES/tw.jpg" width="30" height="30" />
                        </a>
                        <a href="http://www.facebook.com">
                            <img src="../IMAGES/ut.jpg" width="30" height="30" />
                        </a>
                            <a href="http://www.facebook.com">
                                <img src="../IMAGES/g.png" width="30" height="30" />
                        </a>
                            
                            <br /><br />
                            <button class="btn btn-success" 
                                    data-toggle="modal" data-target="#myModal">
                                Sign In
                                
                            </button>
                            
                           
                            
                        </div>
                        
                        
        </div>
                        
                        
                        
                    </div>
                    
                </div>         
                
                
        
        <div id="navi">
            <ul class="inlinelink">
                <li>
                    <a href="index.php" class="linka">Home</a></li>
                <li><a href="aboutus.php" class="linka">About Us</a></li>
                 <li><a href="donation.php" class="linka">Donation </a></li>
                 <li><a href="schedule.php" class="linka">Schedule</a></li>
                 <li><a href="newsevent.html" class="linka">News & Events</a></li>
                 <li><a href="inquiry.php" class="linka">Inquiry</a></li>
                  <li><a href="contactus.php" class="linka">Contact Us</a></li>             
                
            </ul>
            
            
        </div>
            <div id="contents">
                <ol class="breadcrumb">
                    <li>
                        <i class="glyphicon glyphicon-home"></i> 
                            <a href="index.php">Home</a>
                        
                    </li>
                </ol>
                <div class="container">
                    <h4> View Donation </h4>
                                           
                        <div class="row">
                    
                            <div class="col-md-2">&nbsp;</div>
                             <div class="col-md-2">Donor ID:&nbsp;</div>
                              <div class="col-md-6">
                                  <?PHP ECHO $row['donation_id']; ?>&nbsp;</div>                                            
                            
                             <div class="col-md-2">
                                 
                                 &nbsp;</div>
                    </div>
                      <br />  
                    <div class="row">
                    
                            <div class="col-md-2">&nbsp;</div>
                             <div class="col-md-2">Donor Name:&nbsp;</div>
                              <div class="col-md-6">
                                  <?PHP ECHO $row['donor_name']; ?>&nbsp;</div>                                            
                            
                             <div class="col-md-2">
                                 
                                 &nbsp;</div>
                    </div>
                    <br />
                    <div class="row">
                    
                            <div class="col-md-2">&nbsp;</div>
                             <div class="col-md-2">Donor Email:&nbsp;</div>
                              <div class="col-md-6">
                                  <?PHP ECHO $row['donor_email']; ?>&nbsp;</div>                                            
                            
                             <div class="col-md-2">
                                 
                                 &nbsp;</div>
                    </div>
                    <br />
                    <div class="row">
                    
                            <div class="col-md-2">&nbsp;</div>
                             <div class="col-md-2">Donation Date:&nbsp;</div>
                              <div class="col-md-6">
                                  <?PHP ECHO $row['donation_date']; ?>&nbsp;</div>                                            
                            
                             <div class="col-md-2">
                                 
                                 &nbsp;</div>
                    </div>
                    <br />
                    <div class="row">
                    
                            <div class="col-md-2">&nbsp;</div>
                             <div class="col-md-2">Donation Type:&nbsp;</div>
                              <div class="col-md-6">
                      <?PHP ECHO $row['donation_type']; ?>&nbsp;</div>                                            
                            
                             <div class="col-md-2">
                                 
                                 &nbsp;</div>
                    </div>
                    <br />
                    <div class="row">
                    
                            <div class="col-md-2">&nbsp;</div>
                             <div class="col-md-2">&nbsp;</div>
                              <div class="col-md-6">
    
<form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="<?php echo $item_name; ?>">
    <input type="hidden" name="item_number" value="<?php echo $item_num; ?>">
    <input type="hidden" name="credits" value="510">
<input type="hidden" name="userid" value="1">
    <input type="hidden" name="amount" value="<?php echo $amount; ?>">
    <input type="hidden" name="cpp_header_image" value="">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" 
    value="http://localhost/ehms/web_site/src/cancel.php">
    <input type="hidden" name="return" 
   value="http://localhost/ehms/web_site/src/success.php">
       <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                    <img alt="" border="0" src="../IMAGES/Make-your-donation.png" width="1" height="1">
                                    </form>    
                                  
                                  
     <a href="success.php?donation_id=<?php echo $donation_id; ?>">
                                  <button type="button" 
                      class="btn btn-danger">Payment</button>
     </a>
                                  
                                  
                                  &nbsp;</div>                                            
                            
                             <div class="col-md-2">
                                 
                                 &nbsp;</div>
                    </div>
                    </form>
                </div>
                
            </div>
            <div id="newsbar">
                <div class="row">
                    <div class="col-lg-6">
                    
                        <div class="fb-like" data-href="http://www.bit.lk" data-width="300" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                        
                    </div>
                    
                </div>
                
                
                
            </div>
            <div id="footer">
                <div id="leftfooter">
                    CopyRight &COPY; uoc 2012-2016
                </div>
                <div id="rightfooter">
                    Web Designed By: 
                </div>
                
                
                
            </div>       
            
            
        </div>
        
        <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Donor Login</h4>
      </div>
      <div class="modal-body">
          <form action="validate.php" method="post" onsubmit="return validate()">
              <p id="show"></p>
          <h4>
              <input type="text" name="uname" id="uname" 
                     placeholder="User Name" class="form-control" />
          </h4>
          
          <h4>
              <input type="password" name="pass" id="pass" 
                     placeholder="Password" class="form-control" />
          </h4>
          <h4>
              <button type="submit" class="btn btn-success">
                  Login
              </button>
          </h4>
          <p><a href="forgotpassword.html">Forgot Password </a></p>
          </form>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
        
        
        
        <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
        
    </body>
</html>
