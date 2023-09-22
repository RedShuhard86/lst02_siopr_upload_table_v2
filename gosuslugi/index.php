<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
?>

<form method="get">
    <select name="gosusluga">
        <option value="030301">ЯВД</option>
        <option value="054302">НТО при СТО</option>
        <option value="038202">Сезонные Кафе</option>
    </select>
    <input type="submit" value="ЗАПРОСИТЬ ГУИД">
</form>
<?php
    if(isset($_GET) && count($_GET)>0):
        $filename = $_GET['gosusluga'].".xml";
        $f = fopen($filename,'r');
        $con = fread($f,filesize($filename));
        $arr['params']['usluga'] = $_GET['gosusluga'];
        $arr['params']['content_xml'] = $con;
        $res = setGosuslugaSIOPR($arr);
        $str = explode(".",json_decode($res['answer'],true)['zayavka']);
        ?>
        <input type="text" value="<?=$str[count($str)-1]?>">
    <?php endif ?>

