<?php 
$title = 'Movie Data';
$description = 'Movies Visualisation';
include('inc/header.php');
?>

<link href="css/movies.css" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/movies.js"></script>


<h1>Movies</h1>

<p>
	This page shows the genre distribution of the top movies of each year in 3 different criteria: revenue, popularity, and rating.<br>
	The data is sourced from <a href="https://www.themoviedb.org/">tmdb</a> and the popularity and rating is determined by user activity on their website. <br>
	For more information on this visualization visit <a href="moviestutorial.php">this page</a>.<br><br>
	

	You can hide/show genres by clicking on parts of the legend.
</p>

<h3>Sort by:</h3>
<button id = "revenue" onclick="revenueSort()" class = "genre">Revenue</button>
<button id = "popularity" onclick="popularitySort()" class = "genre">Popularity</button>
<button id = "rating" onclick="ratingSort()" class = "genre">Rating</button>
<br>
<div id="loading"></div>

<div id="wrapper" class="chart">
    <canvas id="chart" ></canvas>
</div>

<div id="info"></div>
<br>
<?php
include('inc/footer.php'); 
?>