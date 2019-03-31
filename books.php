<?php 
$title = 'Books Data';
$description = 'Books Visualisation';
include('inc/header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="css/books.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/books.js"></script>

<h1>Books</h1>

<div class="row">
	<div class="col-10">
		<div class="error" id="info"></div>
	</div>
	***********Add introduction, option to load different literature, link to tutorial page********
	<div class="col-10" id="books-Information"></div>
	<div class="col-10" id="books_container"></div>
</div>

<?php
include('inc/footer.php'); 
?>