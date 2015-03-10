<?php

// $client_id = '<YOUR_CLIENT_ID>';
$client_id = '59757247547-037eadj9b73lq1q9vpgfdsrlo4skucfi.apps.googleusercontent.com';
// $client_secret = '<YOUR_CLIENT_SECRET>';
$client_secret = 'k74TnE7O4ECtT3boliCog7kX';
// $redirect_uri = '<YOUR_REDIRECT_URI>';
$redirect_uri = 'http://localhost/callback/index.php';

$url = "https://accounts.google.com/o/oauth2/auth";
 
$params = array(
    "response_type" => "code",
    "client_id" => $client_id,
    "redirect_uri" => $redirect_uri,
    "scope" => "https://www.googleapis.com/auth/plus.me"
    );
 
$request_to = $url . '?' . http_build_query($params);
 
header("Location: " . $request_to);

if(isset($_GET['code'])) {
    // try to get an access token
    $code = $_GET['code'];
    $url = 'https://accounts.google.com/o/oauth2/token';
    $params = array(
        "code" => $code,
        "client_id" => $client_id,
        "client_secret" => $client_secret,
        "redirect_uri" => $redirect_uri,
        "grant_type" => "authorization_code"
    );
 
    $request = new HttpRequest($url, HttpRequest::METH_POST);
    $request->setPostFields($params);
    $request->send();
    $responseObj = json_decode($request->getResponseBody());
    echo "Access token: " . $responseObj->access_token;
}

?>