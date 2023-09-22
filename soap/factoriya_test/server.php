<?php
class yarmarki{
    function GetItemGroup(){
        echo "99999999999999999999999999";
        return 22222;
    }
}

//$Stock = new yarmarki();
//echo $Stock->GetItemGroup();

// Отключение кэширования WSDL-документа
ini_set("soap.wsdl_cache_enabled", "0"); // отключаем для тестирования, т.к файлы очень хорошо кешируются
ini_set('soap.wsdl_cache_ttl',0);
// Создание SOAP-сервер
$options = [];
$server = new SoapServer("http://".$_SERVER['SERVER_NAME']."/soap/factoriya_test/yarmarki.wsdl",$options);

// Добавить класс к серверу
$server->addFunction("GetItemGroup"); // эта функция будет видна клиенту
$server->setClass("yarmarki"); // заменяем только эту строку
// Запуск сервера
$server->handle();