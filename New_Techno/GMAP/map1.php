<!DOCTYPE html>
<html>
<head>


<!--google map -->
<script type="text/javascript"
 src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHv4FrIoaG279_cfl_IZxA558H0s75VRg&amp;sensor=false">
        </script>

<script type="text/javascript">
 function initialize() {
	var d=document.getElementById('address2').value; 
	var ori=document.getElementById('address1').value;
	if(ori==1){
		var lat=6.9888392; var lon=79.9430984;
	}
	if(ori==2){
		var lat=7.2671001; var lon=80.5971772;
	}
	if(ori==3){
		var lat=6.984117; var lon=79.900866;
	}
	if(ori==4){
		var lat=7.0801858; var lon=79.8903558;
	}
	var origin = new google.maps.LatLng(lat,lon),
	destination = d+", Sri Lanka",
    service = new google.maps.DistanceMatrixService();
	
	
service.getDistanceMatrix(
    {
        origins: ['colombo'],
        destinations: ['thalagala Gonapola'],
        travelMode: google.maps.TravelMode.DRIVING,
        avoidHighways: false,
        avoidTolls: false
    }, 
    callback
);

function callback(response, status) {
    var orig = document.getElementById("orig"),
        dest = document.getElementById("dest"),
        dist = document.getElementById("dist");

    if(status=="OK") {
        orig.innerHTML = response.destinationAddresses[0];
        dest.innerHTML = response.originAddresses[0];
        dist.innerHTML = response.rows[0].elements[0].distance.text;
	
    } else {
        alert("Error: " + status);
    }
}
 }
</script>
</head>
<body onLoad="initialize()">

    <form action="#" >
      <p>
     
         <select name="address1" id="address1" class="address_input">
                            <option value="1">Hotel Royal Park Kiribathgoda</option>
                            <option value="2">Peradeniya Rest House</option>
                            <option value="3">Royal Queen's Banquet Wattala</option>
                            <option value="4">Rest House Ja-Ela</option>
                         </select>   <br /><br />
        <input required type="text" name="address2" id="address2"  class="address_input" size="40" /><br /><br />
        <input type="button" name="find" value="Search" onclick="initialize();" />
      </p>
    </form>
    <br>
    Basic example for using the Distance Matrix.<br><br>
    <p>Destination:<span id="orig"></span><br /><br />
    Origin:  <span id="dest"></span><br /><br />
    Distance: <span id="dist"></span>
</body>
</html>

