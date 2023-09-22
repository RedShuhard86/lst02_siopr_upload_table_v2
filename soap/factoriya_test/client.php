<?php
error_reporting("E_ALL");
// Создание SOAP-клиента
$addWSDL = "http://".$_SERVER['SERVER_NAME']."/soap/factoriya_test/yarmarki.wsdl";
//    echo $addWSDL;
$options = array(
    "trace"  => true,
    'location' => "http://".$_SERVER['SERVER_NAME']."/soap/factoriya_test/yarmarki.wsdl",
    'soap_version'   => SOAP_1_1,
    'encoding'=>'UTF-8'
);
$client = new SoapClient($addWSDL,$options);
try {
    $arrFunc = $client->__getFunctions();
    echo "<pre>"; print_r($arrFunc); echo "</pre>";
    // Посылка SOAP-запроса c получением результат
    $result = $client->GetItemGroup();


} catch (SoapFault $soapFault) {
    echo "<pre>"; print_r($client); echo "</pre>";
    $txt = $soapFault -> getMessage();
    echo "<pre>"; print_r($txt); echo "</pre>";
    echo "<br>";
    echo "Request :<br>", htmlentities($client->__getLastRequest()), "<br>";
    echo "Request headers: <br>".$client->__getLastRequestHeaders().'<br>';
    echo "Response :<br>", htmlentities($client->__getLastResponse()), "<br>";
    echo "Response headers:<br>".$client->__getLastResponseHeaders().' <br>';
}
?>