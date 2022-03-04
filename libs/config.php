<?php

if (!$included) header("Location: /");

//Show link to share a password on the landing page (true/false)
$config["app"]["showcreate"] = true;

//Credentials for the database connection (MySQL/MariaDB)
$config["db"]["host"] = "localhost";
$config["db"]["user"] = "otp_user";
$config["db"]["pass"] = "password";
$config["db"]["name"] = "otp_db";
$config["db"]["charset"] = "latin1";

//more entropy for the password-link? true or false
$config["token"]["more_entropy"] = true;

//URLs to social-media. Can be the URL or false
$config["social"]["twitter"] = "https://twitter.com/rodnoc42";
$config["social"]["instagram"] = false;
$config["social"]["facebook"] = false;

//The secret for sodium
$config["app"]["secret"] = "f091af0f0462172c3e049e5a1b94900ce7019adb13cee4e4c11e20dfa5d37c37";


//Version of this tool
$config["app"]["version"] = "0.2";