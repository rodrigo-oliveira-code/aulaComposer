<?php

require __DIR__ . '/lib_ext/autoload.php';

use aulaComposer\Email;

$novoEmail = new Email;
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
