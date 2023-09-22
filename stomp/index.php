<?php
$post = file_get_contents("php://input");
function convert_multi_array($array) {
    $out = implode("&",array_map(function($a) {return implode("~",$a);},$array));
    return $out;
}

$file = $_SERVER['DOCUMENT_ROOT']."/log/stomp/".date("Y-m-d")."_post_log.txt";
file_put_contents($file,convert_multi_array($post), FILE_APPEND);
die();
$addr = "tcp://artemis-ext-01.etp.sm-soft.ru";
$user = "siopr";
$pass = "siopr";

try {
    $stomp = new Stomp($addr,$user,$pass);
    /* подписка на сообщения из очереди 'foo' */
    $stomp->subscribe('FIVE.SERVICE.SIOPR.APPLICATION_INC');

    /* чтение фрейма */
    var_dump($stomp->readFrame());

    /* закрытие подключения */
    unset($stomp);
} catch(StompException $e) {
    die('Ошибка подключения: ' . $e->getMessage());
}
