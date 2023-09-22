<?php
$time = 60*5;
set_time_limit($time);
header('Content-Type: text/html; charset = utf-8');

define("URL_ADDRESS","lst02.camco");
define("FTP_ADDRESS","siopr-pre1ct");
define("FTP_ROOT_NAME","SIOPR-PRE1CT");
define("FTP_PREFIX","Pre1C\\");
define("MAIN_IP_FOR_GET_DATA", "http://192.168.110.3:82/pre1Cv82dt/hs/Bitrix/");
define("MAIN_IP_FOR_GET_DATA_MAP", "http://192.168.110.3:82/pre1Cv82dt/hs/Map/");
//define("MAIN_IP_FOR_GET_DATA", "http://192.168.110.3:80/siopr041018/hs/Bitrix/");
//define("MAIN_IP_FOR_GET_DATA_MAP", "http://192.168.110.3:80/siopr041018/hs/Map/");
/* выводить ошибки DB */
define("CH", true);

/* Всякие обязательные значения */

$arrAlfabit = [
    "А"=>"A",
    "Б"=>"B",
    "В"=>"V",
    "Г"=>"G",
    "Д"=>"D",
    "Е"=>"E",
    "Ё"=>"Yo",
    "Ж"=>"Zh",
    "З"=>"Z",
    "И"=>"I",
    "Й"=>"Y",
    "К"=>"K",
    "Л"=>"L",
    "М"=>"M",
    "Н"=>"N",
    "О"=>"O",
    "П"=>"P",
    "Р"=>"R",
    "С"=>"S",
    "Т"=>"T",
    "У"=>"U",
    "Ф"=>"F",
    "Х"=>"Kh",
    "Ц"=>"Ts",
    "Ч"=>"Ch",
    "Ш"=>"Sh",
    "Щ"=>"Shch",
    "Ъ"=>"",
    "Ы"=>"Y",
    "Ь"=>"",
    "Э"=>"E",
    "Ю"=>"Yu",
    "Я"=>"Ya",
    "а"=>"a",
    "б"=>"b",
    "в"=>"v",
    "г"=>"g",
    "д"=>"d",
    "е"=>"e",
    "ё"=>"yo",
    "ж"=>"zh",
    "з"=>"z",
    "и"=>"i",
    "й"=>"y",
    "к"=>"k",
    "л"=>"l",
    "м"=>"m",
    "н"=>"n",
    "о"=>"o",
    "п"=>"p",
    "р"=>"r",
    "с"=>"s",
    "т"=>"t",
    "у"=>"u",
    "ф"=>"f",
    "х"=>"kh",
    "ц"=>"ts",
    "ч"=>"ch",
    "ш"=>"sh",
    "щ"=>"shch",
    "ъ"=>"",
    "ы"=>"y",
    "ь"=>"",
    "э"=>"e",
    "ю"=>"yu",
    "я"=>"ya",
    " "=>"_"
];

function UpdateUserFrom1C(){
    $url = MAIN_IP_FOR_GET_DATA."login";
    $res = curlCombain($url);
    echo "<pre>"; print_r($res); echo "</pre>";die();
}

function getUser(){

    /*
    $user = $_SESSION['login']$_SESSION['login'];
    $verified = $_SESSION['verified'];
    if($user == "" || $verified == 0){
        header('Location: http://'.$_SERVER['SERVER_ADDR']);

    }else{
        //return '{"user":'.$user.', "verified":'.$verified.'}';
    }
    return $user;
    */
    $arrUser = [
        "log" => "Юрий Дяденко",
        "pas" => "Q!584747"
    ];
    return $arrUser;
}