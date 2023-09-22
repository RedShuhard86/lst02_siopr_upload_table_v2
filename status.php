<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-3">
            <h3>Проверка GET 1c </h3>
            <?
                $ans = getMapInfo();
                if(count($ans)>0){
                    echo "<b style='color: #0f0;'>OK</b>";
                }else{
                    echo "<b style='color: #f00;'>FALSE</b>";
                }
            ?>
        </div>
        <div class="col-3">
            <h3>Проверка POST 1c</h3>
            <?
            $table = "0YXRgV_QmtC.0LvQuNGH0LXRgdGC0LLQvtCh0LrQu9Cw0LTRgdC60LjRhdCf0YDQtdC00L_RgNC40Y_RgtC40LnQn9C.0J7QutGA0YPQs9Cw0LzQk9C.0YDQvtC00LDQnNC.0YHQutCy0Ys-";
            $host_api = MAIN_IP_FOR_GET_DATA . "getinfo/" .$table;
            $res = curlCombain($host_api,[],[],true);

            if($res['info'] == '200'){
                echo "<b style='color: #0f0;'>OK</b>";
            }else{
                echo "<b style='color: #f00;'>FALSE (".$res['info'].")</b>";
            }
            ?>
        </div>
        <div class="col-3">
            <h3>Проверка SQL</h3>
            <?
            $q = "SELECT * FROM INFORMATION_SCHEMA.REFERENTIAL_CONSTRAINTS WHERE CONSTRAINT_NAME ='FK_ChannelPlayerSkins_Channels'";
            $ans = ms_query_simple($q);
            $ans = getMapInfo();
            if(is_array(json_decode($ans,true))){
                echo "<b style='color: #0f0;'>OK</b>";
            }else{
                echo "<b style='color: #f00;'>FALSE</b>";
            }
            ?>
        </div>
        <div class="col-3">
            <h3>Проверка FTP</h3>
            <?
            $arrFtp =[
                "type"=>"ftp://",
                "user"=>"USRFTP",
                "pass"=>"Qmswrt18P",
                "address" => FTP_ADDRESS,
                "path" => "",
            ];
            $conn = ftp_connect($arrFtp['address']) or die("Не удалось установить соединение с Сервером");
            ftp_raw($conn, "OPTS UTF8 ON");
            ftp_login($conn, $arrFtp['user'], $arrFtp['pass']) or die("Логин или пароль FTP неверны");
            echo "<b style='color: #0f0;'>OK</b>";
            ?>
        </div>
    </div>
</div>
