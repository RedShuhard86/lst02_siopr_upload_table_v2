<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
<html>
<head>
<?$APPLICATION->ShowHead();?>
<title><?$APPLICATION->ShowTitle()?></title>
    <script src="<?=SITE_TEMPLATE_PATH."/js/jquery-3.6.0.js";?>"></script>
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH."/css/bootstrap.min.css"?>">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH."/css/bootstrap-icons.css"?>">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH."/css/style.css"?>">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH."/css/index_style.css"?>">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH."/css/chosen.min.css"?>">
    <script src="<?=SITE_TEMPLATE_PATH."/js/scripts.js"?>" ></script>
    <script src="<?=SITE_TEMPLATE_PATH."/js/index_script.js"?>" ></script>
    <script src="<?=SITE_TEMPLATE_PATH."/js/chosen.jquery.min.js"?>" ></script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF">
    <script src="<?=SITE_TEMPLATE_PATH."/js/bootstrap.bundle.min.js"?>"></script>
<?$APPLICATION->ShowPanel()?>
<?if($USER->IsAdmin()):?>
<div style="border:red solid 1px">
	<form action="/bitrix/admin/site_edit.php" method="GET">
		<input type="hidden" name="LID" value="<?=SITE_ID?>" />
		<p><font style="color:red"><?echo GetMessage("DEF_TEMPLATE_NF")?> </font></p>
		<input type="submit" name="set_template" value="<?echo GetMessage("DEF_TEMPLATE_NF_SET")?>" />
	</form>
</div>
<?endif?>