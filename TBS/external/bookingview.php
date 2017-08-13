<?php
include 'dbconnection.php';
$res_id=$_GET['res_id'];
$sql="SELECT * FROM reservation r, customer c WHERE c.cus_id=r.cus_id AND r.res_id='$res_id'";
$result=$con->query($sql);
$row=$result->fetch_assoc();
$dest=$row['res_to'];
$orig=$row['res_from'];
$cus_fname=$row['cus_fname'];
$item_name=$cus_fname." ".$orig." ".$dest." Hire";

/*
$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$dest.'&sensor=false');

$output= json_decode($geocode);

$lat = $output->results[0]->geometry->location->lat;
$long = $output->results[0]->geometry->location->lng;

$geocode1 = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$orig.'&sensor=false');

$output1= json_decode($geocode1);

$lat1 = $output1->results[0]->geometry->location->lat;
$long1 = $output1->results[0]->geometry->location->lng;

*/

 //ERROR REPORTING
error_reporting(E_ERROR | E_NOTICE | E_PARSE);




// function to get  the address
function get_lat_long($address){

    $address = str_replace(" ", "+", $address);

    $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false");
    $json = json_decode($json);

    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
    return $lat.','.$long;
}
$A=get_lat_long($orig);
$AA=get_lat_long($dest);
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
  
        <script type="text/javascript"
 src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHv4FrIoaG279_cfl_IZxA558H0s75VRg&amp;sensor=false">
        </script>
        
        <script type="text/javascript">
 function initialize(f) {
	var origin = "<?php echo $orig; ?>",
    destination = "<?php echo $dest; ?>",
    service = new google.maps.DistanceMatrixService();

service.getDistanceMatrix(
    {
        origins: [origin],
        destinations: [destination],
        travelMode: google.maps.TravelMode.DRIVING,
        avoidHighways: false,
        avoidTolls: false
    }, 
    callback
);

function callback(response, status) {
    var orig = document.getElementById("orig"),
        dest = document.getElementById("dest"),
        dist = document.getElementById("dist"),
		fre = document.getElementById("free");
                pay = document.getElementById("pay");

    if(status=="OK") {
        dest.innerHTML = response.destinationAddresses[0];
        orig.innerHTML = response.originAddresses[0];
        dist.innerHTML=dis= response.rows[0].elements[0].distance.text;
        var d=dis.split(' ');
        
        //var cal=Math.round(,0);
		free=d[0]*f;
		fre.innerHTML=free;
		//var free=dist.value*d;
                inpay=free*(25/100);
                pay.innerHTML=inpay;
                document.getElementById("amount").value=inpay;

		
    } else {
        alert("Error: " + status);
    }
}
 }
</script>
        
        <style>

      #map-canvas {
          height: 500px;
          width: 700px;
      }
    </style>
        
    </head>
    <body onLoad="initialize('<?php echo $f; ?>')">

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
                                <div class="col-md-1"> &nbsp;</div>  
                              <div class="col-md-4">                
                                                                                
                                  <h3>Customer Name:
                
                      <?php echo $row['cus_fname']." ".$row['cus_lname']; ?></h3>
                                  <h3>Email Address :
                  
                      <?php echo $row['cus_email']; ?></h3>
                                  
                                  
                                  <h3>Telephone No :
                      <?php echo $row['cus_telno']; ?></h3>
                    
           <h3>From:<span id="orig"></span></h3>
                      
                      <h3>To :
                          <span id="dest"></span></h3>
                     <h3>Date :
                      <?php echo $row['date']." ".$row['time']; ?></h3>
                      
                     <h3>Vehicle Class:
                      <?php echo $row['class']; ?></h3>
                                  
                                  
                                  
                                  
                                  
                                  <h3>Distance: 
                                      <span id="dist"></span></h3>
                                   <h3>Approximate Fee:
                                      Rs. <span id="free"></span>
                                   
                                   </h3>
                                    <h3>Initial Payment:
                                    
                                    Rs. <span id="pay"></span>
                                    </h3>
                              
                              </div>
                             
                                <div class="col-md-6">
                                  <div id="map-canvas"></div>
    <script>
      function initMap() {
    var pointA = new google.maps.LatLng(<?php echo $A; ?>),
        pointB = new google.maps.LatLng(<?php echo $AA; ?>),
        myOptions = {
            zoom: 10,
            center: pointA
        },
        map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),
        // Instantiate a directions service.
        directionsService = new google.maps.DirectionsService,
        directionsDisplay = new google.maps.DirectionsRenderer({
            map: map
        }),
        markerA = new google.maps.Marker({
            position: pointA,
            title: "point A",
            label: "A",
            map: map
        }),
        markerB = new google.maps.Marker({
            position: pointB,
            title: "point B",
            label: "B",
            map: map
        });

    // get route from A to B
    calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);

}



function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
    directionsService.route({
        origin: pointA,
        destination: pointB,
        avoidTolls: true,
        avoidHighways: false,
        travelMode: google.maps.TravelMode.DRIVING
    }, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
}

initMap();
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP13cj9sA0GZOJ3sl-9qON8AYZN9MF3l8&callback=initMap">
    </script>
                                    
                                    &nbsp;</div>
                   
                                <div class="col-md-1"> &nbsp;</div>  
                            </div>
                            
                            <div class="row">
                                <div class="col-md-1"> &nbsp;</div>  
                                <div class="col-md-10">     
                                    
                                    &nbsp;</div>
                                <div class="col-md-1"> &nbsp;</div>  
                            </div> 
                            
                           <div class="row">
                               <div class="col-md-1"> &nbsp;</div>  
                                <div class="col-md-10">
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
                                <div class="col-md-1"> &nbsp;</div>  
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
