<?php
function curlGetCombain($url, $arrJson = [], $arrHeader = []){
    $user = getUser();

    if(count($arrHeader) <= 0){
        $arrHeader[] = "Content-Type: text/xml; charset=utf-8";
    }

    $json = json_encode($arrJson,JSON_UNESCAPED_UNICODE);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_USERPWD, $user['log'] . ':' . $user['pas']);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $arrHeader);
    $ansver['answer'] = curl_exec($curl);
    $res['ACTION'] = $url;
    $res['header'] = json_encode($arrHeader,JSON_UNESCAPED_UNICODE);
    $res['json'] = $json;
    $res['TYPE'] = "GET";
    $res['info'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $res['info_size'] = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $ansver['info_size'] = $res['info_size'];
    $res['ERROR'] = curl_error($curl);

    if((int)$res['info']!=200){
        $turn['TYPE'] = "GET";
        $turn['URI'] = $url;
        $turn['dateTime'] = date("Y-m-d H:i:s");
        $turn['answer'] = $ansver['answer'];
        $turn['ERROR'] = $res['ERROR'];
        $turn['json'] = $res['json'];
        set1cError($turn);
    }
    setAllActions($res);
    curl_close($res);
    return $ansver;
}

function curlCombain($url, $arrJson = [], $arrHeader = [], $flag = true, $headerON = false){
    $user = getUser();
//    echo "<pre>"; print_r($arrJson); echo "</pre>";
    if(count($arrHeader) <= 0){
        $arrHeader[] = "Content-Type: text/xml; charset=utf-8";
    }
//    echo "<pre>"; print_r($arrJson); echo "</pre>";
    $json = json_encode($arrJson,JSON_UNESCAPED_UNICODE);
//    echo $json;
    if($flag == false){
        $json = $arrJson;
    }
    $curl = curl_init($url);
    

//    echo $arrJson;
//    echo "<pre>"; print_r($arrJson); echo "</pre>";
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_USERPWD, $user['log'] . ':' . $user['pas']);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
    curl_setopt($curl, CURLOPT_HEADER, $headerON);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $arrHeader);
    curl_setopt($curl, CURLOPT_POST, true);
    $ansver['answer'] = curl_exec($curl);
//    $ansver['user'] = $user['log'] . ':' . $user['pas'];

    $res['ERROR'] = curl_error($curl);
    $res['info_size'] = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $res['SERVICE'] = $url;
    $res['header'] = json_encode($arrHeader,JSON_UNESCAPED_UNICODE);
    $res['json'] = $json;
    $res['TYPE'] = "POST";
    $res['info'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $ansver['url'] = $url;
    $ansver['info'] = $res['info'];
    $ansver['header'] = json_encode($arrHeader,JSON_UNESCAPED_UNICODE);
    $ansver['json_1'] = $json;
    $ansver['json_2'] = $arrJson;
    $ansver['info_size'] = $res['info_size'];

    $turn = [];
    if((int)$res['info']!=200){
        $turn['TYPE'] = "POST";
        $turn['URI'] = $url;
        $turn['dateTime'] = date("Y-m-d H:i:s");
        $turn['answer'] = $ansver['answer'];
        $turn['ERROR'] = $res['ERROR'];
        $turn['json'] = $res['json'];
        set1cError($turn);
    }
//    echo "<pre>"; print_r($ansver); echo "</pre>";
//    echo "<pre>"; print_r($res); echo "</pre>";
//    echo "<pre>"; print_r($turn); echo "</pre>";
//    die();
    setAllActions($res);
    curl_close($curl);
    return $ansver;
}