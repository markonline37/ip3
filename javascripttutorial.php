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
	HTML:<br>
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
	<a href="#section5_anchor">References</a><br>
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
	Before learning about AJAX it is necessary to have a basic introduction to jQuery. jQuery is a JavaScript library that contains a lot of pre-written functions that are intended to be used as 'shortcuts' by a developer as most of the code is pre-written in the library. A good example of this is the AJAX method.<br><br>
	
	In order to start using any jQuery code it is necessary to import the library:<br>
	<pre>
		<code>&lt;script src=&quot;https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js&quot;&gt;&lt;/script&gt;</code>
	</pre>
	This is code that should be included in a document before the JavaScript (JS) file, ordering it before the JS file is important to avoid any errors. <br><br>

	jQuery can be hosted locally on the webserver or can be accessed via any number of sources such as the version hosted by Google. The provided code makes use of the version hosted by Google because if a user has previously accessed a website that also used the Google jQuery (which is extremely likely) it will be cached and there will be no loading times.<br><br>

	So what exactly is Asynchronous Javascript and Xml? (AJAX), Ajax is a function built in jQuery that makes use of the XMLHttpRequest object in JavaScript to read data from a web server after a page has loaded. Learning about the XMLHttpRequest object is outside of this tutorial but you can learn more by reading here: <a href="https://www.w3.org/TR/XMLHttpRequest/#responsexml">w3.org - XMLHttpRequest Level 1</a>.<br><br>

	Because JavaScript is always synchronous and single threaded it can only be executing one block of code at a time, this means that if we were to make a call to an external web server the JavaScript would need to wait for the response before finishing the code and ultimately running the web page - this would be extremeley impactful upon the clients experience of using a website with slow loading times.<br><br>

	An ideal solution to this problem would be to make a request to the external server and continue executing the web page code without waiting for the server response so that the user isn't stuck staring at a blank screen wondering if the website is frozen or not. When the response is received the server should then the necessary code to finish the web page's loading. All of this should provide a better user experience for the client.<br><br>

	An Ajax call is this ideal solution in action, the Ajax function sends the request and has a 'callback' function which will run on successful receipt of the requested data.<br><br>

	The structure of an AJAX call (with success promise) with looks like this:<br>
	<pre>
		<code>$.ajax({</code>
		<code>  url: "www.exampleAPI.com/getdata",</code>
		<code>  success: function(data){</code>
		<code>    //console.log(data);</code>
		<code>  }</code>
		<code>});</code>
	</pre>
	This is a very simple call and typically calls are much more complicated and can feature many different options such as custom headers (<a href="hearthstonetutorial.php#ajax_anchor">see the hearthstone AJAX call for custom headers</a>) or AJAX calls can be made to local files, it's a very diverse method.<br><br>

	Further Reading:
	<ul>
		<li><a href="https://www.w3schools.com/jquery/jquery_ajax_intro.asp">w3schools - ajax introduction</a></li>
		<li><a href="https://www.w3schools.com/js/js_ajax_examples.asp">w3schools - Ajax Examples</a></li>
		<li><a href="https://www.w3schools.com/jquery/ajax_ajax.asp">w3schools - jQuery ajax() Method</a></li>
		<li><a href="https://developer.mozilla.org/en-US/docs/Web/Guide/AJAX/Getting_Started">MDN - Getting Started (Ajax)</a></li>
	</ul>
</p>

<a id="section3_anchor"></a>
<h2>JavaScript Object Notation (JSON)</h2>
<p>
	JSON is a file format that uses human-readable key/value pairs to store vast amounts of data. JSON is simple to use with data being split by commas, objects being held by curly braces and square brackets holding arrays.  <br><br>

	Typical structure looks like:<br>
	<pre>
		<code>var person = { "name":"Mark"}</code>
	</pre>
	And can be accessed like this:<br>
	<pre>
		<code>person["name"]</code>
		<code>//or</code>
		<code>person.name</code>
	</pre>
	Both of the above methods would return the value of "Mark".<br><br>

	JSON can have nested elements too:<br>
	<pre>
		<code>var person = {</code>
		<code>  "Mark":{</code>
		<code>    "Location":"Glasgow",</code>
		<code>    "Occupation":"Student"</code>
		<code>  },</code>
		<code>  "John":{</code>
		<code>    "Location":"Sydney",</code>
		<code>    "Occupation":"Surgeon"</code>
		<code>  }</code>
		<code>}</code>
	</pre>

	And can be accessed in a similar fashion to the above example:<br>
	<pre>
		<code>person["Mark"]["Location"]</code>
		<code>//or</code>
		<code>person.john.occupation</code>
	</pre>
	Which would return "Glasgow" and "Surgeon" respectively.<br><br>

	Please note that the above example is in JavaScript, and while JSON is derived from JavaScript many different programming languages can work with JSON.<br><br>
	
	Data can also be made available via API's in XML format. Learning about XML is outside the scope of this tutorial however, if you want to learn more: <a href="https://www.w3schools.com/xml/xml_whatis.asp">w3schools - Introduction to XML</a><br><br>

	Further Reading:
	<ul>
		<li><a href="https://www.w3schools.com/js/js_json_intro.asp">w3schools - JSON - Introduction</a></li>
		<li><a href="https://www.w3schools.com/js/js_json_syntax.asp">w3schools - JSON Syntax</a></li>
	</ul>
</p>

<a id="section4_anchor"></a>
<h2>Data Visualisation Techniques</h2>
<p>
	Earthquake Data Visualisation:<br>
	Uses GeoJson data loaded from an API to plot earthquakes on a google maps map.<br>
	<a href="earthquake.php">Link to earthquake visualisation</a><br>
	<a href="earthquaketutorial">Link to earthquake visualisation tutorial</a><br>
	<br>
	<br>
	Weather Data Visualisation:<br>
	Uses JSON data loaded from an API to display weather information such as forecast and a location map.<br>
	<a href="weather.php">Link to weather visualisation</a><br>
	<a href="weathertutorial.php">Link to weather visualisation tutorial</a><br>
	<br>
	Movies Data Visualisation:<br>
	Uses JSON data loaded from an API to display information on movies by genre plotted on a chart.<br>
	<a href="movies.php">Link to movies visualisation</a><br>
	<a href="moviestutorial.php">Link to movies visualisation tutorial</a><br>
	<br>
	<br>
	Hearthstone Data Visualisation:<br>
	Uses JSON data loaded from an API to display information on each set in the game.<br>
	<a href="hearthstone.php">Link to Hearthstone visualisation</a><br>
	<a href="hearthstonetutorial">Link to Hearthstone visualisation tutorial</a><br>
	<br>
	<br>
	Audio Data Visualisation:<br>
	Uses local audio data to display audio visually<br>
	<a href="audio.php">Link to audio visualisation</a><br>
	<a href="audiotutorial.php">Link to audio visualisation tutorial</a><br>
	<br>
	<br>
	Shakespeare Data Visualisation:<br>
	Uses local copies of several of shakespeares most popular works to perform a word count of his use of outdated modern-English<br>
	<a href="shakespeare.php">Link to Shakespeare visualisation</a><br>
	<a href="shakespearetutorial.php">Link to Shakespeare visualisation</a><br>
</p>

<a id="section5_anchor"></a>
<h2>References</h2>
<p>
	<ul>
		<li><a href="https://www.w3schools.com/whatis/whatis_ajax.asp">w3schools - What is Ajax?</a></li>
		<li><a href="https://stackoverflow.com/questions/2035645/when-is-javascript-synchronous">When is JavaScript Synchronous</a></li>
		<li><a href="http://json.org/">json.org - Introducing JSON</a></li>
	</ul>
</p>

<?php
include('inc/footer.php'); 
?>