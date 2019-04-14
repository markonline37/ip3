<?php 
$title = 'Audio Tutorial';
$description = 'Audio Tutorial';
include('inc/header.php');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/tutorial.css" rel="stylesheet" type="text/css">

<h1>Audio Tutorial</h1>
<p>
	This is the tutorial written for the <a href="audio.php">audio visualisation</a><br><br>

	This tutorial makes use of HTML5's canvas tag, audio tag, and the Audio Context interface.<br><br>

	This tutorial expects a basic understanding of JavaScript, if you need to learn the basics or a refresher; <a href="https://www.w3schools.com/js/js_intro.asp">w3schools - JavaScript Introduction</a> is an excellent choice.
</p>
<br>
<h5>Menu</h5>
<p>
	<ul>
		<li><a href="#section1_anchor">Preparing The Data</a></li>
		<li><a href="#section2_anchor">Displaying The Data</a></li>
		<li><a href="#section3_anchor">References</a></li>
	</ul>
</p>

<a id="section1_anchor"></a>
<h5>Preparing The Data</h5>
<p>
	The audio visualisation makes use of local mp3 files (hosted on the visualiser server). Acquiring music to use for yourself involves using a search engine to search for &quot;Royalty free music&quot; or &quot;public domain music&quot;. Just ensure that there are no license restrictions in place to limit their use, modification or distribution.<br><br>

	The music on the visualizer website was sourced from <a href="https://www.bensound.com/royalty-free-music">Bensound</a><br><br>

	The HTML page should contain a canvas tag and audio tag:<br>
	<pre>
		<code>&lt;canvas id=&quot;canvas&quot;&gt;&lt;/canvas&gt;</code>
		<code>&lt;audio id=&quot;myAudio&quot; controls&gt;</code>
	</pre>
	The canvas tag is for animating the graph on and the audio tag is for providing an interface for the music.<br><br>
</p>

<a id="section2_anchor"></a>
<h5>Displaying The Data</h5>
<p>
	<pre>
		<code>function play() {</code>
		<code></code>
		<code>    var canvas = document.getElementById("canvas");</code>
		<code>    var ctx = canvas.getContext("2d");</code>
		<code></code>
		<code>    var audioFile = "song.mp3";</code>
		<code>    var myAudio = document.getElementById("myAudio");</code>
		<code></code>
		<code>    myAudio.src = audioFile;</code>
		<code>    myAudio.load();</code>
		<code>    myAudio.play();</code>
		<code>    </code>
		<code>    var context = new AudioContext();</code>
		<code>    var src = context.createMediaElementSource(myAudio);</code>
		<code>    </code>
		<code>    var analyser = context.createAnalyser();</code>
		<code></code>
		<code>    canvas.width = window.innerWidth;</code>
		<code>    canvas.height = window.innerHeight;</code>
		<code>    </code>
		<code>    src.connect(analyser);</code>
		<code>    analyser.connect(context.destination);</code>
		<code></code>
		<code>    analyser.fftSize = 256;</code>
		<code>    var bufferLength = analyser.frequencyBinCount;</code>
		<code>    var dataArray = new Uint8Array(bufferLength);</code>
		<code></code>
		<code>    var WIDTH = canvas.width;</code>
		<code>    var HEIGHT = canvas.height;</code>
		<code></code>
		<code>    var barWidth = (WIDTH / bufferLength) * 2.5;</code>
		<code>    var barHeight;</code>
		<code>    var x = 0;</code>
		<code></code>
		<code>    function renderFrame() {</code>
		<code>        requestAnimationFrame(renderFrame);</code>
		<code>        x = 0;</code>
		<code>        analyser.getByteFrequencyData(dataArray);</code>
		<code>        ctx.fillStyle = "#000";</code>
		<code>        ctx.fillRect(0, 0, WIDTH, HEIGHT);</code>
		<code></code>
		<code>        for (var i = 0; i < bufferLength; i++) {</code>
		<code>            barHeight = dataArray[i];</code>
		<code>            var r = barHeight + (25 * (i/bufferLength));</code>
		<code>            var g = 250 * (i/bufferLength);</code>
		<code>            var b = 50;</code>
		<code>            ctx.fillStyle = "rgb(" + r + "," + g + "," + b + ")";</code>
		<code>            ctx.fillRect(x, HEIGHT - barHeight*3.45, barWidth, barHeight*3.45);</code>
		<code>            x += barWidth + 1;</code>
		<code>        }</code>
		<code>    }</code>
		<code></code>
		<code>    myAudio.play();</code>
		<code>    renderFrame();</code>
		<code>}</code>
	</pre>

	This code looks complicated but is fairly simple once understood.<br>
	On line 3 and 4 the context is assigned for the canvas element.<br>
	On line 7 a variable named myAudio is assigned to the element from html.<br>
	On line 9 the src is asigned based on line 6, the src is then 'played' on line 11.<br>
	On line 13, a new AudioContext is created.<br>
	On line 14 context is used to create a source using variable myAudio.<br>
	On line 16 an audiocontext analyser is created.<br>
	On line 18 and 19 the canvas width and height is assigned.<br>
	On line 21 the analyser is connected to the source.<br>
	On line 22 the analyser is connected to the 'output' or destination.<br>
	On line 24 the analyser fftsize is set to 256.<br>
	On line 25 a bufferlength is created based on the analyser.<br>
	On line 26 the bufferlength is used to create an array of 8-bit unsigned integers.<br>
	Line 31 uses the width from line 28 to determine the width of each bar in the visualisation.<br>

	Phew, now that everything is setup and all contexts are assigned.<br><br>

	Line 35 is the start of the animation function 
	Line 38 sees the analyser copies the current frequency data to dataArray. And dataArray is then used in the rest of the function to draw the height's of the bars (line 43) and the colour of the bars (line 44-47).<br><br>

	And finally on line 54 the animation is started.<br><br>

	If you're following along at home please use the <a href="https://developer.mozilla.org/en-US/docs/Web/API/AudioContext">mozilla developer documentation</a> for learning about the audio analyser, they'll do a far better job than I ever could at explaining it. And tutorials regarding it are few and far between on search engines. The audio analyser needs a lot of work before it's fully standardised. Lines 1-35 are all just assigning context and connecting this to that.<br><br>

	Noteable pieces of code here are:<br>
	Line 27, setting the fftsize to 256. This fftsize is the number of samples used during the Fast Fourier Transform (FFT) <a href="https://en.wikipedia.org/wiki/Fast_Fourier_transform">Wikipedia - FFT</a><br><br>

	Line 26 and 27, create a 8 bit unsigned array based on the frequencyBinCount. This array contains the values of the current sample - see line 38 and is used to draw the bar's number and height.<br><br>

	And line 38 - see above.<br><br>
</p>


<a id="section3_anchor"></a>
<h5>References</h5>
<p>
	<a href="https://developer.mozilla.org/en-US/docs/Web/API/AudioContext">MDN - Audio Context</a><br>
	<a href="https://developer.mozilla.org/en-US/docs/Web/API/AnalyserNode/fftSize">MDN - fftSizee</a><br>
	<a href="https://developer.mozilla.org/en-US/docs/Web/API/AnalyserNode/frequencyBinCount">MDN - frequencyBinCount</a><br>
	<a href="https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame">MDN - requestAnimationFrame</a><br><br>
</p>

<?php
include('inc/footer.php'); 
?>