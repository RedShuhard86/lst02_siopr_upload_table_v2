<?php
phpinfo();die();
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

//$fName = '0001-9000003-030301-1445370_22.xml';
$fName = '0001-9000003-030301-1447676_22.xml';

$f = fopen($fName,'r');
$str = fread($f, filesize($fName));

/* полчаем пространства имен */
$sxe = new SimpleXMLElement($str);
$namespaces = $sxe->getNamespaces(true);

/* удаляем ПРЕФИКСЫ имен в именах полей */
//echo "<pre>"; print_r($namespaces); echo "</pre>";die();
foreach ($namespaces as $k=>$val){
    $str = str_replace([$k.':',':'.$k],'',$str);
}

/* пробуем получить ГОТОВЫЙ ОБЪЕКТ xml */
$xml = simplexml_load_string($str);
function objectToArray ($object) {
    if(!is_object($object) && !is_array($object))
        return $object;

    return array_map('objectToArray', (array) $object);
}
$arrRes = objectToArray($xml);

/* Шаблон вывода ошибки */
$errorStr = "";
$arrERROR = [
    "ErrorMessage"=>"",
    "ErrorCode"=>"",
    "НомерАС_ГУФ"=>"",
    "RelatesTo"=>"",
    "Дата"=>"",
];

/* Результирующи массив, скелет */

$arrReturnJson = [
    "НомерМПГУ"=>"",
    "ДатаПодачиЗаявки"=>"",
    "Округ"=>"",
    "Район"=>"",
    "Специализация"=>"",
    "Миллисекунды"=>"",
    "IPАдрес"=>"",
    "ВидУслуги"=>"",
    "ВыЯвляетесь"=>"",
    "ХС"=>"",
    "ПодозрительнаяЗаявка"=>"",
    "Ссылка"=>"",
    "ИННСНИЛС"=>"",
    "ИНН"=>"",
    "ОГРН"=>"",
    "Наименование"=>"",
    "Имя"=>"",
    "Фамилия"=>"",
    "Отчество"=>"",
    "ОПФ"=>"",
    "Записать"=>"",
    "СтатусЗаявки"=>"",
    "ПредварительнаяПричинаОтклонения"=>"",
    "ВтораяКампания"=>"",
    "ДоверенныеЛица"=>"",
    "ОснованиеОтказа"=>"",
    "НомерДок"=>"",
    "ТоварныйПеречень"=>"",
    "Серия"=>""
];

if(!is_array($arrRes)){
    $arrERROR['ErrorCode'] = "Error";
    $arrERROR['ErrorMessage'] = "Не удалось разобрать запрос ";
    $errorStr .= implode(", ",$arrERROR)."\r\n";
    die($errorStr);
}
if(!isset($arrRes['Service']) || count($arrRes['Service'])<=0){
    $arrERROR['ErrorCode'] = "Error";
    $arrERROR['ErrorMessage'] = "Не найден тэг Service";
    $errorStr .= implode(", ",$arrERROR)."\r\n";
    die($errorStr);
}

$ApplicationNumberASGUF = $arrRes['Service']['ServiceNumber'];
if(strlen($ApplicationNumberASGUF)<=0){
    /* ВОПРОС */
    $ApplicationNumberASGUF = ""; //Строка(Новый УникальныйИдентификатор)
    $arrERROR['ErrorCode'] = "Warning";
    $arrERROR['ErrorMessage'] = "НомерЗаявленияАСГУФ не получен из файла а запрошен в 1с ";
    $errorStr .= implode(", ",$arrERROR)."\r\n";
}
$FromOrgCode = (int)str_replace("НПП","", $arrRes['Service']['CreatedByDepartment']['Code']);
$ToOrgCode = "";

