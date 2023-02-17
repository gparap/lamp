<?php
/* https://mit-license.org | © 2023 gparap */

/** Performs a new URL session and returns its result. */
function perform_url_session($endpoint) {
    require_once('../config/config.php');
    $url = BASE_URL . $endpoint;

    //initialize session
    $curl = curl_init($url);

    //set session options
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //execute session
    $session_result = curl_exec($curl);

    //close session and free resources
    curl_close($curl);

    return $session_result;
}

/** Decodes a JSON encoded string into an associative array. */
function decode_json_to_array($json_string) {
    $json_array = json_decode($json_string, true);
    return $json_array;
}

?>