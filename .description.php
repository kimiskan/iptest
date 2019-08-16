<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = array(
	"NAME" => Loc::getMessage("NAME"),
	"DESCRIPTION" => Loc::getMessage("DESCR"),
	"ICON" => "/images/icon.gif",
	"PATH" => array(
		"ID" => "Главная страница",
	),
);