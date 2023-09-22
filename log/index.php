<?php
    require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
    $APPLICATION->SetTitle('Лог');
?>
<div class="login">
    <div class="login__main">

            <main>
                <form method="post">
                    <input type="submit" name="file" value="report_log">Логи отчетов</input><br>
                    <input  type="submit" name="file" value="sql_log">Логи SQL</input>
                </form>

            </main>

    </div>
</div>
<?echo "<pre>"; print_r($_POST); echo "</pre>";?>
<?=$_POST['file']?>

