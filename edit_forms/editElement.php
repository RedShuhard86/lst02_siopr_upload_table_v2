<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';
$table = $_POST['table'];

$arrIgnore = ["group_id","tab_id"];

$element_id = $_POST['elem_id'];
$type_block = $_POST['type_block'];
if($_POST['ADD']== "BIG_Y"){
    $q = "SELECT TOP 1 * FROM " . $table ;
    $_POST['ADD'] = "Y";
    $dif_id = $_POST['dif_id'];

}else {
    $q = "SELECT * FROM " . $table . " WHERE ID = " . $element_id;
}
//echo $q;
//echo "<pre>"; print_r($_POST); echo "</pre>";
$res = ms_query_simple($q);
$zag = "ОБНОВЛЕНИЕ ЭЛЕМЕНТА";
if($_POST['ADD']=="Y"){
    $zag = "СОЗДАНИЕ ЭЛЕМЕНТА";
}
$str = '
<h3>'.$zag.'</h3>

<input type="hidden" name="TAB_MAIN" value="'.$table.'">
<input type="hidden" name="type_block" value="'.$type_block.'">
<input type="hidden" name="ADD" value="'.$_POST['ADD'].'">';

foreach ($res[0] as $k=>$val){
//    if($_POST['ADD']=="Y" && !in_array($k, $arrIgnore)){
//        $val = "";
//    }
    if($dif_id != ""){
        if($type_block=="GROUP" && $k == "tab_id") {
            $val = $dif_id;
        }elseif ($type_block=="ELEMENT" && $k == "group_id"){
            $val = $dif_id;
        }
    }
$str .= '<div class="row">
 
    <div class="col-4">
        <label for="'.$k.'" class="form-label">'.$k.'</label>
    </div>
    <div class="col-8">';
        if($k == "group_id" || $k == "form_id") {
            if($k == "group_id") {
                foreach ($res as $kkk=>$valll){
                    $fid = $valll['form_id'];
                }
                if(strlen($fid)<=0){
                    $q = "SELECT * FROM " . $table . " WHERE ID = " . $_POST['elem_id'];

                    $res_in = ms_query_simple($q);
                    $fid = $res_in[0]['form_id'];
//                    $q = "SELECT DISTINCT a.tab_id,a.group_id, a.tab_name , a.group_name from xx_form_all a WHERE form_id = ".$fid." ORDER BY 3,4";
                }
                if($type_block=="ELEMENT") {
                    $fid = $_POST['formID'];
                }
                $q = "SELECT DISTINCT a.tab_id,a.group_id, a.tab_name , a.group_name from xx_form_all a WHERE form_id = " . $fid . " ORDER BY 3,4";
//                echo $q;
                $res = ms_query_simple($q);
                $str .='<select name="'.$k.'" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="0" selected>Корневой</option>
                <option value="'.$val.'" selected>'.$val.'</option>';
                    foreach ($res as $kk=>$vall){
                        $str .='<option value="'.$vall['tab_id'].'|'.$vall['group_id'].'">'.$vall['tab_name'].' | '.$vall['group_name'].'</option>';
                    }
                $str .='</select>';
            }elseif ($k == "form_id"){
                $q = "SELECT DISTINCT a.form_id,a.form_name from xx_form_all a";
                $res = ms_query_simple($q);
                $str .='<select name="'.$k.'" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option value="0" selected>Корневой</option>
                <option value="'.$val.'" selected>'.$val.'</option>';
                    foreach ($res as $kk=>$vall){
                        $str .='<option value="'.$vall['form_id'].'">'.$vall['form_name'].'</option>';
                    }
                $str .='</select>';
            }

        }else{
            if($k == "ID" && $_POST['ADD']=="Y"){
                $q = "SELECT MAX(ID) FROM ".$table;
                $res = ms_query_simple($q);
                foreach ($res[0] as $valt){
                    $r = $valt;
                }
                $str .= '<input style="width: 100%" type="text" name="' . $k . '" value="' . ($r+1) . '">';
            }else {
                $str .= '<input style="width: 100%" type="text" name="' . $k . '" value="' . $val . '">';
            }
        }

    $str .='</div>
</div>';
}
$str.= '<div>
    <input type="button" class="edit_row" ID="'.$element_id.'" type_block="'.$type_block.'" value="СОХРАНИТЬ" >
</div>';

echo $str;
