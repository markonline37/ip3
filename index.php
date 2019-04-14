<?php 
$title = 'Visualizer';
$description = 'Website Homepage';
include('inc/header.php');
?>
<link href="css/index.css" rel="stylesheet" type="text/css">
<script src="js/index.js"></script>

<h1>Visualiser</h1>
<div class="row">		
	<div class="col-1left">&nbsp;</div>
	<div class="col-8left">
		<div class="booster2">
			<p>
				Welcome to Visualizer!
			</p>
			<p>
				3rd year computing students at Glasgow Caledonian University for Integrated Project 3, were tasked to create a website that visualised varying data sets and provided tutorials to reproduce the visualisations. Some of the datasets were selected for us and some were our own choice.
			</p>
			<p>
				This website 'Visualizer' is what Group 25 created. To learn more head on over to the about us, dive right into the visualisations or tutorials by using the menu at the top of the page or the links below.
			</p>
			<p>
			<a href="pdf/ip3specification.pdf" target="_blank">Integrated Project 3 - Specification</a> (Opens in a new tab)
			</p>
		</div>
	</div>
	<div class="col-1">&nbsp;</div>		
	<div class="col-10"></div>
	<div class="col-5left">
		<h5>Earthquake Visualisation</h5>
		<div class="col-5left">
			<a href="earthquake.php"><img src="images/earthquake.png" alt="Example earthquake visualisation page" class="homepageImage"></a>
		</div>
		<div class="col-5">
			<div class="booster">
				<p>
					The Earthquake visualisation webpage converts GeoJson based stastical data into a map with markers plotted, you can adjust the feeds to change the data that is displayed.
				</p>
			</div>
		</div>
		<div class="center">
			<button type="button" class="main_button" id="earthquake_button" onclick="window.location='earthquake.php'">Earthquake Visualisation</button>
		</div>
	</div>
	<div class="col-5">
		<h5>JavaScript Tutorial</h5>
		<div class="col-5left">
			<a href="javascripttutorial.php"><img src="images/tutorial.png" alt="Example javascript tutorial page" class="homepageImage"></a>
		</div>
		<div class="col-5">
			<div class="booster">
			<p>
				The JavaScript tutorial is a companion tutorial to all of the other Visualisation tutorials by covering aspects such as API's, AJAX, and JSON.
			</p>
		</div>
		</div>
		<div class="center">
			<button type="button" class="main_button" id="tutorial_button" onclick="window.location='javascripttutorial.php'">JavaScript Tutorial</button>
		</div>
	</div>
	<div class="col-10"><br><br></div>
	<div class="col-5left">
		<h5>Weather Visualisation</h5>
		<div class="col-5left">
			<a href="weather.php"><img src="images/weather.png" alt="Example weather visualisation page" class="homepageImage"></a>
		</div>
		<div class="col-5">
			<div class="booster">
				<p>
					The weather visualisation page provides user with a 6 day forecast based on their location, you can change the location by entering a location name or the longitude and latitude of an area.
				</p>
			</div>
		</div>
		<div class="center">
			<button type="button" class="main_button" id="earthquake_button" onclick="window.location='weather.php'">Weather Visualisation</button>
		</div>
	</div>
	<div class="col-5">
		<h5>GeoJson Tutorial</h5>
		<div class="col-5left">
			<a href="geojsontutorial.php"><img src="images/geojson.png" alt="Example geojson tutorial page" class="homepageImage"></a>
		</div>
		<div class="col-5">
			<div class="booster">
			<p>
				The GeoJson tutorial page features several different tutorials that explains the fundamentals of using GeoJson using the visualisations as examples. There are also a number of links to further reading on external sites.
			</p>
		</div>
		</div>
		<div class="center">
			<button type="button" class="main_button" id="tutorial_button" onclick="window.location='geojsontutorial.php'">GeoJson Tutorial</button>
		</div>
	</div>
</div>

<?php
include('inc/footer.php'); 
?>