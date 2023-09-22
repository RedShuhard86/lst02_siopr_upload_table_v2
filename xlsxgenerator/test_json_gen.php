<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Layout;
use PhpOffice\PhpSpreadsheet\Chart\Legend as ChartLegend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use PhpOffice\PhpSpreadsheet\RichText;
$arrAlphabet = str_split("ABCDEFGHIJKLMNOPQRSTUVXYZ");

function charToNum($char){
    return ord(strtoupper($char)) - ord('A');
}
function numToChar($num){
    $num--;
    $arrRes = str_split("ABCDEFGHIJKLMNOPQRSTUVXYZ");
    if($num >= count($arrRes)){
        $n1 = (int)round($num / count($arrRes));
        $n2 = ($num - count($arrRes)*$n1);
        return $arrRes[$n1-1].$arrRes[$n2];
    }
    return $arrRes[$num];
}

$arrHeader=[
   [
        'ID'=>0,
        'lvl'=>0,
        'name'=>'Регион',
        'colvo'=>1,
       'font'=>'Areal',
       'size'=>'14',
       'color'=>'FF0000',
        'visible'=>true,
        'under'=>''
    ],
    [
        'ID'=>1,
        'lvl'=>0,
        'name'=>'Год',
        'colvo'=>1,
        'font'=>'Areal',
        'size'=>'14',
        'color'=>'FF0000',
        'visible'=>true,
        'under'=>[
            'ID'=>2,
            'parentID'=>1,
            'lvl'=>1,
            'name'=>'Месяц',
            'colvo'=>1,
            'font'=>'Areal',
            'size'=>'14',
            'color'=>'FF0000',
            'visible'=>true,
            'under'=>[
                'ID'=>3,
                'parentID'=>2,
                'lvl'=>2,
                'name'=>'День',
                'colvo'=>1,
                'font'=>'Areal',
                'size'=>'14',
                'color'=>'FF0000',
                'visible'=>false,
                'under'=>'',
            ]
        ]
    ],
    [
        'ID'=>4,
        'lvl'=>0,
        'name'=>'всего',
        'colvo'=>1,
        'font'=>'Areal',
        'size'=>'14',
        'color'=>'FF0000',
        'visible'=>true,
        'under'=>''
    ],
    [
        'ID'=>5,
        'lvl'=>0,
        'name'=>'процент',
        'colvo'=>1,
        'font'=>'Areal',
        'size'=>'14',
        'color'=>'FF0000',
        'visible'=>true,
        'under'=>''
    ]

];
//
$paramsID = [
    'setings'=>[
        'arrColumnSort' => ['Округ','Район','СТОСсылка'],
    ],
    2=>[
        'color'=>'ffff',
        'font'=>'Ar',
        'colvo'=>["янв","фев","мар","апр"],

    ],
    3=>[
        'visible'=>true,
        'colvo'=>[5,6,7]
    ]
];

//echo "<pre>"; print_r($paramsID); echo "</pre>";

function getMaxLvl($arr){
    $max_lvl = 0;
    foreach ($arr as $value) {
        if (is_array($value)) {
            $lvl= getMaxLvl($value) + 1;
            if ($lvl> $max_lvl) {
                $max_lvl = $lvl;
            }
        }
    }
    return $max_lvl;
}
$resTtt = [];
$sdvig = 0;
function recMath($arr,$param,$lvl,$max){
    global $resTtt,$sdvig;
    foreach ($arr as $k=>$value) {
        if(isset($param[$value['ID']]['colvo'])){
            $value['colvo'] = ($value['colvo'] * count($param[$value['ID']]['colvo']));
        }
        if (is_array($value['under'])) {
            $max = $max * $value['colvo'];
            $max = recMath([$value['under']], $param, ($lvl+1),$max);
            $resTtt[$lvl][$value['ID']] = ['name'=>$value['name'],'parentID'=>$value['parentID'],'lenRow'=>$max,'font'=>$value['font'],'color'=>$value['color'],'size'=>$value['size'],'sdvig'=>$sdvig,'child'=>true];
            if($lvl!=0) {
                return $max;
            }else{
                $sdvig = $sdvig + $max;
                $max = 1;
            }
        }else{
            $resTtt[$lvl][$value['ID']] = ['name'=>$value['name'],'parentID'=>$value['parentID'],'lenRow'=>($value['colvo']*$max),'font'=>$value['font'],'color'=>$value['color'],'size'=>$value['size'],'sdvig'=>$sdvig,'child'=>false];
            if($lvl != 0){
//                $sdvig = $sdvig + $value['colvo']*$max;
                return $value['colvo']*$max;
            }else{
                $sdvig = $sdvig +1;
            }
        }
    }
}


function recHead($arr,$param,$sd){
    global $arrAlphabet;
    $arrRes = [];
    foreach ($arr as $k=>$v){
        $k++;
        $tab = 0;
        foreach ($v as $key => $val) {

            while ($tab < $val['sdvig']){
//                echo " _/";
                $tab++;
            }
            $tab = $tab+$val['lenRow'];
            if (!$val['child']) {
                $i = 1;
                if (isset($param[$key])) {
                    $t = 0;
                    while ($i <= $val['lenRow']) {
//                        echo $param[$key]['colvo'][$t] . " ";
                        $arrRes[$key][$i]['text']=$param[$key]['colvo'][$t];
                        $arrRes[$key][$i]['start']=numToChar($val['sdvig']+$i).$k;
                        $arrRes[$key][$i]['merg']="";

                        $t++;
                        if ($t >= count($param[$key]['colvo'])) {
                            $t = 0;
                        }
                        $i++;
                    }
                } else {
                    while ($i <= $val['lenRow']) {
//                        echo $val['name'] . " ";
                        $arrRes[$key][$i]['text']=$val['name'];
                        if($val['lenRow']==1){
                            $arrRes[$key][$i]['start']=numToChar($val['lenRow']+$val['sdvig']).$k;
                            $arrRes[$key][$i]['merg']="";
                        }else {
                            $arrRes[$key][$i]['start'] = numToChar($val['sdvig']+1).$k;
                            $arrRes[$key][$i]['merg'] = numToChar($val['sdvig']+1).$k. ":" . numToChar($val['lenRow'] + ($val['sdvig']+1)).$k;
                        }
                        $i++;
                    }
                }
//                echo " | ";
            }else{
                $i = 0;
                if (isset($param[$key])) {
                    $s = $val['lenRow']/count($param[$key]['colvo']);
                    $sdvig = ($val['sdvig']+1);
                    while ($i < count($param[$key]['colvo'])) {
                        $ss = 1;
                        $arrRes[$key][$i]['text'] = $param[$key]['colvo'][$i];
                        while ($ss<=$s){
                            //echo $param[$key]['colvo'][$i] . " ";
                            $ss++;
                        }
                        $arrRes[$key][$i]['start'] = numToChar($sdvig).$k;
                        $arrRes[$key][$i]['merg'] = numToChar($sdvig).$k.":".numToChar($sdvig+($ss-2)).$k;

                        $sdvig = $sdvig+($ss-1);
                        $i++;
                    }
                } else {
                    while ($i <= $val['lenRow']) {
//                        echo $val['name'] . " ";
                        $arrRes[$key][$i]['text']=$val['name'];
                        if($val['lenRow']==1){
                            $arrRes[$key][$i]['start']=numToChar($val['lenRow']+$val['sdvig']).$k;
                            $arrRes[$key][$i]['merg']="";
                        }else {
                            $arrRes[$key][$i]['start'] = numToChar($val['sdvig']+1).$k;
                            $arrRes[$key][$i]['merg'] = numToChar($val['sdvig']+1).$k . ":" . numToChar($val['lenRow'] + $val['sdvig']).$k;
                        }
                        $i++;
                    }
                }
//                echo " | ";
            }
        }
//        echo "<br>";
    }
    return $arrRes;
}

function xlsxTester($arr){
    $inputFileName = $_SERVER["DOCUMENT_ROOT"].'/xlsxgenerator/xlsx_patterns/pattern_1.xlsx';
    $inputFileType = IOFactory::identify($inputFileName);
    $reader = IOFactory::createReader($inputFileType);
    $spreadsheet = $reader->load($inputFileName);
    $sheet = $spreadsheet->getSheet(0);
    $filename = $_SERVER["DOCUMENT_ROOT"].'/xlsxgenerator/upload_reports/TEST_'.date("Y-m-d").'.xlsx';

    foreach ($arr as $k=>$v){
        foreach ($v as $key=>$val){
            //echo "<pre>"; print_r($val); echo "</pre>";
            $sheet->setCellValue($val['start'],$val['text']);
            if(strlen($val['merg'])>0){
                $sheet->mergeCells($val['merg']);
            }
        }
    }
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->setIncludeCharts(true);
    $writer->save($filename);

}

function rtableArrayGenerator($header,$param){
    global $resTtt;
    $maxLvl = getMaxLvl($header);
    recMath($header,$param,0,1);
    ksort($resTtt);
    $res = recHead($resTtt,$param,3);
    xlsxTester($res);
    echo "<pre>"; print_r($resTtt); echo "</pre>";
    echo "<pre>"; print_r($res); echo "</pre>";
}




rtableArrayGenerator($arrHeader,$paramsID);