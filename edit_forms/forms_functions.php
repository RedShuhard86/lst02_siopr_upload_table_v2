<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';

function selectAllForms(){
    $q = "SELECT ID,form_name FROM xx_forms";
    $res = ms_query_as_fetch($q);
    echo '<form id="edit_forms"><select class="form-select form-select-sm js-chosen" name="city" aria-label=".form-select-sm example">
            <option selected>Открой меня</option>';
            foreach ($res as $k=>$val): ?>
                <option value="<?=$k?>"><?=$val?></option>
            <? endforeach;
    echo'</select></form>';
}

function form_tree($mess)
{
    if (!is_array($mess)) {
        return false;
    }
    $tree = array();
    foreach ($mess as $value) {
        $tree[$value['group_id']][] = $value;
    }
    return $tree;
}

function build_tree($cats, $parent_id, $table)
{
    if (is_array($cats) && isset($cats[$parent_id])) {
        $tree = '<ul>';
        foreach ($cats[$parent_id] as $cat) {
            $tree .= '<li rel="'.$cat["ID"].'" ><span style="width:200px; overflow: hidden; display: block; float: left;" >'. $cat['group_name'].'</span>';
            $tree .= ' <i table = "'.$table.'" rel="'.$cat["ID"].'" type_block="GROUP" class="bi bi-clipboard-data"></i>';
            $tree .= ' <i table = "'.$table.'" rel="'.$cat["ID"].'" ADD="Y" type_block="GROUP" class="bi bi-clipboard-plus"></i>';
            $tree .= ' <i table = "'.$table.'" rel="'.$cat['ID'].'" DEL="Y" class="bi bi-clipboard-x"></i>';
            $tree .= build_tree($cats, $cat['ID'],$table);
            $tree .= '</li>';
        }
        $tree .= '</ul>';
    } else {
        return false;
    }
    return $tree;
}

function tree_creator($arr,$table){
    $res = [];
    foreach ($arr as $k=>$val){
        if($val['group_id']=="") {
            $res[] = $val['ID'];
        }
    }
    $tree = form_tree($arr);
    $arrRes = build_tree($tree, "", $table);
    if(strlen($arrRes) <= 0){
        return build_tree($tree, 0, $table);
    }else{
        return build_tree($tree, "", $table);
    }
}