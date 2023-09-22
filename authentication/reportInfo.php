<?php
session_start();
require_once 'checkUser.php';

$check = checkUserIsAdmin($_SESSION['login']);
//echo "<pre>"; print_r($check); echo "</pre>";die();
if(!in_array("FALSE",$check)){
//    echo "Пользователь проверен";
    $res = getUserLog($_POST['ID']);
//    echo "<pre>"; print_r($res); echo "</pre>";die();
//    echo "<pre>"; print_r(getUserSIOPR($_POST['ID'])); echo "</pre>";die();
    ?>

    <h3 class="login__content-p_v2">Отчёты по пользователю:</h3>
    <table class="table table-striped all-users-siopr">
        <thead>
        <tr><td>Дата</td><td>Событие</td><td>Инициатор</td><td>Последствия</td><td>Подчинённый</td></tr>
        </thead>
        <tbody>
        <?foreach ($res as $val):?>
        <tr><td><?=$val['event_time']?></td><td><?=$val['event']?></td><td><?=$val['initiator']?></td><td><?=$val['aftermath']."\r\n".$val['content']?></td><td><?=$val['subordinate']?></td></tr>
        <?endforeach;?>
        </tbody>
    </table>


    <?php
}else{
    echo "У Вас недостаточно прав доступа";
    die();
}
