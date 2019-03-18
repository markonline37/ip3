<?php 
$title = 'Earthquake Data';
$description = 'Earthquake Visualisation';
include('inc/header.php');
?>

<link href="css/earthquake.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/earthquake.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVhtMJumz-cmads_MZCOr-cGt9_UZynZM&callback=initMap"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>


<h1>Earthquake Mapping</h1>
Select time then magnitude<br>
<button type="button" id="hour">Past hour</button>
<button type="button" id="day">Past Day</button>
<button type="button" id="7days">Past 7 Days</button>
<button type="button" id="30days">Past 30 days</button>
<br>
<button type="button" id="sig">Significant</button>
<button type="button" id="m45">M4.5+</button>
<button type="button" id="m25">M2.5+</button>
<button type="button" id="m10">M1.0+</button>
</div>
<div id="map">
    
</div>
<div id="content">

<?php
include('inc/footer.php'); 
?>