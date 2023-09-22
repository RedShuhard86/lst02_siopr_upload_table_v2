<?php
$ERROR = "";
$ACCEPT = "";
$table = "users_siopr_auth";
$EVENT = "";
$FieldsArrEVENT = [
    'event'=>'',
    'initiator'=>'',
    'event_time'=>'',
    'aftermath'=>'',
    'subordinate'=>'',
];
function getAllRoles(){
    $q = "SELECT role, name from xx_user_roles";
    $res = ms_query_simple($q);
    return $res;
}
function getAllRayons(){
    $q = "select dbo.xx_getid([_Ssylka]) guid, __Naimenovanie  from xx_dt_Rayony a";
    $res = ms_query_simple($q);
    return $res;
};
function getRealRayons($guid){
    $q = "select dbo.xx_getid([_Ssylka]) guid, __Naimenovanie from xx_dt_Rayony a where a.[_Vladelets] = dbo.xx_getid_bin('".$guid."')";
    $res = ms_query_simple($q);
    return $res;
};
function getRealRayon($guid){
    $q = "select __Naimenovanie n from xx_dt_Rayony a where dbo.xx_getid([_Ssylka]) = '".$guid."'";
    $res = ms_query_simple($q);
    return $res[0]['n'];
};
function getAllOkrug(){
  //  $q = "select _Naimenovanie n from xx_dt_Okruga a where dbo.xx_getid([_Ssylka]) = '".$guid."'";
    $q = "select dbo.xx_getid([_Ssylka]) guid, __Naimenovanie  from xx_dt_Okruga a";
    $res = ms_query_simple($q);
    return $res;
}
function getRealOkrug($guid){
    $q = "select _Naimenovanie n from xx_dt_Okruga where dbo.xx_getid([_Ssylka]) = '".$guid."'";
    $res = ms_query_simple($q);
    return $res[0]['n'];
};
function getUserSIOPRID($l){
    global $table;
    $q = "SELECT id FROM ".$table." WHERE login = '".$l."'";
    $res = ms_query_simple($q);
    if(count($res)<=0){
        $res[0]['id'] = -1;
    }
    return $res[0]['id'];
}
function sendDateToDBLog($arr){
    $filds = [];
    $vals = [];

    foreach ($arr as $k=>$val){
        $filds[]=$k;
        $vals[]=$val;
    }
    $valsStr = "(";
    foreach ($vals as $kk=>$vall){
        $separator = ",";
        if($kk >= (count($vals)-1)){
            $separator = "";
        }
        if(!is_numeric($vall)){
            $vall = "'".$vall."'";
        }
        $valsStr .= $vall.$separator;
    }
    $valsStr .= ") ";

    $q = "INSERT INTO users_events_report (".implode(",", $filds).") VALUES ".$valsStr;
    ms_query_simple($q);
}