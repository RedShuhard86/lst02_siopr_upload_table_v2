<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
require($_SERVER['DOCUMENT_ROOT'].'/authentication/functions.php');
$table = "users_siopr_auth";
$time_lag = (60*60*3);
$failed_auth = 3;
$arrPost = $_POST;

checkPost($arrPost);
$arrPost['actions'] = strip_tags($arrPost['actions']);

$FieldsArrEVENT['event'] = "Проверка пользователя";
if($_POST['event'] == 'auth') {
    $FieldsArrEVENT['event'] = "Авторизация";
}
$FieldsArrEVENT['initiator'] = $_SESSION['login'];
$FieldsArrEVENT['id_init'] = getUserSIOPRID($_SESSION['login']);
$FieldsArrEVENT['event_time'] = date("Ymd H:i:s");

$falser = [
    'r1'=>"Данный пользователь не зарегистрирован",
    'r2'=>"Сессия истекла",
    'r3'=>"Данный пользователь ЗАБЛОКИРОВАН",
    'r4'=>"Данный пользователь не активен",
    'r5'=>"Ваша первая авторизация, смените пароль",
    'r6'=>"Не администратор",
    'r7'=>"Пароль невалиден",
    'r8'=>"Ваш адрес неопределяется, отключите анонимайзер или VPN"
];

function encrypt($t){
    $ciphering = "AES-128-CTR";
    $encryption_key = hash('crc32b', $_SESSION['login']);
    return openssl_encrypt($t,  $ciphering, $encryption_key);
}
function decrypt($text){
    $ciphering = "AES-128-CTR";
    $decryption_key = hash('crc32b', $_SESSION['login']);
    return openssl_decrypt($text, $ciphering, $decryption_key);
}

if(count($arrPost)<=0){
    global $FieldsArrEVENT;
    $ERROR = '{"ERROR":"Данные логин или пароль Пусты"}';
    $FieldsArrEVENT['aftermath'] = $ERROR;
    $FieldsArrEVENT['subordinate'] = $_POST['login'];
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
    sendDateToDBLog($FieldsArrEVENT);
    return $ERROR;
}
function isBlockUser($l){
    global $table,$falser,$FieldsArrEVENT;
    $answer = '';
    $q = "SELECT blocking FROM ".$table." WHERE login = '".$l."'" ;
    $res = ms_query_simple($q);
    if($res[0]['blocking'] == 0){
        $ERROR = '{"ACCEPT":"Пользователь НЕ заблокирован"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        $answer = 'TRUE';
    }else{
        $ERROR = '{"ERROR":"'.$falser['r3'].'"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        $answer = 'FALSE';
    }
    $FieldsArrEVENT['subordinate'] = $_POST['login'];
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
    sendDateToDBLog($FieldsArrEVENT);
    return $answer;
}
function isActiveUser($l){
    global $table,$falser,$FieldsArrEVENT;
    $answer = 'TRUE';
    $q = "SELECT active FROM ".$table." WHERE login='".$l."'" ;
    $res = ms_query_simple($q);
    if($res[0]['active'] == 0){
        $ERROR = '{"ERROR":"'.$falser['r4'].'"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        $answer = 'FALSE';
    }else{
        $ERROR = '{"ACCEPT":"Пользователь является Активным"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
    }
    $FieldsArrEVENT['subordinate'] = $_POST['login'];
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
    sendDateToDBLog($FieldsArrEVENT);
    return $answer;
}
function isFirstAuthUser($l){
    global $table,$falser,$FieldsArrEVENT;
    $answer = 'TRUE';
    $q = "SELECT first_auth FROM ".$table." WHERE login='".$l."'" ;
    $res = ms_query_simple($q);
    if($res[0]['first_auth'] == 1){
        $ERROR = '{"ERROR":"'.$falser['r5'].'"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        $answer = 'FALSE';
    }else{
        $ERROR = '{"ERROR":"Первая авторизация проведена"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
    }
    $FieldsArrEVENT['subordinate'] = $_POST['login'];
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
    sendDateToDBLog($FieldsArrEVENT);
    return $answer;
}
function getUserDB($l){
    global $table,$FieldsArrEVENT;
    $answer = 'TRUE';
    $q = "SELECT id FROM ".$table." WHERE login='".$l."'";
    $res = ms_query_simple($q);
    if(count($res[0])>0){
        $ERROR = '{"ACCEPT":"Запрос ID существования пользователя '.$l.'"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
    }else{
        $ERROR = '{"ERROR":"Запрос ID несуществовующего пользователя '.$l.'"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        $answer = 'FALSE';
    }
    $FieldsArrEVENT['subordinate'] = $l;
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($l);
    sendDateToDBLog($FieldsArrEVENT);
    return $answer;
}

function isAdmin($l){
    global $table,$FieldsArrEVENT;
    $answer = 'TRUE';
    $q = "SELECT admin FROM ".$table." WHERE login='".$l."'";
    $res = ms_query_simple($q);
    if($res[0]['admin'] == 0){
        $ERROR = '{"ERROR":"Пользователь '.$l.' НЕ АДМИНИСТРАТОР"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        $answer = 'FALSE';
    }else{
        $ERROR = '{"ACCEPT":"Пользователь '.$l.' АДМИНИСТРАТОР"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
    }
    $FieldsArrEVENT['subordinate'] = $l;
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($l);
    sendDateToDBLog($FieldsArrEVENT);
    return $answer;
}

function checkSESSIONUserValid(){
    global $table,$FieldsArrEVENT;
    $l = $_SESSION['login'];
    $q = "SELECT session_hash FROM ".$table." WHERE login='".$l."'";
    $eq = ms_query_simple($q);
    $session_hash = decrypt($_SESSION['session_hash']);
    if(isset($_SESSION['session_hash']) && $_SESSION['session_hash']!=""){
        $res['have'] = 'TRUE';
    }else{
        $res['have'] = 'FALSE';
    }
    if($_SESSION['session_hash'] === $eq[0]['session_hash']){
        $res['accord'] = 'TRUE';
    }else{
        $res['accord'] = 'FALSE';
    }
    if($session_hash > time()){
        $res['timely'] = 'TRUE';
    }else{
        $res['timely'] = 'FALSE';
    }
    return $res;
}

function getUserSESSION(){
    $session_hash = decrypt($_SESSION['session_hash']);
    //echo $session_hash." - ".time()." = ".($session_hash-time());
    $gap = time() - $session_hash;
    if($gap > 0){
        return 'FALSE';
    }else{
        return 'TRUE';
    }
}

function blockingUser($l){
    global $table,$FieldsArrEVENT;
    $q = "UPDATE ".$table." SET blocking = 1 WHERE login='".$l."'";
    ms_query_simple($q);
    $login = 'system';
    $ERROR = '{"ACCEPT":"Блокировка СИСТЕМОЙ пользователь '.$l.' "}';
    $FieldsArrEVENT['aftermath'] = $ERROR;
    $FieldsArrEVENT['initiator'] = $login;
    $FieldsArrEVENT['id_init'] = getUserSIOPRID($login);
    $FieldsArrEVENT['subordinate'] = $l;
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($l);
    sendDateToDBLog($FieldsArrEVENT);
}

function getUserLog($id){
    global $FieldsArrEVENT;
    $q = "SELECT event,initiator, CONVERT(NVARCHAR(30), event_time, 120) event_time,aftermath, subordinate,content, id_init, id_sub FROM users_events_report WHERE id_sub='".$id."' OR id_init='".$id."'";
    //echo $q; die();
    $res = ms_query_simple($q);
    $res = array_reverse($res);
    //echo "<pre>"; print_r($res); echo "</pre>";die();
    $ERROR = '{"ACCEPT":"Запрос СОБЫТИЙ пользователя '.$res[0]['subordinate'].' по ID_инициатора и ID_подчиненного "}';
    $FieldsArrEVENT['aftermath'] = $ERROR;
    $FieldsArrEVENT['subordinate'] = $res[0]['subordinate'];
    $FieldsArrEVENT['id_sub'] = $id;
    sendDateToDBLog($FieldsArrEVENT);
    return $res;
}

function getUserSIOPR($id){
    global $table,$failed_auth,$FieldsArrEVENT;
    $q = "SELECT * FROM ".$table." WHERE id='".$id."'";
    $res = ms_query_simple($q)[0];
    $ERROR = '{"ACCEPT":"Запрос данных пользователя '.$res[0]['login'].' по ID "}';
    $FieldsArrEVENT['aftermath'] = $ERROR;
    $FieldsArrEVENT['subordinate'] = $res[0]['login'];
    $FieldsArrEVENT['id_sub'] = $id;
    sendDateToDBLog($FieldsArrEVENT);
    return $res;
}

function checkPass($l,$p){
    global $table,$failed_auth,$FieldsArrEVENT;
    $q = "SELECT * FROM ".$table." WHERE login='".$l."'";
    $res = ms_query_simple($q);
    $hash = hashGenerator($p);
    if($hash === $res[0]['hash']){
        if($res[0]['failed_auth'] >= $failed_auth){
            $ERROR = '{"ACCEPT":"Повторная попытка авторизации ЗАБЛОКИРОВАННОГО пользователя '.$l.' "}';
            $FieldsArrEVENT['aftermath'] = $ERROR;
            $FieldsArrEVENT['subordinate'] = $l;
            $FieldsArrEVENT['id_sub'] = getUserSIOPRID($l);
            sendDateToDBLog($FieldsArrEVENT);
            die('Ваша учетная запись заблокирована, обратитесь в техподдержку');
        };
        $qi = "UPDATE ".$table." SET failed_auth = 0 WHERE login='".$l."'";
        $ans = 'TRUE';
    }else{
        if($res[0]['failed_auth'] >= $failed_auth){
            blockingUser($l);
            die('Учетная запись заблокирована');
        };
        $try = ($res[0]['failed_auth']+1);
        $ERROR = '{"ERROR":"неудачная '.$try.' попытка авторизации пользователя '.$l.' "}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        $FieldsArrEVENT['content'] = $p;
        $FieldsArrEVENT['subordinate'] = $l;
        $FieldsArrEVENT['id_sub'] = getUserSIOPRID($l);
        sendDateToDBLog($FieldsArrEVENT);
        $qi = "UPDATE ".$table." SET failed_auth = ".$try." WHERE login='".$l."'";
        $ans = 'FALSE';
    }
    ms_query_simple($qi);
    return $ans;
}
function GetIP() {
    global $table,$FieldsArrEVENT;
    $l = $_SESSION['login'];
    $ip = "/ ";
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip .= "CI_".$_SERVER['HTTP_CLIENT_IP']." / ";
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip .= "XF_".$_SERVER['HTTP_X_FORWARDED_FOR']." / ";
    } elseif(!empty($_SERVER['REMOTE_ADDR'])) {
        $ip .= "RA_".$_SERVER['REMOTE_ADDR']." / ";
    } else {
        $ip = 'FALSE';
    }
    $ERROR = '{"ACCEPT":"IP адрес пользователя '.$l.'"}';
    $FieldsArrEVENT['aftermath'] = $ERROR;
    $FieldsArrEVENT['content'] = $ip;
    $FieldsArrEVENT['subordinate'] = $_SESSION['login'];
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_SESSION['login']);
    sendDateToDBLog($FieldsArrEVENT);
    $q = "UPDATE ".$table." SET user_ip ='".$ip."' WHERE login='".$l."'";
    ms_query_simple($q);
    return $ip;
}

function validUser_RecordUpdater($l){
    global $table,$FieldsArrEVENT;
    $q = "SELECT counter_auth,hash_validity FROM ".$table." WHERE login='".$l."'";
    $res = ms_query_simple($q);
    $minute = 60;
    $houer = $minute * 60;
    $day = $houer * 24;
    $time_sdvig = $houer * $res[0]['hash_validity'];
    $real_time = (time() + $time_sdvig);
    $en = encrypt($real_time);
    $_SESSION['session_hash'] = $en;

    $q = "UPDATE ".$table." SET counter_auth =".($res[0]['counter_auth']+1).", session_hash = '".$en."' WHERE login='".$l."'";
    ms_query_simple($q);

    $ERROR = '{"ACCEPT":"УДАЧНАЯ АВТОРИЗАЦИЯ ПОЛЬЗОВАТЕЛЯ '.$l.'"}';
    $FieldsArrEVENT['aftermath'] = $ERROR;
    $FieldsArrEVENT['content'] = $l;
    $FieldsArrEVENT['subordinate'] = $l;
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($l);
    sendDateToDBLog($FieldsArrEVENT);

}
function checkUser($arrPost, $type = false){
    global $falser;
    $t = preg_match("/^[a-zа-яA-ZА-Я\d]+\s*[a-zа-яA-ZА-Я\d]+$/u", trim($arrPost["login"]));

    if($t === false){
        echo "В логине содержатся недопустимые символы";
        $_POST = [];
        session_destroy();
        die();
    }

    if($arrPost['login'] != '' && $arrPost['password'] != ''){
        $log = $arrPost['login'];
        $pass = $arrPost['password'];
    }else{
        return "Забыли что то ввести";
    }
    $res['r1'] = getUserDB($log); // 1 - существует ли пользователь
    $res['r2'] = getUserSESSION(); // 2 - активен ли пользователь сейчас
    $res['r3'] = isBlockUser($log); // 3 - не заблокирован ли пользователь
    $res['r4'] = isActiveUser($log); // 4 - активирован ли пользователь
    $res['r5'] = isFirstAuthUser($log); // 5 - первый вход
    $res['r6'] = isAdmin($log); // 6 - админ
    $res['r7'] = checkPass($log,$pass); // 7 - проверка пароля
    $res['r8'] = GetIP(); // IP пользователя
    if($type){
        return $res;
    }
//    echo "<pre>"; print_r($res); echo "</pre>";die();
    // вывод ошибок
    $outer = "";
    foreach ($res as $k => $val){
        if($k != 'r5' && $k != 'r6' && $k != 'r2') {
            if ($val == 'FALSE') {
                $outer = $falser[$k];
                break;
            }else{
                $_SESSION['login'] = $arrPost['login'];
                $_SESSION['verified'] = 1;
                $outer = "clear";
            }
        }elseif($k == 'r5' && $val == 'FALSE'){
            $outer = "first_auth";
            break;
        }
        if($res['r6'] == 'TRUE'){
            $_SESSION['login'] = $arrPost['login'];
            $_SESSION['verified'] = 1;
            $outer = "ready";
        }
    }
    validUser_RecordUpdater($arrPost['login']);
    return $outer;
}
function getAllUsers(){
    global $table,$FieldsArrEVENT;
    $q = "select id,login,active,blocking,first_auth,failed_auth from ".$table." ORDER BY login ASC ";
    $res = ms_query_simple($q);
    $ERROR = '{"ACCEPT":"Запрос всех пользователей"}';
    $FieldsArrEVENT['aftermath'] = $ERROR;
    $FieldsArrEVENT['subordinate'] = 'ALL_USERS';
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID('ALL_USERS');
    sendDateToDBLog($FieldsArrEVENT);
    return $res;
}
function checkUserIsAdmin($l){
    global $FieldsArrEVENT;
    $res['r1'] = getUserDB($l); // 1 - существует ли пользователь
    $res['r2'] = getUserSESSION(); // 2 - активен ли пользователь сейчас
    $res['r3'] = isBlockUser($l); // 3 - не заблокирован ли пользователь
    $res['r4'] = isActiveUser($l); // 4 - активирован ли пользователь
    $res['r5'] = isFirstAuthUser($l); // 5 - первый вход
    $res['r6'] = isAdmin($l); // 6 - админ

    //UpdateUserFrom1C();//die();

    $ERROR = '{"ACCEPT":"Проверка пользователя на наличие прав АДМИНИСТРАТОРА"}';
    $FieldsArrEVENT['aftermath'] = $ERROR;
    $FieldsArrEVENT['subordinate'] = $l;
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($l);
    sendDateToDBLog($FieldsArrEVENT);

    return $res;
}
if(!isset($_POST['ID'])){
    global $FieldsArrEVENT;
    echo checkUser($_POST, false);
    $ERROR = '{"START":"Начало проверки пользователя"}';
    $FieldsArrEVENT['aftermath'] = $ERROR;
    $FieldsArrEVENT['subordinate'] = $_POST['login'];
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
    sendDateToDBLog($FieldsArrEVENT);
}

