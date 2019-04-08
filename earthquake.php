<?php 
$title = 'Earthquake Data';
$description = 'Earthquake Visualisation';
include('inc/header.php');
?>


<link href="css/earthquake.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVhtMJumz-cmads_MZCOr-cGt9_UZynZM&callback=initMap"></script>

<h1>Earthquake Mapping</h1>
<div class="row">
	<div class="col-2left">
		<h5>Feed Selector</h5>
		<div id="feedSelector"></div>
	</div>
	<div class="col-8">
		
		<div id="feedIdentifier"></div>
		<a id="map_anchor"></a>
		<div id="map2"></div>

		<p>
			You can find information about earthquakes and the programming techniques used to build this page page by reading the earthquake tutorial page here:
		</p>
		<a href="earthquaketutorial.php">Earthquake Tutorial</a>
	</div>
</div>


</div>
  
<div id="content">
<script type="text/javascript" src="js/earthquake.js"></script>
<?php
include('inc/footer.php'); 
?>