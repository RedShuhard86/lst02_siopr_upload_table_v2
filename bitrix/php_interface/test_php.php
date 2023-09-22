<?php

function test_PHP($arr){
//    #############################################
//    проверка на то - отрабатывает или нет

//    это судя по всему - возможность получать результаты с БД и записывать их в переменную, чтобы потом выкатить на frontend
//    $q = "SELECT count(report_id) as cnt FROM xx_reports_headers WHERE report_id = ".$arr['params']['report_id'];
//    $res = ms_query_simple($q);
//
//    let answerTwo = await requests().selectQv('TestPhp', {test: '123'})
//    return $arr['params']['test']; - вернет 123, - можно менять схему выше (через main в services в dashboard - но уже слишком много
//    запросов было создано по такому шаблону, поэтому оставляем - да и работает нормально)
//
//    return $arr;

//    #############################################
//    #############################################
//    experiments

    $testVar = 'test var value';

    if (gettype($arr['params']['values']) == 'NULL') return '{"ERROR":"Вы забыли указать параметры! '.$testVar.'"}';

    // hoisting функции внутри функции не работает
    // также есть моменты со областью видимости которые отличаются с JS
    function ifElse($param){
        return $param;
    }

    if ($arr['params']['testcase'] == 'case1') {
        return ifElse('param');
    } else {
        return 'testcase is not case1';
    }
}