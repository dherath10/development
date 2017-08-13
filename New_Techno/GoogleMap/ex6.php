<style>

      #map-canvas {
          height: 500px;
          width: 500px;
      }
    </style>
<div id="map-canvas"></div>
    <script>
      function initMap() {
    var pointA = new google.maps.LatLng(7.873054, 80.771797),
        pointB = new google.maps.LatLng(6.099, 80.7777),
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
