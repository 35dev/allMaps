<?php
namespace outils;

class erreur {

    public $Subject;
    public $From;
    public $To;
    public $Bcc;
    public $ReturnPath;
    public $Body;

    public static function mailErreurRedirection($urlOrigine, $environnement) {

        $message = "Erreur de redirection depuis " . $urlOrigine;

        $email = new sendmail();
        $email->Subject = "Erreur de redirection depuis " . $urlOrigine;
        $email->To = "webmaster.ffcc@gmail.com";
        $email->Body = $environnement;

        $email->envoiMail();

    }

}