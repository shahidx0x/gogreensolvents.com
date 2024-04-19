<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);


try {
    $mail->SMTPDebug = 4;
    $mail->isSMTP();
    $mail->Host = 'smtp.bizmail.yahoo.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sender@gogreensolvents.com';
    $mail->Password = 'secret';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Recipients
    $mail->setFrom('sender@gogreensolvents.com', 'Mail Sender');
    $mail->addAddress('dev.imshahid@gmail.com', 'User Emails');
    $mail->addReplyTo($email, $name);

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "Name: $name <br> Email: $email <br> Message: $message";
    $mail->AltBody = "Name: $name \n Email: $email \n Message: $message";
    $mail->send();
    header("Location: sent.html");
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
