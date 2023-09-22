<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';

$ignorStr = [
    "TAB_MAIN","GROUP","ADD","type_block"
];
//echo "<pre>"; print_r($_POST); echo "</pre>";
$q_arr = [];
$q_ins_arr = [];
foreach ($_POST as $k => $val){
    if(!in_array($k,$ignorStr)){
            $ke = "[".$k."]";
        if(!is_numeric($val) || $val == "") {
            $q_arr[$k] = $ke . " = '" . $val . "' ";
            $q_ins_arr['filds'][$k] = $ke;
            $q_ins_arr['values'][$k] = "'" . $val . "'";
        }else{
            $q_arr[$k] = $ke . " = " . $val . " ";
            $q_ins_arr['filds'][$k] = $ke;
            $q_ins_arr['values'][$k] = $val;
        }
    }
}
if(($_POST['type_block'] == "GROUP" || $_POST['type_block'] == "TABS") && $_POST['ADD'] == ""){
    $q_str_tab = "UPDATE ".$_POST['TAB_MAIN']." SET ";
    $q_str_where .= " WHERE ID = ".$_POST['ID'];
    $arrVal = explode("|", $_POST['group_id']);
    if(is_array($arrVal) && count($arrVal)>1){
        $q_arr['tab_id'] = '[tab_id] = '.$arrVal[0];
        $q_arr['group_id'] = '[group_id] = '.$arrVal[1];
    }
    $q = $q_str_tab.implode(", ",$q_arr).$q_str_where;
}elseif($_POST['ADD'] == "Y"){
    $q_str_tab = "INSERT INTO ".$_POST['TAB_MAIN']." (";
    $arrVal = explode("|", $_POST['group_id']);

    if(is_array($arrVal) && count($arrVal)>1){
        $q_ins_arr['values']['tab_id'] = $arrVal[0];
        $q_ins_arr['values']['group_id'] = $arrVal[1];
    }
    $q_str_where .= ") VALUES (".implode(",", $q_ins_arr['values']).")";
    $q = $q_str_tab.implode(", ",$q_ins_arr['filds']).$q_str_where;
}
if($_POST['type_block'] == "ELEMENT"){
    //$q_str_tab = "UPDATE xx_form_fields SET group_id = ".$_POST['group_id']." WHERE ID = ".$_POST['ID'];

    $q_str_tab = "UPDATE xx_form_fields SET ";
    $q_str_where .= " WHERE ID = ".$_POST['ID'];
    $arrVal = explode("|", $_POST['group_id']);
    if(is_array($arrVal) && count($arrVal)>1){
        $q_arr['group_id'] = '[group_id] = '.$arrVal[1];
    }
    $q = $q_str_tab.implode(", ",$q_arr).$q_str_where;

    //$q = $q_str_tab;
}
echo $q;
$res = ms_query_update($q);