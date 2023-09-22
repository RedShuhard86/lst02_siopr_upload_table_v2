<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';
$ID = $_POST['ID'];
$txt = $_POST['txt'];
$q = "select * from xx_table_list_v a where a.table_name LIKE '%".$txt."%' OR a.table_par LIKE '%".$txt."%' OR a.column_par LIKE '%".$txt."%' order by 1,2";
echo $q;
$res_all = ms_query_simple($q);
echo "<div class = 'row'>
    <div class='col-12'>
        <input type='text' style='width: 100%;' name='element_serch' rel='left_elem' class='elem_serch' placeholder='поиск по имени' />
    </div>
</div>";
echo "<div class='left_elem'>";
foreach ($res_all as $k=>$val):?>
    <div class="row" >
        <div class="col-4"><?=$val['table_name'];?></div>
        <div class="col-5"><?=$val['table_par'];?></div>
        <div class="col-2"><?=$val['column_par'];?></div>
        <div class="col-1">
            <i table_name="<?=$val['table_name'];?>" table_par="<?=$val['table_par'];?>" column_par="<?=$val['column_par'];?>" form_id="<?=$ID;?>"  class="bi bi-arrow-right-square insToTab"></i>
        </div>
    </div>
<?endforeach;?>
</div>
