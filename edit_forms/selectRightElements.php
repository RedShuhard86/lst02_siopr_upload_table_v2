<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';
$ID = $_POST['ID'];
$table = "xx_form_tables";
$q = "select * from ".$table."  where form_id = ".$ID;
//echo $q;
$res_all = ms_query_simple($q);
foreach ($res_all as $k=>$val):?>
    <div class="row" >
        <div class="col-4"><?=$val['table_name'];?></div>
        <div class="col-4"><?=$val['table_par'];?></div>
        <div class="col-3"><?=$val['column_par'];?></div>
        <div class="col-1">
            <i table = "<?=$table?>" rel="<?=$val['ID'];?>" DEL="Y" class="bi bi-clipboard-x"></i>
        </div>
    </div>
<?endforeach;?>