<?php 
$title = 'Visualiser';
$description = 'Website Homepage';
include('inc/header.php');
?>
<link href="css/index.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/index.js"></script>

<h1>Visualiser</h1>
<div class="row">
	<div class="col-10">
		<p>
			IP3 group 25 created the Visualizer website in order to create several different data visualisations including an Earthquake and Weather page and 4 four other data visualisations chosen by the creators of the site. The Visualiser website also feature several tutorials detailing how to re-create each visualisation and providing further reading for anyone interested. <br><br>
			This should explain the purpose and content of the IP3 Project. It should include a link to a
			version of the project specification document in a suitable web-readable format (such as
			PDF)
		</p>
		<p>
			<a href="pdf/ip3specification.pdf" target="_blank">IP3 Specification</a> (Opens in a new tab)
		</p>
	</div>
	<div class="col-thirdleft">
		<h5>About Us</h5>
		<p>
			The about us page features a short biography about each of the members of group 25 including their names, age and their past places of education.
		</p>
		<div class="center">
			<button type="button" class="main_button" id="aboutus_button" onclick="window.location='aboutus.php'">About Us Page</button>
		</div>
	</div>
	<div class="col-thirdleft">
		<h5>Data Visualisation</h5>
		<p>
			The data visualisations page features all 6 of the data visualisations that group 25 created including the Hearthstone page which features all the hearthstone sets and all of the cards within that set organised by mana cost and card type. 
		</p>
		<div class="center">
			<button type="button" class="main_button" id="earthquake_button" onclick="window.location='visualisation.php'">Data Visualisation Page</button>
		</div>
	</div>
	<div class="col-third">
		<h5>Tutorial Page</h5>
		<p>
			 The tutorial page features several different tutorials on the different visualisation pages within the Visualiser website as well as a number of links to further reading on how to better use JSON and GEOJSON.
		</p>
		<div class="center">
			<button type="button" class="main_button" id="tutorial_button" onclick="window.location='tutorial.php'">Tutorial Page</button>
		</div>
	</div>
</div>

<?php
include('inc/footer.php'); 
?>