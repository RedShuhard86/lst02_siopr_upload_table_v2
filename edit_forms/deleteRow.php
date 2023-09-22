<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';

$id = $_POST['id'];
$tab = $_POST['tab'];
$q = "DELETE FROM ".$tab." WHERE ID = ".$id;
ms_query_simple($q);
echo $q;
echo "<h3>Из таблицы '".$tab."' был удалён элемент '".$id."'</h3>";