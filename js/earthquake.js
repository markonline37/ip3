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

var quakeFeeds = {
    "past hour": {
        "all earthquakes": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_hour.geojson",
        "all 1.0+": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_hour.geojson",
        "all 2.5+": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_hour.geojson",
        "all 4.5+": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_hour.geojson",
        "all significant": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_hour.geojson"
    },
    "past day": {
        "all earthquakes": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojson",
        "all 1.0+": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_day.geojson",
        "all 2.5+": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_day.geojson",
        "all 4.5+": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_day.geojson",
        "all significant": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_day.geojson"
    },
    "past week": {
        "all earthquakes": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_week.geojson",
        "all 1.0+": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_week.geojson",
        "all 2.5+": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojson",
        "all 4.5+": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_week.geojson",
        "all significant": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_week.geojson"
    },
    "past month": {
        "all earthquakes": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_month.geojson",
        "all 1.0+": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_month.geojson",
        "all 2.5+": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_month.geojson",
        "all 4.5+": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_month.geojson",
        "all significant": "http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_month.geojson"

    }
}

function makeChildProps(obj, currentProp) {
    var childProps = '';

    for (var prop in obj[currentProp]) {
        var el = "<div class='child-prop'><button class='feed-name' data-feedurl='" + obj[currentProp][prop] + "'>" + prop + "</button></div>";
        childProps += el;
    }

    return childProps;
}

$(document).ready(function () {

    for (var prop in quakeFeeds) {

        if (!quakeFeeds.hasOwnProperty(prop)) {
            continue;
        }

        $('#feedSelector').append("<div class='feed-date'>" + prop + "</div>" + makeChildProps(quakeFeeds, prop));
        console.log(makeChildProps(quakeFeeds, prop));
    }

    $('.feed-name').click(function (e) {

        map = new google.maps.Map(document.getElementById('map'), {
        zoom: 2,
        center: new google.maps.LatLng(2.8, -187.3), // Center Map. Set this to any location that you like
        mapTypeId: 'terrain' // can be any valid type
        }); 

        $.ajax({
            url: $(e.target).data('feedurl'), // The GeoJSON URL associated with a specific button was stored in the button's properties when the button was created
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
    });
});