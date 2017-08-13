<!DOCTYPE html>
<html>
<head>


<!--google map -->
<script type="text/javascript"
 src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHv4FrIoaG279_cfl_IZxA558H0s75VRg&amp;sensor=false">
        </script>




<script type="text/javascript">
 function initialize() {
	var origin = new google.maps.LatLng(6.9888392,79.9430984),
    destination = "horana, Sri Lanka",
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
        dist = document.getElementById("dist");

    if(status=="OK") {
        orig.value = response.destinationAddresses[0];
        dest.value = response.originAddresses[0];
        dist.value = response.rows[0].elements[0].distance.text;
    } else {
        alert("Error: " + status);
    }
}
 }
</script>
</head>
<body onLoad="initialize()">
    <br>
    Basic example for using the Distance Matrix.<br><br>
    Destination:<input id="orig" type="text" style="width:35em"><br><br>
    Origin:  <input id="dest" type="text" style="width:35em"><br><br>
    Distance: <input id="dist" type="text" style="width:35em">
</body>
</html>

