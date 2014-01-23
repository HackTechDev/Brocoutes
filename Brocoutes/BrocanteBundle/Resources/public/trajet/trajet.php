<!DOCTYPE html>
<html>
  <head>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&language=fr"></script>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #map-canvas {
        height: 800px;
        width: 800px;
      }
      #content-pane {
        width:48%;
      }
      #outputDiv {
        font-size: 11px;
        width: 800px;
      }
    </style>
    <script>
/**
    http://www.shatimes.com/tuto-google-map-api-v3/
    http://www.shatimes.com/tuto-calculer-et-tracer-un-itineraire-avec-google-maps-api-v3/
    https://developers.google.com/maps/documentation/javascript/examples/distance-matrix?hl=fr
*/

var directionsDisplay;
var directionsService = new google.maps.DirectionsService();


var map;
var geocoder;
var bounds = new google.maps.LatLngBounds();
var markersArray = [];

var origin = new Array();
origin[0] = new google.maps.LatLng(49.676651, 4.976834999999937); // Bazeilles
origin[1] = new google.maps.LatLng(49.676651, 4.976834999999937); // Bazeilles

var destination = new Array();
destination[0] = 'Donchery, France'; // Donchery
destination[1] = new google.maps.LatLng(49.583695, 5.25939900000003); // Margut

var destinationIcon = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=D|FF0000|000000';
var originIcon = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=O|FFFF00|000000';

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();

  var opts = {
    center: new google.maps.LatLng(49.676651, 4.976834999999937),
    zoom: 10
  };
  map = new google.maps.Map(document.getElementById('map-canvas'), opts);
  directionsDisplay.setMap(map);

  geocoder = new google.maps.Geocoder();
}

function calculateDistances() {
  var service = new google.maps.DistanceMatrixService();
  service.getDistanceMatrix(
    {
      origins: [origin[0], origin[1]],
      destinations: [destination[0], destination[1]],
      travelMode: google.maps.TravelMode.DRIVING,
      unitSystem: google.maps.UnitSystem.METRIC,
      avoidHighways: false,
      avoidTolls: false
    }, callback);
}

function displayRoute(route) {
  var request = {
      origin: origin[route],
      destination: destination[route],
      travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
}

function callback(response, status) {
  if (status != google.maps.DistanceMatrixStatus.OK) {
    alert('Error was: ' + status);
  } else {
    var origins = response.originAddresses;
    var destinations = response.destinationAddresses;
    var outputDiv = document.getElementById('outputDiv');
    outputDiv.innerHTML = '';
    deleteOverlays();

    for (var i = 0; i < origins.length; i++) {
      var results = response.rows[i].elements;
      addMarker(origins[i], false);
      placeStart = origins[i];
      for (var j = 0; j < results.length; j++) {
        addMarker(destinations[j], true);
      }
    }

      for (var j = 0; j < results.length; j++) {
        outputDiv.innerHTML += '<button type=button onclick=displayRoute(' + j + ')>Route ' + j+ '</button> ' 
            + placeStart + ' vers ' + destinations[j]
            + ': <b>' + results[j].distance.text + '</b> en <b>'
            + results[j].duration.text + '</b> '
            + '<br/>';
      }


  }
}

function addMarker(location, isDestination) {
  var icon;
  if (isDestination) {
    icon = destinationIcon;
  } else {
    icon = originIcon;
  }
  geocoder.geocode({'address': location}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      bounds.extend(results[0].geometry.location);
      map.fitBounds(bounds);
      var marker = new google.maps.Marker({
        map: map,
        position: results[0].geometry.location,
        icon: icon
      });
      markersArray.push(marker);
    } else {
      alert('Geocode was not successful for the following reason: '
        + status);
    }
  });
}

function deleteOverlays() {
  for (var i = 0; i < markersArray.length; i++) {
    markersArray[i].setMap(null);
  }
  markersArray = [];
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="content-pane">
      <div id="inputs">
        <p><button type="button" onclick="calculateDistances();">Calculer la distance</button></p>
      </div>
      <div id="outputDiv"></div>
    </div>
    <br/>
    Carte :<br/>
    <br/>
    <div id="map-canvas"></div>
  </body>
</html>


