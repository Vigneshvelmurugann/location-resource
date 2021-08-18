
<?php 
if (isset($_POST['jj'])) {
  $id=$_POST['id'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Create a draggable Marker</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>


<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css' type='text/css' />
<style>
body { margin: 0; padding: 0; }
#map {position: absolute; top: 0; bottom: 0; margin-top:40px;width: 80%; height:80%; }
</style>
</head>

<body>
    
<style>
.coordinates {
background: rgba(0, 0, 0, 0.5);
color: #fff;
position: absolute;
bottom: 40px;
left: 10px;
padding: 5px 10px;
margin: 0;
font-size: 11px;
line-height: 18px;
border-radius: 3px;
display: none;
}
</style>
 <div>
<div id="map"></div>
<pre id="coordinates" class="coordinates"></pre>
</div>
<script>


	mapboxgl.accessToken = 'pk.eyJ1Ijoid2lsbGlhbXZpa2kiLCJhIjoiY2tvdHV0bTd3MDdsbzJvcGRmeHRheXk1MCJ9.JOPSuLEakt-AwpckIsIzVQ';
var coordinates = document.getElementById('coordinates');

var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [0, 0],
zoom: 5

});
var geolocate = new mapboxgl.GeolocateControl();
map.addControl(geolocate);
var navi=new mapboxgl.NavigationControl();
map.addControl(navi,'top-left');
var geocoder=new MapboxGeocoder({
accessToken: mapboxgl.accessToken,
mapboxgl: mapboxgl
});

map.addControl(
new MapboxGeocoder({
accessToken: mapboxgl.accessToken,
mapboxgl: mapboxgl
})
);
geocoder.on()

geolocate.on('geolocate', function(e) {
  
      var lon = e.coords.longitude;
      var lat = e.coords.latitude;
      var position = [lon, lat];
      console.log(position);
      
var marker = new mapboxgl.Marker({
draggable: true
})
.setLngLat(position)
.addTo(map);
 
function onDragEnd() {
var lngLat = marker.getLngLat();
coordinates.style.display = 'block';
coordinates.innerHTML =
'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
document.getElementById("latu").value = lngLat.lat;
document.getElementById("longu").value = lngLat.lng;
}
 
marker.on('dragend', onDragEnd);

  map.addSource('single-point', {
    type: 'geojson',
    data: {
      type: 'FeatureCollection',
      features: []
    }
  });

}); 
var geocoder = new MapboxGeocoder({ // Initialize the geocoder
  accessToken: mapboxgl.accessToken, // Set the access token
  mapboxgl: mapboxgl, // Set the mapbox-gl instance
  marker: false, // Do not use the default marker style
});


// Add the geocoder to the map

// After the map style has loaded on the page,
// add a source layer and default styling for a single point
map.on('load', function() {
    


  // Listen for the `result` event from the Geocoder
  // `result` event is triggered when a user makes a selection
  //  Add a marker at the result's coordinates
  geocoder.on('result', function(e) {
    map.getSource('single-point').setData(e.result.geometry);
  });
});
</script>
<div>
<form action="infos.php" method="post">
      <input type="hidden" name="iddd" value="<?php echo $id; ?>" >
    <input type="hidden" id="latu"name="latu" value=""/>
<input type="hidden" name="longu" id="longu" value=""/>
<input type="submit" name="like" value="submit location">
</form>
</div>
</body>
</html>

