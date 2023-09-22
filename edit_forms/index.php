<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
require ($_SERVER['DOCUMENT_ROOT'].'/edit_forms/forms_functions.php');
?>
<div class="container-float" style="padding: 15px;">
        <div class="row">
                <div class="col-10">
                    <?=selectAllForms();?>
                </div>
                <div class="col-2">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="button" name="options" value="1">ФОРМЫ</button>
                        <button class="btn btn-outline-secondary" type="button" name="options" value="2">ТАБЛИЦЫ</button>
                    </div>
                </div>
        </div>

        <div class="row tab tab_1" >
            <div class="col-2" id="tabs_select_form">

            </div>
            <div class="col-3" id="groups_select_form">

            </div>
            <div class="col-7" id="fields_select_form">

            </div>
        </div>
        <div class="row tab tab_2" >
            <div class="col-6" id="select_left_form">

            </div>
            <div class="col-4" id="select_right_form">

            </div>
            <div class="col-2" id="select_info_form">
                <form>
                    <input type="text" name="sql_param" class="sql_param" value="найти">
                    <input type="button" class="button_sql_param" value="найти">
                </form>
            </div>
        </div>
    <form id="edit_element">
        <a href="#" return="false" ><i class="bi bi-asterisk" style="color: #f00; margin: -43px 0 33px 456px; display: block;"></i></a>
        <div class="cont">

        </div>
    </form>
</div>
<?
//echo "<pre>"; print_r(extractNewData()); echo "</pre>";
    require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>