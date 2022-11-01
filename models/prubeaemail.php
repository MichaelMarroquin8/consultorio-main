<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // $mail->IsSMTP();                 
    $mail->Host = "localhost";
    $mail->SMTPAuth = true;
    $mail->Username = "cgts2018@senacgts.org";
    $mail->Password = "cgts2018*";
    $mail->From = "cgts2018@senacgts.org";
    $mail->FromName = "ADMIN COMPLEMENTARIA";
    $mail->AddAddress('m.stivenmarrqouin@gmail.com');
    $mail->WordWrap = 50;
    $mail->CharSet = 'UTF-8';
    $mail->IsHTML(true);
    $mail->Subject = 'mensaje de email';
    $mail->Body    = 'mensaje de email';
    $mail->AltBody = 'mensaje de email';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
