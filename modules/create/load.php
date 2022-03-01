<?php
if (isset($_POST["submit"])) {
    $uniqid = uniqid('', $config["token"]["more_entropy"]);
    $token = $_POST["token"];
    $sql = "INSERT INTO password (hash, token) VALUES (:hash, :token)";
    $sth = $db->prepare($sql);
    $sth->execute(array(':hash' => $uniqid, ':token' => doEncrypt($token,$config["app"]["secret"])));
    $tpl->assign("uuid", $uniqid);
}

$tpl->assign("tpl", "create.tpl");

