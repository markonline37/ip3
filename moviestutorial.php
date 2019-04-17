<?php 
$title = 'Movies Tutorial';
$description = 'Movies Tutorial';
include('inc/header.php');
?>
<link href="css/tutorial.css" rel="stylesheet" type="text/css">

<h1>Movies Tutorial</h1>
This is a tutorial page that covers the techniques and data sources used to construct the <a href="movies.php">movie visualization page</a>. <br><br>

This tutorial expects an understanding of javascript. For a basic tutorial visit <a href="javascripttutorial.php">this page.</a>. <br><br>

<h5>Menu</h5>
<ul>
	<li><a href="#section1_anchor">Resources</a></li>
	<li><a href="#section2_anchor">Implementation</a></li>
	<li><a href="#section3_anchor">References</a></li>
</ul>

<a id="section1_anchor"></a>
<h5>Resources</h5>
The data used for this visualization is from <a href="https://www.themoviedb.org/ ">tmdb</a> and an example url is shown below:<br><br>

https://api.themoviedb.org/3/discover/movie?api_key=[key]&language=en-US&sort_by=revenue.desc&include_adult=false&include_video=false&page=[page]&primary_release_year=[year]<br><br> 

The important parts of this url are sort_by, primary_release_year, and page. The purpose of the visualization is to show the genres of the top earning movies over time, so sort_by will be revenue.desc, which indicates the revenue in a descending order. To display trends over time, the primary release year will have to be continually altered. <br><br>

The visualization method used is <a href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js">Chart.js</a>, a javascript library. It also has easy-to-understand <a href="https://www.chartjs.org/docs/latest/">documentation</a>. <br><br>

<a id="section2_anchor"></a>
<h5>Implementation</h5>
<h3>HTML</h3>
To start utilizing the resources, a few imports need to be made:<br>
<pre>
    <code>&lt;link href=&quot;css/movies.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot;&gt;</code>
    <code>&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js&quot;&gt;&lt;/script&gt;</code>
    <code>&lt;script src=&quot;https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js&quot;&gt;&lt;/script&gt;</code>
    <code>&lt;script type=&quot;text/javascript&quot;src=&quot;js/movies.js&quot;&gt;&lt;/script&gt;</code>
</pre>
This allows us to use a stylesheet, the chart.js API, jquery, and a separate javascript file, which will help us work with the data and its visualization.<br><br>

A few buttons are required to alter the chart and load different datasets.<br>
<pre>
 	<code>&lt;button id = "revenue" onclick="revenueSort()" class = "genre"&gt;Revenue&lt;/button&gt;</code>
	<code>&lt;button id = "popularity" onclick="popularitySort()" class = "genre"&gt;Popularity&lt;/button&gt;</code>
	<code>&lt;button id = "rating" onclick="ratingSort()" class = "genre"&gt;Rating&lt;/button&gt;</code>
</pre>
The onclick attribute is used to specify the functions that are called in the javascript document linked to earlier. In these functions we will change the graph's data.<br><br>

The last important part of the html is a place to display the graph:<br>
<pre>
 	<code>&lt;div id = "wrapper" class=&quot;chart&quot;&gt;</code>
 	<code>	&lt;canvas id = "chart" &gt;&lt;/canvas&gt;</code>
	<code>&lt;/div&gt;</code>
</pre>	
The wrapper div is for css purposes, so it is not needed, but the chart should be in a canvas tag with an id.<br><br>

<h3>Javascript</h3>
To set up the chart an inital version is required:<br>
<pre>
 	<code>var ctx = document.getElementById('chart');</code>
 	<code>myChart = new Chart(ctx, {	</code>
 	<code>	type: 'line',</code>
	<code>	data: {</code>
	<code>		labels: years,</code>
	<code>		datasets: [{</code>
	<code>			label: "Action",</code>
	<code>			borderColor: window.chartColors.red,</code>
	<code>			data: [0,0,0,0,0,0,0,0,0,0,0,0,0,0]</code>
    <code>			},{</code>
    <code>			label: "Adventure",</code>	etc...
</pre>
The actual code would be much longer, but this should provide the general idea. Each dataset has a data array with a bunch of zeros, which represents the amount of movies in a genre each year. The ajax calls will replace these zeros. If the data array is not occupied, it can't be replaced so there wouldn't be anything on the chart.<br><br>	        

The next step is to load the initial data, so that all of the values on the graph won't be 0. This would be done in a loop, as a page has to be loaded for each year. If you want to load multiple pages another loop can be added inside. This assumes that the pages and years are in arrays:<br>
<pre>
		<code>$.each(years, function(y,year){</code>
		<code>	$.each(pages, function(p,page){</code>
</pre>
This is a jquery provided function and it works similar to a for loop. y would be the index and year the item in the current iteration. <br><br>

Next would come the ajax call:<br>
<pre>
	<code>$.ajax({</code>
	<code>type: "POST",</code>
	<code>url: "script/movies-load.php",</code>
	<code>data: {</code>
	<code>	phppage: page,</code>
	<code>	phpyear: year,</code>
	<code>	phpsort: sortBy</code>
	<code>},</code>
    <code>success: function(response){</code>
	<code>	try{</code>
	<code>		var data = $.parseJSON(response)</code>
	<code>		$.each(data.results, function(i){</code>
	<code>		var genre_ids = data.results[i].genre_ids;</code>
	<code>		for (j in genre_ids){</code>
	<code>			switch(genre_ids[j]){</code>
	<code>				case 28://Action</code>
	<code>					myChart.data.datasets[0].data[y] += 1;</code>
	<code>					break;</code>
	<code>				case 12://Adventure</code>
	<code>					myChart.data.datasets[1].data[y] += 1;</code>
	<code>					break;</code>	etc...
</pre>
In this case the url on line 3 leads to a separate php file in order to hide the key. The variables in lines 5-7 replace parts of the url, such that each iteration of the loops request from a different url. The data is parsed and the genre ids are put into a variable that is looped through. This is done because movies can have multiple variables. A switch statement changes the code of the chart. This wouldn't update the chart immediately though, so myChart.update() is called after the ajax request.<br><br>

The chart still needs to update once the buttons are clicked. This is the function when the revnue button is clicked:<br>
<pre>
	<code>function revenueSort(){</code>
	<code>	disableButtons();</code>
	<code>	sortBy = 'revenue';</code>
	<code>	myChart.options.title.text = 'Genre distribution of 20 highest earning movies';</code>
	<code>	updateChart();</code>
	<code>}</code>
</pre>

disableButtons contains code that temporarily disables the buttons. This is not required, but it helps if the user clicks a button quickly multiple times and the chart and ajax calls struggle to keep up. updateChart is primarily composed of the ajax call referenced above. <br><br>

<a id="section3_anchor"></a>
<h5>References</h5>
<ul>
	<li><a href="https://www.themoviedb.org/">Data source and website for exploring movies</a></li>
	<li><a href="https://www.chartjs.org/docs/latest/">Documentation for chart.js, the visualization method used</a></li>
</ul><br><br>

<?php
include('inc/footer.php'); 
?>