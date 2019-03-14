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
		<a href="index.php"><img id="logo" src="images/logo.png" alt="logo"></a>
		<a href="index.php" <?php if($currentPage === "homepage") echo "class=\"activeMenu\"" ?>>Home</a>
		<a href="aboutus.php" <?php if($currentPage === "aboutus") echo "class=\"activeMenu\"" ?>>About Us</a>
		<a href="earthquake.php" <?php if($currentPage === "earthquake") echo "class=\"activeMenu\"" ?>>Earthquake</a>
		<a href="weather.php" <?php if($currentPage === "weather") echo "class=\"activeMenu\"" ?>>Weather</a>
		<a href="videogames.php" <?php if($currentPage === "videogames") echo "class=\"activeMenu\"" ?>>Video Games</a>
		<a href="hearthstone.php" <?php if($currentPage === "hearthstone") echo "class=\"activeMenu\"" ?>>Hearthstone</a>
		<a href="......." <?php if($currentPage === "......") echo "class=\"activeMenu\"" ?>>.......</a>
		<a href="......." <?php if($currentPage === "......") echo "class=\"activeMenu\"" ?>>.......</a>
		<a href="tutorial.php" <?php if($currentPage === "tutorial") echo "class=\"activeMenu\"" ?>>Tutorials</a>
		<a href="javascript:void(0);" class="icon" onclick="displayMenu()"><i class="fa fa-bars fa-2x"></i></a>
	</div>