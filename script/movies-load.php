<?php

//$input = $_POST['phpinput'];

//$url = "https://api.opencagedata.com/geocode/v1/json?q=".$input."&key=f4ec288466204235a0efedfade826117";
$url = "https://api.themoviedb.org/3/discover/movie?api_key=fd710eb4aa46d9d9a6a5c6d5192149c4&language=en-US&sort_by=revenue.desc&include_adult=false&include_video=false&page=1"

$json = file_get_contents($url);

echo $json;

?>
