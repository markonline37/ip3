<?php 
$title = 'Movie Data';
$description = 'Movies Visualisation';
include('inc/header.php');
?>

<link href="css/movies.css" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/movies.js"></script>


<h1>Movies</h1>

<canvas id="chart" height="120"></canvas>
<h3>Sort by:</h3>
<button id = "revenue" onclick="revenueSort()">Revenue</button>
<button id = "popularity" onclick="popularitySort()" id = "popularity">Popularity</button>
<button id = "rating" onclick="ratingSort()" id = "rating">Rating</button>
<br>
<h3 id="loading"></h3>

<canvas id="chart" ></canvas>

<div id="info"></div>

<?php
include('inc/footer.php'); 
?>