<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>
<?
$url = 'https://sudir-test.mos.ru/blitz/oauth/ae?client_id=sioprweb.mos.ru&response_type=code&redirect_uri=https://sioprweb.mos.ru/dashboard.php&scope=openid';
header("Location: ".$url);
?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
