<?php

if (!$included) {
    die("NO HACKING");
}
define('SMARTY_RESOURCE_CHAR_SET', 'ISO-8859-1');
require_once("externals/smarty/Smarty.class.php");

$tpl = new Smarty();

$tpl->setTemplateDir("smarty/templates/");
$tpl->setCompileDir("smarty/templates_c/");
$tpl->setConfigDir("smarty/config/");
$tpl->setCacheDir("smarty/cache/");