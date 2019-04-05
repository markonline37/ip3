var map;
//initMap() called when Google Maps API code is loaded - when web page is opened/refreshed 
function initMap() {
    populate();
}

var quakeFeeds = {
    "Past Hour": {
        "All Earthquakes": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_hour.geojson",
        "All 1.0+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_hour.geojson",
        "All 2.5+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_hour.geojson",
        "All 4.5+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_hour.geojson",
        "All Significant": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_hour.geojson"
    },
    "Past Day": {
        "All Earthquakes": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojson",
        "All 1.0+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_day.geojson",
        "All 2.5+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_day.geojson",
        "All 4.5+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_day.geojson",
        "All Significant": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_day.geojson"
    },
    "Past Week": {
        "All Earthquakes": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_week.geojson",
        "All 1.0+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_week.geojson",
        "All 2.5+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojson",
        "All 4.5+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_week.geojson",
        "All Significant": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_week.geojson"
    },
    "Past Month": {
        "All Earthquakes": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_month.geojson",
        "All 1.0+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_month.geojso n",
        "All 2.5+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_month.geojson",
        "All 4.5+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_month.geojson",
        "All Significant": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_month.geojson"

    }
}

var temp = 0;
function makeChildProps(obj, currentProp) {
    var childProps = '';

    for (var prop in obj[currentProp]) {
        var temp1 = "";
        switch(temp){
            case 0:
            case 1:
            case 2:
            case 3:
            case 4:
                temp1 = "Past Hour";
                break;
            case 5:
            case 6:
            case 7:
            case 8:
            case 9:
                temp1 = "Past Day";
                break;
            case 10:
            case 11:
            case 12:
            case 13:
            case 14:
                temp1 = "Past Week";
                break;
            case 15:
            case 16:
            case 17:
            case 18:
            case 19:
                temp1 = "Past Month";
        }
        //make the buttons for changing the earthquake markers - button has stored data for url and feed, and an id so that it can be selected.
        var el = "<button class='feed_name' data-feedurl='" + obj[currentProp][prop] + "' id='feed" + temp + "' data-value1='" + temp1 + "' data-value2='" + prop + "'>" + prop + "</button>";
        childProps += el;
        temp++;
    }

    return childProps;
}

//bool used to stop the first artificial click jumping to map anchor.
var boolean = true;

function populate() {
    map = new google.maps.Map(document.getElementById("map2"), {
        zoom: 2,
        center: new google.maps.LatLng(2.8, -187.3), 
        mapTypeId: 'terrain' 
    });   

    for (var prop in quakeFeeds) {
        if (!quakeFeeds.hasOwnProperty(prop)) {
            continue;
        }
        $('#feedSelector').append("<div class=\"col-10\"><div class=\"btn-group\"><h6>" + prop + "</h6>" + makeChildProps(quakeFeeds, prop)+"</div><div class=\"col-10\"></div>");
    }

    $('.feed_name').click(function (e) {
        //if not first click (which was artifical by the javascript to load the initial data) and document is scrolled - jump to anchor
        if(!boolean && (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20)){
            window.location.href = "#map_anchor";
        } else {
            //if was first click bool = false;
            boolean = false;
        }
        var element = document.getElementById("feedIdentifier");
        //set the feed as part of the h5 tag using data stored in the button
        element.innerHTML = "<h5>Map - " + $(e.target).data('value2') + " In The " + $(e.target).data('value1')+"</h5>";
        map = new google.maps.Map(document.getElementById("map2"), {
        zoom: 2,
        center: new google.maps.LatLng(2.8, -187.3), 
        mapTypeId: 'terrain'
        }); 

        $.ajax({
            url: $(e.target).data('feedurl'), 
            error: function () {
                $('#info').html('<p>An error has occurred</p>');
            },
            // Called when the data has succesfully loaded
            success: function (data) {
                i = 0;
                var markers= [];
                $.each(data.features, function (key, val) {
                    var coords = val.geometry.coordinates;
                    var latLng = new google.maps.LatLng(coords[1], coords[0]);
                    // Now create a new marker on the map
                    var marker = new google.maps.Marker({
                        position: latLng,
                        map: map
                    });
                    markers[i++] = marker;
                    var infowindow = new google.maps.InfoWindow({
                        content: "<h3>" + val.properties.title + "</h3><p><a href='" + "locationinfo.php" + "?lat=" + coords[1] + "&long=" + coords[0] + "'target='_blank'" + ">Details</a></p>"
                    });
                    marker.addListener('click', function (data) {
                        infowindow.open(map, marker);
                    });
                });
                var markerCluster = new MarkerClusterer(map, markers, {
                    imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m' 
                });
            }

        });
    });
}

//once loaded load the first data and resize the map
window.onload = function(){
    document.getElementById('feed15').click();
    resizer();
}

//on window resize call resizer function
window.addEventListener("resize", resizer);
//on window resize change the height of map to stop scrollbars
function resizer() {
    var h = window.innerHeight;
    document.getElementById('map2').style.height = (h*0.6)+"px";
}