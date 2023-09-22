<?die();
    require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/add_infoblock/mssql_connect.php';
    ini_set('memory_limit', '-1');
//    header("Content-Type: text/html; charset=UTF-8");
    set_time_limit(6000);
define("IBLOCK_TYPE_ID" , "SIOPR");
define("SITE_ID" , "s1");
$chr = [ "xx_", "yuk_", "khs_", "dt_", "_", "ks_", "pb_", "akh_" ];
CModule::IncludeModule("iblock");
$ibp = new CIBlockProperty;
$obUserType = new CUserTypeEntity();


$ver = "2";
$arrTables = [];
$csvTables = array_map('str_getcsv', file('tables_'.$ver.'.csv'));
$csvReals = array_map('str_getcsv', file('reals_'.$ver.'.csv'));
// Заполняем имена таблиц
foreach ($csvTables as $k => $tab){
    if(!in_array($tab[0],$arrTables)){
        array_push($arrTables,$tab[0]);
    }
}
//echo "<pre>"; print_r($arrTables); echo "</pre>";
$arrReals = [];

foreach ($arrTables as $k => $table){
    /* СОЗДАНИЕ ИНФОБЛОКА */
//    $table = "xx_FizicheskieLitsa";
    $ID = createCIBlock($table, $k);
    echo "Инфоблок ".$table."<br>";
    echo "Память ".convert(memory_get_usage(true))."<br>";
    foreach ($csvTables as $var){
        if($var[0] == $table) {
            echo "Свойство ".$var[1].", тип: ".$var[2]."<br>";
            echo "Память ".convert(memory_get_usage(true))."<br>";
            if(!strpos($var[1],"_RRREF")) {
                /* СОЗДАНИЕ СВОЙСТВ ИНФОБЛОКА */
                typeSelector($var[2], $ID, $ibp, $obUserType, $var[1]);
                echo "Память ".convert(memory_get_usage(true))."<br>";
            }
        }
    }
    //addElementAndValueToProp($ID,$table);
    echo "Память ".convert(memory_get_usage(true))."<br>";
    echo"<br><br>";
}

function createCIBlock($nam, $codeNum)
{
    global $chr;
    /* подключение */
    /* набор символов для удаления в присланных файлах*/

    $ib = new CIBlock;

    /* УДАЛЕНИЕ ненужных символов в строке */
    $NAME = dellSamChar($nam, $chr);
    $arFields = Array(
        "ACTIVE" => "Y",
        "NAME" => $NAME,
        "CODE" => "COD_".$nam,
        "LIST_PAGE_URL" => "#SITE_DIR#/".$NAME."/list.php?SECTION_ID=#SECTION_ID#",
        "DETAIL_PAGE_URL" => "#SITE_DIR#/".$NAME."/detail.php?SECTION_ID=#SECTION_ID#",
        "IBLOCK_TYPE_ID" => IBLOCK_TYPE_ID,
        "SITE_ID" => SITE_ID,
        "SORT" => 500,
        "PICTURE" => "",
        "DESCRIPTION" => "",
        "DESCRIPTION_TYPE" => "",
        "GROUP_ID" => Array("2"=>"R")
    );
    $ID = $ib->Add($arFields);
    if ($ID > 0)
        $res = $ib->Update($ID, $arFields);
    else
    {
        $ID = $ib->Add($arFields);
    }
    echo $ib->LAST_ERROR."<br>";
    return $ID;
}
?>