<?php 
$title = 'Weather Data';
$description = 'Weather Visualisation';
include('inc/header.php');
?>
<script type="text/javascript">var ip = <?php echo "\"".$_SERVER['REMOTE_ADDR']."\"";?></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="css/weather.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/weather.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVhtMJumz-cmads_MZCOr-cGt9_UZynZM&callback=initMap"></script>

<h1>Weather</h1>

<div class="row">
	<div class="col-4">
		<h5>Weather by location</h5>
		<br>
		<div class="center">
			<input type="text" class="search" id="location-name" placeholder="Enter a location name" onkeydown="submitSearchName(event)">
			<button type="button" class="button" type="submit" onclick="searchByName()">Search</button> 
			<button type="button" class="button" type="submit" onclick="clearSearch()">Clear</button><br>
			<div class="error" id="name-error"><br></div>
		</div>
	</div>
	<div class="col-6">
		<h5>Weather by Latitude and Longitude</h5>
		<br>
		<div class="center">
			<input type="text" class="search" id="location-latitude" placeholder="Enter latitude" onkeydown="submitSearchLotLan(event)">
			<input type="text" class="search" id="location-longitude" placeholder="Enter longitude" onkeydown="submitSearchLotLan(event)">
			<button type="button" class="button" type="submit" onclick="searchByLatLon()">Search</button> 
			<button type="button" class="button" type="submit" onclick="clearSearch()">Clear</button><br>
			<div class="error" id="latlon-error"><br></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-10">
		<div class="error" id="info"></div>
	</div>
	<div class="col-5" id="weather-container">

	</div>
	<div class="col-5">
		<div id="map">

		</div>
		<p>
			You can find information about weather and the programming techniques used to build this page page by reading the weather tutorial page here:
		</p>
		<a href="weathertutorial.php">Weather Tutorial</a>
	</div>
</div>
</div>

<div id="content">

<?php
include('inc/footer.php'); 
?>