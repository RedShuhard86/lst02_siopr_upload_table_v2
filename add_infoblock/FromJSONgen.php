<?php

$filename = "xx_dt_NestatsionarnyeTorgovyeObekty.txt";
$str = "";

$handle = fopen($filename,"r");
$str = fread($handle, filesize($filename));
fclose($handle);

$arStr = json_decode($str, true);

$arrSections = [];
iterator($arStr,0);




function iterator($arr, $st){
    $arrTypeName = ["table_name","tab_name","name_ru","title"];
    global $arrSections;

    foreach ($arr as $k => $val){
        foreach ($arrTypeName as $nam){
            if($val[$nam] != ""){
                $arrSections[] = $val[$nam];
            }
        }

        if($k == "tabs" || $k == "groups" ||  $k == "headers"){
            $st++;
            iterator($val, $st);
        }

    }
}