//delete ip on live version - for offline development
ip = "31.205.14.217";

var map;
//bool to check if map has changed
var changed = false;
var error = false;

//required function with google maps - by default on page load center map based on user's IP address
function initMap() {
    drawMap(ip);
}

function drawMap(input) {
    //replace spaces with URL friendly characters
    input = input.replace(" ", "%20");

    //if error occured display error message
    if(error){
        document.getElementById("info").innerHTML = "Error occured, please try again or contact systems administrator";
        error = false;
    } else {
        document.getElementById("info").innerHTML = "";
    }
    
    //make a request to server via php to get the data (to hide the API keys)
    $.ajax({
        type: "POST",
        url: "script/weather-load.php",
        data: {phpinput: input},
        error: function() {
            //load default view and show error
            error = true;
            drawMap(ip);
        },
        success: function(json_data){
            //parse data returned from php
            var data = $.parseJSON(json_data);

            //create and populate the forecast container
            document.getElementById("weather-container").innerHTML = "";
            var i;
            for (i = 0; i < data.forecast.forecastday.length; i++) {
                var sb = "<button class=\"accordion\">";
                if(i===0){
                    sb+="Now";
                } else if(i===1){
                    sb+="Tomorrow";
                } else {
                    var date = data.forecast.forecastday[i].date;
                    var year = date.substring(4, 0);
                    var month = date.substring(5, 7);
                    var day = date.substring(8, 10);
                    sb+=day+"/"+month+"/"+year;
                }
                sb+="</button>\n<div class=\"panel\">\n";
                sb+="<table class=\"weather-table\">\n";
                sb+="<tr>\n<td rowspan=\"7\">\n<img id=\"weather-image\" src=\"http:";
                sb+=data.forecast.forecastday[i].day.condition.icon;
                sb+="\" alt=\""+data.forecast.forecastday[i].day.condition.text+"\">\n</td>\n";
                
                if(i===0){
                    sb+="<td>\nCondition Now:\n</th>\n<th>\n"+data.current.condition.text+"\n</td>\n</tr>\n";
                    sb+="<tr>\n<td>\nTemperature Now:\n</th>\n<th>\n"+data.current.temp_c+"°C\n</th>\n</td>\n";
                    sb+="<tr>\n<td>\nWind Speed Now:\n</th>\n<th>\n"+data.current.gust_mph+" MPH\n</th>\n</td>\n";
                    if(data.current.is_day){
                        sb+="<tr>\n<td>\nSunset:\n</th>\n<th>\n"+data.forecast.forecastday[i].astro.sunset+"\n</th>\n</td>\n";
                    }
                } else {
                    sb+="<td>\nCondition:\n</th>\n<th>\n"+data.forecast.forecastday[i].day.condition.text+"\n</td>\n</tr>\n";
                    sb+="<tr>\n<td>\nMinimum Temperature:\n</th>\n<th>\n"+data.forecast.forecastday[i].day.mintemp_c+"°C\n</th>\n</td>\n";
                    sb+="<tr>\n<td>\nAverage Temperature:\n</th>\n<th>\n"+data.forecast.forecastday[i].day.avgtemp_c+"°C\n</th>\n</td>\n";
                    sb+="<tr>\n<td>\nMaximum Temperature:\n</th>\n<th>\n"+data.forecast.forecastday[i].day.maxtemp_c+"°C\n</th>\n</td>\n";
                    sb+="<tr>\n<td>\nWind Speed (Max):\n</th>\n<th>\n"+data.forecast.forecastday[i].day.maxwind_mph+" MPH\n</th>\n</td>\n";
                    sb+="<tr>\n<td>\nSunrise:\n</th>\n<th>\n"+data.forecast.forecastday[i].astro.sunrise+"\n</th>\n</td>\n";
                    sb+="<tr>\n<td>\nSunset:\n</th>\n<th>\n"+data.forecast.forecastday[i].astro.sunset+"\n</th>\n</td>\n";
                }

                
                sb+="</table>\n";
                sb+="</div>\n";
                document.getElementById("weather-container").innerHTML += sb;
            }

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
        },
        complete: function(data) {
            //only place listener after loading is finished or else the heights of accordion aren't accurate
            accordionListener();
        }
    });
}

//accordion listener to be called after ajax request is complete
function accordionListener() {
    var acc = document.getElementsByClassName("accordion");
    var panel2 = acc[0].nextElementSibling;
    //automatically sets the first panel "active" (not hidden)
    acc[0].classList.add("active");
    panel2.style.maxHeight = (panel2.scrollHeight*4) + "px";

    for (var i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight){
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            } 
        });
    }
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