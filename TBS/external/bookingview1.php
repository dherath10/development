<?php
include 'dbconnection.php';
$res_id=$_GET['res_id'];
$sql="SELECT * FROM reservation r, customer c WHERE c.cus_id=r.cust_id AND r.res_id='$res_id'";
$result=$con->query($sql);
$row=$result->fetch_assoc();
$dest=$row['res_to'];
$orig=$row['res_from'];
$cus_fname=$row['cus_fname'];
$item_name=$cus_fname." ".$orig." ".$dest." Hire";


if($row['class']=='Car'){
    $f=50;    
}
if($row['class']=="Van"){
    $f=40;    
}
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='bitresources13@gmail.com'; // Business email ID

?>
<html>
    <head>
        <title>Colombo Cabs</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">-->
        <link rel="stylesheet" href="website_css.css" type="text/css" />
        <script src="js/js1.js"></script>
        <link type="text/css" rel="stylesheet" href="../internal/bootstrap/css/bootstrap.min.css" />
  
  
        
        
        
    </head>
    <body onLoad="initialize()">
         <div id="map"></div>

        <div class="menu_block" id="navigation">
            <div>
                <div>
                    <nav>
                        <ul class="my-menu">
                            <li class="current_link"><a href="index.php">Home</a></li>
                            <li><a href="aboutus.php">About Us</a></li>
                            <li><a href="ourpackages.php">Our Packages</a></li>
                            <li><a href="signup.php">Sign Up</a></li>
                            <li><a href="contactus.php">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <br /><br />
                <div class="level2">
                    <img src="images/logo_single.jpg">
                </div>
                <div>
                             
<!--                    <div>-->
                    <div>
                    
                        <div class="container-fluid">
                            <div class="row">
                  <div class="col-md-2"><h3>Customer Name:</h3></div>
                  <div class="col-md-2"><h3>
                      <?php echo $row['cus_fname']." ".$row['cus_lname']; ?></h3>
                      
                      &nbsp;</div>
                  <div class="col-md-2"><h3>Email Address :</h3></div>
                  <div class="col-md-2">
                      <h3>
                      <?php echo $row['cus_email']; ?></h3>
                      &nbsp;</div>
                  <div class="col-md-2"><h3>Telephone No :</h3></div>
                  <div class="col-md-2">
                      <h3>
                      <?php echo $row['cus_telno']; ?></h3>
                      &nbsp;</div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                                
                            </div>
                            <div class="row">
           <div class="col-md-2"><h3>From:</h3></div>
                  <div class="col-md-2">
                      <h3><span id="orig"></span></h3>
                      
                      &nbsp;</div>
                  <div class="col-md-2"><h3>To :</h3></div>
                  <div class="col-md-2">
                      
                      <h3>
                          <span id="dest"></span></h3>
                      &nbsp;</div>
                  <div class="col-md-2"><h3>Date :</h3></div>
                  <div class="col-md-2">
                      <h3>
                      <?php echo $row['date']." ".$row['time']; ?></h3>
                      
                      &nbsp;</div>   
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                                
                            </div>
                            <div class="row">
                              <div class="col-md-2"><h3>Vehicle Class:</h3></div>
                              <div class="col-md-2">
                                  
                                  <h3>
                      <?php echo $row['class']; ?></h3>
                                  
                                  &nbsp;</div>
                                <div class="col-md-8">&nbsp;</div>
                   
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                                
                            </div>
                            <div class="row">
                              <div class="col-md-4">                
                                                                                
                                  
                                  
                                  <h3>Distance: 
                                      <span id="dist"></span></h3>
                                   <h3>Approximate Fee:
                                      Rs. <span id="free"></span>
                                   
                                   </h3>
                                    <h3>Initial Payment:
                                    
                                    Rs. <span id="pay"></span>
                                    </h3>
                              
                              </div>
                             
                                <div class="col-md-8">&nbsp;</div>
                   
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">     
                                    
                                    &nbsp;</div>
                                
                            </div> 
                            
                           <div class="row">
                               
                                <div class="col-md-12">
                                    <form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="<?php echo $item_name; ?>">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="credits" value="510">
<input type="hidden" name="userid" value="1">
    <input type="hidden" name="amount" id="amount">
    <input type="hidden" name="cpp_header_image" value="">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="http://localhost/tbs/external/cancel.php">
    <input type="hidden" name="return" value="http://localhost/tbs/external/cancel.php/success.php">
                                    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                    </form>                              
                                    
                                    
                  <button type="button" class="btn btn-success">Payment</button>
                                    
                                    &nbsp;</div>
                                
                            </div> 
                            
                            
                        </div>
                        
                        
                        
                        
                    <!--</div>-->
                    </div>
                      
                    
                   
                    
                    <div class="contact_bar">
                        <div id="contact_bar_div1">
                            <div>
                                <img src="images/tax_bg.png" id="contact_bar_div_img1">
                                <img src="images/tax_bg.png" id="contact_bar_div_img2">
                                <img src="images/tax_bg.png" id="contact_bar_div_img3">
                                <img src="images/tax_bg.png" id="contact_bar_div_img4">
                            
                            </div>
                            <div>
                                <img src="images/telephone.png" id="contact_bar_div2_img">
                                <div class="contact_bar_no_div">
                                <p class="contact_bar_no">4 203 203 / 4 200 800</p>
                                <p class="contact_bar_note">Reserve Now!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="footer_div">
                        <a href="https://www.facebook.com/Colombo-Cabs-0114203303-395661753842077/">
                            <img src="images/facebook4.png" id="footer_div_img"> </a> 
                        <p id="fb_logo_text">Like us on facebook</p>
                            
                        
                        <p id="footer_div_text1">Colombo<span id="footer_div_text1_p_span1">C</span>abs 
                            <span id="footer_div_text1_p_span2">&copy; 2016 | Privacy Policy</span></p>
                        
                        <p id="footer_div_text2">Website Designed by Rasith Ranawaka</p>
                        
                        <p id="footer_div_text3_contact">Call Us: 4 203 203 / 4 200 800</p>
                      
                    </div>
                        
                        
                    </div>
                     
                </div>
            </div>
        
    </body>
</html>
 
        
        <script type="text/javascript">
 function initialize() {
     
 var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 41.85, lng: -87.65}
        });
        directionsDisplay.setMap(map);
	calculateAndDisplayRoute(directionsService, directionsDisplay);
        
        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: 'colombo',
          destination: 'galle',
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
        
 }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiCQDeyFsIoUabsbgdherFMCgklKLUJuI&callback=initMap">
    </script>