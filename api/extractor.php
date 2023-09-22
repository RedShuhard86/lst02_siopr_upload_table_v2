<?php
/* ПОЛУЧАТЬ ДАННЫЕ ИЗ НОВОЙ БАЗЫ */
define("FROM_NEW_DB",false);
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, HEAD, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, origin, content-type, accept');

$arrPost = json_decode(file_get_contents("php://input"), true);


// удаляем все теги из запроса, если они есть
$arrPost['actions'] = strip_tags($arrPost['actions']);


if($arrPost['actions'] == "GetStructureDocument"){
    echo  extractAllData($arrPost);
}elseif($arrPost['actions'] == "GetStructureMap"){
    echo  getMapStructure($arrPost);
}elseif ($arrPost['actions'] == "GetValuesDocument"){
    echo  extractNewData($arrPost);
}elseif ($arrPost['actions'] == "GetValuesListForm"){
    echo  extractNewDateList($arrPost);
}elseif ($arrPost['actions'] == "GetAllValuesForExcel"){
    echo  getAllValuesForExcellTable($arrPost);
}elseif ($arrPost['actions'] == "GetValuesTable"){
    echo extractValuesTable($arrPost);
}elseif ($arrPost['actions'] == "GetInfoReportsTable"){
    echo extractInfoReportsTable($arrPost);
}elseif ($arrPost['actions'] == "GetDataReportsTable"){
    echo extractDataReportsTable($arrPost);
}elseif ($arrPost['actions'] == "GetDataReportsTableEXCEL"){
    echo extractDataReportsTableEXCEL($arrPost);
}elseif ($arrPost['actions'] == "GetReportsManualSelect"){
    echo extractReportsManualSelect($arrPost);
}elseif ($arrPost['actions'] == "SetGrantToSIOPR"){
    echo setGrantToSIOPR($arrPost);
}elseif ($arrPost['actions'] == "GetFilesUrlTEMP"){
    echo getDataFromSIOPR_TEMP($arrPost);
}elseif ($arrPost['actions'] == "GetOneFileUrl"){
    echo getDataFromSIOPR($arrPost);
}elseif ($arrPost['actions'] == "CustomAddFields"){
    getCustomADDFile($arrPost);
}elseif ($arrPost['actions'] == "GetList"){
    echo getList($arrPost);
}elseif ($arrPost['actions'] == "GetListBig"){
    echo getListBig($arrPost);
}elseif ($arrPost['actions'] == "GetMenu"){
    echo getMenu();
}elseif ($arrPost['actions'] == "GetDocFilesURL"){
    echo getDocFromSIOPR($arrPost);
}elseif ($arrPost['actions'] == "GetMap"){
    echo getURLMapFromSiopr($arrPost);
}elseif ($arrPost['actions'] == "GetMapSession"){
    echo getMapSession($arrPost);
}elseif ($arrPost['actions'] == "GetMapInfo"){
    echo getMapInfo();
}elseif ($arrPost['actions'] == "GrossSearch"){
    echo grossSerch($arrPost);
}elseif ($arrPost['actions'] == "GetAddressList"){
    echo getAddressList($arrPost);
}elseif ($arrPost['actions'] == "GetAddressListMap"){
    echo getAddressListMap($arrPost);
}elseif ($arrPost['actions'] == "DeleteFile"){
    deleteFile($arrPost);
}elseif ($arrPost['actions'] == "GetUserOptions"){
    echo getUserOptions($arrPost);
}elseif ($arrPost['actions'] == "GetListForDocument"){
    echo getListForDocument($arrPost);
}elseif ($arrPost['actions'] == "GetTopBorderMenu"){ // формирование верхнего меню над карточкой
    echo getTopBorderMenu($arrPost);
}elseif ($arrPost['actions'] == "GetVisibleTopBorderMenu"){ // управление видимостью
    echo getVisibleTopBorderMenu($arrPost);
}elseif ($arrPost['actions'] == "GetMandatoryTopBorderMenu"){ // управление обязательностью
    echo getMandatoryTopBorderMenu($arrPost);
}elseif ($arrPost['actions'] == "GetEditableTopBorderMenu"){ // управление изменяемостью
    echo getEditableTopBorderMenu($arrPost);
}elseif ($arrPost['actions'] == "update"){
    $host = MAIN_IP_FOR_GET_DATA.$arrPost['actions'];
    echo SetDataToSIOPR($host,$arrPost['params']);
}elseif ($arrPost['actions'] == "delete"){
    $host = MAIN_IP_FOR_GET_DATA.$arrPost['actions'];
    echo SetDataToSIOPR($host,$arrPost['params']);
}elseif ($arrPost['actions'] == "insert"){
    $host = MAIN_IP_FOR_GET_DATA.$arrPost['actions'];
    echo SetDataToSIOPR($host,$arrPost['params']);
}elseif ($arrPost['actions'] == "getSession"){
    echo setSessionToJS(0);
}elseif ($arrPost['actions'] == "exitUser"){
    exitUser();
}elseif ($arrPost['actions'] == "GetUserName"){
    echo setSessionToJS(1);
}elseif ($arrPost['actions'] == "GetMinPromTorg"){
    echo getMinPromTorgInfo($arrPost);
}elseif ($arrPost['actions'] == "UploadExcelFileInTable"){
    uploadExcelFileInTable($arrPost);
}elseif ($arrPost['actions'] == "SaveReportsSettings"){
    echo saveReportsSettings($arrPost);
}elseif ($arrPost['actions'] == "SaveAdminReportsSettings"){
    saveAdminReportsSettings($arrPost);
}elseif ($arrPost['actions'] == "LoadReportsSettings"){
    echo loadReportsSettings($arrPost);
}elseif ($arrPost['actions'] == "LoadAdminReportsSettings"){
    echo loadAdminReportsSettings($arrPost);
}elseif ($arrPost['actions'] == "DeleteReportsSettings"){
    delReportsSettings($arrPost);
}elseif ($arrPost['actions'] == "DeleteAdminReportsSettings"){
    delAdminiReportsSettings($arrPost);
}elseif ($arrPost['actions'] == "GetTableInDB"){
    echo getTableFromDB($arrPost);
}elseif ($arrPost['actions'] == "GetTableDISTINCT"){
    echo getTableDistinct($arrPost);
}elseif ($arrPost['actions'] == "UpdateByKey"){
    updateByKey($arrPost);
}elseif ($arrPost['actions'] == "InsertInDB"){
    echo insertInDB($arrPost);
}elseif ($arrPost['actions'] == "UpdateByWhere"){
    updateByWhere($arrPost);
}elseif ($arrPost['actions'] == "InsertInDBNotReturn"){
    insertInDBNotReturn($arrPost);
}elseif ($arrPost['actions'] == "UpadateFormGroupLevel"){
    updateFormGroupLevel($arrPost);
}elseif ($arrPost['actions'] == "ReplicationForm"){
    echo replicationForm($arrPost);
}elseif ($arrPost['actions'] == "GetMaxValue"){
    echo getMaxValue($arrPost);
}elseif ($arrPost['actions'] == "DeleteByKey"){
    deleteByKey($arrPost);
}elseif ($arrPost['actions'] == "GetDashboard"){
    echo setDashboard();
}elseif ($arrPost['actions'] == "DeleteFormByID"){
    echo deleteFormByID($arrPost);
}elseif ($arrPost['actions'] == "GetPhotoFromSIOPR"){
    echo getFileFromFTP($arrPost);
}elseif ($arrPost['actions'] == "CountElementsInTable"){
    echo countRows($arrPost);
}elseif ($arrPost['actions'] == "SaveUserFilter"){
    echo saveUserFilter($arrPost);
}elseif ($arrPost['actions'] == "GetIDForReport"){
    echo getIDForReport($arrPost);
}elseif ($arrPost['actions'] == "ChangeDefaultUserFilter"){
    changeDefaultUserFilter($arrPost);
}elseif ($arrPost['actions'] == "CreateLayerInMap"){
    echo сreateLayerInMap($arrPost);
}elseif ($arrPost['actions'] == "UpdateRegister"){
    echo updateRegisterData($arrPost);
}elseif ($arrPost['actions'] == "GetUserFilter"){
    echo getUserFilter($arrPost);
}elseif ($arrPost['actions'] == "GetUserFilters"){
    echo getUserFilters($arrPost);
}elseif ($arrPost['actions'] == "GetUserFiltersMap"){
    echo getUserFiltersMap($arrPost);
}elseif ($arrPost['actions'] == "GetAdresnyeObekty"){
    echo getAdresnyeObekty($arrPost);
}elseif ($arrPost['actions'] == "GetAdresnyeObektyRow"){
    echo getAdresnyeObektyRow($arrPost);
}elseif ($arrPost['actions'] == "GetEMailResident"){
    echo getEMailResident($arrPost);
}elseif ($arrPost['actions'] == "GetUsersGroup"){
    echo getUsersGroup();
}elseif ($arrPost['actions'] == "SendEmailReport"){
    echo sendEmailReport($arrPost);
}elseif ($arrPost['actions'] == "SendEmailNotification"){
    echo sendEmailNotification($arrPost);

}elseif ($arrPost['actions'] == "PushInDocument"){
    echo pushInDocument($arrPost);
}elseif ($arrPost['actions'] == "getUserRole"){
    echo getRole($arrPost['params']['username']);
}elseif ($arrPost['actions'] == "GetRelForm"){
    echo getRelForm($arrPost);
}elseif ($arrPost['actions'] == "setSQL"){                                          // АДМИНИСТРАТИВНАЯ
    echo setSql($arrPost['params']['sql']);
}elseif ($arrPost['actions'] == "GetCoordinatByString"){
    echo getCoordinat($arrPost['params']['text']);
}elseif ($arrPost['actions'] == "GetSQLError"){
    echo getSQLError($arrPost['param']['date']);
}elseif ($arrPost['actions'] == "Get1cError"){
    echo get1cError($arrPost['params']['text']);
}elseif ($arrPost['actions'] == "GetURLExcel"){
    echo getURLExcel($arrPost['TableID']);
}elseif ($arrPost['actions'] == "GetTovarIerarh"){
    echo getTovarIerarh();
}elseif ($arrPost['actions'] == "GetPrintForm"){
    echo getPrintForm($arrPost);
}elseif ($arrPost['actions'] == "GetCurrentTask"){
    echo getCurrentTask($arrPost);
}elseif ($arrPost['actions'] == "GetCategoryProject"){
    echo getCategoryProject($arrPost);
}elseif ($arrPost['actions'] == "GetFormHS"){
    echo getFormHS($arrPost);
}elseif ($arrPost['actions'] == "GetKadastrNum"){
    echo getKadastrNum($arrPost);
}elseif ($arrPost['actions'] == "GetKadastrIe") {
    echo getKadastrIe($arrPost);
}elseif ($arrPost['actions'] == "GetFileByURL"){
    echo getFileByURL($arrPost);
}elseif ($arrPost['actions'] == "FormDecisionOnSpot"){
    echo formDecisionOnSpot($arrPost);
}elseif ($arrPost['actions'] == "GetFileBase64ByUrl"){
    echo getBase64File($arrPost);
}elseif ($arrPost['actions'] == "GetDataFrom1st"){
    echo getDataFrom1st($arrPost);
}elseif ($arrPost['actions'] == "GetDataFrom2st"){
    echo getDataFrom2st($arrPost);
}elseif ($arrPost['actions'] == "GetWt_1st_json"){
    echo getWt_1st_json($arrPost);
}elseif ($arrPost['actions'] == "GetSessionNum"){
    echo getSessionNum($arrPost);
}elseif ($arrPost['actions'] == "CountElementsInView"){
    echo countElementsInView($arrPost);
}elseif ($arrPost['actions'] == "GetECP"){
    echo getECP($arrPost);
}elseif ($arrPost['actions'] == "GetWorkFlowElements"){
    echo getWorkFlowElements($arrPost);
}elseif ($arrPost['actions'] == "GetWorkFlowCount"){
    echo getWorkFlowCount($arrPost);
}elseif ($arrPost['actions'] == "RabbitMQExcel"){
    echo rabbitMQExcel($arrPost);
}elseif ($arrPost['actions'] == "Hard_code_01"){
    echo hard_code_01();
}elseif ($arrPost['actions'] == "Check_IsHeaderHas"){
    echo check_IsHeaderHas($arrPost);
}elseif ($arrPost['actions'] == "Check_IsFilterHas"){
    echo check_IsFiltersHas($arrPost);
}elseif ($arrPost['actions'] == "GetReportHeaders"){
    echo getReportHeaders($arrPost);
}elseif ($arrPost['actions'] == "SetReportHeaders"){
    echo setReportHeaders($arrPost);
}elseif ($arrPost['actions'] == "UpdateReportHeaders"){
    echo updateReportHeaders($arrPost);
}elseif ($arrPost['actions'] == "GetReportFilter"){
    echo getReportFilter($arrPost);
}elseif ($arrPost['actions'] == "SetReportFilter"){
    echo setReportFilter($arrPost);
}elseif ($arrPost['actions'] == "UpdateReportFilter"){
    echo updateReportFilter($arrPost);
}elseif ($arrPost['actions'] == "GetAllFieldsByReport"){
    echo getAllFieldsByReport($arrPost);
}elseif ($arrPost['actions'] == "GetAllReports"){
    echo getAllReports();
}elseif ($arrPost['actions'] == "GetAllReportsID"){
    echo getAllReportsID();
}elseif ($arrPost['actions'] == "GetAllFiltersID"){
    echo getAllFiltersID();
}elseif ($arrPost['actions'] == "GetAllDataFromForm"){
    echo getAllDataFromForm($arrPost);
}elseif ($arrPost['actions'] == "GetFiltredDataFromForm"){
    echo getFiltredDataFromForm($arrPost);
}elseif ($arrPost['actions'] == "ReportVUEXLSXGenerator"){
    echo reportVUEXLSXGenerator($arrPost);
}elseif ($arrPost['actions'] == "TestPhp"){
    echo test_PHP($arrPost);
}else{
    echo '{"ERROR":" action '.$arrPost['actions'].' не распознан "}';
}