<?php 
$title = 'Audio Data';
$description = 'Audio Visualisation';
include('inc/header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="css/audio.css" rel="stylesheet" type="text/css">


<h1>Audio Visualisation</h1>

<div class="rows">
	<div class="col-10">
		<p>
			On this page you can select a song and press the play button which will start a visual representation of the audio frequency ranges for the song in real time.
		</p>
		<p>
			All of the Royalty-free music was legally sourced from Bensound:
			<a href="https://www.bensound.com/royalty-free-music">Bensound</a>
		</p>
		<p>
			You can find information about the programming techniques used to build this page and how to visualy display the audio data by reading the Audio tutorial page here: <a href="audiotutorial.php">Audio Tutorial</a>
		</p>
		<br>
	</div>
	<div class="col-3left">
		<h5>Song Selector</h5>
		<br>
		<form>
			<input type="radio" name="song" value="actionable">Actionable<br>
			<input type="radio" name="song" value="anewbeginning">A New Beginning<br>
			<input type="radio" name="song" value="cute">Cute<br>
			<input type="radio" name="song" value="epic">Epic<br>
			<input type="radio" name="song" value="happyrock">Happy Rock<br>
			<input type="radio" name="song" value="hey">Hey<br>
			<input type="radio" name="song" value="jazzyfrenchy">Jazzy Frenchy<br>
			<input type="radio" name="song" value="littleidea">Little Idea<br>
			<input type="radio" name="song" value="summer">Summer<br>
			<input type="radio" name="song" value="sweet">Sweet<br>
		</form>
		<br>
		<button id="play_button">Play</button>
	</div>
	<div class="col-7">
		<div id="header_holder">
			<h5>Now Playing: </h5>
		</div>
		<br>
	  	<canvas id="canvas"></canvas>
	  	<audio id="myAudio" controls>
	  	
	  	</audio>
  	</div>
</div>

<script src="js/audio.js"></script>
<?php
include('inc/footer.php'); 
?>