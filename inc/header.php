<!DOCTYPE html>
<html>
<head>
	<title><?php echo($title); ?></title>
	<?php echo"<meta name=\"description\" content=\"".$description."\""?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/nav.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/favicon.ico"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/nav.js"></script>
</head>
<body>
<a id="top_anchor"></a>
<button onclick="topFunction()" id="bottom_button" class="top_button" title="Go to top">Top</button>
<div id="centre_website">
<div id="content">
	<div class="topnav" id="myTopnav">
		<a id="logoholder" href="index.php"><img id="logo" src="images/logo.png" alt="logo"></a>
		<a href="index.php">Home</a>
		<a id="aboutus" href="aboutus.php">About Us</a>
		<div class="dropdown">
			<button id="visualisation" class="dropbtn">Data Visualisation <i class="fa fa-caret-down"></i></button>
			<div class="dropdown-content">
				<a id="earthquake" href="earthquake.php">Earthquake</a>
				<a id="weather" href="weather.php">Weather</a>
				<a id="movies" href="movies.php">Movies</a>
				<a id="hearthstone" href="hearthstone.php">Hearthstone</a>
				<a id="airports" href="airports.php">Airports</a>
				<a id="football" href="football.php">Football</a>
			</div>
		</div>
		<div class="dropdown">
			<button id="tutorial" class="dropbtn">Tutorials  <i class="fa fa-caret-down"></i></button>
			<div class="dropdown-content">
				<a id="javascripttutorial" href="javascripttutorial.php">Javascript tutorial</a>
				<a id="geojsontutorial" href="geojsontutorial.php">GEOJson Tutorial</a>
				<a id="earthquaketutorial" href="earthquaketutorial.php">Earthquake Tutorial</a>
				<a id="weathertutorial" href="weathertutorial.php">Weather Tutorial</a>
				<a id="moviestutorial" href="moviestutorial.php">Movies Tutorial</a>
				<a id="hearthstonetutorial" href="hearthstonetutorial.php">Hearthstone Tutorial</a>
				<a id="airportstutorial" href="airportstutorial.php">Airports Tutorial</a>
				<a id="footballtutorial" href="footballtutorial.php">Football Tutorial</a>
			</div>
		</div>	
		<a id="icon" href="javascript:void(0);" class="icon" onclick="displayMenu()"><i class="fa fa-bars"></i></a>
	</div>