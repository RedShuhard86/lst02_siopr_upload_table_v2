<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

/**
 * @throws \PhpOffice\PhpSpreadsheet\Exception
 * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
 */
function reportVUEXLSXGenerator($arr): string
{
    $filename = $_SERVER["DOCUMENT_ROOT"].'/xlsxgenerator/upload_reports/new_'.date("Y-m-d").'.xlsx';
    $titleRowLastIndex = $arr['params']['titleRowLastIndex'];
    $offsets = $arr['params']['offset'];
    $values = $arr['params']['values'];
    $headersRowsNumbersArr = $arr['params']['headersRowsNumbersArr'];
    $mergeCellOptionsArr = $arr['params']['mergeCellOptionsArr'];

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getSheet(0);
    $sheet->fromArray($values, NULL, 'A1');

    $cellValues = [
        0 => 'A',
        1 => 'B',
        2 => 'C',
        3 => 'D',
        4 => 'E',
        5 => 'F',
        6 => 'G',
        7 => 'H',
        8 => 'I',
        9 => 'J',
        10 => 'K',
        11 => 'L',
        12 => 'M',
        13 => 'N',
        14 => 'O',
        15 => 'P',
        16 => 'Q',
        17 => 'R',
        18 => 'S',
        19 => 'T',
        20 => 'U',
        21 => 'V',
        22 => 'W',
        23 => 'X',
        24 => 'Y',
        25 => 'Z'
    ];

    // 26: 'AA', 27: 'AB', etc... when AA ends then
    // 'BA', 'BB'
    // когда будет кросс-таблица - чтобы вручную две строчки выше не прописывать, понадобиться написать функцию
    // которая сама будет генерить номер ключа и его значение - функцию предполагается писать на фронте -
    // и уже оттуда передавать это значение - сюда

    // функция для покраски ячеек
    function setBackgroundColor(string $backgroundColor): array
    {
        return [
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => $backgroundColor]
            ],
        ];
    }

    foreach ($cellValues as $k => $val){
        $sheet->getColumnDimension($val)->setAutoSize(true);
    }

    $styleBorder = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['rgb' => '000000'],
            ],
        ],
    ];
    $titleRowStyle = [
        'font' => [
            'bold' => false,
            'color' => ['rgb' => '000000'],
            'size' => 15,
            'name' => 'Arial'
        ]
    ];
    // fill ниже - сделано чтобы хоть как-то стили отличались от остальных рядов
    $headerCellStyle = [
        'fill' => [
            'fillType' => Fill::FILL_SOLID,
            'startColor' => ['rgb' => 'ffffff']
        ],

        'borders' => $styleBorder['borders'],

        'alignment' => [
            'vertical' => Alignment::VERTICAL_CENTER,
            'horizontal' => Alignment::HORIZONTAL_CENTER,
        ],
    ];

    $sheet->getCell('B1')->getStyle('A1')->applyFromArray($titleRowStyle);
//    $sheet->getRowDimension('1')->setRowHeight(140);

    // делаем merge cells для первой строки - названия отчета
    $lastCellOfTitleMerge = $cellValues[$titleRowLastIndex - 1]."1";
    // $cellValues[$titleRowLastIndex] - получаем крайнюю букву ряда в экселе
    // если вдруг $titleRowLastIndex больше чем - count($cellValues) - надо будет учесть это и поменять $lastCellOfTitleMerge

// ******************
    $rangeTitle = "B1:".$lastCellOfTitleMerge;
    $sheet->mergeCells($rangeTitle, 'hide');
// ******************

    // делаем merge заголовков из переменной с фронта
    foreach ($mergeCellOptionsArr as $k=>$val){
        $sheet->mergeCells($val, 'hide');
    }

    // задаем всей sheet рамку из переменной styleBorder
    $startIndex = end($headersRowsNumbersArr) + 2; // находим номер левого края страницы
    $lastRowIndex = count($offsets); // высчитываем по длине offsets крайний номер строки в excel таблице
    $lastRowOfSheet = $cellValues[$titleRowLastIndex].$lastRowIndex; // клетка_2
    $rangeBorder = "A".$startIndex.":".$lastRowOfSheet; // range берется по диагонали от первой "клетка_1" до "клетка_2" (клетка_1:клетка_2)
    $sheet->getStyle($rangeBorder)->applyFromArray($styleBorder);

    $imgReportTitleOnePath = $_SERVER["DOCUMENT_ROOT"].'/xlsxgenerator/upload_reports/testImg.png';

//    $drawing = new Drawing();
//    $drawing->setPath($imgReportTitleOnePath); // put your path and image here
//    $drawing->setCoordinates('A1');
//    $drawing->setWorksheet($spreadsheet->getActiveSheet());
//    $drawing->setWidth(120, 'pt');
//    $drawing->setAutoSize(true);
//    $drawing->setHeight(400);

//    $drawingOne = new Drawing();
//    $drawingOne->setPath($imgReportTitleOnePath); // put your path and image here
//    $drawingOne->setCoordinates('K1');
//    $drawingOne->setWorksheet($spreadsheet->getActiveSheet());
//    $drawingOne->setWidth(120, 'pt');
//    $drawingOne->setAutoSize(true);
//    $drawingOne->setHeight(400);



    foreach ($offsets as $k=>$val){
        foreach ($val['bgColorValues'] as $cellKey=>$backgroundColorValue){
            if (in_array($k, $headersRowsNumbersArr)) $cellStyle = $headerCellStyle;
            else $cellStyle = setBackgroundColor($backgroundColorValue);

            $sheet->getCell($cellKey)->getStyle($cellKey)->applyFromArray($cellStyle);
        }

        $sheet->getRowDimension($k + 1)->setOutlineLevel($val['offset'])->setVisible(true)->setCollapsed(true);
    }

    // redirect output to client browser
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');

    //echo $filename;
    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);
    return "http://".$_SERVER['SERVER_NAME']."/xlsxgenerator/upload_reports/new_".date("Y-m-d").".xlsx";
}