$(document).ready(function(){
    $('.js-chosen').chosen({
        width: '100%',
        no_results_text: 'Совпадений не найдено',
        placeholder_text_single: 'Выбирай'
    });

    function selectTabs(formID){
        $.ajax({
            url: 'selectTabsByID.php',
            method: 'POST',
            data: {ID: formID},
            success: function(data){
                $('#tabs_select_form').html(data);
            }
        });
    }
    function selectLeftElements(id,txt) {
        $.ajax({
            url: 'selectLeftElements.php',
            method: 'POST',
            data: {ID: id,txt:txt},
            success: function(data){
                $('#select_left_form').html(data);
            }
        });
    }
    function selectRightElements(id) {
        $.ajax({
            url: 'selectRightElements.php',
            method: 'POST',
            data: {ID: id},
            success: function(data){
                $('#select_right_form').html(data);
            }
        });
    }
    function insertToFormTables(table_name, table_par, column_par, form_id) {
        $.ajax({
            url: 'insertToFormTables.php',
            method: 'POST',
            data: {table_name: table_name, table_par: table_par, column_par: column_par, form_id: form_id},
            success: function(){
                selectRightElements(form_id);
            }
        });
    }
    function insertToFormFields(table_name, field_name, field_rus, group_id,column_type) {
        $.ajax({
            url: 'insertToFormFields.php',
            method: 'POST',
            data: { field_name:field_name, field_rus:field_rus, group_id:group_id,table_name:table_name,column_type:column_type},
            success: function(){
                var ID = group_id;
                var formID = $("#edit_forms option:selected").val();
                selectElement(ID,formID);
            }
        });
    }
    function selectGroup(rel) {
        $.ajax({
            url: 'selectGroupsByID.php',
            method: 'POST',
            data: {ID: rel},
            success: function(data){
                $('#groups_select_form').html(data);
            }
        });
    }
    function updateElement(arr) {
        $.ajax({
            url: 'updateElementInDB.php',
            method: 'POST',
            data: arr,
            success: function(data){
                $('#edit_element .cont').html(data);
            }
        });
    }
    function selectElement(ID,formID){
        $.ajax({
            url: 'selectElementsByID.php',
            method: 'POST',
            data: {ID: ID,formID:formID},
            success: function(data){
                $('#fields_select_form').html(data);
            }
        });
    }
    function editElement(table,id, type_block, formID, add){
        $.ajax({
            url: 'editElement.php',
            method: 'POST',
            data: {table: table,elem_id:id, type_block: type_block, formID:formID, ADD:add},
            success: function(data){
                $('#edit_element .cont').html(data);
            }
        });
    }

    $('#edit_forms').change(function () {

        var formID = $("#edit_forms option:selected").val();
        selectTabs(formID);

    });

    $('body').on('click','#tabs_select_form .tabs_select_form>div', function () {
        $("#tabs_select_form .tabs_select_form div").removeClass("active");
        $(this).addClass("active");
        var formID = $(this).attr('rel');
        selectGroup(formID)
    });

    $('body').on('click','#groups_select_form li', function (e) {
        $("#groups_select_form li").removeClass("active");
        $(this).addClass("active");
        var ID = $(this).attr('rel');
        var formID = $("#edit_forms option:selected").val();
        selectElement(ID,formID);
       e.stopPropagation();
    });
    $('body').on('click', '.bi-clipboard-data', function () {
        var type_block = $(this).attr('type_block');
        var id = $(this).attr('rel');
        var table = $(this).attr('table');
        var formID = $("#edit_forms option:selected").val();
        $('#edit_element').show();
        editElement(table,id, type_block, formID);

        // var rel = $("#tabs_select_form .tabs_select_form div.active").attr('rel');
        // selectGroup(rel);
    });

    $('body').on('click', '.bi-clipboard-plus', function () {
    var add = $(this).attr('ADD');
    var type_block = $(this).attr('type_block');
    var id = $(this).attr('rel');
    var table = $(this).attr('table');
    var form_id = NaN;
    if(add == "Y"){
        if(type_block == "GROUP"){
            form_id = $("#tabs_select_form .tabs_select_form div.active").attr('rel');
        }else if(type_block == "ELEMENT"){
            form_id = $('#groups_select_form li.active').attr('rel')
        }
    }
    $('#edit_element').show();

    editElement(table, id, type_block, form_id, add);

    // var rel = $("#tabs_select_form .tabs_select_form div.active").attr('rel');
    //
    // selectGroup(rel)
});

    $('body').on('click', '.edit_row', function () {
        var type_block = $('.edit_row').attr('type_block');
        var arr = $('#edit_element').serialize();
        console.log(type_block);
        updateElement(arr);

            $('#edit_element').hide();
            $('#edit_element').trigger('reset');
        if (type_block == "GROUP") {
            var rel = $("#tabs_select_form .tabs_select_form div.active").attr('rel');
            console.log(rel);
            setTimeout(selectGroup(rel),300);
        }
        if (type_block == "TABS") {
            var formID = $("#edit_forms option:selected").val();
            setTimeout(selectTabs(formID),300);

        }
        if (type_block == "ELEMENT") {
            var formID = $('#groups_select_form li.active').attr('rel');
            setTimeout(selectElement(formID),300);
        }

    });
    $('body').on('click', '.bi-asterisk', function () {
        $('#edit_element').hide();
        $('#edit_element').trigger('reset');
    });
    $('body').on('click', '.bi-clipboard-x', function () {
        // $('#edit_element').show();
        $(this).parent('div').parent('.row').hide();
        $.ajax({
            url: 'deleteRow.php',
            method: 'POST',
            data: {id:$(this).attr('rel'),tab:$(this).attr('table')},
            success: function(data){
                $('#edit_element .cont').html(data);
            }
        });

        var rel = $("#tabs_select_form .tabs_select_form div.active").attr('rel');
        selectGroup(rel)

        var formID = $('#groups_select_form li.active').attr('rel');
        selectElement(formID);

    });
    $("body").on('keyup',".elem_serch", function () {
        var input = $(this).attr('rel');
        var value_input = $(this).val();
        $.each($("."+input+" > div.row"), function (){
            if(!($(this).find("div").text().toLowerCase().indexOf(value_input.toLowerCase()) !== -1)){
                $(this).hide();
            }else{
                $(this).show();
            }
        })
    })
    $("body").on('click','button[name="options"]',function () {
        var id = $(this).val();
        var formID = $("#edit_forms option:selected").val();
        selectLeftElements(formID,"найти");
        $(".tab").hide();
        $(".tab_"+id).css('display','flex');
        selectRightElements(formID);
    });
    $("body").on('click','.insToTab',function () {
        var table_name = $(this).attr('table_name');
        var table_par = $(this).attr('table_par');
        var column_par = $(this).attr('column_par');
        var form_id = $(this).attr('form_id');
        insertToFormTables(table_name, table_par, column_par, form_id);
    });
    $("body").on('click','.insToFild',function () {
        var table_name = $(this).attr('table_name');
        var field_name = $(this).attr('field_name');
        var field_rus = $(this).attr('field_rus');
        var column_type = $(this).attr('column_type');
        var group_id = $('#groups_select_form li.active').attr('rel')
       insertToFormFields( table_name,field_name, field_rus, group_id,column_type);
    });

    $('body').on('click','.button_sql_param', function () {
        var txt = $('.sql_param').val();
        var formID = $("#edit_forms option:selected").val();
        selectLeftElements(formID,txt);
    });

    $('body').on('mousedown','.all_elements .row div', function () {
        var vl = $(this).attr('tytle');
        $("#fields_select_form .elem_serch:eq(1)").val(vl)
    })
})

