<?php
$uuid = $_GET["uuid"];
if (isset($_POST["submit"]) && $_POST["uuid"] == $uuid) {
    $sql = "SELECT token,used from password WHERE hash = :uuid";
    $sth = $db->prepare($sql);
    $sth->execute(array(':uuid' => $uuid));
    $arr = $sth->fetch(PDO::FETCH_ASSOC);
    if ($arr["used"] == null && $arr["token"] != null) {
        $tpl->assign("token", doDecrypt($arr["token"], $config["app"]["secret"]));
        $tpl->assign("valid", true);
    }
    elseif ($arr["used"] != null && $arr["token"] == null) {
        $tpl->assign("valid", false);
        $tpl->assign("usedtime", $arr["used"]);
    }
    else{
        $tpl->assign("valid", false);
        $tpl->assign("usedtime", 0);
    }

    $sql = "UPDATE password SET token=null, used=current_timestamp WHERE hash = :uuid";
    $sth = $db->prepare($sql);
    $sth->execute(array(':uuid' => $uuid));


    $tpl->assign("tpl", "view_token.tpl");
} else {
    $tpl->assign("uuid", $uuid);
    $sql = "SELECT token,used from password WHERE hash = :uuid";
    $sth = $db->prepare($sql);
    $sth->execute(array(':uuid' => $uuid));
    $arr = $sth->fetch(PDO::FETCH_ASSOC);
    if ($arr["used"] == null && $arr["token"] != null) {
        $tpl->assign("valid", true);
    } elseif ($arr["used"] != null && $arr["token"] == null) {
        $tpl->assign("valid", false);
        $tpl->assign("usedtime", $arr["used"]);
    } else {
        $tpl->assign("valid", false);
        $tpl->assign("usedtime", 0);
    }


    $tpl->assign("tpl", "view_question.tpl");
}