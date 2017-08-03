<?php
$curl = curl_init();
$place = $_POST['place'];
curl_setopt($curl, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/place/textsearch/json?query='.$place.'&key=AIzaSyDewEGy4jfSySKdO-qO684SgqYZz0aqKkY');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $request_json);
$json_response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ($status != 200) {
    die("Error: $status, response $json_response, curl_error " . curl_error($curl) . ', curl_errno ' . curl_errno($curl));
}
curl_close($curl);
echo $json_response;
