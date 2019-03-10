<!DOCTYPE html>
<html>
<head>
	<title><?php echo($title); ?></title>
	<?php echo"<meta name=\"description\" content=\"".$description."\""?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/favicon.ico"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/nav.js"></script>
</head>
<body>
<a id="top_anchor"></a>
<button onclick="topFunction()" id="bottom_button" class="top_button" title="Go to top">Top</button>
<div id="centre_website">
<div id="content">
	<div id="navigation" class="mainNavigation">
		<a href="index.php"><img id="logo" src="images/logo.png" alt="logo"></a>
		<ul class="navigation">
			<li class="navigation"><a class="navigation" href="index.php">Home</a><?php if($currentPage === 'homepage') echo "<div id=\"active_rectangle\"></div>" ?></li>
			<li class="navigation">|</li>

			<li class="navigation"><a class="navigation" href="aboutus.php">About Us</a><?php if($currentPage === 'aboutus') echo "<div id=\"active_rectangle\"></div>" ?></li>
			<li class="navigation">|</li>

			<li class="navigation"><a class="navigation" href="earthquake.php">Earthquake</a><?php if($currentPage === 'earthquake') echo "<div id=\"active_rectangle\"></div>" ?></li>
			<li class="navigation">|</li>

			<li class="navigation"><a class="navigation" href="weather.php">Weather</a><?php if($currentPage === 'weather') echo "<div id=\"active_rectangle\"></div>" ?></li>
			<li class="navigation">|</li>

			<li class="navigation"><a class="navigation" href="videogames.php">Video Games</a><?php if($currentPage === 'videogames') echo "<div id=\"active_rectangle\"></div>" ?></li>
			<li class="navigation">|</li>

			<li class="navigation"><a class="navigation" href="pokemon.php">Pokémon</a><?php if($currentPage === 'pokemon') echo "<div id=\"active_rectangle\"></div>" ?></li>
			<li class="navigation">|</li>

			<li class="navigation"><a class="navigation" href=".......">.......</a><?php if($currentPage === '') echo "<div id=\"active_rectangle\"></div>" ?></li>
			<li class="navigation">|</li>

			<li class="navigation"><a class="navigation" href=".......">.......</a><?php if($currentPage === '') echo "<div id=\"active_rectangle\"></div>" ?></li>
			<li class="navigation">|</li>
			
			<li class="navigation"><a class="navigation" href="tutorial.php">Tutorials</a><?php if($currentPage === 'tutorial') echo "<div id=\"active_rectangle\"></div>" ?></li>
		</ul>
	</div>