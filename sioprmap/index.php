<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
    if(count(getUser()) > 0){
        header('Location: http://'.$_SERVER['SERVER_ADDR'].'/sioprmap/content.html');
    }
?>