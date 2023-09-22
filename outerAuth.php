<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/params_init.php';
$ref = $_SERVER['HTTP_REFERER'];
$log = $_GET['N'];
$pas = "";
$pas = $_GET['P'];
$table = "users_siopr";


if("https://siopr.mos.ru/" != $ref ){
    header('Location: /');
}else{

    if($log != '' && $pas  != ''){
        //Echo "1";
        echo doHash($pas, $log);
    }else{
        //Echo "2";
        header('Location: /');
    }
}
function doHash($p, $u){
    global $table;


    function verified($p, $u){
        global $pas;
        if($p == 1){
            $_SESSION['login'] = $u;
            $_SESSION['pass'] = $pas;
            $_SESSION['verified'] = 1;
        }else{
            $_SESSION['login'] = $u;
            $_SESSION['verified'] = 0;
        }
    }
    $q = "SELECT [hash] FROM ".$table." WHERE login='".$u."'";
    $result = ms_query_simple($q);
    if(count($result)>0){
        /* если пользователь есть то вот его хеш */

        $hash = $result[0]['hash'];
        $res = sha1($p, false);
        $res = hex2bin($res);
        $res = base64_encode($res);
        if($res == explode("," , $hash)[0]){
            verified(1, $u);
            header('Location: /dashboard/');
        }else{
            header('Location: /');
        }
    }else{
        verified(0, $u);
        echo "Нет такого пользователя";
    }
}