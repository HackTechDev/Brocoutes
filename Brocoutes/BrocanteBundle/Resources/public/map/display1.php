<!DOCTYPE html> 
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Broc où t'es : Carte</title>
    <link rel="stylesheet" href="jquery-ui-1.8.12.custom.css" type="text/css" /> 
  </head>
  <style type="text/css">
    #container{position:relative;width:500px;}
    #container #map{width:500px;height:500px;}
  </style>
  <body>
    <div id="container">
        <div id="map">
            <p>Veuillez patienter pendant le chargement de la carte...</p>
        </div>
    </div>
    <?php
        $lat = $_GET["lat"];
        $lon = $_GET["lon"];

        echo $lat . " " . $lon;
    ?>  
    <!-- Include Javascript -->
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="jquery-ui-1.8.12.custom.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
var map;
var initialize;

initialize = function(){
  var latLng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lon; ?>); // Correspond au coordonnées de Lille
  var myOptions = {
    zoom      : 13, // Zoom par défaut
    center    : latLng, // Coordonnées de départ de la carte de type latLng 
    mapTypeId : google.maps.MapTypeId.HYBRID, // Type de carte, différentes valeurs possible HYBRID, ROADMAP, SATELLITE, TERRAIN
    maxZoom   : 20
  };
  
  map      = new google.maps.Map(document.getElementById('map'), myOptions);
  
  var marker = new google.maps.Marker({
    position : latLng,
    map      : map,
    title    : "Lille"
  });
  
  var contentMarker = [
      '<div id="containerTabs">',
      '<div id="tabs">',
      '<ul>',
        '<li><a href="#tab-1"><span>Lorem</span></a></li>',
        '<li><a href="#tab-2"><span>Ipsum</span></a></li>',
        '<li><a href="#tab-3"><span>Dolor</span></a></li>',
      '</ul>',
      '<div id="tab-1">',
        '<h3>Lille</h3><p>Suspendisse quis magna dapibus orci porta varius sed sit amet purus. Ut eu justo dictum elit malesuada facilisis. Proin ipsum ligula, feugiat sed faucibus a, <a href="http://www.google.fr">google</a> sit amet mauris. In sit amet nisi mauris. Aliquam vestibulum quam et ligula pretium suscipit ullamcorper metus accumsan.</p>',
      '</div>',
      '<div id="tab-2">',
       '<h3>Aliquam vestibulum</h3><p>Aliquam vestibulum quam et ligula pretium suscipit ullamcorper metus accumsan.</p>',
      '</div>',
      '<div id="tab-3">',
        '<h3>Pretium suscipit</h3><ul><li>Lorem</li><li>Ipsum</li><li>Dolor</li><li>Amectus</li></ul>',
      '</div>',
      '</div>',
      '</div>'
  ].join('');

  var infoWindow = new google.maps.InfoWindow({
    content  : contentMarker,
    position : latLng
  });
  
  google.maps.event.addListener(marker, 'click', function() {
    infoWindow.open(map,marker);
  });
  
  google.maps.event.addListener(infoWindow, 'domready', function(){ // infoWindow est biensûr notre info-bulle
    jQuery("#tabs").tabs();
  });
};

initialize();    
    </script>
  </body>
</html>
