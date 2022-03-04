<?php
$included = true;
include("libs/config.php");
include("libs/db.php");
include("libs/smarty.php");
include("libs/functions.php");

try {
    $config["app"]["secret"] = sodium_hex2bin($config["app"]["secret"]);
} catch (SodiumException $e) {
    echo "Invalid Sodium-Secret";
}

$tpl->assign("config", $config);
switch (@$_GET["module"]) {
    case "view":
        include("modules/view/load.php");
        break;
    case "create":
        include("modules/create/load.php");
        break;
    default:
        include("modules/landing/load.php");
        break;
}
$tpl->display("master.tpl");