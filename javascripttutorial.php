<?php 
$title = 'JavaScript Tutorial';
$description = 'JavaScript Tutorial';
include('inc/header.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/tutorial.css" rel="stylesheet" type="text/css">

<h1>JavaScript Tutorial</h1>
<p>
	This tutorial will cover JavaScript techniques to retrieve external data and process it.<br>
	A basic understanding of JavaScript and HTML is necessary to understand key concepts discussed in this tutorial. <br><br>

	If you need a refresher or are just starting out these amazing (and free) resources will get you quickly up and running:<br><br>
	HTML:
	<a href="https://www.codecademy.com/learn/learn-html">Code Academy - Learn HTML</a><br>
	<a href="https://www.w3schools.com/html/">W3Schools - HTML Tutorial</a><br>
	<a href="https://www.learn-html.org/">Learn HTML</a><br>
	<br>
	JavaScript:<br>
	<a href="https://www.codecademy.com/learn/learn-javascript">Code Academy - Learn JavaScript</a><br>
	<a href="https://www.w3schools.com/js/">W3Schools - JavaScript Tutorial</a><br>
	<a href="https://learnjavascript.online/">Learn JavaScript Online</a><br>
	<br>
</p>

<h2>Menu</h2>
<p>
	<a href="#section1_anchor">Application Programming Interface (API)</a><br>
	<a href="#section2_anchor">Asynchronous Javascript And Xml (AJAX)</a><br>
	<a href="#section3_anchor">JavaScript Object Notation (JSON)</a><br>
	<a href="#section4_anchor">Data Visualisation Techniques</a><br>
</p>

<a id="section1_anchor"></a>
<h2>Application Programming Interface (API)</h2>
<p>
	An Application Programming Interface (API) allows seperate systems to communicate with each other by providing an interface with a certain structure that must be followed. Since these systems can be written in any language or made in any number of different ways communication between them without providing a structured interface would be next to impossible. However when an interface is provided the system can be configured to use that interface no matter how it's structured or what language it's using.<br><br>

	An API can be in any system from a website to the software that runs a modern vehicle. A system can be configured to do anything on response to the interface being activated, such as responding with data or running an internal function without replying to the interface. For the context of this tutorial the API's that we're interested are Web-based data-driven API's which respond to requests via the interface by replying with data.<br><br>

	Examples of web-based data-driven API's:<br>
	<a href="https://rapidapi.com/omgvamp/api/hearthstone">Hearthstone API</a><br>
	As used in the <a href="hearthstone.php">Hearthstone Visualisation</a> page, discussed in the <a href="hearthstonetutorial.php">Hearthstone Tutorial</a> page.<br>
	<br>
	<a href="">Movies API</a><br>
	As used in the <a href="movies.php">Movies Visualisation</a> page, discussed in the <a href="moviestutorial.php">Movies Tutorial</a> page.<br>
	<br>
	<a href="">Weather API</a><br>
	As used in the <a href="weather.php">Weather Visualisation</a> page, discussed in the <a href="weathertutorial.php">Weather Tutorial</a> page.<br>
	<br>
	<a href="">Earthquake API</a><br>
	As used in the <a href="earthquake.php">Earthquake Visualisation</a> page, discussed in the <a href="earthquaketutorial.php">Earthquake Tutorial</a> page.<br>
	<br>
	Working with these web-based data-driven API's all follow a similar process in which an AJAX request (see the AJAX section below) is made to the API based on a URL with the API replying with the requested data in a JSON format (see the JSON section below). Please note that JSON is not the only available data option and some API's use XML (eXtensible Markup Language) to format the data.<br><br>

	For example <a href="https://datahelpdesk.worldbank.org/knowledgebase/topics/125589">The World Bank API</a> (and many other API's) can be configured to respond with either JSON or XML datatypes. The World Bank provides an excellent API that tracks a range of data sources such as size of economy and growth. Tutorials on XML are <a href="https://www.w3schools.com/xml/"> available here.</a>
</p>

<a id="section2_anchor"></a>
<h2>Asynchronous Javascript And Xml (AJAX)</h2>
<p>
	Before learning about AJAX it is necessary to have a basic introduction to jQuery. jQuery is a JavaScript library that contains a lot of pre-written functions that are intended to be used as 'shortcuts' by allowing a developer
	jQuery import
	What is ajax - why would you use it (loading times etc)
	How to use it
	Links to learn more
	Link to hearthstone tutorial
</p>

<a id="section3_anchor"></a>
<h2>JavaScript Object Notation (JSON)</h2>
<p>
	What it is - contrast it to xml
	how to use it - make some
	link to learn more
</p>

<a id="section4_anchor"></a>
<h2>Data Visualisation Techniques</h2>
<p>
	
</p>

<a id="section5_anchor"></a>
<h2>References</h2>
<p>
	<a href="https://jquery.com/">jQuery</a>
	<a href="https://www.w3schools.com/jquery/jquery_intro.asp">W3Schools - jQuery Introduction</a>
</p>

<?php
include('inc/footer.php'); 
?>