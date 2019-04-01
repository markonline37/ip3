<?php 
$title = 'Movie Data';
$description = 'Movies Visualisation';
include('inc/header.php');
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/movies.js"></script>



<h1>Movies</h1>

<canvas id="chart" ></canvas>

<div id="info"></div>

<?php
include('inc/footer.php'); 
?>