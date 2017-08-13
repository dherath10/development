<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="30">
<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAK2g1LbOLt1KK6jQlNyubLhvybALE0r1c&sensor=false">
</script>

<script>
function initialize()
{
var mapProp = {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:6,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
<div id="googleMap" style="width:800px;height:600px;"></div>

</body>
</html>