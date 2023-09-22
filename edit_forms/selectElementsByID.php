<?
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';
$ID = $_POST['ID'];
$formID = $_POST['formID'];
$table = "xx_form_fields";
$q = "SELECT field_name,field_rus,ID,group_id,sort FROM ".$table." WHERE [group_id] = ".$ID." order by iif(isnull([sort],0)=0, 1000000,[sort])";
$res = ms_query_simple($q);
$q_all = "SELECT DISTINCT  a.table_name, a.table_name_rus, a.column_name field_name, a.column_name_rus field_rus, a.column_type from xx_form_fields_all_v  a where a.form_id = " . $formID . " order by a.table_name_rus, a.column_name_rus";
$res_all = ms_query_simple($q_all);
echo '<h3>ELEMENTS <i table = "'.$table.'" ADD="BIG_Y" title="Создать новый ELEMENT" type_block="ELEMENT" class="bi bi-clipboard-plus"></i> ';
echo "
<div class = 'row'>
    <div class='col-12'>
        <input type='text' style='width: 100%;' name='element_serch' rel='elements' class='elem_serch' placeholder='поиск по имени' />
    </div>
</div>
";
echo '<div class="row">
        <div class="col-5">Рус.назв</div>
        <div class="col-5">Им.таб.</div>
        <div class="col-2">Действ.</div>
    </div>';
echo "<div class='elements'>";

foreach ($res as $k=>$val):?>
    <div class="row" rel="<?=$val['ID'];?>">
        <div class="col-5"><?=$val['field_rus'];?></div>
        <div class="col-5"><?=$val['field_name'];?></div>
        <div class="col-2">
            <i table = "<?=$table?>" rel="<?=$val['ID'];?>" type_block="ELEMENT" class="bi bi-clipboard-data"></i>
            <i table = "<?=$table?>" rel="<?=$val['ID'];?>" ADD="Y" class="bi bi-clipboard-plus"></i>
            <i table = "<?=$table?>" rel="<?=$val['ID'];?>" DEL="Y" class="bi bi-clipboard-x"></i>
        </div>
    </div>
<?endforeach;?>
<? $groupID = $res[0]['group_id'] ?>
<?echo "</div>
<h3>ВОЗМОЖНЫЕ ВАРИАНТЫ:</h3>
<div class = 'row'>
    <div class='col-12'>
        <input type='text' style='width: 100%;' name='element_serch' rel='all_elements' class='elem_serch' placeholder='поиск по имени' />
    </div>
</div>
<div class='row' >
    <div class='col-2'>
        табл
    </div>
    <div class='col-3'>
        табл рус
    </div>
    <div class='col-3'>
        поле
    </div>
     <div class='col-3'>
        поле рус
    </div>
    <div class='col-1'>
        act
    </div>
</div>
<div class='all_elements'>";
//echo "<pre>"; print_r($res_all); echo "</pre>";
foreach ($res_all as $k=>$val):?>
    <div class="row">
        <div class="col-3" tytle="<?=$val['table_name'];?>"><?=$val['table_name'];?></div>
        <div class="col-3" tytle="<?=$val['field_name'];?>"><?=$val['field_name'];?></div>
        <div class="col-4" tytle="<?=$val['field_rus'];?>"><?=$val['field_rus'];?></div>
        <div class="col-1" tytle="<?=$val['column_type'];?>"><?=$val['column_type'];?></div>
        <div class="col-1">
            <i
                    column_type="<?=$val['column_type'];?>"
                    table_name="<?=$val['table_name'];?>"
                    field_name="<?=$val['field_name'];?>"
                    field_rus="<?=$val['field_rus'];?>"
                    group_id="<?=$ID;?>"
                    class="bi bi-arrow-right-square insToFild"></i>
        </div>
    </div>
<?endforeach;?>
<?echo "</div>";