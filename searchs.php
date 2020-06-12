<?php
//HERE WE GET DESTINATION ID
$curl = curl_init();

$searchQuery="salvador";

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://hotels4.p.rapidapi.com/locations/search?locale=en_US&query=".$searchQuery,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: hotels4.p.rapidapi.com",
		"x-rapidapi-key: c50738ed95msh30b77e38dfea9aep1e6f8djsnab34ee2d3c04"
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}

?>