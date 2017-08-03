<?php

$fname = $_FILES['file']['tmp_name'];
$data = file_get_contents($fname);
$base64 = base64_encode($data);

$request_json = '{
            "requests": [
                {
                  "image": {
                    "content":"' . $base64. '"
                  },
                  "features": [
                      {
                        "type": "LANDMARK_DETECTION",
                        "maxResults": 200
                      }
                  ]
                }
            ]
        }';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://vision.googleapis.com/v1/images:annotate?key='.AIzaSyDRdSIoCJ9AyjwrsGJlQikiFW2MGNbAKv0);
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
