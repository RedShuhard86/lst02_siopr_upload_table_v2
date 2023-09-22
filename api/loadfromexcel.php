<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//header('Access-Control-Allow-Origin: http://lst02.camco');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, HEAD, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, origin, content-type, accept');

function reArrayFiles($file_post) {
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);
    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_ary;
}
$file_ary = reArrayFiles($_FILES['file']);
foreach ($file_ary as $value) {
    if (isset($value['tmp_name']) and !empty($value['tmp_name'])) {
        $name = str_replace([" "], ["_"], $value["name"]);
        $arr['xx_type']= trim($_POST['VID'][0]);
        $arr['xx_guid']= trim($_POST['UID'][0]);
        $arr['xx_group']= trim($_POST['GroupId'][0]);
        isDir($arr['xx_type'],'docs');
        isDir($arr['xx_type']."/".$arr['xx_guid'],'docs');
        isDir($arr['xx_type']."/".$arr['xx_guid']."/".$arr['xx_group'],'docs');

        /* ВРЕМЕННО */
        $arr['address']= '../upload/docs/loadfromexcel/'.$name;
        move_uploaded_file($value['tmp_name'], $arr['address']);
        $arr['name']= $name;
        echo sendFromExcellFilesToSIOPR($arr);
    } else {
        echo "НЕ Грузим";
    };
};

function sendFromExcellFilesToSIOPR($arr){
    $user = getUser();
    $ext = pathinfo($arr['address'], PATHINFO_EXTENSION);
    $fileStr = file_get_contents($arr['address']);

    $postdata = array(
        "name" => $arr['name'],
        "format" => $ext,
        "upload" => $fileStr
    );
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, MAIN_IP_FOR_GET_DATA.'loadfromexcel');
    curl_setopt($ch, CURLOPT_USERPWD, $user['log'].':'.$user['pas']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata );
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $output = curl_exec($ch);

    if ($output === FALSE) {
        // Тут-то мы о ней и скажем
        echo "cURL Error: " . curl_error($ch);
        return;
    }
    curl_close($ch);
    return $output;
}