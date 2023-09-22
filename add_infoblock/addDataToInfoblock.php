<?
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';
ini_set('memory_limit', '-1');
//    header("Content-Type: text/html; charset=UTF-8");
set_time_limit(6000);
define("IBLOCK_TYPE_ID" , "SIOPR");
define("SITE_ID" , "s1");
CModule::IncludeModule("iblock");
$ID = 1718;
$table = "xx_dt_NestatsionarnyeTorgovyeObekty";

addElementAndValueToProp($ID,$table);