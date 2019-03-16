<?php 
$title = 'Visualiser';
$description = 'Website Homepage';
include('inc/header.php');
?>
<link href="css/index.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/index.js"></script>

<h1>Visualiser</h1>
<div class="row">
	<div class="col-10">
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque condimentum volutpat hendrerit. Nunc sit amet nisl nec nisl tincidunt tristique a sed nisi. Integer a blandit elit. Pellentesque ac mattis elit. Mauris consequat ipsum vel augue dapibus vestibulum. Curabitur euismod augue eu ultrices malesuada. Vestibulum eu commodo tellus. Aliquam erat risus, consequat vitae venenatis consequat, hendrerit vel nunc. Aenean maximus risus non feugiat suscipit. Curabitur eu odio odio. Aenean quis tincidunt lectus.
		</p>
	</div>
	<div class="col-third">
		<h5>About Us</h5>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque condimentum volutpat hendrerit. Nunc sit amet nisl nec nisl tincidunt tristique a sed nisi. Integer a blandit elit. Pellentesque ac mattis elit. Mauris consequat ipsum vel augue dapibus vestibulum. Curabitur euismod augue eu ultrices malesuada. Vestibulum eu commodo tellus. Aliquam erat risus, consequat vitae venenatis consequat, hendrerit vel nunc. Aenean maximus risus non feugiat suscipit. Curabitur eu odio odio. Aenean quis tincidunt lectus.
		</p>
		<div class="center">
			<button type="button" class="main_button" id="aboutus_button" onclick="window.location='aboutus.php'">About Us Page</button>
		</div>
	</div>
	<div class="col-third">
		<h5>Data Visualisation</h5>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque condimentum volutpat hendrerit. Nunc sit amet nisl nec nisl tincidunt tristique a sed nisi. Integer a blandit elit. Pellentesque ac mattis elit. Mauris consequat ipsum vel augue dapibus vestibulum. Curabitur euismod augue eu ultrices malesuada. Vestibulum eu commodo tellus. Aliquam erat risus, consequat vitae venenatis consequat, hendrerit vel nunc. Aenean maximus risus non feugiat suscipit. Curabitur eu odio odio. Aenean quis tincidunt lectus.
		</p>
		<div class="center">
			<button type="button" class="main_button" id="earthquake_button" onclick="window.location='visualisation.php'">Data Visualisation Page</button>
		</div>
	</div>
	<div class="col-third">
		<h5>Tutorial Page</h5>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque condimentum volutpat hendrerit. Nunc sit amet nisl nec nisl tincidunt tristique a sed nisi. Integer a blandit elit. Pellentesque ac mattis elit. Mauris consequat ipsum vel augue dapibus vestibulum. Curabitur euismod augue eu ultrices malesuada. Vestibulum eu commodo tellus. Aliquam erat risus, consequat vitae venenatis consequat, hendrerit vel nunc. Aenean maximus risus non feugiat suscipit. Curabitur eu odio odio. Aenean quis tincidunt lectus.
		</p>
		<div class="center">
			<button type="button" class="main_button" id="tutorial_button" onclick="window.location='tutorial.php'">Tutorial Page</button>
		</div>
	</div>
</div>

<?php
include('inc/footer.php'); 
?>