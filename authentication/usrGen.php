<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
//require($_SERVER['DOCUMENT_ROOT'].'/authentication/template/header.php');
require($_SERVER['DOCUMENT_ROOT'].'/authentication/functions.php');

$FieldsArrEVENT['event']="Создание нового пользоваетля";
$FieldsArrEVENT['initiator'] = $_SESSION['login'];
$FieldsArrEVENT['id_init'] = getUserSIOPRID($_SESSION['login']);
$FieldsArrEVENT['event_time'] = date("Ymd H:i:s");
//echo "<pre>"; print_r($_POST); echo "</pre>";die();

checkPost($_POST);
if(isset($_POST['login']) && strlen($_POST['login']) >= 3){

    $q = "SELECT id FROM ".$table." WHERE login = '".$_POST['login']."'";
    $res = ms_query_simple($q);
    if(count($res) > 0){
        $ERROR = '{"ERROR":"Пользователь с таким логином уже существует"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        $FieldsArrEVENT['subordinate'] = $_POST['login'];
        $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
        sendDateToDBLog($FieldsArrEVENT);
        echo $ERROR;
        die();
    }
    $q = "SELECT id FROM ".$table." WHERE mail = '".$_POST['mail']."'";
    $res = ms_query_simple($q);
    if(count($res)>0){
        $ERROR = '{"ERROR":"Пользователь с такой почтой уже существует"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        $FieldsArrEVENT['subordinate'] = $_POST['login'];
        $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
        sendDateToDBLog($FieldsArrEVENT);
        echo $ERROR;
        die();
    }

    if(!isset($_POST['password']) || strlen($_POST['password']) <= 0){
        $ERROR = '{"ERROR":"пароль пустой"}';
        $FieldsArrEVENT['aftermath'] = $ERROR;
        $FieldsArrEVENT['subordinate'] = $_POST['login'];
        $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
        sendDateToDBLog($FieldsArrEVENT);
        echo $ERROR;
        die();
    }
    if ($_POST['password'] != "123456"){
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
        $_POST['first_auth'] = 1;
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
    $_POST['hash'] = hashGenerator($_POST['password']);
    unset($_POST['password']);
    $arrFilds = [];
    $arrVals = [];
    foreach ($_POST as $k=>$val){
        if($val == ""){
            continue;
        }
        $arrFilds[] = $k;
        if($val == "on"){
            $val = 1;
        }
        if(!is_numeric($val)){
            $val = "'".$val."'";
        }
        $arrVals[] = $val;
    }
    $q = "INSERT INTO ".$table." (".implode(",",$arrFilds).") VALUES (".implode(",", $arrVals).")";
    ms_query_simple($q);
    $q = "INSERT INTO xx_users (User_name,Okrug,rayon,role) VALUES ('".$_POST['login']."','".$_POST['GUID_OKRUG']."','".$_POST['GUID_RAYON']."','".$_POST['role']."' )";
    ms_query_simple($q);
    $FieldsArrEVENT['aftermath'] = $ACCEPT =  '{"ACCEPT":"Создан пользователь '.$_POST['login'].'"}';
    $FieldsArrEVENT['subordinate'] = $_POST['login'];
    $FieldsArrEVENT['id_sub'] = getUserSIOPRID($_POST['login']);
    sendDateToDBLog($FieldsArrEVENT);
}else{
    $ERROR = '{"ERROR":"Не введены ВАЖНЫЕ параметры"}';
}
echo $ERROR;