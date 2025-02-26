<?php

require 'mail.php';

$status = '';
function validation($data){    
    if(is_array($data)){
        foreach($data as $value){
            if(empty($value)){
                return false;
            }
        }
    }
    return true;
}

function isEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function sanitize ($data){
    foreach($data as &$value){
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    return $data;
}

// Form submission check
if (isset($_POST['contact_form'])) {
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'message' => $_POST['message'],
        'subject' => $_POST['subject']
    ];

    // Sanitize the data to prevent Cross-Site Scripting (XSS) attacks and SQL Injections
    $cleanData = sanitize($data);

    $name = $cleanData['name'];
    $email = $cleanData['email'];
    $message = $cleanData['message'];
    $subject = $cleanData['subject'];

    $body = "$name <$email> ha llenado el formulario de contacto con el siguiente mensaje:<br> $message";

    if(validation($cleanData) && isEmail($email)){
        $emailSent = sendMail($email, $body, $subject, $name, true);
        if($emailSent){
            $status = 'success';
        }else{
            $status = 'danger';
        }
    }else{
        $status = 'danger';
    }
}