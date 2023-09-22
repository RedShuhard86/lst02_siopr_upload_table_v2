<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php'; // подключение к MS_SQL
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/params_init.php'; // параметры конкретного сервера
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/curl_init.php'; // только CURL
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/auth_init.php'; // только для сдачи авторизации
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/report_init.php'; // Функции для отчетов
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/report_xlsx_vue.php'; // Функции для отчетов
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/karpov_init.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/xlsxgenerator/function_xlsx.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/test_php.php'; // Функции для теста

/* проверялка SQL запросов (простая) */
function sqlCheker($arr){
    $arrVariantTID = ["xx_", "form_", "all_form", "_union_" ];
    $flag = false;
    if(count(explode(" ",trim($arr['TableID'])))>1){
        die("ИНЪЕКЦИЯ 0");
    }
    if(strlen($arr['TableID'])>0) {
        foreach ($arrVariantTID as $val) {
            $pos = strpos($arr['TableID'], $val,0);
            if (strlen($pos)>0){
                $flag = true;
                break;
            }
        };
        if($flag == false){
            die("ИНЪЕКЦИЯ 1");
        }
    }
    $arrNoVariantHEADER = ["(",")"];
    if(strlen($arr['params']['headers'])>0) {
        foreach ($arrNoVariantHEADER as $vall) {
            $pos = strpos($arr['params']['headers'], $vall, 0);
            if (strlen($pos)>0){
                die("ИНЪЕКЦИЯ 2");
            }
        }
    }
    $arrYesVariantWHERE = ["cast(", "isnull(", "and(", "or(","not(","(1=1)"];
    $arrNoVariantWHERE = ["(",")"];
    if(strlen($arr['params']['where']) > 0) {
        $testSTR = substr(trim(str_replace(" ","",$arr['params']['where'])),1,null);
//        echo " 1: ".$testSTR."<br>";
        $testSTR1 = $testSTR;
        foreach ($arrYesVariantWHERE as $word){
            $testSTR1 = str_replace($word,"",$testSTR1);
        }
//        echo " 2: ".$testSTR1."<br>";

        $pos = strpos($testSTR1, $arrNoVariantWHERE[0], 0);
        if (strlen($pos)>0){
            die("УРА");
        }

    }
    $arrVariantLJ = ["xx_", "form_", "all_form", "_union_"];
    $arrNoVariantLJ = ["(", ")"];
    if(strlen($arr['params']['left_join'])>0){
        $testSTR = substr(trim(str_replace(" ","",$arr['params']['left_join'])),1,null);
//        echo " 1: ".$testSTR."<br>";
        $testSTR1 = $testSTR;
        foreach ($arrVariantLJ as $word){
            $testSTR1 = str_replace($word,"",$testSTR1);
        }
//        echo " 2: ".$testSTR1."<br>";
        $pos = strpos($testSTR1, $arrNoVariantLJ[0], 0);
        if (strlen($pos)>0){
            die("УРА2");
        }
    }
}

function translit($str){
    global $arrAlfabit;
    $arrString = mb_str_split($str);
    $resStr = "";
    foreach ($arrString as $char){
        $resStr .= $arrAlfabit[$char];
    }
    return $resStr;
}
function getTovarIerarh(){
    $q = "SELECT * dbo.xx_pb_Tovary_v_ie";
    $res = ms_query_simple($q);
    return json_decode($res,true);
}
function getCoordinat($txt){
    $address = "http://ehpd.mos.ru/services/publish/search_2gis?format=mobile&count=1&spatialOutEPSG:4326&text=".urlencode($txt);
    $res = file_get_contents($address);
    if(strlen($txt)<3){
        return  '{"ERROR":"Строка адреса пуста"}';
    }else {
        return $res;
    }
}
function get1cError($txt){
    $file = $_SERVER['DOCUMENT_ROOT']."/log/".$txt;
    $handle = fopen($file,"r");
    $contents = fread($handle, filesize($file));
    $arrText = explode("-=0=-",$contents);
    $max = count($arrText);
    $arrRes = [];
    foreach ($arrText as $k=>$val){
        if($k > ($max-10)) {
            $arrRes[] = str_replace(["\r",'\"'],["<br>",'"'],$val);
        }
    }
    return json_encode($arrRes,JSON_UNESCAPED_UNICODE);
}
function getSQLError($date){
    $file = $_SERVER['DOCUMENT_ROOT']."/log/".$date."_sql_log.txt";
    $handle = fopen($file,"r");
    $contents = fread($handle, filesize($file));
    $arrText = explode("--- === ---",$contents);
    $max = count($arrText);
    $arrRes = [];
    foreach ($arrText as $k=>$val){
        if($k > ($max-10)) {
            $arrRes[] = str_replace(["\r",'\"'],["<br>",'"'],$val);
        }
    }
    return json_encode($arrRes,JSON_UNESCAPED_UNICODE);
}
function getRole($us = ""){
    $user = getUser();
    if($us == ""){
        $q = "select top 1 ([role]) from xx_users xu where user_name = '".$user['log']."'" ;
    }elseif ($us == "all_roles"){
        $q = "select DISTINCT ([role]) from xx_users xu where user_name ='".$user['log']."'";
    }
    //echo $q;
    $res = ms_query_simple($q);
    $func = " 'getRole': ";
    checkSQL($res,$func.$q);
    return json_encode($res, JSON_UNESCAPED_UNICODE);
}


function setDashboard(){
    $role = json_decode(getRole(),true)[0];

    $wt = getFileTypeWT($role['role']);
    if(strlen($wt)<=0){
        $wt = "";
    }
    return $wt;
}
function getFileTypeWT($rol){
    $arrSpis = [
        "NTO" => "NTO.php",
        "STO_ALL" => "STO.php",
        "STO_BYT" => "BytovoeObsluzhivanie.php",
        "STO_CONTROL" => "Rukovodstvo.php",
        "STO_PYT" => "ObshchestvennoePitanie.php",
        "STO_RYNK" => "RoznichnyeRynki.php",
        "UGU" => "RoznichnyeRynki.php",
        "STO_YAR_VD" => "YArmarkiVyhodnogoDnya.php",
        "STO_YAR" => "YArmarkiVyhodnogoDnya2.php",
        "STO_KAT" => "Category.php",
        "STO_RIT" => "clearWT.php",
        "STO_OPT" => "dashboard-opt-blue.php",
        "STO_PROD_BEZ" => "ProdBezopasnost.php",
        "ALL" => "Uprava.php",
        "UPRAVA" => "Uprava.php",
        "PREF" => "Prefektura.php",
        "STO_ARMPRED" => "",
        "GBU_YAR_1" => "new_1st_full.php",
        "GBU_YAR_2" => "new_2st_full.php"
    ];
    if($rol == 'GBU_YAR_2' || $rol == 'GBU_YAR_1'){
        $r = bidCompany();
        if($r['Result']){
            return "new_1st_full.php";
        }else{
            return "new_2st_full.php";
        }
    }
    return $arrSpis[$rol];
}

function checkSQL($arr, $con = ""){
    if ($arr === false && CH === true) {
        die(formatErrors(sqlsrv_errors(),date("Y-m-d H:i:s").$con));
    }
}
function setSqlError($data){
    $user = getUser();
    $file = $_SERVER['DOCUMENT_ROOT']."/log/".date('Y-m-d')."_".$user['log']."_sql_log.txt";
    file_put_contents($file,$data, FILE_APPEND);
}
function set1cError($data){
    $user = getUser();
    $file = $_SERVER['DOCUMENT_ROOT']."/log/".date("Y-m-d")."_".$user['log']."_log.txt";
    file_put_contents($file,"-=0=-\n\r".implode("\r\n",$data)."\n\r", FILE_APPEND);
}

function setAllActions($data){
    $user = getUser();
    $file = $_SERVER['DOCUMENT_ROOT']."/log/action/".date("Y-m-d")."_".$data['TYPE']."_".$user['log']."_log.txt";
    file_put_contents($file,"-=".date("Y-m-d H:i:s")."=-\n\r".implode("\r\n",$data)."\n\r", FILE_APPEND);
}

function getUserID(){
    $user = getUser();
    $q = "select id from xx_users where user_name = '".$user['log']."'";
    $res = ms_query_simple($q);
    $func = " 'getUserID': ";
    checkSQL($res,$func.$q);
    return $res[0]['id'];
}
function getUserOptions($arr){
    $user = getUserID();
    $form_id = $arr['TableID'];
    $q = "select * from xx_form_user_defaults where form_id = '".$form_id."' and user_id = '" . $user. "'";
    $res = ms_query_simple($q);
    $func = " 'getUserOptions': ";
    checkSQL($res,$func.$q);

    return json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);
}
function pusherToSIOPRForButton($arrJson){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $res = curlCombain($url,$arrJson,[]);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}

function getDatINS($str,$trim=".",$sort="top"){
//    echo $str." ".$trim." ".$sort;
    $arrRes = explode($trim, trim($str));
    if($arrRes[0] >= "4000"){
        $arrRes[0] = (int)$arrRes[0] - 2000;
    }
    if($sort == "top") {
        $strDat = $arrRes[2] . $arrRes[1] . $arrRes[0];
    }elseif($sort == "DB"){
        $strDat = $arrRes[2] .".". $arrRes[1] .".". $arrRes[0];
    }else{
        $strDat = $arrRes[0] . $arrRes[1] . $arrRes[2];
    }
//    echo $strDat;
    return $strDat;
}
function getDatRangINS($str, $trim=".", $sort="top"){
    $sort = "top";
    $arr = explode("-",trim($str));
    $res = [];
    foreach ($arr as $value){
        $res[] = getDatINS($value,$trim,$sort);
    }
    if($sort == "DB"){
        return implode(":",$res);
    }else{
        return implode("-",$res);
    }
}

function SetDataToSIOPR($host_api, $arrJson){
    $res = curlCombain($host_api,$arrJson,[],true);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}
function getTopBorderMenu($arr){
    $q = "select dbo.get_form_upper(".$arr['TableID'].") as js1";
    $res = ms_query_simple($q);
    $func = " 'getTopBorderMenu': ";
    checkSQL($res,$func.$q);
    return $res[0]['js1'];
}
function getVisibleTopBorderMenu($arr){
    $q = "select dbo.get_form_visible(".$arr['TableID'].") as js1";
    $res = ms_query_simple($q);
    $func = " 'getVisibleTopBorderMenu': ";
    checkSQL($res,$func.$q);
    return $res[0]['js1'];
}
function getMandatoryTopBorderMenu($arr){
    $q = "select dbo.get_form_req(".$arr['TableID'].") as js1";
    $res = ms_query_simple($q);
    $func = " 'getMandatoryTopBorderMenu': ";
    checkSQL($res,$func.$q);
    return $res[0]['js1'];
}
function getEditableTopBorderMenu($arr){
    $q = "select dbo.get_form_edit(".$arr['TableID'].") as js1";
    $res = ms_query_simple($q);
    $func = " 'getEditableTopBorderMenu': ";
    checkSQL($res,$func.$q);
    return $res[0]['js1'];
}

function getRelForm($arr){
    $q = "SELECT * FROM dbo.get_rel_form_type_rec (".$arr['params']['form'].", ".$arr['params']['col'].", '".$arr['params']['type']."') as js1";
    $res = ms_query_simple($q,FROM_NEW_DB);
    $func = " 'getRelForm': ";
    checkSQL($res,$func.$q);
    if(count($res)<0){
        $res[0]['rel_form_id'] = 'NULL';
    }
    return $res[0]['rel_form_id'];
}

/* ДЛЯ ВЛАДА */
function getList($arr){
    /*
	1 - 280623 - SELECT TOP 20 * для "_un" заменил на SELECT *
	2 - 280623 - Для "_un" добавил в запрос переменную $limit
	*/
    if(!is_array($arr)){
        $q = "select dbo.get_uid_form (N'".$arr."', '') as js1";
        $res = ms_query_simple($q,FROM_NEW_DB);
        $func = " 'getList_1': ";
        checkSQL($res,$func.$q);
        $arr['TableID'] = $res[0]['js1'];
    }
    $whr = $arr['params']['where'];
    if(strlen($whr)<=0 || $whr == "a_4120859 = ''"){
        $whr = "1=1";
    }
    $px = substr($arr['TableID'],0,3);

    $limit = "ORDER BY 1 offset 0 ROWS FETCH NEXT 50 ROWS ONLY";
    if($arr['params']['notlimit']){
        $limit = "";
    }
    $nam = $arr['params']['value_column'];
    if(strlen($nam)<=0){
        $nam = "[__Naimenovanie]";
    }
    $q = "";

    $header = "*";
        if(strlen($arr['params']['headers'])>0){
            $header = $arr['params']['headers'];
        }
    if($px == "xx_"){
        $q = "SELECT *, dbo.xx_getid([_Ssylka]) as [_Ssylka], ".$nam." as [value]  FROM ".$arr['TableID']." WHERE ".$whr." ".$limit;
    }elseif ($px == "_un"){
        $q = "SELECT *, ([_Ssylka]) as [_Ssylka], ".$nam." as [value]  FROM ".$arr['TableID']." WHERE ".$whr." ".$limit;;
    }else{
        $q = "SELECT *, ([_Ssylka]) as [_Ssylka], ".$nam." as [value]  FROM ".$arr['TableID']." WHERE ".$whr." ".$limit;
    }
    //echo  $q;die();
    $res = ms_query_simple($q);
    $func = " 'getList_2': ";
    checkSQL($res,$func.$q);
    $str = json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);
    //echo $str;
    return $str;
}
function getListBig($arr){
    $nam = $arr['params']['value_column'];
    if(strlen($nam)<=0){
        $nam = "[__Naimenovanie]";
    }
    $headers = $arr['params']['headers'];
    $left_join = $arr['params']['left_join'];
    $where = $arr['params']['where'];
    $q = "select * , ".$nam." as [value] from ( select ".$headers." from ".$arr['TableID']." a0 ".$left_join." ) a where ".$where;
    $res = ms_query_simple($q);
    $func = " 'getListBig': ";
    checkSQL($res,$func.$q);
    $str = json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);
    return $str;
}
function getAddressListMap($arr){
    if(strlen($arr['params']['standart']) <= 0){
        $ulica = "%".trim($arr['params']['ulica'])."%";
        $dom = "";
        $priznakVladeniya = "";
        if(strlen($arr['params']['dom']) > 0){
            $dom = " and a_575213 = '" . $arr['params']['dom'] . "'";
//        $dom = " and a.[_PredstavlenieDoma] = '" . $arr['params']['dom'] . "'";
        }
        if(strlen($arr['params']['priznakVladeniya']) > 0){
            $priznakVladeniya = " and a_575206 = '" .$arr['params']['priznakVladeniya'] . "'";
//        $priznakVladeniya = " and a.[_PriznakVladeniya] = '" .$arr['params']['priznakVladeniya'] . "'";
        }

        $q = "select a_575212 as [_Predstavlenie], a_575213 as [_PredstavlenieDoma], a_575201 as [_ID], a_575202 as [_Okrug], a_575202_Ssylka as [_Okrug_Ssylka],a_575203 as [_Rayon], a_575203_Ssylka as [_Rayon_Ssylka], a_575204 as [_Ulitsa], a_575204_Ssylka as [_Ulitsa_Ssylka], a_575205 as [_Dom], a_575206 as [_PriznakVladeniya] from form_30171_v where a_575212 like '" . $ulica . "'" . $dom . $priznakVladeniya;

    }else{
        $strWhere = "%".str_replace([" "],["%"],trim($arr['params']['address']))."%";
        $q = "select a_575212 as [_Predstavlenie], a_575213 as [_PredstavlenieDoma], a_575201 as [_ID], a_575202 as [_Okrug], a_575202_Ssylka as [_Okrug_Ssylka],a_575203 as [_Rayon], a_575203_Ssylka as [_Rayon_Ssylka], a_575204 as [_Ulitsa], a_575204_Ssylka as [_Ulitsa_Ssylka], a_575205 as [_Dom], a_575206 as [_PriznakVladeniya] from form_30171_v where a_575212 like '" . $strWhere . "'";
    }

//    echo $q;
    $res = ms_query_simple($q,FROM_NEW_DB);
    $func = " 'getAddressList': ";
    checkSQL($res,$func.$q);
//    echo "<pre>"; print_r($res); echo "</pre>";
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}

function getAddressList($arr){
    $strWhere = "%".str_replace([" "],["%"],trim($arr['params']['address']))."%";
    $unom = $arr['params']['unom'];
    if(strlen($unom)<=0) {
        //$q = "select dbo.xx_getid([_Okrug]) as [_Okrug],dbo.xx_getid([_Rayon]) as [_Rayon],dbo.xx_getid([_Ulitsa]) as [_Ulitsa],_PredstavlenieDoma,_Predstavlenie, _ID from xx_dt_BTIAdresnyyReestr a where a.[_Predstavlenie] like '" . $strWhere . "'";
        $q = "select dbo.xx_getid([_Okrug]) as [_Okrug],dbo.xx_getid([_Rayon]) as [_Rayon],dbo.xx_getid([_Ulitsa]) as [_Ulitsa],_PredstavlenieDoma,_Predstavlenie, _ID from xx_dt_BTIAdresnyyReestr a where a.[_Predstavlenie] like '" . $strWhere . "' and a.[_Arkhivnyy] = 0 ";
    }else{
        $q = "select dbo.xx_getid([_Okrug]) as [_Okrug],dbo.xx_getid([_Rayon]) as [_Rayon],dbo.xx_getid([_Ulitsa]) as [_Ulitsa],_PredstavlenieDoma,_Predstavlenie, _ID from xx_dt_BTIAdresnyyReestr a where _ID = ".(int)$unom;
    }
//    echo $q;
    $res = ms_query_simple($q,FROM_NEW_DB);
    $func = " 'getAddressList': ";
    checkSQL($res,$func.$q);
//    echo "<pre>"; print_r($res); echo "</pre>";
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}
function getURLMapFromSiopr($arr){
    /*
	1 - 070723 - теперь feature_id приходит массивом
	*/
    $user = getUser();
    if(strlen($arr['params']['UID'])<=0){
        $arr['params']['UID'] = "00000000-0000-0000-0000-00000000000";
    }
    $host_api = MAIN_IP_FOR_GET_DATA . "getmapinfo/" . $arr['params']['UID'];
    //echo $host_api;
    $address = "10.15.48.3";
    $str_v= base64_encode($arr['params']['vid']);
    $str_u = base64_encode($user['log']);
    $arrHeader = ['xx_vid: ' . $str_v, 'xx_user_name: ' .$str_u];
    $resCurl = curlGetCombain($host_api,[],$arrHeader);

    if($resCurl['info'] != 400) {
        $res = json_decode($resCurl['answer'], true);
        $strUrl = '{"url":"http://'.$address.'/egip/index.html?session=' . $res["session"] . '&layer_id=' . $res["layer_id"] . '&layer_revision_id=current&feature_id=' . implode(',',$res["feature_id"]) . '"}';
        return $strUrl;
    }else{
        return '{"ERROR":"ОШИБКА"}';
    }
}

function getMapSession($arr){

    $user = getUser();
    if(strlen($arr['params']['UID'])<=0){
        $arr['params']['UID'] = "00000000-0000-0000-0000-00000000000";
    }
    $host_api = MAIN_IP_FOR_GET_DATA . "getmapinfo/" . $arr['params']['UID'];

    $str_v= base64_encode($arr['params']['vid']);
    $str_u = base64_encode($user['log']);
    $arrHeader = ['xx_vid: ' . $str_v, 'xx_user_name: ' .$str_u];
    $resCurl = curlGetCombain($host_api,[],$arrHeader);

    if($resCurl['info'] != 400) {
        $res = json_decode($resCurl['answer'], true);
        return '{"SESSION":"'.$res["session"].'"}';
    }else{
        return '{"ERROR":"ОШИБКА"}';
    }
}

function getMapInfo(){
    $user = getUser();
    $host_api = MAIN_IP_FOR_GET_DATA_MAP . "get/userdata";
    $str_u = translit($user['log']);
    $arrHeader = ['X-Api-Login: ' .$str_u];
    $resCurl = curlGetCombain($host_api,[],$arrHeader);
    if($resCurl['info'] != 400) {
        return $resCurl['answer'];
    }else{
        return '{"ERROR":"ОШИБКА"}';
    }
}

function getMenu(){
    $role = getRole();
    $q = "select xm.text_js from xx_menus xm where menu_name ='".$role."'";
    $res = ms_query_simple($q);
    $func = " 'getMenu_1': ";
    checkSQL($res,$func.$q);
    if(count($res)<=0){
        $q = "select xm.text_js from xx_menus xm where menu_name = 'ALL'";
        $res = ms_query_simple($q);
        $func = " 'getMenu_2': ";
        checkSQL($res,$func.$q);
    }
    return $res[0]['text_js'];
}

function isDir($str, $cat){
    $strDir = $_SERVER['DOCUMENT_ROOT'].'/upload/'.$cat.'/';
    if (!is_dir($strDir.$str)) {
        mkdir($strDir.$str, 0755);
        chmod($strDir.$str, 0755);
    }
}
function isDirRotation($strAdr){
    $arr = array_values(array_diff(explode("/",str_replace("..","",$strAdr)),[""]));
    $root = $_SERVER['DOCUMENT_ROOT']."/";
    foreach($arr as $fil){
        $root .= $fil."/";
        if (!is_dir($root)) {
            mkdir($root, 0755);
            chmod($root, 0755);
        }
    }
}


function getMinPromTorgInfo($arr){
    $UID = $arr['params']['UID'];
    $arrJson = [
        "Сервис" => "СведенияВМинпромторг",
        "Параметры" => [
            [
                "Ключ" => "Элемент",
                "Значение" => "Справочники.дт_СведенияВМинпромторг.".$UID
            ],
            [
                "Ключ" => "Период",
                "Значение" => date("Ymd")
            ]
        ]
    ];
    $root = $_SERVER['DOCUMENT_ROOT'].'/upload/docs/';
    $obj = "минпромторг";
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";

    $res = curlCombain($url,$arrJson,[]);

    $header_size = $res['info_size'];
    $header = substr($res['answer'], 0, $header_size);
    $body = substr($res['answer'], $header_size);
    $pos_start = strpos($header,'filename=');
    $pos_stop = strpos($header,'X-Powered-By:');
    $f_nam = mb_substr($header,$pos_start+strlen('filename=')+1,$pos_stop - $pos_start - strlen('X-Powered-By:'));
    $format = explode(".",$f_nam);
    $format[0] = time();
    isDir($obj,'docs');
    $saveto = $root.$obj.'/'.$format[0].'.'.$format[1];
    $fp = fopen($saveto, 'x');
    if (fwrite($fp, $body)) {
//        echo "Файл создан";
    } else {
//        echo "Что то пошло не так";
    }
    fclose($fp);
    return '{"url":"http://'.$_SERVER['SERVER_NAME'].'/upload/docs/' . $obj.'/'.$format[0].'.'.$format[1].'"}';

//    pusherToSIOPRForButton($arrJson);
}

/* выбор действий по кнопкам */
function getCustomADDFile($arr){
    $ID = $arr['params']['GroupID'];
    if($ID=="") {
        $ID = $arr['params']['TableID'];
    }
    if($ID == "a_46102899"){
        echo button_a_46102899($arr);
    }elseif($ID == "a_46102898"){
        echo button_a_46102898($arr);
    }elseif ($ID == "a_3209"){
        echo button_a_3209($arr);
    }elseif ($ID == "a_8965"){
        echo button_a_8965($arr);
    }elseif ($ID == "a_3214"){
        echo button_a_3214($arr);
    }elseif ($ID == "a_5080"){
        echo button_a_5080($arr);
    }elseif ($ID == "a_24288"){
        echo button_a_24288($arr);
    }elseif($ID == "a_delete_svz_nto"){

    }
}
function button_a_24288($arr){
    $UID = $arr['params']['UID'];
    $arrJson = [
        "Сервис" => "ПрисвоитьНомерДоговору",
        "Параметры" => [
            [
                "Ключ" => "НТО",
                "Значение" => "Справочники.дт_НестационарныеТорговыеОбъекты.".$arr['params']['SelectRows']['a_3179_Ssylka']
            ],
            [
                "Ключ" => "Организация",
                "Значение" => "Справочники.Организации.".$arr['params']['SelectRows']['a_3274_Ssylka']
            ],
            [
                "Ключ" => "Договор",
                "Значение" => "Справочники.дт_Договоры.".$UID
            ]
        ]
    ];

    $res = pusherToSIOPRForButton($arrJson);
    $res = trim(str_replace(['"','}','{'],['','',''],explode(":",$res)[1]));
    return '{"UID":"updatefield", "PARAMS":{"a_3186": "'.$res.'"}}';
}
function button_a_5080($arr){
    $arrResult['a_3182'] = $arr['params']['SelectRows']['a_5069'];
    $arrResult['a_3181'] = $arr['params']['SelectRows']['a_5070'];

    $arrResult['a_3216'] = $arr['params']['SelectRows']['a_5076'];
    $arrResult['a_3211'] = $arr['params']['SelectRows']['a_5076'];

    $arrResult['a_3183'] = $arr['params']['SelectRows']['a_5069'];
    $arrResult['a_3183_Ssylka'] = $arr['params']['UID'];

    $arrResult['a_3179'] = $arr['params']['SelectRows']['a_5068'];
    $arrResult['a_3179_Ssylka'] = $arr['params']['SelectRows']['a_5068_Ssylka'];

    if($arr['params']['SelectRows']['a_5081'] == 0){
        $arrResult['a_3180'] = "Результат аукциона (Победитель)";
        $arrResult['a_3180_Ssylka'] = "11f9098c-fea2-4da3-aabf-a0b4f0cc9c76";
        $arrResult['a_3279'] = $arr['params']['SelectRows']['a_5077'];
        $arrResult['a_3279_Ssylka'] = $arr['params']['SelectRows']['a_5077_Ssylka'];
    }else{
        $arrResult['a_3180'] = "Результат аукциона (2-е место)";
        $arrResult['a_3180_Ssylka'] = "4f37f2de-3242-4417-a49b-7c60751e8284";
        $arrResult['a_3279'] = $arr['params']['SelectRows']['a_5078'];
        $arrResult['a_3279_Ssylka'] = $arr['params']['SelectRows']['a_5078_Ssylka'];
    }

    $arrProto = [
        "UID" => "insert",
        "json" => [0=>$arrResult]
    ];
    return json_encode($arrProto,JSON_UNESCAPED_UNICODE);
}
function button_a_3214($arr){
    $UID = $arr['params']['UID'];
    $arrJson = [
        "Сервис" => "РассчитатьСуммуДоговора",
        "Параметры" => [
            [
                "Ключ" => "Договор",
                "Значение" => "Справочники.дт_Договоры.".$UID
            ]
        ]
    ];
    $res = pusherToSIOPRForButton($arrJson);
    $num = (float)explode(":",$res)[1];
    return '{"UID":"updatefield", "PARAMS":{"a_3215": "'.$num.'"}}';
}



function button_a_8965($arr){
    $UID = $arr['params']['UID'];
    $arrJson = [
        "Сервис" => "ИсключитьИзСхемыРазмещения",
        "Параметры" => [
            [
                "Ключ" => "НТО",
                "Значение" => "Справочники.дт_НестационарныеТорговыеОбъекты.".$UID
            ]
        ]
    ];
    pusherToSIOPRForButton($arrJson);
    return '{"UID":"update"}';
}

/*  */

function button_a_3209($arr){
    $UID = $arr['params']['UID'];
    $arrJson = [
        "Сервис" => "СоздатьПланОплат",
        "Параметры" => [
            [
                "Ключ" => "Договор",
                "Значение" => "Справочники.дт_Договоры.".$UID
            ]
        ]
    ];
    $res = pusherToSIOPRForButton($arrJson);
//    echo "<pre>"; print_r($res); echo "</pre>";
    return '{"UID":"updategroup","PARAMS":[46102970, 46102969]}';
}

/* ДОБАВЛЕНИЕ ЗАМЕЧАНИЙ */

function button_a_46102898($arr){
    $UID = $arr['params']['UID'];
    $arrValue = $arr['params']['SelectRows'];
    $arrJson = [
        "Сервис" => "ОбновитьРегистрСведений",
        "Параметры" => [
            [
                "Ключ" => "#Имя",
                "Значение" => "кс_ДоработкиСТО"
            ],
            [
                "Ключ" => "ДатаЗамечания",
                "Значение" => getDatINS($arrValue["a_14057"],"-","top")
            ],
            [
                "Ключ" => "Комментарий",
                "Значение" => $arrValue["a_14110"]
            ],[

                "Ключ" => "КонтрольныйСрок",
                "Значение" => getDatINS($arrValue["a_14111"],"-","top")
            ],
            [

                "Ключ" => "Объект",
                "Значение" => "Справочники.дт_СтационарныеТорговыеОбъекты.".$UID
            ],[

                "Ключ" => "Ответственный",
                "Значение" => "Справочники.Пользователи.".$arrValue['a_14112_Ssylka']
            ],[

                "Ключ" => "Период",
                "Значение" =>  getDatINS($arrValue["a_14111"],"-","top")
            ],[

                "Ключ" => "Статус",
                "Значение" => "Справочники.кс_СтатусыКатегорирования.".$arrValue['a_14056_Ssylka']
            ]
        ]
    ];

    $res = pusherToSIOPRForButton($arrJson);
//    echo "<pre>"; print_r($res); echo "</pre>";
}

/* УДАЛЕНИЕ СВЯЗАННЫХ СТО */
function a_delete_svz_nto($arr){
    $UID = $arr['params']['UID'];
    $val = $arr['params']['SelectRows']['vid'];
    $arrJson = [
        "Сервис" => "УдалитьИзРегистраСведений",
        "Параметры" => [
            [
                "Ключ" => "#Имя",
                "Значение" => "кс_СвязанныеСТО"
            ],
            [
                "Ключ" => "Владелец",
                "Значение" => "Справочники.дт_СтационарныеТорговыеОбъекты.".$UID
            ],
            [
                "Ключ" => "СТО",
                "Значение" => "Справочники.дт_СтационарныеТорговыеОбъекты.".$val
            ]

        ]
    ];
    $res = pusherToSIOPRForButton($arrJson);

}

/* ДОБАВЛЕНИЕ СВЯЗАННЫХ СТО */
function button_a_46102899($arr){
    $UID = $arr['params']['UID'];
    foreach ($arr['params']['SelectRows'] as $val) {
        $arrJson = [
            "Сервис" => "ОбновитьРегистрСведений",
            "Параметры" => [
                [
                    "Ключ" => "#Имя",
                    "Значение" => "кс_СвязанныеСТО"
                ],
                [
                    "Ключ" => "Владелец",
                    "Значение" => "Справочники.дт_СтационарныеТорговыеОбъекты.".$UID
                ],
                [
                    "Ключ" => "СТО",
                    "Значение" => "Справочники.дт_СтационарныеТорговыеОбъекты.".$val
                ]

            ]
        ];
        $res = pusherToSIOPRForButton($arrJson);
//        echo "<pre>"; print_r($res); echo "</pre>";
    }
}

function setGrantToSIOPR($arr){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = [
        "Сервис" => "ГрантыЮридическимЛицамJsonЗагрузить",
        "Параметры" => [
            [
                "Ключ" => "JSON",
                "Значение" => base64_encode(str_replace(["\\"],["@@"], str_replace(['\"'],[''],$arr)))
            ]
        ]
    ];
    $res = curlCombain($url,$arrJson);
    return '{"UID":"'.$res['answer'].'"}';
}
function setGosuslugaSIOPR($arr){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = [
        "Сервис" => "СоздатьЗаявкуПоГосУслуге",
        "Параметры" => [
            [
                "Ключ" => "ГосУслуга",
                "Значение" => $arr['params']['usluga']
            ],[
                "Ключ"=>"XMLBase64",
                "Значение"=>base64_encode($arr['params']['content_xml'])
            ]
        ]
    ];
    return curlCombain($url,$arrJson);;
}
function setMejVedSIOPR($arr){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = [
        "Сервис" => "ЗагрузитьXMLМежВед",
        "Параметры" => [
            [
                "Ключ"=>"XMLBase64",
                "Значение"=>base64_encode($arr['params']['content_xml'])
            ]
        ]
    ];
    return curlCombain($url,$arrJson);;
}

function getECP($arr){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = [
        "Сервис" => "ПолучитьЭЦПФайла",
        "Параметры" => [
            [
                "Ключ" => "#Имя",
                "Значение" => $arr['params']['fileType']
            ]
        ]
    ];
    $arrHeader[] = "Content-Type: text/xml; charset=utf8";
    $edit = curlCombain($url,$arrJson,$arrHeader,true,true);
    $header_size = $edit['info_size'];
    $header = substr($edit['answer'], 0, $header_size);

    $arrHeaders = get_headers_from_curl_response($header);
    $arrResFN = [];
    if(!isset($arrHeaders['filename'])){
        $arrProto = explode(";",$arrHeaders['Content-Disposition']);
        foreach ($arrProto as $strProto){
            $resStr = explode("=",$strProto);
            $arrResFN[trim($resStr[0])]=trim(str_replace('"','',$resStr[1]));
        }
    }

    $body = substr($edit['answer'], $header_size);
    $f_nam = urldecode($arrResFN['filename']);

    $format = explode(".", $f_nam);
    $format[0] = $format[0]."_".time();

    $root = $_SERVER['DOCUMENT_ROOT'].'/upload/docs/dav';
    $root_2 = 'http://'.URL_ADDRESS.'/upload/docs/dav';
    if(strlen($format[1])<=2 || strlen($format[1])>4){
        $format[1] = "xlsx";
    }
    $saveto = $root.'/ECP'.date("Y-m-d_H-i-s").'_'.$format[0].'.'.$format[1];
    $saveto_2 = $root_2.'/ECP'.date("Y-m-d_H-i-s").'_'.$format[0].'.'.$format[1];
    $fp = fopen($saveto, 'w');
    if (fwrite($fp, $body)) {
//        echo "Файл создан";
    } else {
//        echo "Что то пошло не так";
    }

    fclose($fp);

    if($edit['info']==200) {
        return '{"url":"' . $saveto_2 . '","UID":"'.urldecode($arrHeaders['xx_guid']).'"}';
    }else{
        return '{"ERROR":"Файл ЭЦП е найден"}';
    }
}
function getPrintForm($arr){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $ecp = false;
    if(isset($arr['params']['ecp'])) {
        $ecp = $arr['params']['ecp'];
    }

    $arrJson = [
        "Сервис" => "ПолучитьПечатнуюФорму",
        "Параметры" => [
            [
                "Ключ" => "#Имя",
                "Значение" => $arr['params']['name']
            ],
            [
                "Ключ" => "#Объект",
                "Значение" => $arr['params']['object']
            ],
            [
                "Ключ" => "ИмяФормыМакета",
                "Значение" => $arr['params']['name_plan']

            ],
            [
                "Ключ" => "Задача",
                "Значение" => $arr['params']['uid_task']
            ],
            [
                "Ключ" => "ИмяПечатнойФормы",
                "Значение" => $arr['params']['form_name']
            ],
            [
                "Ключ" => "Комментарий",
                "Значение" => $arr['params']['comment']
            ],
            [
                "Ключ" => "Причина",
                "Значение" => $arr['params']['reason']
            ],
            [
                "Ключ"=>"ЭЦП",
                "Значение"=>$ecp,
            ],
            [
                "Ключ"=>"СерийныйНомер",
                "Значение"=>$arr['params']['serialNumber'],
            ],
            [
                "Ключ"=>"ДатаНачала",
                "Значение"=>$arr['params']['dateTo'],
            ],
            [
                "Ключ"=>"ДатаОкончания",
                "Значение"=>$arr['params']['dateFrom'],
            ],
            [
                "Ключ"=>"Субъект",
                "Значение"=>$arr['params']['subject'],
            ]
        ]

    ];
//    echo json_encode($arrJson,JSON_UNESCAPED_UNICODE);die();

    $arrHeader[] = 'Expect:';
    $edit = curlCombain($url,$arrJson,$arrHeader,true,true);

    $header_size = $edit['info_size'];

    $header = substr($edit['answer'], 0, $header_size);
//    echo $header;die();
    $arrHeaders = get_headers_from_curl_response($header);
//    echo "<pre>"; print_r($arrHeaders); echo "</pre>";die();
    $arrResFN = [];
    if(!isset($arrHeaders['filename'])){
        $arrProto = explode(";",$arrHeaders['Content-Disposition']);
        foreach ($arrProto as $strProto){
            $resStr = explode("=",$strProto);
            $arrResFN[trim($resStr[0])]=trim(str_replace('"','',$resStr[1]));
        }
    }
    $body = substr($edit['answer'], $header_size);
    $f_nam = urldecode($arrResFN['filename']);
//    echo $f_nam;die();
    $format = explode(".", $f_nam);
    $format[0] = $format[0]."_".time();

    $root = $_SERVER['DOCUMENT_ROOT'].'/upload/docs/dav';
    $root_2 = 'http://'.URL_ADDRESS.'/upload/docs/dav';

//    if(strlen($format[1])<=2 || strlen($format[1])>4){
//        $format[1] = "xlsx";
//    }
    $saveto = $root.'/i'.date("Y-m-d_H-i-s").'_'.$format[0].'.'.$format[1];
    $saveto_2 = $root_2.'/i'.date("Y-m-d_H-i-s").'_'.$format[0].'.'.$format[1];
    $fp = fopen($saveto, 'w');
    if (fwrite($fp, $body)) {
//        echo "Файл создан";
    } else {
//        echo "Что то пошло не так";
    }

    fclose($fp);

    if($edit['info']==200) {
        return '{"url":"' . $saveto_2 . '","UID":"'.urldecode($arrHeaders['xx_guid']).'"}';
    }else{
        return '{"ERROR":"Формирование печатной формы недоступно"}';
    }
}
function getCurrentTask($arr){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = [
        "Сервис" => "ПолучитьТекущуюЗадачу",
        "Параметры" => [
            [
                "Ключ" => "#Имя",
                "Значение" => $arr['params']['name']
            ],
            [
                "Ключ" => "#Объект",
                "Значение" => $arr['params']['object']
            ]
        ]
    ];
    $res = json_decode(curlCombain($url,$arrJson)['answer'],true);
    return $res['Result']['Задача'];
}

function setSysPredToSIOPR($arr){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = [
        "Сервис" => "ЗагрузкаСистемообразующихПредприятий",
        "Параметры" => [
            [
                "Ключ" => "XLSX",
                "Значение" => base64_encode(str_replace(["\\"],["@@"], str_replace(['\"'],[''],$arr)))
            ]
        ]
    ];
    $res = curlCombain($url,$arrJson);
    return '{"UID":"'.$res['answer'].'"}';
}

function getDataFromSIOPR_TEMP($arr){

    $arrReturnJSON = [];
    if(!isset($arr['params']['VID'])) {
        $q = "select top 1 form_name_1C from xx_forms where id = " . $arr['TableID'];
        $nam = ms_query_simple($q);
        $func = " 'getDataFromSIOPR_TEMP': ";
        checkSQL($nam,$func.$q);

    }else{
        $nam[0]['form_name_1C'] = $arr['params']['VID'];
    }

    $rep['params']['UID'] = $arr['params']['UID'];
    $rep['params']['GroupID'] = $arr['params']['VID'];
    $rep['adres'] = $arr['params']['GroupId'];

    $cat = "../upload/docs/".$nam[0]['form_name_1C']."/".$arr['params']['UID']."/".$arr['params']['GroupId'];
    $cat_in = "/upload/docs/".$nam[0]['form_name_1C']."/".$arr['params']['UID']."/".$arr['params']['GroupId'];
//    echo $cat_in;
    foreach (scandir($cat) as $item){
        if(!($item == '.') && !($item == '..') ) {
            $stat = stat($cat. "/" . $item);
            $arrReturnJSON[] = [
                'f_vol' => "",
                'src' => 'http://'.URL_ADDRESS.$cat_in. "/" . $item,
                'url' => 'http://'.URL_ADDRESS.$cat_in. "/" . $item,
                'tab_id' => "",
                '__Naimenovanie' => "",
                '_Avtor' => "",
                '_Rasshirenie' => "",
                '_Razmer' => $stat['size'],
                'date' => date("Y-m-d",$stat['creation_date'])
            ];
        }
    }
    return json_encode($arrReturnJSON);
}

function getPhotoFromSIOPR_v1($arr){
    $guid = $arr['params']['UID'];
    $url = MAIN_IP_FOR_GET_DATA."getfileguids/".$guid;
    $vid = base64_encode($arr['params']['VID']);
    $arrHeader =  ['xx_vid: ' . $vid];
    $res = curlGetCombain($url,[],$arrHeader);

    $arrPhotoUID = json_decode($res['answer'],true);
//    echo "<pre>"; print_r($arrPhotoUID); echo "</pre>";die();
    $rArr['params']['GroupID'] = $arr['params']['VID'];
    foreach ($arrPhotoUID as $k => $val){
        $rArr['params']['UID'] = $val['guid'];
        $address = json_decode(getFilePathFromSIOPR($rArr)['answer'],true)['path'];
        $arrPhotoUID[$k]['address'] = str_replace('\\', '/', $address);
        $arrPhotoUID[$k]['file_vid'] = $val['file_vid'];
        $arrPhotoUID[$k]['monitoring_rpn'] = $val['monitoring_rpn'];
        $arrPhotoUID[$k]['priznak'] = $val['priznak'];
        $arrPhotoUID[$k]['address'] = str_replace('//'.FTP_ROOT_NAME.'/Files/', '', $arrPhotoUID[$k]['address']);
    }
//    echo "<pre>"; print_r($arrPhotoUID); echo "</pre>";die();
    return $arrPhotoUID;
}

function getFileFromFTP($arr){

    $jsonRes = getPhotoFromSIOPR_v1($arr);

    if(count($jsonRes) <= 0){
        return;

    }
    $arrFtp =[
        "type"=>"ftp://",
        "user"=>"USRFTP",
        "pass"=>"Qmswrt18P",
        "address" => FTP_ADDRESS,
        "path" => "",
    ];
    $cat_in = "../upload/docs/all/";
    $cat = $cat_in.$arr['params']['VID']."/".$arr['params']['UID']."/";
    isDirRotation($cat);
    $arrReturnJSON = [];
    $conn = ftp_connect($arrFtp['address']);
    ftp_raw($conn, "OPTS UTF8 ON");
    ftp_login($conn, $arrFtp['user'], $arrFtp['pass']);
    ftp_pasv($conn, TRUE);
    foreach($jsonRes as $server_file){

        $url = $server_file['address'];
        $file_size = ftp_size($conn, $url);
        if ($file_size == -1){
            continue;
        }

        $name = str_replace(["-"," ",":"],"",$server_file['name']."_".$server_file['creation_date']).".".$server_file['extension'];
        $numFile = $cat.$name;
        $stat = stat($numFile)['size'];
        if(file_exists($numFile) && $stat > 0 ){
            $arrReturnJSON[] = [
                'src' => 'https://'.URL_ADDRESS.str_replace("..","",$numFile),
                'url' => 'https://'.URL_ADDRESS.str_replace("..","",$numFile),
                'tab_id' => "",
                '__Naimenovanie' => $server_file['name'],
                '_Avtor' => $server_file['author'],
                '_Rasshirenie' => $server_file['extension'],
                '_Razmer' => $server_file['size'],
                'date' => $server_file['creation_date'],
                'file_vid' => $server_file['file_vid'],
                'monitoring_rpn' => $server_file['monitoring_rpn'],
                'priznak' => $server_file['priznak'],
                'eds' => $server_file['eds'],
                'uid' => $server_file['guid']
            ];
            continue;
        }

        $fp = fopen($numFile, 'w');
        //echo $url;
        if(ftp_fget($conn, $fp, $url, FTP_BINARY,0)){
            //echo "ура<br>";
        }else{
            //echo "бля<br>";
            //echo "<pre>ftp_get"; print_r(error_get_last()); echo "</pre>";
        };
        $arrReturnJSON[] = [
            'src' => 'https://'.URL_ADDRESS.str_replace("..","",$numFile),
            'url' => 'https://'.URL_ADDRESS.str_replace("..","",$numFile),
            'tab_id' => "",
            '__Naimenovanie' => $server_file['name'],
            '_Avtor' => $server_file['author'],
            '_Rasshirenie' => $server_file['extension'],
            '_Razmer' => $server_file['size'],
            'date' => $server_file['creation_date'],
            'file_vid' => $server_file['file_vid'],
            'monitoring_rpn' => $server_file['monitoring_rpn'],
            'priznak' => $server_file['priznak'],
            'eds' => $server_file['eds'],
            'uid' => $server_file['guid']
        ];
    }
    ftp_close($conn);
    return json_encode($arrReturnJSON);
}
function getPhotoFromSIOPR($arr){
    $guid = $arr['params']['UID'];
    $url = MAIN_IP_FOR_GET_DATA."getfileguids/".$guid;
    $vid = base64_encode($arr['params']['VID']);
    $arrHeader = ['xx_vid: ' . $vid];
    $res = curlGetCombain($url,[],$arrHeader);
    $arrPhotoUID = explode(",", $res['answer']);
    $rArr['params']['GroupID'] = $arr['params']['VID'];
    $str = "";
//    echo "<pre>"; print_r($arrPhotoUID); echo "</pre>";
    foreach ($arrPhotoUID as $val){
        $rArr['params']['UID'] = trim(str_replace(['"',']','['],['','',''],$val));
        $str .= getFilePathFromSIOPR($rArr);
    }
//    echo "<pre>"; print_r($rArr); echo "</pre>";
    return $str;
}
function getFilePathFromSIOPR($arr){
    $url = MAIN_IP_FOR_GET_DATA."getfilepath/".$arr['params']['UID'];
    $vid = base64_encode($arr['params']['GroupID']);
    $arrHeader = ['xx_vid: ' . $vid];
    $res = curlGetCombain($url,[],$arrHeader);
    return $res;
}
function getDataFromSIOPR($arr){
    $root = $_SERVER['DOCUMENT_ROOT'].'/upload/docs/';
    $URL = URL_ADDRESS.'/upload/docs/';
    $url = MAIN_IP_FOR_GET_DATA . "getfile/" . $arr['params']['UID'];

    $vid = base64_encode($arr['params']['GroupID']);

    $arrHeader = ['xx_vid: ' . $vid];
    $res = curlCombain($url,[],$arrHeader);

    $header_size = $res['info_size'];
    $header = substr($res['answer'], 0, $header_size);
    $arrHeaders = get_headers_from_curl_response($header);
    $arrResFN = [];
    if(!isset($arrHeaders['filename'])){
        $arrProto = explode(";",$arrHeaders['Content-Disposition']);
        foreach ($arrProto as $strProto){
            $resStr = explode("=",$strProto);
            $arrResFN[trim($resStr[0])]=trim(str_replace('"','',$resStr[1]));
        }
    }
    if(isset($arrHeaders['filename'])) {
        $body = substr($res['answer'], $header_size);
        $f_nam = urldecode($arrHeaders['filename']);
        $format = explode(".", $f_nam);
        $saveto = $root . $arr['adres'] . '/' . $arr['params']['GroupID'] . '/' . $arr['params']['UID'] . '.' . $format[1];
        if(strlen($arr['adres'])<=0 || !isset($arr['adres'])){
            $saveto = $root. $arr['params']['GroupID'] . '/' . $arr['params']['UID'] . '.' . $format[1];
        }

        $fp = fopen($saveto, 'x');
        if (fwrite($fp, $body)) {
//        echo "Файл создан";
        } else {
//        echo "Что то пошло не так";
        }
        fclose($fp);
        return '{"url":"http://'.$URL.$arr['adres'].'/'.$arr['params']['UID'].'.'.$format[1].'"}';
    }else{
        return '{"ERROR":"НЕТ ФАЙЛОВ"}';
    }

//    }
}
/*  --- 1с END ---  */

function extractNewDateList($arr){

    $filter_id = 0;
    $headers = $arr['params']['headers'];

    /* КАСТЫЛИ  */

    if($arr['TableID'] == 40274){
        $q = "SELECT * FROM RequestsStatuses ORDER BY 1 offset 0 ROWS FETCH NEXT 50 ROWS ONLY";
        $res = ms_query_syntet_simple($q);
        $func = " 'DBO_RequestsStatuses': ";
        checkSQL($res,$func.$q);
        return json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);
    }
    if($arr['TableID'] == 40281){
        $data = $arr['params']['data'];
        if(strlen($arr['params']['data'])<6){
            $data = date("Ymd");
        }
        $headers = " * FROM dbo.form_40281_f(''".$data."'')";
        $filter_id = -11;
    }
    if($arr['TableID'] == 40288){
        $data = $arr['params']['data'];
        if(strlen($arr['params']['data'])<6){
            $data = date("Ymd");
        }

        $headers = " * FROM dbo.form_40288_f(''".$data."'')";
        $filter_id = -11;
    }
    if($arr['TableID'] == 40282){
        $data = $arr['params']['data'];
        $data2 = $arr['params']['data2'];
        if(strlen($arr['params']['data'])<6){
            $data = date("Ymd");
        }
        $headers = " * FROM dbo.form_40282_f(''".$data2."'',''".$data."'')";
        $filter_id = -11;
    }

    /* END */
    if($arr['mapinfo']){
        return;
    }
    $whr = $arr['params']['where'];

    $pg = $arr['params']['selectedPage'] . "," . $arr['params']['quantity'];
    if($arr['params']['quantity'] == "-1"){
        $pg = "";
    };

    if(strlen($headers)<=0){
        $headers = "*";
    }
    if (strlen($whr) <= 0) {
        $whr = "1=1";
    }
    if (strlen($pg) <= 1) {
        $pg = "";
    }

    $strOrder = "1"; // новое 25.01.22
    if(strlen($arr['params']['order']) > 0){
        $strOrder = $arr['params']['order'];
    }
    $strWhere = " '(" . $whr . ")' ";
    if(!isset($arr['params']['specific']) || $arr['params']['specific'] == "") {
        if(!$arr['params']['default']) {
            if ($filter_id == -11) {
                $arr['params']['filter_id'] = $filter_id;
            }
            $qJS = "select dbo.get_data_form_js_all_user(" . $arr['TableID'] . ", " . $strWhere . ", '" . $strOrder . "','" . $pg . "', '" . $headers . "'," . getUserID() . ",'" . $arr['params']['filter_id'] . "', '' )"; // новое решение, 13.07.2022 год
        }else {
            $qJS = "select dbo.get_data_form_js_all_user(" . $arr['TableID'] . ", " . $strWhere . ", '" . $strOrder . "','" . $pg . "', '" . $headers . "'," . getUserID() . ", " . $filter_id . ", '')";
        }
    }else{
        $filter_id = -1;
        if(isset($arr['params']['filter_id']) && (int)$arr['params']['filter_id'] > 0) {
            $filter_id = $arr['params']['filter_id'];
        }
        $qJS = "select dbo.get_data_form_js_all_user(" . $arr['TableID'] . ", " . $strWhere . ", '" . $strOrder . "','" . $pg  . "', '" . $headers . "',".getUserID().", ". $filter_id ." ,'".$arr['params']['left_join']."')";
    }
//    echo $qJS."\r";
//    die();
    $str = ms_query_js($qJS, FROM_NEW_DB);
    $res_str = '';
    foreach ($str[0] as $val) {
        $res_str = $val;
    }
//    echo $res_str;
//    die();
    $res = ms_query_simple($res_str, FROM_NEW_DB);
    $func = " 'extractNewDateList_3': ";
    checkSQL($res,$func.$res_str);
    return json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);
}

function extractNewData($arr)
{
    $pg = $arr['params']['selectedPage'] . "," . $arr['params']['quantity'];
    if (strlen($pg) <= 1) {
        $pg = "";
    }
    if (strlen($arr['params']['UID']) <= 0 && $arr['params']['UID'] != "00000000-0000-0000-0000-00000000000") {
        $strWhere = " '(1=1)' ";
    }elseif (strlen($arr['params']['UID']) > 0 && $arr['params']['UID'] == "00000000-0000-0000-0000-00000000000"){
        $q = "select * from form_".$arr['TableID']."_init()";
        $res = ms_query_simple($q);
        $func = " 'extractNewData_1': ";
        checkSQL($res,$func.$q);
        return json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);
    } else {
        $strWhere = "'[__key]=0 AND real__Ssylka = dbo.xx_getid_bin (''" . $arr['params']['UID'] . "'') AND (1=1)'";
    }

    $qJS = "select dbo.get_data_form_js(" . $arr['TableID'] . ", " . $strWhere . ", '1','" . $pg  . "')";
//    echo $qJS;
    $str = ms_query_js($qJS, FROM_NEW_DB);
    $res_str = '';
    foreach ($str[0] as $val) {
        $res_str = $val;
    }
    $res = ms_query_simple($res_str, FROM_NEW_DB);

    $func = " 'extractNewData_2': ";
    checkSQL($res,$func.$res_str);

    return json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);
}


/* временная формула, со временем убрать  */
function getAllValuesForExcellTable($arr){

    $whr = $arr['params']['where'];
    $pg = $arr['params']['selectedPage'].",".$arr['params']['quantity'];
    $headers = $arr['params']['headers'];
    if(strlen($whr)<=0){
        $whr = "1=1";
    }
    if(strlen($pg)<=1){
        $pg = "";
    }
    if(strlen($arr['params']['UID'])<=0){
        $strWhere = " '(".$whr.")' ";
    }else{
        $strWhere = "'[__key]=0 AND real__Ssylka = dbo.xx_getid_bin (''".$arr['params']['UID']."'') AND (".$whr.")'";
    }
    if(strlen($headers)<=0){
        $headers = "*";
        $qJS = "select dbo.get_data_form_js_all(" . $arr['TableID'] . ", " . $strWhere . ", '2','" . $pg  . "', '" . $headers . "' )"; // новое решение, 2022 год
    }else{
        $user = getUser();
        $q = "SELECT text_js FROM xx_form_user_filter WHERE user_name = '".$user['log']."' AND form_id = '".$arr['TableID']."'";
        $res = ms_query_simple($q);
        $func = " 'extractAllData': ";
        checkSQL($res,$func.$q);
        if(count($res)>0) {
            $qJS = "SELECT * FROM ( SELECT ".$headers." FROM all_form_".$arr['TableID']."_v_".getUserID()." a0 ".$arr['params']['left_join']." ) a WHERE ".$whr." ORDER BY 2";
        }else{
            $qJS = "SELECT * FROM ( SELECT ".$headers." FROM all_form_".$arr['TableID']."_v a0 ".$arr['params']['left_join']." ) a WHERE ".$whr." ORDER BY 2";
        }

        $res = ms_query_simple($qJS, FROM_NEW_DB);
        $func = " 'getAllValuesForExcellTable_1': ";
        checkSQL($res,$func.$qJS);
        return json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);
    }
    $str = ms_query_js($qJS,FROM_NEW_DB);

    $res_str = '';
    foreach ($str[0] as $val){
        $res_str = $val;
    }

    $res = ms_query_simple($res_str,FROM_NEW_DB);
    $func = " 'getAllValuesForExcellTable_2': ";
    checkSQL($res,$func.$res_str);
    return json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);
}
function extractValuesTable($arr){

    $whr = $arr['params']['where'];
    $pg = $arr['params']['quantity'].",".$arr['params']['selectedPage'];

    if(strlen($whr)<=0){
        $whr = "1=1";
    }
    if(strlen($pg)<=1){
        $pg = "";
    }
    if(strlen($arr['params']['UID'])<=0){
        $strWhere = " '(".$whr.")' ";
    }else{

        $strWhere = "'[__key]=0 AND [real__ssylka] = dbo.xx_getid_bin(''".$arr['params']['UID']."'') AND (".$whr.")'";
    }
    $qJS = "select dbo.get_data_form_group_js(".$arr['TableID'].",".$arr['params']['GroupID'].", ".$strWhere.", '1','".$pg."')";
    //echo $qJS;
    $str = ms_query_js($qJS,FROM_NEW_DB);
    $res_str = '';
    foreach ($str[0] as $val){
        $res_str = $val;
    }

    //echo $res_str;
    $res = ms_query_simple($res_str, FROM_NEW_DB);

    $func = " 'extractValuesTable': ";
    checkSQL($res,$func.$res_str);
    return json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);
}

function base64_url_encode($input) {
    return strtr(base64_encode($input), '+/=', '._-');
}

function deleteFile($arr){
    $address = str_replace("http://".URL_ADDRESS,"..",$arr['params']['url']);
    if(is_file($address)){
        unlink($address);
    }
}
function extractReportsManualSelect($arr){
    if(strlen($arr['params']['variant'])>0){
        return "";
    }else{
        $user = getUser();
        $q = "SELECT val_param FROM xx_reports_manual_select WHERE [user] = '".$user['log']."' AND [report_id] = ".$arr['TableID'];
        $res = ms_query_simple($q);
        return $res[0]['val_param'];
    }
}
function extractInfoReportsTable($arr, $type = false)
{
    /*
    1 - 110723 - добавил символ "_" в конце $table что бы все строки гарантированно оканчивались НЕ точкой
    */

    /* для получения GET параметров */
//    echo "<pre>"; print_r($arr); echo "</pre>";die();
    $url = $_SERVER['HTTP_REFERER'];
    parse_str(explode("?",$url)[1], $get);
    $q = "select top 1 form_name_1C from xx_reports where ID = ".$arr['TableID'];
    $nam = ms_query_simple($q);

    $func = " 'extractInfoReportsTable_1': ";
    checkSQL($nam, $func.$q);
    $arrAssoc = [
        "Дата" => "date",
        "СтандартныйПериод" => "date-range",
        "Строка" => "text",
        "Число" => "number",
//        "Булево" => "checkbox"
        "Булево" => "select"
    ];
    if(strlen($arr['params']['variant'])>0){
        $arr['params']['variant'] = ".".$arr['params']['variant'];
    }

    $table = base64_url_encode($nam[0]['form_name_1C'].$arr['params']['variant']);
    $arrResult = [];
    $prokladka = [];
    $host_api = MAIN_IP_FOR_GET_DATA . "getinfo/" .$table."_";
    //echo $host_api;
    $res = curlCombain($host_api,[],[],true);
    if($type == true) {
        echo "<pre>";
        print_r(json_decode($res['answer'],true));
        echo "</pre>";
        die();
    }
    $prokladka['headers'] = json_decode(str_replace(["name", "caption"], ["field", "headerName"], $res['answer']), true);
    $arrResult['info'] = $prokladka['headers']['Params'];
    $arrPrv = $prokladka['headers']['Params'];

    foreach ($arrPrv as $k => $val){
        $arrResult['info'][$k]['list_values'] = [];
        $arrResult['info'][$k]['value'] = "";
        $arrResult['info'][$k]['use_value'] = $val['Значение'];
        $arrResult['info'][$k]['name'] = $val['Заголовок'];
        $arrResult['info'][$k]['name_1c'] = $val['Имя'];
        $arrResult['info'][$k]['choice'] = $val['Отбор'];
        if(!isset($val['Отбор'])){
            $arrResult['info'][$k]['choice'] = true;
        }
        foreach ($arrAssoc as $kk => $r_val){
            if (count($val['Значения']) <= 0 && $r_val == "select" && $val['Тип'] == "Булево"){
                $arrV = [""=>"","Да"=>"Да","Нет"=>"Нет"];
                $i=0;
                if($val['Отбор']) {
                    foreach ($arrV as $kkk => $v) {
                        $arrResult['info'][$k]['list_values'][$i]['value'] = $kkk;
                        $arrResult['info'][$k]['list_values'][$i]['key'] = $v;
                        $i++;
                    }
                }else{
                    foreach ($arrV as $kkk => $v) {
                        if($kkk!="") {
                            $arrResult['info'][$k]['list_values'][$i]['value'] = $kkk;
                            $arrResult['info'][$k]['list_values'][$i]['key'] = $v;
                            $i++;
                        }

                    }
                }
            }
            if($val['Тип'] == $kk && count($val['Значения'])<=0) {
                $arrResult['info'][$k]['type'] = $r_val;
            }elseif (count($val['Значения']) > 0 && $r_val == "select"){
                $arrResult['info'][$k]['type'] = "select";
                $i=0;
                foreach ($val['Значения'] as $vall){
                    $arrResult['info'][$k]['list_values'][$i]['value'] = $vall['Value'];
                    $arrResult['info'][$k]['list_values'][$i]['key'] = $vall['Key'];
                    $arrResult['info'][$k]['list_values'][$i]['_Ssylka'] = $vall['Key'];
                    $arrResult['info'][$k]['list_values'][$i]['type'] = $vall['Type'];
                    $i++;
                }
            }
        }
        if(!$arrResult['info'][$k]['type'] && $val['Доступен'] == 1){

            $q = "select * from xx_report_unions where rep_id = ".$arr['TableID']." and par_name = N'".$val['Имя']."'" ;
            $resS = ms_query_simple($q);
            if(!count($resS)>0) {
                $arrResult['info'][$k]['type'] = "select";
                $q = "select dbo.get_table_form (N'" . $val['Тип'] . "', '') as js1";
                $res = ms_query_simple($q);
                $func = " 'getEditableTopBorderMenu_2': ";
                checkSQL($res, $func . $q);
                $arrResult['info'][$k]['table_sel'] = $res[0]['js1'];
            }else{
                $arrResult['info'][$k]['table_sel'] = $resS[0]['union'];
                $arrResult['info'][$k]['type'] = 'select';
            }
        }
        if($val['Доступен'] == 1){
            $arrResult['info'][$k]['editable'] = true;
        }elseif($val['Доступен'] != 1){
            $arrResult['info'][$k]['editable'] = false;
        }
        if($arrResult['info'][$k]['type'] == "checkbox"){
            $arrResult['info'][$k]['value'] = false;
        }
    }
//    echo "<pre>"; print_r($arrResult); echo "</pre>";die();
    return json_encode($arrResult);
}
function extractDataReportsTableEXCEL($arr){
    /*
    1 - 110723 - добавил символ "_" в конце $table что бы все строки гарантированно оканчивались НЕ точкой
    */
    $arrInfo = [];
    $i = 0;
    foreach ($arr['params']['info'] as $kk => $vall){

        $arrInfo[$i]['Ключ'] = $vall['name_1c'];
        $arrInfo[$i]['Значение'] = $vall['value'];

        if(($vall['_ssylka']!="" || $vall['_Ssylka']!="") && $vall['Тип'] != 'Булево' && false === is_array($vall['_ssylka']) && $vall['editable'] == true){
            $arrInfo[$i]['Значение'] = $vall['Тип'].".".$vall['_ssylka'];
        }elseif (($vall['_ssylka']!="" || $vall['_Ssylka']!="") && $vall['Тип'] != 'Булево' && false === is_array($vall['_ssylka']) && $vall['editable'] === false){
            $arrInfo[$i]['Значение'] = $vall['Значение'];
        }

        if ($vall['type'] == 'date' && $vall['editable'] == true) {
            $arrInfo[$i]['Значение'] = getDatINS($vall['value'],"-","down");
        }elseif ($vall['type'] == 'date' && $vall['editable'] === false){
            $arrInfo[$i]['Значение'] = $vall['Значение'];
        }

        if ($vall['type'] == 'checkbox' && $vall['Тип'] != "Булево" && $vall['editable'] == true) {
            $arrInfo[$i]['Значение'] = $vall['checked'];
        }elseif ($vall['type'] == 'checkbox' && $vall['editable'] === false){
            $arrInfo[$i]['Значение'] = $vall['Значение'];
        }
        if($vall['type'] == 'date-range' && $vall['editable'] == true){
            $arrInfo[$i]['Значение'] = getDatRangINS($vall['value'],".","down");
        }elseif ($vall['type'] == 'date-range' && $vall['editable'] === false){
            $arrInfo[$i]['Значение'] = $vall['Значение'];
        }

        if($vall['type'] == 'number' && $vall['editable'] == true){
            $arrInfo[$i]['Значение'] = (int)$vall['value'];
        }elseif ($vall['type'] == 'number' && $vall['editable'] === false){
            $arrInfo[$i]['Значение'] = $vall['Значение'];
        }
        if($vall['type'] == 'select' && false === is_array($vall['_ssylka']) && $vall['editable'] == true && $vall['Тип'] != "Булево"){

            foreach ($vall['list_values'] as $check){
                if($check['value'] == $vall['value']){
                    $arrInfo[$i]['Значение'] = $check['key'];
                    $arrInfo[$i]['Тип'] = $check['type'];
                    if(!isset($check['key'])){
                        $arrInfo[$i]['Значение'] = $vall['Тип'].".".$vall['_ssylka'];
                        if($vall['Тип'] == "Строка"){
                            $arrInfo[$i]['Значение'] = $vall['_ssylka'];
                        }
                    }
                }
            }

        }elseif(is_array($vall['_ssylka']) && $vall['type'] == 'select' && $vall['editable'] == true && $vall['Тип'] != "Булево"){
            $arrUid = [];
            foreach ($vall['_ssylka'] as $uid) {
                $pos = strpos($uid, $vall['Тип']);
                if ($pos === false && $vall['Тип'] != "Строка") {
                    $arrUid[] = $vall['Тип'] . "." . $uid;
                }else{
                    $arrUid[] = $uid;
                }

            }
            $arrInfo[$i]['Значение'] = $arrUid;
        }elseif($vall['type'] == 'select' && $vall['editable'] == false && $vall['Тип'] != "Булево"){
            $arrInfo[$i]['Значение'] = $vall['Значение'];
        }elseif($vall['type'] == 'select' && $vall['Тип'] == "Булево"){
            $arrInfo[$i]['Значение'] = $vall['selected_element']['value'];
        }
        $i++;

    }
    $resArrInfo = [];
    foreach ($arrInfo as $prop){
        if(!strpos(trim(str_replace(" ","",$prop["Значение"])),"10:00:00") && $prop["Значение"]!=""){
            $resArrInfo[]=$prop;
        }
    }

    $q = "select top 1 * /*form_name_1C*/ from xx_reports where id = ".$arr['TableID'];
    $nam = ms_query_simple($q);
    $func = " 'getEditableTopBorderMenu_2': ";
    checkSQL($nam,$func.$q);
    $arrResult = [];

    if(strlen($arr['params']['variant'])>0){
        $arr['params']['variant'] = ".".$arr['params']['variant'];
    }
    $table = base64_url_encode($nam[0]['form_name_1C'].$arr['params']['variant']);
    $host_api = MAIN_IP_FOR_GET_DATA . "getexcel/" .$table."_" ;
    $arrHeader = [];
    if(isset($arr['params']['format'])){
        $arrHeader = ['xx_format: ' . $arr['params']['format']];
    }
    $edit = curlCombain($host_api, $resArrInfo, $arrHeader,true,true);
    $header_size = $edit['info_size'];
    $header = substr($edit['answer'], 0, $header_size);
    $body = substr($edit['answer'], $header_size);
    $res = base64_decode($body);
    if(!is_array(json_decode($res, true))){
        $pos_start = strpos($header,'filename=');
        $pos_stop = strpos($header,'X-Powered-By:');
        $f_nam = mb_substr($header,$pos_start+strlen('filename=')+1,$pos_stop - $pos_start - strlen('X-Powered-By:'));
        $format = explode(".",$f_nam);
        $format[0] = $format[0]."_".time();
        $obj = "XLSX_1C";
        isDir($obj,'docs');
        $root = $_SERVER['DOCUMENT_ROOT'].'/upload/docs/';
        $root_2 = 'http://'.URL_ADDRESS.'/upload/docs/';
        if(strlen($format[1])<=2 || strlen($format[1])>4){

            $format[1] = "xlsx";
        }
        $saveto = $root.$obj.'/i'.date("Y-m-d_H:i:s").'.'.$format[1];
        $saveto_2 = $root_2.$obj.'/i'.date("Y-m-d_H:i:s").'.'.$format[1];
        $fp = fopen($saveto, 'w');
        if (fwrite($fp, $body)) {
//        echo "Файл создан";
        } else {
//        echo "Что то пошло не так";
        }

        fclose($fp);
        return '{"url":"'.$saveto_2.'"}';
    }else {
        $prokladka = json_decode($res, true);
        $arrResult['data'] = $prokladka['Structure'][0]['fields'];
        $arrResult['values'] = $prokladka['Data'];
        $arrResult['params'] = $prokladka['References'];
        $nam[0]['variant'] = $arr['params']['variant'];
        if (count($arrResult['values']) > 0) {
          //  xlsx_creator($arrResult, $nam, $arr['params']['info']);
        }
        return json_encode($arrResult, JSON_UNESCAPED_UNICODE);
    }
}
function extractDataReportsTable($arr){
    /*
    1 - 110723 - добавил символ "_" в конце $table что бы все строки гарантированно оканчивались НЕ точкой
    */
    $arrInfo = [];
    $i = 0;
    $test = "";
    //echo "<pre>"; print_r($arr['params']['info']); echo "</pre>";die();
    foreach ($arr['params']['info'] as $vall){

            $arrInfo[$i]['Ключ'] = $vall['name_1c'];
            $arrInfo[$i]['Значение'] = $vall['value'];
            if(($vall['_ssylka']!="" || $vall['_Ssylka']!="") && $vall['Тип'] != 'Булево' && false === is_array($vall['_ssylka']) && $vall['editable'] == true){
                $test .= "1 ".$vall['name_1c']."<br>";
                $arrInfo[$i]['Значение'] = $vall['Тип'].".".$vall['_ssylka'];
            }elseif (($vall['_ssylka']!="" || $vall['_Ssylka']!="") && $vall['Тип'] != 'Булево' && false === is_array($vall['_ssylka']) && $vall['editable'] === false){
                $test .= "2 ".$vall['name_1c']."<br>";
                $arrInfo[$i]['Значение'] = $vall['Значение'];
            }
            if ($vall['type'] == 'date' && $vall['editable'] == true) {
                $test .= "3 ".$vall['name_1c']."<br>";
                $arrInfo[$i]['Значение'] = getDatINS($vall['value'],"-","down");
            }elseif ($vall['type'] == 'date' && $vall['editable'] === false){
                $test .= "4 ".$vall['name_1c']."<br>";
                $arrInfo[$i]['Значение'] = $vall['Значение'];
            }

            if ($vall['type'] == 'checkbox' && $vall['Тип'] != "Булево" && $vall['editable'] == true) {
                $test .= "5 ".$vall['name_1c']."<br>";
                $arrInfo[$i]['Значение'] = $vall['checked'];
            }elseif ($vall['type'] == 'checkbox' && $vall['editable'] === false){
                $test .= "6 ".$vall['name_1c']."<br>";
                $arrInfo[$i]['Значение'] = $vall['Значение'];
            }
            if($vall['type'] == 'date-range' && $vall['editable'] == true){
                $test .= "7 ".$vall['name_1c']."<br>";
                $arrInfo[$i]['Значение'] = getDatRangINS($vall['value'],".","down");
            }elseif ($vall['type'] == 'date-range' && $vall['editable'] === false){
                $test .= "8 ".$vall['name_1c']."<br>";
                $arrInfo[$i]['Значение'] = $vall['Значение'];
            }

            if($vall['type'] == 'number' && $vall['editable'] == true){
                $test .= "9 ".$vall['name_1c']."<br>";
                $arrInfo[$i]['Значение'] = (int)$vall['value'];
            }elseif ($vall['type'] == 'number' && $vall['editable'] === false){
                $test =   "10 ".$vall['name_1c']."<br>";
                $arrInfo[$i]['Значение'] = $vall['Значение'];
            }
            if($vall['type'] == 'select' && false === is_array($vall['_ssylka']) && $vall['editable'] == true && $vall['Тип'] != "Булево"){
                $test .= "11 ".$vall['name_1c']."<br>";
                foreach ($vall['list_values'] as $check){
                    if($check['value'] == $vall['value']){

                        if($check['key'] === true){
                            $check['key'] = "Да";
                        }elseif ($check['key'] === false){
                            $check['key'] = "Нет";
                        }
                        $arrInfo[$i]['Значение'] = $check['key'];
                        $arrInfo[$i]['Тип'] = $check['type'];
                        if(!isset($check['key'])){
                            $arrInfo[$i]['Значение'] = $vall['Тип'].".".$vall['_ssylka'];
                            if($vall['Тип'] == "Строка"){
                                $arrInfo[$i]['Значение'] = $vall['_ssylka'];
                            }
                        }
                    }
                }
            }elseif(is_array($vall['_ssylka']) && $vall['type'] == 'select' && $vall['editable'] == true && $vall['Тип'] != "Булево"){
                $test .= "12 ".$vall['name_1c']."<br>";
                $arrUid = [];
                foreach ($vall['_ssylka'] as $uid) {
                    $pos = strpos($uid, $vall['Тип']);
                    if ($pos === false && $vall['Тип'] != "Строка") {
                        $arrUid[] = $vall['Тип'] . "." . $uid;
                    }else{
                        $arrUid[] = $uid;
                    }

                }
                $arrInfo[$i]['Значение'] = $arrUid;
            }elseif($vall['type'] == 'select' && $vall['editable'] == false && $vall['Тип'] != "Булево"){

                $test .=   "13 ".$vall['name_1c']."<br>";

                $arrInfo[$i]['Значение'] = $vall['Значение'];
            }elseif($vall['type'] == 'select' && $vall['Тип'] == "Булево"){
                $test .= "14 ".$vall['name_1c']."<br>";
                $arrInfo[$i]['Значение'] = $vall['selected_element']['value'];
            }
            $i++;

    }
    $resArrInfo = [];

    //echo $test."<pre>"; print_r($arrInfo); echo "</pre>";die();
    foreach ($arrInfo as $prop){
        //if($prop["Значение"] == "ignor") continue;
        if(!strpos(trim(str_replace(" ","",$prop["Значение"])),"10:00:00") && $prop["Значение"]!=""){
            $resArrInfo[]=$prop;
        }
    }
//    echo "<pre>"; print_r($resArrInfo); echo "</pre>";die();
//    echo "<pre>"; print_r($arrInfo); echo "</pre>";
//    die();
    if ($arr['TableID'] == 1063 ){
        $i = 0;
        $arrInfo = [];
        foreach ($arr['params']['info'] as $kk => $vall){
            if($vall['value'] == $vall['_ssylka'] && $vall['value'] == "" ){
                continue;
            }
            if($vall['editable'] === true) {
                $arrInfo[$i]['Ключ'] = $vall['name_1c'];
                $arrInfo[$i]['Значение'] = $vall['value'];
                if($vall['_ssylka']!="" || $vall['_Ssylka']!="" || $vall['Тип'] != 'Булево'){
                    $arrInfo[$i]['Значение'] = $vall['Тип'].".".$vall['_ssylka'];
                }
                if ($vall['type'] == 'date') {
                    $arrInfo[$i]['Значение'] = getDatINS($vall['value'],".","down");
                }
                if($vall['type'] == 'date-range'){
                    $arrInfo[$i]['Значение'] = getDatRangINS($vall['value'],".","down");
                }
                if($vall['type'] == 'number'){
                    $arrInfo[$i]['Значение'] = (int)$vall['value'];
                }
                if($vall['type'] == 'select'){
                    foreach ($vall['list_values'] as $check){
                        if($check['value'] == $vall['value']){
                            $arrInfo[$i]['Значение'] = $check['key'];
                            if(!isset($check['key'])){
                                $arrInfo[$i]['Значение'] = $vall['Тип'].".".$vall['_ssylka'];
                            }
                        }
                    }
                }
                $i++;
            }
        }
        $arrJson = [
            "Сервис" => "МониторингСТОсФотографиями",
            "Параметры" => $arrInfo
        ];

        $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
        $res = curlCombain($url,$arrJson,[],true, true);
        $header_size = $res['info_size'];
        $header = substr($res['answer'], 0, $header_size);
        $body = substr($res['answer'], $header_size);

        $pos_start = strpos($header,'filename=');
        $pos_stop = strpos($header,'X-Powered-By:');
        $f_nam = mb_substr($header,$pos_start+strlen('filename=')+1,$pos_stop - $pos_start - strlen('X-Powered-By:'));

        $format = explode(".",$f_nam);
        $format[0] = $format[0]."_".time();
        $obj = "jhd87q3";
        isDir($obj,'docs');
        $root = $_SERVER['DOCUMENT_ROOT'].'/upload/docs/';
        $saveto = $root.$obj.'/'.$format[0].'.'.$format[1];
        $root_2 = 'http://'.URL_ADDRESS.'/upload/docs/';
        $saveto_2 = $root_2.$obj.'/'.$format[0].'.'.$format[1];
        $fp = fopen($saveto, 'x');
        if (fwrite($fp, $body)) {
//        echo "Файл создан";
        } else {
//        echo "Что то пошло не так";
        }
        fclose($fp);
        return '{"url":"'.$saveto_2.'"}';

    }elseif ($arr['TableID'] == 1110){
        $i = 0;
        $arrInfo = [];
        foreach ($arr['params']['info'] as $kk => $vall){
            if($vall['value'] == $vall['_ssylka'] && $vall['value'] == "" ){
                continue;
            }
            if($vall['editable'] === true) {
                $arrInfo[$i]['Ключ'] = $vall['name_1c'];
                $arrInfo[$i]['Значение'] = $vall['value'];
                if($vall['_ssylka']!="" || $vall['_Ssylka']!="" || $vall['Тип'] != 'Булево'){
                    $arrInfo[$i]['Значение'] = $vall['Тип'].".".$vall['_ssylka'];
                }
                if ($vall['type'] == 'date') {
                    $arrInfo[$i]['Значение'] = getDatINS($vall['value'],".","down");
                }
                if ($vall['type'] == 'checkbox') {
                    $arrInfo[$i]['Значение'] = $vall['checked'];
                }
                if($vall['type'] == 'date-range'){
                    $arrInfo[$i]['Значение'] = getDatRangINS($vall['value'],".","down");
                }
                if($vall['type'] == 'number'){
                    $arrInfo[$i]['Значение'] = (int)$vall['value'];
                }
                if($vall['type'] == 'select'){
                    foreach ($vall['list_values'] as $check){
                        if($check['value'] == $vall['value']){
                            $arrInfo[$i]['Значение'] = $check['key'];
                            if(!isset($check['key'])){
//                                $arrInfo[$i]['Значение'] = $vall['Тип'].".".$vall['_ssylka'];
                                $arrInfo[$i]['Значение'] = $vall['_ssylka'];
                            }
                        }
                    }
                }
                $i++;
            }
        }
        $arrJson = [
            "Сервис" => "МОССТАТиФТС",
            "Параметры" => $arrInfo
        ];

        $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
        $res = curlCombain($url,$arrJson,[],true,true);
        $header_size = $res['info_size'];
        $header = substr($res['answer'], 0, $header_size);
        $body = substr($res['answer'], $header_size);

        $pos_start = strpos($header,'filename=');
        $pos_stop = strpos($header,'X-Powered-By:');
        $f_nam = mb_substr($header,$pos_start+strlen('filename=')+1,$pos_stop - $pos_start - strlen('X-Powered-By:'));

        $format = explode(".",$f_nam);
        $format[0] = $format[0]."_".time();
        $obj = "dfh437hh";
        isDir($obj,'docs');
        $root = $_SERVER['DOCUMENT_ROOT'].'/upload/docs/';
        $root_2 = 'http://'.URL_ADDRESS.'/upload/docs/';
        $saveto = $root.$obj.'/'.$format[0].'.'.$format[1];
        $saveto_2 = $root_2.$obj.'/'.$format[0].'.'.$format[1];
        $fp = fopen($saveto, 'x');
        if (fwrite($fp, $body)) {
//        echo "Файл создан";
        } else {
//        echo "Что то пошло не так";
        }
        fclose($fp);
        return '{"url":"'.$saveto_2.'"}';
    }elseif ($arr['TableID'] == 1295){
        $i = 0;
        $arrInfo = [];
        foreach ($arr['params']['info'] as $kk => $vall){
            if($vall['value'] == $vall['_ssylka'] && $vall['value'] == "" ){
                continue;
            }
            if($vall['editable'] === true) {
                $arrInfo[$i]['Ключ'] = $vall['name_1c'];
                $arrInfo[$i]['Значение'] = $vall['value'];
                if($vall['_ssylka']!="" || $vall['_Ssylka']!="" || $vall['Тип'] != 'Булево'){
                    $arrInfo[$i]['Значение'] = $vall['Тип'].".".$vall['_ssylka'];
                }
                if ($vall['type'] == 'date') {
                    $arrInfo[$i]['Значение'] = getDatINS($vall['value'],"-","down");
                }
                if ($vall['type'] == 'checkbox') {
                    $arrInfo[$i]['Значение'] = $vall['checked'];
                }
                if($vall['type'] == 'date-range'){
                    $arrInfo[$i]['Значение'] = getDatRangINS($vall['value'],".","down");
                }
                if($vall['type'] == 'number'){
                    $arrInfo[$i]['Значение'] = (int)$vall['value'];
                }
                if($vall['type'] == 'select'){
                    foreach ($vall['list_values'] as $check){
                        if($check['value'] == $vall['value']){
                            $arrInfo[$i]['Значение'] = $check['key'];
                            if(!isset($check['key'])){
                                $arrInfo[$i]['Значение'] = $vall['Тип'].".".$vall['_ssylka'];
                            }
                        }
                    }
                }
                $i++;
            }
        }
        $arrJson = [
            "Сервис" => "юк_ПродбезопасностьМинпромторг",
            "Параметры" => $arrInfo
        ];

        $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
        $res = curlCombain($url,$arrJson,[],true,true);
        $header_size = $res['info_size'];
        $header = substr($res['answer'], 0, $header_size);
        $body = substr($res['answer'], $header_size);
        $pos_start = strpos($header,'filename=');
        $pos_stop = strpos($header,'X-Powered-By:');
        $f_nam = mb_substr($header,$pos_start+strlen('filename=')+1,$pos_stop - $pos_start - strlen('X-Powered-By:'));
        $format = explode(".",$f_nam);
        $format[0] = $format[0]."_".time();
        $obj = "jsdf2431f";
        isDir($obj,'docs');
        $root = $_SERVER['DOCUMENT_ROOT'].'/upload/docs/';
        $root_2 = 'http://'.URL_ADDRESS.'/upload/docs/';
        $saveto = $root.$obj.'/'.$format[0].'.'.$format[1];
        $saveto_2 = $root_2.$obj.'/'.$format[0].'.'.$format[1];

        $fp = fopen($saveto, 'x');
        if (fwrite($fp, $body)) {
//        echo "Файл создан";
        } else {
//        echo "Что то пошло не так";
        }

        fclose($fp);
        return '{"url":"'.$saveto_2.'"}';
    }

    $q = "select top 1 * /*form_name_1C*/ from xx_reports where id = ".$arr['TableID'];
    $nam = ms_query_simple($q);
    $func = " 'getEditableTopBorderMenu_2': ";
    checkSQL($nam,$func.$q);
    $arrResult = [];

    if(strlen($arr['params']['variant'])>0){
        $arr['params']['variant'] = ".".$arr['params']['variant'];
    }
    $table = base64_url_encode($nam[0]['form_name_1C'].$arr['params']['variant']);
    $host_api = MAIN_IP_FOR_GET_DATA . "getdata/" .$table."_" ;
//    echo "<pre>"; print_r($resArrInfo); echo "</pre>";
//    echo json_encode($resArrInfo,JSON_UNESCAPED_UNICODE);
//    die();

    $edit = curlCombain($host_api, $resArrInfo, [],true,true);
    //echo "<pre>"; print_r($edit); echo "</pre>";die();
    $header_size = $edit['info_size'];
    $header = substr($edit['answer'], 0, $header_size);
    $body = substr($edit['answer'], $header_size);
    $res = base64_decode($body);
   // echo $res;
   // die();
    if(!is_array(json_decode($res, true))){
        $pos_start = strpos($header,'filename=');
        $pos_stop = strpos($header,'X-Powered-By:');
        $f_nam = mb_substr($header,$pos_start+strlen('filename=')+1,$pos_stop - $pos_start - strlen('X-Powered-By:'));
        $format = explode(".",$f_nam);
        $format[0] = $format[0]."_".time();
        $obj = "jsdf2431f";
        isDir($obj,'docs');
        $root = $_SERVER['DOCUMENT_ROOT'].'/upload/docs/';
        $root_2 = 'http://'.URL_ADDRESS.'/upload/docs/';
        if(strlen($format[1])<=2 || strlen($format[1])>4){
            $format[1] = "xlsx";
        }

        $saveto = $root.$obj.'/i'.date("Y-m-d_H:i:s").'.'.$format[1];
        $saveto_2 = $root_2.$obj.'/i'.date("Y-m-d_H:i:s").'.'.$format[1];
        $fp = fopen($saveto, 'w');
        if (fwrite($fp, $body)) {
//        echo "Файл создан";
        } else {
//        echo "Что то пошло не так";
        }
        fclose($fp);
        return '{"url":"'.$saveto_2.'"}';
    }else {
        $prokladka = json_decode($res, true);
//        echo "<pre>"; print_r($prokladka); echo "</pre>";die();
        $arrResult['data'] = $prokladka['Structure'][0]['fields'];
        $arrResult['values'] = $prokladka['Data'];
        $arrResult['params'] = $prokladka['References'];
        $nam[0]['variant'] = $arr['params']['variant'];
//        echo json_encode($arrResult, JSON_UNESCAPED_UNICODE); die();

        if (count($arrResult['values']) > 0) {
            xlsx_creator($arrResult, $nam, $arr['params']['info']);
        }
        return json_encode($arrResult, JSON_UNESCAPED_UNICODE);
    }
}
function grossSerch($arr){
    $q = "SELECT name_rus, form_id , menu_type FROM dbo.xx_menu_form_rel WHERE name_rus LIKE '%".$arr['params']['where']."%' AND (menu_type = 'form' OR menu_type = 'report')";
    $res = ms_query_simple($q);
    $func = " 'grossSerch': ";
    checkSQL($res,$func.$q);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}
function getDocFromSIOPR($arr){

    $root = $_SERVER['DOCUMENT_ROOT'].'/upload/docs/';
    $arr['params']['object'] = "Документы.хс_УведомлениеПоДоговору.Word_ОРасторженииВОдностороннемПорядке";
    $obj = $arr['params']['object'];
    $arrControlParam = getDocParamsFileForSIOPR($obj);
    $arrRes = [];
    $i = 0;
    foreach ($arrControlParam as $control){
        foreach ($arr['params']['inputs'] as $k=>$val){
            if($k == $control['key_search']){
                $arrRes[$i]['Ключ'] = $control['name_1c'];
                $arrRes[$i]['Значение'] = $val;
                $i++;
            }
        }
    }

    $host_api = MAIN_IP_FOR_GET_DATA . "getword/".base64_url_encode($obj);
    $res = curlCombain($host_api,$arrRes,[]);
    $header_size = $res['info_size'];
    $header = substr($res['answer'], 0, $header_size);
    $body = substr($res['answer'], $header_size);
//    echo $body;
    $pos_start = strpos($header,'filename=');
    $pos_stop = strpos($header,'X-Powered-By:');
    $f_nam = mb_substr($header,$pos_start+strlen('filename=')+1,$pos_stop - $pos_start - strlen('X-Powered-By:'));
//    echo $f_nam;
    $format = explode(".",$f_nam);
    $format[0] = $format[0]."_".time();
    isDir($obj,'docs');
    $saveto = $root.$obj.'/'.$format[0].'.'.$format[1];
    $fp = fopen($saveto, 'x');
    if (fwrite($fp, $body)) {

//        echo "Файл создан";
    } else {
//        echo "Что то пошло не так";
    }
    fclose($fp);
    return '{"url":"http://'.$_SERVER['SERVER_ADDR'].'/upload/docs/' . $obj.'/'.$format[0].'.'.$format[1].'"}';
}

function getDocParamsFileForSIOPR($str){
    $q = "SELECT * FROM dbo.get_doc_parameters('".$str."')";
    $res = ms_query_simple($q);
    $func = " 'getDocParamsFileForSIOPR': ";
    checkSQL($res,$func.$q);
    $arrRes = [];
    $i = 0;
    foreach ($res as $k => $val){
        if($val['par_vol'] != "") {
            $arrRes[$i]['name_1c'] = $val['par_name'];
            $arrRes[$i]['key_search'] = $val['par_vol'];
            $i++;
        }
    }
    return $arrRes;
}
function getMapStructure($arr){
    $q = "SELECT text_json from xx_forms where ID = " . $arr['TableID'];
    $res = ms_query_simple($q);
    $func = " 'getMapStructure': ";
    checkSQL($res,$func.$q);
    return $res[0]['text_json'];
}
function extractAllData($arr){
    $userID = getUserID();
    if($arr['params']['filter_id'] > 0 && !$arr['params']['default'] ) {
        $q = "SELECT text_js FROM xx_form_user_filter WHERE user_id = '" . $userID . "' AND form_id = '" . $arr['TableID'] . "' AND id = '" . $arr['params']['filter_id'] . "'";
    }else{
        $q = "SELECT text_js FROM xx_form_user_filter WHERE user_id = '" . $userID . "' AND form_id = '" . $arr['TableID'] . "' AND _default = 1";
    }
    $res = ms_query_simple($q);
    $func = " 'extractAllData': ";
    checkSQL($res,$func.$q);
    if(count($res)>0){
        return $res[0]['text_js'];
    }else{
        $qJS = "select text_json js1 from xx_forms where ID = ".$arr['TableID'];
        $str = ms_query_js($qJS);
        return $str[0]['js1'];
    }
}

/* Выпадающий список документов на форме */
function getListForDocument($arr){
    if(!is_array($arr)){
        $q = "select dbo.get_uid_form (N'".$arr."', '') as js1";
        $res = ms_query_simple($q);
        $func = " 'getListForDocument_1': ";
        checkSQL($res,$func.$q);
        $arr['TableID'] = $res[0]['js1'];
    }
    $q = "select distinct a.doc_name, a.rus_name from dbo.xx_doc_parameters a where form_id = ".$arr['TableID'];
    $res = ms_query_simple($q);
    $func = " 'getListForDocument_2': ";
    checkSQL($res,$func.$q);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}

function exitUser(){
    session_start();
    $_SESSION['login'] = "";
    $_SESSION['verified'] = 0;
    verifide();
}

function setSessionToJS($num){
    if($num == 0) {
        header('Content-type: application/json');
        return json_encode($_SESSION);
    }elseif ($num == 1){
        header('Content-type: application/json');
        $arr['userID'] = getUserID();
        $arr['name'] = $_SESSION['login']; // прод

//        $arr['name'] = "Раппопорт Богдан Станиславович"; // тетс
        return json_encode($arr);
    }
}
function verifide(){
    if($_SESSION['login'] == "" || $_SESSION['verified'] == 0 ){
        header('Location: /' , true, 301);
    }
}
function saveAdminReportsSettings($arr){
    //echo "<pre>"; print_r($arr); echo "</pre>";
    $json_st = json_encode($arr['params'][0]['state'],JSON_UNESCAPED_UNICODE);
    $variant = json_encode($arr['params'][0]['variant'],JSON_UNESCAPED_UNICODE);
    $json_fl = json_encode($arr['params'][0]['filter'],JSON_UNESCAPED_UNICODE);

    $q = "DELETE FROM xx_report_admin_param WHERE report_id = ".$arr['TableID']." AND variant = '".$variant."'";
    ms_query_simple($q);


    $q = "INSERT INTO xx_report_admin_param (report_id, text_js, filter_js, variant) VALUES (".$arr['TableID'].",'".$json_st."','".$json_fl."', '".$variant."')";
    $res = ms_query_simple($q);
    $func = " 'saveAdminReportsSettings': ";
    checkSQL($res,$func.$q);

}
function saveReportsSettings($arr){
    /* Пользователя ловлю Сам, что бы ребята не прокидывали */
//    echo "<pre>"; print_r($arr); echo "</pre>";
    $user = getUser();
    $json_st = json_encode($arr['params'][0]['state'],JSON_UNESCAPED_UNICODE);
    $json_fl = json_encode($arr['params'][0]['filter'],JSON_UNESCAPED_UNICODE);
    $q = "dbo.insert_report_user_par ".$arr['TableID']." , '".$user['log']."', '".$arr['params'][0]['name']."' ,'".json_encode($json_st,JSON_UNESCAPED_UNICODE)."','".json_encode($json_fl,JSON_UNESCAPED_UNICODE)."'";
//    echo $q;
    $res = ms_query_simple($q);
    $func = " 'saveReportsSettings': ";
    checkSQL($res,$func.$q);
    return 1;
}
function loadAdminReportsSettings($arr){
    $variant = json_encode($arr['params'][0]['variant'],JSON_UNESCAPED_UNICODE);
    $q = "SELECT * FROM xx_report_admin_param WHERE report_id = ".$arr['TableID']." AND variant = '".$variant."'";
    $res = ms_query_simple($q);
    $func = " 'loadAdminReportsSettings': ";
    checkSQL($res,$func.$q);
    $arrJson = [];
    $i=0;
    foreach ($res as $k => $val){
        if($val['report_name'] == ""){
            $val['report_name'] = $i++;
        }
        $arrJson[$k]['name'] = $val['report_name'];
        $arrJson[$k]['state'] = $val['text_js'];
        $arrJson[$k]['filter'] = $val['filtr_js'];
    }
    return json_encode($arrJson,JSON_UNESCAPED_UNICODE);
}
function loadReportsSettings($arr){
    $user = getUser();
    $q = "SELECT * FROM dbo.get_report_user_par (".$arr['TableID'].", '".$user['log']."')";
    $res = ms_query_simple($q);
    $func = " 'loadReportsSettings': ";
    checkSQL($res,$func.$q);
    $arrJson = [];
    $i=0;
    foreach ($res as $k => $val){
        if($val['report_name'] == ""){
            $val['report_name'] = $i++;
        }
        $arrJson[$k]['name'] = $val['report_name'];
        $arrJson[$k]['state'] = json_decode($val['text_js'],true);
        $arrJson[$k]['filter'] = json_decode($val['filtr_js'],true);
    }
    return json_encode($arrJson,JSON_UNESCAPED_UNICODE);
}
function delReportsSettings($arr){
    $user = getUser();
    $q = "DELETE FROM dbo.xx_report_user_param where report_id = ".$arr['TableID']." AND [user] = '".$user['log']."' AND report_name = '".$arr['params'][0]['name']."'";
//    echo $q;
    $res = ms_query_simple($q);
    $func = " 'delReportsSettings': ";
    checkSQL($res,$func.$q);
}
function delAdminiReportsSettings($arr){
    $q = "DELETE FROM dbo.xx_report_admin_param where report_id = ".$arr['TableID']." AND variant LIKE '%".$arr['params'][0]['variant']."%'";
    $res = ms_query_simple($q);
    $func = " 'delAdminReportsSettings': ";
    checkSQL($res,$func.$q);
}
function getTableFromDB($arr){
    sqlCheker($arr);

    $where = "";
    $headers = "*";
    if(strlen($arr['params']['where']) > 0){
        $where .= " WHERE ".$arr['params']['where'];
    }
    if(strlen($arr['params']['headers']) > 0){
        $headers = $arr['params']['headers'];
    }
    if(strlen($arr['params']['order']) > 0){
        $where .= " ORDER BY ".$arr['params']['order'];
    }
    $q = "SELECT ".$headers." FROM ".$arr['TableID'].$where;
    //echo $q;

    $res = ms_query_simple($q);
    $func = " 'getTableFromDB': ";
    checkSQL($res,$func.$q);
    $str = json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);

    return $str;
}

function getTableDistinct($arr){
    $where = "";
    if(strlen($arr['params']['where']) > 0){
        $where .= " WHERE ".$arr['params']['where'];
    }
    $q = "SELECT DISTINCT ".$arr['params']['headers']." FROM ".$arr['TableID'] .$where;
    $res = ms_query_simple($q);
    $func = " 'getTableDistinct': ";
    checkSQL($res,$func.$q);
    $str = json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
    return $str;
}
function updateByKey($arr){
    $table = $arr['TableID'];
    $key = $arr['params']['key'];
    $fields = [];
    $i = 0;
    foreach ($arr['params'] as $k => $val){
        if($k != "key" && $k != $arr['params']['key']){
            $fields[$i] = $k." = '".$val."'";
            if(is_numeric($val)){
                $fields[$i] = $k." = ".$val;
            }
            $i++;
        }
    }
    if(!is_numeric($arr['params'][$key])){
        $arr['params'][$key] = "'".$arr['params'][$key]."'";
    }
    $q = "UPDATE ".$table." SET ".implode(", ",$fields)." WHERE ".$key." = ".$arr['params'][$key];
    $res = ms_query_simple($q);
    $func = " 'updateByKey': ";
    checkSQL($res,$func.$q);
//    return $q;
}
function updateByWhere($arr){
    $table = $arr['TableID'];
    $fields = [];
    $i = 0;
    foreach ($arr['params'] as $k => $val){
        if($k != "where"){
            $fields[$i] = $k." = '".$val."'";
            if(is_numeric($val)){
                $fields[$i] = $k." = ".$val;
            }
            $i++;
        }
    }

    $q = "UPDATE ".$table." SET ".implode(", ",$fields)." WHERE ".$arr['params']['where'];
    $res = ms_query_simple($q);
    $func = " 'updateByWhere': ";
    checkSQL($res,$func.$q);
//    return $q;
}
function insertInDBNotReturn($arr){
    $table = $arr['TableID'];
    $q = "INSERT INTO ".$table." (".$arr['params']['fields'].") VALUES (".$arr['params']['values'].") ";
//    echo $q;
    $res = ms_query_simple($q);
    $func = " 'insertInDBNotReturn': ";
    checkSQL($res,$func.$q);
}
function insertInDB($arr){
    $table = $arr['TableID'];
    $q = "INSERT INTO ".$table." (".$arr['params']['fields'].") VALUES (".$arr['params']['values'].") ";
//    echo $q;
    $res = ms_query_simple($q);
    $func = " 'insertInDB_1': ";
    checkSQL($res,$func.$q);
    $q = "SELECT max([ID]) id FROM ".$table;
    $res = ms_query_simple($q);
    $func = " 'insertInDB_2': ";
    checkSQL($res,$func.$q);
    return $res['id'];
}
function uploadExcelFileInTable($arr){
    /*
    $vid = $arr['params']['VID'];
    $i = 0;
    foreach ($arr['params']['Rows'] as $param){
        $header=[
            "Наименование" => "Название_".$i++,
            "Ссылка" =>[
                "Вид" =>$vid,
                "УИД" => "00000000-0000-0000-0000-000000000000"
            ]
        ];
        $i++;
        $res = array_merge($header,$param);
//        echo json_encode($res,JSON_UNESCAPED_UNICODE);
    }
    */
}

function updateFormGroupLevel($arr){

    $q = "dbo.update_form_groups_level '".$arr['params']['form_name']."'";
    $res = ms_query_simple($q);
//    echo "<pre>"; print_r($res); echo "</pre>";
    $func = " 'upadateFormGroupLevel_1': ";
    checkSQL($res,$func.$q);
    $q = "dbo.create_view_form '".$arr['params']['form_name']."'";
    $res = ms_query_simple($q);
//    echo "<pre>"; print_r($res); echo "</pre>";
    $func = " 'upadateFormGroupLevel_2': ";
    checkSQL($res,$func.$q);
    $q = "dbo.create_view_form_all_fields '".$arr['params']['form_name']."'";
    $res = ms_query_simple($q);
//    echo "<pre>"; print_r($res); echo "</pre>";
    $func = " 'upadateFormGroupLevel_3': ";
    checkSQL($res,$func.$q);
}

/* Копирование формы */
function replicationForm($arr){
    $q = "dbo.copy_form ".$arr['params']['form_id'].", '".$arr['params']['form_name']."', '".$arr['params']['form_pr']."'";
    $res = ms_query_simple($q);
    $func = " 'replicationForm_1': ";
    checkSQL($res,$func.$q);
    $q = "dbo.create_view_form_all_fields '".$arr['params']['form_name']."'";
    $res = ms_query_simple($q);
    $func = " 'replicationForm_2': ";
    checkSQL($res,$func.$q);
    $q = "SELECT max(ID) as id FROM xx_forms";
    $res = ms_query_simple($q);
    $func = " 'replicationForm_3': ";
    checkSQL($res,$func.$q);
    return $res[0]['id'];
}
function getMaxValue($arr){
    $table = $arr['TableID'];
    $field = $arr['params']['column_name'];
    $q = "SELECT max([".$field."]) val FROM ".$table;
    $res = ms_query_simple($q);
    $func = " 'getMaxValue': ";
    checkSQL($res,$func.$q);
    return $res[0]['val'];
}
function deleteByKey($arr){
    $table = $arr['TableID'];
    $field = $arr['params']['key'];
    $value = $arr['params'][$field];
    $where = $arr['params']['where'];
    if(strlen($where)<=0) {
        $q = "DELETE FROM " . $table . " WHERE [" . $field . "] = " . $value;
    }else{
        $q = "DELETE FROM " . $table ." WHERE ". $where;
    }
    $res = ms_query_simple($q);
    $func = " 'deleteByKey': ";
    checkSQL($res,$func.$q);
}

function get_headers_from_curl_response($response)
{
    $headers = array();
    $header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

    foreach (explode("\r\n", $header_text) as $i => $line)
        if ($i === 0)
            $headers['http_code'] = $line;
        else
        {
            list ($key, $value) = explode(': ', $line);
            $headers[$key] = $value;
        }

    return $headers;
}
function deleteFormByID($arr){
    $q = "dbo.delete_form ".$arr['TableID'];
    $res = ms_query_simple($q);
    $func = " 'deleteFormByID': ";
    checkSQL($res,$func.$q);
    return $res;
}
function countRows($arr){

    $filter_id = 0;
    $headers = $arr['params']['headers'];
    if($arr['TableID'] == 40281){
        $data = $arr['params']['data'];
        if(strlen($arr['params']['data'])<6){
            $data = date("Ymd");
        }
        $headers = " count(*) as res FROM dbo.form_40281_f(''".$data."'') ";
        $filter_id = -11;
    }
    if($arr['TableID'] == 40288){
        $data = $arr['params']['data'];
        if(strlen($arr['params']['data'])<6){
            $data = date("Ymd");
        }
        $headers = " count(*) as res FROM dbo.form_40288_f(''".$data."'') ";
        $filter_id = -11;
    }
    if($arr['TableID'] == 40282){
        $data = $arr['params']['data'];
        $data2 = $arr['params']['data2'];
        if(strlen($arr['params']['data'])<6){
            $data = date("Ymd");
        }
        $headers = " count(*) as res FROM dbo.form_40282_f(''".$data2."'',''".$data."'') ";
        $filter_id = -11;
    }

    $whr = $arr['params']['where'];
    $pg = $arr['params']['selectedPage'] . "," . $arr['params']['quantity'];

    if($arr['params']['quantity'] == "-1"){
        $pg = "";
    };


    if(strlen($headers)<=0){
        $headers = "*";
    }
    if (strlen($whr) <= 0) {
        $whr = "1=1";
    }
    if (strlen($pg) <= 1) {
        $pg = "";
    }

    $strOrder = "1"; // новое 25.01.22
    if(strlen($arr['params']['order']) > 0){
        $strOrder = $arr['params']['order'];
    }
    $strWhere = " '(" . $whr . ")' ";
    if(!isset($arr['params']['specific']) || $arr['params']['specific'] == "") {
        if(!$arr['params']['default']) {
            if ($filter_id == -11) {
                $arr['params']['filter_id'] = $filter_id;
            }
            $qJS = "select dbo.get_data_form_js_all_user_count(" . $arr['TableID'] . ", " . $strWhere . ", '" . $strOrder . "','" . $pg . "', '" . $headers . "'," . getUserID() . ",'" . $arr['params']['filter_id'] . "', '' )"; // новое решение, 13.07.2022 год
        }else {
            $qJS = "select dbo.get_data_form_js_all_user_count(" . $arr['TableID'] . ", " . $strWhere . ", '" . $strOrder . "','" . $pg . "', '" . $headers . "'," . getUserID() . ", $filter_id, '')";
        }
    }else{
        $filter_id = -1;
        if(!isset($arr['params']['filter_id']) && $arr['params']['filter_id'] > 0) {
            $filter_id = $arr['params']['filter_id'];
        }
        $qJS = "select dbo.get_data_form_js_all_user_count(" . $arr['TableID'] . ", " . $strWhere . ", '" . $strOrder . "','" . $pg  . "', '" . $headers . "',".getUserID().", ". $filter_id ." ,'".$arr['params']['left_join']."')";
    }
    $str = ms_query_js($qJS, FROM_NEW_DB);
    $res_str = '';
    foreach ($str[0] as $val) {
        $res_str = $val;
    }
    $res = ms_query_simple($res_str, FROM_NEW_DB);
    $func = " 'CountFields': ";
    checkSQL($res,$func.$res_str);
    return $res[0]['res'];
}
function changeDefaultUserFilter($arr){
    $user_id = getUserID();
    $q = "UPDATE xx_form_user_filter SET _default = 0 WHERE user_id = '".$user_id."' AND form_id = '".$arr['TableID']."'";
    $res = ms_query_simple($q);
    $func = " 'saveUserFilter_1': ";
    checkSQL($res,$func.$q);

    if($arr['params']['active'] == 'enable'){
        $q = "UPDATE xx_form_user_filter SET _default = 1 WHERE user_id = '".$user_id."' AND form_id = '".$arr['TableID']."' AND id = '".$arr['params']['id']."'";
        $res = ms_query_simple($q);
        $func = " 'saveUserFilter_1': ";
        checkSQL($res,$func.$q);
    }
}

function saveUserFilter($arr){
    //echo "<pre>"; print_r($arr); echo "</pre>";
    $user_id = getUserID();
    $q = "SELECT user_name FROM xx_form_user_filter WHERE user_id = '".$user_id."' AND form_id = '".$arr['TableID']."' AND _default = '1'";
    $res = ms_query_simple($q);
    $func = " 'saveUserFilter_1': ";
    checkSQL($res,$func.$q);

    $q = "SET NOCOUNT ON declare @id int exec @id = dbo.update_form_users ".$arr['TableID'].",
     ".$user_id.", 
     '".$arr['params']['text_js']."' ,
     '".$arr['params']['filter_js']."',
     ".$arr['params']['id'].",
     ".$arr['params']['ud'].",
     '".$arr['params']['form_user_name']."',
     ".$arr['params']['default'].",
     ".$arr['params']['tmp']." select @id as res";

    //echo $q;
    $res_ID = ms_query_simple_exec($q);
    $func = " 'saveUserFilter_2': ";
    checkSQL($res_ID,$func.$q);

    $q = "dbo.create_view_form_users ".$res_ID;
    $res = ms_query_simple($q);
    $func = " 'saveUserFilter_3': ";
    checkSQL($res,$func.$q);
    return '{"ID":"'.$res_ID.'"}';
}
function getIDForReport($arr){
    $type = $arr['params']['type'];
    $guid = $arr['params']['GUID'];
    if($type == 'кс_ФормаКатегорирования'){
        return '{"ID":"1851"}';
    }
    $q = "SET NOCOUNT ON declare @_ret int exec @_ret = dbo.get_form_id '".$type."' ,'".$guid."' select @_ret as res";
    $res_ID = ms_query_simple_exec($q);
    $func = " 'getIDForReport': ";
    checkSQL($res_ID,$func.$q);
    return '{"ID":"'.$res_ID.'"}';
}
function getUserFilter($arr){
    $userId = getUserID();
    if(isset($arr['params']['filter_id']) && $arr['params']['filter_id'] > 0){
        $q = "SELECT filter_js,id FROM xx_form_user_filter WHERE user_id = '" . $userId . "' AND form_id = '" . $arr['TableID'] . "' AND id = ".$arr['params']['filter_id'];
    }else {
        $q = "SELECT filter_js,id FROM xx_form_user_filter WHERE user_id = '" . $userId . "' AND form_id = '" . $arr['TableID'] . "' AND _default = 1";
    }
    $res = ms_query_simple($q);
    $func = " 'getUserFilter': ";
    checkSQL($res,$func.$q);
    return json_encode($res[0]);
}
function getUserFilters($arr){
    $userId = getUserID();
    $q = "SELECT id,_default,form_user_name FROM xx_form_user_filter WHERE isnull(tmp,0) = 0 and user_id = '".$userId."' AND form_id = '".$arr['TableID']."'";
    $res = ms_query_simple($q);
    $func = " 'getUserFilters': ";
    checkSQL($res,$func.$q);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}
function getUserFiltersMap($arr){
    $userId = getUserID();
    $q = "SELECT id,_default,form_user_name FROM xx_form_user_filter WHERE isnull(tmp,2) = 2 and user_id = '".$userId."' AND form_id = '".$arr['TableID']."'";
    $res = ms_query_simple($q);
    $func = " 'getUserFilters': ";
    checkSQL($res,$func.$q);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}
function сreateLayerInMap($arr){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = [
        "Сервис" => "СоздатьСлойИВыгрузитьОбъекты",
        "Параметры" => [
            [
                "Ключ" => "Вид",
                "Значение" => $arr['params']['vid']
            ],
            [
                "Ключ" => "ИмяСлоя",
                "Значение" => $arr['params']['layername']
            ],
            [
                "Ключ" => "Объекты",
                "Значение" => $arr['params']['objects']
            ]
        ]
    ];
    $res = curlCombain($url,$arrJson,[]);
    return '{"URL":"'.$res['answer'].'"}';
}
function rabbitMQExcel($arr){
    //echo "<pre>"; print_r($arr); echo "</pre>";die();
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = [
        "Сервис" => "СообщениеRabbitMQExcel",
        "Параметры" => [
            [
                "Ключ" => "#ID",
                "Значение" => $arr['params']['identificator']
            ]
        ]
    ];
    $arrHeader[] = "Content-Type: text/xml; charset=utf8";
    $edit = curlCombain($url,$arrJson,$arrHeader,true,true);

    $header_size = $edit['info_size'];

    $header = substr($edit['answer'], 0, $header_size);
//    echo $header;die();
    $arrHeaders = get_headers_from_curl_response($header);
//    echo "<pre>"; print_r($arrHeaders); echo "</pre>";die();
    $arrResFN = [];
    if(!isset($arrHeaders['filename'])){
        $arrProto = explode(";",$arrHeaders['Content-Disposition']);
        foreach ($arrProto as $strProto){
            $resStr = explode("=",$strProto);
            $arrResFN[trim($resStr[0])]=trim(str_replace('"','',$resStr[1]));
        }
    }
    $body = substr($edit['answer'], $header_size);
    $f_nam = urldecode($arrResFN['filename']);
//    echo $f_nam;die();
    $format = explode(".", $f_nam);
    $format[0] = $format[0]."_".time();

    $root = $_SERVER['DOCUMENT_ROOT'].'/upload/docs/dav';
    $root_2 = 'http://'.URL_ADDRESS.'/upload/docs/dav';

    if(strlen($format[1])<=2 || strlen($format[1])>4){
        $format[1] = "xlsx";
    }
    $saveto = $root.'/i'.date("Y-m-d_H-i-s").'_'.$format[0].'.'.$format[1];
    $saveto_2 = $root_2.'/i'.date("Y-m-d_H-i-s").'_'.$format[0].'.'.$format[1];
    $fp = fopen($saveto, 'w');
    if (fwrite($fp, $body)) {
//        echo "Файл создан";
    } else {
//        echo "Что то пошло не так";
    }

    fclose($fp);

    if($edit['info']==200) {
        return '{"url":"' . $saveto_2 . '","UID":"'.urldecode($arrHeaders['xx_guid']).'"}';
    }else{
        return '{"ERROR":"Формирование печатной формы недоступно"}';
    }

}
function updateRegisterData($arr){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = $arr['params']['json'];
    $res = curlCombain($url,$arrJson,[]);
    return '{"URL":"'.$res['answer'].'"}';
}
function getAdresnyeObektyRow($arr){
    $arrJson = [
        "Сервис" => "ПолучитьАдрес",
        "Параметры" => $arr['params']
    ];

    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $res = curlCombain($url,$arrJson,[]);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);

}
function pushInDocument($arr){
    $url = MAIN_IP_FOR_GET_DATA."putindocument";
    $res = curlCombain($url,$arr['params']['fields'],[]);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}
function formDecisionOnSpot($arr){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = [
        "Сервис" => "СформироватьРешениеПоМесту",
        "Параметры" => [
            [
                "Ключ" => "uid",
                "Значение" => $arr['params']['uid']
            ],
            [
                "Ключ" => "refusal",
                "Значение" => $arr['params']['refusal']
            ]
        ]
    ];
    $res = curlCombain($url,$arrJson,[]);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}
function getAdresnyeObekty($arr){
    $txt = $arr['params']['text'];
    if($txt != 'null'){
        $txt = "'".$txt."'";
    }
    $q = "select * from dbo.xx_AdresnyeObekty_func (".$arr['params']['level'].", ".$txt.")";
    $res = ms_query_simple($q);
    $func = " 'getAdresnyeObekty_1': ";
    checkSQL($res,$func.$q);
    $str = json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
    return $str;
}
function getEMailResident($arr){
    checkUserBySQL($_SESSION['login'],'samAction',0);
    $and = "";
    if(strlen($arr['params']['name'])>0){
        $and = " AND a.[_Naimenovanie] in(".$arr['params']['name'].")";
    }
    $q = "select a.[_Naimenovanie]as name, b.[_AdresEP] as mail
  from xx_Polzovateli a
  JOIN xx_Polzovateli_KontaktnayaInformatsiya b on b.[_Ssylka] = a.[_Ssylka]
  WHERE b._Vid = dbo.xx_getid_bin('b930f2d1-4c2b-4f78-a697-4b87e83c8dd0')".$and;
    //echo $q;
    $res = ms_query_simple($q);
    $func = " 'getEMailResident_1': ";
    checkSQL($res,$func.$q);
    $str = json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE); // ВРЕМЕННО

    return $str;
}
// АДМИНИСТРАТИВНАЯ
function setSql($q){
    $res = ms_query_simple($q);
    $func = " 'setSql': ";
    checkSQL($res,$func.$q);
    $str = json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
    return $str;
}
function sendFilesToSIOPR($arr){
    $user = getUser();
    $ext = pathinfo($arr['address'], PATHINFO_EXTENSION);
    $fileStr = file_get_contents($arr['address']);

    $postdata = array( "name" => $arr['name'],
        "format" => $ext,
        "email" => "shipilovskiy@ya.ru",
        "xx_type" => $arr['xx_type'],
        "xx_guid" => $arr['xx_guid'],
        "priznak" => $arr['priznak'],
        "monitoring_rpn" => $arr['monitoring_rpn'],
        "file_vid" => $arr['file_vid'],
        "message" => "Какое-то сообщение от пользователя Test",
        "upload" => $fileStr
    );
    $ch = curl_init();
    $res = [];

    $url = MAIN_IP_FOR_GET_DATA.'senddata/';

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERPWD, $user['log'].':'.$user['pas']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata );
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $output = curl_exec($ch);

    $res['answer'] = $output;
    $res['CURLOPT_POSTFIELDS'] = $postdata;
    $res['info'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $res['info_size'] = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $res['ERROR'] = curl_error($ch);
//    echo "<pre>"; print_r($res); echo "</pre>";

    if ($output === FALSE) {
        // Тут-то мы о ней и скажем
        echo "cURL Error: " . curl_error($ch);
        return;
    }
    curl_close($ch);
    return $output;
}
function sendEmailReport($arr){
    $arrMails=[];
    /* парсим пришедшие данные от СИОПР ВЕБ */
    foreach ($arr['params']['emails'] as $k=>$val){
        $arrMails[]=$val['mail'];
    }
    /* создаём файл из потока для гарантии */
//    die();
    $address = "../upload/docs/reports/".str_replace(" ","_",trim($arr['params']['title']))."_".time().".pdf";
    file_put_contents($address, base64_decode($arr['params']['file']));
    /* создаём тело письма */

    $filename = $address; //Имя файла для прикрепления
//    $to = implode(",",$arrMails); //Кому
    $to = "shipilovskiy@yandex.ru"; //Кому
    $from = "webmaster@sioprweb.mos.ru"; //От кого
    $subject = $arr['params']['title']; //Тема
    $message = "Текстовое сообщение"; //Текст письма

    $boundary = "---"; //Разделитель
    /* Заголовки */
    $headers = "From: $from\nReply-To: $from\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"";
    $body = "--$boundary\n";
    /* Присоединяем текстовое сообщение */
    $body .= "Content-type: text/html; charset='utf-8'\n";
    $body .= "Content-Transfer-Encoding: quoted-printablenn";
    $body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($filename)."?=\n\n";
    $body .= $message."\n";
    $body .= "--$boundary\n";
    $file = fopen($filename, "r"); //Открываем файл
    $text = fread($file, filesize($filename)); //Считываем весь файл
    fclose($file); //Закрываем файл
    /* Добавляем тип содержимого, кодируем текст файла и добавляем в тело письма */
    $body .= "Content-Type: application/octet-stream; name==?utf-8?B?".base64_encode($filename)."?=\n";
    $body .= "Content-Transfer-Encoding: base64\n";
    $body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode($filename)."?=\n\n";
    $body .= chunk_split(base64_encode($text))."\n";

    $body .= "--".$boundary ."--\n";
    $res = mail($to, $subject, $body, $headers); //Отправляем письмо
//    echo "<pre>mail"; print_r(error_get_last()); echo "</pre>";
    if($res === true){
        $ans = "Письмо отправлено";
    }else{
        $ans = "Письмо не отправлено";
    }
    return '{"ERROR":"' . $ans . '"}';
}
function sendEmailNotification($arr){
    echo "<pre>"; print_r($arr); echo "</pre>";die();
    $arrNames = $arr['params']['users'];
    $text = $arr['params']['text'];
    $arrMails[] = 'www-data';
    foreach ($arrNames as $val) {
        $Name['params']['name'] = $val;
        $arrMails[] = json_decode(getEMailResident($Name),true)[0]['mail'];
    }

    /* создаём файл из потока для гарантии */
//    die();
    //echo "<pre>"; print_r($arrMails); echo "</pre>";die();
    foreach ($arrMails as $mail) {
        $address = "../upload/docs/notification/" . str_replace(" ", "_", trim($arr['params']['title'])) . "_" . time() . ".pdf";
        file_put_contents($address, base64_decode($arr['params']['file']));
        /* создаём тело письма */

        $filename = $address; //Имя файла для прикрепления

//    $to = implode(",",$arrMails); //Кому
        $to = $mail; //Кому
//        $from = "webmaster@sioprweb.mos.ru"; //От кого
        $from = "www-data"; //От кого
        $subject = $arr['params']['title']; //Тема
        $message = "Текстовое сообщение"; //Текст письма

        $boundary = "---"; //Разделитель
        /* Заголовки */
        $headers = "From: $from\nReply-To: $from\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"";
        $body = "--$boundary\n";
        /* Присоединяем текстовое сообщение */
        $body .= "Content-type: text/html; charset='utf-8'\n";
        $body .= "Content-Transfer-Encoding: quoted-printablenn";
        $body .= "Content-Disposition: attachment; filename==?utf-8?B?" . base64_encode($filename) . "?=\n\n";
        $body .= $message . "\n";
        $body .= "--$boundary\n";
        $file = fopen($filename, "r"); //Открываем файл
        //$text = fread($file, filesize($filename)); //Считываем весь файл
        fclose($file); //Закрываем файл
        /* Добавляем тип содержимого, кодируем текст файла и добавляем в тело письма */
        $body .= "Content-Type: application/octet-stream; name==?utf-8?B?" . base64_encode($filename) . "?=\n";
        $body .= "Content-Transfer-Encoding: base64\n";
        $body .= "Content-Disposition: attachment; filename==?utf-8?B?" . base64_encode($filename) . "?=\n\n";
        $body .= chunk_split(base64_encode($text)) . "\n";
        $body .= "--" . $boundary . "--\n";
        $res = mail($to, $subject, $body, $headers); //Отправляем письмо
    echo "<pre>mail"; print_r(error_get_last()); echo "</pre>";
        if ($res === true) {
            $ans = "Письмо отправлено";
        } else {
            $ans = "Письмо не отправлено";
        }
        echo $ans."<br>";
        //return '{"ERROR":"' . $ans . '"}';
    }
}
function getURLExcel($param){
    $user = getUser();
    $arrParams=[
        '9902?variant=В разрезе субъектов'=>'пб_АналитическийОтчетОПоступленииТоваров_.В разрезе субъектов',
        '9902?variant=В разрезе субъектов - поставщиков'=>'пб_АналитическийОтчетОПоступленииТоваров_.В разрезе субъектов - поставщиков',
        '9902?variant=В разрезе товаров'=>'пб_АналитическийОтчетОПоступленииТоваров_.В разрезе товаров',
        '1095'=>'пб_АналитическийОтчетОПоступленииПродовольствияПоИмпортуВРазрезеГруппТоваров',
        '9902?variant=В разрезе стран - поставщиков'=>'пб_АналитическийОтчетОПоступленииТоваров_.В разрезе стран - поставщиков',
        '1099'=>'пб_ОтчетОбИзмененииОстатков',
        '9904?variant=За период времени'=>'пб_АналитическийОтчетОПоступленииТоваров.За период времени',
        '1106?variant=Основной %28по периоду%29'=>'пб_ОтчетПоПоступлению.Основной (по периоду)',
        '1106'=>'пб_ОтчетПоПоступлению',
        '30048?variant=ОтчетОПоступленииРегионРФПредприятиеТовар'=>'пб_ОтчетПоПоступлению.ОтчетОПоступленииРегионРФПредприятиеТовар',

        '1294?variant=Форма2'=>'аз_ПоказателиРеализацииГенеральногоПлана.Форма2',
        '1294?variant=Форма1'=>'аз_ПоказателиРеализацииГенеральногоПлана.Форма1',
        '1144?variant=Основной'=>'хс_ИнформацияОТорговыхКомплексах.Основной',
        '1101'=>'пб_ОтчетПоАнализуДокументов',
        '1056'=>'кс_ДоговораНаВывозМусораНовый',
        '1056?variant=Детали'=>'кс_ДоговораНаВывозМусораНовый.Детали',
        '1170?variant=СтационарныеТорговыеОбъекты'=>'кс_ДоговораНаВывозМусораНовый.Детали',

        // '1144?variant=ОсновнойExcel'=>'хс_ИнформацияОТорговыхКомплексах.ОсновнойExcel',
        '1154'=>'хс_КоличествоСкладскихПредприятийПоОкругамГородаМосквы',
        '1067'=>'кс_ОбщественноеПитание',
        '1263'=>'кс_ИнформацияОСогласованииПаспортовБезопасностиТорговыхОбъектов',
        '1293'=>'аз_ОтчетПоИзмененнымСубъектамУчетаЗаПериод',
        '1264?variant=Основной'=>'кс_РезультатыКатегорированияИПаспортизацииТорговыхОбъектовПоППРФ1273.Основной',
        '1023?variant=СтатистикаПоСтоБытовка'=>'дт_КоличествоПредприятий.СтатистикаПоСтоБытовка',
        '1271?variant=Основной1'=>'юк_СоблюдениеПредписанийРПН.Основной1',
        '1019'=>'дт_АктуальныеДоговоры',
        '1178'=>'хс_ОтчетПоИзмененнымОбъектамЗаПериод',
        '1248'=>'юк_РитуальныеУслугиПоОкругам',
        '1277'=>'юк_ОтчетОбследованиеСтационарныхОбъектов',
    ];
    if(isset($arrParams[$param])){
        // прод
//        $url = "https://".$_SERVER['SERVER_NAME'].'/xlsxgenerator/upload_reports/new_'.$arrParams[$param].'_'.str_replace(" ","_",$user['log']).'_'.date("Y-m-d").'.xlsx';
        // тест
        $url = "http://".$_SERVER['SERVER_NAME'].'/xlsxgenerator/upload_reports/new_'.str_replace(" ","_",$arrParams[$param]).'_'.str_replace(" ","_",$user['log']).'_'.date("Y-m-d").'.xlsx';

        return '{"URL":"' . $url . '"}';
    }else{
        return '{"ERROR":"отчёт в VUE"}';
    }
}
function getUsersGroup(){
    $q = "SELECT * FROM xx_group_users";
    $res = ms_query_simple($q);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}
function getCategoryProject($arr){
    $q = "select * from xx_sto_project_kateg(".$arr['params']['num'].")";
    $res = ms_query_simple($q);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}
function getFormHS($arr){
    $q = "select dbo.xx_get_set_from_hs (".$arr['params']['UID'].") as val";
    $res = ms_query_simple($q);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}
function getKadastrNum($arr){
    $q = "select dbo.xx_get_kadastr_num (".$arr['params']['UID'].", ".$arr['params']['ulica'].") as val";
    $res = ms_query_simple($q);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}
function getKadastrIe($arr){
    $q = "select * from xx_get_kadastr_ie(".$arr['params']['kadastr'].")";
    $res = ms_query_simple($q);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}

function getFileByURL($arr){

    $urlF1 = FTP_PREFIX.$arr['params']['url'];

    $arrFtp =[
        "type"=>"ftp://",
        "user"=>"USRFTP",
        "pass"=>"Qmswrt18P",
        "address" => FTP_ADDRESS,
        "path" => "",
    ];
    $cat_in = "../upload/docs/old-bid/";
    $cat = $cat_in;
    $arrReturnJSON = [];
    $conn = ftp_connect($arrFtp['address']);
    ftp_raw($conn, "OPTS UTF8 ON");
    ftp_login($conn, $arrFtp['user'], $arrFtp['pass']);
    ftp_pasv($conn, TRUE);

    $arrNam = explode("\\",$urlF1);
    $name = $arrNam[(count($arrNam)-1)];
    $numFile = $cat.$name;

    $fp = fopen($numFile, 'w');
    if(ftp_fget($conn, $fp, $urlF1, FTP_BINARY,0)){
        $arrReturnJSON = [
            'URL' => 'http://' . URL_ADDRESS . str_replace("..", "", $numFile),
        ];
    }else{
        $arrReturnJSON= [
            'ERROR' => 'Файл отсутствует',
        ];
    };

    fclose($fp);
    ftp_close($conn);
    return json_encode($arrReturnJSON, JSON_UNESCAPED_UNICODE);
}
function getBase64File($arr){
    $numFile = str_replace('http://' . URL_ADDRESS,"..",$arr['params']['url']);
    $numFile = urldecode($numFile);
    //echo $numFile;die();
    $fp = fopen($numFile, 'r');
    $contents = fread($fp, filesize($numFile));
    $arrReturnJSON = [
        'base64_code' => base64_encode($contents)
    ];
    fclose($fp);
    return json_encode($arrReturnJSON, JSON_UNESCAPED_UNICODE);
}
function getWt_1st_json($arr){
//    $d = $arr['params']['date'];
    $n = $arr['params']['numsess'];
    $s = $arr['params']['f_or_s'];
    $q = "SET NOCOUNT ON exec dbo.xx_yarm_bbeg_date_ins '".date("Ymd")."' , ".$n.", ".$s;
    //echo $q;
    $ses = ms_query_simple($q);
    //echo "<pre>"; print_r($ses); echo "</pre>";

 //   $q= "SET NOCOUNT ON declare @_ret nvarchar(max) exec xx_yarm_calc '".$d."', ".$n.", ".$s.", @_text = @_ret  OUTPUT select @_ret as js1";
//echo $q;
 //   $res = ms_query_simple($q);
//    $host = MAIN_IP_FOR_GET_DATA."insert";
//    $host = MAIN_IP_FOR_GET_DATA."getwidgetdata/".urlencode('YVDFirst')."/".urlencode('ЗавершитьЗаявочнуюКампаниюНаСервере')."/";
//    $host = MAIN_IP_FOR_GET_DATA."getwidgetdata/";

   // $params = ['wp'=>"YVDFirst",'func'=>"ЗавершитьЗаявочнуюКампаниюНаСервере",'json'=>true,'param'=>base64_decode("date1=".date("Ymd")."000000")];

//    $dat = date("Y-m-d")."T".date("H:i:s");
    //echo $dat; die();
//    $params[] = ['wp'=>"YVDFirst",'func'=>"ЗавершитьЗаявочнуюКампаниюНаСервере",'json'=>true,'param'=>"date1=".$dat.'"'];
//    $params[] = ["Ключ"=>"date1", "Значение"=>$dat];

//    echo "<pre>"; print_r($params); echo "</pre>";die();

//    $user = getUser();
//    $curl = curl_init($host);
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
//    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
//    curl_setopt($curl, CURLOPT_USERPWD, $user['log'] . ':' . $user['pas'] );
//    curl_setopt($curl, CURLOPT_HEADER, 1);
//    curl_setopt($curl, CURLOPT_POST, true);
//    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
//    $curl_response = curl_exec($curl);
//    curl_close($curl);
//
//    echo "<pre>"; print_r($curl_response); echo "</pre>";die();
 //   $json = json_decode($res[0]['js1'],true);
 //   $resq = json_decode(SetDataToSIOPR($host,$json[0]),true);
 //   return $resq['answer'];



}
function getDataFrom1st($arr){
    $d = $arr['params']['act'];
    $n = $arr['params']['numsess'];
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = [
        "Сервис" => "СервисыРабочегоСтола",
        "Параметры" => [
            [
                "Ключ" => "#РабочийСтол",
                "Значение" => "ЯрмаркиВыходногоДняПерваяЗаявочнаяКампания"
            ],[
                "Ключ"=>"#Действие",
                "Значение"=>$d
            ],[
                "Ключ"=>"#НомерСессии",
                "Значение"=>$n
            ]
        ]
    ];
    $pr = curlCombain($url,$arrJson);
//    echo "<pre>"; print_r($pr); echo "</pre>";die();
    $res = json_decode($pr['answer'],true);
    return explode(".",$res['Result'])[2];
}

/**
 * @param $d //тип действия, на пример "ТекстЗаявкиКОтклонениюНажатие"
 * @param $n
 * @param $dt
 * @return array
 */
function getDataFrom2st($arr){

    $d = $arr['params']['act'];
    $n = $arr['params']['numsess'];
    $dt = $arr['params']['data'];
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = [
        "Сервис" => "СервисыРабочегоСтола",
        "Параметры" => [
            [
                "Ключ" => "#РабочийСтол",
                "Значение" => "ЯрмаркиВыходногоДняЕженедельноеРаспределение"
            ],[
                "Ключ"=>"#Действие",
                "Значение"=>$d
            ],[
                "Ключ"=>"#НомерСессии",
                "Значение"=>$n
            ],[
                "Ключ"=>"ДатаС",
                "Значение"=>$dt
            ]
        ]
    ];
    $pr = curlCombain($url,$arrJson);
    $res = json_decode($pr['answer'],true);
    return explode(".",$res['Result'])[2];
}
function checkUserBySQL($u,$a,$t){
    $q = "select dbo.get_user_do ('".$u."',  '".$a."', ".$t.") out";
    $res = ms_query_simple($q)[0];
    if($res['out']===0){
        session_destroy();
        header('Location: /');
        die();
    }
    return "OK";
}
function getSessionNum($arr){
    $q = "select * from xx_dt_TorgovyeSessii a where '".$arr['params']['data']."' between a.[_DataNachalaTorgovoySessii] and a.[_DataOkonchaniyaTorgovoySessii]";
    $res = ms_query_simple($q);
    return $res[0]['_NomerSessii'];
}

function bidCompany(){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = [
        "Сервис" => "ЭтоПерваяЗаявочная"
        ];
    $pr = curlCombain($url,$arrJson);
    $res = json_decode($pr['answer'],true);
    return $res;
}
function countElementsInView($arr){
    $where = "";
    if(strlen($arr['params']['where']) > 0){
        $where .= " WHERE ".$arr['params']['where'];
    }
//    $q = "SELECT COUNT (*) as count FROM  ".$arr['TableID'] . " " .$where;
    $q = "SELECT COUNT (".$arr['params']['headers'].") as count FROM  ".$arr['TableID'] .$where;
    $res = ms_query_simple($q);
    return $res[0]['count'];
}
function tableNameArrayToString($views){
    $arr = explode(",",str_replace(" ", "", $views));
    $result = "";
    foreach ($arr as $key => $value) {
        if($result){
            $result .= " union select _doc_nomer, _AdresAdresnogoReestra, _doc_data, _Zadacha_uid, _TochkaMarshruta_uid,_Predmet_uid, dbo.xx_get_work_day_plus(_doc_data, 30) _DataVypolneniya from " . $value ;
        }else{
            $result .= "select _doc_nomer, _AdresAdresnogoReestra, _doc_data, _Zadacha_uid, _TochkaMarshruta_uid,_Predmet_uid, dbo.xx_get_work_day_plus(_doc_data, 30) _DataVypolneniya from " . $value ;
        }
    }
    return $result;
}
function getWorkFlowElements($arr){
    $where = "";
    if(strlen($arr['params']['where']) > 0){
        $where .= " WHERE ".$arr['params']['where'];
    }
    $q = "select distinct _doc_nomer, _doc_data, max(_Zadacha_uid) _Zadacha_uid,_AdresAdresnogoReestra, max(_TochkaMarshruta_uid) _TochkaMarshruta_uid,_Predmet_uid, dbo.xx_get_work_day_plus(_doc_data, 30) _DataVypolneniya from (" . tableNameArrayToString($arr['params']['table_name']) . ") a " . $where . " group by _doc_nomer, _AdresAdresnogoReestra, _doc_data, _Predmet_uid";
    // echo $q; die();
    $res = ms_query_simple($q);
    return json_encode($res,JSON_UNESCAPED_UNICODE);
}
function getWorkFlowCount($arr){
    $where = "";
    if(strlen($arr['params']['where']) > 0){
        $where .= " WHERE ".$arr['params']['where'];
    }
    $q = "select count(distinct [_Predmet_uid] ) as count from (".tableNameArrayToString($arr['params']['table_name']) . ") a " . $where;
    // echo $q; die();
    $res = ms_query_simple($q);
    return $res[0]['count'];
}

function hard_code_01(){
    $q = "select [_Znachenie_N] as value, _Kod from xx_az_Parametry_v_srez s left join xx_yuk_Dorabotki xyd on s.[_Parametr] = xyd.[_Ssylka] WHERE  _Kod in ('000000011', '000000012')";
    $res = ms_query_simple($q);
    return json_encode($res, JSON_UNESCAPED_UNICODE);
}


/* проверка запросов на инъекции */
function checkPost($arrPost)
{
    $arrSqlWords = ["select", "insert", "input", "or", "and", "where", "from"];

    if(isset($arrPost['TableID']) && count($arrPost['TableID'])>1){
        header('Location: http://'.$_SERVER['SERVER_NAME'].'/logout.php');
        session_destroy();
        $_POST = null;
        die();
    }

    foreach ($arrPost as $k => $val) {
        $arrPost[$k] = strip_tags($val);
        $arrPhrase = explode(" ", $val);
        foreach ($arrPhrase as $word) {
            if (in_array(trim(strtolower($word)), $arrSqlWords)) {
                header('Location: http://'.$_SERVER['SERVER_NAME'].'/logout.php');
                session_destroy();
                $_POST = null;
                die();
            }
        }
    }
}