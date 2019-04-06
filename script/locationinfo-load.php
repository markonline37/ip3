<?php

$lat = $_POST['phplat'];
$lon = $_POST['phplon'];

$url = "https://api.opencagedata.com/geocode/v1/json?q=".$lat."%2C%20".$lon."&key=96c4858f3ea74cd3b4ca29595a70959c&language=en&pretty=1";

$json = file_get_contents($url);

echo $json;

?>