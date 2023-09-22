<?php
/* выводить ошибки DB */
define("CH", true);
function v2_getUser(){

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
        "pas" => "12345"
    ];
    return $arrUser;
}
function v2_getCoordinat($txt){
    $address = "http://ehpd.mos.ru/services/publish/search_2gis?format=mobile&count=1&spatialOutEPSG:4326&text=".urlencode($txt);
    $res = file_get_contents($address);
    if(strlen($txt)<3){
        return  '{"ERROR":"Строка адреса пуста"}';
    }else {
        return $res;
    }
}
function v2_getSQLError(){
    $file = $_SERVER['DOCUMENT_ROOT']."/log/sql_log.txt";
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
function v2_getRole($us = ""){

    $user = v2_getUser();
    if($us!=""){
        $user['log'] = $us;
    }
    $q = "select top 1 ([role]) from xx_users xu where user_name = '".$user['log']."'";
    //echo $q;
    $res = ms_query_simple($q);
    $func = " 'getRole': ";
    checkSQL($res,$func.$q);
    return $res[0]['role'];
}
function v2_curlGetCombain($url, $arrJson = [], $arrHeader = []){
    $user = v2_getUser();

    if(count($arrHeader) <= 0){
        $arrHeader[] = "Content-Type: text/xml; charset=utf-8";
    }

    $json = json_encode($arrJson,JSON_UNESCAPED_UNICODE);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_USERPWD, $user['log'] . ':' . $user['pas']);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $arrHeader);
    $res['answer'] = curl_exec($curl);
    $res['header'] = $arrHeader;
    $res['json'] = $json;
    $res['info'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $res['info_size'] = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $res['ERROR'] = curl_error($curl);
//    echo "<pre>"; print_r($res); echo "</pre>";
    curl_close($curl);
    return $res;
}
function v2_curlCombain($url, $arrJson = [], $arrHeader = [], $flag = true, $headerON = false){
    $user = getUser();
    if(count($arrHeader) <= 0){
        $arrHeader[] = "Content-Type: text/xml; charset=utf-8";
    }
    $json = json_encode($arrJson,JSON_UNESCAPED_UNICODE);
    if($flag == false){
        $json = $arrJson;
    }
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_USERPWD, $user['log'] . ':' . $user['pas']);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
    curl_setopt($curl, CURLOPT_HEADER, $headerON);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $arrHeader);
    curl_setopt($curl, CURLOPT_POST, true);
    $ansver['answer'] = curl_exec($curl);
    $ansver['user'] = $user['log'] . ':' . $user['pas'];
    $res['SERVICE'] = $url;
    $res['header'] = json_encode($arrHeader,JSON_UNESCAPED_UNICODE);
    $res['json'] = $json;
    $res['TYPE'] = "POST";
    $res['info'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $ansver['info'] = $res['info'];
    $ansver['json_1'] = $json;
    $ansver['json_2'] = $arrJson;

    $res['info_size'] = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $ansver['info_size'] = $res['info_size'];
    $res['ERROR'] = curl_error($curl);
    $turn = [];
    if((int)$res['info']!=200){
        $turn['TYPE'] = "POST";
        $turn['URI'] = $url;
        $turn['dateTime'] = date("Y-m-d H:i:s");
        $turn['answer'] = $ansver['answer'];
        $turn['ERROR'] = $res['ERROR'];
        $turn['json'] = $res['json'];
        set1cError($turn);
    }
//    echo "<pre>"; print_r($ansver); echo "</pre>";
//    echo "<pre>"; print_r($res); echo "</pre>";
//    echo "<pre>"; print_r($turn); echo "</pre>";
//    die();
    setAllActions($res);
    curl_close($curl);
    return $ansver;
}
function v2_setDashboard(){
    $role = getRole();
    $wt = v2_getFileTypeWT($role);
    if(strlen($wt)<=0){
        $wt = "";
    }
    return $wt;
}
function v2_getFileTypeWT($rol){
    $arrSpis = [
        "NTO" => "NTO.php",
        "STO_ALL" => "STO.php",
        "STO_BYT" => "BytovoeObsluzhivanie.php",
        "STO_CONTROL" => "Rukovodstvo.php",
        "STO_PYT" => "ObshchestvennoePitanie.php",
        "STO_RYNK" => "RoznichnyeRynki.php",
        "STO_YAR_VD" => "YArmarkiVyhodnogoDnya.php",
        "STO_YAR" => "YArmarkiVyhodnogoDnya2.php",
        "STO_KAT" => "Category.php",
        "STO_RIT" => "clearWT.php",
        "STO_PROD_BEZ" => "ProdBezopasnost.php",
        "ALL" => "Uprava.php",
        "UPRAVA" => "Uprava.php",
        "PREF" => "Prefektura.php",
    ];
    return $arrSpis[$rol];
}

function v2_checkSQL($arr, $con = ""){
    if ($arr === false && CH === true) {
        die(formatErrors(sqlsrv_errors(),date("Y-m-d H:i:s").$con));
    }
}
function v2_setSqlError($data){
    $file = $_SERVER['DOCUMENT_ROOT']."/log/sql_log.txt";
    file_put_contents($file,$data, FILE_APPEND);
}

function v2_getMemorySize($data,$m){
    $i = 0;
    while (floor($m / 1024) > 0) {
        $i++;
        $m /= 1024;
    }
    $name = array('байт', 'КБ', 'МБ', 'ГБ');
    $data .= " объём выделенной памяти: ".round($m, 2) . ' ' . $name[$i]."\r";
    $file = $_SERVER['DOCUMENT_ROOT']."/log/report_log.txt";
    file_put_contents($file,$data, FILE_APPEND);
}
function v2_getUserID(){
    $user = v2_getUser();
    $q = "select id from xx_users where user_name = '".$user['log']."'";
    $res = ms_query_simple($q);
    $func = " 'v2_getUserID': ";
    checkSQL($res,$func.$q);
    return $res[0]['id'];
}

function v2_pusherToSIOPRForButton($arrJson){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $res = v2_curlCombain($url,$arrJson,[]);
    return json_encode($res);
}

/* только для получения красивого отчёта */
function v2_pusherToSIOPRForButton_TEMP($arrJson){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $res = v2_curlCombain($url,$arrJson,[]);
    return json_encode($res);
}

function v2_getDatINS($str,$trim=".",$sort="top"){
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
function v2_getDatRangINS($str,$trim=".",$sort="top"){
    $sort = "top";
    $arr = explode("-",trim($str));
    $res = [];
    foreach ($arr as $value){
        $res[] = v2_getDatINS($value,$trim,$sort);
    }
    if($sort == "DB"){
        return implode(":",$res);
    }else{
        return implode("-",$res);
    }
}

function v2_SetDataToSIOPR($host_api, $arrJson){

    $res = v2_curlCombain($host_api,$arrJson,[],true,"new_user");
    return json_encode($res);
    /*
    if($res['info'] == 400){
        return '{"ERROR":"' . $res['ERROR'] . '"}';
    }else {
        return '{"UID":"' . $res['answer'] . '"}';
    }*/
}
function v2_getTopBorderMenu($arr){
    $q = "select dbo.get_form_upper(".$arr['TableID'].") as js1";
    $res = ms_query_simple($q);
    $func = " 'getTopBorderMenu': ";
    checkSQL($res,$func.$q);
    return $res[0]['js1'];
}
function v2_getVisibleTopBorderMenu($arr){
    $q = "select dbo.get_form_visible(".$arr['TableID'].") as js1";
    $res = ms_query_simple($q);
    $func = " 'getVisibleTopBorderMenu': ";
    checkSQL($res,$func.$q);
    return $res[0]['js1'];
}
function v2_getMandatoryTopBorderMenu($arr){
    $q = "select dbo.get_form_req(".$arr['TableID'].") as js1";
    $res = ms_query_simple($q);
    $func = " 'getMandatoryTopBorderMenu': ";
    checkSQL($res,$func.$q);
    return $res[0]['js1'];
}
function v2_getEditableTopBorderMenu($arr){
    $q = "select dbo.get_form_edit(".$arr['TableID'].") as js1";
    $res = ms_query_simple($q);
    $func = " 'getEditableTopBorderMenu': ";
    checkSQL($res,$func.$q);
    return $res[0]['js1'];
}

function v2_getRelForm($arr){
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
function v2_getList($arr){
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
    if($px == "xx_"){
        $q = "SELECT *, dbo.xx_getid([_Ssylka]) as [_Ssylka], ".$nam." as [value]  FROM ".$arr['TableID']." WHERE ".$whr." ".$limit;
    }else{
        $q = "SELECT *, ([_Ssylka]) as [_Ssylka], ".$nam." as [value]  FROM ".$arr['TableID']." WHERE ".$whr." ".$limit;
    }
//    echo $q;

    $res = ms_query_simple($q);
//    echo "<pre>"; print_r($res); echo "</pre>";

    $func = " 'getList_2': ";
    checkSQL($res,$func.$q);
    $str = json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);

    return $str;
}
function v2_getListBig($arr){
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

function v2_getAddressList($arr){
    $strWhere = "%".str_replace([" "],["%"],trim($arr['params']['address']))."%";
    $unom = $arr['params']['unom'];
    if(strlen($unom)<=0) {
        $q = "select dbo.xx_getid([_Okrug]) as [_Okrug],dbo.xx_getid([_Rayon]) as [_Rayon],dbo.xx_getid([_Ulitsa]) as [_Ulitsa],_PredstavlenieDoma,_Predstavlenie, _ID from xx_dt_BTIAdresnyyReestr a where a.[_Predstavlenie] like '" . $strWhere . "'";
    }else{
        $q = "select dbo.xx_getid([_Okrug]) as [_Okrug],dbo.xx_getid([_Rayon]) as [_Rayon],dbo.xx_getid([_Ulitsa]) as [_Ulitsa],_PredstavlenieDoma,_Predstavlenie, _ID from xx_dt_BTIAdresnyyReestr a where _ID = ".(int)$unom;
    }
//    echo $q;
    $res = ms_query_simple($q,FROM_NEW_DB);
    $func = " 'getAddressList': ";
    checkSQL($res,$func.$q);
//    echo "<pre>"; print_r($res); echo "</pre>";
    return json_encode($res);
}
function v2_getURLMapFromSiopr($arr){

    $arr['params']['user'] = "Юрий Дяденко";
    $host_api = MAIN_IP_FOR_GET_DATA . "getmapinfo/" . $arr['params']['UID'];
    $address = "sioprmain.mos.ru";
    $str_v= base64_encode($arr['params']['vid']);
    $str_u = base64_encode($arr['params']['user']);
    $arrHeader = ['xx_vid: ' . $str_v, 'xx_user_name: ' .$str_u];
    $resCurl = v2_curlCombain($host_api,[],$arrHeader);
    if($resCurl['info'] != 400) {
        $res = json_decode($resCurl['answer'], true);
        $strUrl = '{"url":"http://'.$address.'/egip/umap/index.html?session=' . $res["session"] . '&layer_id=' . $res["layer_id"] . '&layer_revision_id=current&feature_id=' . $res["feature_id"] . '"}';
        return $strUrl;
    }else{
        return '{"ERROR":"ОШИБКА"}';
    }
}

function v2_getMenu(){
    //verifide();
    $role = v2_getRole();
    $q = "select xm.text_js from xx_menus xm where menu_name ='".$role."'";
    $res = ms_query_simple($q);
    $func = " 'getMenu_1': ";
    checkSQL($res,$func.$q);
    if(count($res)<=0){
        $q = "select xm.text_js from xx_menus xm where menu_name = '0'";
        $res = ms_query_simple($q);
        $func = " 'getMenu_2': ";
        checkSQL($res,$func.$q);
    }
    return $res[0]['text_js'];
}

function v2_isDir($str, $cat){
    $strDir = $_SERVER['DOCUMENT_ROOT'].'/upload/'.$cat.'/';
    if (!is_dir($strDir.$str)) {
        mkdir($strDir.$str, 0766);
        chmod($strDir.$str, 0766);
    }
}
function v2_isDirRotation($strAdr){
    $arr = array_values(array_diff(explode("/",str_replace("..","",$strAdr)),[""]));
    $root = $_SERVER['DOCUMENT_ROOT']."/";
    foreach($arr as $fil){
        $root .= $fil."/";
        if (!is_dir($root)) {

            mkdir($root, 0766);
            chmod($root, 0766);
        }
    }
}
function v2_sendFilesToSIOPR_old($arr){
//    echo "<pre>"; print_r($arr); echo "</pre>";
//    die();
    $ext = pathinfo($arr['address'], PATHINFO_EXTENSION);
    $fileStr = file_get_contents($arr['address']);
    $arrJson = array(
//        "name" => $arr['name'],
//        "format" => $ext,
//        "email" => "shipilovskiy@ya.ru",
        "xx_type" => "xx_type",
        "xx_guid" => $arr['xx_guid'],
//        "message" => "Какое-то сообщение от пользователя Test",
        "upload" => $fileStr
    );
//    $url = MAIN_IP_FOR_GET_DATA.'senddata/';
    $url = 'http://65.21.95.200:8080/DBSIOPR/hs/Report/senddata/';

    $res = v2_curlCombain($url,$arrJson,[]);

    if ($res['answer'] === FALSE) {
        // Тут-то мы о ней и скажем
        echo "cURL Error: " . $res['ERROR'];
        return;
    }

    return json_encode($res);
}

function v2_getMinPromTorgInfo($arr){
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

    $res = v2_curlCombain($url,$arrJson,[]);

    $header_size = $res['info_size'];
    $header = substr($res['answer'], 0, $header_size);
    $body = substr($res['answer'], $header_size);
    $pos_start = strpos($header,'filename=');
    $pos_stop = strpos($header,'X-Powered-By:');
    $f_nam = mb_substr($header,$pos_start+strlen('filename=')+1,$pos_stop - $pos_start - strlen('X-Powered-By:'));
    $format = explode(".",$f_nam);
    $format[0] = time();
    v2_isDir($obj,'docs');
    $saveto = $root.$obj.'/'.$format[0].'.'.$format[1];
    $fp = fopen($saveto, 'x');
    if (fwrite($fp, $body)) {
//        echo "Файл создан";
    } else {
//        echo "Что то пошло не так";
    }
    fclose($fp);
    return '{"url":"http://'.$_SERVER['SERVER_NAME'].'/upload/docs/' . $obj.'/'.$format[0].'.'.$format[1].'"}';

//    v2_pusherToSIOPRForButton($arrJson);
}

/* выбор действий по кнопкам */
function v2_getCustomADDFile($arr){
    $ID = $arr['params']['GroupID'];
    if($ID=="") {
        $ID = $arr['params']['TableID'];
    }
    if($ID == "a_46102899"){
        v2_button_a_46102899($arr);
    }elseif($ID == "a_46102898"){
        v2_button_a_46102898($arr);
    }elseif ($ID == "a_3209"){
        echo v2_button_a_3209($arr);
    }elseif ($ID == "a_8965"){
        echo v2_button_a_8965($arr);
    }elseif ($ID == "a_3214"){
        echo v2_button_a_3214($arr);
    }elseif ($ID == "a_5080"){
        echo v2_button_a_5080($arr);
    }elseif ($ID == "a_24288"){
        echo v2_button_a_24288($arr);
    }
}
function v2_button_a_24288($arr){
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

    $res = v2_pusherToSIOPRForButton($arrJson);
    $res = trim(str_replace(['"','}','{'],['','',''],explode(":",$res)[1]));
    return '{"UID":"updatefield", "PARAMS":{"a_3186": "'.$res.'"}}';
}
function v2_button_a_5080($arr){
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
function v2_button_a_3214($arr){
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
    $res = v2_pusherToSIOPRForButton($arrJson);
    $num = (float)explode(":",$res)[1];
    return '{"UID":"updatefield", "PARAMS":{"a_3215": "'.$num.'"}}';
}



function v2_button_a_8965($arr){
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
    v2_pusherToSIOPRForButton($arrJson);
    return '{"UID":"update"}';
}

/*  */

function v2_button_a_3209($arr){
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
    v2_pusherToSIOPRForButton($arrJson);
    return '{"UID":"updategroup","PARAMS":[46102970, 46102969]}';
}

/* ДОБАВЛЕНИЕ ЗАМЕЧАНИЙ */

function v2_button_a_46102898($arr){
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
                "Значение" => v2_getDatINS($arrValue["a_14057"],"-","top")
            ],
            [
                "Ключ" => "Комментарий",
                "Значение" => $arrValue["a_14110"]
            ],[

                "Ключ" => "КонтрольныйСрок",
                "Значение" => v2_getDatINS($arrValue["a_14111"],"-","top")
            ],
            [

                "Ключ" => "Объект",
                "Значение" => "Справочники.дт_СтационарныеТорговыеОбъекты.".$UID
            ],[

                "Ключ" => "Ответственный",
                "Значение" => "Справочники.Пользователи.".$arrValue['a_14112_Ssylka']
            ],[

                "Ключ" => "Период",
                "Значение" =>  v2_getDatINS($arrValue["a_14111"],"-","top")
            ],[

                "Ключ" => "Статус",
                "Значение" => "Справочники.кс_СтатусыКатегорирования.".$arrValue['a_14056_Ssylka']
            ]
        ]
    ];

    v2_pusherToSIOPRForButton($arrJson);

}

/* УДАЛЕНИЕ СВЯЗАННЫХ СТО */
function v2_a_delete_svz_nto($arr){
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
    v2_pusherToSIOPRForButton($arrJson);
}

/* ДОБАВЛЕНИЕ СВЯЗАННЫХ СТО */
function v2_button_a_46102899($arr){
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
        v2_pusherToSIOPRForButton($arrJson);
    }
}

function v2_setGrantToSIOPR($arr){
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
    $res = v2_curlCombain($url,$arrJson);
    return '{"UID":"'.$res['answer'].'"}';
}

function v2_setSysPredToSIOPR($arr){
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
    $res = v2_curlCombain($url,$arrJson);
    return '{"UID":"'.$res['answer'].'"}';
}

function v2_getDataFromSIOPR_TEMP($arr){
//    $arr['TableID'] = 1851;
//    $arr['params']['UID'] = "00000396-6340-11e8-821f-005056805372";
//    $arr['params']['GroupId'] = "a_46502885";
    $arrReturnJSON = [];
    if(!isset($arr['params']['VID'])) {
        $q = "select top 1 form_name_1C from xx_forms where id = " . $arr['TableID'];
        $nam = ms_query_simple($q);
        $func = " 'getDataFromSIOPR_TEMP': ";
        checkSQL($nam,$func.$q);

    }else{
        $nam[0]['form_name_1C'] = $arr['params']['VID'];
    }
//    echo "<pre>"; print_r($arr);echo "</pre>";
//    die();

    $rep['params']['UID'] = $arr['params']['UID'];
    $rep['params']['GroupID'] = $arr['params']['VID'];
    $rep['adres'] = $arr['params']['GroupId'];
//    $res = v2_getDataFromSIOPR($rep);
//    echo "<pre>"; print_r($res); echo "</pre>";
    $cat = "../upload/docs/".$nam[0]['form_name_1C']."/".$arr['params']['UID']."/".$arr['params']['GroupId'];
    $cat_in = "/upload/docs/".$nam[0]['form_name_1C']."/".$arr['params']['UID']."/".$arr['params']['GroupId'];
//    echo $cat_in;
    foreach (scandir($cat) as $item){
        if(!($item == '.') && !($item == '..') ) {

            $stat = stat($cat. "/" . $item);
//            echo "<pre>"; print_r($stat); echo "</pre>";
            $arrReturnJSON[] = [
                'f_vol' => "",
                'src' => 'http://'.URL_ADDRESS.$cat_in. "/" . $item,
                'url' => 'http://'.URL_ADDRESS.$cat_in. "/" . $item,
                'tab_id' => "",
                '__Naimenovanie' => "",
                '_Avtor' => "",
                '_Rasshirenie' => "",
                '_Razmer' => $stat['size'],
                'date' => date("Y-m-d",$stat['ctime'])
            ];
        }
    }
//        echo "<pre>"; print_r($arrReturnJSON); echo "</pre>";
    return json_encode($arrReturnJSON);

}

function v2_getDataFromSIOPR_v2($arr){
    $strDir = $arr['TableID']."/".$arr['params']['UID'];
    v2_isDir($arr['TableID'],'files');
    v2_isDir($strDir,'files');
    $qJS = "select * from dbo.get_form_pict (".$arr['TableID'].", '".$arr['params']['UID']."')";
//    echo $qJS;
    $arrStr = ms_query_js($qJS);
    $arrReturnJSON = [];
    $arrVal = [];
    foreach ($arrStr as $k=>$row){
        $res = ms_query_simple($row['sel_text']);
        $func = " 'getDataFromSIOPR_v2': ";
        checkSQL($res,$func.$row['sel_text']);
        foreach ($res as $kk => $val){
//            echo "<pre>"; print_r($val); echo "</pre>";
            v2_isDir($strDir."/".$val['group_id'],'files');
            $arrSend['params']['UID'] = $val['_Ssylka'];
            $arrSend['params']['GroupID'] = $val['doc_name'];
            $arrSend['adres'] = $strDir."/".$val['group_id'];

            echo v2_getDataFromSIOPR($arrSend);
            $arrReturnJSON["a_".$val['group_id']][$val['f_volume']][]=[
                'f_vol'=>$val['f_volume'],
                'src'=>'http://'.URL_ADDRESS.'/upload/files/'.$arrSend['adres']."/".$val['_Ssylka'].".".$val['_Rasshirenie'],
                'tab_id'=>$val['tab_id'],
                '__Naimenovanie' => $val['__Naimenovanie'],
                '_Avtor' => $val['_Avtor'],
                '_Rasshirenie' => $val['_Rasshirenie'],
                '_Razmer' => $val['_Razmer'],
                'date' => $val['date_create']->format('Y-m-d')
            ];
            $arrVal[$k][$kk] = ['ID'=>$val['group_id'],'f_val'=>['ID'=>$val['f_volume'],'file'=>$val['_Ssylka'].".".$val['_Rasshirenie']]];
        }
        $arrReturnJSONAll = [
            'ID'=>$arr['TableID'],
            'type'=>'form',
            'params'=>
                [
                    'ID'=>$arr['params']['UID'],
                    'type'=>'ssylka',
                    'params'=>[
                        'groups'=> $arrVal
                    ]
                ]
        ];
    }
//    echo "<pre>"; print_r($arrReturnJSON); echo "</pre>";
    return json_encode($arrReturnJSON);

//    return json_encode($arrReturnJSONAll);
}

function v2_getPhotoFromSIOPR_v1($arr){

    $guid = $arr['params']['UID'];
    $url = MAIN_IP_FOR_GET_DATA."getfileguids/".$guid;
    $vid = base64_encode($arr['params']['VID']);
    $arrHeader =  ['xx_vid: ' . $vid];
    $res = v2_curlCombain($url,[],$arrHeader);
    $arrPhotoUID = json_decode($res['answer'],true);
    $rArr['params']['GroupID'] = $arr['params']['VID'];
    foreach ($arrPhotoUID as $k => $val){
        $rArr['params']['UID'] = $val['guid'];
        $address = json_decode(getFilePathFromSIOPR($rArr),true)['path'];
        $arrPhotoUID[$k]['address'] = str_replace('\\', '/', $address);
        $arrPhotoUID[$k]['file_vid'] = $val['file_vid'];
        $arrPhotoUID[$k]['monitoring_rpn'] = $val['monitoring_rpn'];
        $arrPhotoUID[$k]['priznak'] = $val['priznak'];
        $arrPhotoUID[$k]['address'] = str_replace('//SIOPR-PRE1CT/Files/', '', $arrPhotoUID[$k]['address']);
    }
    return $arrPhotoUID;
}
function v2_getFileFromFTP($arr){
    $jsonRes = v2_getPhotoFromSIOPR_v1($arr);
    if(count($jsonRes) <= 0){
        return;
    }
    $arrFtp =[
        "type"=>"ftp://",
        "user"=>"USRFTP",
        "pass"=>"Qmswrt18P",
//        "address" => "siopr-pre1ct", // тест
        "address" => "siopr-db01p", // прод
        "path" => "",
    ];
    $cat_in = "../upload/docs/all/";
    $cat = $cat_in.$arr['params']['VID']."/".$arr['params']['UID']."/";
    v2_isDirRotation($cat);

    $arrReturnJSON = [];
    $ftp_connection = ftp_connect($arrFtp['address']);
    ftp_raw($ftp_connection, "OPTS UTF8 ON");
    if (ftp_login($ftp_connection, $arrFtp['user'], $arrFtp['pass'])) {
        //echo "FTP подключен";
    }else{
        //echo "FTP НЕ подключен";
    }
    foreach($jsonRes as $server_file){
        $name = $server_file['name'].".".$server_file['extension'];
        $arrNam = explode('/', $server_file);
        $local_file = $cat.$name;
        $numFile = $cat.$name;
        $url = $server_file['address'];
        if (!file_exists($numFile)){
            fopen($numFile, 'w');
            ftp_get($ftp_connection, $numFile, $url, FTP_BINARY);
        }

        $arrReturnJSON[] = [
            'f_vol' => $server_file['f_volume'],
            'src' => 'http://'.URL_ADDRESS.str_replace("..","",$numFile),
            'url' => 'http://'.URL_ADDRESS.str_replace("..","",$numFile),
            'tab_id' => "",
            '__Naimenovanie' => $server_file['name'],
            '_Avtor' => $server_file['author'],
            '_Rasshirenie' => $server_file['extension'],
            '_Razmer' => $server_file['size'],
            'date' => date("Y-m-d",$server_file['ctime']),
            'file_vid' => $server_file['file_vid'],
            'monitoring_rpn' => $server_file['monitoring_rpn'],
            'priznak' => $server_file['priznak']
        ];
    }
    ftp_close($ftp_connection);
    return json_encode($arrReturnJSON);
}
function v2_getPhotoFromSIOPR($arr){
    $guid = $arr['params']['UID'];
    $url = MAIN_IP_FOR_GET_DATA."getfileguids/".$guid;
    $vid = base64_encode($arr['params']['VID']);
    $arrHeader = ['xx_vid: ' . $vid];
    $res = v2_curlCombain($url,[],$arrHeader);
    $arrPhotoUID = explode(",", $res['answer']);
    $rArr['params']['GroupID'] = $arr['params']['VID'];
    $str = "";
//    echo "<pre>"; print_r($arrPhotoUID); echo "</pre>";
    foreach ($arrPhotoUID as $val){
        $rArr['params']['UID'] = trim(str_replace(['"',']','['],['','',''],$val));
        $str .= v2_getFilePathFromSIOPR($rArr);
    }
//    echo "<pre>"; print_r($rArr); echo "</pre>";
    return $str;
}
function v2_getFilePathFromSIOPR($arr){
    $url = MAIN_IP_FOR_GET_DATA."getfilepath/".$arr['params']['UID'];
    $vid = base64_encode($arr['params']['GroupID']);
    $arrHeader = ['xx_vid: ' . $vid];
    $res = v2_curlCombain($url,[],$arrHeader);
    return json_encode($res);
}
function v2_getDataFromSIOPR($arr){
    $root = $_SERVER['DOCUMENT_ROOT'].'/upload/docs/';
    $URL = URL_ADDRESS.'/upload/docs/';
    $url = MAIN_IP_FOR_GET_DATA . "getfile/" . $arr['params']['UID'];


    $vid = base64_encode($arr['params']['GroupID']);

    $arrHeader = ['xx_vid: ' . $vid];
    $res = v2_curlCombain($url,[],$arrHeader);

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
        $f_nam = $arrHeaders['filename'];
        $format = explode(".", $f_nam);
        $saveto = $root . $arr['adres'] . '/' . $arr['params']['GroupID'] . '/' . $arr['params']['UID'] . '.' . $format[1];
        if(strlen($arr['adres'])<=0 || !isset($arr['adres'])){
            $saveto = $root. $arr['params']['GroupID'] . '/' . $arr['params']['UID'] . '.' . $format[1];
        }
//            echo $saveto."<br>";
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



function v2_extractNewDateList($arr){

    $whr = $arr['params']['where'];
//    echo $whr;
    $pg = $arr['params']['selectedPage'] . "," . $arr['params']['quantity'];
    $offset = ($arr['params']['selectedPage']-1) * $arr['params']['quantity'];
    if($arr['params']['quantity'] == "-1"){
        $pg = "";
        $offset = "";
    };

    $headers = $arr['params']['headers'];
    $left_join = $arr['params']['left_join'];

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
            $qJS = "select dbo.get_data_form_js_all_user(" . $arr['TableID'] . ", " . $strWhere . ", '" . $strOrder . "','" . $pg . "', '" . $headers . "'," . v2_getUserID() . ",'" . $arr['params']['filter_id'] . "', '' )"; // новое решение, 13.07.2022 год
        }else {
            $qJS = "select dbo.get_data_form_js_all_user(" . $arr['TableID'] . ", " . $strWhere . ", '" . $strOrder . "','" . $pg . "', '" . $headers . "'," . v2_getUserID() . ", 0, '')";
        }
    }else{

        $filter_id = -1;
        if(!isset($arr['params']['filter_id']) && $arr['params']['filter_id'] > 0)
            $filter_id = $arr['params']['filter_id'];
        $qJS = "select dbo.get_data_form_js_all_user(" . $arr['TableID'] . ", " . $strWhere . ", '" . $strOrder . "','" . $pg  . "', '" . $headers . "',".v2_getUserID().", ". $filter_id ." ,'".$arr['params']['left_join']."')";


    }

    $str = ms_query_js($qJS, FROM_NEW_DB);
    $res_str = '';
    foreach ($str[0] as $val) {
        $res_str = $val;
    }
    $res = ms_query_simple($res_str, FROM_NEW_DB);
    $func = " 'extractNewDateList_3': ";
    checkSQL($res,$func.$res_str);
    return json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);

}
function v2_getTovarIerarh(){
    $q = "SELECT * dbo.xx_pb_Tovary_v_ie";
    $res = ms_query_simple($q);
    return json_decode($res,true);
}
function v2_extractNewData($arr)
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
    //echo $qJS."<br>";
    $str = ms_query_js($qJS, FROM_NEW_DB);
    $res_str = '';
    foreach ($str[0] as $val) {
        $res_str = $val;
    }

    //echo $res_str;
    $res = ms_query_simple($res_str, FROM_NEW_DB);
    //echo "<pre>"; print_r($res); echo "</pre>";
    $func = " 'extractNewData_2': ";
    checkSQL($res,$func.$res_str);

    return json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);
}


/* временная формула, со временем убрать  */
function v2_getAllValuesForExcellTable($arr){

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
        $user = v2_getUser();
        $q = "SELECT text_js FROM xx_form_user_filter WHERE user_name = '".$user['log']."' AND form_id = '".$arr['TableID']."'";
        $res = ms_query_simple($q);
        $func = " 'extractAllData': ";
        checkSQL($res,$func.$q);
        if(count($res)>0) {
            $qJS = "SELECT * FROM ( SELECT ".$headers." FROM all_form_".$arr['TableID']."_v_".v2_getUserID()." a0 ".$arr['params']['left_join']." ) a WHERE ".$whr." ORDER BY 2";
        }else{
            $qJS = "SELECT * FROM ( SELECT ".$headers." FROM all_form_".$arr['TableID']."_v a0 ".$arr['params']['left_join']." ) a WHERE ".$whr." ORDER BY 2";
        }

//        echo $qJS;
        $res = ms_query_simple($qJS, FROM_NEW_DB);
        $func = " 'getAllValuesForExcellTable_1': ";
        checkSQL($res,$func.$qJS);
        return json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);
    }
//    $qJS = "select dbo.get_data_form_all_js1(".$arr['TableID'].", ".$strWhere.", '1','".$pg."' )"; // старое


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
function v2_extractValuesTable($arr){
//    if($arr['params']['UID'] == '00000000-0000-0000-0000-000000000000'){
//        return [];
//    }
    $whr = $arr['params']['where'];
    $pg = $arr['params']['quantity'].",".$arr['params']['selectedPage'];
//    $headers = $arr['params']['headers'];
//    if(strlen($headers)<=0){
//        $headers = "*";
//    }
    if(strlen($whr)<=0){
        $whr = "1=1";
    }
    if(strlen($pg)<=1){
        $pg = "";
    }
    if(strlen($arr['params']['UID'])<=0){
        $strWhere = " '(".$whr.")' ";
    }else{
        /* СТАРАЯ ВЕРСИЯ 'Андрей' */
//        $strWhere = "'[__key]=0 AND real__Ssylka =dbo.xx_getid_bin (''".$arr['params']['UID']."'') AND (".$whr.")'";

        /* НОВАЯ ВЕРСИЯ 'Юра' */
        $strWhere = "'[__key]=0 AND [real__ssylka] = dbo.xx_getid_bin(''".$arr['params']['UID']."'') AND (".$whr.")'";
    }
    /* старая версия */
//    $qJS = "select dbo.get_data_form_group_js_all(".$arr['TableID'].",".$arr['params']['GroupID'].", ".$strWhere.", '1','".$pg."','".$headers."')";
    /* новая версия */
    $qJS = "select dbo.get_data_form_group_js(".$arr['TableID'].",".$arr['params']['GroupID'].", ".$strWhere.", '1','".$pg."')";
    //echo "1 " .$qJS;
    $str = ms_query_js($qJS,FROM_NEW_DB);
    $res_str = '';
    foreach ($str[0] as $val){
        $res_str = $val;
    }

    $res = ms_query_simple($res_str, FROM_NEW_DB);

    $func = " 'extractValuesTable': ";
    checkSQL($res,$func.$res_str);
    return json_encode($res, JSON_INVALID_UTF8_SUBSTITUTE);
}

function v2_base64_url_encode($input) {
    return strtr(base64_encode($input), '+/=', '._-');
}

function v2_deleteFile($arr){
    $address = str_replace("http://".URL_ADDRESS,"..",$arr['params']['url']);
    if(is_file($address)){
        unlink($address);
    }
}
function v2_extractReportsManualSelect($arr){
    if(strlen($arr['params']['variant'])>0){
        return "";
    }else{
        $user = v2_getUser();
        $q = "SELECT val_param FROM xx_reports_manual_select WHERE [user] = '".$user['log']."' AND [report_id] = ".$arr['TableID'];
        $res = ms_query_simple($q);
        return $res[0]['val_param'];

    }

}
function v2_getReportHeaders($arr){
    $q = "SELECT header_json FROM xx_reports_headers WHERE report_id = '".$arr['TableID']."'";
    $json = ms_query_simple($q);
    if(strlen($json[0]['header_json']) <= 3){
        return '{"ERROR":"Заголовок отчёта не найден"}';
    }
    return $json[0]['header_json'];
}
function v2_extractInfoReportsTable($arr)
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
//    echo  $nam[0]['form_name_1C'];
    $table = base64_url_encode($nam[0]['form_name_1C'].$arr['params']['variant']);
    $arrResult = [];
    $prokladka = [];
    $host_api = MAIN_IP_FOR_GET_DATA . "getinfo/" .$table."_";
    $res = curlCombain($host_api,[],[],true);
//    echo "<pre>"; print_r($res); echo "</pre>";die();
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
function v2_extractDataReportsTableEXCEL($arr){
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

        if($vall['type'] == 'select' && false === is_array($vall['_ssylka']) && $vall['editable'] == true ){
            foreach ($vall['list_values'] as $check){
                if($check['value'] == $vall['value']){
                    $arrInfo[$i]['Значение'] = $check['key'];
                    $arrInfo[$i]['Тип'] = $check['type'];
                    if(!isset($check['key'])){
                        $arrInfo[$i]['Значение'] = $vall['Тип'].".".$vall['_ssylka'];
                    }
                }
            }
        }elseif(is_array($vall['_ssylka']) && $vall['type'] == 'select' && $vall['editable'] == true){
            $arrUid = [];
            foreach ($vall['_ssylka'] as $uid) {
                $arrUid[] = $vall['Тип'] . "." . $uid;
            }
            $arrInfo[$i]['Значение'] = $arrUid;
        }elseif($vall['type'] == 'select' && $vall['editable'] == false){
            $arrInfo[$i]['Значение'] = $vall['Значение'];
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
//    echo "<pre>"; print_r($resArrInfo); echo "</pre>";die();
//    echo "---".json_encode($resArrInfo,JSON_UNESCAPED_UNICODE);
//    die();
    $edit = curlCombain($host_api, $resArrInfo, [],true,true);
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
function v2_extractDataReportsTable($arr){
    /*
     1 - 110723 - добавил символ "_" в конце $table что бы все строки гарантированно оканчивались НЕ точкой
     */
    $arrInfo = [];
    $i = 0;
    $test = "";
    //echo "<pre>"; print_r($arr['params']['info']); echo "</pre>";
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
    //echo $res;
//    die();
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


function v2_grossSerch($arr){
    $q = "SELECT name_rus, form_id , menu_type FROM dbo.xx_menu_form_rel WHERE name_rus LIKE '%".$arr['params']['where']."%' AND (menu_type = 'form' OR menu_type = 'report')";
    $res = ms_query_simple($q);
    $func = " 'grossSerch': ";
    checkSQL($res,$func.$q);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);

}
function v2_getDocFromSIOPR($arr){
    /* ВРЕМЕННОЕ РЕШЕНИЕ */
//    $test = ["TableID" => 188];
//    $arrProto = getListForDocument($test);

//    echo "<pre>"; print_r($arrProto); echo "</pre>";

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
    $res = v2_curlCombain($host_api,$arrRes,[]);
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
    v2_isDir($obj,'docs');
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

function v2_getDocParamsFileForSIOPR($str){
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

function v2_extractAllData($arr){
    $userID = v2_getUserID();
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
function v2_getListForDocument($arr){
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
    return json_encode($res);
}

function v2_exitUser(){
    session_start();
    $_SESSION['login'] = "";
    $_SESSION['verified'] = 0;
    verifide();
}

function v2_setSessionToJS($num){
    if($num == 0) {
        session_start();
        header('Content-type: application/json');
        return json_encode($_SESSION);
    }elseif ($num == 1){
        session_start();
        header('Content-type: application/json');
        $arr['userID'] = v2_getUserID();
        $arr['name'] = $_SESSION['login']; // прод

//        $arr['name'] = "Юрий Дяденко"; // тетс
        return json_encode($arr);
    }
}

function v2_getUploadFilesFromVUE($arr){
//    echo "<pre>"; print_r($arr); echo "</pre>";
//    return $arr;
}

function v2_extractorFromDBtoDB(){
//    $q = "select top 10 * from xx_dt_StatsionarnyeTorgovyeObekty";
//    $res = ms_query_simple($q);
//    echo "<pre>"; print_r($res); echo "</pre>";
}

function v2_verifide(){
    session_start();
    if($_SESSION['login'] == "" || $_SESSION['verified'] == 0 ){
        header('Location: ../index.php' , true, 301);
    }
}
function v2_saveAdminReportsSettings($arr){
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
function v2_saveReportsSettings($arr){
    /* Пользователя ловлю Сам, что бы ребята не прокидывали */
//    echo "<pre>"; print_r($arr); echo "</pre>";
    $user = v2_getUser();
    $json_st = json_encode($arr['params'][0]['state'],JSON_UNESCAPED_UNICODE);
    $json_fl = json_encode($arr['params'][0]['filter'],JSON_UNESCAPED_UNICODE);
    $q = "dbo.insert_report_user_par ".$arr['TableID']." , '".$user['log']."', '".$arr['params'][0]['name']."' ,'".json_encode($json_st,JSON_UNESCAPED_UNICODE)."','".json_encode($json_fl,JSON_UNESCAPED_UNICODE)."'";
//    echo $q;
    $res = ms_query_simple($q);
    $func = " 'saveReportsSettings': ";
    checkSQL($res,$func.$q);
    return 1;
}
function v2_loadAdminReportsSettings($arr){
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
function v2_loadReportsSettings($arr){
    $user = v2_getUser();
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
function v2_delReportsSettings($arr){
    $user = v2_getUser();
    $q = "DELETE FROM dbo.xx_report_user_param where report_id = ".$arr['TableID']." AND [user] = '".$user['log']."' AND report_name = '".$arr['params'][0]['name']."'";
//    echo $q;
    $res = ms_query_simple($q);
    $func = " 'delReportsSettings': ";
    checkSQL($res,$func.$q);
}
function v2_delAdminiReportsSettings($arr){
    $q = "DELETE FROM dbo.xx_report_admin_param where report_id = ".$arr['TableID']." AND variant LIKE '%".$arr['params'][0]['variant']."%'";
    $res = ms_query_simple($q);
    $func = " 'delAdminReportsSettings': ";
    checkSQL($res,$func.$q);
}
function v2_getTableFromDB($arr){
    $where = "";
    if(strlen($arr['params']['where']) > 0){
        $where .= " WHERE ".$arr['params']['where'];
    }
    if(strlen($arr['params']['order']) > 0){
        $where .= " ORDER BY ".$arr['params']['order'];
    }
    $q = "SELECT * FROM ".$arr['TableID'].$where;
//    echo $q;
    $res = ms_query_simple($q);
//    echo "<pre>"; print_r($res); echo "</pre>";
    $func = " 'getTableFromDB': ";
    checkSQL($res,$func.$q);
    $str = json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
////    echo $str;
//    $str = implode(",",$res);
    return $str;
}

function v2_getTableDistinct($arr){
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
function v2_updateByKey($arr){
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
function v2_updateByWhere($arr){
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
function v2_insertInDBNotReturn($arr){
    $table = $arr['TableID'];
    $q = "INSERT INTO ".$table." (".$arr['params']['fields'].") VALUES (".$arr['params']['values'].") ";
//    echo $q;
    $res = ms_query_simple($q);
    $func = " 'insertInDBNotReturn': ";
    checkSQL($res,$func.$q);
}
function v2_insertInDB($arr){
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
function v2_uploadExcelFileInTable($arr){
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
}

function v2_upadateFormGroupLevel($arr){
    $q = "dbo.update_form_groups_level '".$arr['params']['form_name']."'";
    $res = ms_query_simple($q);
    $func = " 'upadateFormGroupLevel_1': ";
    checkSQL($res,$func.$q);
    $q = "dbo.create_view_form '".$arr['params']['form_name']."'";
    $res = ms_query_simple($q);
    $func = " 'upadateFormGroupLevel_2': ";
    checkSQL($res,$func.$q);
    $q = "dbo.create_view_form_all_fields '".$arr['params']['form_name']."'";
    $res = ms_query_simple($q);
    $func = " 'upadateFormGroupLevel_3': ";
    checkSQL($res,$func.$q);
}
/* Копирование формы */
function v2_replicationForm($arr){
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
function v2_getMaxValue($arr){
    $table = $arr['TableID'];
    $field = $arr['params']['column_name'];
    $q = "SELECT max([".$field."]) val FROM ".$table;
    $res = ms_query_simple($q);
    $func = " 'getMaxValue': ";
    checkSQL($res,$func.$q);
    return $res[0]['val'];
}
function v2_deleteByKey($arr){
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
/* генератор круговых диаграмм */
function v2_torusGenerator($arr,$key,$link,$sum,$flag){
    $arrKeyList = [];
    $arrResLabel = [];
    foreach ($arr as $val) {
        foreach ($val as $k => $value) {
            if ($k == $key) {
                if (!in_array($value, $arrKeyList)) {
                    array_push($arrKeyList, $value);
                }
            }
        }
    }

    foreach ($arrKeyList as $kk => $keyVal){
        $arrLab = [];
        $arrData = [];
        foreach ($arr as $val) {
            if($val[$key] == $keyVal){
                if($flag == "set_1") {
                    $str = $val[$link];
                }else{
                    $str = $val['Регион'];
                    if(strlen($str)<=0){
                        $str = $val[$link];
                    }
                }
                array_push($arrLab, $str);
                array_push($arrData, $val[$sum]);
            }
        }
        $arrResLabel[$kk] = ["title" =>$keyVal,"labels" =>$arrLab,"data" =>$arrData];
    }
    return $arrResLabel;
}

function v2_get_headers_from_curl_response($response)
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
function v2_deleteFormByID($arr){
    $q = "dbo.delete_form ".$arr['TableID'];
    $res = ms_query_simple($q);
    $func = " 'deleteFormByID': ";
    checkSQL($res,$func.$q);
    return $res;
}
function v2_countRows($arr){
    $whr = $arr['params']['where'];
    $left_join = $arr['params']['left_join'];
    if($arr['params']['specific']=="" || !isset($arr['params']['specific'])){
        $q = "select COUNT(*) as ct from form_".$arr['TableID']."_v ".$left_join." WHERE ".$whr;
    }else{
        $q = "select COUNT(*) as ct from all_form_".$arr['TableID']."_v ".$left_join." WHERE ".$whr;
    }


    $res = ms_query_simple($q);
    return $res[0]['ct'];
//    return "-1";
}
function v2_changeDefaultUserFilter($arr){
    $user_id = v2_getUserID();
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

function v2_saveUserFilter($arr){
    $user_id = v2_getUserID();
    $q = "SELECT user_name FROM xx_form_user_filter WHERE user_id = '".$user_id."' AND form_id = '".$arr['TableID']."' AND _default = '1'";
    $res = ms_query_simple($q);
    $func = " 'saveUserFilter_1': ";
    checkSQL($res,$func.$q);
//    echo "<pre>"; print_r($arr['params']['filter_js']);  echo "</pre>";
    //$q = "dbo.update_form_users ".$arr['TableID'].", ".$user_id.", '".$arr['params']['text_js']."' , '".$arr['params']['filter_js']."', ".$arr['params']['id'].", ".$arr['params']['ud'].", '".$arr['params']['form_user_name']."', ".$arr['params']['default'];
    $q = "SET NOCOUNT ON declare @id int exec @id = dbo.update_form_users ".$arr['TableID'].", ".$user_id.", '".$arr['params']['text_js']."' , '".$arr['params']['filter_js']."', ".$arr['params']['id'].", ".$arr['params']['ud'].", '".$arr['params']['form_user_name']."', ".$arr['params']['default']." select @id as res";
//    $q = "declare @id int exec @id = dbo.update_form_users 1327, 1, '{}','{}', 0, 0, 'тест', 0 select @id as res";

    //  $res = ms_query_simple_arr($q);
//   $q = "select dbo.update_form_users_f (".$arr['TableID'].", ".$user_id.", '".$arr['params']['text_js']."' , '".$arr['params']['filter_js']."', ".$arr['params']['id'].", ".$arr['params']['ud'].", '".$arr['params']['form_user_name']."', ".$arr['params']['default'].")";
//    echo $q;
    $res_ID = ms_query_simple_exec($q);
    //$res = ms_query_simple($q);
    $func = " 'saveUserFilter_2': ";
    checkSQL($res_ID,$func.$q);
    //$q = "dbo.create_view_form_users ".$arr['TableID'].", ".$user_id;
    $q = "dbo.create_view_form_users ".$res_ID;
    $res = ms_query_simple($q);
    $func = " 'saveUserFilter_3': ";
    checkSQL($res,$func.$q);
    return '{"ID":"'.$res_ID.'"}';
}

function v2_getUserFilter($arr){
    $userId = v2_getUserID();
    if(isset($arr['params']['filter_id']) && $arr['params']['filter_id'] > 0){
        $q = "SELECT filter_js,id FROM xx_form_user_filter WHERE user_id = '" . $userId . "' AND form_id = '" . $arr['TableID'] . "' AND id = ".$arr['params']['filter_id'];
    }else {
        $q = "SELECT filter_js,id FROM xx_form_user_filter WHERE user_id = '" . $userId . "' AND form_id = '" . $arr['TableID'] . "' AND _default = 1";
    }
    $res = ms_query_simple($q);
    $func = " 'v2_getUserFilter': ";
    checkSQL($res,$func.$q);
    return json_encode($res[0]);
}
function v2_getUserFilters($arr){
    $userId = v2_getUserID();
    $q = "SELECT id,_default,form_user_name FROM xx_form_user_filter WHERE user_id = '".$userId."' AND form_id = '".$arr['TableID']."'";
    $res = ms_query_simple($q);
    $func = " 'v2_getUserFilters': ";
    checkSQL($res,$func.$q);
    return json_encode($res);
}
function v2_сreateLayerInMap($arr){
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

    $res = v2_curlCombain($url,$arrJson,[]);

    return '{"URL":"'.$res['answer'].'"}';
}
function v2_getIDForReport($arr){
    $type = $arr['params']['type'];
    $guid = $arr['params']['GUID'];

    /* возможно современем стоит исправить  */
    if($type == 'кс_ФормаКатегорирования'){
        return '{"ID":"1851"}';
    }

    $q = "SET NOCOUNT ON declare @_ret int exec @_ret = dbo.get_form_id '".$type."' ,'".$guid."' select @_ret as res";

    $res_ID = ms_query_simple_exec($q);
    $func = " 'getIDForReport': ";
    checkSQL($res_ID,$func.$q);
    return '{"ID":"'.$res_ID.'"}';

}
function v2_updateRegisterData($arr){
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = $arr['params']['json'];
    $res = v2_curlCombain($url,$arrJson,[]);
    return '{"URL":"'.$res['answer'].'"}';
}
function v2_getAdresnyeObektyRow($arr){
    $arrJson = [
        "Сервис" => "ПолучитьАдрес",
        "Параметры" => $arr['params']
    ];
//    echo "<pre>"; print_r($arrJson); echo "</pre>";
//    echo "<pre>"; print_r($arrJson); echo "</pre>";
//    echo "<pre>"; print_r($arr['params']); echo "</pre>";
//    echo "<pre>"; print_r($arrJson); echo "</pre>";
//    die();
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $res = v2_curlCombain($url,$arrJson,[]);
    return json_encode($res);

}
function v2_pushInDocument($arr){
    $url = MAIN_IP_FOR_GET_DATA."putindocument";
    $res = v2_curlCombain($url,$arr['params']['fields'],[]);
    return json_encode($res);
}
function v2_getAdresnyeObekty($arr){
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
function v2_getEMailResident($arr){
    $and = "";
    if(strlen($arr['params']['name'])>0){
        $and = " AND a.[_Naimenovanie] in(".$arr['params']['name'].")";
    }
    $q = "select a.[_Naimenovanie]as name, b.[_AdresEP] as mail
  from xx_Polzovateli a  
  JOIN xx_Polzovateli_KontaktnayaInformatsiya b on b.[_Ssylka] = a.[_Ssylka]
  WHERE b._Vid = dbo.xx_getid_bin('b930f2d1-4c2b-4f78-a697-4b87e83c8dd0')".$and;
    $res = ms_query_simple($q);
    $func = " 'getEMailResident_1': ";
    checkSQL($res,$func.$q);
    $str = json_encode(array_slice($res, 0, 15),JSON_INVALID_UTF8_SUBSTITUTE); // ВРЕМЕННО

    return $str;
}
function v2_getCallingMethodName(){
    class Test {
        function v2___construct() {
            throw new Exception('FATAL ERROR: bla bla...');
        }
    }
    try {
        $obj = new Test();
    } catch(Exception $e) {
        var_dump($e->getTrace());
    }
}
function v2_setSql($q){
    $res = ms_query_simple($q);
    $func = " 'setSql': ";
    checkSQL($res,$func.$q);
    $str = json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
    return $str;
}
function v2_sendFilesToSIOPR($arr){
    $user = v2_getUser();
    $ext = pathinfo($arr['address'], PATHINFO_EXTENSION);
    $fileStr = file_get_contents($arr['address']);

    $postdata = array( "name" => $arr['name'],
        "format" => $ext,
        "email" => "shipilovskiy@ya.ru",
        "xx_type" => $arr['xx_type'],
        "xx_guid" => $arr['xx_guid'],
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
function v2_sendEmailReport($arr){
    //echo "<pre>"; print_r($arr); echo "</pre>";
    $arrMails=[];
    /* парсим пришедшие данные от СИОПР ВЕБ */
    foreach ($arr['params']['emails'] as $k=>$val){
        $arrMails[]=$val['mail'];
    }
    //die();
    /* создаём файл из потока для гарантии */
    $address = "../upload/docs/reports/".$arr['params']['tytle']."_".time().".pdf";
    file_put_contents($address, base64_decode($arr['params']['file']));
    /* создаём тело письма */

    $filename = $address; //Имя файла для прикрепления
    $to = implode(",",$arrMails); //Кому
    $from = "webmaster@sioprweb.mos.ru"; //От кого
    $subject = $arr['params']['tytle']; //Тема
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
    if($res === true){
        $ans = "Письмо отправлено";
    }else{
        $ans = "Письмо не отправлено";
    }
    return '{"ERROR":"' . $ans . '"}';
}

$res = [];
function v2_rec ($arr, $level = 0) {
    global $res;
    foreach ($arr as $k => $v) {
        if (is_array($arr[$k])) {
            $res[][$level]=$k;
            rec($v, $level + 1); // увеличиваем уровень вложенности, если текущий элемент массив
        } else {
            if($level > 1)
                //echo str_repeat('  ', $level - 1); // делаем отступ в зависимости от вложенности
                $res[][$level] = $v;
            //echo $v.PHP_EOL."<br>\r\n"; // PHP_EOL перенос строки
        }
    };
    return $res;
};
function v2_charToNum($char){
    return ord(strtoupper($char)) - ord('A');
}
/* Выбор настроек отчёта в зависимости от названия */
function v2_selectXlsxSchem($N){
    $arrN = [
        'пб_ОтчетПоПоступлению'=>[
            'columnRange'=>['F','C','B'],
            'typeCalc'=>[9],
            'arrColumnForCalc'=>['H'=>'middle','I'=>'middle','J'=>'middle','K'=>'middle','L'=>'middle'],
            'columnSort' => ['F'=>'SORT_DESC','C'=>'SORT_DESC','B'=>'SORT_DESC'],
            'formula' => []

        ],
        'пб_АналитическийОтчетОПоступленииТоваров_'=>[
            'columnRange'=>['C','B','D'],
            'typeCalc'=>[9],
//            'arrColumnForCalc'=>['F'=>'bottom'],
            'arrColumnForCalc'=>['F'=>'bottom'],
            'columnSort' => ['B'=>'SORT_DESC','D'=>'SORT_DESC','C'=>'SORT_DESC'],
            'formula' => []
        ]
    ];
    if(!isset($arrN[$N])){
        $arrN[$N] = [
            'columnRange'=>'B',
            'typeCalc'=>[9],
            'arrColumnForCalc'=>['C'=>'bottom'],
            'columnSort' => ['B'=>'SORT_ASC'],
            'formula' => []
        ];
    }
    /* возвращает настройки отчёта  */
    return $arrN[$N];
}


/* настройка сортировки массива в зависимости от выбранных столбцов таблицы */
function v2_resProtoGenerator($arrVal, $arrKey, $typeCalc = [3], $arrColumnForCalc = ['M'=>'bottom', 'N'=>'right']){
    $protoVal = array_slice($arrVal,0,10);
//    echo "<pre>"; print_r($protoVal); echo "</pre>";
    /* получаем индексы ключей (С == 3) */
    $arrProtoKey = [];
    foreach ($arrKey as $kik => $value) {
        if (!is_numeric($kik)) {
            $arrProtoKey[charToNum($kik)] = $value;
        }
    }

    /* выполнили фильтрацию многомерного массива по одномерным массивам */
    $i = 0;
    foreach ($arrProtoKey as $keyNum => $paramSort){
        $protoValTest[$i] = array_column($protoVal, array_keys($protoVal[0])[$keyNum]);
        $i++;
    };
    if($i==5) {
        array_multisort(
            $protoValTest[0], $arrProtoKey[array_keys($arrProtoKey)[0]],
            $protoValTest[1], $arrProtoKey[array_keys($arrProtoKey)[1]],
            $protoValTest[2], $arrProtoKey[array_keys($arrProtoKey)[2]],
            $protoValTest[3], $arrProtoKey[array_keys($arrProtoKey)[3]],
            $protoValTest[4], $arrProtoKey[array_keys($arrProtoKey)[4]],
            $protoVal
        );
    }elseif($i==4) {
        array_multisort(
            $protoValTest[0], $arrProtoKey[array_keys($arrProtoKey)[0]],
            $protoValTest[1], $arrProtoKey[array_keys($arrProtoKey)[1]],
            $protoValTest[2], $arrProtoKey[array_keys($arrProtoKey)[2]],
            $protoValTest[3], $arrProtoKey[array_keys($arrProtoKey)[3]],
            $protoVal
        );
    }elseif($i==3) {
        array_multisort(
            $protoValTest[0], $arrProtoKey[array_keys($arrProtoKey)[0]],
            $protoValTest[1], $arrProtoKey[array_keys($arrProtoKey)[1]],
            $protoValTest[2], $arrProtoKey[array_keys($arrProtoKey)[2]],
            $protoVal
        );
    }elseif ($i==2){
        array_multisort(
            $protoValTest[0], $arrProtoKey[array_keys($arrProtoKey)[0]],
            $protoValTest[1], $arrProtoKey[array_keys($arrProtoKey)[1]],
            $protoVal);
    }elseif ($i==1){
        array_multisort(
            $protoValTest[0], $arrProtoKey[array_keys($arrProtoKey)[0]],
            $protoVal);
    }

    $arrRes = [];
//echo "<pre>"; print_r($arrColumnForCalc); echo "</pre>";
    $sumCalc = count($arrProtoKey);
    $pif=0;

    $flag = 'all';                                                                                              // флаг для вывода всех значений
    $kkPos = 0;
    $arrPreKeySet = [];
    $ii = 0;
    foreach ($protoVal as $kk => $val){                                                                                 // цикл основного массива значений
        foreach ($arrColumnForCalc as $namCol => $typeCalc) {                                                           // цикл обхода колонок для подсчётов

            $num = charToNum($namCol);
            if($sumCalc==5){

            }elseif ($sumCalc==4){

            }elseif ($sumCalc==3) {

                $arrPreKeySet[0] = $val[array_keys($val)[array_keys($arrProtoKey)[0]]];
                $arrPreKeySet[1] = $val[array_keys($val)[array_keys($arrProtoKey)[1]]];
                $arrPreKeySet[2] = $val[array_keys($val)[array_keys($arrProtoKey)[2]]];

                if ($typeCalc == 'bottom') {
                    if($flag == 'all') {
                        $arrRes
                        [$arrPreKeySet[0]]
                        [$arrPreKeySet[1]]
                        [$arrPreKeySet[2]]
                        [] = $val[array_keys($val)[$num]];
                    }
                    $arrRes[$arrPreKeySet[0]][$arrPreKeySet[1]]['СУММА '.$arrPreKeySet[2]] += $val[array_keys($val)[$num]];
                }elseif ($typeCalc == 'middle'){
//                    echo $arrPreKeySet[0]." ".$arrPreKeySet[1]." ".$arrPreKeySet[2]." ".$namCol." = ";
//                    echo $pif."<br>";
                    if($flag == 'all') {
                        $arrRes[$arrPreKeySet[0]][$arrPreKeySet[1]][$arrPreKeySet[2]][$namCol][] = $val[array_keys($val)[$num]];
                    }
                    if($kkPos != $kk) {
                        $arrRes
                        [$arrPreKeySet[0]]
                        [$arrPreKeySet[1]]
                        ['СРЕДНЕЕ ' . $arrPreKeySet[2]][] = $pif;
//                        echo $pif."<br>";
                        $kkPos = $kk;
                        $pif = 0;
                    }
                    $pif += (int)$val[array_keys($val)[$num]];
                }

            }elseif ($sumCalc==2){

            }elseif ($sumCalc==1){

            }
        }
    }

//    echo "<pre>"; print_r($arrRes); echo "</pre>";
    /* формирование одномерного массива для вывода */
//    $ress = rec($arrRes);
//    return $ress;
}




/* Основная функция для создания XLSX */
function v2_xlsx_creator($arr,$nam){
    $user = v2_getUser();
    $inputFileName = $_SERVER["DOCUMENT_ROOT"].'/xlsxgenerator/xlsx_patterns/pattern_1.xlsx';
    $inputFileType = IOFactory::identify($inputFileName);
    $reader = IOFactory::createReader($inputFileType);
    $spreadsheet = $reader->load($inputFileName);
    $sheet = $spreadsheet->getSheet(0);
    $filename = $_SERVER["DOCUMENT_ROOT"].'/xlsxgenerator/upload_reports/new_'.$nam.'_'.str_replace(" ","_",$user['log']).'_'.date("Y-m-d").'.xlsx';
    $headers = [];
    $headers[0][0] = "НПП";

    foreach ($arr['data'] as $zag){
        $headers[0][] = $zag['headerName'];
    }

    /* набор параметров для сортировки массива */
    $arrN = selectXlsxSchem($nam);
    /* отсортированный массив */
    $arrResProto = resProtoGenerator($arr['values'], $arrN['columnSort'],$arrN['typeCalc'],$arrN['arrColumnForCalc']);
    /* результирующий массив данных  */
//    $arrRes = dataConverterForXLSX($arr['values'], $arrN['columnRange'],$arrN['typeCalc'],$arrN['arrColumnForCalc']);
//    $arrRes = dataConverterForXLSX($arrResProto, $arrN['columnRange'],$arrN['typeCalc'],$arrN['arrColumnForCalc']);
//    echo "<pre>"; print_r($arrRes); echo "</pre>";

    /* формируем и записываем верхнюю строчку с названиями столбцов */
    /*
    $row=0;
    foreach ($headers as $k=>$val){
        $row++;
        $sheet->fromArray([$val], NULL, 'A'.$row);
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);
    }
    /* записываем данные в таблицу целиком */
    /*
    $sheet->fromArray($arrRes['val'], NULL, 'A2');
    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);

    /* устанавливаем уровень вложенности строк */
    /*
        $row=2;
        while ($row <= count($arrRes['val'])){
            if(in_array($row,$arrRes['lvl'])) {
                $sheet->getRowDimension($row)->setOutlineLevel(1);
            }else {
                $sheet->getRowDimension($row)->setOutlineLevel(2);
            }
            if($row == count($arrRes['val'])){
                $sheet->getRowDimension($row)->setOutlineLevel(2);
                $sheet->getRowDimension($row+1)->setOutlineLevel(0);
            }
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);
    */
}
function v2_getUsersGroup(){
    $q = "SELECT * FROM xx_group_users";
    $res = ms_query_simple($q);
    return json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
}
function v2_getBPRFilters($arr){
    $q = "select * from xx_form_bpr_filters a where form_id = ".$arr['TableID']." and role_id = ".$arr['param']['role_id'];
    $res = ms_query_simple($q);
    $func = " 'getBPRFilters_1': ";
    checkSQL($res,$func.$q);
    $str = json_encode($res,JSON_INVALID_UTF8_SUBSTITUTE);
    return $str;
}
function v2_getURLExcel($param){
    $user = v2_getUser();
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

    ];
    if(isset($arrParams[$param])){
        // прод
//        $url = "https://".$_SERVER['SERVER_NAME'].'/xlsxgenerator/upload_reports/new_'.$arrParams[$param].'_'.str_replace(" ","_",$user['log']).'_'.date("Y-m-d").'.xlsx';
        // тест
        $url = "http://".$_SERVER['SERVER_NAME'].'/xlsxgenerator/upload_reports/new_'.$arrParams[$param].'_'.str_replace(" ","_",$user['log']).'_'.date("Y-m-d").'.xlsx';
        return '{"URL":"' . $url . '"}';
    }else{
        return '{"ERROR":"отчёт в VUE"}';
    }
}