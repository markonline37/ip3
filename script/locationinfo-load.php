<?php

$input = $_POST['phpinput'];

$url = "https://api.opencagedata.com/geocode/v1/json?q=".$input."&key=f4ec288466204235a0efedfade826117";

$json = file_get_contents($url);

echo $json;

?>