# OTP - One Time Password

## What is it?
OTP means "One Time Password" and is a webtool to share passwords and secret.
The password will be saved encrypted in a database and a link for this will be generated. You can share this link via mail or messenger.
Once the password is accessed, it will be deleted from the database and can't be retrieved again.

If the link does not work, you know that the password is compromised and should be changed immediately.

## Demo
You can try it here: https://otp.rodnoc.eu

## Installation
You need at least PHP 7.4, but I developed and tested it with 8.1. And you need a MySQL or MariaDB-Database

Please upload all files to your webspace and create this table in your database:
```
CREATE TABLE `password` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`hash` varchar(25) NOT NULL,
`token` varchar(255) DEFAULT NULL,
`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`used` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`)
) DEFAULT CHARSET=latin1;
```

After this add your configuration to libs/config.php

```
    //Show link to share a password on the landing page (true/false)
    $config["app"]["showcreate"]=true;

    //Credentials for the database connection (MySQL)
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
    $config["app"]["secret"]="f091af0f0462172c3e049e5a1b94900ce7019adb13cee4e4c11e20dfa5d37c37";
```

To generate the secret for sodium, you can use this command on a CLI.
```
php <<EOF
<?php
echo sodium_bin2hex(sodium_crypto_secretbox_keygen());
?>
EOF
```
## Usage
Enter your password on https://otp.domain.local/create/. After a click on "Save it!" the URL to the password is listed.
You can share this link via mail or messenger.
The recipient can open this URL and when the password is not received yet, he can click on "Request it!" and the
password is shown. When anyone uses the Link again, there is a information with the timestamp the password was accessed.