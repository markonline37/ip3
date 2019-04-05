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
	<div class="col-10">
		<div class="temp" id="temp2">
			<div class="loader"></div>
			Loading a lot of data
		</div>
	</div>
	<div class="col-10" id="hearthstone_text">
		<p>
			Hearthstone is a digital card game that was created by Blizzard, It features many of the creatures and characters within Blizzards Warcraft series.	In Hearthstone there are 9 classes to choose from each with their own set of cards exclusive to their class as well as a large group of ‘neutral cards’ that any class can use. The basic premise of the game is to use a combination of minion and spell cards in order to reduce the enemy players health to 0 and win. 
		</p>
		<p>
			This page displays the number of different cards available in Hearthstone for each of the sets. Further information is available in the tutorial linked at the bottom of the page.
		</p>
	</div>
	<div class="col-2left" id="menu_content">
		
	</div>
	<div class="col-8" id="menu_tag">

	</div>
	<div class="col-8" id="hearthstone_content">
		
	</div>

	<div class="col-10" id="hearthstone_links">
		<br>
		<p>
			You can find information about Hearthstone and the programming techniques used to build this page by reading the Hearthstone tutorial page here:<br>
		</p>
		<a href="hearthstonetutorial.php">Hearthstone Tutorial</a>
	</div>
</div>

<?php
include('inc/footer.php'); 
?>