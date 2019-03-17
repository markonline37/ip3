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
var url;
var time;

$(document).ready(function () {

    $('#hour').click(function () {
        url= "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_hour.geojson";
        time= url;
        update();
    });
    $('#day').click(function () {
        url= "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojson";
        time= url;
        update();
    });
    $('#7days').click(function () {
        url= "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_week.geojson";
        time= url;
        update();
    });
    $('#30days').click(function () {
        url= "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_month.geojson";
        time= url;
        update();
    });
    $('#sig').click(function () {
        if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_hour.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_hour.geojson";
        }
        else if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_day.geojson";
        }
        else if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_week.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_week.geojson";
        }
        else if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_month.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_month.geojson";
        }
        else{
            throw "Please select a time range";
            return;
        }
        update();
    });
    $('#m45').click(function () {
        if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_hour.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_hour.geojson";
        }
        else if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_day.geojson";
        }
        else if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_week.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_week.geojson";
        }
        else if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_month.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_month.geojson";
        }
        else{
            throw "Please select a time range";
            return;
        }
        update();
    });
    $('#m25').click(function () {
        if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_hour.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_hour.geojson";
        }
        else if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_day.geojson";
        }
        else if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_week.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojson";
        }
        else if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_month.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_month.geojson";
        }
        else{
            throw "Please select a time range";
            return;
        }
        update();
    });
    $('#m10').click(function () {
        if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_hour.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_hour.geojson";
        }
        else if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_day.geojson";
        }
        else if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_week.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_week.geojson";
        }
        else if(time == "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_month.geojson"){
            url = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_month.geojson";
        }
        else{
            throw "Please select a time range";
            return;
        }
        update();
    });

});



function update(){  
        
        // Set Google map  to its start state
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 2,
            center: new google.maps.LatLng(2.8, -187.3), // Center Map. Set this to any location that you like
            mapTypeId: 'terrain' // can be any valid type
        });  

        // The following uses JQuery library
        $.ajax({
            // The URL of the specific data required
            url: url,

            // Called if there is a problem loading the data
            error: function () {
                $('#info').html('<p>An error has occurred</p>');
            },
            // Called when the data has succesfully loaded
            success: function (data) {
                i = 0;
                var markers= [];
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
    }