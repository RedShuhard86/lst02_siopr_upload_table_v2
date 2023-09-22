<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';
$ID = $_POST['ID'];
$table = "xx_form_tabs";
$q = "SELECT tabs_name,tabs_rus,ID,sort FROM ".$table." WHERE form_id = ".$ID." order by iif(isnull([sort],0)=0, 1000000,[sort])";
$res = ms_query_simple($q);
echo '<h3>TABS <i table = "'.$table.'" ADD="BIG_Y" title="Создать новый TAB" type_block="TABS"  class="bi bi-clipboard-plus"></i></h3>';
?>
<div class = 'row'>
    <div class='col-12'>
        <input type='text' style='width: 100%;' name='element_serch' class='elem_serch' rel='tabs_select_form'  placeholder='поиск по имени' />
    </div>
</div>
<?
echo '<div class="row">        
        <div class="col-7">Рус.назв</div>
        <div class="col-2">srt</div>
        <div class="col-3">Действ.</div>
    </div>
    <div class="tabs_select_form">';
foreach ($res as $k=>$val):?>
    <div class="row" rel="<?=$val['ID'];?>">
        <div class="col-7"><?=$val['tabs_rus'];?></div>
        <div class="col-2"><?=$val['sort'];?></div>
        <div class="col-3"><i table = "<?=$table?>" rel="<?=$val["ID"]?>" type_block="TABS" class="bi bi-clipboard-data"></i></div>
    </div>
<?endforeach;?>
</div>
