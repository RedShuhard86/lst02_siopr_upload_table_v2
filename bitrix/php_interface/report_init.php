<?php

function check_IsHeaderHas($arr){
    $q = "SELECT count(report_id) as cnt FROM xx_reports_headers WHERE report_id = ".$arr['params']['report_id'];
    //echo $q;die();
    $res = ms_query_simple($q);
    return $res[0]['cnt'];
}

function check_IsFiltersHas($arr){
    $q = "SELECT count(report_id) as cnt FROM xx_reports_filters WHERE report_id = ".$arr['params']['report_id'];
    $res = ms_query_simple($q);
    return $res[0]['cnt'];

}
/* функция выгрузки заголовка по ID отчета */
function getReportHeaders($arr){
    $q = "SELECT header_json FROM xx_reports_headers WHERE report_id = '".$arr['TableID']."'";
    $json = ms_query_simple($q);
    if(strlen($json[0]['header_json']) <= 3){
        return '{"ERROR":"Заголовок отчёта не найден"}';
    }
    return $json[0]['header_json'];
}

/* сохранение настроек шапки отчета */

function setReportHeaders($arr){
    $q = "INSERT INTO xx_reports_headers (report_id, header_json) 
        VALUES ('".$arr['params']['report_id']."', '".json_encode($arr['params']['header_json'])."')";
    ms_query_simple($q);
    return '{"ERROR":"Произведена попытка сохранить шапку отчета '.$arr['params']['report_id'].'"}';
}

/* обновляет настроек шапки отчета */

function updateReportHeaders($arr){
    $q = "UPDATE xx_reports_headers SET header_json = '".json_encode($arr['params']['header_json'])."' WHERE report_id = '".$arr['params']['report_id']."'";
    ms_query_simple($q);
    return '{"ERROR":"Произведена попытка сохранить шапку отчета '.$arr['params']['report_id'].'"}';
}

/* получение всех полей для отчета по ID отчета */

function getAllFieldsByReport($arr){
    //$q = "SELECT ID as fields, field_rus as headerName FROM xx_form_fields WHERE form_id = ".$arr['params']['form_id'];
    $q = "SELECT ID as fields, field_rus as headerName, a.field_1c , a.field_name   FROM xx_form_fields a WHERE form_id = ".$arr['params']['form_id']." and  isnull(lTRIM( a.field_1c) ,'')<> '' and  isnull(lTRIM( a.field_name) ,'')<> '' ";
    $res = ms_query_simple($q);
    foreach ($res as $k=>$val){
        if(is_numeric($res[$k]['fields'])) {
            $res[$k]['fields'] = "a_" . $res[$k]['fields'];
        }
    }
    return json_encode($res,JSON_UNESCAPED_UNICODE);
}

/* получить список отчетов */

function getAllReports(){
    $q = "SELECT report_name,ID FROM xx_reports";
    $res = ms_query_simple($q);
    return json_encode($res,JSON_UNESCAPED_UNICODE);
}

function getAllDataFromForm($arr){
    $q = "SELECT ".$arr['params']['headers']." FROM dbo.form_".$arr['params']['form_id']."_v";
    //echo $q;
        $res = ms_query_simple($q);
    return json_encode($res,JSON_UNESCAPED_UNICODE);
}

function getFiltredDataFromForm($arr){
    $where = explode(",",$arr['params']['where']);
    $q = "SELECT ".$arr['params']['headers']." FROM dbo.form_".$arr['params']['form_id']."_v WHERE ".implode(" AND ",$where);
    //echo $q;
    $res = ms_query_simple($q);
    return json_encode($res,JSON_UNESCAPED_UNICODE);
}

function getAllReportsID(){
    $q = "SELECT report_id FROM xx_reports_headers";
    $res = ms_query_simple($q);
    $result = [];
    foreach ($res as $val){
        $result[]=$val['report_id'];
    }

    return json_encode($result,JSON_UNESCAPED_UNICODE);
}
function getAllFiltersID(){
    $q = "SELECT report_id FROM xx_reports_filters";
    $res = ms_query_simple($q);
    $result = [];
    foreach ($res as $val){
        $result[]=$val['report_id'];
    }

    return json_encode($result,JSON_UNESCAPED_UNICODE);
}

/* сохранение настроек фильтра отчета */

function setReportFilter($arr){
    $q = "INSERT INTO xx_reports_filters (report_id, filter_json) 
        VALUES ('".$arr['params']['report_id']."', '".json_encode($arr['params']['filter_json'])."')";
    ms_query_simple($q);
    return '{"ERROR":"Произведена попытка сохранить фильтр отчета '.$arr['params']['report_id'].'"}';
}

/* обновляет настроек фильтра отчета */

function updateReportFilter($arr){
    $q = "UPDATE xx_reports_filters SET filter_json = '".json_encode($arr['params']['filter_json'])."' WHERE report_id = '".$arr['params']['report_id']."'";
    //echo $q;
    ms_query_simple($q);
    return '{"ERROR":"Произведена попытка сохранить фильтр отчета '.$arr['params']['report_id'].'"}';
}

/* функция выгрузки фильтра по ID отчета */
function getReportFilter($arr){
    $q = "SELECT filter_json FROM xx_reports_filters WHERE report_id = ".$arr['TableID'];
//    echo $q;
    $json = ms_query_simple($q);
    if(strlen($json[0]['filter_json']) <= 3){
        return '{"ERROR":"Фильтр отчёта не найден"}';
    }
    return $json[0]['filter_json'];
}