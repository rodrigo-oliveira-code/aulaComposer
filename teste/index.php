<?php

require __DIR__ . '/../lib_ext/autoload.php';

use aulaComposer\Email;

$novoEmail = new Email(2,"smtp.gmail.com","rodrigo.oliveirafln@gmail.com","blwhifwuhnhnjwup
","tls",'587',"rodrigo.oliveirafln@gmail.com","Rodigo");
$novoEmail->sendMail
(
    "Assunto de Teste",
    "<p>Este e-mail foi enviado dentro do <b>componente</b></p>",
    "rodrigo.fln@hotmail.com",
    "Rodrigo Oliver",
    "rodrigo.oliveirafln@gmail.com",
    "Rodrigo "
);

var_dump($novoEmail);
