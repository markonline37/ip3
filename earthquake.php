<!DOCTYPE html>
<?php 
$title = 'Earthquake Page';
$description = 'Earthquake Visualisation';
$currentPage = 'earthquake';
include('inc/header.php');
?>

	<script type="text/javascript" src="js/earthquake.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVhtMJumz-cmads_MZCOr-cGt9_UZynZM&callback=initMap">
    </script>
    <div id="other">
        <header>
            <h1>Earthquake Mapping</h1>
            <h3>Integrated Project 2 Starter</h3>
            <h4>Google map with markers. Markers show the magnitude of the earthquake. Each marker has an infoWindow that includes
                a URL that is part of the GeoJSON data. The infoWindow URL opens in the same browser tab.</h4>
            <h4> Data from following source:
                <a href="https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_day.geojson">https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/4.5_day.geojson</a>
            </h4>
            <h4>See all feeds at:
                <a href="https://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php">https://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php</a>
            </h4>
        </header>
        <button type="button" id="earthquakes">Click me</button>
        <!-- 'info' is just for debugging use -->
        <div id="info"></div>
    </div>
</div>
    <div id="map"></div>
<div id="content">

<?php
include('inc/footer.php'); 
?>