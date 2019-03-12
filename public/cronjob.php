<?php

$url = 'https://declan-munroe-portfolio.herokuapp.com/sendcronmail';
        
// Initialize curl
$curl = curl_init();

// Url to submit to
curl_setopt($curl, CURLOPT_URL, $url);

// Return output instead of outputting it
curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);

// We are doing a post request
curl_setopt($curl, CURLOPT_POST, false);

// This is set to true so will display errors on the screen if errors occur
curl_setopt($curl, CURLOPT_FAILONERROR, true);

// Execute the request and fetch the response and check for errors below
$response = curl_exec($curl);

if ($response === false) {
    echo 'cURL Error: ' . curl_error($curl);
}

// Close and free up the curl handle
curl_close($curl);
