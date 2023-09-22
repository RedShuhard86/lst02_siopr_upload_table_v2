<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';
//echo "<pre>"; print_r($_POST); echo "</pre>";
$tab = "xx_form_fields";
$table_name = $_POST['table_name'];
$table_name_rus = $_POST['table_name_rus'];
$field_name = $_POST['field_name'];
$field_rus = $_POST['field_rus'];
$group_id = $_POST['group_id'];
$column_type = $_POST['column_type'];

$q = "SELECT MAX(ID) FROM ".$tab;
$res = ms_query_simple($q);
$r = 0;
foreach ($res[0] as $val){
    $r = $val;
}

$q = "INSERT INTO ".$tab." 
    ([ID], [table], [field_name], [field_rus], [group_id], [field_1c], [type] ) 
    VALUES
     (".($r+1).",'".$table_name."' , '".$field_name."', '".$field_rus."', ".$group_id.", '".$field_rus."','".$column_type."')";
//echo $q;
ms_query_update($q);