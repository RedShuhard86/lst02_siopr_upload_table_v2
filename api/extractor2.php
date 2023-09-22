<?
/* ПОЛУЧАТЬ ДАННЫЕ ИЗ НОВОЙ БАЗЫ */
define("FROM_NEW_DB",false);
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, HEAD, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, origin, content-type, accept');

$arrPost = json_decode(file_get_contents("php://input"), true);
if($arrPost['actions'] == "GetStructureDocument"){
    echo v2_extractAllData($arrPost);
}elseif ($arrPost['actions'] == "GetValuesDocument"){
    echo v2_extractNewData($arrPost);
}elseif ($arrPost['actions'] == "GetValuesListForm"){
    echo v2_extractNewDateList($arrPost);
}elseif ($arrPost['actions'] == "GetAllValuesForExcel"){
    echo v2_getAllValuesForExcellTable($arrPost);
}elseif ($arrPost['actions'] == "GetValuesTable"){
    echo v2_extractValuesTable($arrPost);
}elseif ($arrPost['actions'] == "GetInfoReportsTable"){
    echo v2_extractInfoReportsTable($arrPost);
}elseif ($arrPost['actions'] == "GetDataReportsTable"){
    echo v2_extractDataReportsTable($arrPost);
}elseif ($arrPost['actions'] == "GetDataReportsTableEXCEL"){
    echo v2_extractDataReportsTableEXCEL($arrPost);
}elseif ($arrPost['actions'] == "GetReportsManualSelect"){
    echo v2_extractReportsManualSelect($arrPost);
}elseif ($arrPost['actions'] == "UploadFiles"){
    v2_getUploadFilesFromVUE($arrPost);
}elseif ($arrPost['actions'] == "SetGrantToSIOPR"){
    echo v2_setGrantToSIOPR($arrPost);
}elseif ($arrPost['actions'] == "GetFilesUrl"){
    echo v2_getDataFromSIOPR_v2($arrPost);
}elseif ($arrPost['actions'] == "GetFilesUrlTEMP"){
    echo v2_getDataFromSIOPR_TEMP($arrPost);
}elseif ($arrPost['actions'] == "GetOneFileUrl"){
    echo v2_getDataFromSIOPR($arrPost);
}elseif ($arrPost['actions'] == "CustomAddFields"){
    v2_getCustomADDFile($arrPost);
}elseif ($arrPost['actions'] == "GetList"){
    echo v2_getList($arrPost);
}elseif ($arrPost['actions'] == "GetListBig"){
    echo v2_getListBig($arrPost);
}elseif ($arrPost['actions'] == "GetMenu"){
    echo v2_getMenu();
}elseif ($arrPost['actions'] == "GetDocFilesURL"){
    echo v2_getDocFromSIOPR($arrPost);
}elseif ($arrPost['actions'] == "GetMap"){
    echo v2_getURLMapFromSiopr($arrPost);
}elseif ($arrPost['actions'] == "GrossSearch"){
    echo v2_grossSerch($arrPost);
}elseif ($arrPost['actions'] == "GetAddressList"){
    echo v2_getAddressList($arrPost);
}elseif ($arrPost['actions'] == "DeleteFile"){
    v2_deleteFile($arrPost);
}elseif ($arrPost['actions'] == "GetListForDocument"){
    echo v2_getListForDocument($arrPost);
}elseif ($arrPost['actions'] == "GetTopBorderMenu"){ // формирование верхнего меню над карточкой
    echo v2_getTopBorderMenu($arrPost);
}elseif ($arrPost['actions'] == "GetVisibleTopBorderMenu"){ // управление видимостью
    echo v2_getVisibleTopBorderMenu($arrPost);
}elseif ($arrPost['actions'] == "GetMandatoryTopBorderMenu"){ // управление обязательностью
    echo v2_getMandatoryTopBorderMenu($arrPost);
}elseif ($arrPost['actions'] == "GetEditableTopBorderMenu"){ // управление изменяемостью
    echo v2_getEditableTopBorderMenu($arrPost);
}elseif ($arrPost['actions'] == "update"){
    $host = MAIN_IP_FOR_GET_DATA.$arrPost['actions'];
    echo v2_SetDataToSIOPR($host,$arrPost['params']);
}elseif ($arrPost['actions'] == "insert"){
    $host = MAIN_IP_FOR_GET_DATA.$arrPost['actions'];
    echo v2_SetDataToSIOPR($host,$arrPost['params']);
}elseif ($arrPost['actions'] == "getSession"){
    echo v2_setSessionToJS(0);
}elseif ($arrPost['actions'] == "exitUser"){
    v2_exitUser();
}elseif ($arrPost['actions'] == "GetUserName"){
    echo v2_setSessionToJS(1);
}elseif ($arrPost['actions'] == "GetMinPromTorg"){
    echo v2_getMinPromTorgInfo($arrPost);
}elseif ($arrPost['actions'] == "UploadExcelFileInTable"){
    v2_uploadExcelFileInTable($arrPost);
}elseif ($arrPost['actions'] == "SaveReportsSettings"){
    echo v2_saveReportsSettings($arrPost);
}elseif ($arrPost['actions'] == "SaveAdminReportsSettings"){
    v2_saveAdminReportsSettings($arrPost);
}elseif ($arrPost['actions'] == "LoadReportsSettings"){
    echo v2_loadReportsSettings($arrPost);
}elseif ($arrPost['actions'] == "LoadAdminReportsSettings"){
    echo v2_loadAdminReportsSettings($arrPost);
}elseif ($arrPost['actions'] == "DeleteReportsSettings"){
    v2_delReportsSettings($arrPost);
}elseif ($arrPost['actions'] == "DeleteAdminReportsSettings"){
    v2_delAdminiReportsSettings($arrPost);
}elseif ($arrPost['actions'] == "GetTableInDB"){
    echo v2_getTableFromDB($arrPost);
}elseif ($arrPost['actions'] == "GetTableDISTINCT"){
    echo v2_getTableDistinct($arrPost);
}elseif ($arrPost['actions'] == "UpdateByKey"){
    v2_updateByKey($arrPost);
}elseif ($arrPost['actions'] == "InsertInDB"){
    echo v2_insertInDB($arrPost);
}elseif ($arrPost['actions'] == "UpdateByWhere"){
    v2_updateByWhere($arrPost);
}elseif ($arrPost['actions'] == "InsertInDBNotReturn"){
    v2_insertInDBNotReturn($arrPost);
}elseif ($arrPost['actions'] == "UpadateFormGroupLevel"){
    v2_upadateFormGroupLevel($arrPost);
}elseif ($arrPost['actions'] == "ReplicationForm"){
    echo v2_replicationForm($arrPost);
}elseif ($arrPost['actions'] == "GetMaxValue"){
    echo v2_getMaxValue($arrPost);
}elseif ($arrPost['actions'] == "DeleteByKey"){
    v2_deleteByKey($arrPost);
}elseif ($arrPost['actions'] == "GetDashboard"){
    echo v2_setDashboard();
}elseif ($arrPost['actions'] == "DeleteFormByID"){
    echo v2_deleteFormByID($arrPost);
}elseif ($arrPost['actions'] == "GetPhotoFromSIOPR"){
    echo v2_getFileFromFTP($arrPost);
}elseif ($arrPost['actions'] == "CountElementsInTable"){
    echo v2_countRows($arrPost);
}elseif ($arrPost['actions'] == "SaveUserFilter"){
    echo v2_saveUserFilter($arrPost);
}elseif ($arrPost['actions'] == "ChangeDefaultUserFilter"){
    v2_changeDefaultUserFilter($arrPost);
}elseif ($arrPost['actions'] == "GetIDForReport"){
    echo v2_getIDForReport($arrPost);
}elseif ($arrPost['actions'] == "CreateLayerInMap"){
    echo v2_сreateLayerInMap($arrPost);
}elseif ($arrPost['actions'] == "UpdateRegister"){
    echo v2_updateRegisterData($arrPost);
}elseif ($arrPost['actions'] == "GetUserFilter"){
    echo v2_getUserFilter($arrPost);
}elseif ($arrPost['actions'] == "GetUserFilters"){
    echo v2_getUserFilters($arrPost);
}elseif ($arrPost['actions'] == "GetAdresnyeObekty"){
    echo v2_getAdresnyeObekty($arrPost);
}elseif ($arrPost['actions'] == "GetAdresnyeObektyRow"){
    echo v2_getAdresnyeObektyRow($arrPost);
}elseif ($arrPost['actions'] == "GetEMailResident"){
    echo v2_getEMailResident($arrPost);
}elseif ($arrPost['actions'] == "SendEmailReport"){
    echo v2_sendEmailReport($arrPost);
}elseif ($arrPost['actions'] == "GetUsersGroup"){
    echo v2_getUsersGroup();
}elseif ($arrPost['actions'] == "PushInDocument"){
    echo v2_pushInDocument($arrPost);
}elseif ($arrPost['actions'] == "getUserRole"){
    echo v2_getRole($arrPost['params']['username']);
}elseif ($arrPost['actions'] == "GetRelForm"){
    echo v2_getRelForm($arrPost);
}elseif ($arrPost['actions'] == "setSQL"){
    echo v2_setSql($arrPost['params']['sql']);
}elseif ($arrPost['actions'] == "GetCoordinatByString"){
    echo v2_getCoordinat($arrPost['params']['text']);
}elseif ($arrPost['actions'] == "GetSQLError"){
    echo v2_getSQLError();
}elseif ($arrPost['actions'] == "getBPRFilters"){
    echo v2_getBPRFilters($arrPost);
}elseif ($arrPost['actions'] == "GetTovarIerarh"){
    echo v2_getTovarIerarh();
}elseif ($arrPost['actions'] == "GetURLExcel"){
    echo v2_getURLExcel($arrPost['TableID']);
}elseif ($arrPost['actions'] == "Check_IsHeaderHas"){
    echo check_IsHeaderHas($arrPost);
}elseif ($arrPost['actions'] == "GetReportHeaders"){
    echo getReportHeaders($arrPost);
}elseif ($arrPost['actions'] == "SetReportHeaders"){
    echo setReportHeaders($arrPost);
}elseif ($arrPost['actions'] == "UpdateReportHeaders"){
    echo updateReportHeaders($arrPost);
}elseif ($arrPost['actions'] == "GetAllFieldsByReport"){
    echo getAllFieldsByReport($arrPost);
}elseif ($arrPost['actions'] == "GetAllReports"){
    echo getAllReports();
}elseif ($arrPost['actions'] == "GetAllReportsID"){
    echo getAllReportsID();
}elseif ($arrPost['actions'] == "GetAllDataFromForm"){
    echo getAllDataFromForm($arrPost);
}else{
    echo '{"ERROR":" action '.$arrPost['actions'].' не распознан "}';
}