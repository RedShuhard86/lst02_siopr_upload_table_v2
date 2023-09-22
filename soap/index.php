<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$options = array(
    'login' => "yarmarki",
    'password' => "portal!@3",
    'encoding'=> "UTF-8",
    'trace' => true
);
$str = file_get_contents($_FILES['file']['tmp_name']);

/*$str = str_replace(['<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'],[''],$str)*/
?>
<form method="post" enctype="multipart/form-data">
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
    <input type="file" style="width: 300px; height: 30px"; name="file">
    <input type="submit" style="width: 300px; height: 30px; margin-left: 20px;" value="Получить данные">
</form>
<?php
//$fName = 'test2.xml';
//$f = fopen($fName,'r');
//$str = fread($f, filesize($fName));
/* полчаем пространства имен */
if(strlen($str)<=0){die();}
$sxe = simplexml_load_string($str);
$namespaces = $sxe->getNamespaces(true);
foreach ($namespaces as $k=>$val){
    $str = str_replace([$k.':'],[''],$str);
}
$sxe2 = simplexml_load_string($str);
function objectsIntoArray($arrObjData, $arrSkipIndices = array())
{
    $arrData = array();

    // if input is object, convert into array
    if (is_object($arrObjData)) {
        $arrObjData = get_object_vars($arrObjData);
    }

    if (is_array($arrObjData)) {
        foreach ($arrObjData as $index => $value) {
            if (is_object($value) || is_array($value)) {
                $value = objectsIntoArray($value, $arrSkipIndices); // recursive call
            }
            if (in_array($index, $arrSkipIndices)) {
                continue;
            }
            $arrData[$index] = $value;
        }
    }
    return $arrData;
}
$arrRes = objectsIntoArray($sxe2);

$func = array_keys($arrRes['Body'])[0];
$param = array_keys($arrRes['Body'][$func]);
//echo "Функция : ".$func."<br>";
//echo "Параметры : ".print_r($param)."<br>";
//echo "<pre>"; print_r($arrRes['Body'][$func]); echo "</pre>";

$wsdl = "http://192.168.110.3:82/pre1Cv82dt/ws/yarmarki.1cws?wsdl";
$SOAP = new SoapClient($wsdl,$options);
$SOAP->__setLocation('http://192.168.110.3:82/pre1Cv82dt/ws/yarmarki.1cws');
$res = $SOAP->__getFunctions();
$res = $SOAP->$func($arrRes['Body'][$func]);
//$res = objectsIntoArray($res);

echo "<pre>"; print_r($res); echo "</pre>";die();