<?php
//phpinfo();
//echo "1";
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//
//$arrTest = ['A'=>['B'=>['C'=>['F'=>[1,2]]]]];
//$strJson = json_encode($arrTest);
//echo $strJson;
//$arrJson = json_decode('{"A":{"B":{"C":{"F":{"3":4,"5":6}}}}}',true);
//$result = array_merge_recursive($arrTest, $arrJson);
////echo "<pre>"; print_r($arrTest); echo "</pre>";
//echo "<pre>"; print_r($arrJson); echo "</pre>";
//echo "<pre>"; print_r($result); echo "</pre>";


$res = getUsersGroup();
echo "<pre>"; print_r($res); echo "</pre>";