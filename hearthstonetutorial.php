<?php 
$title = 'Hearthstone Tutorial';
$description = 'Hearthstone Tutorial';
include('inc/header.php');
?>
<link href="css/tutorial.css" rel="stylesheet" type="text/css">

<h1>Hearthstone Tutorial</h1>

<P>
	This is the tutorial written for the <a href="hearthstone.php">hearthstone visualisation</a>
</P>
<p>
	Creating the data visualisation involves 3 steps:
	<ol>
		<li><a href="#section1_anchor">Gathering the data</a></li>
		<li><a href="#section2_anchor">Processing the data</a></li>
		<li><a href="#section3_anchor">Displaying the processed data</a></li>
	</ol>
</P>

<a id="section1_anchor"></a>
<h2>Gathering the Data</h2>
<p>
	The data used in the hearthstone visualisation is taken from a website called RapidAPI (link to <a href="https://www.rapidapi.com/">RapidAPI</a>) that hosts user created API's which stands for Application Programming Interface. Some of the API's available on RapidAPI are free to use, and some are subscription based. Luckily the hearthstone API is free to use and is very comprehensive.
</p>
<p>
	Link to the <a href="https://rapidapi.com/omgvamp/api/hearthstone">Hearthstone API</a>
</p>
<p>
	API's allow one computer program to communicate with another computer program by using predefined functions that can be activated by external programs. Various types of API's exist that perform different functions or provide different data types, this means that an API can have different responses to different requests; an API might respond with an array of data, or update a record on an internal database. In the case of the API used in the hearthstone visualisation the API responds to requests with data on the video game hearthstone.
</p>
<p>
	Requests to the hearthstone API are information written in a URL format.<br>
	For example the standard URL to access information for all of the cards is:<br>
	<pre>
		<code>https://omgvamp-hearthstone-v1.p.rapidapi.com/cards</code>
	</pre>
	When a user accesses the hearthstone visualisation page, the visualiser server sends the URL to the hearthstone API using an AJAX request which is a pre defined function written in jQuery (more information on AJAX is available in the JavaScript tutorial here: <a href="javascripttutorial.php">JavaScript Tutorial</a>).
</p>
<p>
	<pre>
		<code>$.ajax({</code>
		<code>	url: "https://omgvamp-hearthstone-v1.p.rapidapi.com/cards",</code>
		<code>	success: function(data){</code>
		<code>		//processData(data);</code>
		<code>	}</code>
		<code>});</code>
	</pre>
	</p>
<p>
	The hearthstone API responds with a JSON array which can then be processed by the server in the following section. You can see the function call on line 4 in the above example.<br><br>

	On successful receipt of data (line 3) run function that follows, on line 4 another JavaScript method called processData is called, the returned data from the hearthstone API is passed through as an argument.
</p>

<a id="section2_anchor"></a>
<h2>Processing the data</h2>
<p>
	
</p>

<a id="section3_anchor"></a>
<h2>Displaying the processed data</h2>
<p>
	
</p>

<?php
include('inc/footer.php'); 
?>