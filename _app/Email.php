<?php

namespace aulaComposer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use function Webmozart\Assert\Tests\StaticAnalysis\string;

class Email 
{
    private $mail = \stdClass::class;
    
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = 'tls';
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = 'smtp.gmail.com';                        //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = 'rodrigo.oliveirafln@gmail.com';                     //SMTP username
        $this->mail->Password   = 'flgslfhfxxacfrxl';                               //SMTP password
        $this->mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $this->mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $this->mail->CharSet    = 'utf-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);
        $this->mail->setFrom('rodrigo.fln@hotmail.com', 'Equipe Rodrigo Oliveira');
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