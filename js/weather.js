//delete ip on live version - for offline development
ip = "31.205.14.217";

var map;
//bool to check if map has changed
var changed = false;

function initMap() {
    drawMap(ip);
}

function drawMap(input) {
    input = input.replace(" ", "%20");
    var address = "http://api.apixu.com/v1/current.json?key=c0ff85500cc74e2a8b1212317191703&q=" + input;
    $.ajax({
        url: address,
        error: function() {
            //error - update ********************************************************
            console.log("AWWW SHEEEET");
        },
        success: function(data){
            var lat = data.location.lat;
            var lon = data.location.lon;
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: new google.maps.LatLng(lat, lon),
                mapTypeId: 'terrain'
            });
            var image = "http:" + data.current.condition.icon;
            var marker = new google.maps.Marker({
                position: {lat: lat, lng: lon},
                map: map,
                icon: image
            });
            var dataName = data.location.name;
            var temperature = data.current.temp_c;
            var condition = data.current.condition.text;
            var localtime = data.location.localtime;
            var infowindow = new google.maps.InfoWindow({
                content: "Location: "+dataName+"<br>Temperature: "+temperature+"°C<br>Condition: "+condition+"<br>Local Time: "+localtime
            });
            infowindow.open(map, marker);
        }
    });
}

function searchByName() {
    var error = document.getElementById("name-error");
    error.innerHTML = "<br>";
    var input = "";
    input = document.getElementById("location-name").value;
    if(!input){
        error.innerHTML = "The search field cannot be empty.";
    } else {
        changed = true;
        drawMap(input);
    }
}

function searchByLatLon() {
    var error = document.getElementById("latlon-error");
    error.innerHTML = "<br>";
    var lat = "";
    var lon = "";
    lat = document.getElementById("location-latitude").value;
    lon = document.getElementById("location-longitude").value;
    if(!lat || !lon){
        error.innerHTML = "Latitude and Longitude fields cannot be empty.";
    } else if(lat.match(/[a-z]/i) || lon.match(/[a-z]/i)) {
        error.innerHTML = "Latitude and Longitude must not contain letters";
    } else {
        changed = true;
        drawMap(lat+","+lon);
    }
}

function clearName() {
    //press clear button - reset map, error message, and text field
    document.getElementById("name-error").innerHTML = "<br>";
    document.getElementById("location-name").value = "";
    //check if map has been changed from default view to stop redraw on clear
    if(changed){
        changed = false;
        drawMap(ip);
    }
}

function clearLatLon() {
    //press clear button - reset map, error message, and text fields
    document.getElementById("latlon-error").innerHTML = "<br>";
    document.getElementById("location-latitude").value = "";
    document.getElementById("location-longitude").value = "";
    //check if map has been changed from default view to stop redraw on clear
    if(changed){
        changed = false;
        drawMap(ip);
    }
}

$(document).ready(function () {

    $('#earthquakes').click(function () {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 2,
            center: new google.maps.LatLng(2.8, -187.3),
            mapTypeId: 'terrain'
        });
        $.ajax({
            url: "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_day.geojson", //Unused example: https://earthquake.usgs.gov/fdsnws/event/1/query?format=geojson&starttime=2018-01-01&endtime=2018-01-02",
            error: function () {
                $('#info').html('<p>An error has occurred</p>');
            },

            success: function (data) {

                $.each(data.features, function (key, val) {
                    var coords = val.geometry.coordinates;
                    lat = coords[1]; // geojson uses (lng, lat) ordering so lat stored at coords[1]
                    lng = coords[0]; // lng stored at coords[0]

                    var latLng = new google.maps.LatLng(lat, lng);
                    var marker = new google.maps.Marker({
                        position: latLng,
                        map: map,
                        label: val.properties.mag.toString()
                    });
                    the_href = val.properties.url + "\'" + ' target=\'_blank\'';
                    var infowindow = new google.maps.InfoWindow({
                        content: "We access some external data (in this case it is weather) when we click on a marker. We update the page with the weather information. This method is useful for any data API that can be searched using a lat,lon coordinate."
                    });
                    marker.addListener('click', function () {
                        // We use the lat and lon as the parameters in the API call to weather service
                        var lat = marker.position.lat();
                        var lng = marker.position.lng();
                        // You need to use the FREE signup at https://www.apixu.com/ to get a key for the Weather URL below
                        theURL = 'http://api.apixu.com/v1/current.json?key=c0ff85500cc74e2a8b1212317191703&q=' + lat.toFixed(4) + ',' + lng.toFixed(4);
                        $.ajax({
                            url: theURL,
                            success: function (data) {
                                image = new Image();
                                if (data.error) {
                                    image.src = "http://via.placeholder.com/64x64?text=%20"; // Error, so we use blank image for weather. See 'error:' below for another way to include a small blank image
                                }
                                else {
                                    image.src = "http:" + data.current.condition.icon; // icon is specified within the data

                                    $('#weatherInfo').html('<p>' + data.current.condition.text + '</p>'); // current weather in text format
                                }
                                image.onload = function () {
                                    $('#weatherImage').empty().append(image);
                                };

                            },
                            error: function () { // Weather service could not provide weather for requested lat,lon world location
                                image = new Image();
                                // A local 64*64 transparent image. Generated from the useful site: http://png-pixel.com/
                                image.src = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAQAAAAAYLlVAAAAPElEQVR42u3OMQEAAAgDIJfc6BpjDyQgt1MVAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBgXbgARTAX8ECcrkoAAAAAElFTkSuQmCC";
                                image.onload = function () {
                                    //set the image into the web page
                                    $('#weatherImage').empty().append(image);
                                };
                            }
                        });
                        infowindow.open(map, marker);
                    });
                });
            }
        });
    });
});