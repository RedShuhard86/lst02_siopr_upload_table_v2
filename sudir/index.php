<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';

//define("SUDIR_URL","https://sudir.mos.ru/blitz/"); // прод
define("SUDIR_URL","https://sudir-test.mos.ru/blitz/"); // тест

$client = [
    "id" => "sioprweb.mos.ru",
    "secret" => "NjfmhIVHZ8hoLY6"  // тест
    // "secret" => "NjfmhIVHZ8hoLY6" // прод
];

$variants = [
    "ae" => "oauth/ae", // авторизации и аутентификации
    "te" => "oauth/te", // обновления маркера доступа
    "me" => "oauth/me", // получения данных пользователя
    "in" => "oauth/introspect", // получения данных о маркере доступа
    "lo" => "oauth/logout", // логаут
];

//echo base64_encode($client['id'].":".$client['secret'])."<br>";

function mixer($vr){
    global $client,$variants;

    $json = [
        "client_id" => "sioprweb.mos.ru",
        "response_type" => "code",
        "scope" => "openid",
        "access_type" => "offline",
        "redirect_uri" => "https://sioprweb.mos.ru",
        "profile" => "",
        "state" => "342a2c0c-d9ef-4cd6-b328-b67d9baf6a7f"

    ];


    echo SUDIR_URL.$variants['ae'];
    $ch = curl_init(SUDIR_URL.$variants[$vr]);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Basic '.base64_encode($client['id'].":".$client['secret'])]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, true);
    $html = curl_exec($ch);
    echo "<pre>"; print_r($html); echo "</pre>";
    curl_close($ch);
}
mixer("ae");