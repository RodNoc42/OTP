<?php

try {
    $db = new PDO('mysql:host=' . $config["db"]["host"] . ';dbname=' . $config["db"]["name"] . ';charset=' . $config["db"]["charset"],$config["db"]["user"], $config["db"]["pass"]);
} catch (PDOException $e) {
    print "Error!: Could not connect to database<br/>";
    die();
}
