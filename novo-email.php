<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'email/Exception.php';
require 'email/PHPMailer.php';
require 'email/SMTP.php';

//die(kkk);

$email = $_POST['receberEmail'] ? $_POST['receberEmail'] : null ;

if($email == null){
    header('HTTP/1.1 500 Internal Server Email Vazio');
    $conn = null;
    die("kkkk");
}

if(strpos($email,"@") > 0 && strpos($email,".") > 0) {

    //require '../email/Exception.php';

    require 'database/conexao.php';

    $stmt = $conn->prepare('SELECT email FROM emails WHERE email = :email');
    $stmt->execute(array('email' => $email));

    foreach ($stmt as $row) {
        $email = $row;
    }

    if($email > 0) {
        header('HTTP/1.1 501 Internal Server Email Ja existe');
        $conn = null;
        die("kkkk");
    }
    else {

        $stmt = $conn->prepare('INSERT INTO emails (email) VALUES (:email)');
        $stmt->execute(array('email' => $email));
        
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';

        //Server settings
        $mail->SMTPDebug = 1;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.mailgun.org';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'admin@conveniencecard.com.br';                 // SMTP username
        $mail->Password = '';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
        
        $mail->setFrom('atendimento@redemall.com.br', 'Rede Mall');
        //Recipients
        $mail->addAddress($email);
        //$mail->setFrom($email);
        //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        //$mail->addAddress('atendimento@conveniencecard.com.br', 'Convenience Card');               // Name is optional
        //$mail->addAddress("lukas_tf@hotmail.com");
        $mail->addReplyTo('atendimento@redemall.com.br');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Cadastro Rede Mall Belvedere';
        $mail->Body    = 'Seu email foi recebido com sucesso.<br> A partir de agora você ficará por dentro de todas as nossas novidades';
        $mail->AltBody = 'Seu email foi recebido com sucesso. A partir de agora você ficará por dentro de todas as nossas novidades';

        //$mail->send();

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            //die("Message could not be sent.");
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }
}
else {
    header('HTTP/1.1 502 Internal Server Email sem @ e .');
    $conn = null;
    die("kkkk");
}

$conn = null;