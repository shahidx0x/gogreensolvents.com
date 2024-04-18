<?php

$name = $_POST['name'];
$email = $_POST['email'];
$email = $_POST['subject'];
$email = $_POST['message'];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

try {
    //Server settings
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your-email@example.com';
    $mail->Password = 'your-password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('to@example.net', 'Joe User');
    $mail->addReplyTo('info@example.com', 'Information');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject';
    $mail->Body = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("Location: sent.html");
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
