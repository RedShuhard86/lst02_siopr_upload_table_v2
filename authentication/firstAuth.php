<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
require($_SERVER['DOCUMENT_ROOT'].'/authentication/functions.php');
session_start();
$id = getUserSIOPRID($_SESSION['login']);
?>
<div class="login">
    <div class="login__main">
        <div class="login__container">
            <header class="login__header">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/gerb.png" class="login__logo" alt="Герб г. Москва" />
                <h1 class="login__gerb gerb">
                    <span class="gerb__title">Правительство Москвы</span>
                    <span class="gerb__subtitle">Департамент торговли</span>
                    <span class="gerb__subtitle">и услуг города Москвы</span>
                </h1>
            </header>
            <main>
                <form id="login-form-auth" class="login__content" accept-charset="utf-8">
                    <p class="login__content-p">Добро пожаловать, рады снова видеть Вас.</p>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="text" class="input-normal" id="login" name="login" disabled placeholder="Логин" value="<?=$_SESSION['login']?>"/>
                    <input type="password" class="input-normal" id="pass" name="pass" placeholder="Старый пароль"/>
                    <input type="password" class="input-normal" id="pass1" name="pass1" placeholder="Введите пароль"/>
                    <input type="password" class="input-normal" id="pass2" name="pass2" placeholder="Повторите пароль"/>
                    <p class="login__error" style="display: none">Неверный логин или пароль</p>
                    <div class="login__content-checkbox">
                        <a class="container remember-pass" href="mailto:siopr@mos.ru?subject=Проблема со вводом пароля"
                           title="По вопросу восстановления пароля напишите в техподдержку: siopr@mos.ru">
                            Забыли пароль?
                        </a>
                    </div>
                    <input type="button" class="first-auth-btn-submit" value="Обновить пароль">
                </form>
            </main>

            <footer class="login__footer">
                <p style="color: gray">Служба техподдержки ЕГАС СИОПР</p>
                <p style="font-weight: bold">+7-499-350-90-99<span class="login__mail">siopr@mos.ru</span></p>
            </footer>
        </div>
    </div>

    <div class="login__image">
        <img class="login__background" alt="Логинение" />
    </div>
</div>

<?php
//    require_once('html-scripts.php');
?>

