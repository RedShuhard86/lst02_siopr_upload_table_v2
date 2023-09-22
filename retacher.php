<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';
//
$table = "users_siopr";
$query = "TRUNCATE TABLE ".$table;
echo "Чистим таблицу ".$table."<br>";
ms_query_simple($query);
$table_group_user = "xx_group_users";
$query_group_user = "TRUNCATE TABLE ".$table_group_user;
//
echo "Чистим таблицу ".$table_group_user."<br>";
ms_query_simple($query_group_user);

$authoriz = [
    'SIOPR'=>array(
//        'url'=>"http://172.24.48.3/1Cv82dt/hs/PortalService/list/",
    'url'=>"http://192.168.110.3:82/pre1Cv82dt/hs/PortalService/list/",
//        'logPass'=>"bitrix:bitrix_!"
    'logPass'=>"portalservice:portal!@3"
    )

];
function getArray($sector){
    global $authoriz;
    $url = $authoriz[$sector]['url'];
    $logPass = $authoriz[$sector]['logPass'];
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_USERPWD, $logPass);
    $res_insert = curl_exec($curl);
    curl_close($curl);
    $res_insert = json_decode($res_insert, TRUE);
    if(!count($res_insert)){
        echo "Нет данных от ".$sector;
    }else{
        foreach($res_insert as $k=>$val){
            if($sector == 'SIOPR'){
                $res_insert[$k]['siopr'] = 1;
                $res_insert[$k]['mc'] = 0;
                $res_insert[$k]['portal'] = 1;
                $res_insert[$k]['mi'] = 1;
                $res_insert[$k]['map'] = 0;
            }elseif($sector == 'FIN'){
                $res_insert[$k]['siopr'] = 0;
                $res_insert[$k]['mc'] = 1;
                $res_insert[$k]['portal'] = 0;
                $res_insert[$k]['mi'] = 0;
                $res_insert[$k]['map'] = 0;
            }
        }
//        echo "<pre>"; print_r($res_insert); echo "</pre>";
        return $res_insert;
    };
};
echo "Добавляем записи<br>";

foreach($authoriz as $nam => $nan ){
    $connection = OpenConnection();
    $arr = getArray($nam);
    $arrValues = [];
    $arrValuesAuth = [];
    $i = 0;
    $arrWTU = getWTUsers();

    foreach($arr as $k=>$val){
        $arrValues[] = "('".$val['login']."','".$val['hash']."',".$val['siopr'].",".$val['mc'].",".$val['portal'].",".$val['mi'].",".$val['map'].",'".$val['session']."')";
        $arrValuesAuth[] = "('".$val['login']."','".explode(",",$val['hash'])[0]."',1,0,0,0,'".date("Y-m-d H:i:s")."',0)";
        $i++;
//        if(!in_array($val['login'],$arrWTU)){
//            $arrValuesWT[] = "('".$val['login']."')";
//        }
        if($i >= 100){
            $q = "INSERT INTO users_siopr ( [login], [hash], [siopr], [mc], [portal], [mi], [map], [session])
		VALUES ".implode(", ", $arrValues)." ;";
            ms_query_simple($q);
            $qA = "INSERT INTO users_siopr_auth ( [login], [hash], [active], [blocking], [first_auth], [admin], [date_creation], [user_id_who_change_auth])
		VALUES ".implode(", ", $arrValuesAuth)." ;";
            ms_query_simple($qA);
            $arrValues = [];
            $arrValuesAuth = [];
            $i = 0;
        }
    }
//    $q = "INSERT INTO xx_usersWorkTable ( [siopr_user] ) VALUES ".implode(", ", $arrValuesWT)." ;";
//      ms_query_simple($q);
//    $q = "INSERT INTO users_siopr ( [login], [hash], [siopr], [mc], [portal], [mi], [map], [session])
//		VALUES ".implode(", ", $arrValues)." ;";
//    ms_query_simple($q);
//    $qA = "INSERT INTO users_siopr_auth ( [login], [hash], [active], [blocking], [first_auth], [admin], [date_creation], [user_id_who_change_auth])
//		VALUES ".implode(", ", $arrValuesAuth)." ;";
//    $arrValues = [];
//    $arrValuesAuth = [];
//    ms_query_simple($qA);
}

function getWTUsers(){
    $q = "SELECT siopr_user FROM xx_usersWorkTable";
    $res = ms_query_simple($q);
    $retArr = [];
    foreach ($res as $val){
        $retArr[] = $val['siopr_user'];
    }
    return $retArr;
}
function curlGet($url, $arrJson = [], $arrHeader = []){
    if(count($arrHeader) <= 0){
        $arrHeader[] = "Content-Type: text/xml; charset=utf-8";
    }
//    echo $url;
    $json = json_encode($arrJson,JSON_UNESCAPED_UNICODE);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_USERPWD,  'bitrix:bitrix_!');
    curl_setopt($curl, CURLOPT_HTTPHEADER, $arrHeader);
    $res['answer'] = curl_exec($curl);
//    $res['url'] = $url;
//    $res['header'] = $arrHeader;
//    $res['json'] = $json;
//    $res['info'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//    $res['info_size'] = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
//    $res['ERROR'] = curl_error($curl);
    curl_close($curl);
//    echo "<pre>"; print_r($res); echo "</pre>";
    return $res['answer'];
}
/* пользователи с группами */
$arrGroupUser = [];
$res = downloadUsersGroup(0,100);
//echo "<pre>"; print_r($res); echo "</pre>";
insertGroupUserInDB($res, $query_group_user);
function downloadUsersGroup($p=0,$c=100){
    global $arrGroupUser;
//    $url = "http://10.15.48.3/1Cv82dt/hs/Bitrix/userlist?page=".$p."&count=".$c;
    $url = "http://192.168.110.3:82/pre1Cv82dt/hs/Bitrix/userlist?page=".$p."&count=".$c;
    $res = json_decode(curlGet($url),true);
    foreach ($res as $k=>$val){
        $login = $val['login'];
        $email = $val['email'];
        foreach ($val['groups'] as $n=>$group){
            $arrGroupUser[] = ["users"=>$login,"parent_group_name"=>$group['parent_group_name'],"group_name"=>$group['group_name'],"email"=>$email];
        }
    }
    if(count($res)>=$c){
        downloadUsersGroup(($p+1),100);
    }
    return $arrGroupUser;
}
function insertGroupUserInDB($arr,$query_group_user){
    ms_query_simple($query_group_user);
    global $table_group_user;
    foreach ($arr as $val){
        $qVal = [];
        foreach ($val as $key => $v){
            $qVal['key'][] = $key;
            $qVal['val'][] = "'".$v."'";
        }
        $q = "INSERT INTO ".$table_group_user." (".implode(',',$qVal['key']).") VALUES  (".implode(",",$qVal['val']).")";
        ms_query_simple($q);
    }
}