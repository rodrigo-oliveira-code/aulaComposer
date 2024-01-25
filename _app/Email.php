<?php

namespace aulaComposer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use function Webmozart\Assert\Tests\StaticAnalysis\string;

class Email 
{
    private $mail = \stdClass::class;
    
    public function __construct($smtpDebug, $host, $user, $pass, $smtpSecure, $port, $setFromEmail, $setFromName )
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = $smtpDebug;
        $this->mail->isSMTP();
        $this->mail->Host       = $host;
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = $user;
        $this->mail->Password   = $pass;
        $this->mail->SMTPSecure = $smtpSecure;
        $this->mail->Port       = $port;                                  
        $this->mail->CharSet    = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);
        $this->mail->setFrom($setFromEmail, $setFromName);
    }
        
    public function sendMail($subject, $body, $replyEmail, $replyName, $adressEmail, $adressName)
    {
        $this->mail->Subject = (string)$subject;
        $this->mail->Body = $body;

        $this->mail->addReplyTo($replyEmail,$replyName);
        $this->mail->addAddress($adressEmail,$adressName);

        try {
            $this->mail->send();
            echo "Email enviado com sucesso";
        }catch (Exception $e){
            echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
        }
        //echo "O email foi enviado!";
    }
}