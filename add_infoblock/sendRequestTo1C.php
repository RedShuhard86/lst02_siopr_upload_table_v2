<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");




$update = '
    {
"Проведен": "1",
"Ссылка": {
"УИД": "0d24c0c2-4e3e-11e9-841d-005056805372",
"Вид": "Документы.пб_РеализацияТоваров"
},
"ПометкаУдаления": "0",
"Дата": "20190323000000",
"Номер": "РТ-75-0007191",
"Предприятие": "640fadec-f345-11e8-ad89-005056805372",
"КаналПоставки": "ПродукцияАрендаторов",
"ТипПоставки": "ПродукцияАрендаторов",
"КаналРеализации": "ОптоваяТорговля",
"Сумма": "459000",
"Автор": "8d872764-1810-11e9-ad89-005056805372",
"Страна": "4e127564-d74f-4dd9-bced-0327f0f4e061",
"ФедеральныйОкруг": "00000000-0000-0000-0000-000000000000",
"Регион": "a6b8c647-f345-11e8-ad89-005056805372",
"Округ": "00000000-0000-0000-0000-000000000000",
"Район": "00000000-0000-0000-0000-000000000000",
"ЦенаВключаетНДС": "1",
"ДатаСоздания": "20200323000000",
"ТПН": "0",
"Покупатель": "00000000-0000-0000-0000-000000000000",
"Товары": [
{
"Товар": "763fbd9e-f345-11e8-ad89-005056805372",
"Единица": "debb28a7-f28c-11e8-ad89-005056805372",
"Количество": "3000",
"Цена": "153",
"Сумма": "459000",
"Сертификат": "",
"Склад": "5b05a9c5-0b4b-11e9-ad89-005056805372",
"КоличествоБазЕд": "3000",
"НДС": "41727,27",
"СуммаВсего": "459000",
"ПодтверждающийДокумент": "00000000-0000-0000-0000-000000000000"
}
]
}';

$insert = '{
    "Проведен": "1",
    "Ссылка": {
        "УИД": "00000000-0000-0000-0000-000000000000",
        "Вид": "Документы.пб_РеализацияТоваров"
    },
    "ПометкаУдаления": "0",
    "Дата": "20190323000000",
    "Номер": "РТ-75-'.time().'",
    "Предприятие": "640fadec-f345-11e8-ad89-005056805372",
    "КаналПоставки": "ПродукцияАрендаторов",
    "ТипПоставки": "ПродукцияАрендаторов",
    "КаналРеализации": "ОптоваяТорговля",
    "Сумма": "459000",
    "Автор": "8d872764-1810-11e9-ad89-005056805372",
    "Страна": "4e127564-d74f-4dd9-bced-0327f0f4e061",
    "ФедеральныйОкруг": "00000000-0000-0000-0000-000000000000",
    "Регион": "a6b8c647-f345-11e8-ad89-005056805372",
    "Округ": "00000000-0000-0000-0000-000000000000",
    "Район": "00000000-0000-0000-0000-000000000000",
    "ЦенаВключаетНДС": "1",
    "ДатаСоздания": "20200323000000",
    "ТПН": "0",
    "Покупатель": "00000000-0000-0000-0000-000000000000",
    "Товары": [
        {
        "Товар": "763fbd9e-f345-11e8-ad89-005056805372",
        "Единица": "debb28a7-f28c-11e8-ad89-005056805372",
        "Количество": "3000",
        "Цена": "153",
        "Сумма": "459000",
        "Сертификат": "",
        "Склад": "5b05a9c5-0b4b-11e9-ad89-005056805372",
        "КоличествоБазЕд": "3000",
        "НДС": "41727,27",
        "СуммаВсего": "459000",
        "ПодтверждающийДокумент": "00000000-0000-0000-0000-000000000000"
        }
    ]
}';

//$host = MAIN_IP_FOR_GET_DATA.$arrType[1];

echo $host;
SetDataToSIOPR($host,$insert);