//delete ip on live version - for offline development (with this line deleted ip should be loaded via a php variable already set);
ip = "31.205.14.217";

var map;
//bool to check if map has changed
var changed = false;
var error = false;
var errorText = "";
var storedData;

//required function with google maps - by default on page load center map based on user's IP address
function initMap() {
    drawMap(ip);
}

function drawMap(input) {
    //replace spaces with URL friendly characters
    var input2 = input.replace(" ", "%20");

    //if error occured display error message
    if(error){
        document.getElementById("info").innerHTML = errorText;
        error = false;
        return;
    } else {
        document.getElementById("info").innerHTML = "";
    }
    
    //make a request to server via php to get the data (to hide the API keys)
    $.ajax({
        type: "POST",
        url: "script/weather-load.php",
        data: {phpinput: input2},
        error: function() {
            //load default view and show error
            error = true;
            errorText = "Error occured, please reload page or contact systems administrator";
            drawMap(ip);
        },
        success: function(json_data){
            if(json_data === "error"){
                error = true;
                errorText = "No Data found for: "+input;
                drawMap(ip);
            } else {
                //parse data returned from php
                var data = $.parseJSON(json_data);
                storedData = data;
                //get the forecast container
                var forecastContainer = document.getElementById("forecast1");
                forecastContainer.innerHTML = "<h5>" +data.location.name +" Forecast</h5>";
                
                //create and populate the forecast container
                var i;
                for (i = 0; i < data.forecast.forecastday.length; i++) {

                    //forecast -----------------------------------------------------------------
                    var stringBuilder = "";
                    stringBuilder+="<div class=\"col-sixth\"><div class=\"container\" data-identifier=\"" + i + "\" >\n";
                    if(i===0){
                        stringBuilder+="Now";
                    } else if(i===1){
                        stringBuilder+="Tomorrow";
                    } else {
                        var date = data.forecast.forecastday[i].date;
                        var year = date.substring(4, 0);
                        var month = date.substring(5, 7);
                        var day = date.substring(8, 10);
                        stringBuilder+=day+"/"+month+"/"+year;
                    }
                    stringBuilder+="\n<br>\n<img id=\"weather-image\" src=\"http:";
                    stringBuilder+=data.forecast.forecastday[i].day.condition.icon;
                    stringBuilder+="\" alt=\""+data.forecast.forecastday[i].day.condition.text+"\">\n<br>\n";
                    if(i===0){
                        stringBuilder+=data.current.temp_c+"°C\n";
                    } else {
                        stringBuilder+=data.forecast.forecastday[i].day.maxtemp_c+"°C\n";
                    }
                    stringBuilder+="</div>\n</div>\n";
                    forecastContainer.innerHTML += stringBuilder;
                    
                }
                //add the slider
                forecastContainer.innerHTML += "<div class=\"slidecontainer2\"><input type=\"range\" min=\"1\" max=\"6\" value=\"1\" class=\"slider2\" id=\"myRange\"></div><br>";

                //centre the map on the location derived by input
                var lat = data.location.lat;
                var lon = data.location.lon;
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 8,
                    center: new google.maps.LatLng(lat, lon),
                    mapTypeId: 'terrain'
                });
                //put an icon, marker, infowindow, and some basic information on the map
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
                drawDetailed(0);
            }
        },
        complete: function() {
            //add a listener to slider
            document.getElementById("myRange").addEventListener("click", function(){
                drawDetailed(document.getElementById("myRange").value-1);
            });
            //add a listener to container div
            $('.container').on('click', function (e) {
                drawDetailed($(e.currentTarget).data('identifier'));
            });

            resizer();
        }
    });
}

//draws the detailed information based on value
function drawDetailed(value){
    //because slider starts at 1, but array starts at 0
    document.getElementById("myRange").value = value+1;
    var container = document.getElementById("forecast2");
    //title stuff
    var sb = "<h5>";
    switch(value){
        case 0:
            sb+="Now";
            break;
        case 1:
            sb+="Tomorrow";
            break;
        case 2:
        case 3:
        case 4:
        case 5:
            var date = storedData.forecast.forecastday[value].date;
            var year = date.substring(4, 0);
            var month = date.substring(5, 7);
            var day = date.substring(8, 10);
            sb+=day+"/"+month+"/"+year;
            break;
    }
    sb+="</h5>\n";

    sb+="<table class=\"weather-table\">\n";
    sb+="<tr>\n<td rowspan=\"7\">\n<img id=\"weather-image\" src=\"http:";
    sb+=storedData.forecast.forecastday[value].day.condition.icon;
    sb+="\" alt=\""+storedData.forecast.forecastday[value].day.condition.text+"\">\n</td>\n";
    
    //if it's now - has different information than forecast
    if(value===0){
        sb+="<td>\nCondition Now:\n</th>\n<th>\n"+storedData.current.condition.text+"\n</td>\n</tr>\n";
        sb+="<tr>\n<td>\nTemperature Now:\n</th>\n<th>\n"+storedData.current.temp_c+"°C\n</th>\n</td>\n";
        sb+="<tr>\n<td>\nWind Speed Now:\n</th>\n<th>\n"+storedData.current.gust_mph+" MPH\n</th>\n</td>\n";
        if(storedData.current.is_day){
            sb+="<tr>\n<td>\nSunset:\n</th>\n<th>\n"+storedData.forecast.forecastday[value].astro.sunset+"\n</th>\n</td>\n";
        }
    } else {
        sb+="<td>\nCondition:\n</th>\n<th>\n"+storedData.forecast.forecastday[value].day.condition.text+"\n</td>\n</tr>\n";
        sb+="<tr>\n<td>\nMinimum Temperature:\n</th>\n<th>\n"+storedData.forecast.forecastday[value].day.mintemp_c+"°C\n</th>\n</td>\n";
        sb+="<tr>\n<td>\nAverage Temperature:\n</th>\n<th>\n"+storedData.forecast.forecastday[value].day.avgtemp_c+"°C\n</th>\n</td>\n";
        sb+="<tr>\n<td>\nMaximum Temperature:\n</th>\n<th>\n"+storedData.forecast.forecastday[value].day.maxtemp_c+"°C\n</th>\n</td>\n";
        sb+="<tr>\n<td>\nWind Speed (Max):\n</th>\n<th>\n"+storedData.forecast.forecastday[value].day.maxwind_mph+" MPH\n</th>\n</td>\n";
        sb+="<tr>\n<td>\nSunrise:\n</th>\n<th>\n"+storedData.forecast.forecastday[value].astro.sunrise+"\n</th>\n</td>\n";
        sb+="<tr>\n<td>\nSunset:\n</th>\n<th>\n"+storedData.forecast.forecastday[value].astro.sunset+"\n</th>\n</td>\n";
    }
    sb+="</table>\n";

    container.innerHTML = sb;
}

//on window resize call resizer to change height of map to avoid scrollbars
window.addEventListener("resize", resizer);
function resizer() {
    var h = window.innerHeight;
    document.getElementById('map').style.height = (h*0.3)+"px";
}

//listen for enter
function submitSearchName(e){
    if (e.keyCode === 13){
        searchByName();
    }
}

//search by location name, check for errors etc if none do a search
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

//listen for enter
function submitSearchLotLan(e){
    if (e.keyCode === 13){
        searchByLatLon();
    }
}

//search by lat/lon, check for errors etc and if none do the search
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

function clearSearch() {
    //press clear button - reset map, error message, and text field
    document.getElementById("name-error").innerHTML = "<br>";
    document.getElementById("latlon-error").innerHTML = "<br>";
    document.getElementById("location-name").value = "";
    document.getElementById("location-latitude").value = "";
    document.getElementById("location-longitude").value = "";
    //check if map has been changed from default view to stop redraw on clear
    if(changed){
        changed = false;
        drawMap(ip);
    }
}