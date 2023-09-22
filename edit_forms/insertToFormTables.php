<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';
$table_name = $_POST['table_name'];
$table_par = $_POST['table_par'];
$column_par = $_POST['column_par'];
$form_id = $_POST['form_id'];
$q = "INSERT INTO xx_form_tables ([table_name], [table_par], [column_par], [form_id] ) VALUES ('".$table_name."', '".$table_par."', '".$column_par."', ".$form_id.")";
echo $q;
ms_query_update($q);