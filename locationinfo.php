<?php 
$title = 'Locational Data';
$description = 'Locational Info';
$lat = $_GET['lat'];
$long = $_GET['long'];
include('inc/header.php');
?>
<script>
	var lat = <?php echo $lat ?>;
	var long = <?php echo $long ?>;
</script>
<link href="css/locationinfo.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/locationinfo.js"></script>

<h1>Geolocational Information</h1>

<div id="resultJson"></div>
<div id="info"></div>

<?php
include('inc/footer.php'); 
?>