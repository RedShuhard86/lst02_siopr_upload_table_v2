<?
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/params_init.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, HEAD, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, origin, content-type, accept');
session_start();
$arrPost = json_decode(file_get_contents("php://input"), true);

$table = "users_siopr";

if($_POST['login'] != '' && $_POST['password'] != ''){

    $log = $_POST['login'];
    $pass = $_POST['password'];
    doHash($pass, $log);
}else if($arrPost['login'] != '' && $arrPost['pass'] != ''){
    $log = $arrPost['login'];
    $pass = $arrPost['pass'];
    doHash($pass, $log);
}else{
    echo "Забыли что то ввести";
}

function doHash($p, $u){
    global $table;
    function verified($p, $u){
        if($p == 1){
//            $_SESSION['login'] = $u;
//            $_SESSION['pass'] = $_POST['password'];
            $_SESSION['login'] = "Юрий Дяденко";
            $_SESSION['pass'] = "Q!584747";
//            $_SESSION['pass'] = "12345";
//            $_SESSION['log_real'] = $u;
//            $_SESSION['pass_real'] = $_POST['password'];
            $_SESSION['verified'] = 1;
        }else{
            $_SESSION['login'] = $u;
            $_SESSION['verified'] = 0;
        }
    }

    /* подключаем БД */

    /* выбираем хеш по логину */

    $q = "SELECT [hash] FROM ".$table." WHERE login='".$u."'";
//    echo $q;
    $result = ms_query_simple($q);
    if(count($result)>0){
        /* если пользователь есть то вот его хеш */

        $hash = $result[0]['hash'];
        $res = sha1($p, false);
        $res = hex2bin($res);
        $res = base64_encode($res);
        if($res == explode("," , $hash)[0]){
            echo "GO";
            UpdateUserFrom1C();
            verified(1, $u);
        }else{
            echo "STOP";
        }
    }else{
        verified(0, $u);
        echo "Нет такого пользователя";
    }
}