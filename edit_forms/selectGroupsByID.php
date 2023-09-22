<?
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';
require_once ($_SERVER['DOCUMENT_ROOT'].'/edit_forms/forms_functions.php');
$ID = $_POST['ID'];
$table = "xx_form_groups";
$q = "SELECT group_name, group_rus, ID, group_level, group_id,sort FROM ".$table." WHERE tab_id = ".$ID." order by iif(isnull([sort],0)=0, 1000000,[sort])";
//echo $q;
$res = ms_query_simple($q);
//echo "<pre>"; print_r($res); echo "</pre>";
echo '<h3>GROUPS <i table = "'.$table.'" ADD="BIG_Y" title="Создать новую GROUP" type_block="GROUP"  class="bi bi-clipboard-plus"></i></h3>';

//foreach ($res as $k=>$val):?>
<!--    <div class="row" rel="--><?//=$val['ID'];?><!--">-->
<!--        <div class="col-5">--><?//=$val['group_rus'];?><!--</div>-->
<!--        <div class="col-5"  style="overflow: hidden;">--><?//=$val['group_name'];?><!--</div>-->
<!--        <div class="col-2"><i table = "--><?//=$table?><!--" elem_id="--><?//=$ID?><!--" rel="--><?//=$val['ID'];?><!--" class="bi bi-list"></i></div>-->
<!--    </div>-->
<?//endforeach;?>

<?=tree_creator($res,$table);?>