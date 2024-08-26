<?php

use php\src\PHPMailer\Exception;
use php\src\PHPMailer\PHPMailer;
use php\src\PHPMailer\SMTP;


require 'php\src\PHPMailer\Exception.php';
require 'php\src\PHPMailer\PHPMailer.php';
require 'php\src\PHPMailer\SMTP.php';

require 'config.php';

function sendMail($nome, $email, $assunto, $telefone, $mensagem) {
    $mail =  new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = MAILHOST;
    $mail->Username = USERNAME;
    $mail->Password = PASSWORD;

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->setForm(SEND_FROM, SEND_FROM_NAME);

    $mail->addAddress($mail);
    $mail->addReplyTo(REPLAY_TO, REPLAY_TO_NAME);
}