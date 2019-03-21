<?php 
$title = 'Hearthstone Data';
$description = 'Hearthstone Visualisation';
include('inc/header.php');
?>
<link href="css/hearthstone.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/hearthstone.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<h1>Hearthstone</h1>

<div id="info"></div>
<div class="row">
	<div class="col-10"id="hearthstone-content">
		<div class="temp" id="temp2">
			<div class="loader"></div>
			Loading a lot of data
		</div>
	</div>
</div>

<?php
include('inc/footer.php'); 
?>