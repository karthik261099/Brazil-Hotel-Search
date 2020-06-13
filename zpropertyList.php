<?php
//HERE WE GET HOTEL ID & HOTEL NAME & Price
$curl = curl_init();

$destinationId="150427";

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://hotels4.p.rapidapi.com/properties/list?currency=USD&locale=en_US&sortOrder=PRICE&destinationId=".$destinationId."&pageNumber=1&checkIn=2020-01-08&checkOut=2020-01-15&pageSize=25&adults1=1",
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

//$response = curl_exec($curl);
$response = json_decode(curl_exec($curl),true);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {

	foreach ($response["data"]["body"]["searchResults"]["results"] as $hotel) {
		echo $hotel["id"]." ";//hotelId
		echo $hotel["name"]." ";//hotelId
		echo $hotel["ratePlan"]["price"]["current"]."<br>";//hotelId
	}

	// echo $response["data"]["body"]["searchResults"]["results"][0]["id"]." ";//hotelId
	// echo $response["data"]["body"]["searchResults"]["results"][0]["name"]." ";//hotelId
	// echo $response["data"]["body"]["searchResults"]["results"][0]["ratePlan"]["price"]["current"]." ";//hotelId
}

?>