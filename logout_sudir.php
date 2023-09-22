<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>
<?
$url = 'https://sudir.mos.ru/sps/login/logout?client_id=sioprweb.mos.ru&post_logout_redirect_uri=https://sioprweb.mos.ru/logout.php';
header("Location: ".$url);
?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>