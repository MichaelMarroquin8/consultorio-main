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
    //Server settings
        $mail->SMTPDebug = 3;
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'm.stivenmarroquin@gmail.com';                     //SMTP username
    $mail->Password   = 'wlqvisuiryrybgor';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('m.stivenmarroquin@gmail.com', 'Mailer');
    $mail->addAddress('m.stivenmarroquin@gmail.com', 'Joe User');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>

/home/usenacg4qf/complementaria.senacgts.org/controller/controllerInstructor.php

	require '../PHPMAILER/src/Exception.php';
    require '../PHPMAILER/src/PHPMailer.php';
    require '../PHPMAILER/src/SMTP.php';
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);  
try {
				
					// $mail->IsSMTP();                 
					$mail->Host = "localhost"; 
					$mail->SMTPAuth = true;  
					$mail->Username = "cgts2018@senacgts.org"; 
					$mail->Password = "cgts2018*";
					$mail->From = "cgts2018@senacgts.org";
					$mail->FromName = "ADMIN COMPLEMENTARIA";
					$mail->AddAddress($para);
					$mail->WordWrap = 50;    
					$mail->CharSet = 'UTF-8';                            
					$mail->IsHTML(true);                                  
					$mail->Subject = $asunto;
					$mail->Body    = $mensaje;
					$mail->AltBody = $mensaje;
				
				if($mail->Send()){
					$datos2 = $instructores->actualizar($id, $datos1);
					echo json_decode($datos2);	
				}