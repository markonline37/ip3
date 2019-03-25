<?php 
$title = 'Hearthstone Data';
$description = 'Hearthstone_Visualisation';
include('inc/header.php');
?>
<link href="css/hearthstone.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="js/hearthstonejson.js"></script>
<script type="text/javascript" src="js/hearthstone.js"></script>

<h1>Hearthstone</h1>

<div id="info"></div>
<div class="row">
	<div class="col-10" id="hearthstone_text">
		<p>
			Hearthstone is a card game that was created by Blizzard, It features many of the creatures and characters within Blizzards Warcraft series.
		</p>
		<p>
			In Hearthstone there are 9 classes to choose from each with their own set of cards exclusive to their class as well as a large group of ‘neutral cards’ that any class can use. The basic premise of the game is to use a combination of minion and spell cards in order to reduce the enemy players health to 0 and win. 
		</p>
		<p>
			This page displays the number of different cards available in Hearthstone for each of the sets. 
		</p>
	</div>
	<div class="col-10" id="slider_holder">
		Use the slider to change sets:<br>
    	<input type="range" min="1" max="17" value="1" class="slider" id="ranger">
	</div>
	<div class="col-10" id="hearthstone_content">
		<div class="temp" id="temp2">
			<div class="loader"></div>
			Loading a lot of data
		</div>
	</div>

	<div class="col-10" id="hearthstone_links">
		Further reading on Hearthstone and how this webpage was created is available in the Hearthstone Tutorial. <br>
		<a href="hearthstonetutorial.php">Hearthstone Tutorial</a>
	</div>
</div>

<?php
include('inc/footer.php'); 
?>