<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
  die();
}

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentParameters = array(
  "PARAMETERS" => array(
    "ID_FORM" => array(
        "PARENT" => "BASE",
        "NAME" => 'ID',
        "TYPE" => "STRING",
        "DEFAULT" => 1
    )
  ),
);
