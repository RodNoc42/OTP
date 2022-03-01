# OTP

## Was ist es?
OTP steht für "One Time Password" und erlaubt es, Kennwörter sicher zu übertragen.
Das Kennwort wird in einer Datenbank gespeichert und ein Link generiert, der per Mail oder ChatProgramm geteilt werden kann. Sobald das Kennwort einmal abgerufen wurde, wird es aus der Datenbank gelöscht und kann nicht noch einmal abgerufen werden.

Sollte der Link beim Empfänger nicht mehr funktionieren, ist damit bekannt, dass das Kennwort kompromittiert ist und sollte direkt geändert werden.


## Installation
Es wird mindestens PHP Version 7.4 benötigt, entwickelt wurde es für PHP8.1

Alle Dateien müssen in den Webspace hochgeladen werden und in der MySQL-Datenbank die benötigte Tabelle angelegt werden:
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

Unter /libs/config.php kann die Konfiguration vorgenommen werden, hier ist besondern die Datenbankverbindung wichtig.
```
    $config["db"]["host"] = "localhost";
    $config["db"]["user"] = "otp_user";
    $config["db"]["pass"] = "password";
    $config["db"]["name"] = "otp_db";
    $config["db"]["charset"] = "latin1";
```

Die Verschlüsselung mit Sodium wird auch in dieser Datei konfiguriert, um einen neuen Schlüssel zu generieren kann auf der Kommandozeile zB dieses Kommando verwendet werden:
```
php <<EOF
<?php
echo sodium_bin2hex(sodium_crypto_secretbox_keygen());
?>
EOF
```
## Verwendung
Unter https://otp.domain.local/create/ kann das Kennwort in der Textbox eingegeben werden. Mit Klick auf "Save it!" wird es dann in der Datenbank gespeichert und der Link zu dem Kennwort angezeigt. Dieser kann dann einfach mit dem Empfänger auf beliebigem Wege geteilt werden.