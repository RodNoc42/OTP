<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 27.01.2016
 * Time: 20:14
 */

if (!$included) header("Location: /");

    $config["app"]["version"]="0.1";

    $config["db"]["host"] = "localhost";
    $config["db"]["user"] = "otp_user";
    $config["db"]["pass"] = "password";
    $config["db"]["name"] = "otp_db";
    $config["db"]["charset"] = "latin1";

    $config["token"]["more_entropy"] = "true";

    $config["social"]["twitter"] = "https://twitter.com/rodnoc42";
    $config["social"]["instagram"] = "https://www.instagram.com/therealrodnoc/";
    $config["social"]["facebook"] = "https://facebook.com/RodNoc86";

    $sodium_secret="f091af0f0462172c3e049e5a1b94900ce7019adb13cee4e4c11e20dfa5d37c37";
try {
    $config["app"]["secret"] = sodium_hex2bin($sodium_secret);
} catch (SodiumException $e) {
    echo "Invalid Sodium-Secret";
}