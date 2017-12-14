<?php
    $access_token = "";
    $refresh_token = "";
        if (!isset($_SESSION['timestamp'])) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://auth.networkfleet.com/token",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "grant_type=password&password=titanadmin&username=titanoil",
                CURLOPT_HTTPHEADER => array(
                    "authorization: Basic dGl0YW5vaWw6dGl0YW5hZG1pbg==",
                    "content-type: application/x-www-form-urlencoded"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $array = array(json_decode($response, true));
                $access_token = $array[0]["access_token"];
                // Create Session
                $date = new DateTime();
                $datetime = $date->format('m/d/Y h:i A');
                $_SESSION['timestamp'] = $datetime;
                $_SESSION['access'] = $array[0]["access_token"];
                $_SESSION['refresh'] = $array[0]["refresh_token"];
                $_SESSION['expires'] = $array[0]["expires_in"];
                // echo("Access Token : ".$array[0]["access_token"] . "<br/>");
                // echo("Refresh Token : ".$array[0]["refresh_token"]. "<br/>");
                // echo("Expires in : ".$array[0]["expires_in"]. "<br/>");
                echo "<h1 style='position:absolute; top: 50px; left: 80px;'>New Session Started.</h1>";
            }
        } else {
            $datetimeOld = new DateTime($_SESSION['timestamp']);
            $date = new DateTime();
            $datetimeNew = $date->format('m/d/Y h:i A');
            $interval = date_diff($datetimeOld, new DateTime($datetimeNew));
            $difference = $interval->format('%R%i minutes');
            // echo "Difference: ". $difference;
            echo "<h1 style='position:absolute; top: 50px; left: 80px;'>...Session Ongoing.. " . $difference . "</h1>";
            if ($difference > 80000) {
                // refresh token (token expires at 89,999)
                $curl = curl_init();
                $refresh_token = $_SESSION['refresh'];
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://auth.networkfleet.com/token",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => "grant_type=refresh_token&refresh_token=$refresh_token",
                  CURLOPT_HTTPHEADER => array(
                    "authorization: Basic dGl0YW5vaWw6dGl0YW5hZG1pbg==",
                    "content-type: application/x-www-form-urlencoded"
                  ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                  echo "cURL Error #:" . $err;
                } else {
                    $array = array(json_decode($response, true));
                    $access_token = $array[0]["access_token"];
                    // Create Session
                    $date = new DateTime();
                    $datetime = $date->format('m/d/Y h:i A');
                    $_SESSION['timestamp'] = $datetime;
                    $_SESSION['access'] = $array[0]["access_token"];
                    $_SESSION['refresh'] = $array[0]["refresh_token"];
                    $_SESSION['expires'] = $array[0]["expires_in"];
                        echo "<h1 style='position:absolute; top: 50px; left: 80px;'>Session Refreshed!</h1>";
                }
            } else if ($difference > 89999) {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://auth.networkfleet.com/token",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "grant_type=password&password=titanadmin&username=titanoil",
                    CURLOPT_HTTPHEADER => array(
                        "authorization: Basic dGl0YW5vaWw6dGl0YW5hZG1pbg==",
                        "content-type: application/x-www-form-urlencoded"
                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    $array = array(json_decode($response, true));
                    $access_token = $array[0]["access_token"];
                    // Create Session
                    $date = new DateTime();
                    $datetime = $date->format('m/d/Y h:i A');
                    $_SESSION['timestamp'] = $datetime;
                    $_SESSION['access'] = $array[0]["access_token"];
                    $_SESSION['refresh'] = $array[0]["refresh_token"];
                    $_SESSION['expires'] = $array[0]["expires_in"];
                    // echo("Access Token : ".$array[0]["access_token"] . "<br/>");
                    // echo("Refresh Token : ".$array[0]["refresh_token"]. "<br/>");
                    // echo("Expires in : ".$array[0]["expires_in"]. "<br/>");
                    echo "<h1 style='position:absolute; top: 50px; left: 80px;'>Old Session Expired. New Session Started.</h1>";
                }
            }
        }
            echo "<p style='position:absolute; top: 85px; left: 80px;'>networkfleet session included.</p>";
            $access_token = $_SESSION['access'];
            $refresh_token = $_SESSION['refresh'];
?>
