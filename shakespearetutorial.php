<?php 
$title = 'Shakespeare Tutorial';
$description = 'Shakespeare Tutorial';
include('inc/header.php');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/tutorial.css" rel="stylesheet" type="text/css">

<h1>Shakespeare Tutorial</h1>
This is the tutorial written for the <a href="shakespeare.php">Shakespeare visualisation</a><br><br>

The Shakespeare visualisation works by creating a frequency map of each individual word and counting each occurance. These occurances are then plotted into a chart and their font size and font weight are evaluated against the maximum occurance.<br><br>

This tutorial expects a basic understanding of JavaScript, if you need to learn the basics or a refresher; <a href="https://www.w3schools.com/js/js_intro.asp">w3schools - JavaScript Introduction</a> is an excellent choice.<br><br>

<h5>Menu</h5>
<ul>
	<li><a href="#section1_anchor">Gathering The Data</a></li>
	<li><a href="#section2_anchor">Displaying The Data</a></li>
	<li><a href="#section3_anchor">References</a></li>
</ul>

<a id="section1_anchor"></a>
<h5>Gathering The Data</h5>
<a href="http://www.gutenberg.org/wiki/Main_Page">Project Gutenberg</a> was used to source public domain works. The Shakespeare books were each sourced as plain text for simplicity in working with them in JavaScript.<br><br>

There are numerous books available from many different sources such as Jane Austens Pride and Prejudice, and Herman Melvilles Moby Dick. To follow the process below make sure the source is: "Plain Text UTF-8".<br><br>

Loading the book into JavaScript uses a basic AJAX request.<br>
If you're unfamiliar with AJAX please refer to the <a href="javascripttutorial.php#section2_anchor">JavaScript - AJAX tutorial.</a><br>
<pre>
	<code>$.ajax({</code>
	<code>  url: "nameOfBook.txt",</code>
	<code>  success: function(data){</code>
	<code>    processData(data);</code>
	<code>  }</code>
	<code>}</code>
</pre>

The url is simply the path to the book and processData is called, more on this in the next section.<br><br>

<a id="section2_anchor"></a>
<h5>Displaying The Data</h5>
In order to display the word count, the individual words need to be counted:<br>
<pre>
	<code>function processData(data){</code>
	<code>  var words = data.replace(/\.|\[|\]|\(|\)|\&|\"|\;|\,|\?|\_|\!|\"\"/g, '').replace(/é|ê|ë|è/g, 'e').split(/\s/);</code>
	<code>  var freqMap = {};</code>
	<code>  var letters = /^[A-Za-z]+$/;</code>
	<code>  words.forEach(function(w) {</code>
	<code>    w=w.toLowerCase();</code>
	<code>    if(!common.includes(w) || w != ""){</code>
	<code>      w=w.charAt(0).toUpperCase()+w.slice(1);</code>
	<code>      if (!freqMap[w]) {</code>
	<code>        freqMap[w] = 0;</code>
	<code>      }</code>
	<code>      freqMap[w] += 1;</code>
	<code>    }</code>
	<code>  });</code>
	<code>  drawCloud(freqMap);</code>
	<code>}</code>
</pre>

line 2, see's any special characters removed.<br>
Line 3, create the frequency map.<br>
Line 4, ensure the data is letters only.<br>
Line 5, loop for each word.<br>
Line 6, convert to lower case.<br>
Line 7, if the word isn't a 'common' everyday word, don't add it to the frequency map - this is done by checking against an array of common words in the example below.<br>
Line 8, Give the first letter in the word a capital.<br>
Line 9, if the word is new to the frequency map create a new entry on line 10.<br>
Line 12, if the word already exists, increase the occurance count.<br>
line 15, call the drawCloud method using the frequency map as data.<br><br>

<pre>
	<code>var common = [</code>
	<code>  the,</code>
	<code>  for,</code>
	<code>  him,</code>
	<code>  ...</code>
	<code>]</code>
</pre>

The common words array just contains common everyday words, the original list was sourced from: <a href="https://gist.github.com/gravitymonkey/2406023#file-gistfile1-txt">A Github Repo</a> and was updated to include the names of the actors.<br><br>

The drawCloud function works by setting a minimum and maximum font size and weight. The maximum occurance of any single word is found and the maximum set at 100%, all of the others are evaluated based on occurance against maximum and their percentage font size and weight is set. If the words are below a minimum font size and weight, then apply the minimum size. This is to avoid any words being written that are 2px font size - which is absolutely unreadable. Additionally a minimum count check is added to stop words that only appear once or twice drawing, as English consists of only 26 letters but 171,476 words in use (<a href="https://en.oxforddictionaries.com/explore/how-many-words-are-there-in-the-english-language/">According to the Oxford Dictionary</a>) there will be too many results if the minimum frequency is set too low.<br><br>
<pre>
	<code>function drawCloud(data){</code>
	<code>	var maxFont = 48; // maximum font size</code>
	<code>	var minFont = 14; // minimum font size</code>
	<code>	var maxWeight = 900; // maximum font weight</code>
	<code>	var minWeight = 100; // minimum font weight</code>
	<code>	var minCount = 5;</code>
	<code>	var array = [];</code>
	<code></code>
	<code>	var newData = {};</code>
	<code>	var max = 0;</code>
	<code>	$.each(data, function(w){</code>
	<code>		if(!max || data[w] &gt; max){</code>
	<code>			max = data[w];</code>
	<code>		}</code>
	<code>		if(data[w] &gt; minCount){</code>
	<code>			newData[w] = data[w];</code>
	<code>		}</code>
	<code>	});</code>
	<code></code>
	<code>	var builder = "";</code>
	<code></code>
	<code>	$.each(newData, function(w){</code>
	<code>		var percent = newData[w]/max;</code>
	<code>		var weight = newData[w]*percent;</code>
	<code>		var fontSize = maxFont*percent;</code>
	<code>		var weight = Math.ceil(weight/100)*100;</code>
	<code>		fontSize = Math.ceil(fontSize);</code>
	<code>		if(weight &lt; minWeight){</code>
	<code>			weight = minWeight;</code>
	<code>		}</code>
	<code>		if(fontSize &lt; minFont){</code>
	<code>			fontSize = minFont;</code>
	<code>		}</code>
	<code></code>
	<code>		var string = "&lt;div class=\"wordCloudItem\"&gt;";</code>
	<code>		string+="&lt;span style=\"font-size: " + fontSize + "px;font-weight: " + weight + "\"&gt;" + w + "&lt;/span&gt;";</code>
	<code>		string+="&lt;/div&gt;";</code>
	<code>		array.push(string);</code>
	<code>	});</code>
	<code>	for(var i = 0; i &lt; array.length; i++){</code>
	<code>		builder+=array[i];</code>
	<code>	}</code>
	<code>	var element = document.getElementById("books_container");</code>
	<code>	element.innerHTML += builder;</code>
	<code>}</code>
</pre>

Line 5, The minimum occurance of the word to display.<br>
Line 9 - 18 is evaluating the maximum and if the word meets the minimum occurance, if it does add to newData.<br>
Line 22, for each word in newData.<br>
Line 23-33 is setting the font size and weight of the word against the maximum.<br>
Line 35-38 is creating the element to be inserted into the HTML.<br>
Line 40-42 is adding all of the elements together that were created by the loop above.<br>
Line 43-44 is adding the 'giant' element created above to the HTML page.<br><br>

<a id="section3_anchor"></a>
<h5>References</h5>
<a href="https://en.oxforddictionaries.com/explore/how-many-words-are-there-in-the-english-language/">Oxford Dictonary</a><br>
<a href="https://gist.github.com/gravitymonkey/2406023#file-gistfile1-txt">Common Words Repo</a><br><br>

<?php
include('inc/footer.php'); 
?>