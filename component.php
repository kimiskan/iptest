<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$arResult['ID_FORM'] = $arParams['ID_FORM'];

$this -> IncludeComponentTemplate();
$APPLICATION->AddHeadScript($this->__path . '/templates/' . $this->arParams['COMPONENT_TEMPLATE'] . '/libs/parsley/parsley.js');



