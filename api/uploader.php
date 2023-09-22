<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//header('Access-Control-Allow-Origin: http://lst02.camco');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, HEAD, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, origin, content-type, accept');


if(isset($_REQUEST['zayavka']) && strlen($_REQUEST['zayavka'])>0){
    $arr['params']['usluga'] = $_REQUEST['zayavka'];
    $arr['params']['content_xml'] = file_get_contents($_FILES['file']['tmp_name']);
    $res = setGosuslugaSIOPR($arr);
    $str = explode(".",json_decode($res['answer'],true)['zayavka']);
    echo $str[count($str)-1];
}elseif($_REQUEST['typeRequest'] == "YVD"){
    $content = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
    $url = MAIN_IP_FOR_GET_DATA."run1sfunction";
    $arrJson = [
        "Сервис" => "ЗагрузитьЯВДРоботизированнаяПодача",
        "Параметры" => [
            [
                "Ключ" => "#Объект",
                "Значение" => $_REQUEST['GUID']
            ],
            [
                "Ключ" => "XLSX",
                "Значение" => $content
            ]
        ]
    ];
    $res = curlCombain($url,$arrJson);
    echo $res['answer'];
}else{
    function reArrayFiles($file_post)
    {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);
        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }
        return $file_ary;
    }

    $file_ary = reArrayFiles($_FILES['file']);

    foreach ($file_ary as $value) {
        if (isset($value['tmp_name']) && !empty($value['tmp_name'])) {
            $name = str_replace([" "], ["_"], $value["name"]);
            $arr['xx_type'] = trim($_POST['VID'][0]);
            $arr['xx_guid'] = trim($_POST['UID'][0]);
            $arr['xx_group'] = trim($_POST['GroupId'][0]);
            $arr['priznak'] = trim($_POST['priznak'][0]);
            $arr['monitoring_rpn'] = trim($_POST['monitoring_rpn'][0]);
            $arr['file_vid'] = trim($_POST['file_vid'][0]);
            isDir($arr['xx_type'], 'docs');
            isDir($arr['xx_type'] . "/" . $arr['xx_guid'], 'docs');
            isDir($arr['xx_type'] . "/" . $arr['xx_guid'] . "/" . $arr['xx_group'], 'docs');

            /* ВРЕМЕННО */
            $arr['address'] = '../upload/docs/' . $arr['xx_type'] . "/" . $arr['xx_guid'] . "/" . $arr['xx_group'] . "/" . $name;
            move_uploaded_file($value['tmp_name'], $arr['address']);
            $arr['name'] = $name;
            echo sendFilesToSIOPR($arr);
        } else {
            echo "НЕ Грузим";
        };
    };
}