<?php 
$title = 'Earthquake Tutorial';
$description = 'Earthquake Tutorial';
include('inc/header.php');
?>
<link href="css/tutorial.css" rel="stylesheet" type="text/css">

<h1>Earthquake Tutorial</h1>

The purpose of this page is to provide a tutorial to the earthquake visualization which can be found <a href="earthquake.php">here</a>.<br>
In the visualization a set of earthquake data is retrieved and displayed on a map. A general overview and an explanation of the relevant concepts can be found below.
<br><br>
This tutorial requires some javascript knowledge; for a tutorial 
<a href="javascripttutorial.php">click here.</a> <br>
It is also recommended to understand geoJson; for a tutorial on that <a href="geojsontutorial.php">click here.</a>
<br><br>

<h5>Menu</h5>
<ul>
	<li><a href="#section1_anchor">Background Information</a></li>
	<li><a href="#section2_anchor">Resources</a></li>
	<li><a href="#section3_anchor">Implementation</a></li>
	<li><a href="#section4_anchor">References</a></li>
</ul>

<a id="section1_anchor"></a>
<h5>Background Information</h5>
Earthquakes originate from a sudden release of energy on or in the earth. The causes can vary and the effects can be devastating, thus it is important to document these and provide the public with knowledge about them. <br><br>

There is usually a specific point as the origin, and it is usually the spot where tectonic collide with each other, known as a fault. This point would be recorded as the origin, so the location would be entered as the data for longitude and latitude. <br><br>

The richter scale measures the size of the earthquake. The higher an earthquake is on the richter scale, the more destruction it is likely to cause, so a sorting functionality would be useful to filter out those that just cause slight tremors. <br><br>

For more information on earthquakes this website can be visited:<br>
<a href="https://www.explainthatstuff.com/earthquakes.html">https://www.explainthatstuff.com/earthquakes.html</a><br><br>

<a id="section2_anchor"></a>
<h5>Resources</h5>
The google maps api is one of the more significant elements in the development of this page. This is retrieved, using a key, from:<br>
https://maps.googleapis.com/maps/api/js?key=[key]&callback=initMap.<br><br>

This allows the website to display a map which the user can navigate and zoom in and out of. This key is protected by making it ip-restricted, such that the server would be the only client able to use the key.  <br><br>

The earthquake feeds are received from <a href="https://earthquake.usgs.gov/earthquakes/feed/v1.0/">https://earthquake.usgs.gov/earthquakes/feed/v1.0/</a> . This website provides GeoJSON data to earthquakes in specific timeframes. <br>
GeoJSON is essentially just a format used to represent geographical data. More about this data format can be read  <a href="geojsontutorial.php"> here </a>. <br><br>

One of the requirements for the website is that the data shown on  the map is dynamically clustered. This is achieved by using a google-provided set of Javascript code: <br>
<a href="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js</a><br><br>

This interacts with the google maps api previously mentioned to provide a clustering functionality to markers on the map. What this will do in the end product is group together earthquakes and indicate the amount of earthquakes in the cluster. As the user zooms in, the cluster disappears and the individual earthquakes show.<br><br>

Another part of the website is the info-windows, which pop up as the user clicks on the earthquake markers. These open a new tab and display information about the location. The locational information for this part is sourced from: <br>
https://api.opencagedata.com/geocode/v1/json?q=[latitude]%2C%20[longitude]&key=[key]&language=en&pretty=1. <br>
Naturally, the user would need a key and a latitude and longitude to use this url. <br><br>

This part of the website also displays the flag of the relevant country, which is gotten from https://www.countryflags.io/[countryCode]/flat/64.png. The country code from opencagedata is used to display the flag. <br><br>

A key part of this website is the retrieval of JSON data. How is this done? In this case, using JQuery, which is essentialy just a javascript library. JQuery also includes functionality for ajax requests, which are used to update the page with data as it is running. This website uses ajax to import data by importing the jquery library:<br>
<a href="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js</a><br><br>

<a id="section3_anchor"></a>
<h5>Implementation</h5>
<br>
<h3>HTML</h3>
To use the resources mentioned above, a few script tags are created in HTML:<br>
<pre>
    <code>&lt;script src=&quot;https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js&quot;&gt;&lt;/script&gt;</code>
    <code>&lt;script src=&quot;https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js&quot;&gt;&lt;/script&gt;</code>
    <code>&lt;script async defer src=&quot;https://maps.googleapis.com/maps/api/js?key=[key]&callback=initMap&quot;&gt;&lt;/script&gt;</code>
</pre>
This part of the page also requires some other tags, as the javascript file will need reference points for the buttons and map. A div where the set of buttons will be inserted should be included, as well as a div for the map to be displayed in. These should be assigned with appropriate id's. Additional tags for formatting are also recommended. The html finishes off with a reference to the javascript file, which will be responsible for creating the buttons and loading the map. <br>
<pre>
    <code>&lt;script type=&quot;text/javascript&quot; src=&quot;js/earthquake.js&quot;&gt;&lt;/script&gt;</code>
</pre>	

<h3>Javascript</h3>

As is tradition in programming, a few variables should be declared at the start of the file. Of note is a javascript object used to display the buttons. A section of it would look like this:<br>
<pre>
<code>var quakeFeeds = {</code>
<code>"Past Hour": {</code>
<code>    "All Earthquakes": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_hour.geojson",</code>
<code>    "All 1.0+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/1.0_hour.geojson",</code>
<code>    "All 2.5+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_hour.geojson",</code>
<code>    "All 4.5+": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_hour.geojson",</code>
<code>    "All Significant": "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_hour.geojson"</code>
<code>},  etc.....</code>
</pre>	
This will be looped through to create the buttons that alter the data feed.<br><br>

Once the page is loaded javascript calls this function:<br>
<pre>
    <code>window.onload = function(){</code>
    <code>	document.getElementById('feed15').click();</code>
    <code>	resizer();</code>
    <code>}</code>
</pre>	
One of the buttons is clicked manually in order to load a preliminary set of data. The "resizer" function adjusts the map size according to the window's size.<br><br>

The bulk of the js happens once the google maps api code is loaded, which triggers the initMap() function. Once this occurs the map can created:<br>
<pre>
    <code>map = new google.maps.Map(document.getElementById("map2"), {</code>
    <code>	zoom: 2,</code>
    <code>	center: new google.maps.LatLng(2.8, -187.3), </code>
    <code>	mapTypeId: 'terrain' </code>
    <code>});</code>
</pre>

The buttons can be dynamically created by looping through the already mentioned javascript object:<br>
<pre>
    <code>for (var prop in quakeFeeds) {</code>
    <code>	if (!quakeFeeds.hasOwnProperty(prop)) {</code>
    <code>		continue;</code>
    <code>		mapTypeId: 'terrain' </code>
    <code>	}</code>
    <code>	$('#feedSelector').append(&quot;&lt;div class=\&quot;col-10\&quot;&gt;&lt;div class=\&quot;btn-group\&quot;&gt;&lt;h6&gt;&quot; + prop + &quot;&lt;/h6&gt;&quot; + makeChildProps(quakeFeeds, prop)+&quot;&lt;/div&gt;&lt;div class=\&quot;col-10\&quot;&gt;&lt;/div&gt;&quot;);</code>
    <code>}</code>
</pre>

These buttons now need a function to define what they do when clicked:<br>
<pre>
	<code>$('.feed_name').click(function (e) {</code>
</pre>

What should happen when one of these buttons is clicked? A new set of data should be loaded. This is done using ajax:<br>
<pre>
<code>$.ajax({</code>
    <code>	url: $(e.target).data('feedurl'),</code>
    <code>	error: function () {</code>
    <code>	    $('#info').html('&lt;p&gt;An error has occurred&lt;/p&gt;');</code>
    <code>	},</code>
    <code>	success: function (data) {</code>
</pre>
The url recieved from the clicked button was assigned its values in the makeChildProps function called above in the loop.<br><br>

JQuery has a $.each function that allows us to loop through each dataset and parse the values. In this case, the position of the markers on the map are set with longitude and latitude. <br>
<pre>
	<code>$.each(data.features, function (key, val) {</code>
	<code>  var coords = val.geometry.coordinates;</code>
    <code>  var latLng = new google.maps.LatLng(coords[1], coords[0]);</code>
    <code>  var marker = new google.maps.Marker({</code>
    <code>    position: latLng,</code>
    <code>    map: map</code>
	<code>	});</code>
</pre>

Clusters are relatively easy to set up, but the markers above need to be stored in an array so they can be used here: <br>
<pre>
    <code>var markerCluster = new MarkerClusterer(map, markers, {</code>
    <code>	imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'</code> 
    <code>});</code>
</pre>

Infowindows are also implemented in the earthquake visualizations and they are setup similarly to clusters, but they need a listener:
<pre>
    <code>var infowindow = new google.maps.InfoWindow({</code>
    <code>    content: &quot;&lt;h3&gt;&quot; + val.properties.title + &quot;&lt;/h3&gt;&lt;a href='&quot; + &quot;locationinfo.php&quot; + &quot;?lat=&quot; + coords[1] + &quot;&long=&quot; + coords[0] + &quot;'target='_blank'&quot; + &quot;&gt;Details&lt;/a>&quot;</code>
    <code>});</code>
    <code>marker.addListener('click', function (data) {</code>
    <code>    infowindow.open(map, marker);</code>
    <code>});</code>
</pre>
Each infowindow contains a link that opens a new tab and displays information relevant to the location. <br><br>
	
<a id="section4_anchor"></a>
<h5>References</h5>
<ul>
	<li><a href="https://www.explainthatstuff.com/earthquakes.html">General educational information on earthquakes</a></li>
	<li><a href="https://earthquake.usgs.gov/">News and data source for earthquakes</a></li>
	<li><a href="https://developers.google.com/maps/documentation/javascript/tutorial">Documentation for google maps API</a></li>
</ul><br><br>

<?php
include('inc/footer.php'); 
?>