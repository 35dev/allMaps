<?php
namespace outils;
require(__DIR__."/../assets/swiftmailer/lib/swift_required.php");
use Swift_Message;
use Swift_SmtpTransport;
use Swift_Mailer;

class sendmail {

    public $Subject;
    public $From;
    public $To;
    public $Cc;
    public $Bcc;
    public $addReplyTo;
    public $Body;

    function envoiMail() {

        $email = Swift_Message::newInstance();
        $email->setSubject($this->Subject);
        $email->setFrom("support@ffcc.fr");
        $email->setTo($this->To);
        $email->setCc($this->Cc);
        $email->setBcc("webmaster.ffcc@gmail.com");
        if (isset($this->addReplyTo)) {$email->addReplyTo($this->addReplyTo);}
        $email->setBody(nl2br($this->Body), 'text/html');
        $email->addPart($this->Body, 'text/plain');

        /*$transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587);
        $transport->setUsername('support@ffcc.fr');
        $transport->setPassword('-vXMGFwTVGELMoYzJ7cGZg');
        $mailer = Swift_Mailer::newInstance($transport);*/
        //$result = $mailer->send($email);

        //$transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com');
        //$transport->setPort(587);
        $transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587);
        //$transport->setEncryption('ssl');
        $transport->setUsername('support@ffcc.fr');
        $transport->setPassword('BB5oUMp9tBnZMLnuMYQkHA');
        $transport->setAuthMode("PLAIN");

        /*$transport = Swift_SmtpTransport::newInstance('in.mailjet.com');
        $transport->setPort(587);
        //$transport->setEncryption('ssl');
        $transport->setUsername(MAILJET_apiKey);
        $transport->setPassword(MAILJET_secretKey);*/

        //$transport = Swift_SmtpTransport::newInstance('localhost', 25);

        $mailer = Swift_Mailer::newInstance($transport);

        if ($recipients = $mailer->send($email, $failures))
        {
            return 'OK';
        } else {
            return "There was an error:\n" . $failures;
            //print_r($failures);
        }

    }

}