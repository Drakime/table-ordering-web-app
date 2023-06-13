// initialize the map on the "map" div with a given center and zoom
var map = L.map('map', {
    center: [53.82622, -1.59341],
    zoom: 15
});

// add the OpenStreetMap tiles
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
}).addTo(map);

// show the scale bar on the lower left corner
L.control.scale({imperial: true, metric: true}).addTo(map)
// show a marker on the map
L.marker([53.82622, -1.59341]).bindPopup('Funky Bar').addTo(map);

$('#mapModal').on('shown.bs.modal', function(){
    setTimeout(function() {
        map.invalidateSize();
    }, 10);
});
