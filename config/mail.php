<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
function sendMail($email, $body, $subject, $name, $html = false){
    //Server settings
    $phpmailer = new PHPMailer(true);    
    $phpmailer->isSMTP();
    $phpmailer->CharSet  = 'UTF-8';
    $phpmailer->Encoding = 'base64';
    $phpmailer->Host     = '';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port     = 2525;
    $phpmailer->Username = '';
    $phpmailer->Password = '';

    //Recipients
    $phpmailer->setFrom('from@example.com', 'Mailer');
    $phpmailer->addAddress($email, $name);

    //Content
    $phpmailer->isHTML($html);
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $body;    

    //Send email
    return $phpmailer->send();
}