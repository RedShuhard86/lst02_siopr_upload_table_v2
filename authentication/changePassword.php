<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
require($_SERVER['DOCUMENT_ROOT'].'/authentication/functions.php');

$FieldsArrEVENT['event']="Cмена пароля";
$FieldsArrEVENT['initiator'] = $_SESSION['login'];
$FieldsArrEVENT['id_init'] = getUserSIOPRID($_SESSION['login']);
$FieldsArrEVENT['event_time'] = date("Ymd H:i:s");
function changePassword($arr,$ses){
//    echo "<pre>"; print_r($ses); echo "</pre>";die();
    $FieldsArrEVENT['subordinate'] = $ses['login'];
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($ses['login']);
    global $FieldsArrEVENT;
    $table = "users_siopr_auth";
    $q = "SELECT hash FROM ".$table." WHERE id = ".$arr['id'];
    $res = ms_query_simple($q);
    $hash = hashGenerator($arr['pass']);
    if($hash === $res[0]['hash']){
        $ERROR = '{"ACCEPT":"Старые пароли совпали"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        sendDateToDBLog($FieldsArrEVENT);
        $hash1 = hashGenerator($arr['pass1']);
        $hash2 = hashGenerator($arr['pass2']);
        if($hash1 === $hash2 && $hash!==$hash1 && $hash !== $hash2 && $arr['pass1']!=="" && $arr['pass2']!==""){
            $ERROR = '{"ACCEPT":"Новые пароли совпали и не соответствуют старым"}';
            $FieldsArrEVENT['aftermath'] = $ERROR;
            $FieldsArrEVENT['content'] = "Старый пароль ".$arr['pass'];
            sendDateToDBLog($FieldsArrEVENT);
            $q = "UPDATE ".$table." SET hash = '".$hash2."', first_auth = 0, failed_auth = 0 WHERE id=".$arr['id']." AND login = '".$ses['login']."'";
//            echo $q;
            ms_query_simple($q);
            echo "ACCEPT";
            session_destroy();
        }else{
            $ERROR = '{"ERROR":"Новые пароли пусты или НЕ совпали или соответствуют старому"}';
            $FieldsArrEVENT['aftermath'] = $ERROR;
            sendDateToDBLog($FieldsArrEVENT);
            echo $ERROR;
            die();
        }
    }else{
        $ERROR = '{"ERROR":"Старый пароль неверен"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        $FieldsArrEVENT['content'] = "Введён неверный пароль ".$_POST['pass'];
        sendDateToDBLog($FieldsArrEVENT);
        echo $ERROR;
        die();
    }
}
changePassword($_POST,$_SESSION);