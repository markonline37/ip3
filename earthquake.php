<?php 
$title = 'Earthquake Data';
$description = 'Earthquake Visualisation';
include('inc/header.php');
?>

<link href="css/earthquake.css" rel="stylesheet" type="text/css">
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVhtMJumz-cmads_MZCOr-cGt9_UZynZM&callback=initMap"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script type="text/javascript" src="js/earthquake.js"></script>


<h1>Earthquake Mapping</h1>
<div id="feedColumn">
    <div id="feedSelector"></div>
</div>

</div>
<div id="map">
    
</div>
<div id="content">

<?php
include('inc/footer.php'); 
?>