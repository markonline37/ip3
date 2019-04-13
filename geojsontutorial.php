<?php 
$title = 'GEOJson Tutorial';
$description = 'GEOJson Tutorial';
include('inc/header.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/tutorial.css" rel="stylesheet" type="text/css">

<h1>GEOJson Tutorial</h1>
<p>
	Data is everything in digital cartography and comes in a few additional formats beyond JSON. One of them is GeoJSON. JSON data takes the form of a standard JavaScript object, nested to group data (“values”) by common parents (“keys”). This key-value format is second nature to any JavaScript developer and the basis of object-oriented programming. GeoJSON follows the same structure, but requires that the object contain the keys type, geometry, and properties. There are two values for type — Feature and FeatureCollection.  <br><br>

	Now we will go further in depth into GeoJson. First the most essential element of geographic data is the coordinate. This is a single number representing a single dimension: typically the dimensions are longitude and latitude. Sometimes there’s also a coordinate for elevation. Coordinates in GeoJSON are formatted like numbers in JSON: in a simple decimal format.  <br><br>

	Then position is an array of coordinates in order: this is the smallest unit that we can really consider ‘a place’ since it can represent a point on earth. GeoJSON describes an order for coordinates: they should go, in order – longitude, latitude and elevation. The order is not specific and can be changed, but longitude, latitude order matches the X, Y order of math and is used by data formats often. <br><br>

	The geometry key is where things get interesting. GeoJSON is used for geographic data that we can plot on a map, but in order to do so we need to declare a geometric shape that best suits the geography data we’re trying to store. There are six geometry types available: Point, LineString, Polygon, MultiPoint, MultiLineString, MultiPolygon.  <br><br>

	Point: With a single position, we can make the simplest geometry: the point: <br>

	<pre>
		<code>{ "type": "Point", "coordinates": [0, 0] } </code>
	</pre>

	LineString: To represent a line, you’ll need at least two coordinates to connect: <br>

	<pre>
		<code>{ "type": "LineString", "coordinates": [[0, 0], [10, 10]] } </code>
	</pre>

	These are the two simplest, most carefree kinds of geometry. Points and LineStrings don’t have many geometric rules: a point can lie anywhere in a place, and a line can contain arrangement of points, even if it’s self-crossing. Points and lines are also similar in that they have no area: there is no inside or outside. <br><br>

	Polygon: Polygons are where GeoJSON geometries become significantly more complex. They have area, so they have insides & outsides. And not only do they have an inside, they can also have holes in that inside: <br>

	<pre>
		<code>{ </code>
		<code>  "type": "Polygon", </code>
		<code>  "coordinates": [</code>
		<code>    [</code>
		<code>      [0, 0], [10, 10], [10, 0], [0, 0]</code>
		<code>    ]</code>
		<code>  ]</code>
		<code>}</code>
	</pre>
	
	The list of coordinates for Polygons is nested one more level than that for LineStrings. But holes explain the jump in complexity: polygons in GeoJSON are not just closed areas, but can have cut-outs. For this reason, polygons introduce a new term: the LinearRing. LinearRings are loops of positions. LinearRings are either the exterior ring - positions that form the outside edge of the Polygon and define which parts are filled - or interior rings, which define the parts of the Polygon are empty. There can only be one exterior ring, and it’s always the first one. There can be any number of interior rings, including zero. Zero interior rings just means that the polygon doesn’t have any holes. <br><br>

	Features are a combination of geometry and properties. Geometries are shapes and nothing more. They’re a central part of GeoJSON, but most data that has something to do with the world isn’t simply a shape, but also has an identity and attributes: <br>

	<pre>
		<code>{</code>
		<code>  "type": "Feature",</code>
		<code>  "geometry": {</code>
		<code>    "type": "Point",</code>
		<code>    "coordinates": [0, 0] </code>
		<code>  }, </code>
		<code>  "properties": { </code>
		<code>    "name": "null island"</code>
		<code>  }</code>
		<code>}</code>
	</pre>
	
	A feature collection is just an array of Feature objects.  <br><br>

	There are very good example for the use of GeoJSON that can help you get a better understanding here: <a href="https://medium.com/@amy.degenaro/introduction-to-digital-cartography-geojson-and-d3-js-c27f066aa84">Introduction to GEOJson and D3 JS</a><br><br>
</p>
<p>
	<h5>References</h5>
	<ul>
		<li><a href="https://macwright.org/2015/03/23/geojson-second-bite?fbclid=IwAR1asjtf4EnodNp3Wl23sGhVclt-i8ZAF7VN8GcQ_X0Loa4Xohlvkdu4Xto">More than you ever wanted to know about GeoJSON by Tom Wright</a></li>
		<li><a href="https://medium.com/@amy.degenaro/introduction-to-digital-cartography-geojson-and-d3-js-c27f066aa84?fbclid=IwAR0cKpNGijpDX-Ull_jtMc9aiAF2QD7Cej4T5FPgMwGGiasb0XhwxWFrktI">Introduction to Digital Cartography: GeoJSON and D3.js by Amy De Genaro</a></li>
	</ul>
</p>
<?php
include('inc/footer.php'); 
?>