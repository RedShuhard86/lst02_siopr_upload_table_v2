<?php
try {
    // Создание SOAP-клиента
    $addWSDL = "http://".$_SERVER['SERVER_NAME']."/soap/factoriya/Stock.wsdl";
//    echo $addWSDL;
    $client = new SoapClient($addWSDL);
    $arrFunc = $client->__getFunctions();
    echo "<pre>"; print_r($arrFunc); echo "</pre>";die();
    // Посылка SOAP-запроса c получением результат
    $result = $client->getStock("a");
    echo "Текущий запас на складе: ", $result;
} catch (SoapFault $exception) {
    echo $exception->getMessage();
}
?>