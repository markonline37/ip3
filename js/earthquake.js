var map;
//initMap() called when Google Maps API code is loaded - when web page is opened/refreshed 
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 2,
        center: new google.maps.LatLng(2.8, -187.3), // Center Map. Set this to any location that you like
        mapTypeId: 'terrain' // can be any valid type
    });
}

var thelocation;
var titleName;
$(document).ready(function () {

    $('#earthquakes').click(function () {
        // Set Google map  to its start state
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 2,
            center: new google.maps.LatLng(2.8, -187.3), // Center Map. Set this to any location that you like
            mapTypeId: 'terrain' // can be any valid type
        });
        // The following uses JQuery library
        $.ajax({
            // The URL of the specific data required
            url: "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_day.geojson",

            // Called if there is a problem loading the data
            error: function () {
                $('#info').html('<p>An error has occurred</p>');
            },
            // Called when the data has succesfully loaded
            success: function (data) {
                i = 0;
                var markers = []; // keep an array of Google Maps markers, to be used by the Google Maps clusterer
                $.each(data.features, function (key, val) {
                    // Get the lat and lng data for use in the markers
                    var coords = val.geometry.coordinates;
                    var latLng = new google.maps.LatLng(coords[1], coords[0]);
                    // Now create a new marker on the map
                    var marker = new google.maps.Marker({
                        position: latLng,
                        map: map
                    });
                    markers[i++] = marker; // Add the marker to array to be used by clusterer
                });
                var markerCluster = new MarkerClusterer(map, markers,
                    { imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m' });
            }
        });
    });
});