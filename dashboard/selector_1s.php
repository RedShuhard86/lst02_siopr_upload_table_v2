<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
session_start();
//echo "<pre>"; print_r($_SESSION); echo "</pre>";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");

if(strlen($_SESSION['login'])>0){
//    $log = $_SESSION['login'];
//    $pas = $_SESSION['pass'];
    $log = "bitrix";
    $pas = "bitrix_!";
}

$arrPost = $_POST;
$host = MAIN_IP_FOR_GET_DATA."getwidgetdata/".urlencode($arrPost['wp']).'/'.urlencode($arrPost['func']).'/';
if(isset($arrPost["param"]) && $arrPost["json"]!="true") {
    $paramArr = [];
    $params = urldecode(base64_decode($arrPost["param"]));
    $parramsArr = explode("&", $params);
    foreach($parramsArr as &$param) {
        $tmp = explode("=",$param);
        $paramArr[] = ["Ключ"=>$tmp[0], "Значение"=>$tmp[1]];
    }
    $params = json_encode($paramArr);
} else {
    $params = $arrPost["param"];
}
$curl = curl_init($host);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $log . ':' . $pas );
if($params) {
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $params );
}
curl_setopt($curl, CURLOPT_HEADER, 0);
echo $curl_response = curl_exec($curl);

curl_close($curl);
/*
echo $host;
echo "<pre>"; print_r($arrPost); echo "</pre>";
if(isset($arrPost["param"])) {
    $params = urldecode(base64_decode($arrPost["param"]));
    $arrJson = json_decode($params,true);
    if(count($arrJson)>0){
        $resStr = '?';

        foreach ($arrJson as $k=>$val){
            $resStr .= $val['Ключ']."=".$val['Значение'].'&';
        }
        $host .= $resStr;
    }else{
        $parramsArr = explode("&", $params);
        foreach ($parramsArr as &$param) {
            $paramArr = explode("=", $param);
            $param = $paramArr[0] . "=" . urlencode($paramArr[1]);
        }
        $params = implode("&", $parramsArr);
        $host .= '?' . $params;
    }
}
echo $host;
die();
$curl = curl_init($host);
//echo "<pre>"; print_r($_SESSION); echo "</pre>";
if(strlen($_SESSION['login'])>0){
//    $log = $_SESSION['login'];
//    $pas = $_SESSION['pass'];
    $log = "bitrix";
    $pas = "bitrix_!";
}
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $log . ':' . $pas );
curl_setopt($curl, CURLOPT_HEADER, 0);
echo $curl_response = curl_exec($curl);