<?php 
$title = 'Hearthstone Tutorial';
$description = 'Hearthstone Tutorial';
include('inc/header.php');
?>
<link href="css/tutorial.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/hearthstonetutorial.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<h1>Hearthstone Tutorial</h1>

<P>
	This is the tutorial written for the <a href="hearthstone.php">hearthstone visualisation.</a><br>
	To understand key concepts discussed here such as API's, AJAX requests and JSON arrays please read the <a href="javascripttutorial.php">JavaScript tutorial</a><br>
	A complete working example is at the bottom of the page - you must still update the API Key in the JavaScript file on line 8.<br>
	Links to further reading on relevant topics are available at the bottom of the page.
</P>  
<p>
	Creating the data visualisation involves 2 steps:
	<ol>
		<li>Gathering the data</li>
		<li>Displaying the data</li>
	</ol>
</P>
<p>
	<a href="#section1_anchor">Gathering the data</a><br>
	<a href="#section3_anchor">Displaying the processed data</a><br>
	<a href="#section4_anchor">Further Reading</a>
</p>

<a id="section1_anchor"></a>
<h2>Gathering the Data</h2>
<p>
	The data used in the hearthstone visualisation is taken from a website called RapidAPI (link to <a href="https://www.rapidapi.com/">RapidAPI</a>) that hosts user created API's. Some of the API's available on RapidAPI are free to use, and some are subscription based. Luckily the hearthstone API is free to use and is very comprehensive.
</p>
<p>
	Link to the <a href="https://rapidapi.com/omgvamp/api/hearthstone">Hearthstone API</a><br>
	In order to use RapidAPI and explore the hearthstone API you will need to register for a free account on RapidAPI.
</p>
<p>
	The hearthstone API used in the hearthstone visualisation is a data driven API, the API responds to requests for data on the video game hearthstone with a JSON array based on the request URL.
</p>
<p>
	Once you're logged into RapidAPI you can begin to explore the hearthstone API and the picture below is what you will see.<br>
	You can click the picture to enlarge it or follow along on RapidAPI.<br>
	<img id="myImg" src="media/hearthstoneapi.png" alt="Hearthstone API exploration overview" style="width:100%;max-width:950px">

	<!-- The Modal -->
	<div id="myModal" class="modal">
		<span class="close">&times;</span>
		<img class="modal-content" id="img01">
		<div id="caption"></div>
	</div>

	<ol>
		<li>On the left is all of the available options that can be requested, you can get all cards information, single card information, cards by class information etc.</li>
		<li>When you're logged in you can click test endpoint and in the box to the right the resultant JSON array based on the input type on the left will be shown</li>
		<li>the URL displayed here is the URL required to request the JSON array (more on this to follow)</li>
		<li>When you're logged in your API key will be displayed here (more on this to follow)</li>
	</ol>
</p>
<p>
	Requests to the hearthstone API are information written in a URL format.<br>
	The URL to access information for all of the cards, as seen in #3 in the above picture, is:<br>
	<pre>
		<code>https://omgvamp-hearthstone-v1.p.rapidapi.com/cards</code>
	</pre>
</p>
<p>
	When a user accesses the hearthstone visualisation page, the visualiser server sends the URL to the hearthstone API using an AJAX request using the API key as a custom header.
</p>
<p>
	If you want to duplicate the following code remember to include jQuery and your JavaScript file on the HTML page, and remember to order jQuery before JavaScript to avoid any issues eg:<br><br>

	HTML page:<br>
	<pre>
		<code>&lt;script src=&quot;https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js&quot;&gt;&lt;/script&gt;</code>
		<code>&lt;script type=&quot;text/javascript&quot; src=&quot;yourJSfile.js&quot;&gt;&lt;/script&gt;</code>
	</pre>
	
	yourJSfile.js:<br>
	<pre>
		<code>$.ajax({</code>
		<code>  url: "https://omgvamp-hearthstone-v1.p.rapidapi.com/cards",</code>
		<code>  headers: {</code>
		<code>    'X-RapidAPI-Key':'YOUR-RAPIDAPI-KEY-HERE'</code>
		<code>  },</code>
		<code>  success: function(data){</code>
		<code>    //console.log(data);</code>
		<code>  }</code>
		<code>});</code>
	</pre>
	</p>
<p>
	You need to update 'YOUR-RAPIDAPI-KEY-HERE' on line 4. Which can be found on RapidAPI, see #4 in the above picture<br><br> 

	The hearthstone API responds with a JSON array which can then be processed by the server in the following section. If you have console.log(data); on line 7 and check the developer console (Press F12 on keyboard and select the console tab) you will see the returned JSON array. Do not be surprised if nothing happens at first, loading all card data is thousands of entries so it will take a while.<br><br>

	In the following section we will process this data instead of logging it to console.
</p>

<a id="section3_anchor"></a>
<h2>Displaying the processed data</h2>
<p>
	Now that we have the data loaded from the hearthstone API we can display it.<br><br>

	Various technologies exist to display the data but we will be using google charts - bar chart.<br><br>

	To learn more about google charts please visit the exhaustive <a href="https://developers.google.com/chart/interactive/docs/gallery/barchart">google charts documentation</a><br><br>

	In order to use google charts we need to include it on the html page, placement should be above the script to include JavaScript to avoid any issues.<br><br>

	HTML Page:<br>
	<pre>
		<code>&lt;script type=&quot;text/javascript&quot; src=&quot;https://www.gstatic.com/charts/loader.js&quot;&gt;&lt;/script&gt;</code>
	</pre>

	Additonally the google charts needs somewhere to draw into so we'll also include a blank div:<br><br>

	HTML page:<br>
	<pre>
		<code>&lt;div id=&quot;chart_div&quot;&gt;&lt;/div&gt;</code>
	</pre>
	
	Google charts now needs to be 'loaded' so on the JavaScript file write the following.<br><br>

	yourJSfile.js:<br>
	<pre>
		<code>google.charts.load('current', {packages: ['corechart', 'bar']});</code>
		<code>google.charts.setOnLoadCallback(myFunction);</code>
		<code></code>
		<code>function myFunction() {</code>
		<code>  </code>
		<code>}</code>
	</pre>
	
	Cut the code we wrote previously and paste it inside the myFunction on line 5. On line 1, google charts is loaded, with type 'bar'. On line 2, a callback function that runs once the chart is fully loaded calls function myFunction().<br><br>

	Now that you have cut the code and moved it to myFunction(), the ajax request we had previously is only called after the google charts is 100% loaded. But in the current configuration the data is still just written to console.<br><br>

	We will now add 2 new functions that process the JSON array as data and then draw the bar chart: <br><br>
	<pre>
		<code>function count(data){</code>
		<code>  var hasHealth = 0;</code>
		<code>  var oneHealth = 0;</code>
		<code>  var twoHealth = 0;</code>
		<code>  for(var i = 0; i < data['Basic'].length; i++){</code>
		<code>   if(data['Basic'][i].hasOwnProperty('health')){</code>
		<code>      hasHealth++;</code>
		<code>      if(data['Basic'][i].health === 1){</code>
		<code>        oneHealth++;</code>
		<code>      } else if(data['Basic'][i].health === 2){</code>
		<code>        twoHealth++;</code>
		<code>      }</code>
		<code>    }</code>
		<code>  }</code>
		<code>  displayChart(hasHealth, oneHealth, twoHealth);</code>
		<code>}</code>
		<code></code>
		<code>function displayChart(input1, input2, input3){</code>
		<code>  var data = google.visualization.arrayToDataTable([</code>
		<code>    ['Card Name', 'Type'],</code>
		<code>    ['Total Cards with health', input1],</code>
		<code>    ['Cards with 1 Health', input2],</code>
		<code>    ['Cards with 2 Health', input3]</code>
		<code>  ]);</code>
		<code></code>
		<code>  var options = {</code>
		<code>    bars: 'horizontal'</code>
		<code>  };</code>
		<code></code>
		<code>  var chart = new google.charts.Bar(document.getElementById('chart_div'));</code>
		<code>  chart.draw(data, options);</code>
		<code>}</code>
	</pre>

	The function count() loops through each of the cards in the basic set, if it has health it increments has health, if the health is 1 it increments oneHealth, if the health is 2 it increments twoHealth. Once it is finished looping through each of the cards in the basic set it calls displayChart to display the counted data.<br><br>

	displayChart() uses 3 inputs as data to be displayed on the bar chart. The variable called data uses a google function google.visualization.arrayToDataTable to convert the input variables to a format that the chart understands. Options can be passed through to such as changing the bars to draw horizontal as we have done in the options variable. There are many options and you should consult the google charts documentation to fully explore the lengthy list.<br><br>

	And finally a chart object is made and bound to the div with element id 'chart_div' which is used to draw the chart using the data and options.

	Now all we need to do is update the myFunction() to call count()<br><br>

	Replace<br>
	<pre>
		<code>console.log(data);</code>
	</pre>
	With<br>
	<pre>
		<code>count(data);</code>
	</pre>

	If you now save both of your files and open the html page with a browser you should see the chart. Loading times are slow due to the size of the JSON array, it is a very large array.<br><br>

	To download the complete example code:<br><br>
	<a href="media/hearthstone.zip" download="hearthstone.zip" class="download_button"><i class="fa fa-download"></i> Download</a><br><br>
	You must still update the API Key in the JavaScript file on line 8.<br><br>
</p>

<a id="section4_anchor"></a>
<h2>Further Reading</h2>
<p>
	To learn more about the techniques used here you can use the following resources:
	<ul>
		<li><a href="https://www.w3schools.com/">W3Schools</a><br>W3Schools is an excellent resource for anything related to HTML/CSS/JavaScript/jQuery and any number of other web technologies<br></li>
		<li><a href="https://jquery.com/">jQuery</a><br>jQuery is used in various places for this website, it's a great resource of pre-built functions<br></li>
		<li><a href="https://www.javascript.com/learn/strings">JavaScript - Learn</a><br>Learn JavaScript directly from JS itself<br></li>
		<li><a href="https://developers.google.com/chart/interactive/docs/quick_start">Google Charts Documentation</a><br>Google Charts Documentation is extremeley helpful with tons of examples and easy to follow tutorials<br></li>
		<li>If you ever get stuck - remember to check the console (F12) and google your problem - guarenteed you're not the first to have the same issue!</li>
	</ul>
</p>

<?php
include('inc/footer.php'); 
?>