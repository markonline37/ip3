<?php

//curl request to get the data from rapidAPI and keep the key safe, used curl for custom header.
$ch = curl_init();
$temp;
curl_setopt_array($ch,[
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_URL => 'https://omgvamp-hearthstone-v1.p.rapidapi.com/cards',
	CURLOPT_HTTPHEADER => [
		'X-RapidAPI-Key: d7dd7caf24mshc2ce37502982afap112ac7jsn911223c095c1'
	],
	CURLOPT_SSL_VERIFYHOST => 0,
	CURLOPT_SSL_VERIFYPEER => 0
]);

$result = curl_exec($ch);
curl_close($ch);

echo $result;

?>