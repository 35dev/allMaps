<?php
require_once(__DIR__."/../assets/swiftmailer/lib/swift_required.php");
require_once(__DIR__."/../config.inc.php");
require_once(__DIR__."/autoloader.php");

use outils\sendmail;

register_shutdown_function('shutdownFunction');

function shutDownFunction() {
    $error = error_get_last();
    // fatal error, E_ERROR === 1
    //if ($error['type'] === E_ERROR) {
    if (($error != null) && is_null(strpos($error['message'], "mysqli"))) {
        $email = new sendmail();
        $email->Subject = "Erreur site AllMaps -> " . $error['message'];
        $email->To = "johannfrot@gmail.com";
        $email->Body = print_r($error, true);
        $email->envoiMail();
    }
    //}
}
require_once(__DIR__."/PDOConnect.inc.php");

session_start();
$loc = setlocale(LC_ALL, 'fr_FR@euro', 'fr_FR', 'FR', 'fr');