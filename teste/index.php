<?php

require __DIR__ . '/../lib_ext/autoload.php';

use aulaComposer\Email;

$novoEmail = new Email(2, "mail.host.com", "your@email.com", "your-pass", "smtp secure (tls/ssl)", "port (587)",
    "from@email.com", "From Name");
$novoEmail->sendMail("Subject", "Content", "reply@email.com", "Replay Name", "address@email.com", "Address Name");

var_dump($novoEmail);
