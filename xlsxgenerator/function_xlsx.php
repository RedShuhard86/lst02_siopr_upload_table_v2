<?php
/* файл генерации XLSX документов */

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


require_once($_SERVER['DOCUMENT_ROOT'].'/xlsxgenerator/xlsx_param.php');
$arrAlphabet = str_split("ABCDEFGHIJKLMNOPQRSTUVXYZ");


function charToNum($char){
    return ord(strtoupper($char)) - ord('A');
}

function tinao($val,$t=0){
    $arr = ['ТАО','НАО','Троицкий административный округ','Новомосковский административный округ'];
    if(in_array(trim($val), $arr)){
        if($t==1){
            return "Троицкий и новомосковский административный округ";
        }else {
            return "ТиНАО";
        }
    }else{
        return $val;
    }
}

function numToChar($num){
    $arrRes = str_split("ABCDEFGHIJKLMNOPQRSTUVXYZ");
    if($num >= count($arrRes)){
        $n1 = (int)round($num / count($arrRes));
        $n2 = ($num - count($arrRes)*$n1);
        return $arrRes[$n1-1].$arrRes[$n2];
    }
    return $arrRes[$num];
}
function mToN($str){
    $arr=[
        'Январь'=>'a',
        'Февраль'=>'b',
        'Март'=>'c',
        'Апрель'=>'d',
        'Май'=>'e',
        'Июнь'=>'f',
        'Июль'=>'g',
        'Август'=>'h',
        'Сентябрь'=>'i',
        'Октябрь'=>'j',
        'Ноябрь'=>'k',
        'Декабрь'=>'l'
    ];
    return $arr[$str];
}
/* настройка сортировки массива в зависимости от выбранных столбцов таблицы */

$resAr = [];
$iis = 0;

/* формирует набор дат между двумя указанными с нужным шагом в ДЕНЬ, МЕСЯЦ ... */
function rangeDataGenerator($strData,$step = 'd'){
    $arrStart = explode("-",$strData);

    $type = 'P1D';
    if($step == 'm'){
        $type = 'P1M';
    }

    $period = new DatePeriod(
        new DateTime($arrStart[0]),
        new DateInterval($type),
        new DateTime($arrStart[1])
    );
    $arrDataRen = [];
    foreach ($period as $key=>$value){
        $arrDataRen[] = str_replace("#","T", $value->format('Y-m-d#H:i:s'));
    }
    return $arrDataRen;
}

/* Основная функция для создания XLSX */
function xlsx_creator($arr, $name, $info){
//    echo "<pre>"; print_r($arr); echo "</pre>";
//
//    die();
    $nam = $name[0]['form_name_1C'].$name[0]['variant'];
//    echo $nam;
//    die();
    $arrParamReport = selectXlsxSchem($nam);
    if(!is_array($arrParamReport)){
        return;
    }
    getResByReport( $arr['values'], $arrParamReport,$info,$nam);
}

/* ГЕНЕРАТОР ДИАГРАММ */
function getDiagram($namePie,$sheet,$arrParam,$lTop = 7){
    global $arrColorsForChar;

    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);

    $sheet->fromArray($arrParam,null,'A'.$lTop);

    $sdvig = $lTop+(count($arrParam)-1);
    $dataSeriesLabels1 = [
        new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'report!$A$'.$lTop, null, 1), // 2011
    ];
    $xAxisTickValues1 = [
        new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'report!$A$'.($lTop+1).':$A$'.$sdvig, null, count($arrParam)), // Q1 to Q4
    ];
    $dataSeriesValues1 = [
        new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'report!$B$'.($lTop+1).':$B$'.$sdvig, null, count($arrParam),[],null,$arrColorsForChar),
    ];

// Build the dataseries
    $series1 = new DataSeries(
        DataSeries::TYPE_PIECHART, // plotType
        null, // plotGrouping (Pie charts don't have any grouping)
        range(0, count($dataSeriesValues1) - 1), // plotOrder
        $dataSeriesLabels1, // plotLabel
        $xAxisTickValues1, // plotCategory
        $dataSeriesValues1          // plotValues
    );

// Set up a layout object for the Pie chart
    $layout1 = new Layout();
    $layout1->setShowVal(false);
    $layout1->setShowPercent(true);

// Set the series in the plot area
    $plotArea1 = new PlotArea($layout1, [$series1]);
// Set the chart legend
    $legend1 = new ChartLegend(ChartLegend::POSITION_RIGHT, null, false);

    $title1 = new Title($namePie);

// Create the chart
    $chart = new Chart(
        'chart1', // name
        $title1, // title
        $legend1, // legend
        $plotArea1, // plotArea
        true, // plotVisibleOnly
        DataSeries::EMPTY_AS_GAP, // displayBlanksAs
        null, // xAxisLabel
        null   // yAxisLabel - Pie charts don't have a Y-Axis
    );
    return $chart;
}

/* ПРИМЕНЯЕМ ИСКЛЮЧЕНИЯ ДЛЯ ОСНОВНОГО МАССИВА ЧТО БЫ УБРАТЬ ЛИШНИЕ СТРОКИ */
function exceptApply($arrVal, $rula){
    $res = [];
    $i=0;
    foreach ($arrVal as $item) {
        if(str_split($rula['exc']['val'])[0]=="!" && $item[$rula['exc']['col']] != $rula['exc']['val']){
            foreach ($item as $kk => $val){
                $res[$i][$kk]=$val;
            }
            $i++;
        }elseif(str_split($rula['exc']['val'])[0]!="!" && $item[$rula['exc']['col']] == $rula['exc']['val']){
            foreach ($item as $kk => $val){
                $res[$i][$kk]=$val;
            }
            $i++;
        }
    }
    return $res;
}

/* МЕНЯЕМ ПОЛОЖЕНИЯ СТОЛБЦОВ В МАССИВЕ И СОРТИРУЕМ ПО АЛФАВИТУ */
function indexShuffle($protoVal_stepOne,$arrKey){

    /* РЕАЛЬНЫЙ ПОРЯДОК КЛЮЧЕЙ МАССИВА */
    $arrRealKey = [];
    foreach ($protoVal_stepOne[0] as $k=>$n){
        $arrRealKey[]=$k;
    }
    /* СОЗДАЁМ НАЧАЛЬНЫЙ МАССИВ ДЛЯ ПЕРЕФОРМИРОВАНИЯ ОСНОВНОГО МАССИВА */
    $arrKeyByStep = [];
    foreach ($arrKey as $k=>$n){
        $arrKeyByStep[] = $n;
    }
//    echo "<pre>"; print_r($arrKey); echo "</pre>";
    /* ЗАПОЛНЯЕМ НАЧАЛЬНЫЙ МАССИВ ДЛЯ ПЕРЕФОРМИРОВАНИЯ ОСТАЛЬНЫМИ КЛЮЧАМИ */
    foreach ($arrRealKey as $valKey){
        if(!in_array($valKey, $arrKeyByStep)){
            array_push($arrKeyByStep,$valKey);
        }
    }
    /* ФОРМИРУЕМ ДАННЫЕ СОГЛАСНО ПЕРЕТАСОВАННЫМ ИНДЕКСАМ */
    foreach ($protoVal_stepOne as $k => $item){
        foreach ($arrKeyByStep as $kk){
            $protoVal[$k][$kk] = $item[$kk];
        }
    }
    /**
     * МУЛЬТИСОРТИРОВКА
     */
    array_multisort($protoVal);
    return $protoVal;
}



$arrPreRes = [];
$arrItogo = [];

/* РЕКУРСИВНЫЙ ОБХОД В-ДЕРЕВА ДЛЯ ДАЛЬНЕЙШЕГО РАССЧЁТА */
function recursivValueEdit($arr,$lvl=0,$bTreeLen,$arrParam){
    global $arrPreRes, $arrItogo;
    $arrLen = count($arrPreRes);
    $rula = $arrParam['rula']['recurs_similar'];
//    echo "<pre>";print_r($arr);echo"</pre>";
    foreach ($arr as $k => $v) {

//        $arrLen = count($arrPreRes);
//        if ($vv == 5){
//            echo "<pre>";print_r($v);echo"</pre>";
//            echo "<pre>";print_r(count($v["TopGun"]));echo"</pre>";
//        }
//        $vv++;



        if ($lvl == ($bTreeLen-2) && $rula){
            $arrSimilar = [];
            $i = 1;
                foreach ($v as $kk => $vv) {
                    if (count($vv) > 1) {
                        foreach ($vv as $kkk => $vvv) {
                            $arrSimilar['$$(' . $i . ')&&' . $kk][$kkk] = $v[$kk][$kkk];
                            $i++;
                        }
                        unset($v[$kk]);
//                    echo "<pre>";print_r($k);echo"</pre>";
//                    echo "<pre>";print_r($v);echo"</pre>";
                    }
                    else{
                        $arrSimilar[$kk] = $vv;
                        unset($v[$kk]);
                    }
                }
                $v = $arrSimilar;
        }



        if(is_array($v) && $lvl < $bTreeLen){
            $arrPreRes[][$lvl] = $k;



            recursivValueEdit($v,$lvl+1,$bTreeLen,$arrParam);

        }elseif (is_array($v) && $lvl >= $bTreeLen){


            $i=0;
            foreach ($arrParam['arrColumnCalc'] as $col=>$fun) {
                if(in_array('top',$fun)){
                    $arrPreRes[$arrLen-1]['top'][$i]['val'] += (float)$v[$col];
                    $arrPreRes[$arrLen-1]['top'][$i]['pos'] = ($i+$bTreeLen);
                }
                if(in_array('min',$fun)) {
                    if($arrPreRes[$arrLen - 1]['min'][$i]['val'] == ''){
                        $arrPreRes[$arrLen - 1]['min'][$i]['val'] = (float)$v[$col];
                    }
                    if ((float)$v[$col] < $arrPreRes[$arrLen - 1]['min'][$i]['val']) {
                        $arrPreRes[$arrLen - 1]['min'][$i]['val'] = (float)$v[$col];
                    }
                    $arrPreRes[$arrLen-1]['min'][$i]['pos'] = ($i+$bTreeLen);
                }
                if(in_array('max',$fun)) {
//                    echo $v[$col]."<br>";
                    if($arrPreRes[$arrLen - 1]['max'][$i]['val'] == ''){
                        $arrPreRes[$arrLen - 1]['max'][$i]['val'] = (float)$v[$col];
                    }
                    if ((float)$v[$col] > $arrPreRes[$arrLen - 1][$i]['max']['val']) {
                        $arrPreRes[$arrLen - 1]['max'][$i]['val'] = (float)$v[$col];
                    }
                    $arrPreRes[$arrLen - 1]['max'][$i]['pos'] = ($i + $bTreeLen);
                }
                if(in_array('mid',$fun)) {
                    if($arrPreRes[$arrLen - 1]['mid'][$i]['val'] == ''){
                        $arrPreRes[$arrLen - 1]['mid'][$i]['val'] = (float)$v[$col];
                    }
                    if((float)$v[$col] != $arrPreRes[$arrLen - 1]['mid']['val']){
                        $arrPreRes[$arrLen - 1]['mid'][$i]['val'] = (float)$v[$col];
                    }
                    $arrPreRes[$arrLen-1]['mid'][$i]['pos'] = ($i+$bTreeLen);
                }
                if(in_array('sim',$fun)){
                    $arrPreRes[$arrLen]['sim'][$i]['val'] = $v[$col];
                    $arrPreRes[$arrLen]['sim'][$i]['pos'] = ($i+$bTreeLen);
                }
                if(in_array('data',$fun)){
                    $arrPreRes[$arrLen-1]['data'][$i]['val'] = $v[$col];
                    $arrPreRes[$arrLen-1]['data'][$i]['pos'] = ($i+$bTreeLen);
                }
                if(in_array('itogo',$fun)){
                    $arrItogo[$i]['val'] += (float)$v[$col];
                    $arrItogo[$i]['pos'] = ($i+$bTreeLen);
                };
                $i++;
            }


            $arrPreRes[$arrLen][$lvl] = array_merge_recursive($v);
//            $lvl++;

        }
    }


    return $arrPreRes;
}

/* ЧИСТИМ СТРОКУ ЧТОБЫ JSON СХАВАЛ */
function verStr($s){
    return str_replace('"','',$s);
}


/* СОЗДАЁМ МАССИВ ТАБЛИЦЫ */
function tableGenerator($arr, $param){
//    echo "<pre>"; print_r($arr); echo "</pre>";die();
    $sort = count($param['arrColumnSort']);
    $calc = count($param['arrColumnCalc']);
    $rula = $param['rula']['view'];
    $sumCol = ($sort + $calc);
    $allElem = count($arr);
    $arrGlobalTable = [];
    $step = 0;
    foreach ($arr as $val){
//        echo "<pre>";print_r($val);echo"</pre>";
        $i=0;
        while ($i < $sumCol){
            if($arrGlobalTable[$step][$i] == ""){
                $arrGlobalTable[$step][$i] = "";
            }
            $key = array_keys($val)[$i];

            if(isset($val[$i]) && !is_array($val[$i])) {
                $arrGlobalTable[$step][$i] = $val[$i];
            }
            if($key === 'top'){
                foreach ($val['top'] as $vVal) {
                    $v = $vVal['val'];
//                    if(!is_int($v)){
//                        $v = number_format($v, 2, '.', ' ');
//                    }
                    $arrGlobalTable[$step][$vVal['pos']] = $v;
                }
//                echo "<pre>"; print_r($arrGlobalTable); echo "</pre>";
//                die();
            }
            if($key === 'data'){
                foreach ($val['data'] as $vVal) {
                    $v = $vVal['val'];


//                    if (is_array($v)){
//                        foreach ($v as $item){
//                            $arrGlobalTable[$step][$vVal['pos']] = $item;
//                            $step++;
//                        }
//                    }else {

                        $arrGlobalTable[$step][$vVal['pos']] = $v;
//                    }
                }
            }
            if($key === 'min'){
                $arrGlobalTable[$step][$val['min']['pos']] = number_format($val['min']['val'],2,'.',' ');
            }
            if($key === 'max'){
                $arrGlobalTable[$step][$val['max']['pos']] = number_format($val['max']['val'],2,'.',' ');
            }
            if($key === 'mid'){
                $arrGlobalTable[$step][$val['mid']['pos']] = number_format($val['mid']['val'],2,'.',' ');
            }
            if($key === 'prc'){

                foreach ($val['prc'] as $vVal) {
                    $v = $vVal['val'];
//                    if(!is_int($v)){
//                        $v = number_format($v, 2, '.', ' ');
//                    }
                    $arrGlobalTable[$step][$vVal['pos']] = number_format($v,2,'.',' ');
                }

//                echo "<pre>"; print_r($arrGlobalTable); echo "</pre>";die();

//                echo "<pre>";print_r($val);echo"</pre>";
//                $arrGlobalTable[$step][$val['prc']['pos']] = number_format($val['prc']['val'],2,'.',' ');
            }
            if($key === 'itogo'){
                $arrGlobalTable[$allElem][0] = "ИТОГО";
                $arrGlobalTable[$allElem][1] = "";
                foreach ($val['itogo'] as $vVal) {
                    $arrGlobalTable[$allElem][$vVal['pos']] = $vVal['val'];
                }
//                echo "<pre>"; print_r($arrGlobalTable); echo "</pre>";
            }
            if (isset($val[$i]) && $i == $sort && is_array($val[$i])){
//                echo "<pre>";print_r($val[$i]);echo"</pre><br>";
//                die();
                if($rula === 'list') {
                    $ii = 0;
                    while ($ii < $sumCol) {
                        $arrGlobalTable[$step][$ii] = "";
                        if ($ii >= $sort) {
//                            echo "<pre>";print_r($step);echo"</pre>";
                            $arrGlobalTable[$step][$ii] = $val[$i][array_keys($val[$i])[($ii-$sort)]];
                        }
                        $ii++;
                    }
                    $step++;
                }else{
                    $step--;
                }
            }



            if($calc<=0){
                $arrGlobalTable[$step][$i] = $val[$i];
            }
            $i++;
        }
        ksort($arrGlobalTable[$step]);

        $step++;
    }

//echo "<pre>";print_r($arrGlobalTable);echo"</pre>";

    $steps = [];
    $steps_save = [];
    $extra = [];
    $rezZz=[];
    $step = 0;
    while ($step < ($sort-1)){
        $steps[$step] = 0;
        $step++;
    }

    $kk=0;
    foreach ($param['arrColumnCalc'] as $nam => $arrCalc){
        $kk++;
        if(in_array('max',$arrCalc)){
            $extra['max'] = ($kk + ($sort-1));
        }
        if(in_array('data',$arrCalc)){
            $extra['data'] = ($kk + ($sort-1));
        }
    }
//    echo "<pre>"; print_r($extra); echo "</pre>";
//    die();


    foreach ($arrGlobalTable as $key => $row){
//        echo "<pre>";print_r($row);echo"</pre>";
        foreach ($row as $pos => $val){
            if($pos < ($sort-1) && $val != ""){
                $steps[$pos] = $val;
                continue;
            }

            if ($steps_save){
                for ($i = 0;$i != (count($steps)-1); $i++){
                    if ($steps_save[$i] != $steps[$i]){
                        $step = $i+1;
                        while ($step < ($sort-1)){
                            $steps[$step] = 0;
                            $step++;
                        }
                        break;
                    }
                }

            }
            $steps_save = $steps;

//            echo "<pre>";print_r($steps);echo"</pre>";

            foreach ($steps as $lv => $tt) {

                if ($tt) {

                    if ($lv - 1 < 0) {
                        $indexZ = 0;
                    } else {
                        $indexZ = $steps[$lv - 1];
                    }

                    if ($extra['max'] && in_array($pos, $extra)) {
                        $rezZz[$indexZ][$tt][$pos] = $val;
                    } elseif ($extra['data'] && in_array($pos, $extra)) {
                        $rezZz[$indexZ][$tt][$pos] = "";
                    } else {
                            if (is_numeric($val)) {
                                $rezZz[$indexZ][$tt][$pos] += $val;
                            }

//                        }
                    }
                }
            }
        }
    }
//    echo "<pre>";print_r($rezZz);echo"</pre>";

    foreach ($arrGlobalTable as $keyy => $row){
        $step = 0;
        while ($step < ($sort-1)){
            if($row[$step] != "") {

//                echo "<pre>";print_r($row[$step]);echo"</pre>";

                if ($step == 0){
//                    foreach ($rezZz[$step] as $lvl => $val){
                    if ($rezZz[$step][$row[$step]]){
                        foreach ($rezZz[$step][$row[$step]] as $lvl1 => $val1){
                            if ($lvl1 > $step){
                                $arrGlobalTable[$keyy][$lvl1] = $val1;
                                unset($rezZz[$step][$row[$step]]);
                            }
                        }
                    }
                    unset($arrGlobalTable[$keyy][null]);
                }else{
                    foreach ($rezZz as $lvl => $val) {

                        if ($val[$row[$step]]) {
                            foreach ($val[$row[$step]] as $lvl1 => $val1) {
                                if ($lvl1 > $step) {
                                    $arrGlobalTable[$keyy][$lvl1] = $val1;
                                }
                            }
                            unset($rezZz[$lvl][$row[$step]]);
                            break;
                        }
                    }


//                        echo "<pre>";print_r($lvl);echo"</pre>";
//                        echo "<pre>";print_r($val);echo"</pre>";
//
//                        foreach ($val as $lvl1 => $val1) {
//                            foreach ($val1 as $lvl2 => $val2){
//                                if ($lvl2 > $step) {
//                                    $arrGlobalTable[$keyy][$lvl2] = $val2;
//                                }
////                                echo "<pre>";print_r($rezZz[$lvl][$lvl1]);echo"</pre>";die();
//                            }
//                            unset($rezZz[$lvl][$lvl1]);
//                        }

//                    echo "<pre>";print_r($rezZz);echo"</pre>";
                    unset($arrGlobalTable[$keyy][null]);
                }



//                foreach ($rezZz[$row[$step]] as $kk => $val){
//                    if($kk > $step) {
//                        $arrGlobalTable[$keyy][$kk] = $val;
//                    }
//                }
//                unset($arrGlobalTable[$keyy][null]);
            }
            $step++;
        }
    }
//    echo "<pre>";print_r($arrGlobalTable);echo"</pre>";

    $resArrGlobalTable = [];
    $l = count($arrGlobalTable[1]);
    foreach ($arrGlobalTable as $k=>$v){
        $i = 0;
        while ($i<$l){
            $resArrGlobalTable[$k][]=$v[$i];
            $i++;
        }
    }
//    echo "<pre>"; print_r($resArrGlobalTable); echo "</pre>";
//    die();
    return $resArrGlobalTable;
}

/* ГЕНЕРИРУЕМ B-ДЕРЕВО ДЛЯ ДАЛЬНЕЙШЕГО РАЗБОРА */
function bTreeGenerator($arrCol, $arrVal, $arrCalc){
    $arrRes = [];
    foreach ($arrVal as $bK => $val) {
        $str = "{";
        $end = "}";
            foreach ($arrCol as $k => $value) {
                if ($k < (count($arrCol) - 1)) {
                    $str .= '"' . verStr($val[$value]) . '":{';
                } else {
                    $str .= '"' . verStr($val[$value]) . '":{"' . $bK . '":{';
                }
                $end .= "}";
            }
        $i = 0;
        foreach ($arrCalc as $kk => $value) {
            if($i < (count($arrCalc)-1)) {
                $str .= '"' . $kk . '":"' . verStr($val[$kk]) . '",';
            }else{
                $str .= '"' . $kk . '":"' . verStr($val[$kk]) . '"';
            }
            $i++;
        }
            $str = $str . "}" . $end;
//        echo "<pre>";print_r(json_decode($str,true));echo"</pre><br>";
        $arrRes = array_merge_recursive($arrRes, json_decode($str,true));
//        echo "<pre>";print_r($arrRes);echo"</pre>";
    }
//    echo "<pre>";print_r($arrRes);echo"</pre>";//
    return $arrRes;
}


function xlsxCreator($arrTable, $arrParamReport, $info, $nam, $arrChar){
    global $overStyleForTable,$arrAlphabet;
    $user = getUser();
//    echo "<pre>";print_r($arrTable);echo"</pre>";

    $zag = $arrParamReport['arrStyle']['header_text'];
    $row = START_POSITION_TABLE;
    $arrInfo = [];
    $arrHeader = $arrParamReport['header_line'];
    foreach ($info as $k=>$val){
        if($val['value']!="") {
            if($val['value'] === true || $val['value'] === 1){
                $val['value'] = "ДА";
            }
            $arrInfo[] = [$val['Заголовок'], $val['value']];
        }
        $row++;
    }

    $inputFileName = $_SERVER["DOCUMENT_ROOT"].'/xlsxgenerator/xlsx_patterns/pattern_1.xlsx';
    $inputFileType = IOFactory::identify($inputFileName);
    $reader = IOFactory::createReader($inputFileType);
    $spreadsheet = $reader->load($inputFileName);
    $sheet = $spreadsheet->getSheet(0);
    $filename = $_SERVER["DOCUMENT_ROOT"].'/xlsxgenerator/upload_reports/new_'.$nam.'_'.str_replace(" ","_",$user['log']).'_'.date("Y-m-d").'.xlsx';
    $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
    $spreadsheet->getDefaultStyle()->getFont()->setSize(8);

    /* название отчёта */
    $sheet->setCellValue('A1',$zag);
    $sheet->setShowSummaryBelow(false);
    $sheet->getCell('A1')->getStyle('A1')->applyFromArray($overStyleForTable['zag_style']);
    $sheet->getColumnDimension('A')->setWidth(40);
    $sheet->getColumnDimension('B')->setWidth(30);
    $sheet->getColumnDimension('C')->setWidth(30);

    $inLine = count($arrHeader);
    $lasLineZag = $arrHeader[$inLine-1];
    foreach ($arrAlphabet as $k => $char){
        if($k>2) {
            $len = count(str_split($lasLineZag[$k]));
            $sheet->getColumnDimension($char)->setWidth($len);
        }
    }
    $sheet->fromArray($arrInfo, NULL, 'A' . START_POSITION_TABLE);


    $xlsx_content = ($row+count($arrHeader));
    if($arrParamReport['function']['format']=='liner' && $arrParamReport['function']['else']=='simple'){
        $datRen = rangeDataGenerator($info[0]['value'],$arrParamReport['function']['step']);
        $arrHeader[0] = array_merge($arrHeader[0], $datRen);
    }

    foreach ($arrHeader as $k=>$val){
        $sheet->fromArray($val, NULL, 'A'.$row)->getStyle('A'.$row.':'.numToChar(count($val)-1).$row)->applyFromArray($overStyleForTable['header_style']);
        $row++;
    }

    /* записываем данные в таблицу целиком */
//    echo "<pre>"; print_r($arrTable); echo "</pre>";die();
    $sheet->fromArray($arrTable, NULL, 'A'.$xlsx_content);

    $row = $xlsx_content;

//    echo "<pre>"; print_r(array_slice($arrRes['val'],0,20)); echo "</pre>";

    $charA = $arrParamReport['rula']['merge_line'][0]['char'];
    $rowA = $arrParamReport['rula']['merge_line'][0]['row'];
    $charB = $arrParamReport['rula']['merge_line'][1]['char'];
    $rowB = $arrParamReport['rula']['merge_line'][1]['row'];
    $rowHei = count($arrTable)-1;

    $sheet->getStyle('A'.$xlsx_content.':'.numToChar(count($arrHeader[0])-1).($rowHei+$xlsx_content))->applyFromArray($overStyleForTable['BORDER']);

    foreach ($arrTable as $kk => $val){

        foreach ($val as $k => $cel) {
            if(substr($cel,0,2) == "$$"){
                $new_cel = explode("&&", $cel);
                $sheet->setCellValue(numToChar($k).$row, $new_cel[1]);
//                echo "<pre>";print_r($cel);echo"</pre>";
//                $sheet->getStyle(numToChar($k).$row)->getFont()->setBold(true)->setSize(10);
            }
        }


        if(strlen($val[0]) > 1 || in_array("ИТОГО",$val,true)) {
//            echo "<pre>"; print_r($val); echo "</pre>";
            foreach ($val as $k => $cel) {
                if(trim($cel)!=""){
                    $sheet->getStyle(numToChar($k).$row)->getFont()->setBold(true)->setSize(10);
                }
            }
        }
        $rowMergeText = [];
        $i = charToNum($charA);

        while ($i <= charToNum($charB)){
            $ii = $rowA;
            while ($ii <= $rowB) {
                $rowMergeText[$i][$ii] = $sheet->getCell(numToChar($i).($ii+$row))->getValue();
                $ii++;
            }
            $i++;
        }
//echo "<pre>";print_r($rowMergeText);echo"</pre>";
        $richText = new RichText\RichText();
        $richText ->createText("");
        foreach ($rowMergeText as $k => $colVal){
            foreach ($colVal as $kk => $cellVal){
                $cell = $sheet->getCell(numToChar($k).($kk+$row))."    \t\n";
                if($k == 0){
                    $payable = $richText->createTextRun($cell);
                    $payable->getFont()->setBold(true);
                }elseif($k == 1){
                    $payable = $richText->createTextRun($cell);
                    $payable->getFont()->setItalic(true);
                }elseif($k == 2){
                    $richText->createTextRun($cell);
                    $payable->getFont()->setItalic(true);
                }elseif($k == 3){
                    $richText->createTextRun($cell);
                    $payable->getFont()->setItalic(true);
                }elseif($k == 4){
                    $richText->createTextRun($cell);
                }
            }
        }
        $sheet->setCellValue($charA.($rowA+$row),$richText);
        $sheet->mergeCells($charA.($rowA+$row).":".$charB.($rowB+$row));

        if($val[0]!=""){
            $sheet->getRowDimension($row)->setOutlineLevel(1);
        }elseif ($val[1]!=""){
            $sheet->getRowDimension($row)->setOutlineLevel(2);
        }elseif ($val[2]!=""){
            $sheet->getRowDimension($row)->setOutlineLevel(3);
        }elseif ($val[3]!=""){
            $sheet->getRowDimension($row)->setOutlineLevel(4);
        }elseif ($val[4]!=""){
            $sheet->getRowDimension($row)->setOutlineLevel(5);
        }elseif ($val[5]!=""){
            $sheet->getRowDimension($row)->setOutlineLevel(6);
        }
        //$sheet->getRowDimension($row)->setOutlineLevel(1);
//        if (strlen(trim($val[0])) >= 3 && count($arrParamReport['arrColumnSort']) <= 2) {
//            $sheet->getRowDimension($row)->setOutlineLevel(1);
//        }
        if (strlen(trim($val[1])) >= 3 && count($arrParamReport['arrColumnSort']) > 2) {
            $sheet->getRowDimension($row)->setOutlineLevel(2);
        }
//            echo "<pre>"; print_r($val); echo "</pre>";
        $sheet->getRowDimension($row)->setRowHeight(16);
        $row++;
    }

    $row = $row+3;
    if(count($arrChar)>0) {
        //echo "<pre>"; print_r($arrChar); echo "</pre>";

        foreach ($arrChar as $k => $item) {
            $char = getDiagram($item['name'], $sheet, $item['arrVal'], $row);
            $char->setTopLeftPosition('A' . $row);
            $step = count($item['arrVal']);
            if ($step < 36) {
                $step = 36;
            }
            $char->setBottomRightPosition('L' . ($row + $step));
            $row = ($row + $step + 3);
            $sheet->addChart($char);
        }

    }
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->setIncludeCharts(true);
    $writer->save($filename);
}
//function arrPrerender($arr, $pos=0,$arrColCalc){
//
//    $itogo = 0;
//    foreach ($arrColCalc as $col=>$fun) {
//        if (in_array('top', $fun)) {
//            foreach ($arr as $k => $val) {
//                if (isset($val[0]) && count($val[0]) >= 1) {
//                    $pos = $k;
//                } else {
//                    $arr[$pos]['top']['val'] += $val['top']['val'];
//                    $arr[$pos]['top']['pos'] = ($val['top']['pos']+2);
//                    $itogo += $val['top']['val'];
//                }
//            }
//        }
//        if (in_array('percent', $fun)) {
//            foreach ($arr as $k => $val) {
//                if (isset($val[0]) && count($val[0]) >= 1) {
//                    $pos = $k;
//                }
//                if (isset($val[1]) && count($val[1]) >= 1) {
//                    $arr[$k]['prc']['val'] = $val['top']['val'] / ($arr[$pos]['top']['val'] / 100);
//                    $arr[$k]['prc']['pos'] = ($val['top']['pos']+1);
//                }
//            }
//        }
//        if(in_array('itogo', $fun)){
//            $arr[count($arr)]['itogo']['val'] = $itogo;
//            $arr[count($arr)]['itogo']['pos'] = 3;
//        }
//    }
//    return $arr;
//}


function arrDiagGenerator($arr,$slice,$step){
//    echo "<pre>";print_r($arr);echo"</pre>";
    $arrRes = [];
$i = 0;
    $ii=0;
    foreach ($arr as $n=>$mas){
        if($mas[$slice]) {
            $i++;
            $arrRes[$i]['name'] = $mas[$slice];
            $ii=0;
        }
        if($mas['top'][0]['val'] != "") {
            $arrRes[$i]['arrVal'][$ii]['nam'] = $arr[$n-1][1];
            $arrRes[$i]['arrVal'][$ii]['val'] = $mas['top'][0]['val'];
            $ii++;
        }
    }
    return $arrRes;
}

/* ВЫБИРАЕМ НУЖНЫЙ ОТЧЁТ */
function getResByReport($arrVal, $arrParam, $info,$nam){
//    echo "<pre>";print_r($arrParam['schema']);echo"</pre>";die();
    $res = [];
    if($arrParam['schema']=='Report_9902_1'){
        report_9902_1($arrParam, $arrVal, $info,$nam);
    }elseif($arrParam['schema']=='Report_9902_2'){
        report_9902_2($arrParam, $arrVal, $info,$nam);
    }elseif($arrParam['schema']=='Report_9902_3'){
        report_9902_3($arrParam, $arrVal, $info,$nam);
    }elseif($arrParam['schema']=='Report_1095_1'){
        report_1095_1($arrParam, $arrVal, $info,$nam);
    }elseif($arrParam['schema']=='Report_1099_1'){
        report_1099_1($arrParam, $arrVal, $info,$nam);
    }elseif($arrParam['schema']=='Report_9902_4'){
        report_9902_4($arrParam, $arrVal, $info,$nam);
    }elseif($arrParam['schema']=='Report_9904_1'){
        report_9904_1($arrParam, $arrVal, $info,$nam);
    }elseif($arrParam['schema']=='Report_1106_1'){
        report_1106_1($arrParam, $arrVal, $info,$nam);
    }elseif($arrParam['schema']=='Report_1106_2'){
        report_1106_2($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema']=='Report_30048_1'){
        report_30048_1($arrParam, $arrVal, $info,$nam);
    }

    elseif ($arrParam['schema']=='Report_1294_1'){
        report_1294_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema']=='Report_1294_2'){
        report_1294_2($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema']=='Report_1144_1'){
        report_1144_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema']=='Report_1186_1'){
        report_1186_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema']=='Report_1101_1'){
        report_1101_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema']=='Report_1056_1'){
        report_1056_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema']=='Report_1056_2'){
        report_1056_2($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema']=='Report_1170_1'){
        report_1170_1($arrParam, $arrVal, $info,$nam);
    }

    elseif ($arrParam['schema'] == 'Report_1154_1'){
        report_1154_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema'] == 'Report_1067_1'){
        report_1067_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema'] == 'Report_1263_1'){
        report_1263_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema'] == 'Report_1293_1'){
        report_1293_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema'] == 'Report_1264_1'){
        report_1264_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema'] == 'Report_1019_1'){
        report_1019_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema'] == 'Report_1271_1'){
        report_1271_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema'] == 'Report_1277_1'){
        report_1277_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema'] == 'Report_1248_1'){
        report_1248_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema'] == 'Report_1178_1'){
        report_1178_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema'] == 'Report_1026_1'){
        report_1026_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema'] == 'Report_1301_1'){
        report_1301_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema'] == 'Report_1068_1'){
        report_1068_1($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema'] == 'Report_1056_3'){
        report_1056_3($arrParam, $arrVal, $info,$nam);
    }elseif ($arrParam['schema'] == 'Report_1097_1'){
        report_1097_1($arrParam, $arrVal, $info,$nam);
    }
    return $res;
}

function report_1271_1($arrParam, $arrVal,$info,$nam){
//    echo "<pre>";print_r($arrVal);echo"</pre>";die();//
    global $arrItogo;
    foreach ($arrVal as $key=>$item){
        $arrVal[$key]["КоличествоПредприятийШт"] = 1;
    }
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrValIndexShuffle,$arrParam['arrColumnCalc']);
//    echo "<pre>";print_r($BTrea);echo"</pre>";
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
//    echo "<pre>";print_r($arrPreRes);echo"</pre>";
    $arrTable = tableGenerator($arrPreRes, $arrParam);

//    echo "<pre>";print_r($arrTable);echo"</pre>";die();
    xlsxCreator($arrTable, $arrParam, $info, $nam, []);
}
function report_1097_1($arrParam, $arrVal,$info,$nam){
//    echo "<pre>";print_r($arrVal);echo"</pre>";die();//
    global $arrItogo;
//    foreach ($arrVal as $key=>$item){
//        $arrVal[$key]["КоличествоПредприятийШт"] = 1;
//    }
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrValIndexShuffle,$arrParam['arrColumnCalc']);
//    echo "<pre>";print_r($BTrea);echo"</pre>";
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
//    echo "<pre>";print_r($arrPreRes);echo"</pre>";
    $arrTable = tableGenerator($arrPreRes, $arrParam);

//    echo "<pre>";print_r($arrTable);echo"</pre>";die();
    xlsxCreator($arrTable, $arrParam, $info, $nam, []);
}

function report_1248_1($arrParam, $arrVal,$info,$nam){
//    echo "<pre>";print_r($arrVal);echo"</pre>";die();
    global $arrItogo;
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrValIndexShuffle,$arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
//    echo "<pre>";print_r($arrPreRes);echo"</pre>";
    $arrTable = tableGenerator($arrPreRes, $arrParam);

//    echo "<pre>";print_r($arrTable);echo"</pre>";
    xlsxCreator($arrTable, $arrParam, $info, $nam, []);
}
function report_1178_1($arrParam, $arrVal,$info,$nam){
//    echo "<pre>";print_r($arrVal);echo"</pre>";die();
    global $arrItogo;
//    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
//    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
//    echo "<pre>";print_r($arrValIndexShuffle);echo"</pre>";
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrVal,$arrParam['arrColumnCalc']);
//    echo "<pre>";print_r($BTrea);echo"</pre>";
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
//    echo "<pre>";print_r($arrPreRes);echo"</pre>";
    $arrTable = tableGenerator($arrPreRes, $arrParam);

//    echo "<pre>";print_r($arrTable);echo"</pre>";
    xlsxCreator($arrTable, $arrParam, $info, $nam, []);
}
function report_1026_1($arrParam, $arrVal,$info,$nam){
//    echo "<pre>";print_r($arrVal);echo"</pre>";die();
//    global $arrItogo;
//    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
//    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrVal,$arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrCharsDate = arrDiagGenerator($arrPreRes,0,'pos');
//    echo "<pre>";print_r($arrCharsDate);echo"</pre>";die();

//    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
//    echo "<pre>";print_r($arrPreRes);echo"</pre>";
    $arrTable = [];

//    echo "<pre>";print_r($arrTable);echo"</pre>";
    xlsxCreator($arrTable, $arrParam, $info, $nam, $arrCharsDate);
}
function report_1277_1($arrParam, $arrVal,$info,$nam){
//    echo "<pre>";print_r($arrVal);echo"</pre>";die();
    global $arrItogo;
//    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
//    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrVal,$arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
//    echo "<pre>";print_r($arrPreRes);echo"</pre>";
    $arrTable = tableGenerator($arrPreRes, $arrParam);

//    echo "<pre>";print_r($arrTable);echo"</pre>";
    xlsxCreator($arrTable, $arrParam, $info, $nam, []);
}

function report_1068_1($arrParam, $arrVal,$info,$nam){
//    echo "<pre>";print_r($arrVal);echo"</pre>";die();
    global $arrItogo;
    $arrPre = [];
    foreach ($arrVal as $value){
        $year = '';
        $month = '';
        if ($value['ДатаЗакрытия'] == '0001-01-01T00:00:00'){
            $value['ДатаЗакрытия'] = "";
        }

        if (strstr($value['СрокФункционирования'], '.')){
            $str = explode('.',$value['СрокФункционирования']);
            if ($str[0] != '0'){
                $year = $str[0].' г.';
            }
            $month = $str[1].' мес.';
            $value['СрокФункционирования'] = $year . " " . $month;
        }else{
            if ($value['СрокФункционирования'] == "0"){
                $value['СрокФункционирования'] = $value['СрокФункционирования'].' мес.';
            }else{
                $value['СрокФункционирования'] = $value['СрокФункционирования'].' г.';
            }
        }


        $arrPre[] = $value;
    }
    $arrValExcept = exceptApply($arrPre,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrValIndexShuffle,$arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
//    echo "<pre>";print_r($arrPreRes);echo"</pre>";
    $arrTable = tableGenerator($arrPreRes, $arrParam);

//    echo "<pre>";print_r($arrTable);echo"</pre>";
    xlsxCreator($arrTable, $arrParam, $info, $nam, []);
}

function report_1019_1($arrParam, $arrVal,$info,$nam){
    $arrPreRes = [];
    foreach ($arrVal as $k => $value){
        foreach ($value as $kk => $item){
            if (in_array($kk, array_keys($arrParam['arrColumnCalc']))){
                $arrPreRes[$k][$kk] = $value[$kk];
            }
        }
    }
    xlsxCreator($arrPreRes, $arrParam, $info, $nam, []);
}
function report_1264_1($arrParam, $arrVal,$info,$nam){
    global $arrItogo;
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrValIndexShuffle,$arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
    $arrTable = tableGenerator($arrPreRes, $arrParam);
    xlsxCreator($arrTable, $arrParam, $info, $nam, []);
}
function report_1293_1($arrParam, $arrVal,$info,$nam){
    global $arrItogo;
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrValIndexShuffle,$arrParam['arrColumnCalc']);
//    echo "<pre>"; print_r($BTrea); echo "</pre>";
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
//    echo "<pre>";print_r($arrPreRes);echo"</pre>";
    $arrTable = tableGenerator($arrPreRes, $arrParam);
    xlsxCreator($arrTable, $arrParam, $info, $nam, []);
}
function report_1263_1($arrParam, $arrVal,$info,$nam){
    global $arrItogo;
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrValIndexShuffle,$arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
    $arrTable = tableGenerator($arrPreRes, $arrParam);;
    xlsxCreator($arrTable, $arrParam, $info, $nam, []);
}

function report_1067_1($arrParam, $arrVal,$info,$nam){

    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrValIndexShuffle,$arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrTable = tableGenerator($arrPreRes, $arrParam);
    xlsxCreator($arrTable, $arrParam, $info, $nam, []);
}
function report_1154_1($arrParam, $arrVal,$info,$nam){
    $arrVal = array_slice($arrVal,0,20);
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrValIndexShuffle,$arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrTable = tableGenerator($arrPreRes, $arrParam);
    xlsxCreator($arrTable, $arrParam, $info, $nam, []);
}
function report_1170_1($arrParam, $arrVal,$info,$nam){

    $arrPre = [];
    foreach ($arrVal as $val){
        $val['Округ'] = tinao($val['Округ']);
        $arrPre[] = $val;
    }
    $arrValExcept = exceptApply($arrPre,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'], $arrValIndexShuffle, $arrParam['arrColumnCalc']);

    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
//    echo "<pre>"; print_r($arrPreRes); echo "</pre>";
    die();

}
function report_1294_2($arrParam, $arrVal,$info,$nam){
    $arrPre = $arrVal;
    echo "<pre>"; print_r(array_slice($arrPre,0,20)); echo "</pre>";die();
//    foreach ($arrVal as $val){
//        $val['ОкругНаименованиеПолное'] = tinao($val['ОкругНаименованиеПолное'],1);
//        $arrPre[] = $val;
//    }
    $arrValExcept = exceptApply($arrPre,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
//    echo "<pre>"; print_r(array_slice($arrValIndexShuffle,0,20)); echo "</pre>";die();
//    $BTrea = bTreeGenerator($arrParam['arrColumnSort'], $arrValIndexShuffle, $arrParam['arrColumnCalc']);
//    echo "<pre>"; print_r($BTrea); echo "</pre>";
//    die();
    $arrTable = [];

    $type = "";
    $i = 0;
    foreach ($arrValIndexShuffle as $k => $val){
        if($type == '' || $k == 0 || $type != $val['ВидТорговли']){
            $arrTable[$i][0] = $val['ВидТорговли'];
            $type = $val['ВидТорговли'];
            $i++;
        }
        foreach ($arrParam['arrColumnVive'] as $kk=>$col){
            $arrTable[$i][] = $val[$kk];
        }
        $i++;
    }
//    echo "<pre>"; print_r($arrTable); echo "</pre>";
//    die();
    xlsxCreator($arrTable, $arrParam, $info, $nam,[]);

}
function report_1056_3($arrParam, $arrVal, $info,$nam){
//    echo "<pre>";print_r($arrVal);echo"</pre>";die();
    global $arrItogo;
    $arrPre = [];
    foreach ($arrVal as $val){
        $val['Округ'] = tinao($val['Округ']);
        $arrPre[] = $val;
    }
    $arrValExcept = exceptApply($arrPre, $arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept, $arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'], $arrValIndexShuffle, $arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0, count($arrParam['arrColumnSort']), $arrParam);
    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
    $arrTable = tableGenerator($arrPreRes, $arrParam);
    xlsxCreator($arrTable, $arrParam, $info,$nam,[]);

}
function report_1056_2($arrParam, $arrVal, $info,$nam){
    $arrPre = [];
    foreach ($arrVal as $val){
        $val['Округ'] = tinao($val['Округ']);
        $arrPre[] = $val;
    }
    $arrValExcept = exceptApply($arrPre, $arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept, $arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'], $arrValIndexShuffle, $arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);

    $arrTable = tableGenerator($arrPreRes, $arrParam);
    xlsxCreator($arrTable, $arrParam, $info,$nam,[]);

}
function report_1056_1($arrParam, $arrVal, $info,$nam){
    global $arrItogo;
    $arrPre = [];
    foreach ($arrVal as $val){
        $val['Округ'] = tinao($val['Округ']);
        $arrPre[] = $val;
    }
    $arrValExcept = exceptApply($arrPre, $arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept, $arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'], $arrValIndexShuffle, $arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0, count($arrParam['arrColumnSort']), $arrParam);
    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
    $arrTable = tableGenerator($arrPreRes, $arrParam);
    xlsxCreator($arrTable, $arrParam, $info,$nam,[]);

}
function report_1101_1($arrParam, $arrVal,$info,$nam){

    $arrValExcept = exceptApply($arrVal, $arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept, $arrParam['arrColumnSort']);

    $arrTable=[];
    $type = "";
    $isum = 0;
    $arrIsum = [];
    $i = 0;
    $itogo = 0;
    foreach ($arrValIndexShuffle as $k => $val){
        if($type == '' || $k == 0 || $type != $val['Предприятие']){
            $arrTable[$i][0] = $val['Предприятие'];
            $type = $val['Предприятие'];
            $isum = $i;
            $arrIsum[]=$isum;
            $ii=1;
            while ($ii<=9){
                $arrTable[$isum][$ii]='';
                $ii++;
            }
            $arrTable[$isum][10] = 0;
            $i++;
        }
        $arrTable[$i][0]="";
        $arrTable[$isum][10] += $val['Количество'];
        foreach ($arrParam['arrColumnCalc'] as $k => $col){
            $arrTable[$i][] = $val[$k];
        }
        $i++;
    }
    foreach ($arrIsum as $val){
        $itogo += $arrTable[$val][10];
    }
    $arrTable[count($arrTable)-1]=['','ИТОГО','','','','','','','','',$itogo];
    xlsxCreator($arrTable, $arrParam, $info,$nam,[]);
}
function report_1186_1($arrParam, $arrVal,$info,$nam){
//    echo "<pre>";print_r($arrVal);echo"</pre>";
    $arrPre = [];
    foreach ($arrVal as $val){
        $val['Округ'] = tinao($val['Округ']);
        $arrPre[] = $val;
    }
    $arrValExcept = exceptApply($arrPre, $arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept, $arrParam['arrColumnSort']);
//    $arrParam['arrColumnCalc'] = array_merge($arrParam['arrColumnCalc'], $arrParam['arrColumnVive']);

    $BTrea = bTreeGenerator($arrParam['arrColumnSort'], $arrValIndexShuffle, $arrParam['arrColumnCalc']);
//    echo "<pre>"; print_r($BTrea); echo "</pre>";die();
    $arrPreRes = recursivValueEdit($BTrea,0, count($arrParam['arrColumnSort']), $arrParam);
//    echo "<pre>"; print_r($arrPreRes); echo "</pre>";die();
    $arrTable = tableGenerator($arrPreRes, $arrParam);


//    echo "<pre>";print_r($arrTable);echo"</pre>";die();
    xlsxCreator($arrTable, $arrParam, $info,$nam,[]);
}

function report_1301_1($arrParam, $arrVal,$info,$nam){
//    echo "<pre>";print_r($arrVal);echo"</pre>";die();
    global $arrItogo;
    $arrPre = [];
    foreach ($arrVal as $val){
        $val['Округ'] = tinao($val['Округ']);
        $arrPre[] = $val;
    }
    $arrValExcept = exceptApply($arrPre, $arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept, $arrParam['arrColumnSort']);
//    $arrParam['arrColumnCalc'] = array_merge($arrParam['arrColumnCalc'], $arrParam['arrColumnVive']);

    $BTrea = bTreeGenerator($arrParam['arrColumnSort'], $arrValIndexShuffle, $arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0, count($arrParam['arrColumnSort']), $arrParam);
    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
//    echo "<pre>"; print_r($arrPreRes); echo "</pre>";
    $arrTable = tableGenerator($arrPreRes, $arrParam);
    xlsxCreator($arrTable, $arrParam, $info,$nam,[]);
}




//function report_1144_1($arrParam, $arrVal,$info,$nam){
///* ЖДЁТ 1С */
//    return;
//}
function report_1294_1($arrParam, $arrVal,$info,$nam){

    $arrLiner = ['Объекты розничной торговли','Объекты общественного питания','Объекты бытового обслуживания','Объекты оптовой торговли и складской инфрастурктуры'];
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
//    echo "<pre>"; print_r($arrValIndexShuffle); echo "</pre>";
//    die();
    $arrTable = [];

    $type = "";
    $i = 0;
    foreach ($arrValIndexShuffle as $k => $val){
        if($type == '' || $k == 0 || $type != $val['ВидТорговли']){
            $arrTable[$i][0] = $val['ВидТорговли'];
            $type = $val['ВидТорговли'];
            $i++;
        }
        $arrTable[$i][0]="";
        foreach ($arrParam['arrColumnCalc'] as $kk => $col){
            $arrTable[$i][] = $val[$kk];
        }
        $i++;
    }
    $resArrTable = [];
    $flag = false;
    $i = 0;
    $row = 0;
    foreach ($arrLiner as $nam1) {
        $s=0;
        foreach ($arrTable as $k => $v) {
            if($v[0] == $nam1 && strlen($v[0]) > 3){
                $flag = true;
                $resArrTable[$i][0]=$nam1;
                $row = $i;
                $i++;
                continue;
            }elseif($v[0] != $nam1 && strlen($v[0]) > 3){
                $flag = false;
            }
            if($flag){
                $resArrTable[] = $v;
                $i++;
                $s++;
            }
        }
        $resArrTable[$row][1] = $s;
    }
//    echo "<pre>"; print_r($resArrTable); echo "</pre>";
//    die();
    xlsxCreator($resArrTable, $arrParam, $info, $nam,[]);
}

function report_1106_2($arrParam, $arrVal,$info,$nam){
    $arrPre = [];
    foreach ($arrVal as $n=>$arr){
        foreach ($arr as $k=>$val) {
            $arrPre[$n][$k] = $val;
            if($k == 'Период'){
                $arrPre[$n][$k] = mToN($val);
            }
        }
    }
    $arrValExcept = exceptApply($arrPre, $arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept, $arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'], $arrValIndexShuffle, $arrParam['arrColumnCalc']);
//    echo "<pre>"; print_r($BTrea); echo "</pre>";
//    die();
    $arrPreRes = recursivValueEdit($BTrea,0, count($arrParam['arrColumnSort']), $arrParam);
    $arrTable = tableGenerator($arrPreRes, $arrParam);
    xlsxCreator($arrTable, $arrParam, $info,$nam,[]);
}
function report_1106_1($arrParam, $arrVal,$info,$nam){
    $arrPre = [];
    foreach ($arrVal as $n=>$arr){
        foreach ($arr as $k=>$val) {
           $arrPre[$n][$k] = $val;
           if($k == 'Период'){
               $arrPre[$n][$k] = mToN($val);
           }
        }
    }
    $arrValExcept = exceptApply($arrPre, $arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept, $arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'], $arrValIndexShuffle, $arrParam['arrColumnCalc']);
//    echo "<pre>"; print_r($BTrea); echo "</pre>";
//    die();
    $arrPreRes = recursivValueEdit($BTrea,0, count($arrParam['arrColumnSort']), $arrParam);
    $arrTable = tableGenerator($arrPreRes, $arrParam);
    xlsxCreator($arrTable, $arrParam, $info,$nam,[]);
}
function report_9904_1($arrParam, $arrVal,$info,$nam){
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'], $arrValIndexShuffle, $arrParam['arrColumnCalc']);
    $arrTable = [];
    $i = 0;
    foreach ($BTrea as $good => $date){
        $arrTable[$i][0]=$good;
        foreach ($date as $n => $val) {
            if(is_array($val)) {
                foreach ($val as $vVal) {
                    $arrTable[$i][] = $vVal['Количество'];
                }
            }
        }
        if(!isset($arrTable[$i][1])){
            $arrTable[$i][1] = "0";
        }
        if(!isset($arrTable[$i][2])){
            $arrTable[$i][2] = "0";
        }
        if(!isset($arrTable[$i][3])){
            $arrTable[$i][3] = "0";
        }
        $arrTable[$i][4] = ($arrTable[$i][1]+$arrTable[$i][2]);
        $i++;
    };
//    echo "<pre>"; print_r($arrTable); echo "</pre>";
//    die();
    xlsxCreator($arrTable, $arrParam, $info,$nam,$arrTable);
//    echo "<pre>"; print_r($arrTable); echo "</pre>";
}
function report_9902_2($arrParam, $arrVal,$info,$nam){
//    echo "<pre>"; print_r(array_slice($arrVal,0,20)); echo "</pre>";
//    die();
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'], $arrValIndexShuffle, $arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrCharsDate = arrDiagGenerator($arrPreRes,0,'pos');
    $pos = 0;
    $itogo = 0;
    foreach ($arrParam['arrColumnCalc'] as $col=>$fun) {
        if (in_array('top', $fun)) {
            foreach ($arrPreRes as $k => $val) {
                if (isset($val[0]) && count($val[0]) >= 1) {
                    $pos = $k;
                } else {
                    $arrPreRes[$pos]['top']['val'] += $val['top']['val'];
                    $arrPreRes[$pos]['top']['pos'] = ($val['top']['pos']+2);
                    $itogo += $val['top']['val'];
                }
            }
        }
        if (in_array('percent', $fun)) {
            foreach ($arrPreRes as $k => $val) {
                if (isset($val[0]) && count($val[0]) >= 1) {
                    $pos = $k;
                }
                if (isset($val[1]) && count($val[1]) >= 1) {
                    $arrPreRes[$k]['prc']['val'] = $val['top']['val'] / ($arrPreRes[$pos]['top']['val'] / 100);
                    $arrPreRes[$k]['prc']['pos'] = ($val['top']['pos']+1);
                }
            }
        }
        if(in_array('itogo', $fun)){
            $arrPreRes[count($arrPreRes)]['itogo']['val'] = $itogo;
            $arrPreRes[count($arrPreRes)]['itogo']['pos'] = 3;
        }
    }

    $arrTable = tableGenerator($arrPreRes, $arrParam);
//    echo "<pre>"; print_r($arrTable); echo "</pre>";
    xlsxCreator($arrTable, $arrParam, $info,$nam,$arrCharsDate);
}

function report_1099_1($arrParam, $arrVal,$info,$nam){

}

function report_1095_1($arrParam, $arrVal,$info,$nam){
//echo "<pre>";print_r($arrVal);echo"</pre>";
    global $arrItogo;
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrValIndexShuffle,$arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
//echo "<pre>"; print_r($arrPreRes); echo "</pre>";die();
    $arrCharsDate = arrDiagGenerator($arrPreRes,0,'pos');
    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
    $pos = 0;
    $itogo = 0;
//    echo "<pre>";print_r($arrCharsDate);echo"</pre>";die();
    foreach ($arrParam['arrColumnCalc'] as $col=>$fun) {


        if (in_array('top', $fun)) {
            foreach ($arrPreRes as $k => $val) {
                if (isset($val[0]) && count($val[0]) >= 1) {
                    $pos = $k;
                } else {
                    $arrPreRes[$pos]['top'][0]['val'] += $val['top'][0]['val'];
//                    $arrPreRes[$pos]['top'][0]['pos'] = ($val['top'][0]['pos']+3);
//                    $itogo += $val['top'][0]['val'];
                }
            }
        }




        if (in_array('percent', $fun)) {
            foreach ($arrPreRes as $k => $val) {
                if (isset($val[0]) && count($val[0]) >= 1) {
                    $pos = $k;
                }
                if (isset($val[2]) && count($val[2]) >= 1) {
//                    echo "<pre>";print_r($val);echo"</pre>";
//                    echo "<pre>";print_r($arrPreRes[$pos]);echo"</pre>";
//                    echo "<pre>";print_r("_____________");echo"</pre>";

                    $arrPreRes[$k]['prc'][0]['val'] = $val['top'][0]['val'] / ($arrPreRes[$pos]['top'][0]['val'] / 100);
                    $arrPreRes[$k]['prc'][0]['pos'] = ($val['top'][0]['pos']+1);
                }
            }
        }



//        if (in_array('percent', $fun)) {
//            foreach ($arrPreRes as $k => $val) {
////                if (isset($val[0]) && count($val[0]) >= 1) {
//////                    echo "<pre>";print_r($val);echo"</pre>";die();
////                    $pos = $k;
////                }
//                if (isset($val[2]) && count($val[2]) >= 1) {
////                    echo "<pre>";print_r($pos);echo"</pre>";
//                    $arrPreRes[$k]['prc'][$pos]['val'] = $val['top'][0]['val'] / ($arrPreRes[array_key_last($arrPreRes)]['itogo'][0]['val'] / 100);
//                    $arrPreRes[$k]['prc'][$pos]['pos'] = ($val['top'][0]['pos']+1);
//                }
//            }
//        }



//        if(in_array('itogo', $fun)){
//            $arrPreRes[count($arrPreRes)-1]['itogo'][0]['val'] = $itogo;
//            $arrPreRes[count($arrPreRes)-1]['itogo'][0]['pos'] = 4;
//        }



    }
//    echo "<pre>";print_r($arrPreRes);echo"</pre>";die();
    $arrTable = tableGenerator($arrPreRes, $arrParam);
//    echo "<pre>";print_r($arrTable);echo"</pre>";die();

    xlsxCreator($arrTable, $arrParam, $info,$nam,$arrCharsDate);
}
function report_9902_3($arrParam, $arrVal,$info,$nam){
//    echo "<pre>"; print_r(array_slice($arrVal,0,20)); echo "</pre>";
    global $arrItogo;
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrValIndexShuffle,$arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrCharsDate = arrDiagGenerator($arrPreRes,0,'pos');
    $arrPreRes[count($arrPreRes)]['itogo'] = $arrItogo;
    $pos = 0;
    $itogo = 0;
//    echo "<pre>";print_r($arrPreRes);echo"</pre>";die();
    foreach ($arrParam['arrColumnCalc'] as $col=>$fun) {
        if (in_array('top', $fun)) {
            foreach ($arrPreRes as $k => $val) {
                if (isset($val[0]) && count($val[0]) >= 1) {
                    $pos = $k;
                } else {
                    $arrPreRes[$pos]['top'][0]['val'] += $val['top'][0]['val'];
//                    $arrPreRes[$pos]['top'][0]['pos'] = ($val['top'][0]['pos']+2);
//                    $itogo += $val['top'][0]['val'];
                }
            }
        }
        if (in_array('percent', $fun)) {
            foreach ($arrPreRes as $k => $val) {
                if (isset($val[0]) && count($val[0]) >= 1) {
                    $pos = $k;
                }
                if (isset($val[1]) && count($val[1]) >= 1) {
//                    echo "<pre>";print_r($val);echo"</pre>";
//                    echo "<pre>";print_r($arrPreRes[$pos]);echo"</pre>";
//                    echo "<pre>";print_r("_____________");echo"</pre>";

                    $arrPreRes[$k]['prc'][0]['val'] = $val['top'][0]['val'] / ($arrPreRes[$pos]['top'][0]['val'] / 100);
                    $arrPreRes[$k]['prc'][0]['pos'] = ($val['top'][0]['pos']+1);
                }
            }
        }
//        if(in_array('itogo', $fun)){
//            $arrPreRes[count($arrPreRes)]['itogo'][0]['val'] = $itogo;
//            $arrPreRes[count($arrPreRes)]['itogo'][0]['pos'] = 3;
//        }
    }
//    echo "<pre>"; print_r($arrPreRes); echo "</pre>";die();
    $arrTable = tableGenerator($arrPreRes, $arrParam);
//    echo "<pre>"; print_r($arrTable); echo "</pre>";die();
    xlsxCreator($arrTable, $arrParam, $info,$nam,$arrCharsDate);
}function Report_9902_4($arrParam, $arrVal,$info,$nam){
//    echo "<pre>"; print_r(array_slice($arrVal,0,20)); echo "</pre>";
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrValIndexShuffle,$arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrCharsDate = arrDiagGenerator($arrPreRes,0,'pos');
    $pos = 0;
    $itogo = 0;
    foreach ($arrParam['arrColumnCalc'] as $col=>$fun) {
        if (in_array('top', $fun)) {
            foreach ($arrPreRes as $k => $val) {
                if (isset($val[0]) && count($val[0]) >= 1) {
                    $pos = $k;
                } else {
                    $arrPreRes[$pos]['top']['val'] += $val['top']['val'];
                    $arrPreRes[$pos]['top']['pos'] = ($val['top']['pos']+2);
                    $itogo += $val['top']['val'];
                }
            }
        }
        if (in_array('percent', $fun)) {
            foreach ($arrPreRes as $k => $val) {
                if (isset($val[0]) && count($val[0]) >= 1) {
                    $pos = $k;
                }
                if (isset($val[1]) && count($val[1]) >= 1) {
                    $arrPreRes[$k]['prc']['val'] = $val['top']['val'] / ($arrPreRes[$pos]['top']['val'] / 100);
                    $arrPreRes[$k]['prc']['pos'] = ($val['top']['pos']+1);
                }
            }
        }
        if(in_array('itogo', $fun)){
            $arrPreRes[count($arrPreRes)]['itogo']['val'] = $itogo;
            $arrPreRes[count($arrPreRes)]['itogo']['pos'] = 3;
        }
    }

    $arrTable = tableGenerator($arrPreRes, $arrParam);
//    echo "<pre>"; print_r($arrTable); echo "</pre>";
    xlsxCreator($arrTable, $arrParam, $info,$nam,$arrCharsDate);
}
function report_9902_1($arrParam, $arrVal,$info,$nam){
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrValIndexShuffle,$arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);

    $arrCharsDate = arrDiagGenerator($arrPreRes,0,'pos');

    /* НУЖНО ДЛЯ ДОСЧЁТА */
    $pos = 0;
    $itogo = 0;
    foreach ($arrParam['arrColumnCalc'] as $col=>$fun) {
        if (in_array('top', $fun)) {
            foreach ($arrPreRes as $k => $val) {
                if (isset($val[0]) && count($val[0]) >= 1) {
                    $pos = $k;
                } else {
                    $arrPreRes[$pos]['top']['val'] += $val['top']['val'];
                    $arrPreRes[$pos]['top']['pos'] = ($val['top']['pos']+2);
                    $itogo += $val['top']['val'];
                }
            }
        }
        if (in_array('percent', $fun)) {
            foreach ($arrPreRes as $k => $val) {
                if (isset($val[0]) && count($val[0]) >= 1) {
                    $pos = $k;
                }
                if (isset($val[1]) && count($val[1]) >= 1) {
                    $arrPreRes[$k]['prc']['val'] = $val['top']['val'] / ($arrPreRes[$pos]['top']['val'] / 100);
                    $arrPreRes[$k]['prc']['pos'] = ($val['top']['pos']+1);
                }
            }
        }
        if(in_array('itogo', $fun)){
            $arrPreRes[count($arrPreRes)]['itogo']['val'] = $itogo;
            $arrPreRes[count($arrPreRes)]['itogo']['pos'] = 3;
        }
    }

    $arrTable = tableGenerator($arrPreRes, $arrParam);
    xlsxCreator($arrTable, $arrParam, $info, $nam, $arrCharsDate);
//    xlsxCreator($arrTable, $arrParam, $info, $nam,[]);
}
function report_30048_1($arrParam, $arrVal,$info,$nam){
    $arrValExcept = exceptApply($arrVal,$arrParam['rula']);
    $arrValIndexShuffle = indexShuffle($arrValExcept,$arrParam['arrColumnSort']);
    $BTrea = bTreeGenerator($arrParam['arrColumnSort'],$arrValIndexShuffle,$arrParam['arrColumnCalc']);
    $arrPreRes = recursivValueEdit($BTrea,0,count($arrParam['arrColumnSort']),$arrParam);
    $arrTable = tableGenerator($arrPreRes, $arrParam);
    xlsxCreator($arrTable, $arrParam, $info,$nam,[]);
//    echo "<pre>"; print_r($arrTable); echo "</pre>";
};