<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Display driving directions</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>
<body>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
<div id="map"></div>
 
<script>

	mapboxgl.accessToken = 'pk.eyJ1Ijoid2lsbGlhbXZpa2kiLCJhIjoiY2tvdHV0bTd3MDdsbzJvcGRmeHRheXk1MCJ9.JOPSuLEakt-AwpckIsIzVQ';
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [-79.4512, 43.6568],
zoom: 13
});
 
var directions = new MapboxDirections({
        accessToken: mapboxgl.accessToken
    });



    


map.addControl(directions,'top-left');

map.addControl(new mapboxgl.GeolocateControl({
  positionOptions: {
    enableHighAccuracy: true
  },
    trackUserLocation: true
}));

map.on('load',  function() {
    var a=sessionStorage.getItem("lat");
    var b=sessionStorage.getItem("long");
    console.log(a,b);
    if ( navigator.geolocation ) 
{
    navigator.geolocation.getCurrentPosition( function(position) {

        var lng = position.coords.longitude;
        var lat = position.coords.latitude;   
    
    directions.setOrigin([lng,lat]); // can be address in form setOrigin("12, Elm Street, NY")
    directions.setDestination([b,a]); // can be address
})
}});

</script>
 
</body>
</html>