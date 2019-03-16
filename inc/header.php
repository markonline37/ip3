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
		<a href="aboutus.php">About Us</a>
		<div class="dropdown">
			<button class="dropbtn">Data Visualisation <i class="fa fa-caret-down"></i></button>
			<div class="dropdown-content">
				<a href="earthquake.php">Earthquake</a>
				<a href="weather.php">Weather</a>
				<a href="videogames.php">Video Games</a>
				<a href="hearthstone.php">Hearthstone</a>
				<a href=".......">.......</a>
				<a href=".......">.......</a>
			</div>
		</div>
		<div class="dropdown">
			<button class="dropbtn">Tutorials  <i class="fa fa-caret-down"></i></button>
			<div class="dropdown-content">
				<a href=".......">.......</a>
				<a href=".......">.......</a>
				<a href=".......">.......</a>
				<a href=".......">.......</a>
				<a href=".......">.......</a>
				<a href=".......">.......</a>
				<a href=".......">.......</a>
				<a href=".......">.......</a>
			</div>
		</div>	
		<a href="javascript:void(0);" class="icon" onclick="displayMenu()"><i class="fa fa-bars"></i></a>
	</div>