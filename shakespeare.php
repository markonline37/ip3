<?php 
$title = 'Shakespeare Data';
$description = 'Shakespeare Visualisation';
include('inc/header.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="css/shakespeare.css" rel="stylesheet" type="text/css">
<script src="js/commonwords.js"></script>
<script src="js/shakespeare.js"></script>

<h1>Shakespeare Visualiser</h1>

<div class="row">
	<div class="col-10">
		<p>
			William Shakespeare was a world renowned actor and poet but is best remembered for creating some of the most influential plays of all time. Living during the latter half of the 16th Century until the early 17th Century, William Shakespeare produced his works in early-Modern English which includes the use of various outdated words.
		</p>
		<p>
			The word cloud below is generated by processing some of William Shakespeares most popular plays and counting the occurances of these words which can then be displayed visually with size and weight (the thickness of the text) being adjusted, ranked by occurance.
		</p>
		<p>
			You can find information about Shakespeare and the programming techniques used to build this page by reading the Shakespeare tutorial page here:<br>
		</p>
		<a href="shakespearetutorial.php">Shakespeare Tutorial</a><br><br>
	</div>
	
	<div class="col-2left" id="books_menu"></div>
	<div class="col-8" id="books_container"></div>
</div>

<?php
include('inc/footer.php'); 
?>