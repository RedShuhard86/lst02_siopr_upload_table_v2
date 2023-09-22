<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
require_once 'checkUser.php';

$ERROR = "";
$table = "users_siopr_auth";
$isAdm = isAdmin($_SESSION['login']);
$FieldsArrEVENT['event'] = "Изменения карточки пользователя: ".$_POST['login']." ";
$FieldsArrEVENT['initiator'] = $_SESSION['login'];
$FieldsArrEVENT['id_init'] = getUserSIOPRID($_SESSION['login']);
$FieldsArrEVENT['event_time'] = date("Ymd H:i:s");
checkPost($_POST);
if(isset($_POST['login']) && strlen($_POST['login']) >= 3){
    $l = $_POST['ID'];
    unset($_POST['ID']);
    if ($_POST['password'] != "" && $_POST['password'] != "123456" ){
        $che = checkStrongPassword($_POST['password']);
        if($che == 'FALSE'){
            $ERROR = '{"ERROR":"Слабый пароль. ПАРОЛЬ должен содержать не мение 8 символов: цифры, латинские буквы и как минимум один спецсимвол"}';
            $FieldsArrEVENT['aftermath'] = $ERROR;
            $FieldsArrEVENT['subordinate'] = $_POST['login'];
            $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
            sendDateToDBLog($FieldsArrEVENT);
            echo $ERROR;
            die();
        }
        $_POST['hash'] = hashGenerator($_POST['password']);
    }else{
        $_POST['first_auth'] = false;
        unset($_POST['password']);
    }
    if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $ERROR = '{"ERROR":"Укажиет почту"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        $FieldsArrEVENT['subordinate'] = $_POST['login'];
        $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
        sendDateToDBLog($FieldsArrEVENT);
        echo $ERROR;
        die();
    }
    unset($_POST['password']);
    $arrFilds = [];
    $arrVals = [];
    $str = "";
    $i=0;

    foreach ($_POST as $k=>$val){
        $trim = ", ";
        if($val == "on"){
            $val = 1;
        }
        if(!is_numeric($val)){
            $val = "'".$val."'";
        }
        if($i>=(count($_POST)-1)){
            $trim = "";
        }
        $str .= "[".$k."] = ".$val.$trim;

        $i++;
    }
    $str .= ",[failed_auth] = 0";
    $q = "UPDATE ".$table." SET $str WHERE id='".$l."'";
    //echo $q;die();
    ms_query_simple($q);

    if($_POST['GUID_OKRUG'] != ""){
        $ERROR = '{"ACCEPT":"Округ изменён на '.getRealOkrug($_POST['GUID_OKRUG']).'"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        $FieldsArrEVENT['subordinate'] = $_POST['login'];
        $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
        sendDateToDBLog($FieldsArrEVENT);
    }
    if($_POST['GUID_RAYON'] != ""){
        $ERROR = '{"ACCEPT":"Район изменён на '.getRealRayon($_POST['GUID_RAYON']).'"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        $FieldsArrEVENT['subordinate'] = $_POST['login'];
        $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
        sendDateToDBLog($FieldsArrEVENT);
    }
    $q = "UPDATE xx_users SET Okrug = '".$_POST['GUID_OKRUG']."', rayon = '".$_POST['GUID_RAYON']."', role = '".$_POST['role']."' WHERE User_name = '".$_POST['login']."'" ;

    ms_query_simple($q);
    $ERROR = '{"ACCESS":"Изменения приняты"}';
    $FieldsArrEVENT['aftermath'] = $ERROR;
    $FieldsArrEVENT['subordinate'] = $_POST['login'];
    $FieldsArrEVENT['content'] = json_encode($_POST,JSON_UNESCAPED_UNICODE);
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
    sendDateToDBLog($FieldsArrEVENT);
}else{
    $ERROR = '{"ERROR":"Не введены ВАЖНЫЕ параметры"}';
    $FieldsArrEVENT['aftermath'] = $ERROR;
    $FieldsArrEVENT['subordinate'] = $_POST['login'];
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
    sendDateToDBLog($FieldsArrEVENT);
}
echo $ERROR;
