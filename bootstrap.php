<?php

// Load our autoloader
require_once __DIR__.'/vendor/autoload.php';

// Specify our Twig templates location
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templates');

// Instantiate our Twig. 
$twig = new \Twig\Environment($loader);




// mail

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// SMTP settings provided by inbox in https://mailtrap.io/inboxes/
$mail = new PHPMailer();
$mail->isSMTP();

$mailConfig = parse_ini_file('./config.ini',true)['mailer'];
$mail->Host     = $mailConfig['host'];
$mail->SMTPAuth = $mailConfig['SMTPAuth'];
$mail->Port     = $mailConfig['port'];
$mail->Username = $mailConfig['username'];
$mail->Password = $mailConfig['password'];

// Content
$mail->setFrom($mailConfig['fromAddress']);
$mail->isHTML($mailConfig['isHTML']);                                  //Set email format to HTML
    