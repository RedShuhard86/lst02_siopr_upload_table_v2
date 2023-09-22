<?php
class StockService {
    // Описание функции Web-сервиса
    // На полках a, b, c, d, e храниться определенное кол-во товара.
    function getStock($id) {
        $stock = [
            "a" => 100,
            "b" => 200,
            "c" => 300,
            "d" => 400,
            "e" => 500
        ];
        if (isset($stock[$id])) {
            $quantity = $stock[$id];
            return $quantity;
        } else {
            //return 0;
            throw new SoapFault("Server", "Несуществующий id товара");
        }
    }
}
 // Тестируем перед тем, как отдать клиенту в виде ответа.
//$Stock = new StockService();
//echo $Stock->getStock("b");
//echo $Stock->getStock("e");
//exit;

// Отключение кэширования WSDL-документа
ini_set("soap.wsdl_cache_enabled", "0"); // отключаем для тестирования, т.к файлы очень хорошо кешируются
ini_set('soap.wsdl_cache_ttl',0);
// Создание SOAP-сервер
$server = new SoapServer("http://".$_SERVER['SERVER_NAME']."/soap/factoriya/Stock.wsdl");
// Добавить класс к серверу
$server->addFunction("getStock"); // эта функция будет видна клиенту
$server->setClass("StockService"); // заменяем только эту строку
// Запуск сервера
$server->handle();
?>