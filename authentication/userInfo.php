<?php
session_start();

require_once 'checkUser.php';

$check = checkUserIsAdmin($_SESSION['login']);
//die();
if(!in_array("FALSE",$check)){
//    echo "Пользователь проверен";
    $res = getUserSIOPR($_POST['ID']);
//    echo "<pre>"; print_r(getUserSIOPR($_POST['ID'])); echo "</pre>";die();
    ?>

        <h3 class="login__content-p_v2">Редактировать пользователя:</h3>
        <br>
        <form id="restruct_user">
                <input type="hidden" name="ID" value="<?=$_POST['ID']?>">
            <label>
                Логин:
                <br>
                <input type="text" class="input-normal_v2"  id="login" name="login" placeholder="Логин" value="<?=$res['login']?>"/>
            </label>
            <br>
            <label>
                Задать НОВЫЙ пароль:
                <br>
                <input type="text" class="input-normal_v2"  id="password" name="password" placeholder="Пароль" />
                <input type="button" class="all__btn-submit generate_password" value="генерация пароля">
            </label>
            <br>
            <label>
                <input type="hidden" name="active" value="0">
                <input type="checkbox" name="active" id="active" <? if($res['active'] === 1):?>checked<?endif;?>>
                Пользователь активен ?
            </label>
            <br>
            <label>
                <input type="hidden" name="blocking" value="0">
                <input type="checkbox" name="blocking" id="blocking" <?if($res['blocking'] === 1):?>checked<?endif;?>>
                Пользователь заблокирован ?
            </label>
            <br>
            <label>
                <input type="hidden" name="first_auth" value="0">
                <input type="checkbox" name="first_auth" id="first_auth" <?if($res['first_auth'] === 1):?>checked<?endif;?>>
                первый вход ?
            </label>
            <br>
            <label>
                <input type="hidden" name="admin" value="0">
                <input type="checkbox" name="admin" id="admin" <?if($res['admin'] === 1):?>checked<?endif;?>>
                Администратор ?
            </label>
            <br>
            <label>
                Округ:
                <br>
                <select name="GUID_OKRUG">
                    <option value="">-</option>
                    <?
                    $res1 = getAllOkrug();
                    foreach ($res1 as $val):
                        $checked = "";
                        if($val['guid'] == $res['GUID_OKRUG']){
                            $checked = 'selected';
                        }
                        ?>
                        <option value="<?=$val['guid']?>" <?=$checked;?> ><?=$val['__Naimenovanie']?></option>
                    <?endforeach; ?>
                </select>
            </label>
            <label>
                Район:
                <br>
                <select name="GUID_RAYON">
                    <option value="">-</option>
                    <?
                    $res2 = getAllRayons();
                    foreach ($res2 as $val):
                        $checked = "";
                        if($val['guid'] == $res['GUID_RAYON']){
                            $checked = 'selected';
                        }
                        ?>
                        <option value="<?=$val['guid']?>" <?=$checked;?>><?=$val['__Naimenovanie']?></option>
                    <?endforeach; ?>
                </select>
            </label>
            <label>
                Роль:
                <br>
                <select name="role">
                    <option value="">-</option>
                    <?
                    $res3 = getAllRoles();
                    foreach ($res3 as $val):
                        $checked = "";
                        if($val['role'] == $res['role']){
                            $checked = 'selected';
                        }
                        ?>
                        <option value="<?=$val['role']?>" <?=$checked;?>><?=$val['name']?></option>
                    <?endforeach; ?>
                </select>
            </label>
            <label>
                Почта:
                <br>
            <input type="text" class="input-normal_v2"  name="mail" id="mail" value="<?=$res['mail']?>"/>
            </label>
            <br>
            <br>
            <input type="button" class="all__btn-submit restruct__user__submit" value="Сохранить">
        </form>


<?php
}else{
    echo "У Вас недостаточно прав доступа";
    die();
}
