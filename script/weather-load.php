<?php

$input = $_POST['phpinput'];

$url = "http://api.apixu.com/v1/forecast.json?key=c0ff85500cc74e2a8b1212317191703&q=".$input."&days=6";

$json = file_get_contents($url);

echo $json;

?>