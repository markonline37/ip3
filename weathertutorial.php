<?php 
$title = 'Weather Tutorial';
$description = 'Weather Tutorial';
include('inc/header.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/tutorial.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/hearthstonetutorial.js"></script>

Useful tutorial information with adequate references to external technologies utilised. Adequate references are provided.

<h1>Weather Tutorial</h1>

This tutorial is discussing the <a href="weather.php">Weather Visualisation</a>. <br><br>

The weather page allows a user to view a weather forecast based on a location. By default the location is based on the clients IP address which will provide a general, but by no means accurate, location which should suffice to quickly view the weather.<br><br>

Users can search for a specific location by entering the name, or can search for a location by latitude and longitude. This will cause the weather information to update and display the weather information for the searched location.<br><br>

This tutorial uses key concepts learned in the JavaScript tutorial on API's, AJAX, and JSON:<br>
<a href="javascripttutorial.php#section1_anchor">API's</a><br>
<a href="javascripttutorial.php#section2_anchor">AJAX</a><br>
<a href="javascripttutorial.php#section3_anchor">JSON</a><br><br>

<p>
	<h5>Menu</h5>
	<ul>
		<li><a href="#section1_anchor">Gathering The Data</a></li>
		<li><a href="#section2_anchor">Displaying The Data</a></li>
		<li><a href="#section3_anchor">References</a></li>
	</ul>
</p>

<a id="section1_anchor"></a>
<h5>Gathering The Data</h5>
<p>
	The weather page makes use of the APIXU API which returns weather based information on the input URL.<br><br>

	<a href="https://www.apixu.com/api-explorer.aspx">Link to APIXU API</a><br>
	Use of the API requires registering to access the user specific key.<br><br>

	To learn more about API's please consult the <a href="javascripttutorial.php#section1_anchor">JavaScript tutorial</a><br>
	Using the key is straight forward and is only included as part of the URL sent within the AJAX function.<br><br>

	Example URL:<br>
	http://api.apixu.com/v1/current.json?key=YOUR-API-KEY&q=Glasgow<br><br>

	This example (when the API key is updated) used in an AJAX request will return a JSON object containing information on the current weather in the location - which is Glasgow in the URL.<br><br>

	An example AJAX request that uses the API:<br>
	<pre>
		<code>var key = "YOUR-API-KEY";</code>
		<code>var location = "YOUR-LOCATION";</code>
		<code>var address = "http://api.apixu.com/v1/current.json?key=" + key + "&q=" + "location"</code>
		<code>$.ajax({</code>
		<code>  url: address,</code>
		<code>  success: function(data){</code>
		<code>    myFunction(data);</code>
		<code>  }</code>
		<code>});</code>
	</pre>

	This AJAX call makes use of variables in the URL so that the key can be set by the developer and the location can come from a HTML element or be set manually.<br><br>

	If you want to learn more about AJAX please consult the <a href="javascripttutorial.php#section2_anchor">AJAX tutorial</a><br>
</p>

<a id="section2_anchor"></a>
<h5>Displaying The Data</h5>
<p>
	The weather page has 3 methods of updating the weather information:<br>
	<ul>
		<li>A default page load</li>
		<li>User search by name</li>
		<li>User search by latitude/longitude</li>
	</ul>

	All of these methods pass a variable into an update function;<br><br>

	Default page load:<br>
	The default page load makes use of PHP to set a javascript variable called ip which is set based on the clients IP.<br><br>
	
	For brevity, the IP is hard coded in the JavaScript file;
	<pre>
		<code>var ip = "192.168.1.254" //example IP</code>
	</pre>

	However the clients IP can easily be read and used as a variable using PHP.<br>
	Learning PHP is outside the scope of this tutorial however, if you want to learn more: <a href="https://www.w3schools.com/php/">w3schools - PHP 5 Tutorial</a>. <br><br>

	User search by name:<br>
	This simply gets the entered value from the form before passing it to the update weather function:<br>
	<pre>
		<code>updateWeather(document.getElementById("searchLocation"));</code>
	</pre>

	User search by latitude/longitude:<br>
	This gets the entered values from the form before passing it to the update weather function:<br>
	<pre>
		<code>var lat = document.getElementById("searchLatitude");</code>
		<code>var lon = document.getElementById("searchLongitude");</code>
		<code>updateWeather(lat+","+lon);</code>
	</pre>

	updateWeather() is a simple function which displays the data returned by the API. When the input location is loaded through an AJAX request the data returned is as follows (Example uses "Glasgow" as location):<br><br>

	<img id="myImg" src="media/weatherapi.png" alt="Weather API Response Body" style="width:100%;max-width:600px">

	<!-- The Modal -->
	<div id="myModal" class="modal">
		<span class="close">&times;</span>
		<img class="modal-content" id="img01">
		<div id="caption"></div>
	</div>

	<br>You can click the image to enlarge it.<br><br>

	Working with this response is straight forward:<br>
	<pre>
		<code>success = function(data){</code>
		<code>  var locationName = data.location.name;</code>
		<code>  var currentTemperature = data.current.temp_c;</code>
		<code>  var weatherIcon = data.current.condition.icon</code>
		<code>}</code>
	</pre>

	It should be fairly obvious how variables locationName and currentTemperature can then be used to display information regarding the location and temperature.<br><br>

	The variable weatherIcon (from the above example) can be loaded into an image tag like so:<br>
	<pre>
		<code>var temporaryString = &quot;&lt;img id=\&quot;weather_icon\&quot; src=\&quot;http:&quot;;</code>
		<code>temporaryString += weatherIcon;</code>
		<code>temporaryString += &quot;\&quot;&gt;&quot;;</code>
	</pre>

	variable temporaryString now contains a string which can be written to an element on the page to display the current weather condition as an image like this:<br><br>

	<img src="https:////cdn.apixu.com/weather/64x64/night/113.png"><br><br>

	A lot of simple elements of working with JavaScript have been glossed over in this tutorial, if you got lost and need more help I suggest you read the <a href="javascripttutorial.php">JavaScript Tutorial</a>. Or if you're new or need a refresher on JavaScript check out <a href="https://www.w3schools.com/js/js_intro.asp">w3schools JavaScript tutorial</a><br><br>
</p>

<a id="section3_anchor"></a>
<h5>References</h5>
<p>
	<ul>
		<li><a href="https://www.apixu.com/api-explorer.aspx">APIXU - Weather API</a></li>
		<li><a href="https://www.w3schools.com/php/">w3schools - PHP 5</a>
	</ul>
</p>

<?php
include('inc/footer.php'); 
?>