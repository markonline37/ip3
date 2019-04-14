<?php 
$title = 'Visualizer';
$description = 'Website Homepage';
include('inc/header.php');
?>
<link href="css/index.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/index.js"></script>

<h1>Visualiser</h1>
<div class="row">		
	<div class="col-1left">&nbsp;</div>
	<div class="col-8left">
		<p>
			Welcome to Visualizer!
		</p>
		<p>
			3rd year computing students at Glasgow Caledonian University for Integrated Project 3, were tasked to create a website that visualised varying data sets and provided tutorials to reproduce the visualisations. Some of the datasets were selected for us and some were our own choice.
		</p>
		<p>
			This website 'Visualizer' is what Group 25 created. To learn more head on over to the about us, or dive right into the visualisations or tutorials all by using the menu at the top of the page.
		</p>
		<p>
		<a href="pdf/ip3specification.pdf" target="_blank">Integrated Project 3 - Specification</a> (Opens in a new tab)
	</p>
	</div>
	<div class="col-1">&nbsp;</div>		
	<div class="col-10"></div>
	<div class="col-thirdleft">
		<h5>About Us</h5>
		<div class="booster">
			<p>
				The about us page features a short biography about each of the members of group 25 including their names, age and their past places of education.
			</p>
		</div>
		<div class="center">
			<button type="button" class="main_button" id="aboutus_button" onclick="window.location='aboutus.php'">About Us Page</button>
		</div>
	</div>
	<div class="col-thirdleft">
		<h5>Data Visualisation</h5>
		<div class="booster">
			<p>
				The data visualisations page features all 6 of the data visualisations that group 25 created including the Hearthstone page which features all the hearthstone sets and all of the cards within that set organised by mana cost and card type. 
			</p>
		</div>
		<div class="center">
			<button type="button" class="main_button" id="earthquake_button" onclick="window.location='visualisation.php'">Data Visualisation Page</button>
		</div>
	</div>
	<div class="col-third">
		<h5>Tutorial Page</h5>
		<div class="booster">
			<p>
				 The tutorial page features several different tutorials on the different visualisation pages within the Visualiser website as well as a number of links to further reading on how to better use JSON and GEOJSON.
			</p>
		</div>
		<div class="center">
			<button type="button" class="main_button" id="tutorial_button" onclick="window.location='tutorial.php'">Tutorial Page</button>
		</div>
	</div>
</div>

<?php
include('inc/footer.php'); 
?>