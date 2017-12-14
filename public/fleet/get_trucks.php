<?php
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.networkfleet.com/vehicles",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "accept: application/vnd.networkfleet.api-v1+xml",
	    "authorization: Bearer $access_token",
		 "content-type: application/vnd.networkfleet.api-v1+xml"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
		$xml = simplexml_load_string($response);
		$count = 1;
		$array = array();
		foreach($xml as $item) {
				if (isset($item->label)) {
					array_push($array, (string)$item->label );
			}
		}
		asort($array);
		foreach($array as $item) {
			echo($item . " - Count: " . $count  . "<br/>");
			$count++;
		}
	}

print_r($refresh_token . "<br/>");
print_r($access_token);
?>
