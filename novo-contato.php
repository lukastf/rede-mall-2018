<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'email/Exception.php';
require 'email/PHPMailer.php';
require 'email/SMTP.php';

$nome = $_POST['nome'] ? $_POST['nome'] : null;
$email = $_POST['email'] ? $_POST['email'] : null;
$telefone = $_POST['telefone'] ? $_POST['telefone'] : null;
$assunto = $_POST['assunto'] ? $_POST['assunto'] : null;
$mensagem = $_POST['mensagem'] ? $_POST['mensagem'] : null;

if($nome == null || $email == null || $telefone == null || $assunto == null || $mensagem == null){
    header('HTTP/1.1 500 Internal Server Email Vazio');
    $conn = null;
    die("kkkk");
}

if(strpos($email,"@") > 0 && strpos($email,".") > 0) {

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

    $mail->setFrom('atendimento@redemall.com.br', 'Contato Rede Mall');
    //Recipients
    $mail->addAddress('atendimento@redemall.com.br');
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
    $mail->Subject = 'Contato-site Rede Mall Belvedere: ' . $assunto;
    $mail->Body    = 'Nome completo: '.$nome.'<br>Telefone: '.$telefone.'<br>Mensagem: '.$mensagem;
    $mail->AltBody = 'Nome completo: '.$nome.' Telefone: '.$telefone.'Mensagem: '.$mensagem;

    //$mail->send();

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        $conn = null;
        die("iii moiou");
    } else {
        echo 'Message has been sent';
    }
}
else {
    header('HTTP/1.1 501 Internal Server Email invalido');
    $conn = null;
    die("kkkk");
}

$conn = null;