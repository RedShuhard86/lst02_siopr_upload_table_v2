<?php
$code = $_GET["code"];

$client_id = "sioprweb.mos.ru";
$client_secret = "NjfmhIVHZ8hoLY6";
$callback_uri = "https://sioprweb.mos.ru/dashboard.php";
$secret = base64_encode($client_id.":".$client_secret);

$token_url = 'https://sudir-test.mos.ru/blitz/oauth/te';

echo getAccessToken($code);
//getUserInfo($code);


function getAccessToken($code){

    global $secret, $token_url, $callback_uri;

    $header = array("Authorization: Basic ".$secret, "Content-Type: application/x-www-form-urlencoded");
    $content = "grant_type=authorization_code&code=".$code."&redirect_uri=".$callback_uri;

    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => $token_url,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $content
        )
    );
    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response, true);
}

function getUserInfo($cd){

    $arrAcc = getAccessToken($cd);
    echo "<pre>"; print_r($arrAcc); echo "</pre>";

    $header = array("Authorization: Bearer ".$arrAcc['access_token'], "Content-Type: application/x-www-form-urlencoded");
    $url = 'https://sudir-test.mos.ru/blitz/oauth/me';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header );
    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response, true)
}