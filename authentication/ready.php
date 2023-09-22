<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
require($_SERVER['DOCUMENT_ROOT'].'/authentication/template/header.php');
?>

<div class="v-application--wrap">
    <div class="burger_v2">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="burger_box">
        <ul>
            <li>
                <div class="menu__item--sub">
                    <a href="ready.php">
                    <div class="menu__item--icon d-flex">
                        <object type="image/svg+xml" data="/local/templates/siopr/img/icons/Byt_obsluzhivaniye.svg" width="100%" height="100%"></object>
                    </div>
                    <span class="menu__item--label">Администрирование</span>
                    </a>
                </div>
            </li>
            <li>
                <div class="menu__item--sub">
                    <a href="reports.php">
                        <div class="menu__item--icon d-flex">
                            <object type="image/svg+xml" data="/local/templates/siopr/img/icons/Torg_reyestr.svg" width="100%" height="100%"></object>
                        </div>
                        <span class="menu__item--label">Отчёты</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
    <div class="d-flex h-lk align-items-center ">
        <div class="user__name"><?=$_SESSION['login']?></div>
        <div id="exit" class="exit">
            <a href="/logout.php">
                <svg data-v-14336e4a="" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path data-v-14336e4a="" d="M17 7.2V6C17 4.89543 16.1046 4 15 4H8C6.89543 4 6 4.89543 6 6V18C6 19.1046 6.89543 20 8 20H15C16.1046 20 17 19.1046 17 18V17.3333" stroke="white" stroke-width="1.5"></path><path data-v-14336e4a="" d="M19.5 12L19.9685 12.5857C20.1464 12.4433 20.25 12.2278 20.25 12C20.25 11.7722 20.1464 11.5567 19.9685 11.4143L19.5 12ZM17.4685 9.41435C17.1451 9.15559 16.6731 9.20803 16.4143 9.53148C16.1556 9.85493 16.208 10.3269 16.5315 10.5857L17.4685 9.41435ZM16.5315 13.4143C16.208 13.6731 16.1556 14.1451 16.4143 14.4685C16.6731 14.792 17.1451 14.8444 17.4685 14.5857L16.5315 13.4143ZM19.9685 11.4143L17.4685 9.41435L16.5315 10.5857L19.0315 12.5857L19.9685 11.4143ZM19.0315 11.4143L16.5315 13.4143L17.4685 14.5857L19.9685 12.5857L19.0315 11.4143Z" fill="white"></path><path data-v-14336e4a="" d="M11 11.15C10.5306 11.15 10.15 11.5306 10.15 12C10.15 12.4694 10.5306 12.85 11 12.85L11 11.15ZM11 12.85L19 12.85L19 11.15L11 11.15L11 12.85Z" fill="white"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
<div class="container-lg" style="margin-top: 62px">
    <div class="row">
        <div class="col-3 big__block">
            <h3 class="login__content-p_v2">Создать пользователя:</h3>
            <br>
            <form id="user__creator">

                <label>
                    Логин:
                    <input type="text" class="input-normal_v2" id="login" name="login" placeholder="Логин"/>

                </label>
                <label>
                    Пароль:
                    <input type="text" class="input-normal_v2" id="password" name="password" placeholder="Пароль" value="123456"/>
                    <input type="button" class="all__btn-submit generate_password_admin" value="генерация пароля">
                </label>
                <br>
                <label>
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" name="active" id="active" checked>
                    Пользователь активен ?
                </label>
                <br>
                <label>
                    <input type="hidden" name="admin" value="0">
                    <input type="checkbox" name="admin" id="admin">
                    Администратор ?
                </label>
                <br>
                <label>
                    <input type="hidden" name="first_auth" value="0">
                    <input type="checkbox" name="first_auth" id="first_auth">
                    первый вход ?
                </label>
                <label>
                    Округ:
                    <select name="GUID_OKRUG">
                        <option value="">-</option>
                        <?
                        $res = getAllOkrug();
                        foreach ($res as $val):?>
                            <option value="<?=$val['guid']?>"><?=$val['__Naimenovanie']?></option>
                        <?endforeach; ?>
                    </select>
                </label>
                <label>
                    Район:
                    <select name="GUID_RAYON">
                        <option value="">-</option>
                        <?
                        $res = getAllRayons();
                        foreach ($res as $val):?>
                            <option value="<?=$val['guid']?>"><?=$val['__Naimenovanie']?></option>
                        <?endforeach; ?>
                    </select>
                </label>
                <label>
                    Роль:
                    <select name="role">
                        <option value="">-</option>
                        <?
                        $res = getAllRoles();
                        foreach ($res as $val):?>
                            <option value="<?=$val['role']?>"><?=$val['name']?></option>
                        <?endforeach; ?>
                    </select>
                </label>
                <label>
                    Почта:
                    <input type="text" class="input-normal_v2" id="mail" name="mail" placeholder="Mail"/>
                </label>
                <label>
                    <input type="button" class="all__btn-submit user__creator__submit" value="Создать">
                </label>
            </form>
        </div>
        <div class="col-3 big__block" >
            <h3 class="login__content-p_v2">Список пользователей:</h3>
            <br>
            <div style="height: 500px;overflow-y: auto;">
                <table class="table table-striped all-users-siopr" style="font-size: 10px;">
                    <thead>
                    <tr><td>ID</td><td>ПОЛЬЗОВАТЕЛИ</td>
                        <td style="cursor: pointer;" title="Активен" >А</td>
                        <td style="cursor: pointer;" title="Заблокирован" >Б</td>
                        <td style="cursor: pointer;" title="Нужна первая авторизация" >П</td>
                        <td style="cursor: pointer;" title="Неудачные попытки входа" >Н</td></tr>
                    </thead>
                    <tbody>
                    <?
                    $arrUsers = getAllUsers();
                    foreach ($arrUsers as $k => $val):?>
<tr class="user__line" rel="<?=$val['id']?>"><td><?=$val['id']?></td><td><?=$val['login']?></td><td><?=$val['active']?></td><td><?=$val['blocking']?></td><td><?=$val['first_auth']?></td><td><?=$val['failed_auth']?></td></tr>
                    <?endforeach;?>
                    </tbody>
                    <tfoot>
                    <tr><td colspan="6">Всего пользователей: <b><?=count($arrUsers)?></b> .</td></tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-6 user__info big__block" style="margin-right: -34px;" ></div>

    </div>
</div>

<?php
//    require_once('html-scripts.php');
?>

