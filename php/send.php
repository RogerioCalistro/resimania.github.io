<?php
    
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    
    $name = $_POST["nome"];
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $telefone = $_POST["telefone"];
    $mensagem = $_POST["mensagem"];

    require '../php/PHPMailer/src/Exception.php';
    require '../php/PHPMailer/src/PHPMailer.php';
    require '../php/PHPMailer/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer (true);
    $mail->SMTPDebug  = 0;

    try {
    
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'jvm.api@gmail.com';
    $mail->Password = 'wtzmdcylpttodvee';

    $mail->addAddress('jvm.api@gmail.com');

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->setFrom('desenvolvedor.calistro@gmail.com', 'Admin');
  
    $mail->Body.= "De: ".($_POST['nome'])."\n";
    $mail->Body.= "E-mail: ".($_POST['email'])."\n";
    $mail->Body.= "Assunto: ".($_POST['assunto'])."\n";
    $mail->Body.= "Mensagem: ".($_POST['mensagem'])."\n";

    $mail->send();
        echo "Ola $name, E-mail enviado com sucesso !";
    } catch (Exception $e) {
        echo "Olá $name, não foi possível enviar a mensagem. Erro no envio: {$mail->ErrorInfo}";
    }     
    $mail->smtpClose();