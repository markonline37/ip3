<?php 
$title = 'Audio Data';
$description = 'Audio Visualisation';
include('inc/header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="css/audio.css" rel="stylesheet" type="text/css">


<h1>Audio Visualisation</h1>

<div class="rows" id="content">
	<div class="col-10">

		<form>
			<input type="radio" name="song" value="actionable">Actionable<br>
			<input type="radio" name="song" value="anewbeginning">A New Beginning<br>
			<input type="radio" name="song" value="epic">Epic<br>
			<input type="radio" name="song" value="summer">Summer<br>
			<input type="radio" name="song" value="sweet">Sweet<br>
		</form>

		<button id="play_button">Play</button>
		<br><br>
		<div id="now_playing"><br></div>
		<br>
	  	<canvas id="canvas"></canvas>
	  	<audio id="myAudio" controls>
	  	
	  	</audio>
  	</div>
</div>

<script type="text/javascript" src="js/audio.js"></script>
<?php
include('inc/footer.php'); 
?>